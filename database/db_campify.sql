-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2026 pada 15.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_campify`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@email.com', '$2y$12$R56EcSxGiXLrpPWiOJGzfO4MygPqNLVmBUjDSuy15Dh4r7t.QY1r.', '2025-12-16 10:23:34', '2025-12-16 10:23:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_ktg` bigint(20) UNSIGNED NOT NULL,
  `nama_ktg` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_ktg`, `nama_ktg`, `created_at`, `updated_at`) VALUES
(1, 'Alat Masak', '2025-12-17 08:28:06', '2026-01-03 12:07:09'),
(2, 'Tenda', '2025-12-19 04:18:27', '2025-12-19 04:18:27'),
(4, 'Furniture', '2026-01-03 11:32:52', '2026-01-03 11:32:52'),
(5, 'Outdoor & Hiking', '2026-01-03 11:49:59', '2026-01-03 11:49:59'),
(6, 'Elektronik', '2026-01-03 12:00:06', '2026-01-03 12:00:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_16_165813_create_admin_camps_table', 2),
(6, '2025_12_16_173554_create_sewa_table', 3),
(7, '2026_01_01_172405_add_role_to_users_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_prod` bigint(20) UNSIGNED NOT NULL,
  `id_ktg` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_day` bigint(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_prod`, `id_ktg`, `nama`, `harga_day`, `stok`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 2, 'Tenda Camp 2 Orang', 30000, 120, '1766144074_t-1.jpeg', 'Tenda camping 2 orang', '2025-12-19 04:34:34', '2026-01-03 11:34:26'),
