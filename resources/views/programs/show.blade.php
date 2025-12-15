@extends('layouts.app')

@section('title', 'Program Details - Student Information System')

@section('content')
<div class="page-header">
    <h1>Program Details</h1>
    <div class="btn-group">
        <a href="{{ route('programs.edit', $program->program_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <h2>{{ $program->program_name }}</h2>
    
    <div class="detail-row">
        <label>Program ID:</label>
        <span>{{ $program->program_id }}</span>
    </div>
    
    <div class="detail-row">
        <label>Degree Level:</label>
        <span>{{ ucfirst(str_replace('_', ' ', $program->degree_level)) }}</span>
    </div>
</div>

@if($program->courses->count())
    <div class="card">
        <h3>Courses in this Program ({{ $program->courses->count() }})</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Units</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($program->courses as $course)
                    <tr>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->units }}</td>
                        <td>{{ $course->department->department_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No courses found for this program.</p>
    </div>
@endif
@endsection
