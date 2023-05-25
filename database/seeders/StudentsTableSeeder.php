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
                'name' => 'Omer Ali',
                'email' => 'Omer.ali@example.com',
                'department' => 'Computer Science',
            ],
            [
                'name' => ' Ahmet Demir',
                'email' => ' ahmet.demir@example.com',
                'department' => 'Physics',
            ],
            [
                'name' => 'Elif Yılmaz',
                'email' => 'elif.yilmaz@example.com',
                'department' => 'Mathematics',
            ],
            [
                'name' => 'Fatima Kaya',
                'email' => 'fatima.kaya@example.com',
                'department' => 'Chemistry',
            ],
            [
                'name' => 'Kemal Davis',
                'email' => 'kemal.davis@example.com',
                'department' => 'Biology',
            ],
        ]);


    }
}
