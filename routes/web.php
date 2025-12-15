<?php

// Delivery System Controllers
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentTransactionController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BackgroundController;

// Academic System Controllers
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Authentication routes (existing auth views expect these names)
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Admin-specific login and dashboard
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::get('/admin/dashboard', function () { return view('dashboards.admin'); })->middleware('auth')->name('admin.dashboard');

// Delivery System Routes
Route::resources([
    'customers' => CustomerController::class,
    'packages' => PackageController::class,
    'payment-transactions' => PaymentTransactionController::class,
    'routes' => RouteController::class,
    'halls' => HallController::class,
    'bookings' => BookingController::class,
    'backgrounds' => BackgroundController::class,
]);

// Academic System Routes
Route::resources([
    'students' => StudentController::class,
    'programs' => ProgramController::class,
    'departments' => DepartmentController::class,
    'instructors' => InstructorController::class,
    'academic_courses' => CourseController::class,
    'class-sections' => ClassSectionController::class,
    'enrollments' => EnrollmentController::class,
    'transcripts' => TranscriptController::class,
    'audit-logs' => AuditLogController::class,
]);

// ...existing code...
Route::view('/dashboard/laravel12', 'laravel12')->name('dashboard.laravel12');
// ...existing code...