<?php

namespace App\Http\Controllers;

use App\Models\ListBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\schedule\GenerateSchedule;
use App\Models\FieldPhoto;
use Carbon\Carbon;

// Class untuk men-generate jadwal 2 bulan kedepan
class FieldScheduleController extends Controller
{
    public function index()
    {
        $fieldPhotos = FieldPhoto::all()->pluck('photo')->map(function ($photo) {
            return asset('storage/images/images/' . $photo);
        });
        // dd($fieldPhotos);
        $generateSchedules = new GenerateSchedule(2);
        $schedules = $generateSchedules->createSchedule();
        // dd($schedules);
        return view('bookings.detailSewa', compact('schedules', 'generateSchedules', 'fieldPhotos'));
    }
    public function scheduleValidate(Request $request)
    {
        function getReqSession($request, $i)
        {
            return (int)substr($request->session[$i], 0, 2) + 1;
        }
        function getReqPrice($request, $i)
        {
            return (int)str_replace(['Rp', '.', ','], ['', '', ''], $request->price[$i]);
        }
        function getReqDate($request, $i)
        {
            return Carbon::parse($request->schedule[$i]);
        }
        // dd(getReqSession($request, 0));
        $booking_cart = [];
        $total = 0;
        $booked = ListBooking::whereRelation('booking', function ($query) {
            $query
                ->whereIn('status', ['accept', 'pending']);
        })->get();
        for ($i = 0; $i < count($request->schedule); $i++) {
            $total += getReqPrice($request, $i);
            $booking_cart['list_schedules'][$i] = ['date' => getReqDate($request, $i), 'session' => getReqSession($request, $i), 'price' => getReqPrice($request, $i)];
            foreach ($booked as $booking) {
                if ($booking->date == getReqDate($request, $i) && $booking->session == getReqSession($request, $i)) {
                    return back()->with('error_booking', 'Sesi Jadwal Sudah Di Pesan');
                }
            }
        }
        $booking_cart['total'] = $total;
        $booking_cart['voucher'] = 0;
        $booking_cart['order_date'] = now();
        $booking_cart['rented'] = Auth::user()->id;
        $booking_cart = collect($booking_cart);
        $request->session()->put('cart', $booking_cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('booking.payment');
    }
}
