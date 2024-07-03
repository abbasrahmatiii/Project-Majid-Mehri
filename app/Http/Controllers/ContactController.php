<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactRequest;
use App\Models\Contacts;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contacts::first();
        return view('admin.settings.contact', compact('contact'));
    }

    public function update(UpdateContactRequest $request)
    {
        // حذف مقادیر مربوط به فایل های SVG از داده های درخواست
        $data = $request->except(['logo', 'facebook_icon', 'telegram_icon', 'whatsapp_icon', 'linkedin_icon']);

        // ایجاد یا به‌روزرسانی رکورد در دیتابیس
        $contact = Contacts::updateOrCreate([], $data);

        // به‌روزرسانی لوگو در صورت وجود فایل
        if ($request->hasFile('logo')) {
            // حذف لوگوی قدیمی در صورت وجود
            if ($contact->logo) {
                Storage::delete('public/' . $contact->logo);
            }
            // ذخیره لوگوی جدید
            $logo = $request->file('logo')->store('public/logos');
            $contact->update(['logo' => str_replace('public/', '', $logo)]);
        }

        // به‌روزرسانی آیکون فیسبوک در صورت وجود فایل
        if ($request->hasFile('facebook_icon')) {
            // حذف آیکون قدیمی فیسبوک در صورت وجود
            if ($contact->facebook_icon) {
                Storage::delete('public/' . $contact->facebook_icon);
            }
            // ذخیره آیکون جدید فیسبوک
            $facebookIcon = $request->file('facebook_icon')->store('public/icons');
            $contact->update(['facebook_icon' => str_replace('public/', '', $facebookIcon)]);
        }

        // به‌روزرسانی آیکون تلگرام در صورت وجود فایل
        if ($request->hasFile('telegram_icon')) {
            // حذف آیکون قدیمی تلگرام در صورت وجود
            if ($contact->telegram_icon) {
                Storage::delete('public/' . $contact->telegram_icon);
            }
            // ذخیره آیکون جدید تلگرام
            $telegramIcon = $request->file('telegram_icon')->store('public/icons');
            $contact->update(['telegram_icon' => str_replace('public/', '', $telegramIcon)]);
        }

        // به‌روزرسانی آیکون واتس اپ در صورت وجود فایل
        if ($request->hasFile('whatsapp_icon')) {
            // حذف آیکون قدیمی واتس اپ در صورت وجود
            if ($contact->whatsapp_icon) {
                Storage::delete('public/' . $contact->whatsapp_icon);
            }
            // ذخیره آیکون جدید واتس اپ
            $whatsappIcon = $request->file('whatsapp_icon')->store('public/icons');
            $contact->update(['whatsapp_icon' => str_replace('public/', '', $whatsappIcon)]);
        }

        // به‌روزرسانی آیکون لینکداین در صورت وجود فایل
        if ($request->hasFile('linkedin_icon')) {
            // حذف آیکون قدیمی لینکداین در صورت وجود
            if ($contact->linkedin_icon) {
                Storage::delete('public/' . $contact->linkedin_icon);
            }
            // ذخیره آیکون جدید لینکداین
            $linkedinIcon = $request->file('linkedin_icon')->store('public/icons');
            $contact->update(['linkedin_icon' => str_replace('public/', '', $linkedinIcon)]);
        }

        return redirect()->back()->with('success', 'تنظیمات با موفقیت به‌روزرسانی شد.');
    }
}
