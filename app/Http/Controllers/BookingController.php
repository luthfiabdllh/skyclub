<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ListBooking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;


class BookingController extends Controller
{
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
        $id = $request->session()->get('id_booking');
        return view('payments.buktiPembayaran', compact('booking_cart', 'id'));
    }

    // validasi uploud bukti pembayaran
    public function paymentUploudValidate(Request $request)
    {
        $booking = Booking::find($request->id_booking);
        $booking->uploud_payment = $request->photo;
        $booking->save();
        redirect()->route('booking.paymentSuccess');
    }

    public function paymentSuccess()
    {
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

        if ($id_voucher === null) {
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
        foreach ($list_booking as $booking) {
            // dd($booking['date']);
            ListBooking::create([
                'date' => $booking['date'],
                'session' => $booking['session'],
                'id_booking' => $newBooking->id,
                'id_field' => 1
            ]);
        }
        $booking_cart['id_booking'] = $newBooking->id;
        // dd($booking_cart);
        // UpdateBookingStatus::dispatch($newBooking->id)->delay(now()->addMinutes(5));

        // $request->session()->forget('cart');
        return redirect()->route('booking.paymentUploud')->with('id_booking', $newBooking->id);
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
