<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\schedule\GenerateSchedule;

// Class untuk men-generate jadwal 2 bulan kedepan
class FieldScheduleController extends Controller
{
    public function index()
    {
        $generateSchedules = new GenerateSchedule(2);
        $schedules = $generateSchedules->createSchedule();
        return view('detailSewa', compact('schedules', 'generateSchedules'));
    }
}
