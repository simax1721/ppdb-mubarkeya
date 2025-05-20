-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 07:44 AM
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
(1, 1, '3329091003780070', 'ISLAM', '683835732486', 'ssssss', 'smpn 1', 'ssss', '085225', 'gggg', '085330', '2025-04-01 05:38:45', '2025-04-01 05:38:45'),
(2, 2, '111111', 'ISLAM', '11111111', 'aaaaa', 'sd12', 'aaaa', '123', 'cccc', '321', '2025-04-02 03:16:04', '2025-04-02 03:16:04'),
(3, 3, '24042513', 'ISLAM', '682365205018', 'desa lueng ie', 'smpn 18 banda aceh', 'zaiwan', '082343', 'yusmiati', '082376', '2025-04-04 05:56:54', '2025-04-04 05:56:54'),
(4, 4, '1106111710001', 'ISLAM', '44444', 'vdrbvs', 'smpn 1', 'ssss', '1321', 'gggg', '13131', '2025-04-06 01:41:26', '2025-04-06 01:41:26'),
(5, 5, '3329091003780070', 'ISLAM', '44444', 'mliancabuw', 'smpn 1', 'ssss', '0833', 'gggg', '0844', '2025-04-11 06:31:19', '2025-04-11 06:31:19'),
(6, 6, '3329091003780070', 'ISLAM', '44444', 'dawdfea', 'smpn 1', 'ssss', '333', 'gggg', '4444', '2025-04-19 01:59:37', '2025-04-19 01:59:37'),
(7, 7, '3329091003780070', 'ISLAM', '44444', 'ddd', 'smpn 1', 'ssss', '333', 'gggg', '444', '2025-04-19 02:27:06', '2025-04-19 02:27:06'),
(8, 8, '1106111710001', 'ISLAM', '44444', 'dddddd', 'smpn 1', 'dddddd', '444444', 'gggg', '4444444', '2025-04-24 06:24:21', '2025-04-24 06:24:21'),
(9, 9, '3329091003780070', 'ISLAM', '44444', 'ss', 'smpn 1', 'ssss', '324213', 'gggg', '3242', '2025-05-18 00:42:44', '2025-05-18 00:42:44');

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
-- Table structure for table `daftarulang_users`
--

