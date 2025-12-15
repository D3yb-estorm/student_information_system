@extends('layouts.app')

@section('title', 'Course Details - Student Information System')

@section('content')
<div class="page-header">
    <h1>Course Details</h1>
    <div class="btn-group">
        <a href="{{ route('courses.edit', $course->course_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <h2>{{ $course->course_name }}</h2>
    
    <div class="detail-row">
        <label>Course ID:</label>
        <span>{{ $course->course_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Course Code:</label>
        <span>{{ $course->course_code }}</span>
    </div>
    
    <div class="detail-row">
        <label>Units:</label>
        <span>{{ $course->units }}</span>
    </div>
    
    <div class="detail-row">
        <label>Program:</label>
        <span>{{ $course->program->program_name }}</span>
    </div>
    
    <div class="detail-row">
        <label>Department:</label>
        <span>{{ $course->department->department_name }}</span>
    </div>
</div>

@if($course->classSections->count())
    <div class="card">
        <h3>Class Sections ({{ $course->classSections->count() }})</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Instructor</th>
                    <th>Schedule</th>
                    <th>Room</th>
                    <th>Capacity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->classSections as $section)
                    <tr>
                        <td>{{ $section->section_code }}</td>
                        <td>{{ $section->instructor->first_name }} {{ $section->instructor->last_name }}</td>
                        <td>{{ $section->schedule }}</td>
                        <td>{{ $section->room }}</td>
                        <td>{{ $section->capacity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
