<?php

namespace App\Providers;

use App\Models\Contacts;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // استفاده از تنظیمات پیش‌فرض در صورت عدم وجود تنظیمات در پایگاه داده
        $defaultSettings = [
            'title' => 'مرکز روان شناسی هرم',
            'description' => 'توضیحات پیش‌فرض سایت که باید جذاب و شامل کلمات کلیدی اصلی باشد.',
            'keywords' => ['کلیدواژه اول', 'کلیدواژه دوم', 'کلیدواژه سوم'],
            'robots' => 'index, follow',
            'google' => 'کد تأیید گوگل',
            'bing' => 'کد تأیید بینگ',
            'alexa' => 'کد تأیید الکسا',
            'pinterest' => 'کد تأیید پینترست',
            'yandex' => 'کد تأیید یاندکس',
        ];

        // بارگذاری تنظیمات از پایگاه داده
        $settings = Setting::first();
        $contacts = Contacts::first();
        // ادغام تنظیمات پایگاه داده با تنظیمات پیش‌فرض
        config([
            'seotools.meta.defaults.title' => $settings->site_title,
            'seotools.meta.defaults.description' => $settings->meta_description,
            'seotools.meta.defaults.keywords' => explode(',', $settings->meta_keywords),
            'seotools.meta.defaults.robots' => $settings->meta_robots,
            'seotools.webmaster_tags.google' => $settings->google_analytics,
            'seotools.webmaster_tags.bing' => $settings['bing'],
            'seotools.webmaster_tags.alexa' => $settings['alexa'],
            'seotools.webmaster_tags.pinterest' => $settings['pinterest'],
            'seotools.webmaster_tags.yandex' => $settings['yandex'],
        ]);
    }

    public function register()
    {
        //
    }
}
