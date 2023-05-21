<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('students')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'department' => 'Computer Science',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'department' => 'Physics',
            ],
            [
                'name' => 'Alice Brown',
                'email' => 'alice.brown@example.com',
                'department' => 'Mathematics',
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob.johnson@example.com',
                'department' => 'Chemistry',
            ],
            [
                'name' => 'Charlie Davis',
                'email' => 'charlie.davis@example.com',
                'department' => 'Biology',
            ],
        ]);


    }
}
