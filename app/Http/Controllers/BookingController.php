<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Field;
use App\Models\Booking;
use App\Models\Voucher;
use App\Models\ListBooking;
use Illuminate\Http\Request;
use App\Events\BookingCreated;
use App\Events\PaymentUplouded;
use App\Rules\VoucherValidation;
use App\Jobs\UpdateBookingStatus;
use Illuminate\Support\Facades\DB;
use App\Notifications\ApproveBooking;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Support\Facades\Notification;
use Illuminate\Routing\Controller as BaseController;

class BookingController extends BaseController
// class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.payment')->except(['acceptBooking', 'rejectBooking']);
    }
    //menampilkan halaman detail Pembayaran
    public function payment(Request $request)
    {
        $booking_cart = $request->session()->get('cart', []);
        // $totalPrice = $booking_cart['total'];
        // $voucher = $booking_cart['voucher'];
        return view('payments.detailPembayaran', compact('booking_cart'));
    }

    // menampilkan halaman uploud bukti pembayaran
    public function paymentUploud(Request $request)
    {
        $booking_cart = $request->session()->get('cart', []);
        return view('payments.buktiPembayaran', compact('booking_cart'));
    }

    // validasi uploud bukti pembayaran
    public function paymentUploudValidate(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2000'
        ]);
        $booking_cart = $request->session()->get('cart', []);
        $max_payment = $booking_cart['order_date']->copy()->addMinutes(5)->setTimezone('Asia/Jakarta');
        if ($max_payment->greaterThan(now())) {
            $booking = Booking::find($booking_cart['id_booking']);
            $path = $request->photo->store('/payments', 'local');
            $booking->uploud_payment = $path;
            $booking->save();
            $field = Field::find(1);
            PaymentUplouded::dispatch($booking, $booking_cart['total']);
            return redirect()->route('booking.paymentSuccess');
        }
        return back()->with('timeIsOut', 'Waktu Pembayaran Telah Habis');
    }

    public function paymentSuccess(Request $request)
    {
        $request->session()->forget('cart');
        return view('payments.pembayaranBerhasil');
    }

    //menyimpan data booking & jadwalnya
    public function store(StoreBookingRequest $request)
    {
        $booking_cart = $request->session()->get('cart', []);
        $id_voucher = $booking_cart['voucher'];
        $list_booking = $booking_cart['list_schedules'];
        $rented = $booking_cart['rented'];
        $order_date = $booking_cart['order_date'];

        if (!isset($booking_cart['id_booking'])) {
            if ($id_voucher === 0) {
                $newBooking = Booking::create([
                    'order_date' => $order_date,
                    'status' => 'pending',
                    'rented_by' => $rented,
                ]);
            } else {
                $newBooking = Booking::create([
                    'order_date' => $order_date,
                    'status' => 'pending',
                    'rented_by' => $rented,
                    'id_voucher' => $id_voucher,
                ]);
            }
            foreach ($list_booking as $schedule) {
                BookingCreated::dispatch($newBooking, $schedule);
            }
            UpdateBookingStatus::dispatch($newBooking->id)->delay(now()->addMinutes(5));
            $booking_cart['id_booking'] = $newBooking->id;
            $booking_cart['order_date'] = now();
            $request->session()->put('cart', $booking_cart);
        }
        // $request->session()->forget('cart');
        return redirect()->route('booking.paymentUploud');
    }

    public function acceptBooking(Booking $booking)
    {
        $booking->update(['status' => 'accept']);
        return redirect()->route('admin.booking');
    }
    public function rejectBooking(Booking $booking)
    {
        $booking->update(['status' => 'failed']);
        return redirect()->route('admin.booking');
    }

    public function useVoucher(Request $request)
    {
        $request->validate([
            'voucher' => 'required|exists:vouchers,code'
        ]);
        $voucher = Voucher::where('code', $request->voucher)->first();

        if (!$voucher) {
            return back()->with('Voucher tidak ditemukan.');
        }

        // Validasi tanggal kadaluarsa
        $currentDate = Carbon::now();
        $expiredDate = Carbon::parse($voucher->expired_date);

        if ($currentDate->greaterThan($expiredDate)) {
            return back()->with('Voucher sudah kadaluarsa.');
        }

        // Validasi kuota voucher
        if ($voucher->quote <= 0) {
            return back()->with('Kuota voucher sudah habis.');
        }

        // Validasi harga minimum
        $totalPrice = request()->input('total_price', 0); // Sesuaikan dengan nama input harga total di form Anda

        if ($totalPrice < $voucher->min_price) {
            return back()->with("Voucher hanya berlaku untuk transaksi minimal Rp " . number_format($voucher->min_price, 0, ',', '.'));
        }

        // Proses selanjutnya setelah validasi berhasil
        $discountAmount = 0;

        if ($voucher->discount_percentage > 0) {
            // Hitung diskon persentase
            $discountAmount = $totalPrice * ($voucher->discount_percentage / 100);

            // Batasi maksimal diskon jika ada max_discount
            if ($voucher->max_discount > 0) {
                $discountAmount = min($discountAmount, $voucher->max_discount);
            }
        } elseif ($voucher->discount_price > 0) {
            // Diskon dalam nominal fix
            $discountAmount = $voucher->discount_price;
        }

        // Pastikan diskon tidak melebihi total harga
        $discountAmount = min($discountAmount, $totalPrice);
        $booking_cart = $request->session()->get('cart', []);
        $booking_cart['voucher'] = $voucher->id;
        $booking_cart['total'] = $totalPrice - $discountAmount;
        $request->session()->put('cart', $booking_cart);
        return redirect()->route('booking.payment')->with('voucherSuccess', 'Voucher berhasil digunakan.');
    }



    public function index()
    {
        return view('detailPembayaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
