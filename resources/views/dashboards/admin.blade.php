@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="card">
    <h1>🔧 Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->full_name }} — you are signed in as <strong>{{ ucfirst(Auth::user()->role) }}</strong>.</p>

    <div style="margin-top:20px; display:flex; gap:12px; flex-wrap:wrap">
        <a href="{{ route('students.index') }}" class="btn btn-primary">Manage Students</a>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary">Programs</a>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Departments</a>
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Instructors</a>
    </div>
</div>
@endsection