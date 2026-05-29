-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 06:37 AM
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
-- Database: `omahart-floristt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Souvenir Mahar', 'souvenir-mahar.jpg', '2025-11-23 09:03:45', '2025-11-23 09:04:41'),
(2, 'Buket', 'buket.png', '2025-11-23 09:31:21', '2025-11-23 09:31:21'),
(3, 'Souvenir Seserahan', '1763916234.png', '2025-11-23 09:43:54', '2025-11-23 09:43:54'),
(4, 'Mug souvenir', '1763916293.jpg', '2025-11-23 09:44:53', '2025-11-23 09:44:53'),
(5, 'Undangan', '1763916340.jpg', '2025-11-23 09:45:40', '2025-11-23 09:45:40'),
(6, 'Dekorasi bunga', '1763916384.jpg', '2025-11-23 09:46:24', '2025-11-23 09:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_23_113341_create_categories_table', 1),
(5, '2025_11_23_113722_create_products_table', 1),
(6, '2025_11_24_013502_change_start_price_to_string_in_products_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_price` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `description`, `start_price`, `created_at`, `updated_at`) VALUES
(1, 2, 'Buket Wisuda', '1763948744.jpg', 'Buket yang cocok untuk acara wisuda, bisa custom sesuai keinginan, tertarik untuk membelinya langsung chat via whatsapp', 30000, '2025-11-23 18:45:44', '2025-12-05 23:01:46'),
(3, 3, 'Seserahan', '1764396181.jpg', 'Souvenir sesrahan harga mulai dari 55.000, info lebih lanjut bisa chat via whatsapp', 55000, '2025-11-28 23:03:01', '2025-12-05 22:53:05'),
(4, 3, 'Seserahan', '1764396207.jpg', 'Souvenir sesrahan harga mulai dari 55.000, info lebih lanjut bisa chat via whatsapp', 55000, '2025-11-28 23:03:27', '2025-12-05 22:53:17'),
(5, 3, 'Seserahan', '1764396229.jpg', 'Souvenir sesrahan harga mulai dari 55.000, info lebih lanjut bisa chat via whatsapp', 55000, '2025-11-28 23:03:49', '2025-12-05 22:53:34'),
(6, 3, 'Seserahan', '1764396258.jpg', 'Souvenir sesrahan harga mulai dari 55.000, info lebih lanjut bisa chat via whatsapp', 55000, '2025-11-28 23:04:19', '2025-12-05 22:55:01'),
(7, 3, 'Seserahan', '1764396280.jpg', 'Souvenir sesrahan harga mulai dari 55.000, info lebih lanjut bisa chat via whatsapp', 55000, '2025-11-28 23:04:40', '2025-12-05 22:53:45'),
(8, 2, 'Buket Bunga', '1764397483.jpg', 'Buket bunga cocok untuk hadiah buat pasangan, hari guru dll, info lebih lanjut bisa chat via whatsapp', 15000, '2025-11-28 23:24:43', '2025-12-05 23:00:15'),
(9, 4, 'Mug souvenir', '1764397814.jpg', 'Rp 20.000/pcs, minimal order 30 pcs dan bisa costum sesuai keinginan', 20000, '2025-11-28 23:30:14', '2025-12-05 05:35:00'),
(12, 6, 'Dekorasi bunga Harmoni Mawar', '1764936747.jpg', 'Cocok untuk hiasan meja atau rak, Bisa custum sesuai keinginan, langsung saja chat via whatsapp', 50000, '2025-12-05 05:12:27', '2025-12-05 05:12:27'),
(13, 6, 'Dekorasi bunga Lily pink', '1764937396.jpg', 'Lily pink dengan pot kayu cocok buat meja, info lebih lanjut langsung chat via whatsapp', 50000, '2025-12-05 05:23:16', '2025-12-05 05:23:16'),
(14, 4, 'Mug', '1764938087.jpg', 'Rp 20.000/pcs, minimal order 30 pcs dan bisa costum sesuai keinginan', 20000, '2025-12-05 05:34:47', '2025-12-05 05:34:47'),
(15, 5, 'Undangan sederhana', '1764938770.jpg', 'Undangan sederhana cantik dengan harga yang bersahabat, 1.500/pcs, free plastik, info lebih lanjut bisa chat via whatsapp', 1500, '2025-12-05 05:46:10', '2025-12-05 05:46:10'),
(16, 5, 'Undangan cantik', '1764988683.jpg', 'Undangan cantik dengan harga yang bersahabat, Rp 1.500/pcs, free plastik, info lebih lanjut bisa chat via whatsapp', 1500, '2025-12-05 19:38:03', '2025-12-06 00:20:53'),
(17, 5, 'Undangan cantik tema bunga', '1764988990.jpg', 'Undangan tema bunga cantik dengan bahan art paper, harga yang bersahabat, 1.500/pcs, minimal order 200pcs, free plastik, info lebih lanjut bisa chat via whatsapp', 1500, '2025-12-05 19:41:18', '2025-12-05 19:43:10'),
(18, 1, 'Souvenir Mahar sakinah crations', '1764989546.jpg', 'Souvenir mahar, harga mulai dari Rp 255.000, bisa custom sesuai keinginan anda, info lebih lanjut bisa chat via whatsapp', 255000, '2025-12-05 19:52:26', '2025-12-05 19:52:26'),
(20, 1, 'Souvenir Mahar Bingkai Cinta Gallery', '1765001732.jpg', 'Souvenir mahar, harga mulai dari Rp 255.000, bisa custom sesuai keinginan anda, info lebih lanjut bisa chat via whatsapp', 255000, '2025-12-05 23:15:18', '2025-12-05 23:15:32'),
(21, 1, 'Souvenir Mahar Kreasi', '1765001960.jpg', 'Souvenir mahar, harga mulai dari Rp 255.000, bisa custom sesuai keinginan anda, info lebih lanjut bisa chat via whatsapp', 255000, '2025-12-05 23:19:20', '2025-12-05 23:19:20'),
(22, 1, 'Souvenir Mahar Bingkai Mawar', '1765002096.jpg', 'Souvenir mahar, harga mulai dari Rp 255.000, bisa custom sesuai keinginan anda, info lebih lanjut bisa chat via whatsapp', 255000, '2025-12-05 23:21:36', '2025-12-05 23:21:36'),
(23, 2, 'Buket uang+Bunga', '1765004559.jpg', 'Buket bunga cocok buat hadiah, info lebih lanjut bisa chat via whatsapp', 25000, '2025-12-06 00:02:39', '2025-12-06 00:02:39'),
(24, 2, 'Buket Snack', '1765004674.jpg', 'Buket snack cocok buat hadiah, info lebih lanjut bisa chat via whatsapp', 20000, '2025-12-06 00:04:34', '2025-12-06 00:31:09'),
(25, 4, 'Mug Souvenir', '1765004782.jpg', 'Rp 20.000/pcs, minimal order 30 pcs dan bisa costum sesuai keinginan', 20000, '2025-12-06 00:06:22', '2025-12-06 00:06:22'),
(26, 4, 'Mug', '1765004912.jpg', 'Rp 20.000/pcs, minimal order 30 pcs dan bisa costum sesuai keinginan', 20000, '2025-12-06 00:08:32', '2025-12-06 00:08:32'),
(27, 6, 'Rangkayan Bunga Tosca', '1765005187.jpg', 'Cocok untuk hiasan meja atau rak, Bisa custum sesuai keinginan, langsung saja chat via whatsapp', 50000, '2025-12-06 00:13:07', '2025-12-06 00:13:07'),
(28, 5, 'Undangan amplop hard cover jumbo', '1765005635.jpg', 'Undangan cantik dengan harga yang bersahabat, Rp 2.500/pcs, info lebih lanjut bisa chat via whatsapp', 2500, '2025-12-06 00:20:35', '2025-12-06 00:20:35'),
(29, 2, 'Buket mini', '1765005998.jpg', 'Buket mini, Rp 15.000 3pcs, bisa custom sesuai keinginan anda, info lebih lanjut bisa chat via whatsapp', 15000, '2025-12-06 00:26:38', '2025-12-06 00:26:38'),
(30, 2, 'Buket Uang', '1765006247.jpg', 'Buket Uang cocok untuk hadiah, info lebih lanjut bisa chat via whatsapp', 20000, '2025-12-06 00:30:47', '2025-12-06 00:30:47'),
(31, 2, 'Buket Bunga', '1765006375.jpg', 'Buket bunga cocok untuk hadiah buat pasangan, hari ulang tahun, hari guru dll, info lebih lanjut bisa chat via whatsapp', 25000, '2025-12-06 00:32:55', '2025-12-06 00:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HFA4zaSfviTh1iRpPQr872acxRcCCSDKV68zEwIw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVpydThLbFJYQ2xwVjNzMDZaODRsS1BsamRpUEJqakVIRmhmT2lVWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rYXRlZ29yaS8xIjtzOjU6InJvdXRlIjtzOjEzOiJjYXRlZ29yeS5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765372537),
('VuPjuVrXnegkH8WMIMHIWp32YOmcWadIeqxwxrFG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDJCWU1hQlpqbU9VbTZJZm9Ld21kTmxLa05kemN4b3ZqQm9TRVdtVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMToiYWRtaW4ubG9naW4iO319', 1765431307);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$y7CDQYbTVUEftMyLe514GuWjIMpHucq06xtORG7uNaFehFsUN5Z06', NULL, '2025-11-23 06:39:36', '2025-11-23 08:43:36');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
