@extends('layouts.app')

@section('title', 'Edit Department - Student Information System')

@section('content')
<div class="page-header">
    <h1>Edit Department</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('departments.update', $department->department_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="department_name">Department Name *</label>
            <input type="text" id="department_name" name="department_name" value="{{ old('department_name', $department->department_name) }}" required>
            @error('department_name') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group" style="justify-content: flex-start; gap: 1rem;">
            <button type="submit" class="btn btn-success">Update Department</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
