<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use DB;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            [
                "id" => "1",
                "name" => "Lycée HASSAN II",
                "slug" => "lyceehassan2",
            ],
            [
                "id" => "2",
                "name" => "Lycée Jaber Ibn Hayyan",
                "slug" => "lyceejaber",
            ]
        ]);

    }
}
