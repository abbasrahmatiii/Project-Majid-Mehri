<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contact_email' => 'required|email',
            'mobile_number' => 'nullable|string|max:15',
            'phone_number' => 'nullable|string|max:15',
            'working_hours' => 'nullable|string|max:50',
            'working_days' => 'nullable|string|max:50',
            'copyright_text' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:png',
            'facebook_url' => 'nullable|url',
            'facebook_icon' => 'nullable|image|mimes:png',
            'telegram_url' => 'nullable|url',
            'telegram_icon' => 'nullable|image|mimes:png',
            'whatsapp_url' => 'nullable|url',
            'whatsapp_icon' => 'nullable|image|mimes:png',
            'linkedin_url' => 'nullable|url',
            'linkedin_icon' => 'nullable|image|mimes:png',
        ];
    }

    public function messages()
    {
        return [
            'contact_email.required' => 'ایمیل تماس الزامی است.',
            'contact_email.email' => 'ایمیل تماس باید یک آدرس ایمیل معتبر باشد.',
            'mobile_number.string' => 'شماره موبایل باید به صورت رشته باشد.',
            'mobile_number.max' => 'شماره موبایل نباید بیشتر از 15 کاراکتر باشد.',
            'phone_number.string' => 'شماره تلفن ثابت باید به صورت رشته باشد.',
            'phone_number.max' => 'شماره تلفن ثابت نباید بیشتر از 15 کاراکتر باشد.',
            'working_hours.string' => 'ساعت کاری باید به صورت رشته باشد.',
            'working_hours.max' => 'ساعت کاری نباید بیشتر از 50 کاراکتر باشد.',
            'working_days.string' => 'روزهای کاری باید به صورت رشته باشد.',
            'working_days.max' => 'روزهای کاری نباید بیشتر از 50 کاراکتر باشد.',
            'copyright_text.string' => 'متن کپی رایت باید به صورت رشته باشد.',
            'copyright_text.max' => 'متن کپی رایت نباید بیشتر از 255 کاراکتر باشد.',
            'logo.image' => 'لوگو باید یک تصویر باشد.',
            'logo.mimes' => 'لوگو باید یک فایل png باشد.',
            'facebook_url.url' => 'آدرس فیس بوک باید یک URL معتبر باشد.',
            'facebook_icon.image' => 'آیکون فیس بوک باید یک تصویر باشد.',
            'facebook_icon.mimes' => 'آیکون فیس بوک باید یک فایل png باشد.',
            'telegram_url.url' => 'آدرس تلگرام باید یک URL معتبر باشد.',
            'telegram_icon.image' => 'آیکون تلگرام باید یک تصویر باشد.',
            'telegram_icon.mimes' => 'آیکون تلگرام باید یک فایل png باشد.',
            'whatsapp_url.url' => 'آدرس واتس اپ باید یک URL معتبر باشد.',
            'whatsapp_icon.image' => 'آیکون واتس اپ باید یک تصویر باشد.',
            'whatsapp_icon.mimes' => 'آیکون واتس اپ باید یک فایل png باشد.',
            'linkedin_url.url' => 'آدرس لینکداین باید یک URL معتبر باشد.',
            'linkedin_icon.image' => 'آیکون لینکداین باید یک تصویر باشد.',
            'linkedin_icon.mimes' => 'آیکون لینکداین باید یک فایل png باشد.',
        ];
    }
}
