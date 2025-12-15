@extends('layouts.app')

@section('title', 'Students - Student Information System')

@section('content')
<div class="page-header">
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
</div>

@if ($students->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->contact_number }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.75rem; border-radius: 4px; background: 
                                @if($student->enrollment_status == 'active') #d4edda; color: #155724;
                                @elseif($student->enrollment_status == 'graduated') #d1ecf1; color: #0c5460;
                                @elseif($student->enrollment_status == 'suspended') #f8d7da; color: #721c24;
                                @else #e2e3e5; color: #383d41; @endif">
                                {{ ucfirst($student->enrollment_status) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('students.show', $student->student_id) }}" class="btn btn-info" style="background-color: #17a2b8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">👁️ View</a>
                                <a href="{{ route('students.edit', $student->student_id) }}" class="btn btn-primary" style="background-color: #667eea; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">✏️ Edit</a>
                                <form action="{{ route('students.destroy', $student->student_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this student?')">
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
        {{ $students->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No students found. <a href="{{ route('students.create') }}">Create one</a></p>
    </div>
@endif
@endsection
