-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2026 at 12:23 PM
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
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_sub_title` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `hero_image_title` varchar(255) DEFAULT NULL,
  `hero_image_alt` varchar(255) DEFAULT NULL,
  `views` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `hero_title`, `hero_sub_title`, `hero_image`, `hero_image_title`, `hero_image_alt`, `views`, `created_at`, `updated_at`) VALUES
(16, 'Sample Post Title 16', 'sample-post-title-16', NULL, NULL, NULL, NULL, NULL, '{\"small\":\"uploads\\/posts\\/small_1757848426_TMxLsY.jpg\",\"large\":\"uploads\\/posts\\/large_1757848426_TMxLsY.jpg\"}', NULL, NULL, NULL, '2025-06-16 15:04:44', '2025-09-14 06:13:54'),
(21, 'Sample Post Title 1', 'sample-post-title-21', NULL, NULL, NULL, NULL, NULL, 'uploads/posts/Wo86XyWhOQTO4YYFc9njEuXNLFjk2N8UK1nGsT0y.jpg', NULL, NULL, NULL, '2025-06-16 15:07:23', '2025-08-06 13:13:58'),
(22, 'Sample Post Title 2', 'sample-post-title-22', NULL, NULL, NULL, NULL, NULL, 'uploads/posts/1754503931_9GJ1ew.jpg', NULL, NULL, NULL, '2025-06-16 15:07:23', '2025-08-06 13:14:06'),
(23, 'Sample Post Title 3', 'sample-post-title-23', NULL, NULL, NULL, NULL, NULL, 'uploads/posts/1754503931_9GJ1ew.jpg', NULL, NULL, NULL, '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(24, 'Sample Post Title 4', 'sample-post-title-24', NULL, NULL, NULL, NULL, NULL, 'uploads/posts/1754503931_9GJ1ew.jpg', NULL, NULL, NULL, '2025-06-16 15:07:23', '2025-06-16 15:07:23'),
(74, 'wwe ewrwer', 'wwe-ewrwer-3', 'dkfj fsdfkdjs f', 'd sdasd a', 'wwe,wee eqwe, wqeq', 'qwe', 'wer', 'uploads/pages/large_1773404701_6ZuxLw.jpg', 'Mortgage Calculator hero image', 'we', NULL, '2026-03-13 07:25:01', '2026-03-13 07:25:01'),
(75, 'equifirst 1', 'equifirst-1', 'equifirst meta title', 'equifirst meta description', 'equifirst, meta, title', 'equifirst hero title', 'equifirst sub title', 'uploads/pages/large_1773406218_VA7yVo.jpg', 'equifirst image title', 'equifirst alt text', NULL, '2026-03-13 07:38:39', '2026-03-13 07:50:19'),
(76, 'home', 'home', 'equifirst meta title', 'asd', 'asd', 'as', 'asd', 'uploads/pages/large_1773406557_UeslTY.jpg', 'asd', 'asd', NULL, '2026-03-13 07:55:57', '2026-03-13 07:55:57'),
(77, 'fsdfhsdf sdjfhdf qwewe', 'fsdfhsdf-sdjfhdf-qwewe', 'equifirst meta title 1', 'wsdas 1', 'werwe, werwe,wer we 1', 'equifirst hero title 1', 'equifirst sub title 1', 'uploads/pages/large_1774783243_Qb5T56.jpg', 'equifirst image title 1', 'equifirst alt text 1', NULL, '2026-03-29 06:20:44', '2026-03-29 06:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `post_category_relations`
--

CREATE TABLE `post_category_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category_relations`
--

INSERT INTO `post_category_relations` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(28, 84, 21, NULL, NULL),
(29, 84, 22, NULL, NULL),
(30, 84, 23, NULL, NULL),
(31, 85, 21, NULL, NULL),
(32, 85, 22, NULL, NULL),
(33, 86, 21, NULL, NULL),
(34, 86, 22, NULL, NULL),
(35, 87, 21, NULL, NULL),
(36, 87, 22, NULL, NULL),
(37, 91, 21, NULL, NULL),
(38, 91, 22, NULL, NULL),
(39, 91, 23, NULL, NULL),
(40, 94, 21, NULL, NULL),
(41, 94, 22, NULL, NULL),
(42, 94, 23, NULL, NULL),
(43, 95, 21, NULL, NULL),
(44, 95, 22, NULL, NULL),
(45, 95, 23, NULL, NULL),
(46, 96, 21, NULL, NULL),
(47, 96, 22, NULL, NULL),
(48, 97, 21, NULL, NULL),
(49, 97, 22, NULL, NULL),
(50, 98, 21, NULL, NULL),
(51, 98, 22, NULL, NULL),
(52, 99, 21, NULL, NULL),
(53, 99, 22, NULL, NULL),
(54, 100, 21, NULL, NULL),
(55, 100, 22, NULL, NULL),
(56, 101, 21, NULL, NULL),
(57, 101, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_faqs_relations`
--

CREATE TABLE `post_faqs_relations` (
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `faq_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_faqs_relations`
--

INSERT INTO `post_faqs_relations` (`post_id`, `faq_id`, `created_at`, `updated_at`) VALUES
(94, 22, NULL, NULL),
(94, 23, NULL, NULL),
(94, 25, NULL, NULL),
(95, 22, NULL, NULL),
(95, 23, NULL, NULL),
(95, 25, NULL, NULL),
(96, 52, NULL, NULL),
(97, 52, NULL, NULL),
(97, 3, NULL, NULL),
(98, 53, NULL, NULL),
(99, 53, NULL, NULL),
(99, 2, NULL, NULL),
(99, 3, NULL, NULL),
(100, 53, NULL, NULL),
(100, 2, NULL, NULL),
(100, 3, NULL, NULL),
(101, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(22, 'wer', 'wer', '2026-03-16 12:17:15', '2026-03-16 12:17:15'),
(23, 'asd sdsds', 'asd-sdsds', '2026-03-16 12:18:19', '2026-03-25 07:01:38'),
(25, 'dfsdf dsfsdfsdf sdf 1', 'dfsdf-dsfsdfsdf-sdf-1', '2026-03-29 06:52:53', '2026-03-29 06:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags_relations`
--

CREATE TABLE `post_tags_relations` (
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags_relations`
--

INSERT INTO `post_tags_relations` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(94, 22, NULL, NULL),
(94, 23, NULL, NULL),
(94, 25, NULL, NULL),
(95, 22, NULL, NULL),
(95, 23, NULL, NULL),
(95, 25, NULL, NULL),
(101, 25, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category_relations`
--
ALTER TABLE `post_category_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `post_category_relations`
--
ALTER TABLE `post_category_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
