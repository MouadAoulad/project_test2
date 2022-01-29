<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            SchoolTableSeeder::class,
            GroupTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            CourseTableSeeder::class
        ]);
    }
}
