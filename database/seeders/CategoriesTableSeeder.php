<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'created_at' => '2024-07-04 21:13:54',
                'id' => 4,
                'name' => 'کنکور',
                'slug' => 'knkor',
                'updated_at' => '2024-07-04 21:13:54',
            ),
        ));
        
        
    }
}