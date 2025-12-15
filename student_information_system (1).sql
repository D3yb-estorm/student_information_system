-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2025 at 03:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_information_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_courses`
--

CREATE TABLE `academic_courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `units` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_courses`
--

INSERT INTO `academic_courses` (`course_id`, `program_id`, `department_id`, `course_code`, `course_name`, `units`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'CS101', 'Introduction to Computer Science', 3, '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(2, 1, 1, 'CS102', 'Data Structures', 4, '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(3, 1, 1, 'CS201', 'Algorithms', 4, '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(4, 2, 3, 'IT101', 'Information Systems Fundamentals', 3, '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(5, 2, 3, 'IT102', 'Database Management', 4, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(6, 3, 2, 'ENG101', 'Engineering Mathematics I', 4, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(7, 3, 2, 'ENG102', 'Engineering Physics', 4, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(8, 5, 4, 'BUS101', 'Business Administration Basics', 3, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(9, 5, 4, 'BUS102', 'Financial Accounting', 3, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(10, 1, 5, 'MATH101', 'Calculus I', 4, '2025-12-11 21:34:04', '2025-12-11 21:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `entity` varchar(255) NOT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`log_id`, `staff_id`, `action`, `entity`, `entity_id`, `details`, `timestamp`) VALUES
(1, 'ADMIN001', 'created', 'Student', 1, 'Created new student: John Doe', '2025-12-01 21:34:04'),
(2, 'ADMIN001', 'created', 'Program', 1, 'Created new program: Bachelor of Science in Computer Science', '2025-11-26 21:34:04'),
(3, 'ADMIN002', 'created', 'Course', 1, 'Created new course: Introduction to Computer Science', '2025-11-29 21:34:04'),
(4, 'ADMIN001', 'updated', 'Student', 1, 'Updated student enrollment status to active', '2025-12-03 21:34:04'),
(5, 'ADMIN002', 'created', 'ClassSection', 1, 'Created new class section: CS101 Section A', '2025-12-04 21:34:04'),
(6, 'ADMIN001', 'created', 'Enrollment', 1, 'Enrolled student John Doe in CS101 Section A', '2025-12-06 21:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `class_sections`
--

CREATE TABLE `class_sections` (
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `section_code` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_sections`
--

