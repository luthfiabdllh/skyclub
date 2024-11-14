<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ListBooking;
use App\Models\Sparing;
use App\Models\SparingRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $data_user = $user;
        $bookings = Booking::where('rented_by', $data_user->id)->latest()->get();
        $sparings = Sparing::where('created_by', $data_user->id)->latest()->get();
        $id_sparings = $sparings->pluck('id');
        $request_sparing = SparingRequest::whereIn('id_sparing', $id_sparings)->where('status_request', '!=', 'rejected')->latest()->get();
        // $sparing_all = clone $sparings;
        // foreach ($request_sparing as $req) {
        //     $sparing_all->push($req);
        // }
        // dd($request_sparing, $id_sparings, $sparings);
        // dd($bookings[0]->listBooking);
        // $booking->listBooking()->listBooking->session;
        // $list_schedule = ListBooking::where('id_booking', $booking->id)->get();
        return view('profiles.profile', compact(['data_user', 'bookings', 'request_sparing']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
