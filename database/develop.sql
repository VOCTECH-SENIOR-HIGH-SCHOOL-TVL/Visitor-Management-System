-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 03:02 AM
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
-- Database: `develop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `role`, `created_at`, `updated_at`, `profile_picture`) VALUES
(2, 'Andrew James Garsano', 'dads', '2025-04-13 04:20:24', '2025-04-13 04:20:24', NULL),
(3, 'Andrew James Garsano', 'Stundent', '2025-04-13 05:02:44', '2025-04-13 05:02:44', NULL),
(4, 'Andrew James Garsano', 'Stundent', '2025-04-13 05:18:46', '2025-04-13 05:18:46', NULL),
(5, 'Andrew James Garsano', 'Stundent', '2025-04-13 07:21:50', '2025-04-13 07:21:50', NULL),
(6, 'Andrew James Garsano', 'Stundent', '2025-04-13 07:23:38', '2025-04-13 07:23:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_04_08_084542_create_visitors_table', 1),
(6, '2025_04_13_055633_create_students_table', 2),
(11, '2025_04_13_065304_create_voctechstudents_table', 3),
(12, '2025_04_13_084541_add_status_to_visitors_table', 4),
(14, '2025_04_13_111708_create_contacts_table', 5),
(15, '2025_04_13_121105_add_profile_picture_to_contacts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ynx/X/HPFo40X8rKPKdKO.W69Cdrt4kF6nFuqVpeJtedqxG06THbm', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `who_to_meet` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `full_name`, `contact_number`, `address`, `who_to_meet`, `reason`, `time_in`, `time_out`, `created_at`, `updated_at`, `status`) VALUES
(8, 'asdsdas', 'dasda', 'dasdasdasd', '1', 'dasdsa', '09:03:00', '09:03:00', '2025-04-13 04:02:35', '2025-04-13 04:02:35', 'Pending'),
(9, 'asdsdas', 'dasdasd', 'dasdasd', '1', 'dsadaddas', '09:09:00', '09:09:00', '2025-04-13 04:08:39', '2025-04-13 04:08:39', 'Pending'),
(10, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dasdasad', '11:28:00', '11:28:00', '2025-04-13 06:28:02', '2025-04-13 06:28:02', 'Pending'),
(11, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '2', 'dadasdsdasdd', '11:29:00', '00:30:00', '2025-04-13 06:28:26', '2025-04-13 06:28:26', 'Pending'),
(12, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dsadasdsdsd', '11:29:00', '00:29:00', '2025-04-13 06:28:48', '2025-04-13 06:28:48', 'Pending'),
(13, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dasdasdasdasd', '00:33:00', '23:30:00', '2025-04-13 06:29:11', '2025-04-13 06:29:11', 'Pending'),
(14, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dsadasda', '00:31:00', '11:31:00', '2025-04-13 06:30:26', '2025-04-13 06:30:26', 'Pending'),
(15, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dasdasd', '11:32:00', '11:32:00', '2025-04-13 06:30:44', '2025-04-13 06:30:44', 'Pending'),
(16, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dasdasdas', '00:33:00', '00:33:00', '2025-04-13 06:31:06', '2025-04-13 06:31:06', 'Pending'),
(17, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dasdas', '11:32:00', '11:32:00', '2025-04-13 06:31:28', '2025-04-13 06:31:28', 'Pending'),
(18, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '1', 'dasdasdsa', '23:33:00', '23:33:00', '2025-04-13 06:31:44', '2025-04-13 06:31:44', 'Pending'),
(19, 'Andrew James Garsano', '09958350405', 'cebu city talisay', '3', 'dasdas', '00:31:00', '00:31:00', '2025-04-13 07:30:12', '2025-04-13 07:30:12', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `voctechstudents`
--

CREATE TABLE `voctechstudents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `visits_count` int(11) NOT NULL DEFAULT 0,
  `last_visitor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voctechstudents`
--

INSERT INTO `voctechstudents` (`id`, `full_name`, `contact_number`, `address`, `visits_count`, `last_visitor`, `created_at`, `updated_at`) VALUES
(1, 'Andrew James Garsano', '09958350405', 'cebu city talisay', 0, NULL, '2025-04-13 00:19:50', '2025-04-13 00:19:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voctechstudents`
--
ALTER TABLE `voctechstudents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `voctechstudents`
--
ALTER TABLE `voctechstudents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
