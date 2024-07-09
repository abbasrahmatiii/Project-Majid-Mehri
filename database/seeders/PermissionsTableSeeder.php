<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('permissions')->delete();

        DB::table('permissions')->insert(array(
            0 =>
            array(
                'created_at' => '2024-07-04 21:11:45',
                'display_name' => 'مدیریت کاربران',
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'manage users',
                'updated_at' => '2024-07-04 21:11:45',
            ),
            1 =>
            array(
                'created_at' => '2024-07-04 21:11:45',
                'display_name' => 'اضافه کردن کاربران',
                'guard_name' => 'web',
                'id' => 2,
                'name' => 'manage users add',
                'updated_at' => '2024-07-04 21:11:45',
            ),
            2 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'نمایش لیست کاربران',
                'guard_name' => 'web',
                'id' => 3,
                'name' => 'manage users list',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            3 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'ویرایش کاربران',
                'guard_name' => 'web',
                'id' => 4,
                'name' => 'manage users edit',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            4 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'حذف کاربران',
                'guard_name' => 'web',
                'id' => 5,
                'name' => 'manage users delete',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            5 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'مدیریت تنظیمات SEO',
                'guard_name' => 'web',
                'id' => 6,
                'name' => 'manage settings SEO',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            6 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'مدیریت تنظیمات عمومی',
                'guard_name' => 'web',
                'id' => 7,
                'name' => 'manage settings general',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            7 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'مدیریت نقش ها',
                'guard_name' => 'web',
                'id' => 8,
                'name' => 'manage roles',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            8 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'نمایش لیست نقش‌ها',
                'guard_name' => 'web',
                'id' => 9,
                'name' => 'manage roles list',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            9 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'اضافه کردن نقش‌ها',
                'guard_name' => 'web',
                'id' => 10,
                'name' => 'manage roles add',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            10 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'اختصاص نقش‌ها',
                'guard_name' => 'web',
                'id' => 11,
                'name' => 'manage assign roles',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            11 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'مدیریت اسلایدشوها',
                'guard_name' => 'web',
                'id' => 12,
                'name' => 'manage slideshows',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            12 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'اضافه کردن اسلایدشوها',
                'guard_name' => 'web',
                'id' => 13,
                'name' => 'manage slideshows add',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            13 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'نمایش لیست اسلایدشوها',
                'guard_name' => 'web',
                'id' => 14,
                'name' => 'manage slideshows list',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            14 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'ویرایش اسلایدشوها',
                'guard_name' => 'web',
                'id' => 15,
                'name' => 'manage slideshows edit',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            15 =>
            array(
                'created_at' => '2024-07-04 21:11:46',
                'display_name' => 'حذف اسلایدشوها',
                'guard_name' => 'web',
                'id' => 16,
                'name' => 'manage slideshows delete',
                'updated_at' => '2024-07-04 21:11:46',
            ),
            16 =>
            array(
                'created_at' => '2024-07-04 21:30:01',
                'display_name' => 'مدیریت پستها',
                'guard_name' => 'web',
                'id' => 17,
                'name' => 'manage Posts',
                'updated_at' => '2024-07-04 21:30:01',
            ),
            17 =>
            array(
                'created_at' => '2024-07-04 21:30:01',
                'display_name' => 'لیست پستها',
                'guard_name' => 'web',
                'id' => 18,
                'name' => 'manage Posts list',
                'updated_at' => '2024-07-04 21:32:28',
            ),
            18 =>
            array(
                'created_at' => '2024-07-04 21:30:01',
                'display_name' => 'افزودن پستها',
                'guard_name' => 'web',
                'id' => 19,
                'name' => 'manage Posts add',
                'updated_at' => '2024-07-04 21:32:28',
            ),
            19 =>
            array(
                'created_at' => '2024-07-04 21:30:01',
                'display_name' => 'ویرایش پستها',
                'guard_name' => 'web',
                'id' => 20,
                'name' => 'manage Posts edit',
                'updated_at' => '2024-07-04 21:32:28',
            ),
            20 =>
            array(
                'created_at' => '2024-07-04 21:30:01',
                'display_name' => 'حذف پستها',
                'guard_name' => 'web',
                'id' => 21,
                'name' => 'manage Posts delete',
                'updated_at' => '2024-07-04 21:32:28',
            ),
        ));
    }
}
