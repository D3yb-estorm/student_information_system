@extends('layouts.app')

@section('title', 'Edit Program - Student Information System')

@section('content')
<div class="page-header">
    <h1>Edit Program</h1>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('programs.update', $program->program_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="program_name">Program Name *</label>
            <input type="text" id="program_name" name="program_name" value="{{ old('program_name', $program->program_name) }}" required>
            @error('program_name') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="degree_level">Degree Level *</label>
            <select id="degree_level" name="degree_level" required>
                <option value="">-- Select Degree Level --</option>
                <option value="associate" {{ old('degree_level', $program->degree_level) == 'associate' ? 'selected' : '' }}>Associate</option>
                <option value="bachelor" {{ old('degree_level', $program->degree_level) == 'bachelor' ? 'selected' : '' }}>Bachelor</option>
                <option value="master" {{ old('degree_level', $program->degree_level) == 'master' ? 'selected' : '' }}>Master</option>
                <option value="doctoral" {{ old('degree_level', $program->degree_level) == 'doctoral' ? 'selected' : '' }}>Doctoral</option>
            </select>
            @error('degree_level') <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span> @enderror
        </div>

        <div class="btn-group" style="justify-content: flex-start; gap: 1rem;">
            <button type="submit" class="btn btn-success">Update Program</button>
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
