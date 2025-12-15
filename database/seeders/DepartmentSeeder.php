<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create([
            'department_name' => 'Computer Science Department',
        ]);

        Department::create([
            'department_name' => 'Engineering Department',
        ]);

        Department::create([
            'department_name' => 'Information Technology Department',
        ]);

        Department::create([
            'department_name' => 'Business Administration Department',
        ]);

        Department::create([
            'department_name' => 'Mathematics Department',
        ]);
    }
}
