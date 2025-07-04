-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 04:24 PM
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
-- Database: `projectpos`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('toko_mainan_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1751519420),
('toko_mainan_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1751519420;', 1751519420),
('toko_mainan_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1751525312),
('toko_mainan_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1751525312;', 1751525312),
('toko_mainan_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1751529543),
('toko_mainan_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1751529543;', 1751529543);

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
-- Table structure for table `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksis`
--

INSERT INTO `detail_transaksis` (`id`, `transaksi_id`, `produk_id`, `jumlah`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
(4, 7, 1, 1, 20000.00, 20000.00, '2025-07-02 04:33:39', '2025-07-02 04:33:39'),
(5, 7, 2, 1, 50000.00, 50000.00, '2025-07-02 04:40:39', '2025-07-02 04:40:39'),
(6, 8, 2, 1, 50000.00, 50000.00, '2025-07-02 05:15:01', '2025-07-02 05:15:01'),
(7, 9, 3, 1, 50000.00, 50000.00, '2025-07-02 22:36:27', '2025-07-02 22:36:27'),
(8, 9, 2, 1, 50000.00, 50000.00, '2025-07-02 23:45:31', '2025-07-02 23:45:31');

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
-- Table structure for table `jenis_produks`
--

CREATE TABLE `jenis_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_produks`
--

INSERT INTO `jenis_produks` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Action Figure', 'jenis-produk/01JZ55V9CZVJG9RV9955QZD83S.jpg', '2025-07-02 02:00:24', '2025-07-02 02:00:24'),
(2, 'Boneka', 'jenis-produk/01JZ590J0CK18SEFBG0MVDPXT0.jpg', '2025-07-02 02:55:42', '2025-07-02 02:55:42'),
(3, 'Mainan E', 'jenis-produk/01JZ5917DJ7HHHBMDC3N4FFW32.jpg', '2025-07-02 02:56:04', '2025-07-02 02:56:04'),
(4, 'Mobil Remote', 'jenis-produk/01JZ5927A22JF6584CW5E4V0WX.jpg', '2025-07-02 02:56:37', '2025-07-02 02:56:37'),
(5, 'Puzzle', 'jenis-produk/01JZ5931QNZKCJS7XJ6P3MHCFP.jpg', '2025-07-02 02:57:04', '2025-07-02 02:57:04');

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
-- Table structure for table `kategori_tokohs`
--

CREATE TABLE `kategori_tokohs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_tokohs`
--

INSERT INTO `kategori_tokohs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Superhero', '2025-07-02 02:53:23', '2025-07-02 02:53:23'),
(2, 'Anime', '2025-07-02 02:53:36', '2025-07-02 02:53:36'),
(3, 'Game Character', '2025-07-02 02:53:50', '2025-07-02 02:53:50'),
(4, 'Tokoh Film Indonesia', '2025-07-02 02:54:03', '2025-07-02 02:54:03'),
(5, 'Kartun ', '2025-07-02 02:54:12', '2025-07-02 02:54:12'),
(6, 'Tokoh Princess', '2025-07-02 02:54:20', '2025-07-02 02:55:11'),
(7, 'Robot & Kendaraan', '2025-07-02 02:54:45', '2025-07-02 02:54:45'),
(8, 'Tokoh Edukasi', '2025-07-02 02:54:58', '2025-07-02 02:54:58');

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
(4, '2025_07_02_083401_create_jenis_produks_table', 2),
(5, '2025_07_02_083406_create_produks_table', 2),
(6, '2025_07_02_083411_create_kategori_tokohs_table', 2),
(7, '2025_07_02_083414_create_testimonis_table', 2),
(8, '2025_07_02_085933_add_foto_to_jenis_produks_table', 3),
(9, '2025_07_02_095939_add_kategori_tokoh_id_to_produks_table', 4),
(10, '2025_07_02_101559_create_transaksis_table', 5),
(11, '2025_07_02_101637_create_detail_transaksis_table', 6),
(12, '2025_07_02_120958_add_pembayaran_to_transaksis_table', 7),
(13, '2025_07_02_125955_add_foto_to_testimonis_table', 8),
(14, '2025_07_03_014421_add_role_to_users_table', 9),
(15, '2025_07_03_030309_create_orders_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('pending','dibayar','dikirim','selesai') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `min_stok` int(11) NOT NULL DEFAULT 0,
  `jenis_produk_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_tokoh_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `kode`, `nama`, `harga`, `stok`, `rating`, `min_stok`, `jenis_produk_id`, `deskripsi`, `foto`, `created_at`, `updated_at`, `kategori_tokoh_id`) VALUES
(1, 'AF1', 'Batman', 20000, 60, 0, 5, 1, NULL, 'produk/01JZ5A0W2SR8M8NZZF2VX207BP.jpg', '2025-07-02 02:42:34', '2025-07-02 03:13:21', 1),
(2, 'AF2', 'Nami', 50000, 24, 0, 1, 1, NULL, 'produk/01JZ59EJXAQ7JWXW0VCA84YPKW.jpg', '2025-07-02 03:03:22', '2025-07-02 05:15:01', 2),
(3, 'B1', 'Boneka kuromi', 50000, 50, 0, 2, 2, 'Boneka kuromi', 'produk/01JZ7B1Z8FRRZBFESS06BG012K.jpeg', '2025-07-02 22:09:55', '2025-07-02 22:09:55', 5);

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
('TduF4FEF2AJP3L9tB7sxZFnEcOOdgO5VO6HbRuBp', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieGxtd3IxZ0FINEJ1U3JBRkxZTHF2YXBkTnhvWTlHRTZqRFBVamZrRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2R1ay1jYXJkLXZpZXciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkYklURXZ0Y28yTUk2bDNPalR4cUt2dWlUTUhEYTFKcENjUXEvR1lHNjQwMGE4SVBZcUlPRXEiO30=', 1751529509),
('ZO9Xq8W2JmkpXI16qmTlMJ1KDA7XhxiW5zbRI87M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidVJGNGt2UTZJdmtwQmVUT1BsbmFWS0NsSzR4WmNVaTVMNmxGWW5QWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751522464);

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `nama_tokoh` varchar(45) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_tokoh_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonis`
--

INSERT INTO `testimonis` (`id`, `tanggal`, `nama_tokoh`, `komentar`, `rating`, `produk_id`, `kategori_tokoh_id`, `created_at`, `updated_at`, `foto`) VALUES
(1, '2025-07-02', 'Rahmawati', 'TOPPPPP POKOKNYA', 5, 2, 2, '2025-07-02 06:22:49', '2025-07-02 06:22:49', 'testimoni/01JZ5MVSRN3Q3NJNSKCBJ625DA.jpg'),
(2, '2025-07-03', 'Clarissa', 'PUASSSS BANGETTT DAH', 5, 3, 1, '2025-07-02 22:32:38', '2025-07-02 22:32:38', 'testimoni/01JZ7CBJGC2C3PCVJ263YGNT0J.jpg'),
(3, '2025-07-03', 'Najwa Putri Syahri', 'Wah aku suka banget batmannya!', 5, 1, 1, '2025-07-02 23:48:07', '2025-07-02 23:48:07', 'testimoni/01JZ7GNSA3CVS0F72A7M22A7KJ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `kode`, `tanggal`, `user_id`, `total`, `created_at`, `updated_at`, `pembayaran`) VALUES
(7, 'TRX-20250702113339', '2025-07-02 11:33:39', 1, 70000.00, '2025-07-02 04:33:39', '2025-07-02 04:40:39', NULL),
(8, 'TRX-20250702121501', '2025-07-02 12:15:01', 1, 0.00, '2025-07-02 05:15:01', '2025-07-02 05:15:01', 'QRIS'),
(9, 'TRX-20250703053627-2362', '2025-07-03 05:36:27', 2, 100000.00, '2025-07-02 22:36:27', '2025-07-02 23:45:31', 'Tunai');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$5v65IREqvhE2YmbIpqF4kegT1PCVDS.XB/jMtUF8JC5PruQgu7S2i', 'fxu81cPv3OmMjMFm8f5BoOdlotFK55BwS1TYv3XCWAsVGRqctqiqtGZ1DpFZ', '2025-07-02 01:29:29', '2025-07-02 01:29:29', 'admin'),
(2, 'Rahmawati', 'rahmawatiibrahim2306@gmail.com', NULL, '$2y$12$bITEvtco2MI6l3OjTxqKvuiTMHDa1JpCcQq/GYG6400a8IPYqIOEq', NULL, '2025-07-02 19:16:51', '2025-07-02 19:16:51', 'user');

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
-- Indexes for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksis_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `detail_transaksis_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_produks`
--
ALTER TABLE `jenis_produks`
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
-- Indexes for table `kategori_tokohs`
--
ALTER TABLE `kategori_tokohs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_jenis_produk_id_foreign` (`jenis_produk_id`),
  ADD KEY `produks_kategori_tokoh_id_foreign` (`kategori_tokoh_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonis_produk_id_foreign` (`produk_id`),
  ADD KEY `testimonis_kategori_tokoh_id_foreign` (`kategori_tokoh_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_kode_unique` (`kode`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_produks`
--
ALTER TABLE `jenis_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_tokohs`
--
ALTER TABLE `kategori_tokohs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`),
  ADD CONSTRAINT `detail_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_jenis_produk_id_foreign` FOREIGN KEY (`jenis_produk_id`) REFERENCES `jenis_produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produks_kategori_tokoh_id_foreign` FOREIGN KEY (`kategori_tokoh_id`) REFERENCES `kategori_tokohs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD CONSTRAINT `testimonis_kategori_tokoh_id_foreign` FOREIGN KEY (`kategori_tokoh_id`) REFERENCES `kategori_tokohs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
