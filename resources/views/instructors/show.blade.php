@extends('layouts.app')

@section('title', 'Instructor Details - Student Information System')

@section('content')
<div class="page-header">
    <h1>Instructor Details</h1>
    <div class="btn-group">
        <a href="{{ route('instructors.edit', $instructor->instructor_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <h2>{{ $instructor->first_name }} {{ $instructor->last_name }}</h2>
    
    <div class="detail-row">
        <label>Instructor ID:</label>
        <span>{{ $instructor->instructor_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Email:</label>
        <span>{{ $instructor->email }}</span>
    </div>
    
    <div class="detail-row">
        <label>Department:</label>
        <span>{{ $instructor->department->department_name }}</span>
    </div>
    
    <div class="detail-row">
        <label>Role:</label>
        <span>{{ ucfirst(str_replace('_', ' ', $instructor->role)) }}</span>
    </div>
</div>

@if($instructor->classSections->count())
    <div class="card">
        <h3>Class Sections ({{ $instructor->classSections->count() }})</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Schedule</th>
                    <th>Room</th>
                    <th>Capacity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructor->classSections as $section)
                    <tr>
                        <td>{{ $section->course->course_name }}</td>
                        <td>{{ $section->section_code }}</td>
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
