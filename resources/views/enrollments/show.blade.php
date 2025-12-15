@extends('layouts.app')

@section('title', 'Enrollment Details - Student Information System')

@section('content')
<div class="page-header">
    <h1>Enrollment Details</h1>
    <div class="btn-group">
        <a href="{{ route('enrollments.edit', $enrollment->enrollment_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <h2>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }} - {{ $enrollment->classSection->course->course_name }}</h2>
    
    <div class="detail-row">
        <label>Enrollment ID:</label>
        <span>{{ $enrollment->enrollment_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Student:</label>
        <span>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</span>
    </div>
    
    <div class="detail-row">
        <label>Course:</label>
        <span>{{ $enrollment->classSection->course->course_code }} - {{ $enrollment->classSection->course->course_name }}</span>
    </div>
    
    <div class="detail-row">
        <label>Section:</label>
        <span>{{ $enrollment->classSection->section_code }}</span>
    </div>
    
    <div class="detail-row">
        <label>Instructor:</label>
        <span>{{ $enrollment->classSection->instructor->first_name }} {{ $enrollment->classSection->instructor->last_name }}</span>
    </div>
    
    <div class="detail-row">
        <label>Date Enrolled:</label>
        <span>{{ $enrollment->date_enrolled->format('M d, Y') }}</span>
    </div>
    
    <div class="detail-row">
        <label>Status:</label>
        <span>
            <span style="padding: 0.25rem 0.75rem; border-radius: 4px; background: 
                @if($enrollment->status == 'active') #d4edda; color: #155724;
                @elseif($enrollment->status == 'completed') #d1ecf1; color: #0c5460;
                @elseif($enrollment->status == 'dropped') #f8d7da; color: #721c24;
                @else #e2e3e5; color: #383d41; @endif">
                {{ ucfirst($enrollment->status) }}
            </span>
        </span>
    </div>
    
    <div class="detail-row">
        <label>Grade:</label>
        <span>{{ $enrollment->grade ?? 'Not Yet Graded' }}</span>
    </div>
    
    @if($enrollment->grade_remarks)
    <div class="detail-row">
        <label>Grade Remarks:</label>
        <span>{{ $enrollment->grade_remarks }}</span>
    </div>
    @endif
</div>
@endsection
