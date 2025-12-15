<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InstructorController extends Controller
{
    /**
     * Display a listing of instructors.
     */
    public function index(): View
    {
        $instructors = Instructor::with('department')->paginate(15);
        return view('instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new instructor.
     */
    public function create(): View
    {
        $departments = Department::all();
        return view('instructors.create', compact('departments'));
    }

    /**
     * Store a newly created instructor in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,department_id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email',
            'role' => 'required|in:professor,associate_professor,assistant_professor,lecturer,instructor',
        ]);

        Instructor::create($validated);

        return redirect()->route('instructors.index')->with('success', 'Instructor created successfully.');
    }

    /**
     * Display the specified instructor.
     */
    public function show(Instructor $instructor): View
    {
        $instructor->load('department', 'classSections');
        return view('instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified instructor.
     */
    public function edit(Instructor $instructor): View
    {
        $departments = Department::all();
        return view('instructors.edit', compact('instructor', 'departments'));
    }

    /**
     * Update the specified instructor in storage.
     */
    public function update(Request $request, Instructor $instructor): RedirectResponse
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,department_id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->instructor_id . ',instructor_id',
            'role' => 'required|in:professor,associate_professor,assistant_professor,lecturer,instructor',
        ]);

        $instructor->update($validated);

        return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully.');
    }

    /**
     * Remove the specified instructor from storage.
     */
    public function destroy(Instructor $instructor): RedirectResponse
    {
        $instructor->delete();
        return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully.');
    }
}
