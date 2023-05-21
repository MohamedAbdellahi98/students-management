<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StandardUserSeeder extends Seeder
{

    public function run()
    {
        \DB::table('users')->insert([
        [
            'name' => 'Kalid',
            'email' => 'Kalid@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'standard',
            'is_admin' => 0,
        ],
        [
            'name' => 'Yehye',
            'email' => 'Yehye@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'standard',
            'is_admin' => 0,

        ],
    ]);

    }
}

