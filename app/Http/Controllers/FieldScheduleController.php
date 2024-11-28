<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Field;
use App\Models\Photo;
use App\Models\Review;
use App\Models\FieldPhoto;
use App\Models\ListBooking;
use Illuminate\Http\Request;
use App\Models\FieldDescription;
use App\Models\RescheduleRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\schedule\GenerateSchedule;
use Illuminate\Routing\Controller as BaseController;
// use App\Models\FieldDescription;
use App\Models\FieldFasility_dumb;
// use App\Models\FieldPhoto;
// use Carbon\Carbon;

// Class untuk men-generate jadwal 2 bulan kedepan
class FieldScheduleController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $fieldPhotos = Photo::all()->pluck('photo')->map(function ($photo) {
            return asset('storage/field/images/' . $photo);
        });
        // dd($fieldPhotos);

        $field = Field::findOrFail(1);
        $fieldFasility = FieldFasility_dumb::first();
        $selectedFacilities = $fieldFasility->facilities;

        $slicedFacilities = json_decode($fieldFasility->facilities, true);

        // Ambil hanya 4 fasilitas
        $selectedSliceFacilities = array_slice($slicedFacilities, 0, 4);

        // dd($fieldPhotos);
        $generateSchedules = new GenerateSchedule(2);
        $schedules = $generateSchedules->createSchedule();
        // dd($schedules);
        $reviews = Review::with(['user:id,name,team'])->latest()->get();


        return view('bookings.detailSewa', compact('schedules', 'generateSchedules', 'fieldPhotos', 'field', 'selectedFacilities', 'selectedSliceFacilities', 'reviews', 'fieldPhotos'));
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
            $total += $this->getReqPrice($request, $i);
            $booking_cart['list_schedules'][$i] = ['date' => $this->getReqDate($request, $i), 'session' => $this->getReqSession($request, $i), 'price' => $this->getReqPrice($request, $i)];
            foreach ($booked as $booking) {
                if ($booking->date == $this->getReqDate($request, $i) && $booking->session == $this->getReqSession($request, $i)) {
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
        return redirect()->route('booking.payment');
    }
    public function reschedule(ListBooking $list_booking)
    {

        // Jika selisihnya 3 hari atau lebih, tampilkan halaman ubah jadwal
        $generateSchedules = new GenerateSchedule(2);
        $schedules = $generateSchedules->createSchedule();
        return view('bookings.ubahJadwal', compact('schedules', 'generateSchedules', 'list_booking'));
    }
    public function rescheduleValidate(Request $request, ListBooking $list_booking)
    {
        // Menghitung selisih hari antara tanggal saat ini dan tanggal booking
        $daysDifference = Carbon::now()->diffInDays(Carbon::parse($list_booking->date), false);

        // Jika selisihnya kurang dari 3 hari, tampilkan pesan kesalahan
        if ($daysDifference < 3) {
            return back()->with('error_reschedule', 'Jadwal tidak dapat diubah karena kurang dari 3 hari dari sekarang.');
        }

        $list_booking->update([
            'status_request' => 'request-reschedule'
        ]);
        RescheduleRequest::create([
            'id_list_booking' => $list_booking->id,
            'date' => $this->getReqDate($request, 0),
            'session' => $this->getReqSession($request, 0),
            'price' => $this->getReqPrice($request, 0),
        ]);
        return redirect()->route('profile.show', Auth::user()->id);
    }
    protected function getReqSession($request, $i)
    {
        return (int)substr($request->session[$i], 0, 2) + 1;
    }
    protected function getReqPrice($request, $i)
    {
        return (int)str_replace(['Rp', '.', ','], ['', '', ''], $request->price[$i]);
    }
    protected function getReqDate($request, $i)
    {
        return Carbon::parse($request->schedule[$i]);
    }
}
