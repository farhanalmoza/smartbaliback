-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 09:04 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_smartbaliback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profiles`
--

CREATE TABLE `admin_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_car` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_production` year(4) NOT NULL,
  `rent_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_capacity` bigint(20) NOT NULL,
  `passenger_capacity` bigint(20) NOT NULL,
  `verified` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `no_car`, `name`, `status`, `year_production`, `rent_price`, `purchase_price`, `fuel_capacity`, `passenger_capacity`, `verified`, `created_at`, `updated_at`) VALUES
(1, 6, 'L 5678 CB', '2', 'no rent', 2002, '2', '100000', 33, 10, NULL, '2021-12-18 05:56:22', '2021-12-20 03:51:51'),
(3, 6, 'L 5678 CD', '1', 'no rent', 2000, '100000', '100000', 10, 8, NULL, '2021-12-20 03:29:10', '2021-12-20 03:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `car_facility`
--

CREATE TABLE `car_facility` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `user_id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(2, 6, 'nama', 'alamat', '081234567890', '2021-12-21 04:43:21', '2021-12-21 04:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED DEFAULT NULL,
  `souvenir_id` bigint(20) UNSIGNED DEFAULT NULL,
  `worship_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `place_id`, `car_id`, `souvenir_id`, `worship_id`, `hotel_id`, `picture`, `created_at`, `updated_at`) VALUES
