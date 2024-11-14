<?php

namespace App\Http\Controllers;

use App\Events\SparingCreated;
use App\Models\Sparing;
use App\Models\SparingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SparingController extends Controller
{
    public function index()
    {
        $sparings = Sparing::latest()->where('status_sparing', '!=', 'done')->get();
        return view('bookings.sparing', compact('sparings'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required',
            'description' => '',
            'id_list_booking' => 'unique:sparings,id_list_booking'
        ]);
        $sparing = Sparing::create([
            'created_by' => Auth::user()->id,
            'description' => $request->description,
            'id_list_booking' => $request->id_list_booking,
            'status_sparing' => 'pending'
        ]);
        SparingCreated::dispatch(Auth::user()->id, $request->team_name);
        return redirect()->route('sparing.index');
    }

    public function addRequest($sparing)
    {
        SparingRequest::create([
            'id_sparing' => $sparing,
            'id_user' => Auth::user()->id,
            'status_request' => 'waiting'
        ]);
        // dd('cek');
        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function acceptRequest(SparingRequest $sparing_req)
    {
        $sparing_req->update([
            'status_request' => 'accepted'
        ]);
        SparingRequest::where('id_sparing', $sparing_req->id_sparing)->where('id', '!=', $sparing_req->id)->update([
            'status_request' => 'rejected'
        ]);
        Sparing::where('id', $sparing_req->id_sparing)->update([
            'status_sparing' => 'done'
        ]);
        return back();
    }

    public function rejectRequest(SparingRequest $sparing_req)
    {
        // dd($sparing_req);
        $sparing_req->update([
            'status_request' => 'rejected'
        ]);
        return back();
    }
}
