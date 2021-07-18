-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2021 at 11:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nxton`
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
(1, 'Entertainment', 'EN', 'Icon-1620409361.jpeg', '2021-03-31 13:28:25', '2021-05-07 15:42:41', NULL),
(2, 'NP Services', 'NP', 'Icon-1617217615.png', '2021-03-31 13:36:55', '2021-05-10 17:07:33', '2021-05-10 17:07:33'),
(3, 'TCS Banner', 'TC', 'Icon-1617217667.png', '2021-03-31 13:37:47', '2021-04-13 14:23:25', '2021-04-13 14:23:25'),
(4, 'HPD', 'PD', 'Icon-1618058843.png', '2021-04-10 07:07:40', '2021-04-10 07:17:23', NULL),
(5, 'genre name', 'PD', 'Icon-1618085802.jpg', '2021-04-10 14:46:42', '2021-04-10 14:46:42', NULL),
(6, 'Sports', 'SP', 'Icon-1620408749.jpeg', '2021-05-07 15:32:29', '2021-05-07 15:32:29', NULL);

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
  `channel_catchup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
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
(1, 2, 'chanel one', 4, 1, 'HelloHelloHelloHelloHelloHello', 'hindu', NULL, NULL, NULL, '1', '3', 'Active', '2021-05-28 15:35:12', '2021-05-28 15:35:12', NULL),
(2, 3, 'cinema', 4, 1, 'Hello', 'hindu', NULL, NULL, NULL, '1', '4', 'Active', '2021-05-31 18:20:10', '2021-05-31 18:20:10', NULL),
(3, 4, 'sony', 1, 2, 'Hello test', 'muslim', NULL, NULL, NULL, '1', '7', 'Active', '2021-05-31 18:20:42', '2021-05-31 18:20:42', NULL),
(4, 2, 'SONY SAB', 1, 2, 'This is an entertainment channel.', 'National', NULL, NULL, NULL, '0', '100', 'Active', '2021-06-27 21:22:18', '2021-06-27 21:22:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chennal_gide`
--

CREATE TABLE `chennal_gide` (
  `id` bigint(20) NOT NULL,
  `operator_name` varchar(250) DEFAULT NULL,
  `chennal_file` varchar(250) DEFAULT NULL,
  `chennal_name` varchar(250) DEFAULT NULL,
  `hd_sd` varchar(250) DEFAULT NULL,
  `lcn` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chennal_gide`
--

INSERT INTO `chennal_gide` (`id`, `operator_name`, `chennal_file`, `chennal_name`, `hd_sd`, `lcn`, `created_at`, `updated_at`) VALUES
(2, 'Operator Two', 'C:\\xampp\\tmp\\php5495.tmp', 'Chennal One', 'HD', 'LCN One', '2021-06-27 08:54:26', '2021-06-27 08:54:26'),
(7, 'Operator one', 'C:\\xampp\\tmp\\phpCA6.tmp', 'Chennal One', 'HD', 'LCN One', '2021-06-27 09:32:22', '2021-06-27 09:32:22'),
(8, 'Operator one', 'C:\\xampp\\tmp\\phpCA6.tmp', 'Chennal Tne', 'SD', 'LCN One', '2021-06-27 09:32:22', '2021-06-27 09:32:22'),
(9, 'Operator one', 'C:\\xampp\\tmp\\phpCA6.tmp', 'Chennal Three', 'HD', 'LCN One', '2021-06-27 09:32:22', '2021-06-27 09:32:22'),
(16, 'TATA Sky', NULL, 'SAB TV', 'HD', '123', '2021-06-27 21:38:14', '2021-06-27 21:38:14'),
(18, 'AIRTEL', '/tmp/phpIejrDl', 'Chennal One', 'HD', 'LCN One', '2021-06-28 21:24:19', '2021-06-28 21:24:19'),
(19, 'AIRTEL', '/tmp/phpIejrDl', 'Chennal Tne', 'SD', 'LCN One', '2021-06-28 21:24:19', '2021-06-28 21:24:19'),
(20, 'AIRTEL', '/tmp/phpIejrDl', 'Chennal Three', 'HD', 'LCN One', '2021-06-28 21:24:19', '2021-06-28 21:24:19'),
(21, 'AIRTEL', '/tmp/phpIejrDl', 'Chennal Four', 'SD', 'LCN One', '2021-06-28 21:24:19', '2021-06-28 21:24:19'),
(22, 'AIRTEL', '/tmp/phpIejrDl', 'Chennal Five', 'SD', 'LCN One', '2021-06-28 21:24:19', '2021-06-28 21:24:19'),
(23, 'DISH TV', '/tmp/php9PMOrd', 'Chennal One', 'HD', 'LCN One', '2021-06-28 21:25:35', '2021-06-28 21:25:35'),
(24, 'DISH TV', '/tmp/php9PMOrd', 'Chennal Tne', 'SD', 'LCN One', '2021-06-28 21:25:35', '2021-06-28 21:25:35'),
(25, 'DISH TV', '/tmp/php9PMOrd', 'Chennal Three', 'HD', 'LCN One', '2021-06-28 21:25:35', '2021-06-28 21:25:35'),
(26, 'DISH TV', '/tmp/php9PMOrd', 'Chennal Four', 'SD', 'LCN One', '2021-06-28 21:25:35', '2021-06-28 21:25:35'),
(27, 'DISH TV', '/tmp/php9PMOrd', 'Chennal Five', 'SD', 'LCN One', '2021-06-28 21:25:35', '2021-06-28 21:25:35'),
(28, 'TATA SKY', '/tmp/phpIXl2S7', '& Pictures', 'SD', '202', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(29, 'TATA SKY', '/tmp/phpIXl2S7', '& TV', 'SD', '114', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(30, 'TATA SKY', '/tmp/phpIXl2S7', '&Flix', 'SD', '251', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(31, 'TATA SKY', '/tmp/phpIXl2S7', '&Flix HD', 'HD', '1124', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(32, 'TATA SKY', '/tmp/phpIXl2S7', '&PICTURES HD', 'HD', '1115', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(33, 'TATA SKY', '/tmp/phpIXl2S7', '&PRIVE HD', 'HD', '1123', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(34, 'TATA SKY', '/tmp/phpIXl2S7', '&TV HD', 'HD', '1104', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(35, 'TATA SKY', '/tmp/phpIXl2S7', '24 Ghanta', 'SD', '691', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(36, 'TATA SKY', '/tmp/phpIXl2S7', '4TV NEWS', 'SD', '781', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(37, 'TATA SKY', '/tmp/phpIXl2S7', '9X Jalwa', 'SD', '507', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(38, 'TATA SKY', '/tmp/phpIXl2S7', '9X Jhakaas', 'SD', '766', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(39, 'TATA SKY', '/tmp/phpIXl2S7', '9X Tashan', 'SD', '962', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(40, 'TATA SKY', '/tmp/phpIXl2S7', '9XM', 'SD', '502', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(41, 'TATA SKY', '/tmp/phpIXl2S7', 'A1TV', 'SD', '375', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(42, 'TATA SKY', '/tmp/phpIXl2S7', 'Aaj Tak', 'SD', '308', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(43, 'TATA SKY', '/tmp/phpIXl2S7', 'Aaj Tak HD', 'HD', '1166', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(44, 'TATA SKY', '/tmp/phpIXl2S7', 'AAKASH BANGLA', 'SD', '693', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(45, 'TATA SKY', '/tmp/phpIXl2S7', 'Aastha', 'SD', '534', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(46, 'TATA SKY', '/tmp/phpIXl2S7', 'Aastha Bhajan', 'SD', '548', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(47, 'TATA SKY', '/tmp/phpIXl2S7', 'ABP Ananda', 'SD', '694', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(48, 'TATA SKY', '/tmp/phpIXl2S7', 'ABP Asmita', 'SD', '791', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(49, 'TATA SKY', '/tmp/phpIXl2S7', 'ABP Ganga', 'SD', '363', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(50, 'TATA SKY', '/tmp/phpIXl2S7', 'ABP Majha', 'SD', '770', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(51, 'TATA SKY', '/tmp/phpIXl2S7', 'ABP News', 'SD', '302', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(52, 'TATA SKY', '/tmp/phpIXl2S7', 'ABZY COOL', 'SD', '129', '2021-06-29 09:33:04', '2021-06-29 09:33:04'),
(53, 'AIRTEL', NULL, 'Zee News', 'SD', '311', '2021-06-29 19:36:59', '2021-06-29 19:36:59'),
(54, 'DISH TV', NULL, 'Zee News', 'SD', '123', '2021-06-30 13:52:58', '2021-06-30 13:52:58'),
(56, 'Tata Sky', NULL, 'Zee Cinema HD', 'HD', '312', '2021-07-02 09:36:32', '2021-07-05 19:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `chennal_gides`
--

CREATE TABLE `chennal_gides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operator_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chennal_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chennal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hd_sd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lcn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Discovery India', '8130254555555', 'India', '1234544551', 'Raj', '2021-04-10 13:19:47', '2021-05-02 14:21:41', NULL),
(2, 'Sony Network', '8989898989111', 'Hello name', 'AAAAAAAAA1', 'name one', '2021-04-10 13:20:53', '2021-07-07 13:53:50', NULL),
(3, 'India TV Network', '6767676767111', 'India', 'XCBNHMJNJ1', 'Jai', '2021-04-10 14:36:27', '2021-05-02 14:22:26', NULL),
(4, 'Enterr10 Media', '+909090909090', 'Hello', 'MMMMMM1231', 'name one', '2021-04-13 11:54:33', '2021-05-02 14:20:08', NULL),
(5, 'ETV NETWORK', '+918888888888', 'hyderdabad', '1234567899', 'Mis Laxmi', '2021-05-06 06:23:21', '2021-05-06 06:23:21', NULL),
(6, 'POGO', '+909090909090', 'sxdfcgvhbn', '1234544551', 'name one', '2021-05-10 17:06:34', '2021-05-10 17:06:34', NULL);

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
(1, 2, 7, 'ppppppn Patel', 'contact@gmail.com', '9090909090', '21327867', '2021-05-10 07:53:27', '2021-05-10 08:06:06', '2021-05-10 08:06:06'),
(2, 3, 9, 'nenci', 'contact@gmail.com', '9090909090', '21327867', '2021-05-10 07:54:10', '2021-05-10 07:54:10', NULL),
(3, 3, 9, 'mans Patel', 'a@gmail.com', '9090909090', '21903298', '2021-05-10 07:54:10', '2021-05-10 07:54:10', NULL),
(4, 3, 9, 'arianus', 'b@gmail.com', '8989898989', '22778877', '2021-05-10 07:54:10', '2021-05-10 07:54:10', NULL),
(5, 2, 7, 'Hiren Patel', 'contact@gmail.com', '9090909090', '21327868', '2021-05-10 07:54:38', '2021-05-10 07:55:57', '2021-05-10 07:55:57'),
(6, 3, 9, 'nenci', 'contact@gmail.com', '9090909090', '1111111111', '2021-05-10 07:56:20', '2021-05-10 07:56:20', NULL),
(7, 2, 7, 'kkkk', 'contact@gmail.com', '9090909090', '21327867', '2021-05-10 07:59:33', '2021-05-10 08:04:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `director_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_film` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `director_name`, `director_image`, `about`, `best_film`, `award`, `created_at`, `updated_at`) VALUES
(1, 'EdZgTcGBT5', 'o4mM31RS5O', 'l95H9DPMRk', '9Xa52P3tzh', 'WKGsI22rK4', NULL, NULL),
(2, 'Eu5DAuHe7V', 'wnc8Xg8d6u', 'ms26w6lBUw', 'NQ57Rr5I3P', 'U8jD6xKVZa', NULL, NULL),
(3, '49Njkh0Xve', '6wsqrQjOtn', 'ImTqGJ9W2x', 'TtEdp91XNz', '1qzqhvbiBD', NULL, NULL),
(4, 'z3Our3YuIu', 'EypJLGdXGX', 'Wf9QceUn4L', 'vG5j5hURQZ', 'hxVgJJ9paq', NULL, NULL),
(5, 'x6DNshJtlh', 'oaX6rrS6sf', 'n2z75AuuqC', 'LhqSswfzH0', 'TCJ1NR2uKi', NULL, NULL),
(6, 'zHURi9FppF', '2kgPq3dLOp', 'h0QyXX4g9t', 'p9D8Zcm29j', 'FYeNWcVUP9', NULL, NULL),
(7, 'hntju6chDO', 'yLv5LQhsRF', 'XZKZL0yZyT', 'YPmYlRKdTw', 'Suyv0DsT7i', NULL, NULL),
(8, 'oj58ijlp0W', 'CNkqJZOj2S', 'JdX79fvzf2', 'vEj9NkjV8G', 'It907SvTzT', NULL, NULL);

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
(5, 'Telegu', 'TEL', '2021-03-31 11:48:11', '2021-05-08 10:06:57', '2021-05-08 10:06:57'),
(14, 'Bangoli', 'BAN', '2021-04-13 11:07:24', '2021-04-13 11:07:24', NULL);

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
(19, '2021_04_02_145116_create_contact_master_table', 13),
(20, '2021_07_16_154317_create_star_casts_table', 14),
(21, '2021_07_16_154415_create_directors_table', 14),
(22, '2021_07_16_154448_create_writers_table', 14),
(23, '2021_07_16_154509_create_producers_table', 14),
(24, '2021_07_16_154712_create_chennal_gides_table', 14);

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
-- Table structure for table `operator_master`
--

CREATE TABLE `operator_master` (
  `id` bigint(20) NOT NULL,
  `si_no` varchar(250) DEFAULT NULL,
  `operator_name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator_master`
--

INSERT INTO `operator_master` (`id`, `si_no`, `operator_name`, `created_at`, `updated_at`) VALUES
(3, 'SI07', 'Tata Sky', '2021-06-27 18:44:17', '2021-06-30 21:13:01'),
(4, 'SI06', 'Dish TV', '2021-06-27 18:44:31', '2021-06-30 21:12:46'),
(5, 'SI08', 'Airtel', '2021-06-27 21:42:55', '2021-06-30 21:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(NULL, 'hiren@gmail.com', 'eyJpdiI6Ii9wOTZCbFZIWUpKd2V1NFRyN051U2c9PSIsInZhbHVlIjoiY2RDVFNhMHN0T0JRUzN5aWgxNnZDdz09IiwibWFjIjoiOTVjOTAzMWYxNWYzOTExZTk3NDFmZDVjOTU0MTA3ODYyYTAwOGIwMWIyMTBlNWMwMjBhM2ExYzhjZmI2NDRjMCJ9', '2021-04-10 10:23:54');

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
-- Table structure for table `producers`
--

CREATE TABLE `producers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producer_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_film` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`id`, `producer_name`, `producer_image`, `about`, `best_film`, `award`, `created_at`, `updated_at`) VALUES
(1, 'Sb8syVBjLF', 'miEwpjz6Rv', 'tP6Mcdec8r', '4Jg0cTPjFr', '5BfwbRAWJw', NULL, NULL),
(2, 'eigiMTg5NT', 'TVxEuOZZoS', 'iyZvyjprK9', 'O2lejq1Ik5', 'eZsRO8W5Bv', NULL, NULL),
(3, 'dMZ4zCVYCE', 'qrUIOilTDl', 'kuINmcxPGN', '6L7dGQjCBq', 'xWYT0Li4cM', NULL, NULL),
(4, 'UB37Ulgscf', '3BnhzeSICE', '85ycCYxibj', 'pN46akuHL2', '7CcjUvZhOI', NULL, NULL),
(5, 'PLt9SuTCam', 'vCuIgQ1ZJJ', 'iQiPaD9nDk', 'o0B10mctnU', 'gJgmSwRsFf', NULL, NULL),
(6, 'GLc1d3X9yE', 'liZjWpCYH0', '95mpcy4qFh', 'NKJNZz35Q1', 'WZmFGQvIQC', NULL, NULL),
(7, 'glPrHYMymn', 'LSuhVHMlg9', 'kkR5jhf6jC', 'SuY5IG7Y9l', 'IfdPjiO0VU', NULL, NULL),
(8, 'HJcpHed4hi', 'Bz8bxn3dN7', 'Ql9XGPlk8q', 'z4XcNQNOBi', 'PkHUKiy0dM', NULL, NULL),
(9, 'lIxnanv0fM', 'UlBIEp2YAX', 'VkG3sD4PEg', 'OZbINZsyqQ', 'FHTMFJVjAo', NULL, NULL),
(10, 'qhkj7TL6AY', 'eJuDdBYRkX', 'XkqEwKcKD6', 'VTAmpcm2K0', 'lUbEvXcbep', NULL, NULL),
(11, 'bgJaQJShZs', 'jE3q7Dh9w5', '4vofHwHcdY', '1qQTIU948J', 'AGkTAQPaaH', NULL, NULL);

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
(1, 'genre name', 'Genre-1617293262.png', '2021-04-01 10:37:42', '2021-05-02 14:27:01', '2021-05-02 14:27:01'),
(2, 'genre name two', 'Genre-1617293262.png', '2021-04-01 10:37:42', '2021-04-01 10:37:42', NULL),
(3, 'genre name three', 'Genre-1617293262.png', '2021-04-01 10:37:42', '2021-04-03 10:33:36', NULL),
(4, 'genre name four', 'Genre-1617293262.png', '2021-04-01 10:37:42', '2021-04-03 10:33:08', NULL),
(5, 'genre name five', 'Genre-1618059203.jpg', '2021-04-10 07:22:57', '2021-04-10 07:23:33', '2021-04-10 07:23:33'),
(6, 'ACTION', 'Genre-1620409666.jpeg', '2021-05-07 15:44:10', '2021-05-07 15:47:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_master_add`
--

CREATE TABLE `program_master_add` (
  `id` bigint(20) NOT NULL,
  `program_name` varchar(250) DEFAULT NULL,
  `search_chennal_name` varchar(250) DEFAULT NULL,
  `upload_module` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_master_add`
--

INSERT INTO `program_master_add` (`id`, `program_name`, `search_chennal_name`, `upload_module`, `created_at`, `updated_at`) VALUES
(3, 'Himalay', 'cinema', 'News Module', '2021-06-25 19:32:33', '2021-06-25 19:32:33'),
(7, 'lallo', 'cinema', 'News Module', '2021-06-25 20:00:22', '2021-06-25 20:00:22'),
(8, 'MX web', 'sony', 'Entertainment Module', '2021-06-27 18:55:36', '2021-06-27 18:55:36');

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
(1, 'sub genre name', 'SubGenre-1617294475.png', '2021-04-01 10:57:55', '2021-04-01 10:57:55', NULL),
(2, 'sub genre name two', 'SubGenre-1617294475.png', '2021-04-01 10:57:55', '2021-04-01 10:57:55', NULL),
(3, 'sub genre name three', 'SubGenre-1617294475.png', '2021-04-01 10:57:55', '2021-05-10 17:15:01', '2021-05-10 17:15:01'),
(4, 'sub genre name four', 'SubGenre-1617294475.png', '2021-04-01 10:57:55', '2021-04-03 10:35:30', NULL),
(5, 'sub genre name five', 'SubGenre-1618059431.png', '2021-04-10 07:26:43', '2021-04-10 07:27:20', '2021-04-10 07:27:20');

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
-- Table structure for table `star_casts`
--

CREATE TABLE `star_casts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cast_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cast_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_film` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `star_casts`
--

INSERT INTO `star_casts` (`id`, `cast_name`, `cast_image`, `about`, `best_film`, `award`, `created_at`, `updated_at`) VALUES
(1, 'PHVp3N3C09', 'VIfc3rXcDM', 'MZ9dwgUDuA', 'tbML9rWEzC', '2eXZE4ciZz', NULL, NULL),
(2, 'npq7GbdDss', 'hL1LVqQsoG', 'stXDiBgMes', 'KDONS21PCg', 'GH6MbynAu8', NULL, NULL),
(3, 'jvlUkVDtA7', 'z4k2yqTqF0', 'olelSVdbDs', '4AOpSn3N0n', 'cCiwFnIVRg', NULL, NULL),
(4, 'ave6LGBqLb', 'OW7qAD9vGs', 'Sp915HXy2p', 'NG0mYOntL1', 'JJ2qL570j4', NULL, NULL),
(5, 'yGqDPCo5PO', '8Tdx2nJplY', 'pI1iEHqkVB', 'ekT4UwJXj8', '5QnEw58FJ6', NULL, NULL),
(6, 'LzS6whhmzv', 'HZ7gVjRYS6', 'FYPNMYpLC9', 'PtrWDChBs7', 'jZMsgVr9qq', NULL, NULL),
(7, 'PmdxJTc1Jl', 'Le5MbCKjyp', 'AQCJoGhWP1', 'Av4peovhQJ', 'x2Rj9NOtZJ', NULL, NULL),
(8, 'ZSJ6cHVths', '6swcXpd219', 'gwhydhTvdI', 'oCOuAYgt8H', 'phlsejrgjZ', NULL, NULL),
(9, 'Bft4aVl1B7', 'FNa8F3stUc', 'xV0y2dEvKM', 'vtOXuYBK6D', '0KzIX68Hl1', NULL, NULL),
(10, 'AeLqUqUo6I', 'dmJjuT8FWT', 'CXKljBbKu6', 'xS2najsufT', 'A5NjPr1K7p', NULL, NULL),
(11, 'tLbA3oXHB8', 'I0jpLxZjXm', 'z1W1YM7TBm', '51YF5dWCYm', 'AL17MeKQh3', NULL, NULL),
(12, 'bHHVwnCsnt', 'HfuHiGFlC1', 'XdH6lBM0zB', 'Z1523bY8O6', 'RvnplHGnnp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uploadnewsmodule_update`
--

CREATE TABLE `uploadnewsmodule_update` (
  `id` bigint(20) NOT NULL,
  `channel_name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `program_name` text DEFAULT NULL,
  `genre` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `episodeno` varchar(250) DEFAULT NULL,
  `show_wise_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploadnewsmodule_update`
--

INSERT INTO `uploadnewsmodule_update` (`id`, `channel_name`, `slug`, `program_name`, `genre`, `date`, `time`, `duration`, `description`, `episodeno`, `show_wise_description`, `created_at`, `updated_at`) VALUES
(5, 'cinema', 'we-the-people', 'We The People', NULL, '05/31/2021', '00:00:00', '30', 'The show throws the floor open for discussions on issues affecting India and its people, ensuring the citizen has his say.', '450', '', '2021-06-27 09:56:33', '2021-06-27 09:56:33'),
(6, 'cinema', 'news', 'News', NULL, '05/31/2021', '01:00:00', '30', 'A mixed-news bulletin which keeps viewers updated with the current affairs.', '2167', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(8, 'cinema', '40-years-of-ub40-on-spotlight', '40 Years Of UB40 On Spotlight', NULL, '05/31/2021', '02:30:00', '30', 'Rohit Khilnani talks to members of the iconic band UB40, on their glorious history & their love for Bollywood music', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(9, 'cinema', 'the-gadgets-360-show', 'The Gadgets 360 Show', NULL, '05/31/2021', '03:30:00', '30', 'All the gadgets, all the gyan. Gadget Guru takes a look at the coolest, hippest, funkiest gadgets out there.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(10, 'cinema', 'the-car-and-bike-show', 'The Car and Bike Show', NULL, '05/31/2021', '06:30:00', '30', 'The latest trends in the automobile world, reviews of the latest motors.', '406', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(12, 'cinema', 'fighting-covid-with-dr-randeep-guleria', 'Fighting COVID With Dr Randeep Guleria', NULL, '05/31/2021', '11:30:00', '30', 'Vishnu Som talks to Dr Randeep Guleria of AIIMS to understand the details of India\'s fight against Covid-19.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(13, 'cinema', 'news-at-noon', 'News at Noon', NULL, '05/31/2021', '12:00:00', '30', 'Join our reporters as they uncover the news stories that will develop into headlines by the evening.', '1733', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(15, 'cinema', 'the-coronavirus-show-debunking-rumours', 'The Coronavirus Show - Debunking Rumours', NULL, '05/31/2021', '13:30:00', '30', 'There are hundreds of answers to our many questions, but what is the truth? NDTV debunks dangerous rumours & lies to counter misinformation.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(16, 'cinema', 'newsroom-newsbreak', 'Newsroom Newsbreak', NULL, '05/31/2021', '17:00:00', '90', 'The days big breaking stories', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(17, 'cinema', 'fyi-a-look-at-the-issues-that-affect-us', 'Fyi- A Look At The Issues That Affect Us', NULL, '05/31/2021', '18:30:00', '30', 'Join us for FYI, an indepth look at the issues that affect us. We deep dive into one single issue so we remain well informed.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(18, 'cinema', 'newsbreak', 'Newsbreak', NULL, '05/31/2021', '19:00:00', '30', 'Catch all the breaking news of the hour on this show.', '1534', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(19, 'cinema', 'the-news-with-sonia-singh', 'The News With Sonia Singh', NULL, '05/31/2021', '20:00:00', '30', 'Pure News. No Debate. Half an hour of all the top stories of the day - Politics, Sports, City News, World events, Business & Entertainment - we keep you up to date', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(20, 'cinema', 'reality-check-with-sreenivasan-jain', 'Reality Check With Sreenivasan Jain', NULL, '05/31/2021', '20:30:00', '30', 'The host invites a panel of experts from various fields to discuss and analyse some of the raging issues of the country.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(21, 'cinema', 'the-days-big-story-with-vishnu-som', 'The Day\'s Big Story With Vishnu Som', NULL, '05/31/2021', '21:00:00', '30', 'The host delves deeper into the significant political as well as socio-economic updates and developments from across the country.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(22, 'cinema', 'sanket-upadhyay-with-top-trending-news', 'Sanket Upadhyay With Top Trending News', NULL, '05/31/2021', '21:30:00', '30', 'The host presents a detailed report on some of the important and trending topics from the country as well as around the world.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(23, 'cinema', 'the-10-oclock-news', 'The 10 O\'Clock News', NULL, '05/31/2021', '22:00:00', '30', 'As your day winds down, join us for a complete round up of what happened in India and around the world on the 10 O\'Clock news.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(24, 'cinema', 'the-big-fight-with-sanket-upadhyay', 'The Big Fight With Sanket Upadhyay', NULL, '06/04/2021', '21:00:00', '60', 'Tempers fly as the newsmakers of the week face-off in this award-winning show. Watch politicians battlling wits with each other.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(25, 'cinema', 'spotlight', 'Spotlight', NULL, '06/04/2021', '22:30:00', '30', 'Catch your favourite stars in the NDTV Spotlight as they talk about their films, foibles and fans.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(26, 'cinema', 'breakfast-news', 'Breakfast News', NULL, '06/05/2021', '08:00:00', '90', 'The breakfast show to kick-start your day perfectly - overnight news headlines to watch out for through the day.', '1671', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(27, 'cinema', 'google-vaccinate-india', 'Google Vaccinate India', NULL, '06/05/2021', '11:00:00', '120', 'An campaign to help you make well-informed decisions about where to get vaccinated, how to stay protected, and the treatment to seek if you are infected - info at your fingertips.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(28, 'cinema', 'the-evening-news', 'The Evening News', NULL, '06/05/2021', '17:00:00', '30', 'When the stock markets close, get the complete low down on the main business stories of the day.', '2132', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(29, 'cinema', 'banega-swasth-india-world-environment-day', 'Banega Swasth India: World Environment Day', NULL, '06/05/2021', '17:30:00', '30', 'On World Environment Day, the NDTV Dettol Banega Swasth India campaign takes a look at how caring for the environment is crucial to our well-being.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(30, 'cinema', 'the-property-show', 'The Property Show', NULL, '06/05/2021', '19:30:00', '30', 'NDTV\'s guide to buying & selling property, what to watch out for and the hot buys week on week', '36', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(31, 'cinema', 'the-days-big-story', 'The Day\'s Big Story', NULL, '06/05/2021', '21:00:00', '30', 'The host sheds light on some of the most recent social, political and economic news, updates and developments from all over the country.', '0', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34'),
(32, 'cinema', 'afternoon-news', 'Afternoon News', NULL, '06/06/2021', '15:00:00', '60', 'This show takes you through developing stories of the day in politics, sports and entertainment.', '1500', '', '2021-06-27 09:56:34', '2021-06-27 09:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `upload_entertainment_module`
--

CREATE TABLE `upload_entertainment_module` (
  `id` bigint(20) NOT NULL,
  `upload_id` bigint(20) DEFAULT NULL,
  `program_name` varchar(250) DEFAULT NULL,
  `genre` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `episodeno` varchar(250) DEFAULT NULL,
  `show_wise_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload_menu_master`
--

CREATE TABLE `upload_menu_master` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `upload_module` varchar(250) DEFAULT NULL,
  `search_name` varchar(250) DEFAULT NULL,
  `upload_file` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_menu_master`
--

INSERT INTO `upload_menu_master` (`id`, `user_id`, `upload_module`, `search_name`, `upload_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'News Module', 'cinema', 'Upload-1624648091.xls', '2021-06-25 19:08:11', '2021-06-25 19:08:11', NULL),
(2, 1, 'News Module', 'chanel one', 'Upload-1624648139.xls', '2021-06-25 19:08:59', '2021-06-25 19:08:59', NULL),
(3, 1, 'News Module', 'sony', 'Upload-1624648303.xls', '2021-06-25 19:11:43', '2021-06-25 19:11:43', NULL),
(4, 1, 'News Module', 'sony', 'Upload-1624651383.xls', '2021-06-25 20:03:03', '2021-06-25 20:03:03', NULL),
(5, 1, 'News Module', 'cinema', 'Upload-1624651404.xls', '2021-06-25 20:03:24', '2021-06-25 20:03:24', NULL),
(6, 1, 'News Module', 'chanel one', 'Upload-1624651421.xls', '2021-06-25 20:03:41', '2021-06-25 20:03:41', NULL),
(7, 1, 'News Module', 'cinema', 'Upload-1624787762.xls', '2021-06-27 09:56:02', '2021-06-27 09:56:02', NULL),
(8, 1, 'News Module', 'sony', 'Upload-1624787780.xls', '2021-06-27 09:56:20', '2021-06-27 09:56:20', NULL),
(9, 1, 'News Module', 'cinema', 'Upload-1624787794.xls', '2021-06-27 09:56:34', '2021-06-27 09:56:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upload_news_module`
--

CREATE TABLE `upload_news_module` (
  `id` bigint(20) NOT NULL,
  `channel_name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `program_name` text DEFAULT NULL,
  `genre` varchar(250) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `episodeno` varchar(250) DEFAULT NULL,
  `show_wise_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_news_module`
--

INSERT INTO `upload_news_module` (`id`, `channel_name`, `slug`, `program_name`, `genre`, `date`, `time`, `duration`, `description`, `episodeno`, `show_wise_description`, `created_at`, `updated_at`) VALUES
(1, 'sony', 'we-the-people', 'We The People', NULL, '05/31/2021', '00:00:00', '30', 'The show throws the floor open for discussions on issues affecting India and its people, ensuring the citizen has his say.', '450', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(2, 'sony', 'banner', 'banner', NULL, '05/31/2021', '00:30:00', '30', 'Vishnu Som talks to Dr Randeep Guleria of AIIMS to understand the details of India\'s fight against Covid-19.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(3, 'sony', 'news', 'News', NULL, '05/31/2021', '01:00:00', '30', 'A mixed-news bulletin which keeps viewers updated with the current affairs.', '2167', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(4, 'sony', 'cell-guru', 'Cell Guru', NULL, '05/31/2021', '01:30:00', '30', 'All thats latest in the world of mobile phones. All the gadgets, the features, the technology on your phone.', '577', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(5, 'sony', '40-years-of-ub40-on-spotlight', '40 Years Of UB40 On Spotlight', NULL, '05/31/2021', '02:30:00', '30', 'Rohit Khilnani talks to members of the iconic band UB40, on their glorious history & their love for Bollywood music', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(6, 'sony', 'the-gadgets-360-show', 'The Gadgets 360 Show', NULL, '05/31/2021', '03:30:00', '30', 'All the gadgets, all the gyan. Gadget Guru takes a look at the coolest, hippest, funkiest gadgets out there.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(7, 'sony', 'the-car-and-bike-show', 'The Car and Bike Show', NULL, '05/31/2021', '06:30:00', '30', 'The latest trends in the automobile world, reviews of the latest motors.', '406', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(8, 'sony', 'good-morning-india', 'Good Morning India', NULL, '05/31/2021', '08:00:00', '120', 'The host discusses with experts on various interesting topics including lifestyle, healthcare, news trending in media etc.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(9, 'sony', 'fighting-covid-with-dr-randeep-guleria', 'Fighting COVID With Dr Randeep Guleria', NULL, '05/31/2021', '11:30:00', '30', 'Vishnu Som talks to Dr Randeep Guleria of AIIMS to understand the details of India\'s fight against Covid-19.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(10, 'sony', 'news-at-noon', 'News at Noon', NULL, '05/31/2021', '12:00:00', '30', 'Join our reporters as they uncover the news stories that will develop into headlines by the evening.', '1733', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(11, 'cinema', 'lunchtime-news', 'Lunchtime News', NULL, '05/31/2021', '13:00:00', '30', 'Track how far the morning\'s stories have developed and which way the rest of the day may go.', '1360', '', '2021-06-25 20:03:03', '2021-06-30 09:59:38'),
(12, 'sony', 'the-coronavirus-show-debunking-rumours', 'The Coronavirus Show - Debunking Rumours', NULL, '05/31/2021', '13:30:00', '30', 'There are hundreds of answers to our many questions, but what is the truth? NDTV debunks dangerous rumours & lies to counter misinformation.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(13, 'sony', 'newsroom-newsbreak', 'Newsroom Newsbreak', NULL, '05/31/2021', '17:00:00', '90', 'The days big breaking stories', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(14, 'sony', 'fyi-a-look-at-the-issues-that-affect-us', 'Fyi- A Look At The Issues That Affect Us', NULL, '05/31/2021', '18:30:00', '30', 'Join us for FYI, an indepth look at the issues that affect us. We deep dive into one single issue so we remain well informed.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(15, 'sony', 'newsbreak', 'Newsbreak', NULL, '05/31/2021', '19:00:00', '30', 'Catch all the breaking news of the hour on this show.', '1534', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(16, 'sony', 'the-news-with-sonia-singh', 'The News With Sonia Singh', NULL, '05/31/2021', '20:00:00', '30', 'Pure News. No Debate. Half an hour of all the top stories of the day - Politics, Sports, City News, World events, Business & Entertainment - we keep you up to date', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(17, 'sony', 'reality-check-with-sreenivasan-jain', 'Reality Check With Sreenivasan Jain', NULL, '05/31/2021', '20:30:00', '30', 'The host invites a panel of experts from various fields to discuss and analyse some of the raging issues of the country.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(18, 'sony', 'the-days-big-story-with-vishnu-som', 'The Day\'s Big Story With Vishnu Som', NULL, '05/31/2021', '21:00:00', '30', 'The host delves deeper into the significant political as well as socio-economic updates and developments from across the country.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(19, 'sony', 'sanket-upadhyay-with-top-trending-news', 'Sanket Upadhyay With Top Trending News', NULL, '05/31/2021', '21:30:00', '30', 'The host presents a detailed report on some of the important and trending topics from the country as well as around the world.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(20, 'sony', 'the-10-oclock-news', 'The 10 O\'Clock News', NULL, '05/31/2021', '22:00:00', '30', 'As your day winds down, join us for a complete round up of what happened in India and around the world on the 10 O\'Clock news.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(21, 'sony', 'the-big-fight-with-sanket-upadhyay', 'The Big Fight With Sanket Upadhyay', NULL, '06/04/2021', '21:00:00', '60', 'Tempers fly as the newsmakers of the week face-off in this award-winning show. Watch politicians battlling wits with each other.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(22, 'sony', 'spotlight', 'Spotlight', NULL, '06/04/2021', '22:30:00', '30', 'Catch your favourite stars in the NDTV Spotlight as they talk about their films, foibles and fans.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(23, 'sony', 'breakfast-news', 'Breakfast News', NULL, '06/05/2021', '08:00:00', '90', 'The breakfast show to kick-start your day perfectly - overnight news headlines to watch out for through the day.', '1671', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(24, 'sony', 'google-vaccinate-india', 'Google Vaccinate India', NULL, '06/05/2021', '11:00:00', '120', 'An campaign to help you make well-informed decisions about where to get vaccinated, how to stay protected, and the treatment to seek if you are infected - info at your fingertips.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(25, 'sony', 'the-evening-news', 'The Evening News', NULL, '06/05/2021', '17:00:00', '30', 'When the stock markets close, get the complete low down on the main business stories of the day.', '2132', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(26, 'sony', 'banega-swasth-india-world-environment-day', 'Banega Swasth India: World Environment Day', NULL, '06/05/2021', '17:30:00', '30', 'On World Environment Day, the NDTV Dettol Banega Swasth India campaign takes a look at how caring for the environment is crucial to our well-being.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(27, 'sony', 'the-property-show', 'The Property Show', NULL, '06/05/2021', '19:30:00', '30', 'NDTV\'s guide to buying & selling property, what to watch out for and the hot buys week on week', '36', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(28, 'sony', 'the-days-big-story', 'The Day\'s Big Story', NULL, '06/05/2021', '21:00:00', '30', 'The host sheds light on some of the most recent social, political and economic news, updates and developments from all over the country.', '0', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(29, 'sony', 'afternoon-news', 'Afternoon News', NULL, '06/06/2021', '15:00:00', '60', 'This show takes you through developing stories of the day in politics, sports and entertainment.', '1500', '', '2021-06-25 20:03:03', '2021-06-25 20:03:03'),
(30, 'chanel one', 'hiren-patel', 'Hiren Patel', NULL, '05/31/2021', '00:00:00', '30', 'The show throws the floor open for discussions on issues affecting India and its people, ensuring the citizen has his say.', '450', '', '2021-06-25 20:03:24', '2021-06-29 20:34:16'),
(31, 'sony', 'sony', 'We The People', NULL, '05/31/2021', '00:00:00', '30', 'The show throws the floor open for discussions on issues affecting India and its people, ensuring the citizen has his say.', '450', '', '2021-06-25 20:03:51', '2021-06-25 20:03:51'),
(32, 'cinema', 'cinema', 'banner', NULL, '05/31/2021', '00:30:00', '30', 'Vishnu Som talks to Dr Randeep Guleria of AIIMS to understand the details of India\'s fight against Covid-19.', '0', '', '2021-06-27 09:55:37', '2021-06-27 09:55:37'),
(33, 'cinema', 'cinema', 'Cell Guru', NULL, '05/31/2021', '01:30:00', '30', 'All thats latest in the world of mobile phones. All the gadgets, the features, the technology on your phone.', '577', '', '2021-06-27 09:56:49', '2021-06-27 09:56:49'),
(34, 'cinema', 'cinema', 'Good Morning India', NULL, '05/31/2021', '08:00:00', '120', 'The host discusses with experts on various interesting topics including lifestyle, healthcare, news trending in media etc.', '0', '', '2021-06-27 09:56:54', '2021-06-27 09:56:54'),
(35, 'cinema', 'cinema', 'banner', NULL, '05/31/2021', '00:30:00', '30', 'Vishnu Som talks to Dr Randeep Guleria of AIIMS to understand the details of India\'s fight against Covid-19.', '0', '', '2021-06-30 09:59:31', '2021-06-30 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `upload_news_module_bluck`
--

CREATE TABLE `upload_news_module_bluck` (
  `id` bigint(20) NOT NULL,
  `program_name` text DEFAULT NULL,
  `genre` varchar(250) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `episodeno` varchar(250) DEFAULT NULL,
  `show_wise_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload_sports_module`
--

CREATE TABLE `upload_sports_module` (
  `id` bigint(20) NOT NULL,
  `upload_id` bigint(20) DEFAULT NULL,
  `program_name` varchar(250) DEFAULT NULL,
  `genre` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `episodeno` varchar(250) DEFAULT NULL,
  `show_wise_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Admin', 'admin@gmail.com', '2021-06-12 20:42:22', '$2y$10$qasDUFw2Rx/u/tExNHofWOo47uIgCUSsvtYsi1c9QpFVUxue3ggd.', NULL, 'Active', 1, 'Profile-1623517942.png', '2021-07-19 01:02:58', '2021-07-12 18:46:50', '2021-03-28 12:45:48', '2021-07-18 19:32:58', NULL),
(2, 'hiren_1903', 'hiren@gmail.com', '2021-06-27 13:38:42', '$2y$10$wimZFV4/hF0cZ9AqH5DMGOzZeiMCRpHVoHWujDNccvN3r6WqVEZ2y', NULL, 'Active', 2, 'Profile-1624788522.png', '2021-05-10 20:07:38', '2021-05-10 20:07:56', '2021-03-28 14:32:15', '2021-06-27 13:38:42', NULL),
(10, 'Sheetal', 'sheetal@eps.com', '2021-07-01 12:44:55', '$2y$10$urCWzNNR/m./S2DU1equiOXahhs33ZIQCfj7BOfjnsDr1.j4pP7dS', NULL, 'Active', 2, 'Profile-1625130895.jpg', '2021-05-02 14:32:49', '2021-05-02 14:32:49', '2021-05-02 14:31:08', '2021-07-01 12:44:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `writer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_film` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `writer_name`, `writer_image`, `about`, `best_film`, `award`, `created_at`, `updated_at`) VALUES
(1, 'sqM4CvwWPw', '2D2xDqgHvC', 'xZt8LhNQ0C', '95kdTyKFZN', 'Dl23HTt4fX', NULL, NULL),
(2, 'kO34q2YEYR', 'fL7AMINW7t', 'cuIinKV2A6', 'owaY6CJgYJ', 'vSKl2k9O0T', NULL, NULL),
(3, 'Rwrd8vftDv', 'caFMS9ONSF', 'G6NS4Bz8WR', 'Sqi1wKkik9', 'WudAeF0tXO', NULL, NULL),
(4, 'Nm78iyMJ0k', '38iyzIhbiN', 'kDXwVEmP3x', 'QRDhH4Ll8D', 'iL3ZTDJO2L', NULL, NULL),
(5, 'i3jQPcfj0m', '5ZvA9mBon3', 'q6K3KkDWVr', 'wNLcQrqWef', '05PQowp93l', NULL, NULL),
(6, 'M9CL9S89Kx', 'I17TN3XADR', 'XCw9z8foQs', 'ruIPupL3jl', 'EwIUQn2R4o', NULL, NULL),
(7, 'VMQTkuJyoR', 'IBw1BWHcgL', 'TNGi3u4EDR', '0pJbRBJyVz', 'QAXYFTLzl2', NULL, NULL),
(8, 'o5aJ4elr2v', '8gQul5alGd', '6X4gFbmJSe', 'By5cXZtUaV', 'jf8YP47eP2', NULL, NULL),
(9, 'ZqvBPR28bo', 'OABAIbRBr3', 'Yaki8Ug6qr', 'GwfYmN3oF0', 'VPlyiibl4B', NULL, NULL);

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
-- Indexes for table `chennal_gide`
--
ALTER TABLE `chennal_gide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chennal_gides`
--
ALTER TABLE `chennal_gides`
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
-- Indexes for table `directors`
--
ALTER TABLE `directors`
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
-- Indexes for table `operator_master`
--
ALTER TABLE `operator_master`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_genre_master`
--
ALTER TABLE `program_genre_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_master_add`
--
ALTER TABLE `program_master_add`
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
-- Indexes for table `star_casts`
--
ALTER TABLE `star_casts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadnewsmodule_update`
--
ALTER TABLE `uploadnewsmodule_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_entertainment_module`
--
ALTER TABLE `upload_entertainment_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_menu_master`
--
ALTER TABLE `upload_menu_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_news_module`
--
ALTER TABLE `upload_news_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_news_module_bluck`
--
ALTER TABLE `upload_news_module_bluck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_name_unique` (`name`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel_genre_masters`
--
ALTER TABLE `channel_genre_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `channel_master`
--
ALTER TABLE `channel_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chennal_gide`
--
ALTER TABLE `chennal_gide`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `chennal_gides`
--
ALTER TABLE `chennal_gides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_masters`
--
ALTER TABLE `company_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages_master`
--
ALTER TABLE `languages_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `operator_master`
--
ALTER TABLE `operator_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `program_genre_master`
--
ALTER TABLE `program_genre_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `program_master_add`
--
ALTER TABLE `program_master_add`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_sub_genre_master`
--
ALTER TABLE `program_sub_genre_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `star_casts`
--
ALTER TABLE `star_casts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uploadnewsmodule_update`
--
ALTER TABLE `uploadnewsmodule_update`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `upload_entertainment_module`
--
ALTER TABLE `upload_entertainment_module`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_menu_master`
--
ALTER TABLE `upload_menu_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `upload_news_module`
--
ALTER TABLE `upload_news_module`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `upload_news_module_bluck`
--
ALTER TABLE `upload_news_module_bluck`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
