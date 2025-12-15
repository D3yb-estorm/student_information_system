@extends('layouts.app')

@section('title', 'Departments - Student Information System')

@section('content')
<div class="page-header">
    <h1>Departments</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Add Department</a>
</div>

@if ($departments->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Instructors</th>
                    <th>Courses</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->department_name }}</td>
                        <td>{{ $department->instructors->count() }}</td>
                        <td>{{ $department->courses->count() }}</td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('departments.show', $department->department_id) }}" class="btn btn-info" style="background-color: #17a2b8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">👁️ View</a>
                                <a href="{{ route('departments.edit', $department->department_id) }}" class="btn btn-primary" style="background-color: #667eea; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">✏️ Edit</a>
                                <form action="{{ route('departments.destroy', $department->department_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this department?')">
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
        {{ $departments->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No departments found. <a href="{{ route('departments.create') }}">Create one</a></p>
    </div>
@endif
@endsection
