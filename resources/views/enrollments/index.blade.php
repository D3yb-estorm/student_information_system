@extends('layouts.app')

@section('title', 'Enrollments - Student Information System')

@section('content')
<div class="page-header">
    <h1>Enrollments</h1>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">+ Add Enrollment</a>
</div>

@if ($enrollments->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Date Enrolled</th>
                    <th>Status</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</td>
                        <td>{{ $enrollment->classSection->course->course_name }}</td>
                        <td>{{ $enrollment->classSection->section_code }}</td>
                        <td>{{ $enrollment->date_enrolled->format('M d, Y') }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.75rem; border-radius: 4px; background: 
                                @if($enrollment->status == 'active') #d4edda; color: #155724;
                                @elseif($enrollment->status == 'completed') #d1ecf1; color: #0c5460;
                                @elseif($enrollment->status == 'dropped') #f8d7da; color: #721c24;
                                @else #e2e3e5; color: #383d41; @endif">
                                {{ ucfirst($enrollment->status) }}
                            </span>
                        </td>
                        <td>{{ $enrollment->grade ?? 'N/A' }}</td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('enrollments.show', $enrollment->enrollment_id) }}" class="btn btn-info" style="background-color: #17a2b8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">👁️ View</a>
                                <a href="{{ route('enrollments.edit', $enrollment->enrollment_id) }}" class="btn btn-primary" style="background-color: #667eea; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">✏️ Edit</a>
                                <form action="{{ route('enrollments.destroy', $enrollment->enrollment_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this enrollment?')">
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
        {{ $enrollments->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No enrollments found. <a href="{{ route('enrollments.create') }}">Create one</a></p>
    </div>
@endif
@endsection
