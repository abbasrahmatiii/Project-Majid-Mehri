<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        $days = Day::all();
        return view('admin.days.index', compact('days'));
    }

    public function create()
    {
        return view('admin.days.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:days,name'
        ]);

        Day::create($request->all());
        return redirect()->route('admin.days.index')->with('success', 'روز جدید با موفقیت ایجاد شد.');
    }

    public function edit(Day $day)
    {
        return view('admin.days.edit', compact('day'));
    }

    public function update(Request $request, Day $day)
    {
        $request->validate([
            'name' => 'required|unique:days,name,' . $day->id
        ]);

        $day->update($request->all());
        return redirect()->route('admin.days.index')->with('success', 'روز با موفقیت بروزرسانی شد.');
    }

    public function destroy(Day $day)
    {
        $day->delete();
        return redirect()->route('admin.days.index')->with('success', 'روز با موفقیت حذف شد.');
    }
}
