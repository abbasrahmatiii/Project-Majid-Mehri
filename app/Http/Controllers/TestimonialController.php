<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $users = User::with('profile')->get();
        return view('admin.testimonials.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Testimonial::create($validated);

        return redirect()->route('testimonials.index');
    }


    public function edit(Testimonial $testimonial)
    {
        $users = User::all();

        return view('admin.testimonials.edit', compact('testimonial', 'users'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|image'
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('images');
        }

        $testimonial->update($validated);

        return redirect()->route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonials.index');
    }
}
