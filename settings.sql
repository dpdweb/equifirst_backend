-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 12:45 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
