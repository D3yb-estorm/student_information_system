<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create demo user
        User::create([
            'full_name' => 'John Dave',
            'username' => 'JohnDave',
            'email' => 'johndave@student.edu',
            'password' => '12345', // Password will be hashed automatically by mutator
            'role' => 'student',
        ]);

        // Create admin user
        User::create([
            'full_name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@student.edu',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        // Create instructor user
        User::create([
            'full_name' => 'Dr. Smith',
            'username' => 'drsmith',
            'email' => 'drsmith@student.edu',
            'password' => 'instructor123',
            'role' => 'instructor',
        ]);
    }
}
