<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            // Original messages from standard users
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'parent_id' => null,
                'subject' => 'Assignment Submission',
                'content' => 'Can I submit my assignment late?',
                'is_read' => false,
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 1,
                'parent_id' => null,
                'subject' => 'Midterm Project Deadline',
                'content' => 'When is the deadline for the midterm project?',
                'is_read' => false,
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'parent_id' => null,
                'subject' => 'Advisor Meeting',
                'content' => 'How can I schedule a meeting with my advisor?',
                'is_read' => true,
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 1,
                'parent_id' => null,
                'subject' => 'Textbook Recommendation',
                'content' => 'What is the recommended textbook for the course?',
                'is_read' => true,
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'parent_id' => null,
                'subject' => 'Extra Credit Opportunities',
                'content' => 'Are there any extra credit opportunities?',
                'is_read' => false,
            ],
            // Replies from the administrator
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'parent_id' => 1,
                'subject' => ' Assignment Submission',
                'content' => 'Unfortunately, late submissions are not accepted.',
                'is_read' => false,
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 3,
                'parent_id' => 2,
                'subject' => ' Midterm Project Deadline',
                'content' => 'The deadline for the midterm project is June 15th.',
                'is_read' => false,
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'parent_id' => 3,
                'subject' => ' Advisor Meeting',
                'content' => 'Please email your advisor directly to schedule a meeting.',
                'is_read' => true,
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 3,
                'parent_id' => 4,
                'subject' => ' Textbook Recommendation',
                'content' => 'The recommended textbook for the course is "Fundamentals of Programming" by John Smith.',
                'is_read' => true,
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'parent_id' => 5,
                'subject' => ' Extra Credit Opportunities',
                'content' => 'There are no extra credit opportunities at the moment, but we will notify you if any become available.',
                'is_read' => false,
            ],
                ];
                foreach ($messages as $message) {
                    DB::table('messages')->insert(array_merge($message, [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]));
                }
    }
}
