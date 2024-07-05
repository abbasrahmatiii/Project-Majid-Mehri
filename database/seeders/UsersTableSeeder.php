<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'created_at' => '2024-07-04 21:13:18',
                'email' => 'a.rahmati.dev@gmail.com',
                'email_verified_at' => NULL,
                'first_name' => 'عباس',
                'id' => 6,
                'last_name' => 'رحمتی',
                'mobile' => '09359662226',
                'password' => '$2y$10$7cN0z6X2AgwwVMumKLB7Nu5jyHoPTx5RsP80kHS9OBGzQZ8fJmiIG',
                'remember_token' => NULL,
                'updated_at' => '2024-07-05 19:02:08',
            ),
            1 => 
            array (
                'created_at' => '2024-07-05 17:52:04',
                'email' => 's@gmail.com',
                'email_verified_at' => NULL,
                'first_name' => 'سجاد',
                'id' => 7,
                'last_name' => 'محمدی',
                'mobile' => '091012345698',
                'password' => '$2y$10$ZXMILyDxNeEVEEZcprJJ/.DSnJBI789M2BOqp4//SoHwve29YFXUa',
                'remember_token' => NULL,
                'updated_at' => '2024-07-05 17:52:04',
            ),
            2 => 
            array (
                'created_at' => '2024-07-05 18:24:24',
                'email' => 'f@gmail.com',
                'email_verified_at' => NULL,
                'first_name' => 'فرزین',
                'id' => 8,
                'last_name' => 'افشاری راد',
                'mobile' => '0912365544',
                'password' => '$2y$10$8XemIGGjHSiUJGr5QFWQmOxuRNoZd4EkCuBufdcwZ8a/.d0INQZXC',
                'remember_token' => NULL,
                'updated_at' => '2024-07-05 18:24:24',
            ),
        ));
        
        
    }
}