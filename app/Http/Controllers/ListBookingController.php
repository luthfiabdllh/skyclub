<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sparing;
use App\Models\ListBooking;
use App\Models\RescheduleRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreListBookingRequest;
use App\Http\Requests\UpdateListBookingRequest;

class ListBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ListBooking $listBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListBooking $listBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListBookingRequest $request, ListBooking $listBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancel(ListBooking $list_booking)
    {
        // dd($list_booking);
        // Menghitung selisih hari antara tanggal saat ini dan tanggal booking
        $daysDifference = Carbon::now()->diffInDays(Carbon::parse($list_booking->date), false);

        // Jika selisihnya kurang dari 3 hari, tampilkan pesan kesalahan
        if ($daysDifference < 7) {
            return back()->with('error_reschedule', 'Jadwal tidak dapat diubah karena kurang dari 7 hari dari sekarang.');
        }

        $list_booking->update([
            'status_request' => 'request-cancel'
        ]);
        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function acceptReschedule(ListBooking $listBooking, RescheduleRequest $request)
    {
        ListBooking::create([
            'date' => $request->date,
            'session' => $request->session,
            'id_booking' => $listBooking->id_booking,
            'id_field' => $listBooking->id_field,
            'status_request' => 'reschedule',
        ]);
        Sparing::where('id_list_booking', $listBooking->id)->delete();
        $request->delete();
        $listBooking->delete();
        return redirect()->route('admin.reschedule');
    }
    public function rejectReschedule(ListBooking $listBooking, RescheduleRequest $request)
    {
        $listBooking->update([
            'status_request' => null,
        ]);
        $request->delete();
        return redirect()->route('admin.reschedule');
    }
    public function acceptCancelBooking(ListBooking $listBooking)
    {
        $listBooking->update([
            'status_request' => 'cancel',
        ]);
        return redirect()->route('admin.cancel');
    }
    public function rejectCancelBooking(ListBooking $listBooking)
    {
        $listBooking->update([
            'status_request' => null,
        ]);
        return redirect()->route('admin.cancel');
    }
}
