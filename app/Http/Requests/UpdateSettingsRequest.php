<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // در اینجا می‌توانید منطق مجوز را تعیین کنید
        // برای مثال: return auth()->user()->isAdmin();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'address' => 'nullable|string',
            'additional_header_tags' => 'nullable|string',
            'additional_footer_tags' => 'nullable|string',
            'seo_site_name' => 'nullable|string',
            'default_keyword' => 'nullable|string',
            'meta_robots' => 'nullable|string',
            'google_analytics' => 'nullable|string',
        ];
    }
}
