<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\UpdateSettingsRequest;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::first();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(UpdateSettingsRequest $request)
    {
        // یافتن اولین رکورد در جدول تنظیمات
        $settings = Setting::first();

        if ($settings) {
            // بروزرسانی رکورد موجود
            $settings->update($request->all());
        } else {
            // ایجاد رکورد جدید
            $settings = Setting::create($request->all());
        }

        return redirect()->back()->with('success', 'تنظیمات با موفقیت به‌روزرسانی شد.');
    }
}
