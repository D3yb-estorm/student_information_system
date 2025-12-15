@extends('layouts.app')

@section('title', 'Create Course - Student Information System')

@section('content')
<div class="page-header">
    <h1>Add New Course</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="course_code">Course Code *</label>
            <input type="text" id="course_code" name="course_code" value="{{ old('course_code') }}" placeholder="e.g., CS101" required>
            @error('course_code') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="course_name">Course Name *</label>
            <input type="text" id="course_name" name="course_name" value="{{ old('course_name') }}" required>
            @error('course_name') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="units">Units *</label>
            <input type="number" id="units" name="units" value="{{ old('units') }}" min="1" max="12" required>
            @error('units') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="program_id">Program *</label>
            <select id="program_id" name="program_id" required>
                <option value="">-- Select Program --</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->program_id }}" {{ old('program_id') == $program->program_id ? 'selected' : '' }}>
                        {{ $program->program_name }}
                    </option>
                @endforeach
            </select>
            @error('program_id') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="department_id">Department *</label>
            <select id="department_id" name="department_id" required>
                <option value="">-- Select Department --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->department_id }}" {{ old('department_id') == $department->department_id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
            @error('department_id') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group" style="justify-content: flex-start; gap: 1rem;">
            <button type="submit" class="btn btn-success">Create Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
