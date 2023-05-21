<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcements = [
            [
                'title' => 'Announcement 1',
                'content' => 'Welcome to the new academic year!',
                'created_at' => now(),
            ],
            [
                'title' => 'Announcement 2',
                'content' => 'Midterm exams schedule is now available.',
                'created_at' => now(),
            ],
            [
                'title' => 'Announcement 3',
                'content' => 'Registration for elective courses is now open.',
                'created_at' => now(),
            ],
            [
                'title' => 'Announcement 4',
                'content' => 'A guest lecture on AI in education will take place next week.',
                'created_at' => now(),
            ],
            [
                'title' => 'Announcement 5',
                'content' => 'The annual student conference is accepting submissions.',
                'created_at' => now(),
            ],
        ];

        foreach ($announcements as $announcement) {
            DB::table('announcements')->insert($announcement);
        }
    }
}
