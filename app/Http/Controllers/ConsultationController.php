<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Day;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{


    public function index()
    {
        $consultations = Consultation::where('user_id', auth()->id())->get();
        return view('admin.consultations.index', compact('consultations'));
    }

    public function create()
    {
        $days = Day::all();
        $timeSlots = TimeSlot::all();
        return view('admin/consultations/create', compact('days', 'timeSlots'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'day_id' => 'required|exists:days,id',
            'time_slot_id' => 'required|exists:time_slots,id',
        ]);

        $day_id = $request->input('day_id');
        $time_slot_id = $request->input('time_slot_id');
        $timeSlot = TimeSlot::find($time_slot_id);

        $existingConsultations = Consultation::where('day_id', $day_id)
            ->whereHas('timeSlot', function ($query) use ($timeSlot) {
                $query->where(function ($q) use ($timeSlot) {
                    $q->where('start_time', '<', $timeSlot->end_time)
                        ->where('end_time', '>', $timeSlot->start_time);
                });
            })->count();

        if ($existingConsultations > 0) {
            return redirect()->back()->withErrors('زمان انتخابی با بازه زمانی دیگری همپوشانی دارد.');
        }

        Consultation::create([
            'user_id' => auth()->id(),
            'day_id' => $day_id,
            'time_slot_id' => $time_slot_id,
        ]);

        return redirect('admin.consultations.index')->with('success', 'مشاوره با موفقیت ایجاد شد.');
    }
}