CREATE TABLE `daftarulang_users` (
  `id` varchar(15) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `kk` text DEFAULT NULL,
  `akte` text DEFAULT NULL,
  `skl` text DEFAULT NULL,
  `kartu_kip` text DEFAULT NULL,
  `kartu_nisn` text DEFAULT NULL,
  `pasphoto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftarulang_users`
--

INSERT INTO `daftarulang_users` (`id`, `users_id`, `kk`, `akte`, `skl`, `kartu_kip`, `kartu_nisn`, `pasphoto`, `created_at`, `updated_at`) VALUES
('SPMB20250001', 9, NULL, '/2025/Desain Pemodelan dan Informasi Bangunan/siswa ke 11/akte.pdf', NULL, '/2025/Desain Pemodelan dan Informasi Bangunan/siswa ke 11/kartu_kip.pdf', NULL, '/2025/Desain Pemodelan dan Informasi Bangunan/siswa ke 11/pasphoto.jpeg', '2025-05-19 11:08:35', '2025-05-19 21:23:06'),
('SPMB20250002', 1, '/2025/Busana/M. Fadhlan/kk.pdf', '/2025/Busana/M. Fadhlan/akte.pdf', '/2025/Busana/M. Fadhlan/skl.pdf', '/2025/Busana/M. Fadhlan/kartu_kip.pdf', '/2025/Busana/M. Fadhlan/kartu_nisn.pdf', '/2025/Busana/M. Fadhlan/pasphoto.JPG', '2025-05-19 11:08:47', '2025-05-19 12:34:19'),
('SPMB20250003', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-19 11:07:05', '2025-05-19 11:07:05'),
('SPMB20250004', 3, NULL, NULL, NULL, '/2025/Busana/muslem/kartu_kip.pdf', NULL, '/2025/Busana/muslem/pasphoto.jpg', '2025-05-19 11:08:54', '2025-05-19 22:37:31'),
('SPMB20250005', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-19 11:06:45', '2025-05-19 11:06:45'),
('SPMB20250006', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-19 11:07:44', '2025-05-19 11:07:44'),
('SPMB20250007', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-19 11:09:01', '2025-05-19 11:09:01'),
('SPMB20250008', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-19 11:07:49', '2025-05-19 11:07:49'),
('SPMB20250009', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-19 11:06:26', '2025-05-19 11:06:26');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nalquran` int(11) DEFAULT NULL,
  `nakademik` int(11) DEFAULT NULL,
  `nmikat` int(11) DEFAULT NULL,
  `nkejuruan` int(11) DEFAULT NULL,
  `nkesehatan` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formulir_users`
--

INSERT INTO `formulir_users` (`id`, `nomor`, `users_id`, `biodata_users_id`, `jurusan1`, `status_jurusan1`, `jurusan2`, `status_jurusan2`, `created_at`, `updated_at`, `nalquran`, `nakademik`, `nmikat`, `nkejuruan`, `nkesehatan`) VALUES
('SPMB20250001', 1, 9, 9, 5, 'A', 6, 'A', '2025-05-18 00:43:00', '2025-05-19 11:08:35', 90, 88, 77, 0, '✔'),
('SPMB20250002', 2, 1, 1, 1, 'A', 2, 'A', '2025-04-02 12:53:00', '2025-05-19 11:08:47', 33, 55, 0, 100, '✔'),
('SPMB20250003', 3, 2, 2, 6, 'L', 7, NULL, '2025-04-04 02:12:45', '2025-05-19 11:07:05', 0, 88, 94, 65, NULL),
('SPMB20250004', 4, 3, 3, 2, 'A', 5, 'A', '2025-04-04 05:57:27', '2025-05-19 11:08:53', 100, 100, 100, 100, NULL),
('SPMB20250005', 5, 4, 4, 2, 'L', 1, NULL, '2025-04-06 01:41:57', '2025-05-19 11:06:45', 80, 80, 80, 80, '✔'),
('SPMB20250006', 6, 5, 5, 2, 'T', 3, 'L', '2025-04-11 06:31:59', '2025-05-19 11:07:44', 66, 77, 77, 77, NULL),
('SPMB20250007', 7, 6, 6, 1, 'A', 2, 'A', '2025-04-19 02:09:13', '2025-05-19 11:09:01', 98, 98, 98, 98, NULL),
('SPMB20250008', 8, 7, 7, 4, 'T', 5, 'L', '2025-04-19 02:27:52', '2025-05-19 11:07:49', 85, 85, 85, 85, '✔'),
('SPMB20250009', 9, 8, 8, 1, 'L', 4, NULL, '2025-04-24 06:24:42', '2025-05-19 11:06:26', 88, 88, 88, 88, '✔');

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
('SPMB20250001', 9, 9, 4, NULL, '2025-05-19 11:08:35', '2025-05-19 11:08:35'),
('SPMB20250002', 1, 1, 7, NULL, '2025-05-19 11:08:47', '2025-05-19 11:08:47'),
('SPMB20250003', 2, 2, 6, NULL, '2025-05-19 11:07:05', '2025-05-19 11:07:05'),
('SPMB20250004', 3, 3, 7, NULL, '2025-05-19 11:08:54', '2025-05-19 11:08:54'),
('SPMB20250005', 4, 4, 2, NULL, '2025-05-19 11:06:45', '2025-05-19 11:06:45'),
('SPMB20250006', 5, 5, 3, NULL, '2025-05-19 11:07:44', '2025-05-19 22:14:16'),
('SPMB20250007', 6, 6, 7, NULL, '2025-05-19 11:09:01', '2025-05-19 11:09:01'),
('SPMB20250008', 7, 7, 5, NULL, '2025-05-19 11:07:49', '2025-05-19 11:07:49'),
('SPMB20250009', 8, 8, 1, 'Y', '2025-05-19 11:06:26', '2025-05-19 22:20:56');

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
(28, '2025_03_24_190620_create_lulus_users_table', 1),
(29, '2025_04_19_093323_create_timelines_table', 2),
(32, '2025_05_18_075212_update_formulir_users_table', 3),
(35, '2025_05_19_134658_create_daftarulang_users_table', 4);

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
('2xr0JmpmBkIBpFwEEYNDRJzhvCbb0f3fUBkBfiE5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieHFsTU9Rb1RVQnJyTFNXS0RlUUt2ZnlGVHZwenpISzlOT2xQd2dGMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAxOiJodHRwOi8vbG9jYWxob3N0L3BwZGItbXViYXJrZXlhL2FkbWluL2RhZnRhci11bGFuZy9kb3dubG9hZC8yMDI1L0FrdW50YW5zaSUyMGRhbiUyMEtldWFuZ2FuJTIwTGVtYmFnYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1747719711),
('QzskBZQ7a5Pm4OdbiUWRtZTP5joMpFeGiOKierAi', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSkFzazlyckhFbHB5R1ZUSzdaN3Bwem9XUVhPeUs5RlBCWmJHeEtZTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvcHBkYi1tdWJhcmtleWEvZGFmdGFydWxhbmciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1747719457);

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `name`, `tgl_mulai`, `tgl_selesai`, `created_at`, `updated_at`) VALUES
(1, 'Biodata Siswa', '2025-04-01', '2025-04-04', NULL, '2025-04-19 06:51:26'),
(2, 'Formulir Pendaftaran', '2025-04-03', '2025-04-04', NULL, NULL),
(3, 'Ujian', '2025-04-05', '2025-04-06', NULL, NULL),
(4, 'Pengumuman', '2025-04-07', '2025-04-08', NULL, NULL),
(5, 'Daftar Ulang', '2025-04-09', '2025-04-10', NULL, NULL);

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
(1, 'M. Fadhlan', 'mfadhlan1721@gmail.com', NULL, '$2y$12$/qOqkU2HhraxE/KzfITzO.uFxz/SvakbpsyfkTAu8aPaDzPDIrCBW', '0014', 'LAKI - LAKI', 'Aceh Besar', '2010-12-17', 'IkqOAd3NOH8SIB86wtNdR9AqfjK3TFY9DNwnTg8G97iD1r0Z6GalZMCv1rcBBDEzXYnezTqS6y3k2bvpSlU2ls6mRGVZV7DksIzH.png', NULL, '2025-04-01 05:31:41', '2025-04-16 15:21:24'),
(2, 'adadaa', 'antara01dan02@gmail.com', NULL, '$2y$12$prxct8A2O8eUevXKPlEo2OjiNKoSQProEB8hs/pgDyhUizcb7uNRm', '12122334', 'LAKI - LAKI', 'banda', '2002-12-16', 'vcZZmePOMoK5hdThDJ0w7Ij8TKwGJQa2MfirxWqg5HKODr5JQLzSGSI8ESqyXvZR5lgnkXsEAnGxNTBR970iWqmSZmIAEpgznm3k.jpeg', NULL, '2025-04-02 03:13:05', '2025-04-02 03:15:14'),
(3, 'muslem', '200705039@student.ar-raniry.ac.id', NULL, '$2y$12$yIHSHoy8p1vUfEormTHAjudNT300rOWvg/41XRz7wv59Z5hych5Mq', '0970969596', 'LAKI - LAKI', 'Banda Aceh', '2002-05-14', 'tLjf33tqtgawAqPfgUN4yKGJiPBbBS1ZlgwBRrLvxpt9EOf5rp2nGYqXVGCari4eCUPyvcYsAYqqXaq1RmZmPmdDVuscowH65rzH.jpg', NULL, '2025-04-04 05:51:41', '2025-04-04 05:52:31'),
(4, 'simax', 'fadhlanmuhammad1733@gmail.com', NULL, '$2y$12$dvkL67wz9zR9klbpevjis.wF.7dXkWTG9IFGoxbr0NWFeTqKulpiK', '0014', 'LAKI - LAKI', 'Aceh Besar', '2025-04-06', '1AwnotPcYwreucgmgcu110hqfdZzGvNPzIE1mjgYdr57LYSZYMGMAkjfngCzubiuSsObLwFotF2HUrrBY8kmNBE84xAhfk6KwhxG.png', NULL, '2025-04-06 01:40:08', '2025-04-06 01:40:58'),
(5, 'max', '200705068@student.ar-raniry.ac.id', NULL, '$2y$12$soROHiwbjLWAwzeOx4iPV.9j1T.QXb9sh9GJE7T66p2vXxpxRwqcu', '0014', 'LAKI - LAKI', 'Aceh Besar', '2025-04-10', 'Ix0FODVTn3VAdaRTF7cH0uyQJ1jUVokXtEiYozhXzrk1LcCVCj8m6PRj90ppyY3qQuAVPVCivFjyOVz00wMrJa7tOSLgpxOIIrvs.png', NULL, '2025-04-11 06:30:03', '2025-04-11 06:30:45'),
(6, 'Nur Annas', 'paerayaulee@gmail.com', NULL, '$2y$12$08/NGQlfPwBO1MXIEeyI0etyXx7ULk2D/PHKQ0ELAbGltFJmYeDCW', '001477884', 'LAKI - LAKI', 'Aceh Besar', '2025-04-01', 'bx6oDp8SwPX2PLeFxtssevixUT2bqmnLmrr2CPHGjgEYCsNgsSdNu1vxuNJeSlCF54fMrdCpEGwaHMKG7g3aiY18yTpaH3PRNJWG.png', NULL, '2025-04-19 01:58:16', '2025-04-19 01:59:04'),
(7, 'Lucky Donnya', 'lucky@gmail.com', NULL, '$2y$12$qD8ZTv2CldwR72tfeb5nPu2nCE.I4tBuenCKHyEq46HL4jQMx/4j.', '0014', 'LAKI - LAKI', 'Aceh Besar', '2025-04-05', 'XtZmHzcNNIpSyCRs2xr0dYPYmj22W5delWjm1ablIDDySZ4AfEzligCIXhXtcddutRPuNNkZ2FuqtPVjR5vYDdJUjkCvv6fhWYSB.png', NULL, '2025-04-19 02:26:21', '2025-04-19 02:26:41'),
(8, 'T. Muda Rahmat Sadiqi', 'teukumuda029@gmail.com', NULL, '$2y$12$APx9m7LCg/Z0Uw.S0f7RYurmxJ6G1Ci8bOujyJGQamwuJ/QxlM2Y.', '022222', 'LAKI - LAKI', 'Aceh Besar', '2001-08-13', 'JMYRe8ywHtnl5M70DkBZeUT2akgqDUmWPrKDWexlJx1Vbh00LnCB2se1PR2DWUcDE36Hdsv51VeUDEx0EokJg9uajrlo21yywi8g.jpeg', NULL, '2025-04-24 06:23:18', '2025-04-24 06:23:46'),
(9, 'siswa ke 11', 'siswa11@gmail.com', NULL, '$2y$12$dDiOlzEBrHAhk2hWbhCvyuwUtku8dRlGhgxYvIe4F5YzQdB9svq/6', '001111', 'LAKI - LAKI', 'Aceh Besar', '2025-05-11', 'YIYTW8ZY2LViZBRRBWoX7C7VgKcOFkiWxbeOQdN82x1KF2IJPD6cH8dfHt3dowIWlU4PQuEdU7YO1hlSZoSonpRHX44a4g4F2uj7.jpeg', NULL, '2025-05-18 00:41:24', '2025-05-18 00:42:13');

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
-- Indexes for table `daftarulang_users`
--
ALTER TABLE `daftarulang_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodata_users`
--
ALTER TABLE `biodata_users`
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
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
