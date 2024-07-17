<?php

// app/Http/Controllers/AdminReservationController.php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['consultation.timeSlot', 'consultation.consultant', 'user'])->paginate(10);

        return view('admin.reservations.index', compact('reservations'));
    }


    public function destroy(Reservation $reservation)
    {
        // بررسی اینکه آیا رزرو پرداخت شده است
        if ($reservation->is_paid) {
            return redirect()->back()->with('error', 'این رزرو پرداخت شده است و نمی‌توان آن را حذف کرد.');
        }

        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'رزرو با موفقیت حذف شد.');
    }
}
