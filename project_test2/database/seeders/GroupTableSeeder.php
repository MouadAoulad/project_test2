<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                "name" => "data",
            ],
            [
                "name" => "machine learning",
            ],
            [
                "name" => "management system",
            ]
        ]);
    }
}