(4, 2, 'Tenda Camp 3 Orang', 40000, 75, '1767462483_t-3.webp', 'Tenda muat 3 orang', '2026-01-03 10:48:03', '2026-01-03 10:52:41'),
(5, 2, 'Tenda Camp 4 Orang', 45000, 62, '1767462751_td-4.jpg', 'Tenda yang muat 4 orang', '2026-01-03 10:52:31', '2026-01-03 10:52:31'),
(7, 2, 'Tenda Camp 6 Orang', 55000, 35, '1767464394_t-6.jpg', 'Tenda muat 6 orang', '2026-01-03 11:19:54', '2026-01-03 11:19:54'),
(8, 2, 'Tenda Camp 8 Orang', 70000, 28, '1767464428_t-8.jpg', 'Kapasitas Besar', '2026-01-03 11:20:28', '2026-01-03 11:20:28'),
(9, 4, 'Meja Persegi', 20000, 42, '1767465221_mj.jpg', 'meja kecil', '2026-01-03 11:33:41', '2026-01-03 11:33:41'),
(10, 4, 'Meja Panjang', 30000, 37, '1767465250_mjb.jpg', 'meja panjang', '2026-01-03 11:34:10', '2026-01-03 11:34:10'),
(11, 4, 'Paket M Meja Kursi', 70000, 38, '1767465321_pkt mjkr.jpg', 'paket', '2026-01-03 11:35:21', '2026-01-03 11:38:54'),
(12, 4, 'Paket S Meja Kursi', 40000, 47, '1767465525_pkt mj 2.jpg', 'meja kursi 2', '2026-01-03 11:38:45', '2026-01-03 11:38:45'),
(13, 4, 'Kursi Persegi', 10000, 28, '1767466083_krsq.jpg', 'a', '2026-01-03 11:39:49', '2026-01-03 11:48:03'),
(14, 4, 'Kursi Lipat', 25000, 45, '1767465625_krb.jpg', 'a', '2026-01-03 11:40:25', '2026-01-03 11:40:25'),
(15, 5, 'Carrier 75L', 35000, 31, '1767466298_cr-75.jpg', 'ka', '2026-01-03 11:51:38', '2026-01-03 11:51:38'),
(16, 5, 'Carrier 60L', 30000, 37, '1767466331_cr-60.jpeg', 'jbsua', '2026-01-03 11:52:11', '2026-01-03 11:52:11'),
(17, 5, 'Trekking Pole', 20000, 82, '1767466549_tp.jpeg', 'ksaxd', '2026-01-03 11:55:49', '2026-01-03 11:55:49'),
(18, 5, 'Daypack', 25000, 72, '1767466593_dp2.jpg', 'akzjnsk', '2026-01-03 11:56:33', '2026-01-03 11:56:33'),
(19, 5, 'Sepatu Gunung Pria', 35000, 47, '1767466622_sp.jpg', 'xkdwd', '2026-01-03 11:57:02', '2026-01-03 11:57:02'),
(20, 5, 'Sepatu Gunung Wanita', 35000, 41, '1767466651_spw.jpg', 'nkns', '2026-01-03 11:57:31', '2026-01-03 11:57:31'),
(21, 6, 'Lampu Emergency', 20000, 45, '1767466856_le.jpg', 'kwqqdxw', '2026-01-03 12:00:56', '2026-01-03 12:00:56'),
(22, 6, 'Powerbank 5000mAh', 30000, 25, '1767466926_pb.jpg', 'kw', '2026-01-03 12:02:06', '2026-01-03 12:02:06'),
(23, 6, 'Head Lamp', 15000, 36, '1767466952_hl.jpg', 'kwkqadw', '2026-01-03 12:02:32', '2026-01-03 12:02:32'),
(24, 6, 'Senter', 10000, 30, '1767466973_st.png', 'dqlnlfkq', '2026-01-03 12:02:53', '2026-01-03 12:02:53'),
(25, 1, 'Cooking Set', 20000, 84, '1767467123_25.Cooking Set.jpg', 'nikwhjws', '2026-01-03 12:05:23', '2026-01-03 12:05:23'),
(26, 1, 'Kompor Kembang', 20000, 28, '1767467154_23.Kompor Kembang.jpg', 'jiqdk', '2026-01-03 12:05:54', '2026-01-03 12:05:54'),
(27, 1, 'Kompor Kotak', 15000, 28, '1767467182_22.Kompor Kotak.jpg', 'qnkdq', '2026-01-03 12:06:22', '2026-01-03 12:06:22'),
(28, 1, 'Kompor Portable', 25000, 38, '1767467212_kp.jpg', 'dqkn ma', '2026-01-03 12:06:52', '2026-01-03 12:06:52'),
(29, 2, 'Sleeping Bag', 15000, 37, '1767467284_slp.jpg', 'qmknkdjen', '2026-01-03 12:08:04', '2026-01-03 12:08:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0bdW5OSiOuWN0z558jDO8IdLNtpLCBJzxQXrtjoM', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN1NjTG1FRUI1N05CdTFzZEN2b25ncVZOUG5kRXFzOTRNcTQ4dlJLdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWsiO3M6NToicm91dGUiO3M6MTI6ImFkbWluLnByb2R1ayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1767515345),
('AnviqDem1bWKKJwELKE4AMPpqyO9IEnZD7MVj40b', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWWo5MFNuUDFiT2VKWms5VWh4andzU1duVTJJbGs2WVNwOExmakphcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VyYnlhZG1pbj9rZXl3b3JkPWtpYSI7czo1OiJyb3V0ZSI7czoxMToiYWRtaW4udXNlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1767537080);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_prod` bigint(20) UNSIGNED NOT NULL,
  `total_hari` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id`, `user_id`, `id_prod`, `total_hari`, `total_harga`, `status`, `tgl_mulai`, `tgl_selesai`, `payment_method`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 80000, 'done', '2026-01-01', '2026-01-02', 'DANA', '1767284352_qriss.png', '2026-01-01 09:19:12', '2026-01-01 12:29:12'),
