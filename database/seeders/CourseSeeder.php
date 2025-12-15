<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'program_id' => 1,
            'department_id' => 1,
            'course_code' => 'CS101',
            'course_name' => 'Introduction to Computer Science',
            'units' => 3,
        ]);

        Course::create([
            'program_id' => 1,
            'department_id' => 1,
            'course_code' => 'CS102',
            'course_name' => 'Data Structures',
            'units' => 4,
        ]);

        Course::create([
            'program_id' => 1,
            'department_id' => 1,
            'course_code' => 'CS201',
            'course_name' => 'Algorithms',
            'units' => 4,
        ]);

        Course::create([
            'program_id' => 2,
            'department_id' => 3,
            'course_code' => 'IT101',
            'course_name' => 'Information Systems Fundamentals',
            'units' => 3,
        ]);

        Course::create([
            'program_id' => 2,
            'department_id' => 3,
            'course_code' => 'IT102',
            'course_name' => 'Database Management',
            'units' => 4,
        ]);

        Course::create([
            'program_id' => 3,
            'department_id' => 2,
            'course_code' => 'ENG101',
            'course_name' => 'Engineering Mathematics I',
            'units' => 4,
        ]);

        Course::create([
            'program_id' => 3,
            'department_id' => 2,
            'course_code' => 'ENG102',
            'course_name' => 'Engineering Physics',
            'units' => 4,
        ]);

        Course::create([
            'program_id' => 5,
            'department_id' => 4,
            'course_code' => 'BUS101',
            'course_name' => 'Business Administration Basics',
            'units' => 3,
        ]);

        Course::create([
            'program_id' => 5,
            'department_id' => 4,
            'course_code' => 'BUS102',
            'course_name' => 'Financial Accounting',
            'units' => 3,
        ]);

        Course::create([
            'program_id' => 1,
            'department_id' => 5,
            'course_code' => 'MATH101',
            'course_name' => 'Calculus I',
            'units' => 4,
        ]);
    }
}
