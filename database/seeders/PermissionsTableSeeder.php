<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // لیست مجوزها
        $permissions = [
            ['name' => 'manage users', 'display_name' => 'مدیریت کاربران'],
            ['name' => 'manage users add', 'display_name' => 'اضافه کردن کاربران'],
            ['name' => 'manage users list', 'display_name' => 'نمایش لیست کاربران'],
            ['name' => 'manage users edit', 'display_name' => 'ویرایش کاربران'],
            ['name' => 'manage users delete', 'display_name' => 'حذف کاربران'],
            ['name' => 'manage settings SEO', 'display_name' => 'مدیریت تنظیمات SEO'],
            ['name' => 'manage settings general', 'display_name' => 'مدیریت تنظیمات عمومی'],
            ['name' => 'manage roles', 'display_name' => 'مدیریت نقش ها'],
            ['name' => 'manage roles list', 'display_name' => 'نمایش لیست نقش‌ها'],
            ['name' => 'manage roles add', 'display_name' => 'اضافه کردن نقش‌ها'],
            ['name' => 'manage assign roles', 'display_name' => 'اختصاص نقش‌ها'],
            ['name' => 'manage slideshows', 'display_name' => 'مدیریت اسلایدشوها'],
            ['name' => 'manage slideshows add', 'display_name' => 'اضافه کردن اسلایدشوها'],
            ['name' => 'manage slideshows list', 'display_name' => 'نمایش لیست اسلایدشوها'],
            ['name' => 'manage slideshows edit', 'display_name' => 'ویرایش اسلایدشوها'],
            ['name' => 'manage slideshows delete', 'display_name' => 'حذف اسلایدشوها'],

     
            // مجوزهای ثابت دیگر
        ];

        // ایجاد مجوزها
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['display_name' => $permission['display_name'], 'guard_name' => 'web']
            );
        }
    }
}
