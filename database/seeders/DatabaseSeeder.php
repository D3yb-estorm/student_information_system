<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed user data first
        $this->call([
            UserSeeder::class,
        ]);

        // Seed academic system data
        $this->call([
            ProgramSeeder::class,
            DepartmentSeeder::class,
            InstructorSeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
            ClassSectionSeeder::class,
            EnrollmentSeeder::class,
            TranscriptSeeder::class,
            AuditLogSeeder::class,
        ]);
    }
}
