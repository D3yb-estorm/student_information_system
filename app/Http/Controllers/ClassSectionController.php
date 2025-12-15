<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ClassSectionController extends Controller
{
    /**
     * Display a listing of class sections.
     */
    public function index(): View
    {
        $classSections = ClassSection::with('course', 'instructor')->paginate(15);
        return view('class-sections.index', compact('classSections'));
    }

    /**
     * Show the form for creating a new class section.
     */
    public function create(): View
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('class-sections.create', compact('courses', 'instructors'));
    }

    /**
     * Store a newly created class section in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,course_id',
            'instructor_id' => 'required|exists:instructors,instructor_id',
            'section_code' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'semester' => 'required|integer|min:1|max:2',
            'academic_year' => 'required|integer|min:2020',
        ]);

        ClassSection::create($validated);

        return redirect()->route('class-sections.index')->with('success', 'Class section created successfully.');
    }

    /**
     * Display the specified class section.
     */
    public function show(ClassSection $classSection): View
    {
        $classSection->load('course', 'instructor', 'enrollments.student');
        return view('class-sections.show', compact('classSection'));
    }

    /**
     * Show the form for editing the specified class section.
     */
    public function edit(ClassSection $classSection): View
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('class-sections.edit', compact('classSection', 'courses', 'instructors'));
    }

    /**
     * Update the specified class section in storage.
     */
    public function update(Request $request, ClassSection $classSection): RedirectResponse
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,course_id',
            'instructor_id' => 'required|exists:instructors,instructor_id',
            'section_code' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'semester' => 'required|integer|min:1|max:2',
            'academic_year' => 'required|integer|min:2020',
        ]);

        $classSection->update($validated);

        return redirect()->route('class-sections.index')->with('success', 'Class section updated successfully.');
    }

    /**
     * Remove the specified class section from storage.
     */
    public function destroy(ClassSection $classSection): RedirectResponse
    {
        $classSection->delete();
        return redirect()->route('class-sections.index')->with('success', 'Class section deleted successfully.');
    }
}
