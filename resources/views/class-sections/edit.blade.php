@extends('layouts.app')

@section('title', 'Edit Class Section - Student Information System')

@section('content')
<div class="page-header">
    <h1>Edit Class Section</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('class-sections.update', $classSection->section_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="course_id">Course *</label>
            <select id="course_id" name="course_id" required>
                <option value="">-- Select Course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->course_id }}" {{ old('course_id', $classSection->course_id) == $course->course_id ? 'selected' : '' }}>
                        {{ $course->course_code }} - {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
            @error('course_id') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="instructor_id">Instructor *</label>
            <select id="instructor_id" name="instructor_id" required>
                <option value="">-- Select Instructor --</option>
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->instructor_id }}" {{ old('instructor_id', $classSection->instructor_id) == $instructor->instructor_id ? 'selected' : '' }}>
                        {{ $instructor->first_name }} {{ $instructor->last_name }}
                    </option>
                @endforeach
            </select>
            @error('instructor_id') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="section_code">Section Code *</label>
            <input type="text" id="section_code" name="section_code" value="{{ old('section_code', $classSection->section_code) }}" required>
            @error('section_code') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="schedule">Schedule *</label>
            <input type="text" id="schedule" name="schedule" value="{{ old('schedule', $classSection->schedule) }}" required>
            @error('schedule') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="room">Room *</label>
            <input type="text" id="room" name="room" value="{{ old('room', $classSection->room) }}" required>
            @error('room') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="capacity">Capacity *</label>
            <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $classSection->capacity) }}" min="1" required>
            @error('capacity') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="semester">Semester *</label>
            <select id="semester" name="semester" required>
                <option value="">-- Select Semester --</option>
                <option value="1" {{ old('semester', $classSection->semester) == '1' ? 'selected' : '' }}>1st Semester</option>
                <option value="2" {{ old('semester', $classSection->semester) == '2' ? 'selected' : '' }}>2nd Semester</option>
            </select>
            @error('semester') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="academic_year">Academic Year *</label>
            <input type="number" id="academic_year" name="academic_year" value="{{ old('academic_year', $classSection->academic_year) }}" min="2020" required>
            @error('academic_year') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group" style="justify-content: flex-start; gap: 1rem;">
            <button type="submit" class="btn btn-success">Update Class Section</button>
            <a href="{{ route('class-sections.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
