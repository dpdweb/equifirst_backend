-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 09:15 PM
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
-- Table structure for table `hero_sliders`
--

CREATE TABLE `hero_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sliders`
--

INSERT INTO `hero_sliders` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(27, 'sds', 'http://localhost/equifirst_backend/storage/app/public/hero_slider/1750063617.png', '2025-06-16 03:46:57', '2025-06-16 03:46:57'),
(28, 'sdfsfsd', 'http://localhost/equifirst_backend/storage/app/public/hero_slider/1750063658.png', '2025-06-16 03:47:38', '2025-06-16 03:47:38');

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
(9, '2025_06_16_193207_create_posts_table', 6);

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
(12, 'App\\Models\\User', 9),
(13, 'App\\Models\\User', 10),
(13, 'App\\Models\\User', 37),
(13, 'App\\Models\\User', 42),
(14, 'App\\Models\\User', 7),
(14, 'App\\Models\\User', 11),
(14, 'App\\Models\\User', 18),
(14, 'App\\Models\\User', 30),
(14, 'App\\Models\\User', 37),
(14, 'App\\Models\\User', 40),
(14, 'App\\Models\\User', 42),
(15, 'App\\Models\\User', 12),
(15, 'App\\Models\\User', 40),
(15, 'App\\Models\\User', 44),
(22, 'App\\Models\\User', 35),
(22, 'App\\Models\\User', 43),
(22, 'App\\Models\\User', 44),
(22, 'App\\Models\\User', 45);

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
  `category_id` bigint(20) UNSIGNED NOT NULL,
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
(5, 8, 'Sample Post Title 5', 'This is a dummy blog content for post number', 'http://localhost/equifirst_backend/storage/app/public/posts/1750110624.jpg', '2025-06-16 15:04:44', '2025-06-16 16:50:34'),
(6, 2, 'Sample Post Title 6', 'This is a dummy blog content for post number 6. heZsbTVsQKGx5UilYBjBQs6RCm7ausYCG1eay9Nl9Pn3VO36H5izOsZWXidj5SVIIi472EJ0y37K71kEP1ZQ8N5H76YfAUvjzfgT', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(7, 2, 'Sample Post Title 7', 'This is a dummy blog content for post number 7. yByLZwInJ2JaSHHIdDxW4MDc4SgNLVvIYfU60agisvgjl3Nye19zXLElh0q5CtEBQHFpasCeL6p0UShKuJKKeXsKvc3hMMXlEd79', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(8, 10, 'Sample Post Title 8', 'This is a dummy blog content for post number 8. amTGa4JuEJeCVfzAml7vlgee2TnwAP7NQjVtUGbyGOXmEiAdFr2ese4ilstzrDN2Eolzx1j26smUcGIUxk70bGviiX2ek67UVMj1', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(9, 3, 'Sample Post Title 9', 'This is a dummy blog content for post number 9. KAPYNXoFaQ6OCgoDbs6cKKXeYohlbbLGe0Vzkl62ZSqke1SBKYiWxI5RO6O1chTeCSk9woQk0840zHpjkxXWaquriJeR439z6CJd', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(10, 10, 'Sample Post Title 10', 'This is a dummy blog content for post number 10. 8ZVFsEYDn9JW77SBKOqdpPD9m8ERiOGRT7XuwUK1wf4IERgsyyf1zGT5FUGqNqZcmaGEMwonplbVbVcG08XMTz03OkL31HGkGIA4', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(11, 1, 'Sample Post Title 11', 'This is a dummy blog content for post number 11. aGbQS21hjizFeUcYXcv4MvLWjif3ESQkjz5gMtuGJJWEENUb6ankXSq9MoquQgONKQJnn8ia5L9ELn09G4FMxbooevPYkOIrpKqf', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(12, 5, 'Sample Post Title 12', 'This is a dummy blog content for post number 12. 0sbit9GHQoCHNYmmUtO76BmqbGfcBnn5ITDT4XQ7IAa1XoOdnxOmPcbb9856d0bJHFEwKY7tkTUo0Pc3mpw5dBh66WN3FPRloaoZ', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(13, 7, 'Sample Post Title 13', 'This is a dummy blog content for post number 13. YEbY6oW6hptE1Ujh91ZohTKNPhzjAfB1F9pF5xVi1jQp00oKNQuTQ0QN6iXnFlFGjDY1LEPrfeGlBvsouE6MI5fTogW3mwcsyr7H', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(14, 8, 'Sample Post Title 14', 'This is a dummy blog content for post number 14. uGvcFGLBNJLDSpZzh7emgewtnEmr0Qqcr7k1nWLoJgamUlvgb3yfcYoSmKUH9TQMHwhpUrogjmIS2oM9X13PXnvYzHH1W1bSRvQ8', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(15, 2, 'Sample Post Title 15', 'This is a dummy blog content for post number 15. eY1HWpHTauSdOBUAskmRVsaVlNMkgBmw4zG8XJ1qxVZ4oiyzU8MyG1tpozYGmd0AXhXsJPywB6WrdITgilh8WQEf04Sapcs5YWiV', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(16, 4, 'Sample Post Title 16', 'This is a dummy blog content for post number 16. I3rErZ6dCPgzeplsQx8AVHsHDv0aP8hjiezPB1k4OwCKR8y65MNugvpJUm6T85X6HU7t5buMUNdnQRKncetGGvuv5UDUgXtkREEP', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(17, 6, 'Sample Post Title 17', 'This is a dummy blog content for post number 17. RYfqZC2xCIrWXwXCXYXnrD0l2FqNigS7XkK91YkP0r0HCrJfcUdZZHmaOsBYLJzYlSy5hbXxRrXWNWzaphcJCAEabuwWjPXe5K9J', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(18, 4, 'Sample Post Title 18', 'This is a dummy blog content for post number 18. E7I1qMpXyzZnn3vcbvnDvkYV9Dq9ZNXgDCJyfNHcV4TZbXY9OjQ816xoZDvrWu9ZyJYVreY7h6DcIajyPaxbvpmT1dPERO5w1iog', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(19, 6, 'Sample Post Title 19', 'This is a dummy blog content for post number 19. ukVqvL8xvwEvpAS3Tjw9o5bwtV18kntPTQIcrjXaJpV1JzT3M0UFbxtfMjgHGV1d7tZYVnmBBv2286sf84UpqdFYj1VXKpdWuZKS', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(20, 7, 'Sample Post Title 20', 'This is a dummy blog content for post number 20. a4N8eSDQ5xw7MJffJtn54wVAtPsAlXIiEkwTAwnOYUo47Gu6F6Wv8abzW5mje8jSfGlsBUxdX6eTklVNWUf78EtPebUsNU9HT09K', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:04:44', '2025-06-16 15:04:44'),
(21, 2, 'Sample Post Title 1', 'This is a dummy blog content for post number 1. 1qFUjaQceBOySEpu5xc7r9Pwagnur73uxDipuSMVDoBITvWmdcrxL7OkJiqxvRXVQJuZ1ATrf6yRmkVd4Hwdpi6cS0BeDG4sOdGf', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(22, 15, 'Sample Post Title 2', 'This is a dummy blog content for post number 2. YbqjSFJnCAmSodnXARzUDJCLkKiPXAQkyhLjlQDKDrDF2kFUznVOksALpTVI2QOVFXrQsYURULYhgooMHYMOsGiyFM8eC9w3MBs5', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(23, 12, 'Sample Post Title 3', 'This is a dummy blog content for post number 3. RcvYQVLGi121ynwjsvHBUYnMolHCb0JEiwO0qMvqDVbFQ3CbojxbLzgaq5lIOPyWSfh0iZGBB4u3FfR6vHiZWRegLU5NWjRNBUn9', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(24, 2, 'Sample Post Title 4', 'This is a dummy blog content for post number 4. i1SHcK4xZ7lz37W7dPGI2mxh5t6TG0i5kKZMXatqPhqKIsraCtxqF7vn5ug6hDZsPaNO81FfVvEaM50Xt2SFPGW44eRRokuunYrc', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(25, 10, 'Sample Post Title 5', 'This is a dummy blog content for post number 5. ignp0ZV0D5g2njQmRlQFBcKWhkCvXekNnbedon9lzpP0CmZSFxwsnReOLgoZUIq8g4AU5QBEUzfwLhwU1IgvsCFnttmkQZZgPUbv', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(26, 7, 'Sample Post Title 6', 'This is a dummy blog content for post number 6. zTlO7p4gYMkAzrqT92DC4iZQTHGb0YtlrRpnJxNoqrfE15WpSFvhsCHTRbEFGNGHbadl1Y2ys5x0NC8wh2IDHcJBNcahZuJoL0tV', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(27, 8, 'Sample Post Title 7', 'This is a dummy blog content for post number 7. 1S4t8Sjm4ctd1kvSeZJkeyjVJU1GZdsDVL9YQP7gPJSDCLPXY1eCD6oxxGmf84byABfjauLW6lh9CYJb6vhkbCrWgGCxUKzTf78r', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(28, 6, 'Sample Post Title 8', 'This is a dummy blog content for post number 8. 7zx4JTi4bTNWJ0JzT33ZggmEktpLFELxWSOhse0cb1LgNdyWFirRsvV0ZNUNiNRvHTshoLwGo2FRE8v0l4GoH4g0PRBziB8DaEHS', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(29, 11, 'Sample Post Title 9', 'This is a dummy blog content for post number 9. IBpiHftq9tZJetEmeTBswkIXVolXiQEkWPJkh9KowzalhfKsjJRj88JInEUf0PhzOXedP7EoZ9Jy3zW3TndTvPM7wgPhgUTEs74G', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(30, 1, 'Sample Post Title 10', 'This is a dummy blog content for post number 10. a9A2hx1sjYB8AvLFDXJTqvUKVmz4BYnw73L8zp6CTOEYPROuwSkxvUZKpcW22SnGU24iTWTXo0W526XKxOmN3LlAZ6i4t77pcC9H', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(31, 7, 'Sample Post Title 11', 'This is a dummy blog content for post number 11. IHgd1NsnTUnpzyZE9YgTVHGrFGQ2cVzTA2Q1wPNhFbQCumYZEie2DhaSB3ODxKkMF6owEn31YVCk2ANmC7Da4iMFSOBdTH86hmR9', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(32, 5, 'Sample Post Title 12', 'This is a dummy blog content for post number 12. UUp4b2JBVfFsxytOazMJp9Pz1sT5HsohdNQOi5B01TTtCrYfBiFBYR8mFCwHa0MwFNASCbHzfvrrOZ0FCsoNRaWJYQVNjGcDHwhK', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(33, 7, 'Sample Post Title 13', 'This is a dummy blog content for post number 13. z149CIXQWtTDK18WXmD3fXZYJvB0PhgiL578WGpCpMP9TkFVwC3Ab1RuW6Pxay6TM5Cf7Z4NdtQlcyJTCoafsfYZqd3Dpy0T8eyp', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(34, 11, 'Sample Post Title 14', 'This is a dummy blog content for post number 14. DzjY3jAj5E2wTd33vxX3Ea52JVkeJbGndBZzQ19D3isr4WSTdHepjC06UGH2I3pCYH9izLyaYrap60HzLr05QIHp6wugWEB6Ox8D', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(35, 1, 'Sample Post Title 15', 'This is a dummy blog content for post number 15. mQiRt3frbbi3JKFkOZ2a9JRBN9C13EE1b3J2Te3zCtxJKiIypl05KwxTsn5d94FZLAnJ7ZTQOvOvf8tbeFVOQhP2hTM4dzm6khPK', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(36, 9, 'Sample Post Title 16', 'This is a dummy blog content for post number 16. d0HfRcmsq1f3RDMYiDOJV9CzAb6OBbHHAJhz5Fo8F2cWxJpHNm63MSevp7TIZbnvRJHP6ynevd3UNL4l24KnKxW77xpvp30LvICs', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(37, 14, 'Sample Post Title 17', 'This is a dummy blog content for post number 17. hTomWE6eksq5MRzhlxKc1ZFf2jcfy8DurULKxJw8d0Dpxa7t3xD9xPH4hcY3wgfIgTHYolhKXuhoGbdvsY2p4eY5rbK7nOw2AUDk', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(38, 8, 'Sample Post Title 18', 'This is a dummy blog content for post number 18. 9OosaBCG3xs8qXZq47mdPYKsuVe1q8U758LchsmgE5jsjMWsIGWp0ZDuzabEEXmz59Nk1gBpupvbED2AXSpehHMCal3a0xBDHoyR', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(39, 10, 'Sample Post Title 19', 'This is a dummy blog content for post number 19. mB7OdzNKjWZOCSLpSk3t82tvJWlhfFvEuHcKYlxFUhHsdV9ojViiKqOW2KSvZFOcN0T6RxEX8iEczznu0j0wgv0RLqNY76NUCcwZ', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(40, 10, 'Sample Post Title 20', 'This is a dummy blog content for post number 20. 1ZiJyAIIt0mvFbQ7TeGiLMgmEMwyfpP1TTJLbIeWLHT3nypOXZWSfWtbn9D9eQ3Te07GIl7VCOTOkqCvlV67WULQ9hAPgEX1cBQ3', 'https://fastly.picsum.photos/id/799/200/300.jpg?hmac=q6DulPHgFwTpoeoXzeVRLJ7-2cd-K69VyeJoIpUM5eg', '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(45, 2, 'asdsda', 'sdadas', 'http://localhost/equifirst_backend/storage/app/public/posts/1750109187.jpg', '2025-06-16 16:26:27', '2025-06-16 16:26:27');

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
(12, 'Super Admin', 'web', '2024-07-30 10:52:46', '2024-07-30 10:52:46'),
(13, 'Manager', 'web', '2024-07-30 10:53:26', '2024-07-30 10:53:26'),
(14, 'Staff', 'web', '2024-07-30 11:08:48', '2024-07-30 11:08:48'),
(15, 'Core Team', 'web', '2024-07-30 11:09:06', '2024-07-30 11:09:06'),
(22, 'Client', 'web', '2024-08-09 15:09:14', '2024-08-09 15:09:14');

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
(10, 12),
(10, 15),
(10, 22),
(11, 12),
(11, 13),
(11, 15),
(11, 22),
(12, 12),
(12, 13),
(12, 15),
(12, 22),
(13, 12),
(13, 13),
(13, 15),
(13, 22),
(14, 12),
(14, 13),
(14, 14),
(14, 15),
(14, 22),
(15, 12),
(15, 13),
(15, 15),
(15, 22),
(16, 12),
(16, 13),
(16, 15),
(17, 12),
(17, 13),
(17, 15),
(18, 12),
(18, 14),
(18, 15),
(19, 14),
(19, 15),
(20, 14),
(20, 15),
(21, 14),
(21, 15),
(22, 12),
(22, 13),
(22, 14),
(22, 15),
(23, 12),
(23, 13),
(23, 15),
(24, 12),
(24, 13),
(24, 15),
(25, 13),
(25, 15),
(26, 15),
(26, 22),
(27, 15),
(27, 22),
(28, 15),
(28, 22),
(29, 15),
(29, 22),
(30, 14),
(30, 15),
(31, 14),
(31, 15),
(32, 14),
(32, 15),
(33, 14),
(33, 15),
(34, 15),
(34, 22),
(35, 14),
(35, 15),
(36, 14),
(36, 15),
(37, 14),
(37, 15),
(37, 22),
(38, 15),
(39, 14),
(39, 15),
(39, 22),
(40, 14),
(40, 15),
(41, 14),
(41, 15),
(42, 15),
(43, 14),
(43, 15);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `val` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `val`, `created_at`, `updated_at`, `user_id`) VALUES
(48, 'site_name', 'Equifirst', '2024-07-29 15:16:56', '2024-07-31 09:28:45', NULL),
(49, 'grid_pagination_count', '1', '2024-07-29 15:16:56', '2024-08-01 10:23:19', NULL),
(50, 'dflo_setting', '{\"userId\":null,\"locationId\":null,\"companyId\":null,\"liveurl\":null,\"callPerMinute\":null,\"callPerDay\":null}', '2024-07-31 10:05:28', '2024-08-01 16:00:17', NULL),
(51, 'corepractice_setting', '{\"calenderId\":null,\"locationId\":null,\"providerId\":null,\"liveurl\":null,\"callPerMinute\":null,\"callPerDay\":null}', '2024-07-31 11:10:57', '2024-08-01 15:28:41', NULL),
(52, 'site_setting', '1', '2024-08-01 10:21:40', '2024-08-01 10:21:40', NULL),
(53, 'site_title', 'Equifirst', '2024-08-01 10:21:40', '2025-06-12 19:54:41', NULL),
(54, 'admin_email', 'jam_site_email', '2024-08-01 10:21:40', '2024-08-10 15:12:00', NULL),
(55, 'smtp_email_from', 'smtp@gmail.com', '2024-08-01 10:21:40', '2024-08-01 12:14:56', NULL),
(56, 'smtp_email_from_name', 'email name', '2024-08-01 10:21:40', '2024-08-01 12:14:56', NULL),
(57, 'email_otp', '0', '2024-08-01 10:21:40', '2024-08-19 04:24:44', NULL),
(58, 'record_per_page', '20', '2024-08-01 10:24:51', '2024-08-17 11:45:29', NULL),
(61, 'site_general_setting', '1', '2024-08-01 14:55:20', '2024-08-01 14:55:20', NULL),
(64, 'site_smtp_setting', '1', '2024-08-01 14:57:43', '2024-08-01 14:57:43', NULL),
(65, 'mail_mailer', 'SMTP', '2024-08-01 14:57:43', '2024-08-17 13:42:36', NULL),
(66, 'mail_host', 'mail.aqtdemos.com', '2024-08-01 14:57:43', '2024-08-17 13:27:06', NULL),
(67, 'mail_port', '465', '2024-08-01 14:57:43', '2024-08-17 13:27:06', NULL),
(68, 'mail_username', 'testing@aqtdemos.com', '2024-08-01 14:57:43', '2024-08-17 13:27:06', NULL),
(69, 'mail_password', 'yu6bUF5o73ch', '2024-08-01 14:57:43', '2024-08-17 13:27:06', NULL),
(70, 'mail_encryption', 'SSL', '2024-08-01 14:57:43', '2024-08-17 13:32:00', NULL),
(71, 'mail_from_address', 'testing@aqtdemos.com', '2024-08-01 14:57:43', '2024-08-17 13:32:35', NULL),
(72, 'mail_from_name', 'DentalFLo AI', '2024-08-01 14:57:43', '2024-08-17 13:32:35', NULL),
(73, 'core_practice_live_mode', '0', '2024-08-01 15:38:47', '2024-08-05 07:04:47', NULL),
(74, 'core_practice_trigger_request', '1', '2024-08-01 15:38:47', '2024-08-05 05:33:17', NULL),
(75, 'corepractice_live_mode', '{\"calenderId\":\"1\",\"locationId\":\"2\",\"providerId\":\"3\",\"URL\":\"4\",\"callPerMinute\":\"5\",\"callPerDay\":\"6\"}', '2024-08-01 15:38:47', '2024-08-10 13:06:25', NULL),
(76, 'corepractice_sandbox_mode', '{\"calenderId\":\"1\",\"locationId\":\"2\",\"providerId\":\"3\",\"URL\":\"4\",\"callPerMinute\":\"5\",\"callPerDay\":\"6\"}', '2024-08-01 15:38:47', '2024-08-10 13:06:19', NULL),
(77, 'de_flo_live_mode', '0', '2024-08-01 16:03:23', '2024-08-15 02:47:02', NULL),
(78, 'de_flo_trigger_request', '0', '2024-08-01 16:03:23', '2024-08-15 02:47:02', NULL),
(79, 'dflo_live_mode', '{\"userId\":null,\"locationId\":null,\"companyId\":null,\"URL\":null,\"callPerMinute\":null,\"callPerDay\":null}', '2024-08-01 16:03:23', '2024-08-15 02:47:02', NULL),
(80, 'dflo_sandbox_mode', '{\"userId\":null,\"locationId\":null,\"companyId\":null,\"URL\":null,\"callPerMinute\":null,\"callPerDay\":null}', '2024-08-01 16:03:23', '2024-08-15 02:47:02', NULL),
(92, 'site_general_setting', '1', '2024-08-10 14:57:50', '2024-08-10 14:57:50', 27),
(93, 'site_title', 'new client', '2024-08-10 14:57:50', '2024-08-10 15:10:33', 27),
(94, 'admin_email', 'jam_site_email', '2024-08-10 14:57:50', '2024-08-10 14:57:50', 27),
(98, 'client_api_setting', '{\"live_clientId\":null,\"live_apiKey\":null,\"live_secretKey\":null,\"sandbox_clientId\":null,\"sandbox_apiKey\":null,\"sandbox_secretKey\":null}', '2024-08-12 02:39:15', '2024-08-12 02:39:15', 31),
(99, 'site_title', 'Ali Dashboard Area', '2024-08-12 02:47:39', '2024-08-12 02:47:39', 32),
(100, 'admin_email', 'aliadmin@gmail.com', '2024-08-12 02:47:39', '2024-08-12 02:47:39', 32),
(104, 'client_api_setting', '{\"live_clientId\":null,\"live_apiKey\":null,\"live_secretKey\":null,\"sandbox_clientId\":null,\"sandbox_apiKey\":null,\"sandbox_secretKey\":null}', '2024-08-14 14:30:45', '2024-08-14 14:30:45', 33),
(115, 'core_practice_admin_return_url', 'http://admin_return_url.com1', '2024-08-15 02:45:37', '2024-08-16 15:17:24', NULL),
(116, 'core_practice_admin_sandbox_url', 'http://client-core.com', '2024-08-15 02:45:37', '2024-08-19 02:45:44', NULL),
(117, 'd_flo_practice_live_mode_toggle', '0', '2024-08-15 02:53:53', '2024-08-15 02:53:53', NULL),
(118, 'admin_d_flo_sandbox_mode_toggle', '0', '2024-08-15 02:53:53', '2024-08-17 13:06:37', NULL),
(119, 'admin_d_flo_trigger_request_toggle', '1', '2024-08-15 02:53:53', '2024-08-16 15:20:34', NULL),
(120, 'd_flo_admin_return_url', 'https://dflo_return_url.com1', '2024-08-15 02:53:53', '2024-08-16 15:19:36', NULL),
(121, 'd_flo_admin_sandbox_url', 'https://dflo_sandbox.com1', '2024-08-15 02:53:53', '2024-08-16 15:19:36', NULL),
(122, 'client_api_setting', '{\"live_clientId\":null,\"live_apiKey\":null,\"live_secretKey\":null,\"sandbox_clientId\":null,\"sandbox_apiKey\":null,\"sandbox_secretKey\":null}', '2024-08-16 09:25:46', '2024-08-16 09:25:46', 35),
(123, '_token', 'HA3oHAqQJRR4FwbnlABapLze1T5jQmhjeoFXDBYU', '2024-08-16 11:13:07', '2024-08-16 11:13:07', 35),
(124, '_method', 'PUT', '2024-08-16 11:13:07', '2024-08-16 11:13:07', 35),
(125, 'live_client_id', '3asndbfasdh', '2024-08-16 11:13:07', '2024-08-16 12:16:55', 35),
(126, 'live_api_key', '32', '2024-08-16 11:13:07', '2024-08-16 11:41:34', 35),
(127, 'live_secret_key', '34', '2024-08-16 11:13:07', '2024-08-16 11:41:34', 35),
(128, 'sandbox_client_id', 'arwe', '2024-08-16 11:45:04', '2024-08-16 11:45:04', 35),
(129, 'sandbox_api_key', 'rfwer', '2024-08-16 11:45:04', '2024-08-16 11:45:04', 35),
(130, 'sandbox_secret_key', 'serwe', '2024-08-16 11:45:04', '2024-08-16 11:45:04', 35),
(131, 'live_client_id', 'qweqw', '2024-08-16 12:41:27', '2024-08-16 12:41:27', 36),
(132, 'live_api_key', 'erwe', '2024-08-16 12:41:27', '2024-08-16 12:41:27', 36),
(133, 'live_secret_key', 'ewrer', '2024-08-16 12:41:27', '2024-08-16 12:41:27', 36),
(134, 'live_client_id1', '234', '2024-08-16 13:12:47', '2024-08-16 13:12:47', 24),
(135, 'live_api_key', '322', '2024-08-16 13:12:47', '2024-08-16 13:12:47', 24),
(136, 'live_secret_key', '23', '2024-08-16 13:12:47', '2024-08-16 13:12:47', 24),
(138, 'sandbox_client_id', '2312', NULL, NULL, 24),
(139, 'call_per_minute_per_client', NULL, '2024-08-16 14:33:17', '2024-08-16 15:08:11', NULL),
(140, 'call_per_day_per_client', NULL, '2024-08-16 14:33:17', '2024-08-16 15:08:11', NULL),
(141, 'admin_core_practice_live_mode_toggle', '1', '2024-08-16 15:08:08', '2024-08-16 15:17:20', NULL),
(142, 'admin_core_practice_sandbox_mode_toggle', '0', '2024-08-16 15:08:08', '2024-08-16 15:17:20', NULL),
(143, 'admin_core_practice_trigger_request_toggle', '1', '2024-08-16 15:08:08', '2024-08-16 15:17:24', NULL),
(144, 'ccore_practice_all_per_minute_per_client', '18', '2024-08-16 15:09:49', '2024-08-16 15:09:49', NULL),
(145, 'core_practice_call_per_day_per_client', '14', '2024-08-16 15:09:49', '2024-08-16 15:17:16', NULL),
(146, 'core_practice_all_per_minute_per_client', '10', '2024-08-16 15:13:03', '2024-08-16 15:13:39', NULL),
(147, 'd_flo_call_per_day_per_client', '2', '2024-08-16 15:19:36', '2024-08-16 15:19:36', NULL),
(148, 'd_flo_all_per_minute_per_client', '1', '2024-08-16 15:20:30', '2024-08-16 15:20:30', NULL),
(152, 'site_title', 'Unique Client', '2024-08-17 02:42:15', '2024-08-17 02:42:15', 35),
(153, 'admin_email', 'unique@gmail.com', '2024-08-17 02:42:15', '2024-08-17 02:42:15', 35),
(158, 'admin_d_flo_live_mode_toggle', '1', '2024-08-17 07:50:21', '2024-08-17 13:06:37', NULL),
(163, 'admin_d_flo_practice_live_mode_toggle', '0', '2024-08-17 13:03:50', '2024-08-17 13:03:50', NULL),
(164, 'client_core_practice_live_mode_toggle', '1', '2024-08-19 02:52:04', '2024-08-19 02:52:04', NULL),
(165, 'client_core_practice_trigger_request_toggle', '1', '2024-08-19 02:52:04', '2024-08-19 02:52:04', NULL),
(166, 'client_corepractice_setting', '1', '2024-08-19 02:52:04', '2024-08-19 02:52:04', NULL),
(167, 'core_practice_client_live_url', 'http://asdasd.com', '2024-08-19 02:52:04', '2024-08-19 02:52:04', NULL),
(168, 'client_core_practice_live_mode_toggle', '1', '2024-08-19 02:54:09', '2024-08-19 03:01:04', 35),
(169, 'client_core_practice_trigger_request_toggle', '1', '2024-08-19 02:54:09', '2024-08-19 03:01:04', 35),
(170, 'client_corepractice_setting', '1', '2024-08-19 02:54:09', '2024-08-19 02:54:09', 35),
(171, 'core_practice_client_live_url', 'http:/.google.com 1', '2024-08-19 02:54:09', '2024-08-19 03:00:58', 35),
(172, 'client_d_flo_live_mode_toggle', '0', '2024-08-19 03:08:02', '2024-08-19 03:08:07', 35),
(173, 'client_d_flo_trigger_request_toggle', '0', '2024-08-19 03:08:02', '2024-08-19 03:08:12', 35),
(174, 'client_dflo_setting', '1', '2024-08-19 03:08:02', '2024-08-19 03:08:02', 35),
(175, 'd_flo_client_sandbox_url', 'http://dflo.comq', '2024-08-19 03:08:02', '2024-08-19 03:08:10', 35),
(176, 'core_practice_live_client_id', 'ersadasdasdasd', '2024-08-19 12:06:41', '2024-08-19 12:48:58', 37),
(177, 'core_practice_live_api_key', 'wreras', '2024-08-19 12:06:41', '2024-08-19 12:48:55', 37),
(178, 'core_practice_live_secret_key', 'werasd', '2024-08-19 12:06:41', '2024-08-19 12:48:55', 37),
(179, 'core_practice_sandbox_client_id', '234asd', '2024-08-19 12:15:25', '2024-08-19 12:48:55', 37),
(180, 'core_practice_sandbox_api_key', '23423', '2024-08-19 12:15:25', '2024-08-19 12:15:25', 37),
(181, 'core_practice_sandbox_secret_key', '234', '2024-08-19 12:15:25', '2024-08-19 12:15:25', 37),
(182, 'ghl_settings_live_client_id', 'qwe1111', '2024-08-19 12:19:50', '2024-08-19 12:49:05', 37),
(183, 'ghl_settings_live_api_key', 'qwe11', '2024-08-19 12:19:50', '2024-08-19 12:49:05', 37),
(184, 'ghl_settings_live_secret_key', 'qwe111', '2024-08-19 12:19:50', '2024-08-19 12:49:05', 37),
(185, 'ghl_settings_sandbox_client_id', 'qwe11', '2024-08-19 12:19:54', '2024-08-19 12:49:05', 37),
(186, 'ghl_settings_sandbox_api_key', 'qw11', '2024-08-19 12:19:54', '2024-08-19 12:49:05', 37),
(187, 'ghl_settings_sandbox_secret_key', 'qwe11', '2024-08-19 12:19:54', '2024-08-19 12:49:05', 37),
(188, 'core_practice_live_client_id', 'core live client id', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(189, 'core_practice_live_api_key', 'core live  api key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(190, 'core_practice_live_secret_key', 'core live  secret key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(191, 'core_practice_sandbox_client_id', 'core sandbox client id', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(192, 'core_practice_sandbox_api_key', 'core sandbox api key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(193, 'core_practice_sandbox_secret_key', 'core sandbox secret key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(194, 'ghl_settings_live_client_id', 'ghl client id', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(195, 'ghl_settings_live_api_key', 'ghl api key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(196, 'ghl_settings_live_secret_key', 'ghl secret key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(197, 'ghl_settings_sandbox_client_id', 'sandbox client id', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(198, 'ghl_settings_sandbox_api_key', 'sandbox api key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(199, 'ghl_settings_sandbox_secret_key', 'sandbox pi key', '2024-08-20 07:33:28', '2024-08-20 07:33:28', 35),
(200, 'site_logo_desktop', 'http://localhost/equifirst_backend/public/storage/uploads/settings/ncaabx90i3ggcSKeySE4HwjnLSKF4F8TliO6jCPZ.png', '2025-06-14 09:18:29', '2025-06-14 14:44:00', NULL);

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
(3, 'jamshed alam 1', 'Managing Partner 1', NULL, NULL, 'assdfasdfsd', '2025-06-16 08:53:03', '2025-06-16 09:24:38', 'http://localhost/equifirst_backend/public/storage/teams/1750083878.png'),
(4, 'jamshed alam', 'Managing Partner', NULL, NULL, 'assdfasdfsd', '2025-06-16 08:53:31', '2025-06-16 09:25:41', 'http://localhost/equifirst_backend/public/storage/teams/1750083941.jpg'),
(5, 'sdsds', 'Managing Partner', NULL, NULL, 'sdsd', '2025-06-16 09:47:01', '2025-06-16 09:47:01', 'http://localhost/equifirst_backend/storage/app/public/teams/1750085221.jpg'),
(6, 'jamshed alam', 'Managing Partner', NULL, NULL, 'fsdfsdf', '2025-06-16 11:31:20', '2025-06-16 11:31:20', 'http://localhost/equifirst_backend/storage/app/public/teams/1750091480.png');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_image`) VALUES
(1, 'Attex', 'attex@coderthemes.com', '2025-05-14 11:26:35', '$2y$10$Y3gpGM8qaP/uXd0UnTv78.7Y9VR9Uqn4xWPKHzbvPPEvNixGikHQa', 'TFjPS8FqY6', '2025-05-14 11:26:35', '2025-05-14 11:26:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `hero_sliders`
--
ALTER TABLE `hero_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
