<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define permissions
        $permissions = [
            // User Management
            ['name' => 'dashboard', 'display_name' => 'داشبرد مدیریت'],
            // User Management
            ['name' => 'manage users', 'display_name' => 'مدیریت کاربران'],
            ['name' => 'manage users add', 'display_name' => 'اضافه کردن کاربران'],
            ['name' => 'manage users list', 'display_name' => 'نمایش لیست کاربران'],
            ['name' => 'manage users edit', 'display_name' => 'ویرایش کاربران'],
            ['name' => 'manage users delete', 'display_name' => 'حذف کاربران'],
            ['name' => 'manage assign roles', 'display_name' => 'اختصاص نقش‌ها'],

            // Settings Management
            ['name' => 'manage settings SEO', 'display_name' => 'مدیریت تنظیمات SEO'],
            ['name' => 'manage settings general', 'display_name' => 'مدیریت تنظیمات عمومی'],

            // Role Management
            ['name' => 'manage roles', 'display_name' => 'مدیریت نقش‌ها'],
            ['name' => 'manage roles list', 'display_name' => 'نمایش لیست نقش‌ها'],
            ['name' => 'manage roles add', 'display_name' => 'اضافه کردن نقش‌ها'],
            ['name' => 'manage roles edit', 'display_name' => 'ویرایش نقش‌ها'],
            ['name' => 'manage roles delete', 'display_name' => 'حذف نقش‌ها'],

            // Role Management
            ['name' => 'manage articles', 'display_name' => 'مدیریت مقالات'],
            ['name' => 'manage articles list', 'display_name' => 'نمایش لیست مقالات'],
            ['name' => 'manage articles add', 'display_name' => 'اضافه کردن مقاله'],
            ['name' => 'manage articles edit', 'display_name' => 'ویرایش مقالات'],
            ['name' => 'manage articles delete', 'display_name' => 'حذف مقالات'],

            // Permission Management
            ['name' => 'manage permissions', 'display_name' => 'مدیریت دسترسی‌ها'],
            ['name' => 'manage permissions list', 'display_name' => 'نمایش لیست دسترسی‌ها'],
            ['name' => 'manage permissions add', 'display_name' => 'اضافه کردن دسترسی‌ها'],
            ['name' => 'manage permissions edit', 'display_name' => 'ویرایش دسترسی‌ها'],
            ['name' => 'manage permissions delete', 'display_name' => 'حذف دسترسی‌ها'],

            // Slideshow Management
            ['name' => 'manage slideshows', 'display_name' => 'مدیریت اسلایدشوها'],
            ['name' => 'manage slideshows add', 'display_name' => 'اضافه کردن اسلایدشوها'],
            ['name' => 'manage slideshows list', 'display_name' => 'نمایش لیست اسلایدشوها'],
            ['name' => 'manage slideshows edit', 'display_name' => 'ویرایش اسلایدشوها'],
            ['name' => 'manage slideshows delete', 'display_name' => 'حذف اسلایدشوها'],

            // CenterAds Management
            ['name' => 'manage centerads', 'display_name' => 'مدیریت تبلیغات مرکزی'],
            ['name' => 'manage centerads add', 'display_name' => 'اضافه کردن تبلیغات مرکزی'],
            ['name' => 'manage centerads list', 'display_name' => 'نمایش لیست تبلیغات مرکزی'],
            ['name' => 'manage centerads edit', 'display_name' => 'ویرایش تبلیغات مرکزی'],
            ['name' => 'manage centerads delete', 'display_name' => 'حذف تبلیغات مرکزی'],

            // Post Management
            ['name' => 'manage posts', 'display_name' => 'مدیریت پست‌ها'],
            ['name' => 'manage posts add', 'display_name' => 'افزودن پست‌ها'],
            ['name' => 'manage posts list', 'display_name' => 'لیست پست‌ها'],
            ['name' => 'manage posts edit', 'display_name' => 'ویرایش پست‌ها'],
            ['name' => 'manage posts delete', 'display_name' => 'حذف پست‌ها'],

            // Category Management
            ['name' => 'manage categories', 'display_name' => 'مدیریت دسته‌بندی‌ها'],
            ['name' => 'manage categories add', 'display_name' => 'افزودن دسته‌بندی‌ها'],
            ['name' => 'manage categories list', 'display_name' => 'لیست دسته‌بندی‌ها'],
            ['name' => 'manage categories edit', 'display_name' => 'ویرایش دسته‌بندی‌ها'],
            ['name' => 'manage categories delete', 'display_name' => 'حذف دسته‌بندی‌ها'],

            // Page Management
            ['name' => 'manage pages', 'display_name' => 'مدیریت صفحات'],
            ['name' => 'manage pages add', 'display_name' => 'افزودن صفحات'],
            ['name' => 'manage pages list', 'display_name' => 'لیست صفحات'],
            ['name' => 'manage pages edit', 'display_name' => 'ویرایش صفحات'],
            ['name' => 'manage pages delete', 'display_name' => 'حذف صفحات'],

            // Consultation Management
            ['name' => 'manage consultations', 'display_name' => 'مدیریت مشاوره‌ها'],
            ['name' => 'manage consultations add', 'display_name' => 'افزودن مشاوره‌ها'],
            ['name' => 'manage consultations list', 'display_name' => 'لیست مشاوره‌ها'],
            ['name' => 'manage consultations edit', 'display_name' => 'ویرایش مشاوره‌ها'],
            ['name' => 'manage consultations delete', 'display_name' => 'حذف مشاوره‌ها'],

            // Reservation Management
            ['name' => 'manage reservations', 'display_name' => 'مدیریت رزروها'],
            ['name' => 'manage reservations list', 'display_name' => 'لیست رزروها'],
            ['name' => 'manage reservations delete', 'display_name' => 'حذف رزروها'],

            // Testimonial Management
            ['name' => 'manage comments', 'display_name' => 'مدیریت کامنت کاربران'],
            ['name' => 'manage comments delete', 'display_name' => 'حذف کامنت کاربران'],

            // Time Slot Management
            ['name' => 'manage time slots', 'display_name' => 'مدیریت بازه‌های زمانی'],
            ['name' => 'manage time slots add', 'display_name' => 'افزودن بازه‌های زمانی'],
            ['name' => 'manage time slots list', 'display_name' => 'لیست بازه‌های زمانی'],
            ['name' => 'manage time slots edit', 'display_name' => 'ویرایش بازه‌های زمانی'],
            ['name' => 'manage time slots delete', 'display_name' => 'حذف بازه‌های زمانی'],

            // Testimonial Management
            ['name' => 'manage testimonials', 'display_name' => 'مدیریت نظرات کاربران'],
            ['name' => 'manage testimonials add', 'display_name' => 'افزودن نظرات کاربران'],
            ['name' => 'manage testimonials list', 'display_name' => 'لیست نظرات کاربران'],
            ['name' => 'manage testimonials edit', 'display_name' => 'ویرایش نظرات کاربران'],
            ['name' => 'manage testimonials delete', 'display_name' => 'حذف نظرات کاربران'],
            // Role Management
            ['name' => 'manage roles', 'display_name' => 'مدیریت نقش کاربران'],
            ['name' => 'manage roles add', 'display_name' => 'افزودن نقش کاربران'],
            ['name' => 'manage roles list', 'display_name' => 'لیست نقش کاربران'],
            ['name' => 'manage roles edit', 'display_name' => 'ویرایش نقش کاربران'],
            ['name' => 'manage roles delete', 'display_name' => 'حذف نقش کاربران'],
            // Help Settings
            ['name' => 'manage help settings', 'display_name' => 'مدیریت تنظیمات راهنما'],
            // Help Settings
            ['name' => 'manage who-we-are edit', 'display_name' => 'ویرایش بخش ما چه کسی هستیم'],
            ['name' => 'manage who-we-are', 'display_name' => 'مدیریت بخش ما چه کسی هستیم'],

            // Client Section
            ['name' => 'manage client section', 'display_name' => 'مدیریت بخش مشتریان'],
        ];

        // Insert permissions into the database if they do not exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission['name'], 'guard_name' => 'web'], ['display_name' => $permission['display_name']]);
        }
    }
}