INSERT INTO `class_sections` (`section_id`, `course_id`, `instructor_id`, `section_code`, `schedule`, `room`, `capacity`, `semester`, `academic_year`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A', 'MWF 10:00-11:00', 'CS101', 40, 1, 2024, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(2, 1, 2, 'B', 'TTh 14:00-15:30', 'CS102', 35, 1, 2024, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(3, 2, 1, 'A', 'MWF 11:00-12:00', 'CS103', 40, 2, 2024, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(4, 4, 4, 'A', 'TTh 10:00-11:30', 'IT101', 45, 1, 2024, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(5, 5, 4, 'A', 'MWF 13:00-14:00', 'IT102', 40, 2, 2024, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(6, 6, 3, 'A', 'MWF 09:00-10:00', 'ENG101', 50, 1, 2024, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(7, 8, 5, 'A', 'TTh 11:00-12:30', 'BUS101', 50, 1, 2024, '2025-12-11 21:34:04', '2025-12-11 21:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science Department', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(2, 'Engineering Department', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(3, 'Information Technology Department', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(4, 'Business Administration Department', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(5, 'Mathematics Department', '2025-12-11 21:34:03', '2025-12-11 21:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `date_enrolled` date NOT NULL,
  `status` enum('active','completed','dropped','withdrawn') NOT NULL DEFAULT 'active',
  `grade` decimal(3,2) DEFAULT NULL,
  `grade_remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `student_id`, `section_id`, `date_enrolled`, `status`, `grade`, `grade_remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-09-01', 'active', 3.50, 'Excellent performance', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(2, 1, 4, '2024-09-01', 'active', NULL, NULL, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(3, 2, 2, '2024-09-01', 'active', 3.00, 'Good performance', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(4, 2, 7, '2024-09-01', 'active', NULL, NULL, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(5, 3, 1, '2024-09-01', 'active', 2.80, 'Satisfactory', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(6, 3, 6, '2024-09-01', 'active', NULL, NULL, '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(7, 4, 3, '2024-02-15', 'completed', 3.20, 'Good', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(8, 5, 1, '2024-09-01', 'active', 3.70, 'Outstanding', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(9, 5, 5, '2024-09-01', 'active', NULL, NULL, '2025-12-11 21:34:04', '2025-12-11 21:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('professor','associate_professor','assistant_professor','lecturer','instructor') NOT NULL DEFAULT 'instructor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `department_id`, `first_name`, `last_name`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dr. Robert', 'Johnson', 'robert.johnson@faculty.edu', 'professor', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(2, 1, 'Prof. Patricia', 'Williams', 'patricia.williams@faculty.edu', 'associate_professor', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(3, 2, 'Dr. Michael', 'Brown', 'michael.brown@faculty.edu', 'professor', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(4, 3, 'Mr. James', 'Miller', 'james.miller@faculty.edu', 'assistant_professor', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(5, 4, 'Ms. Jennifer', 'Davis', 'jennifer.davis@faculty.edu', 'lecturer', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(6, 5, 'Mr. David', 'Martinez', 'david.martinez@faculty.edu', 'instructor', '2025-12-11 21:34:03', '2025-12-11 21:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_01_000000_create_users_table', 1),
(2, '2025_12_11_000101_create_students_table', 1),
(3, '2025_12_11_000102_create_programs_table', 1),
(4, '2025_12_11_000103_create_departments_table', 1),
(5, '2025_12_11_000104_create_instructors_table', 1),
(6, '2025_12_11_000105_create_courses_table', 1),
(7, '2025_12_11_000106_create_class_sections_table', 1),
(8, '2025_12_11_000107_create_enrollments_table', 1),
(9, '2025_12_11_000108_create_transcripts_table', 1),
(10, '2025_12_11_000109_create_audit_logs_table', 1),
(11, '2025_12_11_073622_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `degree_level` enum('associate','bachelor','master','doctoral') NOT NULL DEFAULT 'bachelor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `degree_level`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Science in Computer Science', 'bachelor', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(2, 'Bachelor of Science in Information Technology', 'bachelor', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(3, 'Bachelor of Science in Engineering', 'bachelor', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(4, 'Master of Science in Computer Science', 'master', '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(5, 'Associate Degree in Business Administration', 'associate', '2025-12-11 21:34:03', '2025-12-11 21:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ac5lJLrzAwNyYAs0P2wN0yKOVGlCxSPjnWeXt1Qh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTNjSHNMb3FoVnFMZWtZRjFzVUprM3RlMEdRSldUMUNsNDhPM3IwTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMDoiYXV0aC5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765808468),
('tTkQVkUQImIhCn14RO2ePaXFkVjcTXkNiO6psRxd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkZOVlBGYVRJUlNpemxSZFRBVzN6QXl0eERxUTU1d09vSkgxR2x4TyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765794758);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `enrollment_status` enum('active','inactive','suspended','graduated') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `birth_date`, `email`, `contact_number`, `address`, `enrollment_status`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', '2003-05-15', 'john.doe@student.edu', '09171234567', '123 Main St, Makati, Metro Manila', 'active', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(2, 'Maria', 'Santos', '2002-08-22', 'maria.santos@student.edu', '09187654321', '456 Oak Ave, Quezon City, Metro Manila', 'active', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(3, 'Juan', 'Cruz', '2004-01-10', 'juan.cruz@student.edu', '09165555555', '789 Pine Rd, Pasig, Metro Manila', 'active', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(4, 'Anna', 'Reyes', '2003-11-30', 'anna.reyes@student.edu', '09169999999', '321 Elm St, Marikina, Metro Manila', 'graduated', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(5, 'Carlos', 'Gonzales', '2002-03-18', 'carlos.gonzales@student.edu', '09172222222', '654 Birch Lane, Taguig, Metro Manila', 'active', '2025-12-11 21:34:04', '2025-12-11 21:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `transcripts`
--

CREATE TABLE `transcripts` (
  `transcript_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date_generated` date NOT NULL,
  `generated_by_staff_id` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcripts`
--

INSERT INTO `transcripts` (`transcript_id`, `student_id`, `date_generated`, `generated_by_staff_id`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-12-01', 'STAFF001', '/transcripts/student_1_transcript.pdf', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(2, 2, '2024-12-01', 'STAFF001', '/transcripts/student_2_transcript.pdf', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(3, 4, '2024-06-15', 'STAFF002', '/transcripts/student_4_transcript.pdf', '2025-12-11 21:34:04', '2025-12-11 21:34:04'),
(4, 5, '2024-12-01', 'STAFF001', '/transcripts/student_5_transcript.pdf', '2025-12-11 21:34:04', '2025-12-11 21:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('student','instructor','admin') NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `email_verified_at`, `password`, `full_name`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'JohnDave', 'johndave@student.edu', NULL, '$2y$12$F4da2MFxFFWhFwnUOtu.9OX4OEukbJGbs3TaTTXzxshpvBj9yqjqu', 'John Dave', 'student', NULL, '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(2, 'admin', 'admin@student.edu', NULL, '$2y$12$hnQCZ/J6gMXNRyz2Ujm0U.Nw9dY8ZndnAgYqCfIQ4qXf0TXQgfM0K', 'Admin User', 'admin', NULL, '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(3, 'drsmith', 'drsmith@student.edu', NULL, '$2y$12$NUNnggvkgqIGoh7zHd.MKeZ5RbG/MZW/QUoLFjW6203xHGBw9Sffe', 'Dr. Smith', 'instructor', NULL, '2025-12-11 21:34:03', '2025-12-11 21:34:03'),
(4, 'jerr', 'jevillanueva@my.cspc.edu.ph', NULL, '$2y$12$6x/9Vfe33XGTZ5..pvyROOU/eA2XP6IjtClwdPXv0KFiZNq2i2q3y', 'Jerro B. Villanueva', 'student', NULL, '2025-12-11 21:37:54', '2025-12-11 21:37:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_courses`
--
ALTER TABLE `academic_courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `academic_courses_course_code_unique` (`course_code`),
  ADD KEY `academic_courses_program_id_foreign` (`program_id`),
  ADD KEY `academic_courses_department_id_foreign` (`department_id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `class_sections_course_id_foreign` (`course_id`),
  ADD KEY `class_sections_instructor_id_foreign` (`instructor_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `departments_department_name_unique` (`department_name`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `enrollments_student_id_foreign` (`student_id`),
  ADD KEY `enrollments_section_id_foreign` (`section_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `instructors_email_unique` (`email`),
  ADD KEY `instructors_department_id_foreign` (`department_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `transcripts`
--
ALTER TABLE `transcripts`
  ADD PRIMARY KEY (`transcript_id`),
  ADD KEY `transcripts_student_id_foreign` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_courses`
--
ALTER TABLE `academic_courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `section_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transcripts`
--
ALTER TABLE `transcripts`
  MODIFY `transcript_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_courses`
--
ALTER TABLE `academic_courses`
  ADD CONSTRAINT `academic_courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `academic_courses_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE;

--
-- Constraints for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD CONSTRAINT `class_sections_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `academic_courses` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_sections_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `class_sections` (`section_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `transcripts`
--
ALTER TABLE `transcripts`
  ADD CONSTRAINT `transcripts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
