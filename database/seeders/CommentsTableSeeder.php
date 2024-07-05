<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:01',
                'approved_by' => 6,
                'content' => 'عنه',
                'created_at' => '2024-07-05 18:21:49',
                'id' => 25,
                'parent_id' => NULL,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:01',
                'user_id' => 7,
            ),
            1 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:07',
                'approved_by' => 6,
                'content' => 'خودتی عن',
                'created_at' => '2024-07-05 18:22:20',
                'id' => 26,
                'parent_id' => 25,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:07',
                'user_id' => 6,
            ),
            2 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:08',
                'approved_by' => 6,
                'content' => 'باباته',
                'created_at' => '2024-07-05 18:22:52',
                'id' => 27,
                'parent_id' => 26,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:08',
                'user_id' => 7,
            ),
            3 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:09',
                'approved_by' => 6,
                'content' => 'جد و ابادته',
                'created_at' => '2024-07-05 18:23:26',
                'id' => 28,
                'parent_id' => 27,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:09',
                'user_id' => 6,
            ),
            4 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:09',
                'approved_by' => 6,
                'content' => 'چی میگی بابا',
                'created_at' => '2024-07-05 18:24:51',
                'id' => 29,
                'parent_id' => 25,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:09',
                'user_id' => 8,
            ),
            5 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:10',
                'approved_by' => 6,
                'content' => 'گوه میخورد',
                'created_at' => '2024-07-05 18:25:26',
                'id' => 30,
                'parent_id' => 29,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:10',
                'user_id' => 6,
            ),
            6 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:10',
                'approved_by' => 6,
                'content' => 'بیاد اینو بخوره',
                'created_at' => '2024-07-05 18:28:30',
                'id' => 31,
                'parent_id' => 30,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:10',
                'user_id' => 8,
            ),
            7 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:15',
                'approved_by' => 6,
                'content' => 'تو گوه نخور عزیزم',
                'created_at' => '2024-07-05 18:36:18',
                'id' => 32,
                'parent_id' => 31,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:15',
                'user_id' => 6,
            ),
            8 => 
            array (
                'approved' => 1,
                'approved_at' => '2024-07-05 19:29:16',
                'approved_by' => 6,
                'content' => 'بهترین پست بود',
                'created_at' => '2024-07-05 18:36:29',
                'id' => 33,
                'parent_id' => NULL,
                'post_id' => 4,
                'updated_at' => '2024-07-05 19:29:16',
                'user_id' => 8,
            ),
        ));
        
        
    }
}