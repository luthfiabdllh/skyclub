<?php

namespace App\Http\Controllers;

use App\Events\BookingCreated;
use App\Events\PaymentUplouded;
use App\Models\User;
use App\Models\Field;
use App\Models\Booking;
use App\Models\ListBooking;
use Illuminate\Http\Request;
use App\Jobs\UpdateBookingStatus;
use Illuminate\Support\Facades\DB;
use App\Notifications\ApproveBooking;
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
        $this->middleware('check.payment');
    }
    //menampilkan halaman detail Pembayaran
    public function payment(Request $request)
    {
        $booking_cart = $request->session()->get('cart', []);
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