(22, 36, NULL, NULL, NULL, NULL, '4ApdSNJJ68EAXuYvFCkA.jpg', '2021-09-16 04:17:20', '2021-09-16 04:17:20'),
(24, NULL, 15, NULL, NULL, NULL, 'LELGqMTCwG2SbdZETE6B.png', '2021-10-06 04:24:35', '2021-10-06 04:24:35'),
(25, NULL, 15, NULL, NULL, NULL, 'Xck28PP4HUneq22jWlu9.png', '2021-10-06 04:24:57', '2021-10-06 04:24:57'),
(26, NULL, 15, NULL, NULL, NULL, 'lAnoV2YmPc6JT4VFb86V.png', '2021-10-08 15:36:51', '2021-10-08 15:36:51'),
(27, NULL, 14, NULL, NULL, NULL, 'L4xsf7wwHxGoHZ0eAF6a.png', '2021-10-08 15:53:59', '2021-10-08 15:53:59'),
(28, NULL, 16, NULL, NULL, NULL, 'b26g6VMM0AFdKGgxcGk0.png', '2021-10-10 23:18:15', '2021-10-10 23:18:15'),
(40, NULL, 3, NULL, NULL, NULL, '7UbhuoZgRimuDVVzSXFr.png', '2021-12-20 03:35:08', '2021-12-20 03:35:08'),
(41, NULL, 1, NULL, NULL, NULL, 'l5W9tpxyFDvSK4ZUlzp8.png', '2021-12-20 03:52:00', '2021-12-20 03:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `user_id`, `title`, `slug`, `thumbnail`, `desc`, `address`, `latitude`, `longtitude`, `verified_at`, `created_at`, `updated_at`) VALUES
(1, 5, 'coba1', 'coba1', 'YbuWJjKuVW8HNwone4BG.jpeg', '<p>09</p>', 'almat', 'kj', '09', NULL, '2021-12-07 23:49:27', '2021-12-07 23:49:27'),
(2, 5, 'kl', 'kl', 'V9gzWcGhyZN75v0Y8crW.jpeg', '<p>90</p>', '90', '90', '90', NULL, '2021-12-07 23:51:52', '2021-12-07 23:51:52'),
(3, 5, 'a', 'a', 'QJeSHi4lN7STqoEzSCOX.jpeg', '<p>o</p>', 'o', 'o', 'o', NULL, '2021-12-08 00:12:34', '2021-12-08 00:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_tag`
--

CREATE TABLE `hotel_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `place_id`, `car_id`, `message`, `read`, `created_at`, `updated_at`) VALUES
(1, 13, 37, NULL, 'Tempat yang Anda ajukan sudah lolos verifikasi', '0', '2021-09-26 01:35:53', '2021-09-26 01:35:53'),
(2, 13, NULL, NULL, 'Tempat yang Anda ajukan sudah lolos verifikasi', '0', '2021-10-11 00:07:00', '2021-10-11 00:07:00');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2021_07_03_101433_create_profiles_table', 1),
(17, '2021_07_03_110441_create_places_table', 1),
(18, '2021_07_03_114429_create_tags_table', 1),
(19, '2021_07_03_114534_create_place_tags_table', 1),
(20, '2021_07_03_114917_create_galeries_table', 1),
(21, '2021_07_03_120429_create_backpackers_table', 1),
(22, '2021_07_03_120500_create_records_table', 1),
(23, '2021_08_03_030610_rename_table', 2),
(24, '2021_08_11_235701_rename_galeries_to_galleries', 3),
(25, '2021_08_16_221121_update_places_table', 4),
(28, '2021_08_30_130726_update_users_table', 5),
(29, '2021_08_30_134421_add_column_user_id_to_places_table', 6),
(30, '2021_08_30_223209_create_cars_table', 7),
(32, '2021_08_30_224137_create_facilities_table', 8),
(33, '2021_08_30_224215_create_car_facility_table', 9),
(34, '2021_08_30_224745_create_drivers_table', 10),
(35, '2021_08_30_225031_create_rents_table', 11),
(36, '2021_09_14_073343_update_profiles_table', 12),
(37, '2021_09_16_152856_add_souvenirs_type_place_table', 13),
(38, '2021_09_17_054720_change_vrified_column_in_place_table', 14),
(39, '2021_09_17_082810_create_messages_table', 15),
(41, '2021_10_05_075835_add_verified_columnt_to_cars_table', 16),
(42, '2021_10_06_100507_add_car_id_to_galleries_table', 17),
(43, '2021_10_11_070524_add_car_id_columnt_to_messages_table', 18),
(45, '2021_10_13_062415_add_column_to_backpackers_table', 19),
(46, '2021_11_06_115650_update_level_column_to_users_table', 20),
(47, '2021_11_06_120719_create_administrators_table', 21),
(48, '2021_11_07_044741_drop_backpackers_table', 22),
(49, '2021_11_07_045718_rename_profiles_table', 23),
(50, '2021_11_07_050655_create_owner_tour_table', 24),
(54, '2021_11_07_055901_create_owner_hotel_table', 25),
(55, '2021_11_07_060123_create_owner_worship_table', 25),
(56, '2021_11_07_060143_create_owner_souvenir_table', 25),
(57, '2021_11_07_060522_create_owner_car_table', 25),
(58, '2021_11_07_071505_drop_admin_profiles_table', 26),
(59, '2021_11_07_072207_create_administrator_table', 27),
(60, '2021_11_07_072249_create_admin_prfiles_table', 28),
(61, '2021_11_08_123032_add_read_column_to_messages_table', 29),
(62, '2021_11_09_040255_create_records_table', 30),
(63, '2021_11_09_040456_create_record_place_table', 30),
(64, '2021_11_09_040707_create_record_accom_table', 30),
(65, '2021_11_09_131247_create_hotels_table', 31),
(66, '2021_11_09_131844_create_record_hotel_table', 32),
(67, '2021_11_11_090116_rename_place_table', 33),
(68, '2021_11_11_090419_delete_type_column_in_tours_table', 34),
(69, '2021_11_11_090605_create_worships_table', 35),
(70, '2021_11_11_091136_create_souvenirs_table', 36),
(71, '2021_11_19_001705_create_owner_tour_table', 37),
(72, '2021_11_19_001819_create_owner_hotel_table', 37),
(73, '2021_11_19_001853_create_owner_worship_table', 37),
(74, '2021_11_19_001908_create_owner_souvenir_table', 37),
(75, '2021_11_19_001914_create_owner_car_table', 37),
(76, '2021_12_08_070831_create_hotel_tag_table', 38),
(77, '2021_12_08_091026_add_foreign_key_to_galleries_table', 39),
(78, '2021_12_20_114359_create_souvenir_tag_table', 40),
(79, '2021_12_20_131610_create_worship_tag_table', 41),
(80, '2022_01_06_020918_add_is_admin_in_users_table', 42),
(81, '2022_01_06_022121_drop_administrator_table', 43),
(82, '2022_06_11_043612_add_price_column_to_tour_table', 44),
(83, '2022_06_11_050443_nullabel_accom_id_in_record_accom_table', 45),
(84, '2022_06_11_052022_drop_table_record', 46),
(86, '2022_06_11_052152_create_table_record', 47);

-- --------------------------------------------------------

--
-- Table structure for table `owner_car`
--

CREATE TABLE `owner_car` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_car`
--

INSERT INTO `owner_car` (`id`, `email`, `name`, `picture`, `phone`, `address`, `acc_bank`, `bank`, `holder_name`, `created_at`, `updated_at`) VALUES
(1, 'oyisamfarhan@gmail.com', 'Penyewa Mobil', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 00:17:57', '2021-12-07 00:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `owner_hotel`
--

CREATE TABLE `owner_hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_hotel`
--

INSERT INTO `owner_hotel` (`id`, `email`, `name`, `picture`, `phone`, `address`, `acc_bank`, `bank`, `holder_name`, `created_at`, `updated_at`) VALUES
(3, 'genmaung@gmail.com', 'Pengelola Hotel', NULL, '1234-5678-9098', 'hbjn', '5667', 'tfygh', 'ghvhj', '2021-11-24 22:00:38', '2021-12-07 00:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `owner_souvenir`
--

CREATE TABLE `owner_souvenir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_souvenir`
--

INSERT INTO `owner_souvenir` (`id`, `email`, `name`, `picture`, `phone`, `address`, `acc_bank`, `bank`, `holder_name`, `created_at`, `updated_at`) VALUES
(4, 'farkhan.me2@gmail.com', 'Toko Oleh-oleh', NULL, '1234-5678-9876', 'b', '3456yhj', '23456', 'hgvjhb', '2021-12-07 00:55:24', '2021-12-07 01:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `owner_tour`
--

CREATE TABLE `owner_tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_tour`
--

INSERT INTO `owner_tour` (`id`, `email`, `name`, `picture`, `phone`, `address`, `acc_bank`, `bank`, `holder_name`, `created_at`, `updated_at`) VALUES
(1, 'farkhanjayadi@gmail.com', 'Farkhan', '3c2uU6vQAOz3xOQEiZuo.JPG', '0', 'a', '12', 'asa', '12', '2021-11-18 17:27:17', '2021-12-07 00:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `owner_worship`
--

CREATE TABLE `owner_worship` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_worship`
--

INSERT INTO `owner_worship` (`id`, `email`, `name`, `picture`, `phone`, `address`, `acc_bank`, `bank`, `holder_name`, `created_at`, `updated_at`) VALUES
(1, '20081010060@student.upnjatim.ac.id', 'Pengelola Tempat Ibadah', NULL, '1211-6878-9897', 'kjh', 'kjh', 'hkj', 'kjh', '2021-12-07 01:34:54', '2021-12-07 22:04:06');

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
('oyisamfarhan@gmail.com', '$2y$10$Pb7SI/44cG1DDpvPqXXyhuOyrHPcoXNvG9596e2IPZUzb0UHvT.G2', '2021-07-13 23:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `place_tag`
--

CREATE TABLE `place_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `place_tag`
--

INSERT INTO `place_tag` (`id`, `place_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(32, 36, 12, '2021-09-16 21:06:55', '2021-09-16 21:06:55'),
(38, 41, 12, '2022-06-10 21:32:16', '2022-06-10 21:32:16'),
(39, 42, 13, '2022-06-10 21:44:23', '2022-06-10 21:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `backpacker_id` int(11) NOT NULL,
  `arrival` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `backpacker_id`, `arrival`, `check_in`, `check_out`, `created_at`, `updated_at`) VALUES
(1, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:05:26', '2022-06-10 23:05:26'),
(2, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:07:14', '2022-06-10 23:07:14'),
(3, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:07:40', '2022-06-10 23:07:40'),
(4, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:11:56', '2022-06-10 23:11:56'),
(5, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:14:39', '2022-06-10 23:14:39'),
(6, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:17:42', '2022-06-10 23:17:42'),
(7, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:17:48', '2022-06-10 23:17:48'),
(8, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:22:52', '2022-06-10 23:22:52'),
(9, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:25:25', '2022-06-10 23:25:25'),
(10, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:25:30', '2022-06-10 23:25:30'),
(11, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:25:35', '2022-06-10 23:25:35'),
(12, 1, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:26:30', '2022-06-10 23:26:30'),
(13, 2, 'hkj', '2022-06-11 00:00:00', '2022-06-15 00:00:00', '2022-06-10 23:33:21', '2022-06-10 23:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `record_accom`
--

CREATE TABLE `record_accom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `accom_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `record_accom`
--

INSERT INTO `record_accom` (`id`, `record_id`, `accom_id`, `created_at`, `updated_at`) VALUES
(1, 12, 5, '2022-06-10 23:26:30', '2022-06-10 23:26:30'),
(2, 13, 5, '2022-06-10 23:33:21', '2022-06-10 23:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `record_hotel`
--

CREATE TABLE `record_hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `record_hotel`
--

INSERT INTO `record_hotel` (`id`, `record_id`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, 9, 3, '2022-06-10 23:25:25', '2022-06-10 23:25:25'),
(2, 12, 3, '2022-06-10 23:26:30', '2022-06-10 23:26:30'),
(3, 13, 3, '2022-06-10 23:33:21', '2022-06-10 23:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `record_place`
--

CREATE TABLE `record_place` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `record_place`
--

INSERT INTO `record_place` (`id`, `record_id`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2022-06-10 23:22:52', '2022-06-10 23:22:52'),
(2, 8, 2, '2022-06-10 23:22:52', '2022-06-10 23:22:52'),
(3, 9, 1, '2022-06-10 23:25:25', '2022-06-10 23:25:25'),
(4, 9, 2, '2022-06-10 23:25:25', '2022-06-10 23:25:25'),
(5, 10, 1, '2022-06-10 23:25:30', '2022-06-10 23:25:30'),
(6, 10, 2, '2022-06-10 23:25:30', '2022-06-10 23:25:30'),
(7, 12, 1, '2022-06-10 23:26:30', '2022-06-10 23:26:30'),
(8, 12, 2, '2022-06-10 23:26:30', '2022-06-10 23:26:30'),
(9, 13, 1, '2022-06-10 23:33:21', '2022-06-10 23:33:21'),
(10, 13, 2, '2022-06-10 23:33:21', '2022-06-10 23:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `rental_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `souvenirs`
--

CREATE TABLE `souvenirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `souvenir_tag`
--

CREATE TABLE `souvenir_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `souvenir_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'pantai', '2021-09-16 00:00:19', '2021-09-16 00:00:19'),
(12, 'pura', '2021-09-16 00:00:25', '2021-09-16 00:00:25'),
(13, 'gunung', '2021-09-16 00:00:30', '2021-09-16 00:00:30'),
(14, 'laut', '2021-09-16 00:00:38', '2021-09-16 00:00:38'),
(15, 'danau', '2021-10-12 23:07:25', '2021-10-12 23:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `verified` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `slug`, `thumbnail`, `desc`, `address`, `latitude`, `longtitude`, `price`, `verified`, `created_at`, `updated_at`, `user_id`) VALUES
(36, 'Pura Tanah Lot', 'pura-tanah-lot', 'nABX5V478OvlabzNx0Iv.jpg', '<p>Tanah Lot salah satu pura penting bagi umat Hindu Bali dan lokasi pura terletak di atas batu besar yang berada di lepas pantai. Pura Tanah Lot merupakan ikon pariwisata pulau Bali. Selain itu salah satu obyek wisata terkenal di pulau Bali yang wajib dikunjungi. Karena saking terkenalnya tempat wisata di Bali ini, maka hampir setiap hari, objek wisata ini selalu ramai dengan kunjungan wisatawan.</p>\n<p>Aktivitas wisatawan yang saat berada di kawasan Pura, sebagian besar akan jalan-jalan, foto-foto. Beberapa wisatawan ada yang duduk santai, sambil menikmati jagung rebus sambil&nbsp;menunggu&nbsp;keindahan pemandangan sunset Tanah Lot.</p>', 'bali, bali', 'a', '-10.11', 0, NULL, '2021-09-14 02:04:25', '2021-10-10 22:56:19', 13),
(37, 'The Trans Resort Bali', 'the-trans-resort-bali', '1qMdv59otQb7pFnavjeY.jpg', '<p>Deskripsi The Trans Resort Bali</p>', 'Jl. Sunset Rd., Kerobokan Kelod 80361 Indonesia', '-10.10', '-10.11', 0, 'true', '2021-09-15 13:59:48', '2021-09-26 01:35:53', 13),
(38, 'Masjid Al Hikmah', 'masjid-al-hikmah', 'dftQTPFy0oSo4PjhbFNl.jpg', '<p>Deskripsi Majid Al Hikmah</p>', 'Jalan Soka Nomor 18, Kertalangu, Denpasar Timur, Bali', '-10.10', '-10.11', 0, NULL, '2021-09-15 14:12:23', '2021-09-15 14:12:23', 13),
(41, 'han', 'han', 'IBUjCrXW20gVZ5GLfKrt.png', '<p>alal</p>', 'alam', '10', '10', 0, NULL, '2022-06-10 21:32:16', '2022-06-10 21:32:16', 1),
(42, 'coba', 'coba', 'YKqe368hrqEkWl3jy0FG.png', '<p>aaa</p>', 'han', '10', '10', 100000, NULL, '2022-06-10 21:44:23', '2022-06-10 21:44:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('tour','hotel','worship','souvenir','car') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Farkhan', 'farkhanjayadi@gmail.com', '2021-11-18 17:28:10', NULL, '$2y$10$Z4ixmXs24DOobZvkTOKr2uthvEwW0kqZCNAPLBXFnGDDx9roYdG9i', 'rhdUCvAPqzQCkR39h9mzOQzS3HsLOMyNBFUM3wneYlLiWXtqd2kMsYNRQCm7', 'tour', '2021-11-18 17:27:13', '2021-11-21 20:19:15'),
(5, 'Pengelola Hotel', 'genmaung@gmail.com', '2021-11-24 22:00:51', NULL, '$2y$10$hQEgfyhtThcYQWmUQZVLQ.zon3SlMmn98JG0CFlWizpW5Y8kD8kW6', 'LjMu7vDsk87xIKQ6fqBBMjGywBaHQ2BaGpXAQMLCN0QRhQijGKCsH3ug0nkA', 'hotel', '2021-11-24 22:00:35', '2021-12-07 00:04:05'),
(6, 'Penyewa Mobil', 'oyisamfarhan@gmail.com', '2021-12-07 00:20:01', NULL, '$2y$10$aVQDoPYA.JSQtXZcxoburOTMk7wzLol397HQtwnSseSUg9NUGPNIW', 'GW8TfftNL5hcTI1QeH8yRdlYPAHtXKhnaJYiTF9zwJTCPB7a7J7HShvIjsow', 'car', '2021-12-07 00:17:53', '2021-12-07 00:20:01'),
(10, 'Toko Oleh-oleh', 'farkhan.me2@gmail.com', '2021-12-07 00:55:35', NULL, '$2y$10$/F4/6XaEg/IOA/6yX3yepulR9lmM09izdNNxe.jCQbkKbmoaCvEsq', 'xmDmX4IlQadEcmB65ATkQ7vnAroM4rCuDoteqPZTCcUtO0TGdbWDqdJxdxRU', 'souvenir', '2021-12-07 00:55:21', '2021-12-07 01:26:55'),
(11, 'Pengelola Tempat Ibadah', '20081010060@student.upnjatim.ac.id', '2021-12-07 01:39:56', NULL, '$2y$10$LFi9ipUHTAzKtjhLegkQY.19wCOGjzrtO1YCLt8ulx5ZNYWv0ncmi', 'OkkzwIiKiQjazacWiDPjuLhKXqYVnW7xjMu7s7WVoMAtN66DENXnZfgJR0xj', 'worship', '2021-12-07 01:34:51', '2021-12-07 22:04:32'),
(12, 'demo', 'demo@gmail.com', '2021-11-18 17:28:10', 1, '$2y$10$p/wBNktxAhL.uimIhiBGeeLfejowTVyFclyUwr1tOxxhRvSoBToHW', 'TPShF9mmrVBc3WZbPGotVt1Ftpc0fLxdYmJZOzcnvmTpDhhaGhZK5IT5XjNy', 'tour', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `worships`
--

CREATE TABLE `worships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worship_tag`
--

CREATE TABLE `worship_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worship_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profiles`
--
ALTER TABLE `admin_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_user_id_foreign` (`user_id`);

--
-- Indexes for table `car_facility`
--
ALTER TABLE `car_facility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_facility_car_id_foreign` (`car_id`),
  ADD KEY `car_facility_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_user_id_foreign` (`user_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeries_place_id_foreign` (`place_id`),
  ADD KEY `galleries_car_id_index` (`car_id`),
  ADD KEY `galleries_hotel_id_index` (`hotel_id`),
  ADD KEY `galleries_worship_id_index` (`worship_id`),
  ADD KEY `galleries_souvenir_id_index` (`souvenir_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_user_id_foreign` (`user_id`);

--
-- Indexes for table `hotel_tag`
--
ALTER TABLE `hotel_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_tag_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_place_id_foreign` (`place_id`),
  ADD KEY `messages_car_id_index` (`car_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_car`
--
ALTER TABLE `owner_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_car_email_foreign` (`email`);

--
-- Indexes for table `owner_hotel`
--
ALTER TABLE `owner_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_hotel_email_foreign` (`email`);

--
-- Indexes for table `owner_souvenir`
--
ALTER TABLE `owner_souvenir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_souvenir_email_foreign` (`email`);

--
-- Indexes for table `owner_tour`
--
ALTER TABLE `owner_tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_tour_email_foreign` (`email`);

--
-- Indexes for table `owner_worship`
--
ALTER TABLE `owner_worship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_worship_email_foreign` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `place_tag`
--
ALTER TABLE `place_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_tags_place_id_foreign` (`place_id`),
  ADD KEY `place_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_accom`
--
ALTER TABLE `record_accom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `record_accom_record_id_foreign` (`record_id`);

--
-- Indexes for table `record_hotel`
--
ALTER TABLE `record_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `record_hotel_record_id_foreign` (`record_id`);

--
-- Indexes for table `record_place`
--
ALTER TABLE `record_place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `record_place_record_id_foreign` (`record_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rents_car_id_foreign` (`car_id`),
  ADD KEY `rents_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `souvenirs`
--
ALTER TABLE `souvenirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `souvenirs_user_id_foreign` (`user_id`);

--
-- Indexes for table `souvenir_tag`
--
ALTER TABLE `souvenir_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `souvenir_tag_souvenir_id_foreign` (`souvenir_id`),
  ADD KEY `souvenir_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `worships`
--
ALTER TABLE `worships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worships_user_id_foreign` (`user_id`);

--
-- Indexes for table `worship_tag`
--
ALTER TABLE `worship_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worship_tag_worship_id_foreign` (`worship_id`),
  ADD KEY `worship_tag_tag_id_foreign` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profiles`
--
ALTER TABLE `admin_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_facility`
--
ALTER TABLE `car_facility`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_tag`
--
ALTER TABLE `hotel_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `owner_car`
--
ALTER TABLE `owner_car`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner_hotel`
--
ALTER TABLE `owner_hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owner_souvenir`
--
ALTER TABLE `owner_souvenir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `owner_tour`
--
ALTER TABLE `owner_tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner_worship`
--
ALTER TABLE `owner_worship`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `place_tag`
--
ALTER TABLE `place_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `record_accom`
--
ALTER TABLE `record_accom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `record_hotel`
--
ALTER TABLE `record_hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `record_place`
--
ALTER TABLE `record_place`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `souvenirs`
--
ALTER TABLE `souvenirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `souvenir_tag`
--
ALTER TABLE `souvenir_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `worships`
--
ALTER TABLE `worships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `worship_tag`
--
ALTER TABLE `worship_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_facility`
--
ALTER TABLE `car_facility`
  ADD CONSTRAINT `car_facility_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_facility_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galeries_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `galleries_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `galleries_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `galleries_souvenir_id_foreign` FOREIGN KEY (`souvenir_id`) REFERENCES `souvenirs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `galleries_worship_id_foreign` FOREIGN KEY (`worship_id`) REFERENCES `worships` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_tag`
--
ALTER TABLE `hotel_tag`
  ADD CONSTRAINT `hotel_tag_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `owner_car`
--
ALTER TABLE `owner_car`
  ADD CONSTRAINT `owner_car_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `owner_hotel`
--
ALTER TABLE `owner_hotel`
  ADD CONSTRAINT `owner_hotel_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `owner_souvenir`
--
ALTER TABLE `owner_souvenir`
  ADD CONSTRAINT `owner_souvenir_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `owner_tour`
--
ALTER TABLE `owner_tour`
  ADD CONSTRAINT `owner_tour_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `owner_worship`
--
ALTER TABLE `owner_worship`
  ADD CONSTRAINT `owner_worship_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `place_tag`
--
ALTER TABLE `place_tag`
  ADD CONSTRAINT `place_tags_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `place_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `record_accom`
--
ALTER TABLE `record_accom`
  ADD CONSTRAINT `record_accom_record_id_foreign` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `record_hotel`
--
ALTER TABLE `record_hotel`
  ADD CONSTRAINT `record_hotel_record_id_foreign` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `record_place`
--
ALTER TABLE `record_place`
  ADD CONSTRAINT `record_place_record_id_foreign` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rents_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `souvenirs`
--
ALTER TABLE `souvenirs`
  ADD CONSTRAINT `souvenirs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `souvenir_tag`
--
ALTER TABLE `souvenir_tag`
  ADD CONSTRAINT `souvenir_tag_souvenir_id_foreign` FOREIGN KEY (`souvenir_id`) REFERENCES `souvenirs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `souvenir_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `places_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `worships`
--
ALTER TABLE `worships`
  ADD CONSTRAINT `worships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `worship_tag`
--
ALTER TABLE `worship_tag`
  ADD CONSTRAINT `worship_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `worship_tag_worship_id_foreign` FOREIGN KEY (`worship_id`) REFERENCES `worships` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
