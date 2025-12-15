<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        Program::create([
            'program_name' => 'Bachelor of Science in Computer Science',
            'degree_level' => 'bachelor',
        ]);

        Program::create([
            'program_name' => 'Bachelor of Science in Information Technology',
            'degree_level' => 'bachelor',
        ]);

        Program::create([
            'program_name' => 'Bachelor of Science in Engineering',
            'degree_level' => 'bachelor',
        ]);

        Program::create([
            'program_name' => 'Master of Science in Computer Science',
            'degree_level' => 'master',
        ]);

        Program::create([
            'program_name' => 'Associate Degree in Business Administration',
            'degree_level' => 'associate',
        ]);
    }
}
