<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'required|string',
            'Consultation_id' => 'required|exists:consultations,id'
        ]);

        Feedback::create([
            'user_id' => auth()->id(),
            'Consultation_id' => $request->Consultation_id,
            'rating' => $request->rating,
            'comments' => $request->comments
        ]);

        return redirect()->back()->with('success', 'نظر شما با موفقیت ثبت شد.');
    }
}
