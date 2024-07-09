<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('role_has_permissions')->delete();

        DB::table('role_has_permissions')->insert(array(
            0 =>
            array(
                'permission_id' => 1,
                'role_id' => 3,
            ),
            1 =>
            array(
                'permission_id' => 18,
                'role_id' => 3,
            ),
        ));
    }
}
