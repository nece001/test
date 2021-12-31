<?php

namespace Database\Seeders;

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
        $this->call(AdminRoleMenuTableSeeder::class);
        $this->call(ActivityTypesTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(AdminRolePermissionsTableSeeder::class);
        $this->call(CallIdsTableSeeder::class);
        $this->call(TplNosTableSeeder::class);
    }
}
