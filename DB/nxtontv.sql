-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 08:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arianus_epgservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel_genre_masters`
--

CREATE TABLE `channel_genre_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_genre_masters`
--

INSERT INTO `channel_genre_masters` (`id`, `genre_name`, `genre_short_name`, `genre_icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ep Service', 'EP', 'Icon-1617217105.png', '2021-03-31 13:28:25', '2021-03-31 13:28:25', NULL),
(2, 'NP Services', 'NP', 'Icon-1617217615.png', '2021-03-31 13:36:55', '2021-03-31 13:36:55', NULL),
(3, 'TCS Banner', 'TC', 'Icon-1617217667.png', '2021-03-31 13:37:47', '2021-03-31 13:37:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `channel_master`
--

CREATE TABLE `channel_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_genre_id` bigint(20) NOT NULL,
  `languages_id` bigint(20) NOT NULL,
  `channel_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_logo_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_logo_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_logo_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_catchup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_trp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_master`
--

INSERT INTO `channel_master` (`id`, `company_id`, `channel_name`, `channel_genre_id`, `languages_id`, `channel_description`, `region`, `channel_logo_1`, `channel_logo_2`, `channel_logo_3`, `channel_catchup`, `channel_trp`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'channel name', 2, 1, 'Hello channel description', 'region one', 'logo_1-1617300942.png', 'logo_2-1617300942.png', 'logo_3-1617300942.png', 'channel catchup', 'channel trp', 'Active', '2021-04-01 12:45:42', '2021-04-01 12:45:42', NULL),
(2, 3, 'cinema', 3, 4, 'horror moviehorror moviehorror moviehorror moviehorror moviehorror moviehorror moviehorror moviehorror moviehorror moviehorror movie', 'hindu', 'logo_1-1617301127.png', 'logo_2-1617301127.png', 'logo_3-1617301127.jpg', 'catchup on', 'channel trp on', 'Inactive', '2021-04-01 12:48:47', '2021-04-01 12:48:47', NULL),
(3, 4, 'cartoon', 1, 6, 'fun movie', 'muslim', 'logo_1-1617301264.jpg', 'logo_2-1617301264.jpg', 'logo_3-1617301264.jpg', 'test catch', 'test trp', 'Active', '2021-04-01 12:51:04', '2021-04-01 12:51:04', NULL),
(4, 2, 'test name', 2, 1, 'test description', 'test region', 'logo_1-1617301369.png', 'logo_2-1617301369.png', 'logo_3-1617301369.png', 'test catchup', 'test trp', 'Active', '2021-04-01 12:52:49', '2021-04-01 12:52:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_masters`
--

CREATE TABLE `company_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_masters`
--

INSERT INTO `company_masters` (`id`, `company_name`, `contact`, `address`, `pan_number`, `representative_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Zee', '8989898989', 'Hello addreess', 'HIO*&IO123', 'hiren_1903', '2021-03-30 14:26:22', '2021-03-30 14:26:22', NULL),
(2, 'Star', '9090909009', 'Hello Address', 'HPLMNY78MN', 'hiren_19', '2021-03-30 14:31:43', '2021-03-30 14:31:43', NULL),
(3, 'Sony', '9090909009', 'Hello Address', 'YUMNY78MN', 'hiren_19', '2021-03-30 14:31:43', '2021-03-30 14:31:43', NULL),
(4, 'Discovery', '9090909009', 'Hello Address', 'MPMNY78MN', 'hiren_19', '2021-03-30 14:31:43', '2021-03-30 14:31:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `channel_id` bigint(20) DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`id`, `company_id`, `channel_id`, `contact_person`, `email`, `contact`, `landline`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'contact one', 'contact@gmail.com', '9090909090', '21327867', '2021-04-02 12:13:40', '2021-04-02 12:13:40', NULL),
(2, 3, 2, 'contact one', 'contact@gmail.com', '9090909090', '21327867', '2021-04-02 12:14:15', '2021-04-02 12:14:15', NULL),
(3, 3, 2, 'asdc', 'a@gmail.com', '8080808080', '2222222222', '2021-04-02 12:14:15', '2021-04-02 12:14:15', NULL),
(4, 4, 2, 'contact one', 'contact@gmail.com', '9090909090', '21327867', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL),
(5, 4, 2, 'cname', 'c@gmail.com', '8888888888', '33333333', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL),
(6, 4, 2, 'dname', 'd@gmail.com', '7777777777', '22222222', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL),
(7, 4, 2, 'ename', 'e@gmail.com', '6666666666', '33333333', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL),
(8, 1, 2, 'contact one', 'contact@gmail.com', '9090909090', '21327867', '2021-04-02 12:13:40', '2021-04-02 12:13:40', NULL),
(9, 3, 2, 'contact one', 'contact@gmail.com', '9090909090', '21327867', '2021-04-02 12:14:15', '2021-04-02 12:14:15', NULL),
(10, 3, 2, 'asdc', 'a@gmail.com', '8080808080', '2222222222', '2021-04-02 12:14:15', '2021-04-02 12:14:15', NULL),
(11, 4, 2, 'contact one', 'contact@gmail.com', '9090909090', '21327867', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL),
(12, 4, 2, 'cname', 'c@gmail.com', '8888888888', '33333333', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL),
(13, 4, 2, 'dname', 'd@gmail.com', '7777777777', '22222222', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL),
(14, 4, 2, 'ename', 'e@gmail.com', '6666666666', '33333333', '2021-04-02 12:15:36', '2021-04-02 12:15:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages_master`
--

CREATE TABLE `languages_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `languages_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages_short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages_master`
--

INSERT INTO `languages_master` (`id`, `languages_name`, `languages_short_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', 'ENG', '2021-03-31 11:48:11', '2021-03-31 11:48:11', NULL),
(2, 'Hindi', 'HIN', '2021-03-31 11:48:11', '2021-03-31 11:48:11', NULL),
(3, 'Marathi', 'MAR', '2021-03-31 11:48:11', '2021-03-31 11:48:11', NULL),
(4, 'Tamil', 'TAM', '2021-03-31 11:48:11', '2021-03-31 11:48:11', NULL),
(5, 'Telegu', 'TEL', '2021-03-31 11:48:11', '2021-03-31 11:48:11', NULL),
(6, 'Bengali', 'BEN', '2021-03-31 11:48:11', '2021-03-31 11:48:11', NULL),
(7, 'Gujarati', 'GUJ', '2021-03-31 11:48:11', '2021-03-31 11:48:11', NULL);

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2021_03_28_180320_create_permission_tables', 1),
(8, '2021_03_29_174612_add_status_users_table', 2),
(9, '2021_03_29_174939_add_delete_at_users_table', 3),
(10, '2021_03_29_181638_add_rename_user_colummn_table', 4),
(11, '2021_03_29_184645_add_profile_image_to_users_table', 5),
(12, '2021_03_30_191209_create_company_masters_table', 6),
(13, '2021_03_31_162027_add_login_logout_time_to_users_table', 7),
(14, '2021_03_31_163539_create_languages_master_table', 8),
(15, '2021_03_31_175744_create_channel_genre_masters_table', 9),
(16, '2021_04_01_152515_create_program_genre_master_table', 10),
(17, '2021_04_01_161110_create_program_sub_genre_master_table', 11),
(18, '2021_04_01_163510_create_channel_master_table', 12),
(19, '2021_04_02_145116_create_contact_master_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hiren@gmail.com', 'eyJpdiI6ImpwTS9uTWdrcGp6TXF6VG9HZ013MUE9PSIsInZhbHVlIjoiZmJsS0JaSUE2MjMvRVFMMjJQaVgvUT09IiwibWFjIjoiOTcyOTZjZTM4YjU1YjhjMmEzMzFlMjUwMGNiNjFlOWNkNWY3ZGFhYTY5OWRkMjUyNWUxNDNjNTMzZDA0MGRlOCJ9', '2021-03-30 09:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-03-28 12:43:01', '2021-03-28 12:43:01'),
(2, 'role-create', 'web', '2021-03-28 12:43:01', '2021-03-28 12:43:01'),
(3, 'role-edit', 'web', '2021-03-28 12:43:01', '2021-03-28 12:43:01'),
(4, 'role-delete', 'web', '2021-03-28 12:43:01', '2021-03-28 12:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `program_genre_master`
--

CREATE TABLE `program_genre_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_genre_master`
--

INSERT INTO `program_genre_master` (`id`, `genre_name`, `genre_icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'genre name', 'Genre-1617293262.png', '2021-04-01 10:37:42', '2021-04-01 10:37:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_sub_genre_master`
--

CREATE TABLE `program_sub_genre_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_sub_genre_master`
--

INSERT INTO `program_sub_genre_master` (`id`, `genre_name`, `genre_icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sub genre name', 'SubGenre-1617294475.png', '2021-04-01 10:57:55', '2021-04-01 10:57:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-03-28 12:45:48', '2021-03-28 12:45:48'),
(2, 'User', 'web', '2021-03-28 14:32:15', '2021-03-28 14:32:15');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 2);

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_logintime_at` datetime DEFAULT NULL,
  `last_logouttime_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `role_id`, `profile_image`, `last_logintime_at`, `last_logouttime_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$2Z7vAt6ilXW81pTe0jaBTO6XquJOEuo4tp1bVmdbB2LipkG8xyWSC', NULL, 'Active', 1, 'Profile-1617047425.png', '2021-04-02 16:30:35', '2021-04-02 16:30:35', '2021-03-28 12:45:48', '2021-04-02 11:00:35', NULL),
(2, 'hiren_1903', 'hiren@gmail.com', NULL, '$2y$10$mxBzO0C2.bzSIKUKq2fo5eWJyN23gDGRhMqHXUtBvjTpSa6KnoB/K', NULL, 'Active', 2, 'Profile-1617047425.png', '2021-04-01 22:12:37', '2021-04-01 22:12:37', '2021-03-28 14:32:15', '2021-04-01 16:42:37', NULL),
(4, 'hiren_123', 'hiren123@gmail.com', '2021-03-29 14:20:25', '$2y$10$3.TT5bbfy56wm43K2caeKuwJuzutlls9hydR4V/Ci5Rzca16VSjCK', NULL, 'Active', 2, 'Profile-1617047425.png', NULL, NULL, '2021-03-29 14:20:25', '2021-03-29 14:20:25', NULL),
(5, 'test_01', 'test01@gmail.com', '2021-03-30 11:57:50', '$2y$10$2EDWIJRKJ8PklfZwHh6pl.vjdLwFAEz9ExynaCqAzL2MvSpdrC7me', NULL, 'Active', 2, 'Profile-1617125271.png', NULL, NULL, '2021-03-30 11:57:51', '2021-03-30 11:57:51', NULL),
(6, 'test_02', 'test02@gmail.com', '2021-03-30 11:58:51', '$2y$10$tJvxvAsRAabdmLiSK7vIJeHzEV8nSMeZcxqRzysF5hQ1Vp4wgMYB2', NULL, 'Active', 1, 'Profile-1617125331.png', NULL, NULL, '2021-03-30 11:58:51', '2021-03-30 11:58:51', NULL),
(7, 'test_03', 'test@gmail.com', '2021-03-30 11:59:54', '$2y$10$FypBXf.3ghdU0e1T6ds6e.xUXpG/VI0yvOCQUMQuqOC8iEBpHMe2W', NULL, 'Active', 2, 'Profile-1617125394.png', NULL, NULL, '2021-03-30 11:59:54', '2021-03-30 11:59:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel_genre_masters`
--
ALTER TABLE `channel_genre_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_master`
--
ALTER TABLE `channel_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_masters`
--
ALTER TABLE `company_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages_master`
--
ALTER TABLE `languages_master`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `program_genre_master`
--
ALTER TABLE `program_genre_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_sub_genre_master`
--
ALTER TABLE `program_sub_genre_master`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel_genre_masters`
--
ALTER TABLE `channel_genre_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `channel_master`
--
ALTER TABLE `channel_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_masters`
--
ALTER TABLE `company_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages_master`
--
ALTER TABLE `languages_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_genre_master`
--
ALTER TABLE `program_genre_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_sub_genre_master`
--
ALTER TABLE `program_sub_genre_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
