@extends('layouts.app')

@section('title', 'Class Sections - Student Information System')

@section('content')
<div class="page-header">
    <h1>Class Sections</h1>
    <a href="{{ route('class-sections.create') }}" class="btn btn-primary">+ Add Class Section</a>
</div>

@if ($classSections->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Section Code</th>
                    <th>Course</th>
                    <th>Instructor</th>
                    <th>Schedule</th>
                    <th>Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classSections as $section)
                    <tr>
                        <td>{{ $section->section_code }}</td>
                        <td>{{ $section->course->course_name }}</td>
                        <td>{{ $section->instructor->first_name }} {{ $section->instructor->last_name }}</td>
                        <td>{{ $section->schedule }}</td>
                        <td>{{ $section->capacity }}</td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('class-sections.show', $section->section_id) }}" class="btn btn-info" style="background-color: #17a2b8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">👁️ View</a>
                                <a href="{{ route('class-sections.edit', $section->section_id) }}" class="btn btn-primary" style="background-color: #667eea; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">✏️ Edit</a>
                                <form action="{{ route('class-sections.destroy', $section->section_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this class section?')">
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
        {{ $classSections->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No class sections found. <a href="{{ route('class-sections.create') }}">Create one</a></p>
    </div>
@endif
@endsection
