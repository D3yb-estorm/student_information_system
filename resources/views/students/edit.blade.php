@extends('layouts.app')

@section('title', 'Edit Student - Student Information System')

@section('content')
<div class="page-header">
    <h1>Edit Student</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('students.update', $student->student_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">First Name *</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}" required>
            @error('first_name') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="last_name">Last Name *</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}" required>
            @error('last_name') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date *</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}" required>
            @error('birth_date') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" required>
            @error('email') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number *</label>
            <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $student->contact_number) }}" required>
            @error('contact_number') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="address">Address *</label>
            <textarea id="address" name="address" required>{{ old('address', $student->address) }}</textarea>
            @error('address') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="enrollment_status">Enrollment Status *</label>
            <select id="enrollment_status" name="enrollment_status" required>
                <option value="">-- Select Status --</option>
                <option value="active" {{ old('enrollment_status', $student->enrollment_status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('enrollment_status', $student->enrollment_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="suspended" {{ old('enrollment_status', $student->enrollment_status) == 'suspended' ? 'selected' : '' }}>Suspended</option>
                <option value="graduated" {{ old('enrollment_status', $student->enrollment_status) == 'graduated' ? 'selected' : '' }}>Graduated</option>
            </select>
            @error('enrollment_status') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group" style="justify-content: flex-start; gap: 1rem;">
            <button type="submit" class="btn btn-success">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
