@extends('layouts.app')

@section('title', 'Instructors - Student Information System')

@section('content')
<div class="page-header">
    <h1>Instructors</h1>
    <a href="{{ route('instructors.create') }}" class="btn btn-primary">+ Add Instructor</a>
</div>

@if ($instructors->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                    <tr>
                        <td>{{ $instructor->first_name }} {{ $instructor->last_name }}</td>
                        <td>{{ $instructor->email }}</td>
                        <td>{{ $instructor->department->department_name }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $instructor->role)) }}</td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('instructors.show', $instructor->instructor_id) }}" class="btn btn-info" style="background-color: #17a2b8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">👁️ View</a>
                                <a href="{{ route('instructors.edit', $instructor->instructor_id) }}" class="btn btn-primary" style="background-color: #667eea; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">✏️ Edit</a>
                                <form action="{{ route('instructors.destroy', $instructor->instructor_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this instructor?')">
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
        {{ $instructors->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No instructors found. <a href="{{ route('instructors.create') }}">Create one</a></p>
    </div>
@endif
@endsection
