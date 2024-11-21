<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ListBooking;
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
            dd($list_booking);
            return back()->with('error_reschedule', 'Jadwal tidak dapat diubah karena kurang dari 7 hari dari sekarang.');
        }

        $list_booking->update([
            'status_request' => 'request-cancel'
        ]);
        return redirect()->route('profile.show', Auth::user()->id);
    }
}
