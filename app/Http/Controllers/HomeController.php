<?php

namespace App\Http\Controllers;

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
        return view('index', compact('sparings'));
    }
}
