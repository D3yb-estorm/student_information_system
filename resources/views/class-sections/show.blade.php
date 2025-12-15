@extends('layouts.app')

@section('title', 'Class Section Details - Student Information System')

@section('content')
<div class="page-header">
    <h1>Class Section Details</h1>
    <div class="btn-group">
        <a href="{{ route('class-sections.edit', $classSection->section_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('class-sections.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <h2>{{ $classSection->section_code }} - {{ $classSection->course->course_name }}</h2>
    
    <div class="detail-row">
        <label>Section ID:</label>
        <span>{{ $classSection->section_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Course:</label>
        <span>{{ $classSection->course->course_code }} - {{ $classSection->course->course_name }}</span>
    </div>
    
    <div class="detail-row">
        <label>Instructor:</label>
        <span>{{ $classSection->instructor->first_name }} {{ $classSection->instructor->last_name }}</span>
    </div>
    
    <div class="detail-row">
        <label>Schedule:</label>
        <span>{{ $classSection->schedule }}</span>
    </div>
    
    <div class="detail-row">
        <label>Room:</label>
        <span>{{ $classSection->room }}</span>
    </div>
    
    <div class="detail-row">
        <label>Capacity:</label>
        <span>{{ $classSection->capacity }}</span>
    </div>
    
    <div class="detail-row">
        <label>Semester:</label>
        <span>{{ $classSection->semester }}</span>
    </div>
    
    <div class="detail-row">
        <label>Academic Year:</label>
        <span>{{ $classSection->academic_year }}</span>
    </div>
</div>

@if($classSection->enrollments->count())
    <div class="card">
        <h3>Enrolled Students ({{ $classSection->enrollments->count() }})</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Date Enrolled</th>
                    <th>Status</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classSection->enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</td>
                        <td>{{ $enrollment->date_enrolled->format('M d, Y') }}</td>
                        <td>{{ ucfirst($enrollment->status) }}</td>
                        <td>{{ $enrollment->grade ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
