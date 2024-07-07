<?php

// app/Http/Controllers/Admin/TimeSlotController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::all();
        return view('admin.time_slots.index', compact('timeSlots'));
    }

    public function create()
    {
        return view('admin.time_slots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        TimeSlot::create($request->all());
        return redirect()->route('admin.time_slots.index')->with('success', 'بازه زمانی جدید با موفقیت ایجاد شد.');
    }

    public function edit(TimeSlot $timeSlot)
    {
        return view('admin.time_slots.edit', compact('timeSlot'));
    }

    public function update(Request $request, TimeSlot $timeSlot)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $timeSlot->update($request->all());
        return redirect()->route('admin.time_slots.index')->with('success', 'بازه زمانی با موفقیت بروزرسانی شد.');
    }

    public function destroy(TimeSlot $timeSlot)
    {
        $timeSlot->delete();
        return redirect()->route('admin.time_slots.index')->with('success', 'بازه زمانی با موفقیت حذف شد.');
    }
}
