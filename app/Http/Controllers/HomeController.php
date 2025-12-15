<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Instructor;

class HomeController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $courseCount = Course::count();
        $enrollmentCount = Enrollment::count();
        $instructorCount = Instructor::count();

        return view('home', compact('studentCount', 'courseCount', 'enrollmentCount', 'instructorCount'));
    }
}
