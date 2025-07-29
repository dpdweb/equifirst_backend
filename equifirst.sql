-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2025 at 08:42 PM
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
-- Database: `equifirst`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technology 1', '2025-06-16 14:49:51', '2025-06-16 15:44:57'),
(2, 'Health', '2025-06-16 14:49:51', '2025-06-16 14:49:51'),
(3, 'Education', '2025-06-16 14:49:51', '2025-06-16 14:49:51'),
(4, 'Lifestyle', '2025-06-16 14:49:51', '2025-06-16 14:49:51'),
(5, 'Business', '2025-06-16 14:49:51', '2025-06-16 14:49:51'),
(6, 'Technology', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(7, 'Health', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(8, 'Education', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(9, 'Lifestyle', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(10, 'Business', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(11, 'Technology', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(12, 'Health', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(13, 'Education', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(14, 'Lifestyle', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(15, 'Business 1', '2025-06-16 15:07:23', '2025-06-16 15:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_category_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_category_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is this site about?', 'This site provides FAQ functionality in Laravel.', '2025-07-15 14:17:08', '2025-07-15 14:17:08'),
(2, 2, 'Sample Question 1 in General?', 'This is the answer to Sample Question 1 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(3, 2, 'Sample Question 2 in General?', 'This is the answer to Sample Question 2 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(4, 2, 'Sample Question 3 in General?', 'This is the answer to Sample Question 3 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(5, 2, 'Sample Question 4 in General?', 'This is the answer to Sample Question 4 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(6, 2, 'Sample Question 5 in General?', 'This is the answer to Sample Question 5 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(7, 2, 'Sample Question 6 in General?', 'This is the answer to Sample Question 6 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(8, 2, 'Sample Question 7 in General?', 'This is the answer to Sample Question 7 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(9, 2, 'Sample Question 8 in General?', 'This is the answer to Sample Question 8 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(10, 2, 'Sample Question 9 in General?', 'This is the answer to Sample Question 9 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(11, 2, 'Sample Question 10 in General?', 'This is the answer to Sample Question 10 in General category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(12, 3, 'Sample Question 1 in Account?', 'This is the answer to Sample Question 1 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(13, 3, 'Sample Question 2 in Account?', 'This is the answer to Sample Question 2 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(14, 3, 'Sample Question 3 in Account?', 'This is the answer to Sample Question 3 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(15, 3, 'Sample Question 4 in Account?', 'This is the answer to Sample Question 4 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(16, 3, 'Sample Question 5 in Account?', 'This is the answer to Sample Question 5 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(17, 3, 'Sample Question 6 in Account?', 'This is the answer to Sample Question 6 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(18, 3, 'Sample Question 7 in Account?', 'This is the answer to Sample Question 7 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(19, 3, 'Sample Question 8 in Account?', 'This is the answer to Sample Question 8 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(20, 3, 'Sample Question 9 in Account?', 'This is the answer to Sample Question 9 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(21, 3, 'Sample Question 10 in Account?', 'This is the answer to Sample Question 10 in Account category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(22, 4, 'Sample Question 1 in Payments?', 'This is the answer to Sample Question 1 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(23, 4, 'Sample Question 2 in Payments?', 'This is the answer to Sample Question 2 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(24, 4, 'Sample Question 3 in Payments?', 'This is the answer to Sample Question 3 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(25, 4, 'Sample Question 4 in Payments?', 'This is the answer to Sample Question 4 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(26, 4, 'Sample Question 5 in Payments?', 'This is the answer to Sample Question 5 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(27, 4, 'Sample Question 6 in Payments?', 'This is the answer to Sample Question 6 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(28, 4, 'Sample Question 7 in Payments?', 'This is the answer to Sample Question 7 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(29, 4, 'Sample Question 8 in Payments?', 'This is the answer to Sample Question 8 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(30, 4, 'Sample Question 9 in Payments?', 'This is the answer to Sample Question 9 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(31, 4, 'Sample Question 10 in Payments?', 'This is the answer to Sample Question 10 in Payments category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(32, 5, 'Sample Question 1 in Technical?', 'This is the answer to Sample Question 1 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(33, 5, 'Sample Question 2 in Technical?', 'This is the answer to Sample Question 2 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(34, 5, 'Sample Question 3 in Technical?', 'This is the answer to Sample Question 3 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(35, 5, 'Sample Question 4 in Technical?', 'This is the answer to Sample Question 4 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(36, 5, 'Sample Question 5 in Technical?', 'This is the answer to Sample Question 5 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(37, 5, 'Sample Question 6 in Technical?', 'This is the answer to Sample Question 6 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(38, 5, 'Sample Question 7 in Technical?', 'This is the answer to Sample Question 7 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(39, 5, 'Sample Question 8 in Technical?', 'This is the answer to Sample Question 8 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(40, 5, 'Sample Question 9 in Technical?', 'This is the answer to Sample Question 9 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(41, 5, 'Sample Question 10 in Technical?', 'This is the answer to Sample Question 10 in Technical category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(42, 6, 'Sample Question 1 in Policies?', 'This is the answer to Sample Question 1 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(43, 6, 'Sample Question 2 in Policies?', 'This is the answer to Sample Question 2 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(44, 6, 'Sample Question 3 in Policies?', 'This is the answer to Sample Question 3 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(45, 6, 'Sample Question 4 in Policies?', 'This is the answer to Sample Question 4 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(46, 6, 'Sample Question 5 in Policies?', 'This is the answer to Sample Question 5 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(47, 6, 'Sample Question 6 in Policies?', 'This is the answer to Sample Question 6 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(48, 6, 'Sample Question 7 in Policies?', 'This is the answer to Sample Question 7 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(49, 6, 'Sample Question 8 in Policies?', 'This is the answer to Sample Question 8 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(50, 6, 'Sample Question 9 in Policies?', 'This is the answer to Sample Question 9 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(51, 6, 'Sample Question 10 in Policies?', 'This is the answer to Sample Question 10 in Policies category.', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(52, 2, 'How can I delete my Working Ben account???', 'dfsdfdsfsdf', '2025-07-15 14:55:39', '2025-07-15 14:55:39'),
(53, 4, 'How can I delete my Working Ben account???sasdas', 'dfdfdfdfsdf', '2025-07-15 14:55:49', '2025-07-15 15:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', '2025-07-15 14:17:08', '2025-07-15 14:17:08'),
(2, 'General', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(3, 'Account', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(4, 'Payments', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(5, 'Technical', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(6, 'Policies', '2025-07-15 14:18:30', '2025-07-15 14:18:30'),
(8, 'twertw', '2025-07-16 13:02:42', '2025-07-16 13:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `hero_sliders`
--

CREATE TABLE `hero_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sliders`
--

INSERT INTO `hero_sliders` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(11, NULL, 'uploads/hero_sliders/1751495147_2kaSV6.png', '2025-07-02 17:25:47', '2025-07-02 17:25:47'),
(12, NULL, 'uploads/hero_sliders/1751495147_2kaSV6.png', '2025-07-03 11:56:35', '2025-07-03 11:56:40');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 2),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(5, '2014_10_12_100000_create_password_resets_table', 3),
(6, '2025_06_10_191226_create_hero_sliders_table', 4),
(7, '2025_06_16_131254_create_teams_table', 5),
(8, '2025_06_16_192839_create_categories_table', 6),
(9, '2025_06_16_193207_create_posts_table', 6),
(11, '2025_06_21_160027_create_hero_sliders_table', 7),
(12, '2025_06_23_071026_create_requests_table', 8),
(13, '2025_07_15_190225_create_faq_categories_table', 9),
(14, '2025_07_15_190226_create_faqs_table', 9),
(15, '2025_07_16_215221_create_testimonials_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(12, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(10, 'Core Patient', 'web', '2024-07-27 13:44:51', '2024-07-27 13:44:51'),
(11, 'Core Appt', 'web', '2024-07-27 14:06:11', '2024-07-27 14:06:11'),
(12, 'D-Flo Patient', 'web', '2024-07-28 14:22:53', '2024-07-28 14:22:53'),
(13, 'D-Flo Appt', 'web', '2024-07-28 14:23:43', '2024-07-28 14:23:43'),
(14, 'Skip Appointments D-Flo', 'web', '2024-07-28 14:24:13', '2024-07-28 14:24:13'),
(15, 'Skip Appointments Core', 'web', '2024-07-28 14:24:52', '2024-07-28 14:24:52'),
(16, 'Skip Appointments Core Merge Data', 'web', '2024-07-30 10:45:20', '2024-07-30 10:45:20'),
(17, 'Skip Appointments D-Flo Merge Data', 'web', '2024-07-30 10:46:44', '2024-07-30 10:46:44'),
(18, 'Users Management', 'web', '2024-07-30 12:12:15', '2024-07-30 12:12:15'),
(19, 'Users Management Add', 'web', '2024-07-30 12:13:04', '2024-07-30 12:13:04'),
(20, 'Users Management Edit', 'web', '2024-07-30 12:13:18', '2024-07-30 12:13:18'),
(21, 'Users Management Delete', 'web', '2024-07-30 12:13:38', '2024-07-30 12:13:38'),
(22, 'Roles Management', 'web', '2024-07-30 12:15:04', '2024-07-30 12:15:04'),
(23, 'Roles Management Add', 'web', '2024-07-30 12:15:22', '2024-07-30 12:15:22'),
(24, 'Roles Management Edit', 'web', '2024-07-30 12:15:48', '2024-07-30 12:15:48'),
(25, 'Roles Management Delete', 'web', '2024-07-30 12:16:45', '2024-07-30 12:16:45'),
(26, 'Locations Management', 'web', NULL, NULL),
(27, 'Locations Management Add', 'web', NULL, NULL),
(28, 'Locations Management Edit', 'web', NULL, NULL),
(29, 'Locations Management Delete', 'web', NULL, NULL),
(30, 'Clients Management', 'web', NULL, NULL),
(31, 'Clients Management Add', 'web', NULL, NULL),
(32, 'Clients Management Edit', 'web', NULL, NULL),
(33, 'Clients Management Delete', 'web', NULL, NULL),
(34, 'Admin Site Setting Edit', 'web', NULL, NULL),
(35, 'Admin Site Setting View', 'web', NULL, NULL),
(36, 'Admin Core Practice Setting Edit', 'web', NULL, NULL),
(37, 'Admin Core Practice Setting View', 'web', NULL, NULL),
(38, 'Admin D Flo Setting Edit', 'web', NULL, NULL),
(39, 'Admin D Flo Setting View', 'web', NULL, NULL),
(40, 'Users Management View', 'web', NULL, NULL),
(41, 'Roles Management View', 'web', NULL, NULL),
(42, 'Locations Management View', 'web', NULL, NULL),
(43, 'Clients Management View', 'web', NULL, NULL);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(15, 2, 'Sample Post Title 15', 'This is a dummy blog content for post number 15. eY1HWpHTauSdOBUAskmRVsaVlNMkgBmw4zG8XJ1qxVZ4oiyzU8MyG1tpozYGmd0AXhXsJPywB6WrdITgilh8WQEf04Sapcs5YWiV', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(16, 4, 'Sample Post Title 16', 'This is a dummy blog content for post number 16. I3rErZ6dCPgzeplsQx8AVHsHDv0aP8hjiezPB1k4OwCKR8y65MNugvpJUm6T85X6HU7t5buMUNdnQRKncetGGvuv5UDUgXtkREEP', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(17, 6, 'Sample Post Title 17', 'This is a dummy blog content for post number 17. RYfqZC2xCIrWXwXCXYXnrD0l2FqNigS7XkK91YkP0r0HCrJfcUdZZHmaOsBYLJzYlSy5hbXxRrXWNWzaphcJCAEabuwWjPXe5K9J', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(18, 4, 'Sample Post Title 18', 'This is a dummy blog content for post number 18. E7I1qMpXyzZnn3vcbvnDvkYV9Dq9ZNXgDCJyfNHcV4TZbXY9OjQ816xoZDvrWu9ZyJYVreY7h6DcIajyPaxbvpmT1dPERO5w1iog', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(19, 6, 'Sample Post Title 19', 'This is a dummy blog content for post number 19. ukVqvL8xvwEvpAS3Tjw9o5bwtV18kntPTQIcrjXaJpV1JzT3M0UFbxtfMjgHGV1d7tZYVnmBBv2286sf84UpqdFYj1VXKpdWuZKS', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(20, 7, 'Sample Post Title 20', 'This is a dummy blog content for post number 20. a4N8eSDQ5xw7MJffJtn54wVAtPsAlXIiEkwTAwnOYUo47Gu6F6Wv8abzW5mje8jSfGlsBUxdX6eTklVNWUf78EtPebUsNU9HT09K', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(21, 2, 'Sample Post Title 1', 'This is a dummy blog content for post number 1. 1qFUjaQceBOySEpu5xc7r9Pwagnur73uxDipuSMVDoBITvWmdcrxL7OkJiqxvRXVQJuZ1ATrf6yRmkVd4Hwdpi6cS0BeDG4sOdGf', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(22, 15, 'Sample Post Title 2', 'This is a dummy blog content for post number 2. YbqjSFJnCAmSodnXARzUDJCLkKiPXAQkyhLjlQDKDrDF2kFUznVOksALpTVI2QOVFXrQsYURULYhgooMHYMOsGiyFM8eC9w3MBs5', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(23, 12, 'Sample Post Title 3', 'This is a dummy blog content for post number 3. RcvYQVLGi121ynwjsvHBUYnMolHCb0JEiwO0qMvqDVbFQ3CbojxbLzgaq5lIOPyWSfh0iZGBB4u3FfR6vHiZWRegLU5NWjRNBUn9', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(24, 2, 'Sample Post Title 4', 'This is a dummy blog content for post number 4. i1SHcK4xZ7lz37W7dPGI2mxh5t6TG0i5kKZMXatqPhqKIsraCtxqF7vn5ug6hDZsPaNO81FfVvEaM50Xt2SFPGW44eRRokuunYrc', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(25, 10, 'Sample Post Title 5', 'This is a dummy blog content for post number 5. ignp0ZV0D5g2njQmRlQFBcKWhkCvXekNnbedon9lzpP0CmZSFxwsnReOLgoZUIq8g4AU5QBEUzfwLhwU1IgvsCFnttmkQZZgPUbv', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(26, 7, 'Sample Post Title 6', 'This is a dummy blog content for post number 6. zTlO7p4gYMkAzrqT92DC4iZQTHGb0YtlrRpnJxNoqrfE15WpSFvhsCHTRbEFGNGHbadl1Y2ys5x0NC8wh2IDHcJBNcahZuJoL0tV', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(27, 8, 'Sample Post Title 7', 'This is a dummy blog content for post number 7. 1S4t8Sjm4ctd1kvSeZJkeyjVJU1GZdsDVL9YQP7gPJSDCLPXY1eCD6oxxGmf84byABfjauLW6lh9CYJb6vhkbCrWgGCxUKzTf78r', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(28, 6, 'Sample Post Title 8', 'This is a dummy blog content for post number 8. 7zx4JTi4bTNWJ0JzT33ZggmEktpLFELxWSOhse0cb1LgNdyWFirRsvV0ZNUNiNRvHTshoLwGo2FRE8v0l4GoH4g0PRBziB8DaEHS', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(29, 11, 'Sample Post Title 9', 'This is a dummy blog content for post number 9. IBpiHftq9tZJetEmeTBswkIXVolXiQEkWPJkh9KowzalhfKsjJRj88JInEUf0PhzOXedP7EoZ9Jy3zW3TndTvPM7wgPhgUTEs74G', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(30, 1, 'Sample Post Title 10', 'This is a dummy blog content for post number 10. a9A2hx1sjYB8AvLFDXJTqvUKVmz4BYnw73L8zp6CTOEYPROuwSkxvUZKpcW22SnGU24iTWTXo0W526XKxOmN3LlAZ6i4t77pcC9H', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(31, 7, 'Sample Post Title 11', 'This is a dummy blog content for post number 11. IHgd1NsnTUnpzyZE9YgTVHGrFGQ2cVzTA2Q1wPNhFbQCumYZEie2DhaSB3ODxKkMF6owEn31YVCk2ANmC7Da4iMFSOBdTH86hmR9', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(32, 5, 'Sample Post Title 12', 'This is a dummy blog content for post number 12. UUp4b2JBVfFsxytOazMJp9Pz1sT5HsohdNQOi5B01TTtCrYfBiFBYR8mFCwHa0MwFNASCbHzfvrrOZ0FCsoNRaWJYQVNjGcDHwhK', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(33, 7, 'Sample Post Title 13', 'This is a dummy blog content for post number 13. z149CIXQWtTDK18WXmD3fXZYJvB0PhgiL578WGpCpMP9TkFVwC3Ab1RuW6Pxay6TM5Cf7Z4NdtQlcyJTCoafsfYZqd3Dpy0T8eyp', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(34, 11, 'Sample Post Title 14', 'This is a dummy blog content for post number 14. DzjY3jAj5E2wTd33vxX3Ea52JVkeJbGndBZzQ19D3isr4WSTdHepjC06UGH2I3pCYH9izLyaYrap60HzLr05QIHp6wugWEB6Ox8D', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(35, 1, 'Sample Post Title 15', 'This is a dummy blog content for post number 15. mQiRt3frbbi3JKFkOZ2a9JRBN9C13EE1b3J2Te3zCtxJKiIypl05KwxTsn5d94FZLAnJ7ZTQOvOvf8tbeFVOQhP2hTM4dzm6khPK', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(36, 9, 'Sample Post Title 16', 'This is a dummy blog content for post number 16. d0HfRcmsq1f3RDMYiDOJV9CzAb6OBbHHAJhz5Fo8F2cWxJpHNm63MSevp7TIZbnvRJHP6ynevd3UNL4l24KnKxW77xpvp30LvICs', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(37, 14, 'Sample Post Title 17', 'This is a dummy blog content for post number 17. hTomWE6eksq5MRzhlxKc1ZFf2jcfy8DurULKxJw8d0Dpxa7t3xD9xPH4hcY3wgfIgTHYolhKXuhoGbdvsY2p4eY5rbK7nOw2AUDk', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(38, 8, 'Sample Post Title 18', 'This is a dummy blog content for post number 18. 9OosaBCG3xs8qXZq47mdPYKsuVe1q8U758LchsmgE5jsjMWsIGWp0ZDuzabEEXmz59Nk1gBpupvbED2AXSpehHMCal3a0xBDHoyR', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(39, 10, 'Sample Post Title 19', 'This is a dummy blog content for post number 19. mB7OdzNKjWZOCSLpSk3t82tvJWlhfFvEuHcKYlxFUhHsdV9ojViiKqOW2KSvZFOcN0T6RxEX8iEczznu0j0wgv0RLqNY76NUCcwZ', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(40, 10, 'Sample Post Title 20', 'This is a dummy blog content for post number 20. 1ZiJyAIIt0mvFbQ7TeGiLMgmEMwyfpP1TTJLbIeWLHT3nypOXZWSfWtbn9D9eQ3Te07GIl7VCOTOkqCvlV67WULQ9hAPgEX1cBQ3', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(47, NULL, 'da', '<p>dfsdfsfs</p>', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-07-16 13:26:48', '2025-07-16 13:26:48'),
(48, NULL, 'da', '<p>dfsdfsfs</p>', 'uploads/posts/1752690426_9r9gyW.jpg', '2025-07-16 13:27:06', '2025-07-16 13:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(12, 'admin', 'web', '2024-07-30 10:52:46', '2024-07-30 10:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` int(11) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `val` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `key`, `val`, `created_at`, `updated_at`, `user_id`) VALUES
(204, 1, 'site_logo_desktop', 'uploads/settings/1751200027_equifirst.png', '2025-06-23 17:55:18', '2025-06-29 07:27:07', NULL),
(205, 1, 'site_logo_mobile', 'uploads/settings/1750719318_logo.png', '2025-06-23 17:55:18', '2025-06-23 17:55:18', NULL),
(206, 1, 'site_logo_icon', 'uploads/settings/1751051409_8-min.jpg', '2025-06-23 17:55:18', '2025-06-27 14:10:09', NULL),
(207, NULL, 'site_favicon', 'uploads/settings/1751051814_8-min.jpg', '2025-06-23 17:55:18', '2025-06-27 14:16:54', NULL),
(208, NULL, 'site_name', 'Equifirst', '2025-06-26 16:24:25', '2025-06-26 16:24:29', NULL),
(209, NULL, 'site_title', 'Equifirst', '2025-06-26 16:42:29', '2025-06-26 16:42:29', NULL),
(210, NULL, 'admin_email', 'admin@themesbrand.com', '2025-06-26 16:42:29', '2025-06-26 16:42:29', NULL),
(211, NULL, 'record_per_page', '20', '2025-06-26 16:42:29', '2025-06-26 16:42:29', NULL),
(212, NULL, 'site_address', '30 2803, Control Tower, Motor City<br>Detroit Road, Dubai check', '2025-06-26 16:42:29', '2025-06-27 13:33:07', NULL),
(213, NULL, 'site_email', 'info@equifirst.com', '2025-06-26 16:48:08', '2025-06-26 16:48:08', NULL),
(214, 1, 'site_logo_white', 'F:\\xampp\\tmp\\php7CE5.tmp', '2025-06-27 13:49:23', '2025-06-27 14:17:02', NULL),
(215, 1, 'site_white_logo', 'F:\\xampp\\tmp\\phpE824.tmp', '2025-06-27 14:18:52', '2025-06-29 05:03:48', NULL),
(216, 1, 'white_logo', 'F:\\xampp\\tmp\\php8025.tmp', '2025-06-29 05:06:03', '2025-06-29 05:14:17', NULL),
(217, 1, 'footer_logo', 'uploads/settings/1751199381_equifirst-logo-white.png', '2025-06-29 05:21:49', '2025-06-29 07:16:21', NULL),
(218, 1, '_token', '7237CXmmjDnq2rTuJtlptmzJg8JCAjvdaHpg36sM', '2025-06-29 07:07:04', '2025-06-29 11:06:51', NULL),
(219, 1, '_method', 'PUT', '2025-06-29 07:07:04', '2025-06-29 08:18:49', NULL),
(220, 1, 'social_media_setting', '1', '2025-06-29 07:07:04', '2025-06-29 08:18:49', NULL),
(221, NULL, 'facebook_url', 'https://facebook.com', '2025-06-29 07:07:04', '2025-06-29 08:18:49', NULL),
(222, NULL, 'x_url', 'https://facebook.com', '2025-06-29 07:07:04', '2025-06-29 11:06:51', NULL),
(223, NULL, 'linkedin_url', NULL, '2025-06-29 07:07:04', '2025-06-29 08:18:49', NULL),
(224, NULL, 'youtube_url', NULL, '2025-06-29 07:07:04', '2025-06-29 08:18:49', NULL),
(225, NULL, 'instagram_url', NULL, '2025-06-29 07:07:04', '2025-06-29 08:18:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(205) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `role`, `email`, `phone`, `description`, `created_at`, `updated_at`, `image`) VALUES
(10, 'Mrs. Marie Pacocha Jr.', 'Entertainment Attendant', 'epagac@example.com', '+1-628-639-4778', 'Nesciunt repellat possimus ut facere dicta culpa quaerat. Rerum est placeat nam mollitia vitae sint. Totam magni voluptatem quaerat molestias voluptatem. Ipsam itaque qui culpa ut aut alias.', '2025-07-28 07:38:26', '2025-07-28 07:38:26', 'uploads/teams/1753706306_gGgAFs.png'),
(11, 'Prof. Edna Schumm I', 'Mechanical Door Repairer', 'monica88@example.com', '+1 (820) 475-6778', 'Eveniet quis sit explicabo quidem doloremque iusto. Ut ut sit consequatur eos quis est. Fugiat velit voluptatem et atque in.', '2025-07-28 07:39:17', '2025-07-28 07:39:17', 'uploads/teams/1753706357_DTYHac.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `description` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_image`) VALUES
(1, 'admin', 'admin@themesbrand.com', NULL, '$2y$10$nQBWj1eeu9tkUhhPtsk9cu523BexvvYwOnLQTSG3sPehKljDVgVAO', 'si8vfDfjZYL7hyD6ArN3i2h9sRPUBWfG9peecZws9psCkce4PgicsphcQlm5', '2025-06-19 06:31:41', '2025-06-19 06:31:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_sliders`
--
ALTER TABLE `hero_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hero_sliders`
--
ALTER TABLE `hero_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
