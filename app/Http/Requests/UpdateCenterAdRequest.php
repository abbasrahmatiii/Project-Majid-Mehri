<?php
// app/Http/Requests/UpdateCenterAdRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCenterAdRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'وارد کردن عنوان الزامی است.',
            'title.string' => 'عنوان باید یک رشته معتبر باشد.',
            'title.max' => 'عنوان نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'description.string' => 'توضیحات باید یک رشته معتبر باشد.',
            'image.image' => 'فایل انتخابی باید یک تصویر باشد.',
            'image.mimes' => 'تصویر باید یکی از فرمت‌های jpeg, png, jpg, gif باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',
            'is_active.required' => 'وارد کردن وضعیت فعال یا غیرفعال الزامی است.',
            'is_active.boolean' => 'وضعیت فعال یا غیرفعال باید مقدار صحیح باشد.',
        ];
    }
}
