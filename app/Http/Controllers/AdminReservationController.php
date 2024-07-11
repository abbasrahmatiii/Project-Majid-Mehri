<?php

// app/Http/Controllers/AdminReservationController.php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['consultation.day', 'consultation.timeSlot', 'consultation.consultant', 'user'])->get();

        return view('admin.reservations.index', compact('reservations'));
    }
}
