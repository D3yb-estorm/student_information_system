@extends('layouts.app')

@section('title', 'Courses - Student Information System')

@section('content')
<div class="page-header">
    <h1>Courses</h1>
    <a href="{{ route('academic_courses.create') }}" class="btn btn-primary">+ Add Course</a>
</div>

@if ($courses->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Units</th>
                    <th>Program</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->units }}</td>
                        <td>{{ $course->program->program_name }}</td>
                        <td>{{ $course->department->department_name }}</td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('academic_courses.show', $course->course_id) }}" class="btn btn-info" style="background-color: #17a2b8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">👁️ View</a>
                                <a href="{{ route('academic_courses.edit', $course->course_id) }}" class="btn btn-primary" style="background-color: #667eea; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">✏️ Edit</a>
                                <form action="{{ route('academic_courses.destroy', $course->course_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background-color: #dc3545; color: white; padding: 8px 16px; border-radius: 4px; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">🗑️ Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $courses->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No courses found. <a href="{{ route('academic_courses.create') }}">Create one</a></p>
    </div>
@endif
@endsection
