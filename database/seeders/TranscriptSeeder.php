<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transcript;

class TranscriptSeeder extends Seeder
{
    public function run(): void
    {
        Transcript::create([
            'student_id' => 1,
            'date_generated' => '2024-12-01',
            'generated_by_staff_id' => 'STAFF001',
            'file_path' => '/transcripts/student_1_transcript.pdf',
        ]);

        Transcript::create([
            'student_id' => 2,
            'date_generated' => '2024-12-01',
            'generated_by_staff_id' => 'STAFF001',
            'file_path' => '/transcripts/student_2_transcript.pdf',
        ]);

        Transcript::create([
            'student_id' => 4,
            'date_generated' => '2024-06-15',
            'generated_by_staff_id' => 'STAFF002',
            'file_path' => '/transcripts/student_4_transcript.pdf',
        ]);

        Transcript::create([
            'student_id' => 5,
            'date_generated' => '2024-12-01',
            'generated_by_staff_id' => 'STAFF001',
            'file_path' => '/transcripts/student_5_transcript.pdf',
        ]);
    }
}
