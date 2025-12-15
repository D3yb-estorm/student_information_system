<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorSeeder extends Seeder
{
    public function run(): void
    {
        Instructor::create([
            'department_id' => 1,
            'first_name' => 'Dr. Robert',
            'last_name' => 'Johnson',
            'email' => 'robert.johnson@faculty.edu',
            'role' => 'professor',
        ]);

        Instructor::create([
            'department_id' => 1,
            'first_name' => 'Prof. Patricia',
            'last_name' => 'Williams',
            'email' => 'patricia.williams@faculty.edu',
            'role' => 'associate_professor',
        ]);

        Instructor::create([
            'department_id' => 2,
            'first_name' => 'Dr. Michael',
            'last_name' => 'Brown',
            'email' => 'michael.brown@faculty.edu',
            'role' => 'professor',
        ]);

        Instructor::create([
            'department_id' => 3,
            'first_name' => 'Mr. James',
            'last_name' => 'Miller',
            'email' => 'james.miller@faculty.edu',
            'role' => 'assistant_professor',
        ]);

        Instructor::create([
            'department_id' => 4,
            'first_name' => 'Ms. Jennifer',
            'last_name' => 'Davis',
            'email' => 'jennifer.davis@faculty.edu',
            'role' => 'lecturer',
        ]);

        Instructor::create([
            'department_id' => 5,
            'first_name' => 'Mr. David',
            'last_name' => 'Martinez',
            'email' => 'david.martinez@faculty.edu',
            'role' => 'instructor',
        ]);
    }
}
