<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $consultations = Consultation::with(['timeSlot', 'consultant'])
            ->whereDoesntHave('reservation')
            ->get();
            $type = $request->query('type'); // مقدار type را از URL دریافت کنید
        return view('reservations.index', compact('consultations','type'));
    }

    public function store(Request $request)
{

   
    $request->validate([
        'consultation_id' => 'required|exists:consultations,id',
        'type' => 'required|boolean', // اعتبارسنجی برای اطمینان از ارسال مقدار type
    ]);


    $consultation = Consultation::find($request->input('consultation_id'));

<<<<<<< HEAD
        if ($existingReservation) {
            return redirect()->back()->withErrors('شما در این تاریخ و بازه زمانی مشاوره دیگری دارید.');
        }

        $consultation->reservation()->create([
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('reservations.index')->with('success', 'زمان مشاوره با موفقیت رزرو شد.');
=======
    if ($consultation->reservation) {
        return redirect()->back()->withErrors('این زمان مشاوره قبلاً رزرو شده است.');
>>>>>>> d088776b (add session link)
    }

    $user = auth()->user();
    $existingReservation = Reservation::whereHas('consultation', function ($query) use ($consultation) {
        $query->where('date', $consultation->date)
            ->where('time_slot_id', $consultation->time_slot_id);
    })->where('user_id', $user->id)->exists();

    if ($existingReservation) {
        return redirect()->back()->withErrors('شما در این تاریخ و بازه زمانی مشاوره دیگری دارید.');
    }
    $consultation->reservation()->create([
        'user_id' => auth()->id(),
        'type' => $request->input('type'),
    ]);

    return redirect()->route('user.reservations.reserved')->with('success', 'زمان مشاوره با موفقیت رزرو شد. لطفا برای نهایی شدن بر روی دکمه پرداخت کلیک کنید.');
}

    
    public function userReservations()
    {
        $reservations = auth()->user()->reservations()->with(['consultation.timeSlot', 'consultation.consultant'])->get();
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
