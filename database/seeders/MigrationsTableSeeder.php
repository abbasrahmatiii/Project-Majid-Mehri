<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'batch' => 1,
                'id' => 1,
                'migration' => '2014_10_12_100000_create_password_resets_table',
            ),
            1 => 
            array (
                'batch' => 1,
                'id' => 2,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
            ),
            2 => 
            array (
                'batch' => 1,
                'id' => 3,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
            ),
            3 => 
            array (
                'batch' => 1,
                'id' => 4,
                'migration' => '2024_06_26_164142_create_users_table',
            ),
            4 => 
            array (
                'batch' => 1,
                'id' => 5,
                'migration' => '2024_06_27_075528_add_remember_token_to_users_table',
            ),
            5 => 
            array (
                'batch' => 1,
                'id' => 6,
                'migration' => '2024_06_27_133912_create_settings_table',
            ),
            6 => 
            array (
                'batch' => 1,
                'id' => 7,
                'migration' => '2024_06_27_162521_create_slides_table',
            ),
            7 => 
            array (
                'batch' => 1,
                'id' => 8,
                'migration' => '2024_06_28_075101_add_is_active_to_slides_table',
            ),
            8 => 
            array (
                'batch' => 1,
                'id' => 9,
                'migration' => '2024_06_28_140938_create_contacts_table',
            ),
            9 => 
            array (
                'batch' => 1,
                'id' => 10,
                'migration' => '2024_06_28_190225_create_center_ads_table',
            ),
            10 => 
            array (
                'batch' => 1,
                'id' => 11,
                'migration' => '2024_06_30_182946_create_permission_tables',
            ),
            11 => 
            array (
                'batch' => 1,
                'id' => 12,
                'migration' => '2024_07_03_083934_add_display_name_to_permissions_table',
            ),
            12 => 
            array (
                'batch' => 1,
                'id' => 13,
                'migration' => '2024_07_03_173343_create_categories_table',
            ),
            13 => 
            array (
                'batch' => 1,
                'id' => 14,
                'migration' => '2024_07_03_173344_create_posts_table',
            ),
            14 => 
            array (
                'batch' => 1,
                'id' => 15,
                'migration' => '2024_07_03_173348_create_comments_table',
            ),
            15 => 
            array (
                'batch' => 2,
                'id' => 16,
                'migration' => '2024_07_05_135844_add_parent_id_and_approved_to_comments_table',
            ),
            16 => 
            array (
                'batch' => 3,
                'id' => 17,
                'migration' => '2024_07_05_144907_add_approval_columns_to_comments_table',
            ),
        ));
        
        
    }
}