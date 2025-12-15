@extends('layouts.app')

@section('title', 'Instructor Dashboard')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>👨‍🏫 Instructor Dashboard</h1>
        <p>Welcome, Dr. {{ Auth::user()->full_name }}!</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📅</div>
            <div class="stat-content">
                <h3>Class Sections</h3>
                <p class="stat-number">{{ $classSectionCount }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">👨‍🎓</div>
            <div class="stat-content">
                <h3>Students Enrolled</h3>
                <p class="stat-number">{{ $studentCount }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">👤</div>
            <div class="stat-content">
                <h3>Account Type</h3>
                <p class="stat-number">{{ ucfirst(Auth::user()->role) }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📧</div>
            <div class="stat-content">
                <h3>Email</h3>
                <p style="font-size: 0.9rem; word-break: break-all;">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    @if($classSectionCount > 0)
        <div class="section-card">
            <h2>My Teaching Classes</h2>
            <div class="classes-list">
                @foreach($classSections as $section)
                    <div class="class-item">
                        <div class="class-info">
                            <h4>{{ $section->course->course_name }}</h4>
                            <p><strong>Course Code:</strong> {{ $section->course->course_code }}</p>
                            <p><strong>Section:</strong> {{ $section->section_code }}</p>
                            <p><strong>Schedule:</strong> {{ $section->schedule }}</p>
                            <p><strong>Room:</strong> {{ $section->room }}</p>
                            <p><strong>Semester:</strong> {{ $section->semester }} | <strong>Year:</strong> {{ $section->academic_year }}</p>
                        </div>
                        <div class="class-stats">
                            <div class="class-stat">
                                <span class="stat-label">Capacity</span>
                                <span class="stat-value">{{ $section->capacity }}</span>
                            </div>
                            <a href="{{ route('class-sections.show', $section->section_id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="section-card">
            <p style="text-align: center; color: #666;">No teaching assignments found. <a href="{{ route('class-sections.index') }}">View all class sections</a></p>
        </div>
    @endif

    <div class="quick-links">
        <h3>Quick Links</h3>
        <div class="links-grid">
            <a href="{{ route('class-sections.index') }}" class="quick-link">📅 All Class Sections</a>
            <a href="{{ route('enrollments.index') }}" class="quick-link">📝 Student Enrollments</a>
            <a href="{{ route('academic_courses.index') }}" class="quick-link">📖 Course Management</a>
            <a href="{{ route('students.index') }}" class="quick-link">👨‍🎓 View Students</a>
        </div>
    </div>

    <div class="section-card instructions">
        <h3>📋 Instructor Information</h3>
        <p>As an instructor, you have access to:</p>
        <ul>
            <li>View and manage your assigned class sections</li>
            <li>Track student enrollments in your courses</li>
            <li>View course information and schedules</li>
            <li>Access student records and enrollment data</li>
        </ul>
    </div>
</div>

<style>
    .dashboard-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 40px;
        color: #333;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .dashboard-header p {
        font-size: 1.1rem;
        color: #666;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 20px;
        border-left: 5px solid #764ba2;
    }

    .stat-icon {
        font-size: 2.5rem;
        flex-shrink: 0;
    }

    .stat-content h3 {
        margin: 0;
        color: #666;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-number {
        margin: 10px 0 0 0;
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .section-card {
        background: white;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .section-card h2 {
        margin-top: 0;
        margin-bottom: 25px;
        color: #333;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
    }

    .section-card h3 {
        margin-top: 0;
        margin-bottom: 15px;
        color: #333;
    }

    .section-card.instructions ul {
        margin-left: 20px;
        color: #666;
        line-height: 1.8;
    }

    .classes-list {
        display: grid;
        gap: 15px;
    }

    .class-item {
        background: #f9f9f9;
        border-left: 4px solid #764ba2;
        padding: 20px;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        align-items: start;
        gap: 20px;
    }

    .class-info {
        flex: 1;
    }

    .class-info h4 {
        margin: 0 0 10px 0;
        color: #333;
        font-size: 1.1rem;
    }

    .class-info p {
        margin: 8px 0;
        color: #666;
        font-size: 0.95rem;
    }

    .class-stats {
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 15px;
        align-items: center;
    }

    .class-stat {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .stat-label {
        color: #666;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: bold;
        color: #764ba2;
    }

    .quick-links {
        background: white;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .quick-links h3 {
        margin-top: 0;
        margin-bottom: 20px;
        color: #333;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
    }

    .links-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .quick-link {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        color: white;
        padding: 15px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .quick-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(118, 75, 162, 0.4);
    }

    .btn {
        background-color: #667eea;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #764ba2;
    }
</style>
@endsection
