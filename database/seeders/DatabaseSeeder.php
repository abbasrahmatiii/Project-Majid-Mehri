<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CenterAdsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
    }
}
