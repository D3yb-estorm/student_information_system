<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassSection;

class ClassSectionSeeder extends Seeder
{
    public function run(): void
    {
        ClassSection::create([
            'course_id' => 1,
            'instructor_id' => 1,
            'section_code' => 'A',
            'schedule' => 'MWF 10:00-11:00',
            'room' => 'CS101',
            'capacity' => 40,
            'semester' => 1,
            'academic_year' => 2024,
        ]);

        ClassSection::create([
            'course_id' => 1,
            'instructor_id' => 2,
            'section_code' => 'B',
            'schedule' => 'TTh 14:00-15:30',
            'room' => 'CS102',
            'capacity' => 35,
            'semester' => 1,
            'academic_year' => 2024,
        ]);

        ClassSection::create([
            'course_id' => 2,
            'instructor_id' => 1,
            'section_code' => 'A',
            'schedule' => 'MWF 11:00-12:00',
            'room' => 'CS103',
            'capacity' => 40,
            'semester' => 2,
            'academic_year' => 2024,
        ]);

        ClassSection::create([
            'course_id' => 4,
            'instructor_id' => 4,
            'section_code' => 'A',
            'schedule' => 'TTh 10:00-11:30',
            'room' => 'IT101',
            'capacity' => 45,
            'semester' => 1,
            'academic_year' => 2024,
        ]);

        ClassSection::create([
            'course_id' => 5,
            'instructor_id' => 4,
            'section_code' => 'A',
            'schedule' => 'MWF 13:00-14:00',
            'room' => 'IT102',
            'capacity' => 40,
            'semester' => 2,
            'academic_year' => 2024,
        ]);

        ClassSection::create([
            'course_id' => 6,
            'instructor_id' => 3,
            'section_code' => 'A',
            'schedule' => 'MWF 09:00-10:00',
            'room' => 'ENG101',
            'capacity' => 50,
            'semester' => 1,
            'academic_year' => 2024,
        ]);

        ClassSection::create([
            'course_id' => 8,
            'instructor_id' => 5,
            'section_code' => 'A',
            'schedule' => 'TTh 11:00-12:30',
            'room' => 'BUS101',
            'capacity' => 50,
            'semester' => 1,
            'academic_year' => 2024,
        ]);
    }
}
