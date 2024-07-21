<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
=======
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // استفاده از تنظیمات پیش‌فرض در صورت عدم وجود تنظیمات در پایگاه داده
        $defaultSettings = [
            'title' => 'مرکز روان شناسی هرم',
            'description' => 'توضیحات پیش‌فرض سایت که باید جذاب و شامل کلمات کلیدی اصلی باشد.',
            'keywords' => 'کلیدواژه اول,کلیدواژه دوم,کلیدواژه سوم',
            'robots' => 'index, follow',
            'google' => 'کد تأیید گوگل',
            'bing' => 'کد تأیید بینگ',
            'alexa' => 'کد تأیید الکسا',
            'pinterest' => 'کد تأیید پینترست',
            'yandex' => 'کد تأیید یاندکس',
        ];

        // بررسی وجود جدول settings
        if (Schema::hasTable('settings')) {
            $settings = Setting::first();
            if ($settings) {
                config([
                    'seotools.meta.defaults.title' => $settings->site_title ?? $defaultSettings['title'],
                    'seotools.meta.defaults.description' => $settings->meta_description ?? $defaultSettings['description'],
                    'seotools.meta.defaults.keywords' => is_string($settings->meta_keywords) ? explode(',', $settings->meta_keywords) : explode(',', $defaultSettings['keywords']),
                    'seotools.meta.defaults.robots' => $settings->meta_robots ?? $defaultSettings['robots'],
                    'seotools.webmaster_tags.google' => $settings->google_analytics ?? $defaultSettings['google'],
                    'seotools.webmaster_tags.bing' => $settings->bing_verification ?? $defaultSettings['bing'],
                    'seotools.webmaster_tags.alexa' => $settings->alexa_verification ?? $defaultSettings['alexa'],
                    'seotools.webmaster_tags.pinterest' => $settings->pinterest_verification ?? $defaultSettings['pinterest'],
                    'seotools.webmaster_tags.yandex' => $settings->yandex_verification ?? $defaultSettings['yandex'],
                ]);
            } else {
                // استفاده از تنظیمات پیش‌فرض در صورت عدم وجود رکورد در جدول settings
                config([
                    'seotools.meta.defaults.title' => $defaultSettings['title'],
                    'seotools.meta.defaults.description' => $defaultSettings['description'],
                    'seotools.meta.defaults.keywords' => explode(',', $defaultSettings['keywords']),
                    'seotools.meta.defaults.robots' => $defaultSettings['robots'],
                    'seotools.webmaster_tags.google' => $defaultSettings['google'],
                    'seotools.webmaster_tags.bing' => $defaultSettings['bing'],
                    'seotools.webmaster_tags.alexa' => $defaultSettings['alexa'],
                    'seotools.webmaster_tags.pinterest' => $defaultSettings['pinterest'],
                    'seotools.webmaster_tags.yandex' => $defaultSettings['yandex'],
                ]);
            }
        } else {
            // استفاده از تنظیمات پیش‌فرض در صورت عدم وجود جدول settings
            config([
                'seotools.meta.defaults.title' => $defaultSettings['title'],
                'seotools.meta.defaults.description' => $defaultSettings['description'],
                'seotools.meta.defaults.keywords' => explode(',', $defaultSettings['keywords']),
                'seotools.meta.defaults.robots' => $defaultSettings['robots'],
                'seotools.webmaster_tags.google' => $defaultSettings['google'],
                'seotools.webmaster_tags.bing' => $defaultSettings['bing'],
                'seotools.webmaster_tags.alexa' => $defaultSettings['alexa'],
                'seotools.webmaster_tags.pinterest' => $defaultSettings['pinterest'],
                'seotools.webmaster_tags.yandex' => $defaultSettings['yandex'],
            ]);
        }
    }

>>>>>>> d088776b (add session link)
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
