-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 01:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Animal Production NC II', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(2, 'Aquaculture NC II', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(3, 'Automotive Servicing NC I', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(4, 'Automotive Servicing NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(5, 'Bartending NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(6, 'Beauty Care NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(7, 'Caregiving NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(8, 'Hotel & Restaurant Services NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(9, 'Cookery NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(10, 'Driving NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(11, 'Food Processing NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(12, 'Front Office Services NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(13, 'Health Care Services NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(14, 'Household Services NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(15, 'Housekeeping NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(16, 'Masonry NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(17, 'Massage Therapy NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(18, 'Programming NC IV', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(19, 'Shielded Metal Arc Welding (SMAW) NC I', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(20, 'Shielded Metal Arc Welding (SMAW) NC II', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(21, 'Test Add NC II', '2020-02-12 04:43:53', '2020-02-12 04:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `education_histories`
--

CREATE TABLE `education_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `date_graduated` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_histories`
--

INSERT INTO `education_histories` (`id`, `course_id`, `school_id`, `survey_id`, `date_graduated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 6, 1, '2019-06-18', '2020-02-06 07:42:44', '2020-02-09 05:56:18', NULL),
(2, 6, 7, 2, '2020-02-20', '2020-02-06 07:43:40', '2020-02-06 07:43:40', NULL),
(3, 5, 4, 3, '2020-02-20', '2020-02-06 07:44:22', '2020-02-06 07:44:22', NULL),
(4, 5, 3, 4, '2020-02-20', '2020-02-06 07:45:08', '2020-02-06 07:45:08', NULL),
(5, 6, 1, 5, '2020-02-19', '2020-02-06 07:46:23', '2020-02-06 07:46:23', NULL),
(6, 3, 5, 6, '2020-02-21', '2020-02-06 07:47:59', '2020-02-06 07:47:59', NULL),
(7, 6, 5, 7, '2020-02-24', '2020-02-06 07:52:17', '2020-02-06 07:52:17', NULL),
(8, 6, 5, 8, '2020-02-19', '2020-02-06 07:53:48', '2020-02-06 07:53:48', NULL),
(9, 3, 6, 9, '2020-02-11', '2020-02-06 07:56:17', '2020-02-06 07:56:17', NULL),
(10, 5, 3, 10, '2020-02-26', '2020-02-06 08:16:12', '2020-02-06 08:16:12', NULL),
(11, 4, 3, 11, '2020-02-25', '2020-02-06 08:18:04', '2020-02-06 08:18:04', NULL),
(14, 5, 3, 14, '2020-12-12', '2020-02-09 05:54:25', '2020-02-11 15:59:52', NULL),
(15, 14, 1, 15, '2020-12-12', '2020-02-09 05:54:26', '2020-02-11 15:59:06', NULL),
(16, 1, 1, 16, '2019-12-12', '2020-02-11 16:11:07', '2020-02-11 16:11:07', NULL),
(17, 6, 4, 17, '2018-12-12', '2020-02-11 16:11:07', '2020-02-11 16:11:07', NULL),
(22, 1, 1, 22, '2020-12-12', '2020-02-11 21:33:29', '2020-02-11 21:33:29', NULL),
(23, 1, 1, 23, '2020-12-12', '2020-02-11 21:33:29', '2020-02-11 21:33:29', NULL),
(24, 1, 1, 24, '2020-12-12', '2020-02-11 23:58:34', '2020-02-11 23:58:34', NULL),
(25, 1, 1, 25, '2020-12-12', '2020-02-11 23:58:34', '2020-02-11 23:58:34', NULL),
(26, 5, 1, 26, '2016-09-09', '2020-02-12 01:43:53', '2020-02-12 01:49:39', NULL),
(27, 3, 7, 27, '2019-02-02', '2020-02-12 01:43:53', '2020-02-12 01:50:26', NULL),
(40, 5, 1, 40, '2019-02-09', '2020-02-12 02:33:14', '2020-02-12 02:33:14', NULL),
(41, 3, 7, 41, '2019-02-09', '2020-02-12 02:33:14', '2020-02-12 02:33:14', NULL),
(42, 21, 18, 42, '2020-02-14', '2020-02-12 04:46:23', '2020-02-12 04:46:23', NULL),
(43, 21, 18, 43, '2018-07-08', '2020-02-12 04:54:17', '2020-02-12 04:54:57', NULL),
(53, 21, 18, 53, '2019-12-09', '2020-02-12 06:11:57', '2020-02-12 06:11:57', NULL),
(58, 1, 1, 56, '2020-12-12', '2020-02-17 04:18:15', '2020-02-17 04:18:15', NULL),
(59, 6, 4, 56, '2013-11-23', '2020-02-17 04:18:15', '2020-02-17 04:18:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment_histories`
--

CREATE TABLE `employment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `job_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_employed` date DEFAULT NULL,
  `date_resigned` date DEFAULT NULL,
  `job_id` int(10) UNSIGNED DEFAULT NULL,
  `industry_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_histories`
--

INSERT INTO `employment_histories` (`id`, `survey_id`, `job_description`, `date_employed`, `date_resigned`, `job_id`, `industry_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Janitor', '2020-02-18', NULL, 6, 6, '2020-02-06 07:42:44', '2020-02-06 07:42:44', NULL),
(2, 2, 'Florist', '2020-02-20', NULL, 6, 6, '2020-02-06 07:43:40', '2020-02-06 07:43:40', NULL),
(3, 3, 'Bartender', '2020-02-14', '2020-02-05', 6, 6, '2020-02-06 07:44:22', '2020-02-06 07:45:19', NULL),
(4, 4, 'Bartender', '2020-02-19', '2020-02-20', 5, 5, '2020-02-06 07:45:09', '2020-02-06 07:45:09', NULL),
(5, 5, 'Manicurist', '2020-02-19', NULL, 6, 6, '2020-02-06 07:46:23', '2020-02-06 07:46:23', NULL),
(6, 6, 'Mechanic', '2020-02-05', NULL, 5, 5, '2020-02-06 07:47:59', '2020-02-06 07:47:59', NULL),
(7, 7, 'Manicurist', '2020-02-28', NULL, 6, 6, '2020-02-06 07:52:17', '2020-02-06 07:52:17', NULL),
(8, 8, 'nasa', '2020-02-19', NULL, 2, 2, '2020-02-06 07:53:48', '2020-02-11 16:52:59', NULL),
(9, 9, 'Mechanic', '2020-02-19', '2020-02-26', 6, 6, '2020-02-06 07:56:17', '2020-02-06 07:56:17', NULL),
(10, 10, 'Bartender', '2020-02-26', '2020-02-29', 6, 6, '2020-02-06 08:16:12', '2020-02-06 08:16:12', NULL),
(11, 11, 'Janitor', '2020-02-18', '2020-02-17', 6, 6, '2020-02-06 08:18:04', '2020-02-06 08:18:04', NULL),
(13, 14, 'Bartender', '1970-01-19', NULL, 5, 5, '2020-02-09 05:54:26', '2020-02-11 15:59:52', NULL),
(14, 15, 'Janitor', '2020-01-21', '2020-02-19', 3, 3, '2020-02-11 15:58:40', '2020-02-11 15:58:40', NULL),
(15, 16, 'Mechanic', '1970-01-01', NULL, 1, 1, '2020-02-11 16:11:07', '2020-02-11 17:48:10', NULL),
(16, 17, 'Janitor', '2017-12-10', '2020-02-25', 6, 6, '2020-02-11 16:11:07', '2020-02-11 17:48:30', NULL),
(21, 22, 'Janitor', '2012-12-12', '2020-02-24', 1, 1, '2020-02-11 21:33:29', '2020-02-11 21:38:28', NULL),
(22, 23, 'Janitor', '2020-02-19', NULL, NULL, NULL, '2020-02-11 21:35:07', '2020-02-11 21:35:07', NULL),
(23, 24, 'test', '2012-12-12', NULL, 1, 1, '2020-02-11 23:58:34', '2020-02-11 23:58:34', NULL),
(24, 26, 'Bartender', '2017-12-09', NULL, 1, 1, '2020-02-12 01:43:53', '2020-02-12 01:43:53', NULL),
(25, 27, 'Mechanic', '2018-12-09', NULL, 6, 6, '2020-02-12 01:43:53', '2020-02-12 01:50:26', NULL),
(26, 25, 'Janitor', NULL, NULL, NULL, NULL, '2020-02-12 01:44:51', '2020-02-12 01:44:51', NULL),
(39, 40, 'Bartender', '2017-12-09', NULL, 1, 1, '2020-02-12 02:33:14', '2020-02-12 02:33:14', NULL),
(40, 41, 'Mechanic', '2018-12-09', NULL, 6, 3, '2020-02-12 02:33:14', '2020-02-12 02:33:14', NULL),
(41, 42, 'Janitor', '2020-02-21', NULL, 5, 5, '2020-02-12 04:46:23', '2020-02-12 04:46:23', NULL),
(42, 43, 'Bartender', '2019-12-09', NULL, 1, 1, '2020-02-12 04:54:17', '2020-02-12 04:54:17', NULL),
(52, 53, 'Mechanic', '2018-08-11', '2019-11-08', 9, 14, '2020-02-12 06:11:57', '2020-02-12 06:11:57', NULL),
(57, 56, 'test', '2012-12-13', '2013-02-23', 1, 1, '2020-02-17 04:18:15', '2020-02-17 04:18:15', NULL),
(58, 56, 'test1', '2014-09-21', NULL, 2, 2, '2020-02-17 04:18:15', '2020-02-17 04:18:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aviation', '2020-02-06 07:38:36', '2020-02-06 07:38:36'),
(2, 'Arts', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(3, 'Business', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(4, 'Law Enforcement', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(5, 'Media', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(6, 'Medical', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(7, 'Service Industry', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(8, 'Teaching', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(9, 'Technology', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(10, 'Military', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(11, 'Social Welfare', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(12, 'Animal Welfare', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(14, 'Test Industry', '2020-02-12 05:23:46', '2020-02-12 05:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Computer Hardware Maintenance', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(2, 'Software Engineering', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(3, 'Janitorial and Utility', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(4, 'Medical Practicioner', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(5, 'Business Management', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(6, 'Human Resource Management', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(7, 'Finance and Accounting', '2020-02-06 07:38:37', '2020-02-06 07:38:37'),
(9, 'Test Job Type', '2020-02-12 05:23:22', '2020-02-12 05:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_08_073218_create_schools_table', 1),
(10, '2019_12_08_073733_create_job_types_table', 1),
(11, '2019_12_08_073959_create_industries_table', 1),
(12, '2019_12_08_074327_create_courses_table', 1),
(13, '2019_12_08_074328_create_survey_answers_table', 1),
(14, '2020_01_14_112828_alter_survey_answers_table', 1),
(15, '2020_01_20_111157_soft_delete_user', 1),
(16, '2020_01_26_024531_alter_survey_answers', 1),
(17, '2020_01_26_030751_alter_survey_column', 1),
(18, '2020_01_26_030944_alter_survey_column_date_employed', 1),
(19, '2020_01_28_120146_job_description_nullable', 1),
(20, '2020_02_02_042352_create_employment_history', 1),
(21, '2020_02_02_043338_create_education_history', 1),
(22, '2020_02_02_044827_alter_survey_answers_history', 1),
(23, '2020_02_02_045829_soft_delete_survey', 1),
(24, '2020_02_02_130949_alter_survey_answer', 1),
(25, '2020_02_09_065805_alter_survey_answers_column', 2),
(26, '2020_02_11_110534_create_tier_1_table', 3),
(27, '2020_02_11_110831_create_tier_2_table', 3),
(28, '2020_02_11_111622_create_tier_3_table', 3),
(29, '2020_02_11_232250_alter_survey_answers_column_middle_name', 3),
(30, '2020_02_13_121038_rename_tier_1', 4),
(31, '2020_02_13_121307_drop_tier_2', 4),
(32, '2020_02_13_121333_drop_tier_3', 4),
(33, '2020_02_13_121539_alter_tier_table', 4),
(34, '2020_02_16_110418_birth_date_column', 5);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('20431aa2b83ea8525fe37dd4da3abaa5883e3896f5709531372abf75de00ec7436161dc4d016d71d', 1, 1, 'Personal Access Token', '[]', 0, '2020-02-15 03:17:00', '2020-02-15 03:17:00', '2021-02-15 11:17:00'),
('355ef76b2140462291d197b209cc41371d9883170d9c7bbbdd47bd9fbee8366361ce5a388dad5e04', 1, 1, 'Personal Access Token', '[]', 0, '2020-02-17 01:36:25', '2020-02-17 01:36:25', '2021-02-17 09:36:25'),
('cc9252b8d0140ad403a49199bc641844abf29a66c47d9664265dbc8b6d176bfe3692b743d5e1e7a1', 1, 1, 'Personal Access Token', '[]', 1, '2020-02-06 07:40:40', '2020-02-06 07:40:40', '2021-02-06 15:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'gNMy2aQF6L1qeDgQOXOtK91vGo8MYXWVzQiPAN4D', 'http://localhost', 1, 0, 0, '2020-02-06 07:39:43', '2020-02-06 07:39:43'),
(2, NULL, 'Laravel Password Grant Client', 'QB9XrIUBOBlDQ7KT82aYrHisl7pNkbrE8CMAPK9i', 'http://localhost', 0, 1, 0, '2020-02-06 07:39:43', '2020-02-06 07:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-02-06 07:39:43', '2020-02-06 07:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Caraga College of Technology', '2020-02-06 07:38:34', '2020-02-06 07:38:34'),
(2, 'Christian Academy in Davao Oriental Inc.', '2020-02-06 07:38:34', '2020-02-06 07:38:34'),
(3, 'Doña Jacinta Esteves Memorial College', '2020-02-06 07:38:34', '2020-02-06 07:38:34'),
(4, 'Don Bosco Training Center', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(5, 'Eastern Davao Academy Inc.', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(6, 'Informatic Technological College of Davao Oriental', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(7, 'Lupon School of Fisheries', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(8, 'Lupon School of Fisheries - Annex', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(9, 'Manay Institute of Technology Inc.', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(10, 'Maritime Technical School of Davao Oriental Inc.', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(11, 'Mati Doctors College Inc.', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(12, 'Mati Polytechnic College Inc. (Mati Polytechnic Institute)', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(13, 'Mati Polytechnic College Inc.- Caraga Extension Campus', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(14, 'Provincial Training Center (SIMTRAC)', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(15, 'Richmond Montessori College Inc.', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(16, 'Software Technological Institute Inc.', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(17, 'St. Mary\'s College of Baganga Inc.', '2020-02-06 07:38:35', '2020-02-06 07:38:35'),
(18, 'Test School Add', '2020-02-12 04:45:04', '2020-02-12 04:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE `survey_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_answers`
--

INSERT INTO `survey_answers` (`id`, `age`, `created_at`, `updated_at`, `first_name`, `last_name`, `address`, `employment_status`, `gender`, `middle_name`, `birth_date`) VALUES
(1, 21, '2020-02-06 07:42:44', '2020-02-11 15:50:47', 'Hahha', 'Malasaga', 'Davao', 'employed', 'male', 'Ricardo', '0000-00-00'),
(2, 25, '2020-02-06 07:43:40', '2020-02-11 15:51:06', 'Kam', 'Laine', 'Tagum', 'employed', 'female', 'Liam', '0000-00-00'),
(3, 23, '2020-02-06 07:44:22', '2020-02-11 15:51:19', 'Keny', 'Sabs', 'Davao', 'unemployed', 'male', 'Lim', '0000-00-00'),
(4, 29, '2020-02-06 07:45:08', '2020-02-11 15:51:48', 'Jask', 'Shaine', 'Tagum', 'unemployed', 'female', 'Canada', '0000-00-00'),
(5, 24, '2020-02-06 07:46:22', '2020-02-11 15:52:33', 'Hannah', 'Baine', 'Panabo', 'employed', 'female', 'Ann', '0000-00-00'),
(6, 21, '2020-02-06 07:47:59', '2020-02-11 15:52:48', 'Kenny', 'Sam', 'Davao', 'employed', 'male', 'Lambert', '0000-00-00'),
(7, 25, '2020-02-06 07:52:17', '2020-02-11 15:53:29', 'Keny', 'Shax', 'Davao', 'employed', 'female', 'Kyre', '0000-00-00'),
(8, 23, '2020-02-06 07:53:48', '2020-02-11 15:54:00', 'Hanoi', 'Sanana', 'Davao', 'employed', 'female', 'Amil', '0000-00-00'),
(9, 31, '2020-02-06 07:56:17', '2020-02-11 15:54:36', 'Lamas', 'Syke', 'Davao', 'unemployed', 'male', 'Mulan', '0000-00-00'),
(10, 24, '2020-02-06 08:16:12', '2020-02-11 15:56:14', 'Hallo', 'Kens', 'Davao', 'unemployed', 'male', 'Galio', '0000-00-00'),
(11, 29, '2020-02-06 08:18:04', '2020-02-11 15:56:30', 'Mains', 'Seems', 'Davao', 'unemployed', 'male', 'Gaen', '0000-00-00'),
(14, 12, '2020-02-09 05:54:25', '2020-02-11 15:56:53', 'Jan', 'Rey', 'malasaga', 'employed', 'male', 'Garen', '0000-00-00'),
(15, 12, '2020-02-09 05:54:26', '2020-02-11 15:58:40', 'Jerick', 'Salomon', 'Tagum', 'unemployed', 'male', 'Malasaga', '0000-00-00'),
(16, 23, '2020-02-11 16:11:07', '2020-02-11 17:17:00', 'Kool', 'Habber', 'Davao', 'employed', 'male', 'Rune', '0000-00-00'),
(17, 27, '2020-02-11 16:11:07', '2020-02-11 17:17:09', 'Sans', 'Under', 'Tagum', 'unemployed', 'female', 'Habbo', '0000-00-00'),
(22, 12, '2020-02-11 21:33:29', '2020-02-11 21:38:28', 'Kennas', 'Las', 'Davao', 'unemployed', 'male', 'Ben', '0000-00-00'),
(23, 12, '2020-02-11 21:33:29', '2020-02-11 21:35:07', 'Lolas', 'Rey', 'malasaga', 'employed', 'male', 'Suarez', '0000-00-00'),
(24, 12, '2020-02-11 23:58:34', '2020-02-11 23:58:34', 'jan ', 'rey', 'malasaga', 'employed', 'male', 'suare', '0000-00-00'),
(25, 12, '2020-02-11 23:58:34', '2020-02-11 23:58:34', 'janrey1', 'rey2', 'malasaga', 'employed', 'male', 'suarez', '0000-00-00'),
(26, 22, '2020-02-12 01:43:53', '2020-02-12 01:49:01', 'Gallahad', 'Sword', 'Davao', 'employed', 'male', 'Night', '0000-00-00'),
(27, 21, '2020-02-12 01:43:53', '2020-02-12 01:50:26', 'Kirigaya', 'Kazuto', 'Digos', 'employed', 'male', 'Kirito', '0000-00-00'),
(40, 22, '2020-02-12 02:33:13', '2020-02-12 02:33:13', 'Strong', 'Weak', 'Tagum', 'employed', 'male', 'Moderate', '0000-00-00'),
(41, 21, '2020-02-12 02:33:14', '2020-02-12 02:33:14', 'CJ', 'Andreas', 'Davao', 'unemployed', 'male', 'San', '0000-00-00'),
(42, 23, '2020-02-12 04:46:23', '2020-02-12 04:46:23', 'Test', 'Tess', 'Davao', 'employed', 'male', 'Tes', '0000-00-00'),
(43, 26, '2020-02-12 04:54:17', '2020-02-12 04:54:17', 'Tessa', 'Morriah', 'Panabo', 'employed', 'female', 'Jane', '0000-00-00'),
(53, 28, '2020-02-12 06:11:57', '2020-02-12 06:11:57', 'Master', 'Yi', 'Mati', 'unemployed', 'male', 'Ionia', '0000-00-00'),
(56, 24, '2020-02-17 04:18:15', '2020-02-17 04:18:15', 'Sam', 'Som', 'malasaga', 'employed', 'male', 'Sem', '2012-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `tiers`
--

CREATE TABLE `tiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tier_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiers`
--

INSERT INTO `tiers` (`id`, `course_id`, `job_id`, `industry_id`, `created_at`, `updated_at`, `tier_number`) VALUES
(1, 6, 6, 6, '2020-02-15 03:14:55', '2020-02-15 03:14:55', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test God Damn User', 'test@test.com', NULL, '$2y$10$EydX7H1dhh1u1J/l4/7hN.K2m.TW4E3BC/QPMci6kIY0M96jbDMi6', NULL, '2020-02-06 07:38:37', '2020-02-06 07:38:37', NULL),
(2, 'Euma', 'euma@yahoo.com', NULL, '$2y$10$qWiIvm6OHo1Da342kqEBDOMpAoaBHvHs6apUF4hocIdCj3oFAN2me', NULL, '2020-02-11 16:01:16', '2020-02-11 16:01:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_histories`
--
ALTER TABLE `education_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_histories_course_id_foreign` (`course_id`),
  ADD KEY `education_histories_school_id_foreign` (`school_id`),
  ADD KEY `education_histories_survey_id_foreign` (`survey_id`);

--
-- Indexes for table `employment_histories`
--
ALTER TABLE `employment_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employment_histories_survey_id_foreign` (`survey_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiers`
--
ALTER TABLE `tiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tier_1_course_id_foreign` (`course_id`),
  ADD KEY `tier_1_job_id_foreign` (`job_id`),
  ADD KEY `tier_1_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `education_histories`
--
ALTER TABLE `education_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `employment_histories`
--
ALTER TABLE `employment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `survey_answers`
--
ALTER TABLE `survey_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tiers`
--
ALTER TABLE `tiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education_histories`
--
ALTER TABLE `education_histories`
  ADD CONSTRAINT `education_histories_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `education_histories_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `education_histories_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `survey_answers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employment_histories`
--
ALTER TABLE `employment_histories`
  ADD CONSTRAINT `employment_histories_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `survey_answers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tiers`
--
ALTER TABLE `tiers`
  ADD CONSTRAINT `tier_1_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tier_1_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tier_1_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