(2, 2, 1, 2, 80000, 'pickup', '2026-01-01', '2026-01-02', 'QRIS', '1767284902_ChatGPT Image Dec 31, 2025, 01_54_13 AM.png', '2026-01-01 09:28:22', '2026-01-04 07:19:43'),
(3, 2, 1, 2, 160000, 'done', '2026-01-01', '2026-01-02', 'QRIS', '1767285875_ChatGPT Image Dec 31, 2025, 01_51_23 AM.png', '2026-01-01 09:44:35', '2026-01-04 07:19:46'),
(4, 2, 1, 5, 200000, 'pickup', '2026-01-01', '2026-01-05', 'DANA', '1767285949_Blue and White Flat Product Development Flowchart Graph_20251231_012605_0000.png', '2026-01-01 09:45:49', '2026-01-01 12:28:48'),
(5, 3, 1, 3, 120000, 'pending', '2026-01-02', '2026-01-04', 'DANA', '1767381536_20260102_172220_0000.png', '2026-01-02 12:18:56', '2026-01-02 12:18:56'),
(6, 4, 7, 3, 165000, 'done', '2026-01-03', '2026-01-05', 'QRIS', '1767468970_slp.jpg', '2026-01-03 12:36:10', '2026-01-04 07:25:02'),
(7, 4, 14, 3, 75000, 'order', '2026-01-03', '2026-01-05', 'QRIS', '1767468970_slp.jpg', '2026-01-03 12:36:10', '2026-01-04 07:25:10'),
(8, 4, 20, 2, 70000, 'pickup', '2026-01-03', '2026-01-04', 'QRIS', '1767468970_slp.jpg', '2026-01-03 12:36:10', '2026-01-04 07:25:05'),
(9, 4, 22, 2, 60000, 'order', '2026-01-03', '2026-01-04', 'QRIS', '1767468970_slp.jpg', '2026-01-03 12:36:10', '2026-01-04 07:25:08'),
(10, 4, 28, 4, 100000, 'pending', '2026-01-03', '2026-01-06', 'QRIS', '1767468970_slp.jpg', '2026-01-03 12:36:10', '2026-01-03 12:36:10'),
(11, 4, 4, 2, 80000, 'pending', '2026-01-03', '2026-01-04', 'DANA', '1767478664_slp.jpg', '2026-01-03 15:17:44', '2026-01-03 15:17:44'),
(12, 4, 4, 2, 80000, 'pending', '2026-01-04', '2026-01-05', 'QRIS', '1767514234_pb.jpg', '2026-01-04 01:10:34', '2026-01-04 01:10:34'),
(13, 4, 4, 2, 80000, 'pending', '2026-01-04', '2026-01-05', 'DANA', '1767514462_pb.jpg', '2026-01-04 01:14:22', '2026-01-04 01:14:22'),
(14, 4, 5, 2, 90000, 'pending', '2026-01-04', '2026-01-05', 'DANA', '1767514725_slp.jpg', '2026-01-04 01:18:45', '2026-01-04 01:18:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'kia', 'saski1385@gmail.com', NULL, '$2y$12$tr3YLg06iVUy4WPkS432gOtRiAGXvFmfvHgbXIc40egHGi2wrcA5G', NULL, '2025-12-26 09:12:29', '2025-12-26 09:12:29', 'user'),
(2, 'sa', 'shofasaskia@gmail.com', NULL, '$2y$12$h8lo7Acau84i9JeRnQoaIeTYMvHcT/49XfznQcO0ZmB27KfG9Jd8S', NULL, '2026-01-01 09:00:01', '2026-01-01 09:00:01', 'user'),
(3, 'Admin', 'admin@campify.com', NULL, '$2y$12$lk2HiKroJ0zyfFEftME5QehURFsa2KqfILPyhN4B0jp0rnCWMaK8.', NULL, '2026-01-01 10:30:03', '2026-01-01 10:30:03', 'admin'),
(4, 'kiu', 'kiu@gmail.com', NULL, '$2y$12$kO8UVwASuKS.4Vj3up19Le7vAcknHxaxejjRZIISVbBVBTb7Udiee', NULL, '2026-01-03 06:39:12', '2026-01-03 06:39:12', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_ktg`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `produk_id_ktg_foreign` (`id_ktg`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sewa_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_ktg` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_prod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_ktg_foreign` FOREIGN KEY (`id_ktg`) REFERENCES `kategori` (`id_ktg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
