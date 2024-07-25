<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
            array(
                'created_at' => '2024-07-04 21:13:18',
                'email' => 'a.rahmati.dev@gmail.com',
                'email_verified_at' => NULL,
                'first_name' => 'عباس',
                'id' => 1,
                'last_name' => 'رحمتی',
                'mobile' => '09359662226',
                'password' => '$2y$10$7cN0z6X2AgwwVMumKLB7Nu5jyHoPTx5RsP80kHS9OBGzQZ8fJmiIG',
                'remember_token' => NULL,
                'updated_at' => '2024-07-05 19:02:08',
            ),
            array(
                'created_at' => '2024-07-04 21:13:18',
                'email' => 'moshaver@gmail.com',
                'email_verified_at' => NULL,
                'first_name' => 'مشاور',
                'id' => 2,
                'last_name' => 'مشاوره',
                'mobile' => '09359662326',
                'password' => '$2y$10$7cN0z6X2AgwwVMumKLB7Nu5jyHoPTx5RsP80kHS9OBGzQZ8fJmiIG',
                'remember_token' => NULL,
                'updated_at' => '2024-07-05 19:02:08',
            ),
            array(
                'created_at' => '2024-07-04 21:13:18',
                'email' => 'user1@gmail.com',
                'email_verified_at' => NULL,
                'first_name' => 'کاربر',
                'id' => 3,
                'last_name' => 'اول',
                'mobile' => '09359862326',
                'password' => '$2y$10$7cN0z6X2AgwwVMumKLB7Nu5jyHoPTx5RsP80kHS9OBGzQZ8fJmiIG',
                'remember_token' => NULL,
                'updated_at' => '2024-07-05 19:02:08',
            ),
            array(
                'created_at' => '2024-07-04 21:13:18',
                'email' => 'user2@gmail.com',
                'email_verified_at' => NULL,
                'first_name' => 'کاربر',
                'id' => 4,
                'last_name' => 'دوم',
                'mobile' => '09479862326',
                'password' => '$2y$10$7cN0z6X2AgwwVMumKLB7Nu5jyHoPTx5RsP80kHS9OBGzQZ8fJmiIG',
                'remember_token' => NULL,
                'updated_at' => '2024-07-05 19:02:08',
            ),

        ));
    }
}
