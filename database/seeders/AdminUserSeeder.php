<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{

    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Mohamed',
            'email' => 'Mohamed@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Mm112233'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'Admin',
            'is_admin' => 1, // Set the "is_admin" field to 1 for the admin user
        ]);
    }


}

