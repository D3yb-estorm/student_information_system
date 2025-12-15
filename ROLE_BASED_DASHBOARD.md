# Role-Based Dashboard System - Login Credentials & Testing Guide

## 📋 Demo Login Credentials

### Student Account
- **Username:** JohnDave
- **Password:** 12345
- **Role:** Student
- **Dashboard:** `/dashboard/student`

### Instructor Account
- **Username:** drsmith
- **Password:** instructor123
- **Role:** Instructor
- **Dashboard:** `/dashboard/instructor`

### Admin Account
- **Username:** admin
- **Password:** admin123
- **Role:** Admin

---

## 🔐 Role-Based Access Control

### What Students Can Access
✅ Student Dashboard (`/dashboard/student`)
- View enrolled courses
- Check current enrollments and grades
- View academic transcripts
- See class schedules and instructor information
- Quick links to enrollments and transcript records

✅ Portal Navigation (All academic data)
- Can access all system resources for viewing
- Cannot modify data (controlled by controllers)

❌ Cannot Access
- Instructor Dashboard (`/dashboard/instructor`) - Will get 403 Forbidden error
- Admin functions

### What Instructors Can Access
✅ Instructor Dashboard (`/dashboard/instructor`)
- View assigned class sections
- See total enrolled students
- View course information and schedules
- Access student enrollment data
- Quick links to class management

✅ Portal Navigation (All academic data)
- Can access all system resources
- Can manage courses and class sections

❌ Cannot Access
- Student Dashboard (`/dashboard/student`) - Will get 403 Forbidden error
- Admin functions

---

## 🧪 Testing the Role-Based Access

### Test 1: Login as Student
1. Go to `/login`
2. Enter Username: `JohnDave`, Password: `12345`
3. Click Login
4. You'll be redirected to Student Dashboard (`/dashboard/student`)
5. Try accessing `/dashboard/instructor` - Should get 403 Forbidden error

### Test 2: Login as Instructor
1. Go to `/login`
2. Enter Username: `drsmith`, Password: `instructor123`
3. Click Login
4. You'll be redirected to Instructor Dashboard (`/dashboard/instructor`)
5. Try accessing `/dashboard/student` - Should get 403 Forbidden error

### Test 3: Logout and Create New Account
1. Click Logout button
2. Click "Create Account" on login page
3. Fill in all fields and select role
4. Account will be created and you'll be logged in immediately
5. You'll be redirected to appropriate dashboard based on role

---

## 🛡️ Security Features

### Middleware Protection
- `CheckRole` Middleware - Validates user role against allowed roles
- `auth` Middleware - Ensures user is authenticated
- Routes are protected with middleware combinations

### Login Page Features
- Displays demo credentials for easy testing
- Password field properly hidden
- Form validation with error messages
- Remember token support

### Session Management
- Automatic session invalidation on logout
- CSRF token protection on all forms
- Secure password hashing using Laravel's Hash utility

---

## 📁 File Structure

### New Files Created
```
app/Http/
├── Controllers/
│   ├── AuthController.php (Login/Register)
│   └── DashboardController.php (Role-based dashboards)
├── Middleware/
│   └── CheckRole.php (Role validation)
└── Kernel.php (Middleware registration)

resources/views/
├── auth/
│   ├── login.blade.php (Login form)
│   └── register.blade.php (Registration form)
├── dashboards/
│   ├── student.blade.php (Student dashboard)
│   └── instructor.blade.php (Instructor dashboard)
└── ... (existing views)

database/migrations/
└── 2024_01_01_000000_create_users_table.php (Users table)

database/seeders/
└── UserSeeder.php (Demo user data)
```

---

## 🚀 How It Works

### Authentication Flow
1. User visits `/login`
2. Enters credentials
3. AuthController validates against users table
4. If valid, session is created and user is logged in
5. HomeController detects user role and redirects to appropriate dashboard

### Role-Based Access
1. Dashboard routes are protected with `role` middleware
2. Middleware checks if user's role matches allowed roles
3. If role doesn't match, returns 403 Forbidden
4. If role matches, allows access to dashboard view

### User Model
- Custom `User` model with authenticatable trait
- Custom primary key: `user_id`
- Automatic password hashing via mutator
- Supports roles: student, instructor, admin

---

## 💡 Key Features

✨ **Secure Authentication**
- Password hashing with Laravel's Hash facade
- CSRF protection
- Session-based auth with remember tokens

✨ **Role-Based Dashboards**
- Student Dashboard: Shows enrollments, transcripts, academic info
- Instructor Dashboard: Shows taught classes, student counts, schedules

✨ **Access Control**
- Middleware prevents unauthorized access
- 403 Forbidden error for role violations
- Clear error messages

✨ **User Management**
- Create new accounts via registration form
- Choose role during registration (student, instructor, admin)
- Password confirmation validation

---

## 📝 Important Notes

1. **Demo Data:** All demo accounts are pre-seeded in the database
2. **Password:** Passwords are hashed and stored securely
3. **Routes:** All dashboard routes require authentication
4. **Logout:** Invalidates session and clears tokens
5. **Registration:** New users can register and immediately access their dashboard

---

## 🔧 Troubleshooting

### 403 Forbidden Error
- This is expected! You're trying to access a dashboard for a role you don't have
- Login with the correct role account to access that dashboard

### Login Fails
- Check credentials match exactly (case-sensitive username)
- Clear browser cookies/cache if issues persist
- Check database seeders ran successfully: `php artisan db:seed`

### Dashboard Shows No Data
- Student accounts without linked Student records will show 0 data
- This is by design - demo users may not have student/instructor profile links
- Main dashboard stats still show system-wide statistics

---

## 📞 Support

For issues or questions about the role-based access system, check:
- `app/Http/Middleware/CheckRole.php` - Role validation logic
- `app/Http/Controllers/DashboardController.php` - Dashboard logic
- `routes/web.php` - Route definitions with middleware
