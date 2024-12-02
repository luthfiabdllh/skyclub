<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Sparing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // sparing
        $sparings = Sparing::where('status_sparing', '!=', 'done')->latest()->get();

        //article

        //rating
        $reviews = Review::with(['user:id,name,team,profile_photo'])->latest()->get();
        // dd($reviews->toJson());
        return view('index', compact(['sparings', 'reviews']));
    }
}
