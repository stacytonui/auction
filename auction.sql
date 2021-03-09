-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 10:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `starting_price` decimal(8,2) UNSIGNED DEFAULT NULL,
  `current_price` decimal(8,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `name`, `image`, `category_id`, `date`, `location`, `created_at`, `updated_at`, `user_id`, `status`, `starting_price`, `current_price`) VALUES
(1, 'Yamaha Sports Bike', 'uploads/RZ52nyMvttQmiOSFZsBV9SrFKFtyLwJWCDORC5Q1.jpeg', 3, '2020-06-20', 'Nakuru', '2020-06-11 04:05:53', '2020-06-11 07:07:01', 2, 0, '150000.00', '550000.00'),
(4, 'Land Cruiser Prado', 'uploads/lZyOW3pvF5HoFTTPFOnyEHnq3oHhe3duvHW9ydtW.jpeg', 3, '2020-07-11', 'Nairobi', '2020-06-11 04:30:35', '2020-06-11 07:12:00', 2, 0, '900000.00', '950000.00');

-- --------------------------------------------------------

--
-- Table structure for table `biddings`
--

CREATE TABLE `biddings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `auction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biddings`
--

INSERT INTO `biddings` (`id`, `amount`, `auction_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '70000.00', 1, 2, '2020-06-11 04:14:46', '2020-06-11 04:14:46'),
(2, '900000.00', 4, 2, '2020-06-11 04:32:09', '2020-06-11 04:32:09'),
(3, '550000.00', 1, 2, '2020-06-11 07:07:00', '2020-06-11 07:07:00'),
(4, '950000.00', 4, 2, '2020-06-11 07:11:59', '2020-06-11 07:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2020-05-28 12:23:02', '2020-05-28 12:23:02'),
(2, 'Clothes', '2020-05-28 12:23:02', '2020-05-28 12:23:02'),
(3, 'Cars', '2020-05-28 12:23:02', '2020-05-28 12:23:02');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_27_140726_add_columns_to_users_table', 2),
(5, '2020_05_28_051925_create_categories_table', 3),
(6, '2020_05_28_061210_create_auctions_table', 3),
(7, '2020_05_28_180007_create_auctions_table', 4),
(8, '2020_05_28_184802_add_user_id_column_to_users_table', 5),
(9, '2020_05_30_172816_add_column_to_auctions_table', 6),
(10, '2020_06_06_144256_create_bids_table', 7),
(11, '2020_06_06_145749_add_status_column_to_users_table', 8),
(12, '2020_06_07_135446_create_bidders_table', 9),
(13, '2020_06_07_145432_create_biddings_table', 10),
(14, '2020_06_07_145536_add_columns_to_biddings_table', 11),
(15, '2020_06_09_081547_add_column_to_biddings_table', 12),
(16, '2020_06_09_130930_add_two_columns_to_auctions_table', 13),
(17, '2020_06_09_142107_create_biddings_table', 14);

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
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `location`, `status`) VALUES
(1, 'Min Yoongi', 'min@gmail.com', NULL, '$2y$10$cYWHrRU877rHHt3GUysZqu2rGKQKmzyFx3irFXCPGL1KGsKg88h2y', NULL, '2020-05-27 11:11:40', '2020-05-27 11:11:40', '0706960287', 'Nakuru', 0),
(2, 'Stacy Anne', 'stacyanne01@gmail.com', NULL, '$2y$10$fe0yuTrn8h/PdbToLYRLFeXdt6lpe3G9D6Act93u0XMPz1QqMa.gy', NULL, '2020-05-30 11:01:13', '2020-05-30 22:59:10', '0712345678', 'Nairobi', 0),
(3, 'Stacy Anne', 'dvsn@gmail.com', NULL, '$2y$10$djCAyZLWzCEOcZ0Rr3vRVuh5na2TsdEG0c.xf8vQYCKQtIp2Lm8L.', 'WEck31CQCzwZRGnsMfJns9RHFqw8TEfvWmWckq8GhBLwqWtpCiX7p0Res314', '2020-06-09 04:52:18', '2020-06-09 04:52:18', '3456789', 'test', 1),
(4, 'test', 'test@gmail.com', NULL, '$2y$10$7PlggzOcE39mK0L9B.34Huk9JqIeIr73y.JOkdq53iO.JDfhZXeZy', NULL, '2020-06-09 04:53:06', '2020-06-09 04:53:06', '3456789', 'test', 0),
(5, 'Bidder', 'bidder@gmail.com', NULL, '$2y$10$p7To4ISselfPu6TJChTK7.KIBL71qK2SrXaILjSJgNUq1FVNoSVXq', NULL, '2020-06-09 06:56:07', '2020-06-09 06:56:07', '23456789', 'test', 1),
(6, 'Bidder', 'yoongi@gmail.com', NULL, '$2y$10$KO0kDuqMWQEvDmaSC9cZz.7szgmiwWP3lNYedKXdmvMMaAQRFoHmC', NULL, '2020-06-09 06:59:43', '2020-06-09 06:59:43', '3456789', 'test', 1),
(7, 'Min Yoongi', 'jeon@gmail.com', NULL, '$2y$10$kf14FKrvzOH6gnf/dBJqxeyhggsdK4wujODOIB32pczRZluy9Gfw.', NULL, '2020-06-09 07:05:09', '2020-06-09 07:05:09', '234567', 'werty', 1),
(8, 'Stacy Anne', 'mino@gmail.com', NULL, '$2y$10$n0l4P.F8FkrTbS0e8W1/buHPfaoXGgI1XOPi5SWmBfXCYNamlljya', NULL, '2020-06-09 07:20:38', '2020-06-09 07:20:38', '34567', 'fghs', 1),
(9, 'Stacy Anne', 'taylor@gmail.com', NULL, '$2y$10$3t1YODqsmWQM5G8RvXa3ieMCsGJQHZE/YYMKMj5MjD0DXm.Ja4Im6', NULL, '2020-06-09 08:31:32', '2020-06-09 08:31:32', '567890', 'tets', 1),
(10, 'Stacy Anne', 'halll@gmail.com', NULL, '$2y$10$gNKsZwIg9xQs8pcEY.894etwrRpegepAG.cLCKiFB.tpBhBhiOy5S', NULL, '2020-06-09 08:47:21', '2020-06-09 08:47:21', '45678', 'Loc', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auctions_category_id_foreign` (`category_id`),
  ADD KEY `auctions_user_id_foreign` (`user_id`);

--
-- Indexes for table `biddings`
--
ALTER TABLE `biddings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biddings_auction_id_foreign` (`auction_id`),
  ADD KEY `biddings_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biddings`
--
ALTER TABLE `biddings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auctions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `biddings`
--
ALTER TABLE `biddings`
  ADD CONSTRAINT `biddings_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biddings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
