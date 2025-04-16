-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 02:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb-mubarkeya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_super` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'mfadhlan1721@gmail.com', '$2y$12$ov7Cp5uBq35JHLJslXhawedFiQSPnTMIfNhsVkyw6B4Z21Hox9mJG', '1', '2025-04-01 05:23:53', '2025-04-01 05:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_users`
--

CREATE TABLE `biodata_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(16) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nama_bapak` varchar(255) NOT NULL,
  `nomor_bapak` varchar(12) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nomor_ibu` varchar(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata_users`
--

INSERT INTO `biodata_users` (`id`, `users_id`, `nik`, `agama`, `no_hp`, `alamat`, `asal_sekolah`, `nama_bapak`, `nomor_bapak`, `nama_ibu`, `nomor_ibu`, `created_at`, `updated_at`) VALUES
(1, 1, '3329091003780070', 'ISLAM', '44444', 'ssssss', 'smpn 1', 'ssss', '085225', 'gggg', '085330', '2025-04-01 05:38:45', '2025-04-01 05:38:45'),
(2, 2, '111111', 'ISLAM', '11111111', 'aaaaa', 'sd12', 'aaaa', '123', 'cccc', '321', '2025-04-02 03:16:04', '2025-04-02 03:16:04'),
(3, 3, '24042513', 'ISLAM', '082365205018', 'desa lueng ie', 'smpn 18 banda aceh', 'zaiwan', '082343', 'yusmiati', '082376', '2025-04-04 05:56:54', '2025-04-04 05:56:54'),
(4, 4, '1106111710001', 'ISLAM', '44444', 'vdrbvs', 'smpn 1', 'ssss', '1321', 'gggg', '13131', '2025-04-06 01:41:26', '2025-04-06 01:41:26'),
(5, 5, '3329091003780070', 'ISLAM', '44444', 'mliancabuw', 'smpn 1', 'ssss', '0833', 'gggg', '0844', '2025-04-11 06:31:19', '2025-04-11 06:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ppdb_online_smkn_1_al_mubarkeya_cache_aaaa@gmail.com|::1', 'i:3;', 1743757814),
('ppdb_online_smkn_1_al_mubarkeya_cache_aaaa@gmail.com|::1:timer', 'i:1743757814;', 1743757814);

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
-- Table structure for table `formulir_users`
--

CREATE TABLE `formulir_users` (
  `id` varchar(15) NOT NULL,
  `nomor` smallint(6) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `biodata_users_id` int(10) UNSIGNED NOT NULL,
  `jurusan1` int(10) UNSIGNED NOT NULL,
  `status_jurusan1` varchar(255) DEFAULT NULL,
  `jurusan2` int(10) UNSIGNED NOT NULL,
  `status_jurusan2` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formulir_users`
--

INSERT INTO `formulir_users` (`id`, `nomor`, `users_id`, `biodata_users_id`, `jurusan1`, `status_jurusan1`, `jurusan2`, `status_jurusan2`, `nilai`, `created_at`, `updated_at`) VALUES
('PPDB20250002', 2, 1, 1, 1, 'L', 2, NULL, 500, '2025-04-02 12:53:00', '2025-04-11 06:40:17'),
('PPDB20250003', 3, 2, 2, 6, 'T', 7, 'L', 470, '2025-04-04 02:12:45', '2025-04-11 06:45:07'),
('PPDB20250004', 4, 3, 3, 2, 'A', 5, 'A', 371, '2025-04-04 05:57:27', '2025-04-11 06:45:38'),
('PPDB20250005', 5, 4, 4, 2, 'L', 1, NULL, 480, '2025-04-06 01:41:57', '2025-04-11 06:42:38'),
('PPDB20250006', 6, 5, 5, 2, 'A', 3, 'A', 300, '2025-04-11 06:31:59', '2025-04-11 06:45:57');

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
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `total` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `name`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Jaringan Komputer dan Telekomunikasi', 1, '2025-04-01 05:29:38', '2025-04-01 05:29:38'),
(2, 'Pengembangan Perangkat Lunak dan Gim', 1, '2025-04-01 05:29:38', '2025-04-01 05:29:38'),
(3, 'Akuntansi dan Keuangan Lembaga', 1, '2025-04-01 05:29:38', '2025-04-04 06:24:46'),
(4, 'Desain Pemodelan dan Informasi Bangunan', 1, '2025-04-01 05:29:38', '2025-04-01 05:29:38'),
(5, 'Teknik Otomotif', 1, '2025-04-01 05:29:38', '2025-04-01 05:29:38'),
(6, 'Kuliner', 1, '2025-04-01 05:29:38', '2025-04-01 05:29:38'),
(7, 'Busana', 25, '2025-04-01 05:29:38', '2025-04-04 08:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `lulus_users`
--

CREATE TABLE `lulus_users` (
  `id` varchar(15) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `biodata_users_id` int(10) UNSIGNED NOT NULL,
  `jurusans_id` int(10) UNSIGNED NOT NULL,
  `is_daftar_ulang` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lulus_users`
--

INSERT INTO `lulus_users` (`id`, `users_id`, `biodata_users_id`, `jurusans_id`, `is_daftar_ulang`, `created_at`, `updated_at`) VALUES
('PPDB20250002', 1, 1, 1, NULL, '2025-04-11 06:40:17', '2025-04-11 06:40:17'),
('PPDB20250003', 2, 2, 7, NULL, '2025-04-11 06:45:07', '2025-04-11 06:45:07'),
('PPDB20250004', 3, 3, 7, NULL, '2025-04-11 06:45:38', '2025-04-11 06:45:38'),
('PPDB20250005', 4, 4, 2, NULL, '2025-04-11 06:42:38', '2025-04-11 06:42:38'),
('PPDB20250006', 5, 5, 7, NULL, '2025-04-11 06:45:57', '2025-04-11 06:45:57');

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
(21, '0001_01_01_000000_create_users_table', 1),
(22, '0001_01_01_000001_create_cache_table', 1),
(23, '0001_01_01_000002_create_jobs_table', 1),
(24, '2025_03_21_153139_create_admins_table', 1),
(25, '2025_03_24_185357_create_jurusans_table', 1),
(26, '2025_03_24_185644_create_biodata_users_table', 1),
(27, '2025_03_24_190244_create_formulir_users_table', 1),
(28, '2025_03_24_190620_create_lulus_users_table', 1);

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
('cj4eYobAAy14lQ4in5Evy6NBgv9QyGEgD4jN8wNg', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFFYUlJVVnpkZm5UbVJNdnd2alFWYVJZbWJjSzRkd2NVNk5VMnc0NyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3QvcHBkYi1tdWJhcmtleWEvcHVibGljL2FkbWluL3NlbGVrc2kiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1744379203);

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
  `nisn` varchar(10) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `nisn`, `jk`, `tmp_lahir`, `tgl_lahir`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'M. Fadhlan', 'mfadhlan1721@gmail.com', NULL, '$2y$12$/qOqkU2HhraxE/KzfITzO.uFxz/SvakbpsyfkTAu8aPaDzPDIrCBW', '0014', 'LAKI - LAKI', 'Aceh Besar', '2010-12-17', 'wDwzMUgZb8wgjE23LxKrDJXG6RTzMd3p9ylxcZWAz25M7RklG5KhRUCS3YDi2ye4wQsUMplskozmPt2OFgitYp8cbmO65CsTvsZ1.png', NULL, '2025-04-01 05:31:41', '2025-04-01 05:37:57'),
