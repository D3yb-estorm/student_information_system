@extends('layouts.app')

@section('title', 'Edit Instructor - Student Information System')

@section('content')
<div class="page-header">
    <h1>Edit Instructor</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('instructors.update', $instructor->instructor_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">First Name *</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $instructor->first_name) }}" required>
            @error('first_name') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="last_name">Last Name *</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $instructor->last_name) }}" required>
            @error('last_name') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" value="{{ old('email', $instructor->email) }}" required>
            @error('email') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="department_id">Department *</label>
            <select id="department_id" name="department_id" required>
                <option value="">-- Select Department --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->department_id }}" {{ old('department_id', $instructor->department_id) == $department->department_id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
            @error('department_id') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="role">Role *</label>
            <select id="role" name="role" required>
                <option value="">-- Select Role --</option>
                <option value="professor" {{ old('role', $instructor->role) == 'professor' ? 'selected' : '' }}>Professor</option>
                <option value="associate_professor" {{ old('role', $instructor->role) == 'associate_professor' ? 'selected' : '' }}>Associate Professor</option>
                <option value="assistant_professor" {{ old('role', $instructor->role) == 'assistant_professor' ? 'selected' : '' }}>Assistant Professor</option>
                <option value="lecturer" {{ old('role', $instructor->role) == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                <option value="instructor" {{ old('role', $instructor->role) == 'instructor' ? 'selected' : '' }}>Instructor</option>
            </select>
            @error('role') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group" style="justify-content: flex-start; gap: 1rem;">
            <button type="submit" class="btn btn-success">Update Instructor</button>
            <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
