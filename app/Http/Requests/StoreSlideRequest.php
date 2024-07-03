<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:25',
            'description' => 'required|string|max:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120|dimensions:min_width=700,min_height=500',
            'button_text' => 'nullable|string|max:20',
            'button_url' => 'required_with:button_text|nullable|url|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان اسلاید الزامی است.',
            'title.max' => 'عنوان نباید از 25 حرف بیشتر باشد.',
            'button_text.max' => 'متن دکمه نباید از 20 کاراکتر بیشتر باشد.',
            'description.required' => 'توضیحات اسلاید الزامی است.',
            'description.max' => 'توضیحات باید حداکثر 40 کاراکتر باشد.',
            'image.max' => 'حجم تصویر نباید بیش از 5 مگابایت باشد.',
            'image.required' => 'تصویر نباید خالی باشد.',
            'image.dimensions' => 'طول تصویر نباید کمتر از 700 پیکسل و ارتفاع آن نباید کمتر از 500 پیکسل باشد.',
            'button_url.required_with' => 'هنگامی که متن دکمه وارد شده است، آدرس URL الزامی است.',
        ];
    }
}
