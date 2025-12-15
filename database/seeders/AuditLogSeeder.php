<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AuditLog;

class AuditLogSeeder extends Seeder
{
    public function run(): void
    {
        AuditLog::create([
            'staff_id' => 'ADMIN001',
            'action' => 'created',
            'entity' => 'Student',
            'entity_id' => 1,
            'details' => 'Created new student: John Doe',
            'timestamp' => now()->subDays(10),
        ]);

        AuditLog::create([
            'staff_id' => 'ADMIN001',
            'action' => 'created',
            'entity' => 'Program',
            'entity_id' => 1,
            'details' => 'Created new program: Bachelor of Science in Computer Science',
            'timestamp' => now()->subDays(15),
        ]);

        AuditLog::create([
            'staff_id' => 'ADMIN002',
            'action' => 'created',
            'entity' => 'Course',
            'entity_id' => 1,
            'details' => 'Created new course: Introduction to Computer Science',
            'timestamp' => now()->subDays(12),
        ]);

        AuditLog::create([
            'staff_id' => 'ADMIN001',
            'action' => 'updated',
            'entity' => 'Student',
            'entity_id' => 1,
            'details' => 'Updated student enrollment status to active',
            'timestamp' => now()->subDays(8),
        ]);

        AuditLog::create([
            'staff_id' => 'ADMIN002',
            'action' => 'created',
            'entity' => 'ClassSection',
            'entity_id' => 1,
            'details' => 'Created new class section: CS101 Section A',
            'timestamp' => now()->subDays(7),
        ]);

        AuditLog::create([
            'staff_id' => 'ADMIN001',
            'action' => 'created',
            'entity' => 'Enrollment',
            'entity_id' => 1,
            'details' => 'Enrolled student John Doe in CS101 Section A',
            'timestamp' => now()->subDays(5),
        ]);
    }
}
