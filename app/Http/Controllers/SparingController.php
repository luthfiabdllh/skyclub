<?php

namespace App\Http\Controllers;

use App\Events\SparingCreated;
use App\Models\Sparing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SparingController extends Controller
{
    public function index()
    {
        $sparings = Sparing::latest()->get();
        return view('bookings.sparing', compact('sparings'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required',
            'description' => ''
        ]);
        Sparing::create([
            'created_by' => Auth::user()->id,
            'description' => $request->description,
            'id_list_booking' => $request->id_list_booking,
            'status' => 'waiting'
        ]);
        SparingCreated::dispatch(Auth::user()->id, $request->team_name);
    }
}
