<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "id" => "1",
                "name" => "mouad",
                "email" => "mouad@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "2",
            ],
            [
                "id" => "2",
                "name" => "hatim",
                "email" => "hatim@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "2",
            ],
            [
                "id" => "3",
                "name" => "farah",
                "email" => "farah@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "3",
            ],
            [
                "id" => "4",
                "name" => "youssef",
                "email" => "youssef@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "3",
            ],
            [
                "id" => "5",
                "name" => "sanaa",
                "email" => "sanaa@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "3",
            ],
            [
                "id" => "6",
                "name" => "houssam",
                "email" => "houssam@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "3",
            ],
            [
                "id" => "7",
                "name" => "hamza",
                "email" => "hamza@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "2",
            ],
            [
                "id" => "8",
                "name" => "imad",
                "email" => "imad@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "2",
            ],
            [
                "id" => "9",
                "name" => "isam",
                "email" => "isam@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "3",
            ],
            [
                "id" => "10",
                "name" => "nouhaila",
                "email" => "nouhaila@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "3",
            ],
            [
                "id" => "11",
                "name" => "said",
                "email" => "said@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "3",
            ],
            [
                "id" => "12",
                "name" => "ayoub",
                "email" => "ayoub@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "3",
            ],
            [
                "id" => "13",
                "name" => "younes",
                "email" => "younes@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "3",
            ],
            [
                "id" => "14",
                "name" => "yassin",
                "email" => "yassin@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "3",
            ],
            [
                "id" => "15",
                "name" => "director1",
                "email" => "director1@gmail.com",
                "password" => "123456",
                "school_id" => "1",
                "role_id" => "1",
            ],
            [
                "id" => "16",
                "name" => "director2",
                "email" => "director2@gmail.com",
                "password" => "123456",
                "school_id" => "2",
                "role_id" => "1",
            ]
        ]);
    }
}
