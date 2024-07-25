<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Evryn\LaravelToman\CallbackRequest;
use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Reservation;
use Evryn\LaravelToman\Facades\Toman;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $consultations = Consultation::with(['timeSlot', 'consultant'])
            ->whereDoesntHave('reservation')
            ->get();
            $type = $request->query('type',0); // مقدار type را از URL دریافت کنید
         return   view("reservations.index", compact('consultations','type'));
        
    }

    public function store(Request $request)
{

   
    $request->validate([
        'consultation_id' => 'required|exists:consultations,id',
        'type' => 'required|boolean', // اعتبارسنجی برای اطمینان از ارسال مقدار type
    ]);


    $consultation = Consultation::find($request->input('consultation_id'));

    if ($consultation->reservation) {
        return redirect()->back()->withErrors('این زمان مشاوره قبلاً رزرو شده است.');
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
        'type' => $request->input('type',0),
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


    function pay(Request $request, $id)
    {
        // ...
        $reservation = Reservation::findOrFail($id);

        $request = Toman::amount($reservation->consultation->price)
            ->description('جلسه مشاوره با : ' . $reservation->consultation->consultant->first_name . ' ' . $reservation->consultation->consultant->last_name . ' در تاریخ : ' . \Hekmatinasser\Verta\Verta::instance($reservation->consultation->date)->format('Y/m/d'))
            ->callback(route('reservations.callback', $id))
            ->mobile('09350000000')
            ->email('amirreza@example.com')
            ->request();

        if ($request->successful()) {

            $transactionId = $request->transactionId();
            // Store created transaction details for verification

            return $request->pay(); // Redirect to payment URL
        }

        if ($request->failed()) {

            // Handle transaction request failure; Probably showing proper error to user.
        }
    }





    public function callback(CallbackRequest $request, $id)
    {
        // Use $request->transactionId() to match the payment record stored
        // in your persistence database and get expected amount, which is required
        // for verification. Take care of Double Spending.
        $reservation = Reservation::findOrFail($id);
        $payment = $request->amount($reservation->consultation->price)->verify();

        if ($payment->successful()) {
            // Store the successful transaction details
            $transactionId = $payment->referenceId();
            $reservation->payment_id = $transactionId;
            $reservation->is_paid = 1;
            $reservation->save();
            return redirect(route('user.reservations.reserved'))->with('success', 'پرداخت با موفقیت انجام گردید.');
        }

        if ($payment->alreadyVerified()) {
            return redirect()->back()->with('error', 'این رزرو قبلاً پرداخت شده است.');
        }

        if ($payment->failed()) {
            return redirect(route('user.reservations.reserved'))->with('error', 'پرداخت ناموفق بود');
        }
    }
}
