<?php

// app/Http/Controllers/Admin/ClientSectionController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClientSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientSectionController extends Controller
{
    public function edit()
    {
        $clientSection = ClientSection::first();
        return view('admin.our-team.edit', compact('clientSection'));
    }

    public function update(Request $request)
    {
        $messages = [
            'title.string' => 'عنوان باید یک رشته باشد.',
            'description.string' => 'توضیحات باید یک رشته باشد.',
            'button_text.string' => 'متن دکمه باید یک رشته باشد.',
            'button_url.url' => 'آدرس دکمه باید یک URL معتبر باشد.',
        ];

        $validated = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|url',
        ], $messages);

        $clientSection = ClientSection::firstOrFail();

        $clientSection->update($validated);
        return redirect()->back()->with('success', 'بخش تیم ما با موفقیت بروزرسانی شد.');
    }
}
