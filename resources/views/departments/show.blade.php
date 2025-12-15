@extends('layouts.app')

@section('title', 'Department Details - Student Information System')

@section('content')
<div class="page-header">
    <h1>Department Details</h1>
    <div class="btn-group">
        <a href="{{ route('departments.edit', $department->department_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <h2>{{ $department->department_name }}</h2>
    
    <div class="detail-row">
        <label>Department ID:</label>
        <span>{{ $department->department_id }}</span>
    </div>
</div>

@if($department->instructors->count())
    <div class="card">
        <h3>Instructors ({{ $department->instructors->count() }})</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($department->instructors as $instructor)
                    <tr>
                        <td>{{ $instructor->first_name }} {{ $instructor->last_name }}</td>
                        <td>{{ $instructor->email }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $instructor->role)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@if($department->courses->count())
    <div class="card">
        <h3>Courses ({{ $department->courses->count() }})</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Units</th>
                    <th>Program</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($department->courses as $course)
                    <tr>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->units }}</td>
                        <td>{{ $course->program->program_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
