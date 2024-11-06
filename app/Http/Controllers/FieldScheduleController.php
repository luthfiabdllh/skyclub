<?php

namespace App\Http\Controllers;

use App\Models\ListBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\schedule\GenerateSchedule;

// Class untuk men-generate jadwal 2 bulan kedepan
class FieldScheduleController extends Controller
{
    public function index()
    {
        $generateSchedules = new GenerateSchedule(2);
        $schedules = $generateSchedules->createSchedule();
        return view('bookings.detailSewa', compact('schedules', 'generateSchedules'));
    }
    public function scheduleValidate(Request $request)
    {
        $booking_cart = [];
        $total = 0;
        $booked = ListBooking::whereRelation('booking', function ($query) {
            $query
                ->whereIn('status', ['accept', 'pending']);
        })->get();
        for ($i = 0; $i < count($request->schedule); $i++) {
            $total += $request->price[$i];
            $booking_cart['list_schedules'][$i] = ['date' => $request->schedule[$i], 'session' => $request->session[$i], 'price' => $request->price[$i]];
            foreach ($booked as $booking) {
                if ($booking->date == $request->schedule[$i] && $booking->session == $request->session[$i]) {
                    return back()->with('error_booking', 'Sesi Jadwal Sudah Di Pesan');
                }
            }
        }
        $booking_cart['total'] = $total;
        $booking_cart['voucher'] = null;
        $booking_cart['order_date'] = now();
        $booking_cart['rented'] = Auth::user()->id;
        $booking_cart = collect($booking_cart);
        $request->session()->put('cart', $booking_cart);
        dd($request->session()->get('cart'));
        return redirect()->route('booking.payment');
    }
}
