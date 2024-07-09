<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Day;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{


    public function index()
    {
        $consultations = Consultation::with(['consultant', 'day', 'timeSlot'])->paginate(10);
        return view('admin.consultations.index', compact('consultations'));
    }

    public function create()
    {
        $consultants = User::whereHas('roles', function ($query) {
            $query->where('name', 'مشاور'); // assuming 'consultant' is the role name for consultants
        })->get();

        $days = Day::all();
        $timeSlots = TimeSlot::all();

        return view('admin/consultations/create', compact('consultants', 'days', 'timeSlots'));
    }

    public function edit($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultants = User::whereHas('roles', function ($query) {
            $query->where('name', 'مشاور'); // assuming 'مشاور' is the role name for consultants
        })->get();
        $days = Day::all();
        $timeSlots = TimeSlot::all();

        return view('admin.consultations.edit', compact('consultation', 'consultants', 'days', 'timeSlots'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'consultant_id' => 'required|exists:users,id',
            'day_id' => 'required|exists:days,id',
            'time_slot_id' => 'required|exists:time_slots,id',
        ]);

        // بررسی همپوشانی روز و بازه زمانی
        $existingConsultation = Consultation::where('day_id', $request->day_id)
            ->where('time_slot_id', $request->time_slot_id)
            ->where('id', '!=', $id) // برای جلوگیری از بررسی خود مشاوره
            ->first();

        if ($existingConsultation) {
            return redirect()->back()->with('error', 'این بازه زمانی در این روز قبلاً برای مشاوره دیگری انتخاب شده است.');
        }

        $consultation = Consultation::findOrFail($id);
        $consultation->consultant_id = $request->consultant_id;
        $consultation->day_id = $request->day_id;
        $consultation->time_slot_id = $request->time_slot_id;
        $consultation->save();

        return redirect()->route('admin.consultations.index')->with('success', 'مشاوره با موفقیت به‌روزرسانی شد');
    }
    public function store(Request $request)
    {
        $request->validate([
            'consultant_id' => 'required|exists:users,id', // اضافه کردن اعتبارسنجی مشاور
            'day_id' => 'required|exists:days,id',
            'time_slot_id' => 'required|exists:time_slots,id',
        ]);

        $consultant_id = $request->input('consultant_id');
        $day_id = $request->input('day_id');
        $time_slot_id = $request->input('time_slot_id');
        $timeSlot = TimeSlot::find($time_slot_id);

        $existingConsultations = Consultation::where('consultant_id', $consultant_id)
            ->where('day_id', $day_id)
            ->whereHas('timeSlot', function ($query) use ($timeSlot) {
                $query->where(function ($q) use ($timeSlot) {
                    $q->where('start_time', '<', $timeSlot->end_time)
                        ->where('end_time', '>', $timeSlot->start_time);
                });
            })->count();

        if ($existingConsultations > 0) {
            return redirect()->back()->with('error', 'زمان انتخابی با بازه زمانی دیگری همپوشانی دارد.');
        }

        Consultation::create([
            'consultant_id' => $consultant_id,
            'day_id' => $day_id,
            'time_slot_id' => $time_slot_id,
        ]);

        return redirect()->route('admin.consultations.index')->with('success', 'زمان مشاوره با موفقیت ایجاد شد.');
    }
}
