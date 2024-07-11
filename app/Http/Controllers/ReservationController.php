<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['day', 'timeSlot', 'consultant'])
            ->whereDoesntHave('reservation')
            ->get();

        return view('reservations.index', compact('consultations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
        ]);

        $consultation = Consultation::find($request->input('consultation_id'));

        if ($consultation->reservation) {
            return redirect()->back()->withErrors('این زمان مشاوره قبلاً رزرو شده است.');
        }

        $consultation->reservation()->create([
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('reservations.index')->with('success', 'زمان مشاوره با موفقیت رزرو شد.');
    }

    public function userReservations()
    {
        $reservations = auth()->user()->reservations()->with(['consultation.day', 'consultation.timeSlot', 'consultation.consultant'])->get();
        return view('reservations/reserved', compact('reservations'));
    }

    public function cancel(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            return redirect()->route('reservations.index')->withErrors('شما اجازه لغو این رزرو را ندارید.');
        }
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'رزرو با موفقیت لغو شد.');
    }
}