(2, 'adadaa', 'aaaa12@gmail.com', NULL, '$2y$12$prxct8A2O8eUevXKPlEo2OjiNKoSQProEB8hs/pgDyhUizcb7uNRm', '12122334', 'LAKI - LAKI', 'banda', '2002-12-16', 'vcZZmePOMoK5hdThDJ0w7Ij8TKwGJQa2MfirxWqg5HKODr5JQLzSGSI8ESqyXvZR5lgnkXsEAnGxNTBR970iWqmSZmIAEpgznm3k.jpeg', NULL, '2025-04-02 03:13:05', '2025-04-02 03:15:14'),
(3, 'muslem', '200705039@student.ar-raniry.ac.id', NULL, '$2y$12$yIHSHoy8p1vUfEormTHAjudNT300rOWvg/41XRz7wv59Z5hych5Mq', '0970969596', 'LAKI - LAKI', 'Banda Aceh', '2002-05-14', 'tLjf33tqtgawAqPfgUN4yKGJiPBbBS1ZlgwBRrLvxpt9EOf5rp2nGYqXVGCari4eCUPyvcYsAYqqXaq1RmZmPmdDVuscowH65rzH.jpg', NULL, '2025-04-04 05:51:41', '2025-04-04 05:52:31'),
(4, 'simax', 'fadhlanmuhammad1733@gmail.com', NULL, '$2y$12$dvkL67wz9zR9klbpevjis.wF.7dXkWTG9IFGoxbr0NWFeTqKulpiK', '0014', 'LAKI - LAKI', 'Aceh Besar', '2025-04-06', '1AwnotPcYwreucgmgcu110hqfdZzGvNPzIE1mjgYdr57LYSZYMGMAkjfngCzubiuSsObLwFotF2HUrrBY8kmNBE84xAhfk6KwhxG.png', NULL, '2025-04-06 01:40:08', '2025-04-06 01:40:58'),
(5, 'max', '20005068@student.ar-raniry.ac.id', NULL, '$2y$12$soROHiwbjLWAwzeOx4iPV.9j1T.QXb9sh9GJE7T66p2vXxpxRwqcu', '0014', 'LAKI - LAKI', 'Aceh Besar', '2025-04-10', 'Ix0FODVTn3VAdaRTF7cH0uyQJ1jUVokXtEiYozhXzrk1LcCVCj8m6PRj90ppyY3qQuAVPVCivFjyOVz00wMrJa7tOSLgpxOIIrvs.png', NULL, '2025-04-11 06:30:03', '2025-04-11 06:30:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `biodata_users`
--
ALTER TABLE `biodata_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `formulir_users`
--
ALTER TABLE `formulir_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lulus_users`
--
ALTER TABLE `lulus_users`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodata_users`
--
ALTER TABLE `biodata_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
