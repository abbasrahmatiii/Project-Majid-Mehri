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

        ));
    }
}
