<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Records Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 50px;
            padding-top: 40px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        .portal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .portal-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .portal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .portal-card.students {
            border-top: 5px solid #667eea;
        }

        .portal-card.programs {
            border-top: 5px solid #764ba2;
        }

        .portal-card.departments {
            border-top: 5px solid #f093fb;
        }

        .portal-card.instructors {
            border-top: 5px solid #4facfe;
        }

        .portal-card.courses {
            border-top: 5px solid #43e97b;
        }

        .portal-card.classes {
            border-top: 5px solid #fa709a;
        }

        .portal-card.enrollments {
            border-top: 5px solid #30cfd0;
        }

        .portal-card.transcripts {
            border-top: 5px solid #a8edea;
        }

        .portal-icon {
            font-size: 3.5rem;
            margin-bottom: 15px;
        }

        .portal-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .portal-card p {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .portal-btn {
            display: inline-block;
            padding: 10px 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .portal-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .stat-box h4 {
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .stat-box p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .footer {
            text-align: center;
            color: white;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 50px;
        }

        .footer p {
            opacity: 0.8;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8rem;
            }

            .portal-grid {
                grid-template-columns: 1fr;
            }

            .stats-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin</h1>
            <p>Comprehensive Student Records Management System</p>
        </div>

        <div class="stats-section">
            <div class="stat-box">
                <h4>{{ $studentCount ?? 0 }}</h4>
                <p>Active Students</p>
            </div>
            <div class="stat-box">
                <h4>{{ $courseCount ?? 0 }}</h4>
                <p>Available Courses</p>
            </div>
            <div class="stat-box">
                <h4>{{ $enrollmentCount ?? 0 }}</h4>
                <p>Total Enrollments</p>
            </div>
            <div class="stat-box">
                <h4>{{ $instructorCount ?? 0 }}</h4>
                <p>Faculty Members</p>
            </div>
        </div>

        <div class="portal-grid">
            <a href="{{ route('students.index') }}" class="portal-card students">
                <div class="portal-icon">👨‍🎓</div>
                <h3>Students</h3>
                <p>Manage student information, profiles, and records</p>
                <button class="portal-btn">View Records</button>
            </a>

            <a href="{{ route('programs.index') }}" class="portal-card programs">
                <div class="portal-icon">🎓</div>
                <h3>Programs</h3>
                <p>Browse available degree programs and certifications</p>
                <button class="portal-btn">View Programs</button>
            </a>

            <a href="{{ route('departments.index') }}" class="portal-card departments">
                <div class="portal-icon">🏛️</div>
                <h3>Departments</h3>
                <p>Explore academic departments and divisions</p>
                <button class="portal-btn">View Departments</button>
            </a>

            <a href="{{ route('instructors.index') }}" class="portal-card instructors">
                <div class="portal-icon">👨‍🏫</div>
                <h3>Instructors</h3>
                <p>Contact faculty members and view their profiles</p>
                <button class="portal-btn">View Faculty</button>
            </a>

            <a href="{{ route('academic_courses.index') }}" class="portal-card courses">
                <div class="portal-icon">📖</div>
                <h3>Courses</h3>
                <p>Browse course catalog and course descriptions</p>
                <button class="portal-btn">View Courses</button>
            </a>

            <a href="{{ route('class-sections.index') }}" class="portal-card classes">
                <div class="portal-icon">📅</div>
                <h3>Class Sections</h3>
                <p>Check class schedules and availability</p>
                <button class="portal-btn">View Schedule</button>
            </a>

            <a href="{{ route('enrollments.index') }}" class="portal-card enrollments">
                <div class="portal-icon">✍️</div>
                <h3>Enrollments</h3>
                <p>Manage student course enrollments</p>
                <button class="portal-btn">View Enrollments</button>
            </a>

            <a href="{{ route('transcripts.index') }}" class="portal-card transcripts">
                <div class="portal-icon">📜</div>
                <h3>Transcripts</h3>
                <p>Access academic transcripts and records</p>
                <button class="portal-btn">View Transcripts</button>
            </a>
        </div>

        <div class="footer">
            <p>&copy; 2025 Student Information System. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
