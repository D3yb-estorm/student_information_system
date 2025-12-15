<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\ClassSection;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of enrollments.
     */
    public function index(): View
    {
        $enrollments = Enrollment::with('student', 'classSection.course')->paginate(15);
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new enrollment.
     */
    public function create(): View
    {
        $students = Student::all();
        $classSections = ClassSection::with('course')->get();
        return view('enrollments.create', compact('students', 'classSections'));
    }

    /**
     * Store a newly created enrollment in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'section_id' => 'required|exists:class_sections,section_id',
            'date_enrolled' => 'required|date',
            'status' => 'required|in:active,completed,dropped,withdrawn',
            'grade' => 'nullable|numeric|min:0|max:4',
            'grade_remarks' => 'nullable|string',
        ]);

        Enrollment::create($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    /**
     * Display the specified enrollment.
     */
    public function show(Enrollment $enrollment): View
    {
        $enrollment->load('student', 'classSection.course', 'classSection.instructor');
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified enrollment.
     */
    public function edit(Enrollment $enrollment): View
    {
        $students = Student::all();
        $classSections = ClassSection::with('course')->get();
        return view('enrollments.edit', compact('enrollment', 'students', 'classSections'));
    }

    /**
     * Update the specified enrollment in storage.
     */
    public function update(Request $request, Enrollment $enrollment): RedirectResponse
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'section_id' => 'required|exists:class_sections,section_id',
            'date_enrolled' => 'required|date',
            'status' => 'required|in:active,completed,dropped,withdrawn',
            'grade' => 'nullable|numeric|min:0|max:4',
            'grade_remarks' => 'nullable|string',
        ]);

        $enrollment->update($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified enrollment from storage.
     */
    public function destroy(Enrollment $enrollment): RedirectResponse
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}
