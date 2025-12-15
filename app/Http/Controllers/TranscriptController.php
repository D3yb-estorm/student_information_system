<?php

namespace App\Http\Controllers;

use App\Models\Transcript;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TranscriptController extends Controller
{
    /**
     * Display a listing of transcripts.
     */
    public function index(): View
    {
        $transcripts = Transcript::with('student')->paginate(15);
        return view('transcripts.index', compact('transcripts'));
    }

    /**
     * Show the form for creating a new transcript.
     */
    public function create(): View
    {
        $students = Student::all();
        return view('transcripts.create', compact('students'));
    }

    /**
     * Store a newly created transcript in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'date_generated' => 'required|date',
            'generated_by_staff_id' => 'required|string|max:255',
            'file_path' => 'nullable|string|max:255',
        ]);

        Transcript::create($validated);

        return redirect()->route('transcripts.index')->with('success', 'Transcript created successfully.');
    }

    /**
     * Display the specified transcript.
     */
    public function show(Transcript $transcript): View
    {
        $transcript->load('student');
        return view('transcripts.show', compact('transcript'));
    }

    /**
     * Show the form for editing the specified transcript.
     */
    public function edit(Transcript $transcript): View
    {
        $students = Student::all();
        return view('transcripts.edit', compact('transcript', 'students'));
    }

    /**
     * Update the specified transcript in storage.
     */
    public function update(Request $request, Transcript $transcript): RedirectResponse
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'date_generated' => 'required|date',
            'generated_by_staff_id' => 'required|string|max:255',
            'file_path' => 'nullable|string|max:255',
        ]);

        $transcript->update($validated);

        return redirect()->route('transcripts.index')->with('success', 'Transcript updated successfully.');
    }

    /**
     * Remove the specified transcript from storage.
     */
    public function destroy(Transcript $transcript): RedirectResponse
    {
        $transcript->delete();
        return redirect()->route('transcripts.index')->with('success', 'Transcript deleted successfully.');
    }
}
