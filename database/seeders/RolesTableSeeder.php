<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            0 =>
            array(
                'created_at' => '2024-07-04 21:11:39',
                'guard_name' => 'web',
                'id' => 1,
                'name' => 'مدیر کل',
                'updated_at' => '2024-07-04 21:11:39',
            ),
            1 =>
            array(
                'created_at' => '2024-07-04 21:11:39',
                'guard_name' => 'web',
                'id' => 2,
                'name' => 'کاربر عادی',
                'updated_at' => '2024-07-04 21:11:39',
            ),
            2 =>
            array(
                'created_at' => '2024-07-04 21:34:13',
                'guard_name' => 'web',
                'id' => 3,
                'name' => 'نویسنده',
                'updated_at' => '2024-07-04 21:34:13',
            ),
            3 =>
            array(
                'created_at' => '2024-07-04 21:11:39',
                'guard_name' => 'web',
                'id' => 4,
                'name' => 'مشاور',
                'updated_at' => '2024-07-04 21:11:39',
            ),
        ));
    }
}
