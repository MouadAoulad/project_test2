<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                "id" => "1",
                "name" => "Director",
            ],
            [
                "id" => "2",
                "name" => "Teacher",
            ],
            [
                "id" => "3",
                "name" => "Student",
            ]
        ]);
    }
}
