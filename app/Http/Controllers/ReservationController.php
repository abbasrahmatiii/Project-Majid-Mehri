<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

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
}
