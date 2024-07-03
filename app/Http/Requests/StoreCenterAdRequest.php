<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCenterAdRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:80',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان الزامی است.',
            'title.string' => 'عنوان باید یک رشته باشد.',
            'title.max' => 'عنوان نباید بیش از 50 کاراکتر باشد.',
            'description.required' => 'توضیحات الزامی است.',
            'description.string' => 'توضیحات باید یک رشته باشد.',
            'image.required' => 'تصویر الزامی است.',
            'image.image' => 'فایل باید یک تصویر باشد.',
            'image.mimes' => 'تصویر باید یکی از فرمت‌های jpeg, png, jpg, gif باشد.',
            'image.max' => 'اندازه تصویر نباید بیش از ۲ مگابایت باشد.',
            'is_active.boolean' => 'فیلد فعال بودن باید مقدار درست یا نادرست داشته باشد.',
        ];
    }
}
