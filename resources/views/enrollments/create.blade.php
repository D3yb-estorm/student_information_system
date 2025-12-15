@extends('layouts.app')

@section('title', 'Create Enrollment - Student Information System')

@section('content')
<div class="page-header">
    <h1>Add New Enrollment</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="student_id">Student *</label>
            <select id="student_id" name="student_id" required>
                <option value="">-- Select Student --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->student_id }}" {{ old('student_id') == $student->student_id ? 'selected' : '' }}>
                        {{ $student->first_name }} {{ $student->last_name }}
                    </option>
                @endforeach
            </select>
            @error('student_id') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="section_id">Class Section *</label>
            <select id="section_id" name="section_id" required>
                <option value="">-- Select Class Section --</option>
                @foreach ($classSections as $section)
                    <option value="{{ $section->section_id }}" {{ old('section_id') == $section->section_id ? 'selected' : '' }}>
                        {{ $section->course->course_code }} - {{ $section->section_code }}
                    </option>
                @endforeach
            </select>
            @error('section_id') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="date_enrolled">Date Enrolled *</label>
            <input type="date" id="date_enrolled" name="date_enrolled" value="{{ old('date_enrolled') }}" required>
            @error('date_enrolled') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status *</label>
            <select id="status" name="status" required>
                <option value="">-- Select Status --</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="dropped" {{ old('status') == 'dropped' ? 'selected' : '' }}>Dropped</option>
                <option value="withdrawn" {{ old('status') == 'withdrawn' ? 'selected' : '' }}>Withdrawn</option>
            </select>
            @error('status') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="grade">Grade (Optional)</label>
            <input type="number" id="grade" name="grade" value="{{ old('grade') }}" min="0" max="4" step="0.01">
            @error('grade') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="grade_remarks">Grade Remarks (Optional)</label>
            <textarea id="grade_remarks" name="grade_remarks">{{ old('grade_remarks') }}</textarea>
            @error('grade_remarks') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group" style="justify-content: flex-start; gap: 1rem;">
            <button type="submit" class="btn btn-success">Create Enrollment</button>
            <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
