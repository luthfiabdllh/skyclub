<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Sparing;
use App\Models\ListBooking;
use Illuminate\Http\Request;
use App\Models\SparingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class ProfileUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
        $data_user = Auth::user();
        $bookings = Booking::where('rented_by', $data_user->id)->latest()->get();
        $sparings = Sparing::where('created_by', $data_user->id)->latest()->get();
        $id_sparings = $sparings->pluck('id');
        $request_sparing = SparingRequest::whereIn('id_sparing', $id_sparings)
            ->where('status_request', '!=', 'rejected')
            ->orWhere('id_user', $data_user->id)
            ->latest()
            ->get();
        $history_booking_sparing = Booking::where('rented_by', $data_user->id)->where('status', 'accept')->latest()->get();;
        foreach ($sparings as $sparing) {
            $history_booking_sparing->push($sparing);
        }
        $history_booking_sparing->sortByDesc('created_at');
        return view('profiles.profile', compact(['data_user', 'bookings', 'request_sparing', 'history_booking_sparing']));
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
