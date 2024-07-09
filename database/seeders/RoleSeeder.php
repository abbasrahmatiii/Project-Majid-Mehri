<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'مدیر کل']);
        $roleUser = Role::create(['name' => 'کاربر عادی']);
        $roleUser = Role::create(['name' => 'مشاور']);
    }
}
