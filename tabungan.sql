-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2025 at 11:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menabungs`
--

CREATE TABLE `menabungs` (
  `id` bigint UNSIGNED NOT NULL,
  `tabungan_id` bigint UNSIGNED NOT NULL,
  `nominal` int NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menabungs`
--

INSERT INTO `menabungs` (`id`, `tabungan_id`, `nominal`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, '2025-06-09', '2025-05-31 03:53:14', '2025-05-31 03:53:14'),
(2, 1, 990000, '2025-05-31', '2025-05-31 03:55:07', '2025-05-31 03:55:07'),
(3, 2, 2000000, '2025-05-31', '2025-05-31 04:06:23', '2025-05-31 04:06:23'),
(4, 1, 100000, '2025-05-31', '2025-05-31 04:07:05', '2025-05-31 04:07:05'),
(5, 2, 1000000, '2025-05-31', '2025-05-31 04:08:12', '2025-05-31 04:08:12'),
(6, 2, 10000000, '2025-05-31', '2025-05-31 04:08:33', '2025-05-31 04:08:33'),
(7, 2, 1000000, '2025-06-01', '2025-05-31 16:08:14', '2025-05-31 16:08:14'),
(8, 3, 1000000, '2025-06-01', '2025-05-31 16:08:57', '2025-05-31 16:08:57'),
(14, 3, 100000, '2025-06-01', '2025-05-31 18:57:38', '2025-05-31 18:57:38'),
(15, 3, 200000, '2025-06-01', '2025-05-31 18:58:11', '2025-05-31 18:58:11'),
(16, 5, 1000000, '2025-06-03', '2025-05-31 21:16:34', '2025-05-31 21:16:34'),
(17, 1, 200000, '2025-06-11', '2025-05-31 21:17:31', '2025-05-31 21:17:31'),
(18, 5, 1000000, '2025-06-03', '2025-05-31 21:18:15', '2025-05-31 21:18:15'),
(19, 7, 200000, '2025-06-01', '2025-06-01 03:14:27', '2025-06-01 03:14:27'),
(20, 7, 800000, '2025-06-02', '2025-06-01 03:15:13', '2025-06-01 03:15:13'),
(21, 2, 5000000, '2025-06-11', '2025-06-01 03:16:48', '2025-06-01 03:16:48'),
(22, 9, 100000, '2025-06-02', '2025-06-01 03:49:04', '2025-06-01 03:49:04'),
(23, 9, 900000, '2025-06-03', '2025-06-01 03:50:03', '2025-06-01 03:50:03'),
(24, 5, 1000000, '2025-06-04', '2025-06-01 03:50:44', '2025-06-01 03:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_31_094341_create_tabungans_table', 2),
(5, '2025_05_31_104100_create_menabungs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cQwldpqYudadKRW2GjZx8b9tgFv34OMBu8JJM2nT', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzNGZWFwaEZZeWdiSWoyWEtPaGpiVjRQN3ZnSkhKWEZTNVhWc2FvSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748775427);

-- --------------------------------------------------------

--
-- Table structure for table `tabungans`
--

