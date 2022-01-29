<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                "title" => "big data analytics",
                "description" => "big data analytics big data analytics big data analytics",
                "owner_id" => "1",
            ],
            [
                "title" => "data warehouse",
                "description" => "data warehouse data warehouse data warehouse data warehouse",
                "owner_id" => "1"
            ],
            [
                "title" => "database management system",
                "description" => "database management system database management system",
                "owner_id" => "1"
            ],
            [
                "title" => "programming languages",
                "description" => "lyceehassan2",
                "owner_id" => "7"
            ],
            [
                "title" => "business intelligence",
                "description" => "business intelligence and big data analytics",
                "owner_id" => "7"
            ],
            [
                "title" => "artificial intelligence",
                "description" => "artificial intelligence and machine learning",
                "owner_id" => "7"
            ]
        ]);
    }
}
