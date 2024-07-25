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

        // فرض می‌کنیم که می‌خواهید از مقدار خاصی برای شناسایی رکورد استفاده کنید
        // برای مثال، فرض می‌کنیم که شناسه رکورد 1 باشد
        $clientSectionId = 1; // شناسه رکوردی که می‌خواهید ایجاد یا به‌روز کنید

        // استفاده از updateOrCreate
        $clientSection = ClientSection::updateOrCreate(
            ['id' => $clientSectionId], // شرط برای پیدا کردن رکورد
            $validated // مقادیر برای به‌روزرسانی یا ایجاد
        );

        return redirect()->back()->with('success', 'بخش تیم ما با موفقیت بروزرسانی شد.');
    }
}
