@extends('layouts.app')

@section('title', 'Programs - Student Information System')

@section('content')
<div class="page-header">
    <h1>Programs</h1>
    <a href="{{ route('programs.create') }}" class="btn btn-primary">+ Add Program</a>
</div>

@if ($programs->count())
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Program Name</th>
                    <th>Degree Level</th>
                    <th>Courses</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>{{ $program->program_name }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $program->degree_level)) }}</td>
                        <td>{{ $program->courses->count() }}</td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('programs.show', $program->program_id) }}" class="btn btn-info" style="background-color: #17a2b8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">👁️ View</a>
                                <a href="{{ route('programs.edit', $program->program_id) }}" class="btn btn-primary" style="background-color: #667eea; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; transition: background-color 0.3s;">✏️ Edit</a>
                                <form action="{{ route('programs.destroy', $program->program_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this program?')">
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
        {{ $programs->links() }}
    </div>
@else
    <div class="card">
        <p style="text-align: center; color: #999;">No programs found. <a href="{{ route('programs.create') }}">Create one</a></p>
    </div>
@endif
@endsection
