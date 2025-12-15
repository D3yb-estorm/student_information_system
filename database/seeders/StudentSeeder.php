<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birth_date' => '2003-05-15',
            'email' => 'john.doe@student.edu',
            'contact_number' => '09171234567',
            'address' => '123 Main St, Makati, Metro Manila',
            'enrollment_status' => 'active',
        ]);

        Student::create([
            'first_name' => 'Maria',
            'last_name' => 'Santos',
            'birth_date' => '2002-08-22',
            'email' => 'maria.santos@student.edu',
            'contact_number' => '09187654321',
            'address' => '456 Oak Ave, Quezon City, Metro Manila',
            'enrollment_status' => 'active',
        ]);

        Student::create([
            'first_name' => 'Juan',
            'last_name' => 'Cruz',
            'birth_date' => '2004-01-10',
            'email' => 'juan.cruz@student.edu',
            'contact_number' => '09165555555',
            'address' => '789 Pine Rd, Pasig, Metro Manila',
            'enrollment_status' => 'active',
        ]);

        Student::create([
            'first_name' => 'Anna',
            'last_name' => 'Reyes',
            'birth_date' => '2003-11-30',
            'email' => 'anna.reyes@student.edu',
            'contact_number' => '09169999999',
            'address' => '321 Elm St, Marikina, Metro Manila',
            'enrollment_status' => 'graduated',
        ]);

        Student::create([
            'first_name' => 'Carlos',
            'last_name' => 'Gonzales',
            'birth_date' => '2002-03-18',
            'email' => 'carlos.gonzales@student.edu',
            'contact_number' => '09172222222',
            'address' => '654 Birch Lane, Taguig, Metro Manila',
            'enrollment_status' => 'active',
        ]);
    }
}
