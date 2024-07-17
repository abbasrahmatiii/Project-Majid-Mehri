<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Day;
use App\Models\TimeSlot;
use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{


    public function index()
    {
        $consultations = Consultation::with(['consultant', 'timeSlot'])->paginate(10);
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
            'date' => 'required',
            'price' => 'required|integer',
            'time_slot_id' => 'required|exists:time_slots,id',
        ]);

        $dateShamsi = $request->input('date');
        $dateMiladi = Verta::parse($dateShamsi)->datetime()->format('Y-m-d');
        $consultant_id = $request->input('consultant_id');
        $time_slot_id = $request->input('time_slot_id');
        $timeSlot = TimeSlot::find($time_slot_id);
        $existingConsultation = Consultation::where('consultant_id', $consultant_id)
            ->where('date',  $dateMiladi)
            ->where('id', '!=', $id)
            ->whereHas('timeSlot', function ($query) use ($timeSlot) {
                $query->where(function ($q) use ($timeSlot) {
                    $q->where('start_time', '<', $timeSlot->end_time)
                        ->where('end_time', '>', $timeSlot->start_time);
                });
            })->count();

        if ($existingConsultation > 0) {
            return redirect()->back()->withErrors('زمان انتخابی با بازه زمانی دیگری همپوشانی دارد.');
        }
        $dateShamsi = $request->input('date');
        $dateMiladi = Verta::parse($dateShamsi)->datetime()->format('Y-m-d');
        $consultation = Consultation::findOrFail($id);
        $consultation->consultant_id = $request->consultant_id;
        $consultation->time_slot_id = $request->time_slot_id;
        $consultation->price = $request->price;
        $date =   $dateMiladi;
        $consultation->save();

        return redirect()->route('admin.consultations.index')->with('success', 'مشاوره با موفقیت به‌روزرسانی شد');
    }

    public function store(Request $request)
    {

        $request->validate([
            'time_slot_id' => 'required|exists:time_slots,id',
            'date' => 'required',
            'price' => 'required|integer',
            'consultant_id' => 'required|exists:users,id',
        ]);

        $dateShamsi = $request->input('date');
        $dateMiladi = Verta::parse($dateShamsi)->datetime()->format('Y-m-d');
        $time_slot_id = $request->input('time_slot_id');
        $consultant_id = $request->input('consultant_id');
        $date =   $dateMiladi;
        $price =  $request->input('price');
        $timeSlot = TimeSlot::find($time_slot_id);

        $existingConsultations = Consultation::where('consultant_id', $consultant_id)
            ->where('date',  $dateMiladi)
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
            'time_slot_id' => $time_slot_id,
            'date' => $date,
            'consultant_id' => $consultant_id,
            'price' => $price,
        ]);

        return redirect()->route('admin.consultations.index')->with('success', 'زمان مشاوره با موفقیت ثبت شد.');
    }

    public function destroy(Consultation $consultation)
    {
        // بررسی اینکه آیا جلسه مشاوره توسط فردی رزرو و پرداخت شده است
        if ($consultation->reservation()->where('is_paid', 1)->exists()) {
            return redirect()->back()->with('error', 'این جلسه مشاوره توسط فردی رزرو و پرداخت شده است و نمی‌توان آن را حذف کرد.');
        }

        // حذف جلسه مشاوره
        $consultation->delete();
        return redirect()->back()->with('success', 'جلسه مشاوره با موفقیت حذف شد.');
    }
}
