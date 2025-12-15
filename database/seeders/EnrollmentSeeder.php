<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        Enrollment::create([
            'student_id' => 1,
            'section_id' => 1,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => 3.5,
            'grade_remarks' => 'Excellent performance',
        ]);

        Enrollment::create([
            'student_id' => 1,
            'section_id' => 4,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => null,
            'grade_remarks' => null,
        ]);

        Enrollment::create([
            'student_id' => 2,
            'section_id' => 2,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => 3.0,
            'grade_remarks' => 'Good performance',
        ]);

        Enrollment::create([
            'student_id' => 2,
            'section_id' => 7,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => null,
            'grade_remarks' => null,
        ]);

        Enrollment::create([
            'student_id' => 3,
            'section_id' => 1,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => 2.8,
            'grade_remarks' => 'Satisfactory',
        ]);

        Enrollment::create([
            'student_id' => 3,
            'section_id' => 6,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => null,
            'grade_remarks' => null,
        ]);

        Enrollment::create([
            'student_id' => 4,
            'section_id' => 3,
            'date_enrolled' => '2024-02-15',
            'status' => 'completed',
            'grade' => 3.2,
            'grade_remarks' => 'Good',
        ]);

        Enrollment::create([
            'student_id' => 5,
            'section_id' => 1,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => 3.7,
            'grade_remarks' => 'Outstanding',
        ]);

        Enrollment::create([
            'student_id' => 5,
            'section_id' => 5,
            'date_enrolled' => '2024-09-01',
            'status' => 'active',
            'grade' => null,
            'grade_remarks' => null,
        ]);
    }
}
