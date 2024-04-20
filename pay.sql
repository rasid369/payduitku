-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 10:01 AM
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
-- Database: `pay`
--

-- --------------------------------------------------------

--
-- Table structure for table `callbacks`
--

CREATE TABLE `callbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchantCode` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `merchantOrderId` varchar(255) NOT NULL,
  `productDetail` varchar(255) DEFAULT NULL,
  `additionalParam` varchar(255) DEFAULT NULL,
  `paymentCode` varchar(255) NOT NULL,
  `resultCode` varchar(255) NOT NULL,
  `merchantUserId` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `publisherOrderId` varchar(255) DEFAULT NULL,
  `spUserHash` varchar(255) DEFAULT NULL,
  `settlementDate` date DEFAULT NULL,
  `issuerCode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `callbacks`
--

INSERT INTO `callbacks` (`id`, `merchantCode`, `amount`, `merchantOrderId`, `productDetail`, `additionalParam`, `paymentCode`, `resultCode`, `merchantUserId`, `reference`, `signature`, `publisherOrderId`, `spUserHash`, `settlementDate`, `issuerCode`, `created_at`, `updated_at`) VALUES
(1, 'DS18317', 1570000.00, 'I00012', 'Product 6', NULL, 'I1', '00', NULL, 'DS1831724M47EBU2PGJK5NPV', 'ce74bef4e6278671733ad8bf32ee8c89', NULL, NULL, NULL, NULL, '2024-03-04 04:54:25', '2024-03-04 04:54:25'),
(2, 'DS18317', 1570000.00, 'I00012', 'Product 6', NULL, 'I1', '00', NULL, 'DS1831724M47EBU2PGJK5NPV', 'ce74bef4e6278671733ad8bf32ee8c89', NULL, NULL, NULL, NULL, '2024-03-04 04:58:06', '2024-03-04 04:58:06'),
(3, 'DS18317', 20000.00, 'BE00002', 'Product 1', NULL, 'BC', '00', NULL, 'DS1831724E58Q4A6HZ2MSY1R', '1e6ad33422a8e97b4c7f496f47f41adc', 'BC247OM0VSRLC6DJ4MX', NULL, '2024-03-06', NULL, '2024-03-04 06:25:08', '2024-03-04 06:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `produkid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `produkid`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(16, 1, 6, 1, '0', '2024-03-04 02:01:57', '2024-03-04 02:49:06'),
(17, 1, 9, 1, '0', '2024-03-04 02:01:57', '2024-03-04 02:49:06'),
(18, 1, 5, 1, '0', '2024-03-04 02:25:16', '2024-03-04 02:49:06'),
(19, 1, 8, 1, '0', '2024-03-04 02:25:16', '2024-03-04 02:49:06'),
(20, 1, 2, 1, 'I00002', '2024-03-04 02:59:49', '2024-03-04 03:00:49'),
(21, 1, 3, 1, 'I00002', '2024-03-04 02:59:51', '2024-03-04 03:00:49'),
(22, 1, 8, 1, 'I00003', '2024-03-04 03:25:04', '2024-03-04 03:25:13'),
(23, 1, 6, 1, 'I00003', '2024-03-04 03:25:05', '2024-03-04 03:25:13'),
(24, 1, 3, 1, 'I00008', '2024-03-04 03:44:37', '2024-03-04 03:47:12'),
(25, 1, 6, 1, 'I00008', '2024-03-04 03:44:42', '2024-03-04 03:47:12'),
(26, 1, 3, 1, 'I00009', '2024-03-04 03:51:25', '2024-03-04 03:56:01'),
(27, 1, 6, 1, 'I00009', '2024-03-04 03:51:27', '2024-03-04 03:56:01'),
(28, 1, 2, 1, 'I00009', '2024-03-04 03:51:28', '2024-03-04 03:56:01'),
(29, 1, 2, 1, 'I00010', '2024-03-04 03:58:24', '2024-03-04 03:58:31'),
(30, 1, 5, 1, 'I00010', '2024-03-04 03:58:26', '2024-03-04 03:58:31'),
(31, 1, 2, 1, 'I00011', '2024-03-04 04:03:54', '2024-03-04 04:04:02'),
(32, 1, 3, 1, 'I00011', '2024-03-04 04:03:56', '2024-03-04 04:04:02'),
(33, 1, 5, 1, 'I00012', '2024-03-04 04:12:31', '2024-03-04 04:12:37'),
(34, 1, 6, 1, 'I00012', '2024-03-04 04:12:34', '2024-03-04 04:12:37'),
(35, 1, 1, 1, NULL, '2024-03-04 06:20:35', '2024-03-04 06:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `Reference` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Dibayar` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `orderId`, `userid`, `nama`, `Reference`, `detail`, `total`, `Status`, `Dibayar`, `created_at`, `updated_at`) VALUES
(56, 'BE00001', 1, 'Rasyid Shiddiq', 'DS183172422C3UBEN6Z8VG4X', 'Product 1', 20000, NULL, NULL, '2024-03-04 06:20:34', '2024-03-04 06:20:34'),
(57, 'BE00002', 1, 'Rasyid Shiddiq', 'DS1831724E58Q4A6HZ2MSY1R', 'Product 1', 20000, NULL, NULL, '2024-03-04 06:23:46', '2024-03-04 06:23:46'),
(58, 'BE00003', 1, 'Rasyid Shiddiq', 'DS1831724AG7VNUHQ2ZFBMZT', 'Product 6', 1500000, NULL, NULL, '2024-03-04 06:37:56', '2024-03-04 06:37:56'),
(59, 'CA00001', 1, 'Rasyid Shiddiq', 'DS18317242KWIL7X0ODBCED1', 'Cash Rp 10.000', 10000, NULL, NULL, '2024-03-04 06:39:48', '2024-03-04 06:39:48');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_03_01_020845_create_users', 1),
(3, '2024_03_01_022352_create_produk', 1),
(4, '2024_03_01_023114_create_cart', 1),
(5, '2024_03_01_024057_create_history_trans', 1),
(6, '2024_03_04_100737_create_callback', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `name`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', 20000, NULL, NULL),
(2, 'Product 2', 50000, NULL, NULL),
(3, 'Product 3', 1000000, NULL, NULL),
(4, 'Product 4', 25000, NULL, NULL),
(5, 'Product 5', 70000, NULL, NULL),
(6, 'Product 6', 1500000, NULL, NULL),
(7, 'Product 7', 30000, NULL, NULL),
(8, 'Product 8', 80000, NULL, NULL),
(9, 'Product 9', 2000000, NULL, NULL),
(10, 'Product 10', 15000, NULL, NULL),
(22, 'halo', 10000, '2024-03-04 06:25:08', '2024-03-04 06:25:08');

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
(1, 'Rasyid', 'rasidokai@gmail.com', NULL, '8e96b55a8113d4479ac6084de59b52b4', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `callbacks`
--
ALTER TABLE `callbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
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
-- AUTO_INCREMENT for table `callbacks`
--
ALTER TABLE `callbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
