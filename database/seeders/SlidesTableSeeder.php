<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('slides')->delete();

        DB::table('slides')->insert(array(
            0 =>
            array(
                'button_text' => 'بیشتر بخوانید',
                'button_url' => 'https://coinmarketcap.c',
                'created_at' => '2024-07-04 21:36:35',
                'description' => 'توضیحات باید حداکثر 80 کاراکتر باشد',
                'id' => 1,
                'image' => 'images/1720128995.jpg',
                'is_active' => 1,
                'title' => 'با ما به قله ها بیاندیشید',
                'updated_at' => '2024-07-04 21:36:35',
            ),
        ));
    }
}