CREATE TABLE `tabungans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_nominal` int NOT NULL,
  `target_tanggal` date NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabungans`
--

INSERT INTO `tabungans` (`id`, `user_id`, `judul`, `target_nominal`, `target_tanggal`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beli Sepatu Sneakers', 1300000, '2025-06-03', 'tabungan/gXiY6xJ13Zx0nNoGqAEN9R8y7VgJD7e3aNEUOEUs.jpg', 1, '2025-05-31 03:39:21', '2025-05-31 21:17:31'),
(2, 1, 'Playstation 5', 25000000, '2025-06-20', 'tabungan/fHw5ocvwerf79HzoBvZrwLnxLN1kkbCMaoGZ3AV0.jpg', 0, '2025-05-31 04:06:03', '2025-05-31 16:16:19'),
(3, 1, 'Smartwatch', 12000000, '2025-06-18', 'tabungan/ZsxKkoo2bVP91FSXbZqGUQF1xxLruX5tVjE6DNan.jpg', 0, '2025-05-31 16:00:23', '2025-05-31 16:00:23'),
(5, 1, 'Motor', 15000000, '2025-06-25', 'tabungan/ZOXyMB5BbMh9yynSb0V6hX9LZ82CmgiiqS8TCbu2.jpg', 0, '2025-05-31 21:15:40', '2025-05-31 21:16:03'),
(6, 2, 'Beli Sepatu', 1000000, '2025-06-10', 'tabungan/Ovk843qQKJLFP8mN8EkA5xBf3xS1uKsWj4jUDhFF.jpg', 0, '2025-05-31 21:20:13', '2025-05-31 21:20:13'),
(7, 1, 'Sepeda Fixie Warna Putih', 1000000, '2025-06-27', 'tabungan/C6KXNT3n4Qaf53a0JMGLGnuHlZiQYvU3OWwHS5sA.png', 1, '2025-06-01 03:12:59', '2025-06-01 03:15:13'),
(8, 5, 'Playstation 5', 12000000, '2025-06-04', 'tabungan/Qkyds6PWC5dpo6bmxY95nkTp5U1d8W6E7gelnanm.jpg', 0, '2025-06-01 03:20:43', '2025-06-01 03:20:43'),
(9, 1, 'Sepeda Fixie Warna Putih 2', 1000000, '2025-06-15', 'tabungan/hymXYuL1PBfQwyzNTfWgMu9fWnVpUdUEq8v7bG6b.png', 1, '2025-06-01 03:48:00', '2025-06-01 03:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adit', 'adit@gmail.com', NULL, '$2y$12$sisIbE//flJJ.R9jiIywCeMKkUGb.Ym.rXkPu54.Y9tMoSGiBzvtG', NULL, '2025-05-31 02:06:08', '2025-05-31 02:06:08'),
(2, 'aditiansyh', 'aditiansyah@gmail.com', NULL, '$2y$12$jihPenbHodPi02dSc38Mz.SOODoam80.0HF.Ka/HdHmozm8NsUyHm', NULL, '2025-05-31 18:39:05', '2025-05-31 18:39:05'),
(3, 'Muhamad', 'muhamad@gmail.com', NULL, '$2y$12$AKpH42udr9ZCVV9GXvS0b..OY5OaLdqmpQc93DOKlD9cEW.Z7k9fm', NULL, '2025-05-31 18:40:39', '2025-05-31 18:40:39'),
(4, 'Muhamad Aditiansyah', 'Aditiansyah12@gmail.com', NULL, '$2y$12$tjGWj2w9Cq9XXhbsco.K5OpG04dBgVYc7NW5NqyA8zKcltuIp2ZOO', NULL, '2025-06-01 03:18:37', '2025-06-01 03:18:37'),
(5, 'Muhamad Aditiansyah', 'adit25@gmail.com', NULL, '$2y$12$qjo2Ik..ooNrNZG7Ex.7uuPbjRJYwJwZljzylABnPjGAsGUuh.CY2', NULL, '2025-06-01 03:19:43', '2025-06-01 03:19:43'),
(6, 'Wildan', 'wildan@gmail.com', NULL, '$2y$12$pKL48LkbjsIDmZTFGTsKQedo0aV8duUxMDj.K1ag4RAn3P.GIORmm', NULL, '2025-06-01 03:53:03', '2025-06-01 03:53:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menabungs`
--
ALTER TABLE `menabungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menabungs_tabungan_id_foreign` (`tabungan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tabungans`
--
ALTER TABLE `tabungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabungans_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menabungs`
--
ALTER TABLE `menabungs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabungans`
--
ALTER TABLE `tabungans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menabungs`
--
ALTER TABLE `menabungs`
  ADD CONSTRAINT `menabungs_tabungan_id_foreign` FOREIGN KEY (`tabungan_id`) REFERENCES `tabungans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tabungans`
--
ALTER TABLE `tabungans`
  ADD CONSTRAINT `tabungans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
