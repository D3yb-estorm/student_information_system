<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Transcript;
use App\Models\ClassSection;
use App\Models\Instructor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function studentDashboard()
    {
        $user = auth()->user();

        // Get student profile info
        $student = Student::whereRaw("CONCAT(first_name, ' ', last_name) = ?", [$user->full_name])->first();

        if (!$student) {
            // Create a simple dashboard without specific student data
            return view('dashboards.student', [
                'enrollmentCount' => 0,
                'activeEnrollments' => [],
                'transcriptCount' => 0,
                'student' => null,
            ]);
        }

        $enrollments = Enrollment::where('student_id', $student->student_id)
            ->with(['classSection.course', 'classSection.instructor'])
            ->get();

        $transcripts = Transcript::where('student_id', $student->student_id)->get();

        return view('dashboards.student', [
            'student' => $student,
            'enrollmentCount' => $enrollments->count(),
            'activeEnrollments' => $enrollments,
            'transcriptCount' => $transcripts->count(),
            'transcripts' => $transcripts,
        ]);
    }

    public function instructorDashboard()
    {
        $user = auth()->user();

        // Get instructor profile info
        $instructor = Instructor::whereRaw("CONCAT(first_name, ' ', last_name) = ?", [$user->full_name])->first();

        if (!$instructor) {
            // Create a simple dashboard without specific instructor data
            return view('dashboards.instructor', [
                'classSectionCount' => 0,
                'classSections' => [],
                'studentCount' => 0,
                'instructor' => null,
            ]);
        }

        $classSections = ClassSection::where('instructor_id', $instructor->instructor_id)
            ->with('course')
            ->get();

        $studentCount = Enrollment::whereIn('class_section_id', $classSections->pluck('class_section_id'))->count();

        return view('dashboards.instructor', [
            'instructor' => $instructor,
            'classSectionCount' => $classSections->count(),
            'classSections' => $classSections,
            'studentCount' => $studentCount,
        ]);
    }
}
