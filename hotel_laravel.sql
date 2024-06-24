-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 11:29 AM
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
-- Database: `hotel_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Abang Jago', 'Dimana lah', NULL, '2024-05-29 03:13:13', NULL),
(2, 'Kala', 'adaddad', NULL, '2024-05-25 14:28:52', '2024-05-25 14:28:52'),
(3, 'Timothy', 'Jl. Astaganaga', '2024-05-20 04:37:29', '2024-05-20 04:37:29', NULL),
(4, 'Customerlah', 'Jl wwalawee', '2024-05-20 19:36:30', '2024-05-25 14:27:32', '2024-05-25 14:27:32'),
(5, 'Seseorangaja', 'JLLALALAL', '2024-05-25 14:28:30', '2024-05-25 14:28:38', '2024-05-25 14:28:38'),
(6, 'Mister IUS', 'Jalan misterius', '2024-05-25 14:29:16', '2024-05-25 14:29:16', NULL),
(7, 'Misis Ius', 'Jalan MISISISIUS', '2024-05-25 14:29:28', '2024-06-04 05:03:59', '2024-06-04 05:03:59'),
(8, 'apa', 'apaaan', '2024-05-29 03:27:45', '2024-05-29 03:29:17', '2024-05-29 03:29:17'),
(9, 'coba', 'cobaoan', '2024-05-29 03:29:08', '2024-05-29 03:29:14', '2024-05-29 03:29:14');

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
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `hotel_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `city`, `image`, `hotel_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hotel A', 'Jalan A', 'Sidoarjo', '1718082263_hotel.jpg', '1', NULL, '2024-06-11 05:04:23', NULL),
(2, 'Hotel B', 'Jalan B', 'Malang', 'hotel1.jpg', '1', NULL, NULL, NULL),
(3, 'Hotel C', 'Jl.Kemana saja', 'Sidoarjo', 'hotel2.jpg', '2', '2024-03-25 13:38:50', '2024-03-25 13:38:50', NULL),
(4, 'Hotel D', 'Jl. Bersamamu', 'Singaraja', 'hotel3.jpeg', '2', '2024-03-25 13:38:50', '2024-03-25 13:38:50', NULL),
(5, 'Five Points', 'Jl. Raya Menukik', 'Surabaya', 'hotel4.jpg', '4', '2024-05-09 19:34:18', '2024-05-21 08:18:48', '2024-05-21 08:18:48'),
(6, 'Test', 'f', 'f', 'jj', '3', '2024-05-20 05:02:09', '2024-05-20 05:02:09', NULL),
(7, 'Hotel Merdeka', 'Jl. Tanjangan Semerbak', 'Sidoarjo', 'merdeka.jpg', '3', '2024-05-20 19:45:51', '2024-05-20 19:45:51', NULL),
(8, 'Hotel Kematian', 'Jl. Neraka', 'Kota kematian', 'kematian.jpg', '2', '2024-05-20 19:48:14', '2024-05-20 19:48:14', NULL),
(9, 'Hotel Juang Edit', 'Jl. Perjuangan Edit', 'Kota Perjuangan Edit', 'juang.jpg', '2', '2024-05-20 19:48:52', '2024-05-21 05:10:04', '2024-05-21 05:10:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_10_005805_create_hotels_table', 1),
(6, '2024_03_10_005825_create_products_table', 1),
(7, '2024_03_10_013243_addfk_produc_hotel_products_table', 2),
(8, '2024_03_11_054346_create_types_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `available_room` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `available_room`, `created_at`, `updated_at`, `deleted_at`, `hotel_id`) VALUES
(1, 'Kamar A', 1250000, 'kamar.jpg', 17, NULL, '2024-05-27 15:10:54', NULL, 1),
(2, 'Kamar B', 950000, 'kamar2.jpg', 6, NULL, NULL, NULL, 1),
(3, 'Kamar C', 750000, 'kamar3.jpg', 10, NULL, NULL, NULL, 2),
(4, 'Kamar D', 500000, '', 12, '2024-03-25 13:46:28', '2024-05-29 04:13:37', NULL, 3),
(5, 'Kamar E', 440000, '', 9, '2024-03-25 13:46:28', '2024-05-29 04:13:28', NULL, 4),
(6, 'Kamar OalahDalah', 599000, 'kamaroalah.jpg', 20, '2024-05-20 05:17:57', '2024-05-25 15:06:28', '2024-05-25 15:06:28', 5),
(7, 'Kamar Mencoba Edit', 70000, 'kamarcoba.jpg', 16, '2024-05-20 19:52:08', '2024-05-25 15:06:22', NULL, 8),
(8, 'Kamar Walaaa', 135000, 'wala.jpg', 20, '2024-05-28 03:09:46', '2024-05-29 04:16:33', NULL, 8),
(9, 'HotelMODALIN', 450600, 'modalin.jpg', 10, '2024-05-29 03:57:01', '2024-05-29 04:12:45', '2024-05-29 04:12:45', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_transaction`
--

CREATE TABLE `product_transaction` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_transaction`
--

INSERT INTO `product_transaction` (`product_id`, `transaction_id`, `quantity`, `subtotal`) VALUES
(1, 1, 1, 1300000),
(2, 2, 1, 950000),
(3, 16, 2, 1500000),
(4, 13, 2, 1000000),
(4, 15, 1, 500000),
(6, 14, 2, 1398000),
(7, 11, 1, 70000),
(7, 18, 1, 0),
(8, 17, 3, 405000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_date` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `user_id`, `transaction_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2024-05-06 23:45:11', NULL, NULL, NULL),
(2, 2, 1, '2024-05-06 23:45:11', NULL, NULL, NULL),
(3, 2, 2, '0000-00-00 00:00:00', '2024-05-20 09:44:59', '2024-05-20 09:44:59', NULL),
(4, 3, 2, NULL, '2024-05-20 19:35:10', '2024-06-03 15:01:03', '2024-06-03 15:01:03'),
(5, 2, 1, '2024-05-21 02:35:44', '2024-05-20 19:35:44', '2024-05-20 19:35:44', NULL),
(6, 2, 2, '2024-05-21 02:38:26', '2024-05-20 19:38:26', '2024-05-20 19:38:26', NULL),
(7, 3, 2, '2024-05-22 05:53:21', '2024-05-22 05:53:21', '2024-05-22 05:53:21', NULL),
(8, 3, 2, '2024-05-22 06:22:25', '2024-05-22 06:22:25', '2024-05-22 06:22:25', NULL),
(9, 1, 1, '2024-05-22 06:24:30', '2024-05-22 06:24:30', '2024-05-22 06:24:30', NULL),
(10, 1, 1, '2024-05-22 06:24:48', '2024-05-22 06:24:48', '2024-05-22 06:24:48', NULL),
(11, 3, 1, '2024-05-22 06:29:14', '2024-05-22 06:29:14', '2024-05-22 06:29:14', NULL),
(12, 1, 1, '2024-05-22 06:32:39', '2024-05-22 06:32:39', '2024-05-22 06:32:39', NULL),
(13, 3, 2, '2024-05-22 06:36:28', '2024-05-22 06:36:28', '2024-05-27 15:01:36', NULL),
(14, 7, 1, '2024-05-22 06:38:25', '2024-05-22 06:38:25', '2024-05-25 17:13:59', '2024-05-25 17:13:59'),
(15, 7, 1, '2024-05-27 16:25:28', '2024-05-27 16:25:28', '2024-05-27 16:25:28', NULL),
(16, 6, 2, '2024-05-28 01:52:43', '2024-05-28 01:52:43', '2024-05-28 01:52:43', NULL),
(17, 3, 2, '2024-05-30 08:28:17', '2024-05-30 08:28:17', '2024-06-03 14:21:42', NULL),
(18, 1, 1, '2024-06-03 17:18:55', '2024-06-03 17:18:55', '2024-06-04 03:41:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Inn', 'Nyaman wesss', NULL, '2024-05-28 05:10:44', NULL),
(2, 'Cottage', 'Tipe hotel yang cottage bangets', NULL, '2024-05-28 04:01:06', NULL),
(3, 'Resort', 'Tipe yang resort banget', NULL, NULL, NULL),
(4, 'Elmi', 'Apa ya ini tipenya', '2024-05-09 18:45:15', '2024-05-09 18:45:15', NULL),
(5, 'Anjays', 'Coba jam sekarang', '2024-05-09 18:59:36', '2024-06-04 05:04:09', '2024-06-04 05:04:09'),
(6, 'Waduh', 'oker', '2024-05-20 20:32:50', '2024-05-28 03:08:56', '2024-05-28 03:08:56'),
(7, 'coba', 'coba', '2024-05-28 03:21:26', '2024-05-28 04:04:09', '2024-05-28 04:04:09'),
(8, 'Tipe', 'Baru', '2024-05-29 03:23:38', '2024-05-29 03:30:03', '2024-05-29 03:30:03'),
(9, 'tipecobabaru', 'barusandicoba', '2024-05-29 03:29:54', '2024-05-29 03:29:58', '2024-05-29 03:29:58'),
(10, 'Lah', 'Lah', '2024-06-04 05:05:56', '2024-06-04 05:06:30', '2024-06-04 05:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'guest',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Deni', 'deni@gmail.com', 'guest', NULL, '', NULL, NULL, NULL),
(2, 'Ani', 'ani@gmail.com', 'guest', NULL, '', NULL, NULL, NULL),
(3, 'timi', 'timi@gmail.com', 'guest', NULL, '$2y$12$EVR/HEnVrKAX.a/S7iA9ouTHYJw2IwhBNpR7olvygKLj3o0OxJgFS', NULL, '2024-06-04 04:18:06', '2024-06-04 04:18:06'),
(4, 'admin', 'admin@gmail.com', 'owner', NULL, '$2y$12$tX3FUZ2N43LYL.olDS1kau2Uf1JEyiB1OTRKQU7o2saY1Rr2PZi9.', NULL, '2024-06-04 04:47:52', '2024-06-04 04:47:52'),
(5, 'adminaja', 'adminaja@gmail.com', 'guest', NULL, '$2y$12$O0yDQn19DY3nwRqEMeTOruyL/qadIg7xEZ9Izpna/op6JEGXzq3xi', NULL, '2024-06-04 04:49:20', '2024-06-04 04:49:20'),
(6, 'adminasli', 'adminasli@gmail.com', 'owner', NULL, '$2y$12$7hNMSlkCsEPhhLc2H.Yxp.adD2PIuCkPNTkrt1cOwJBKQ4p4MzLSi', NULL, '2024-06-04 04:51:28', '2024-06-04 04:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD PRIMARY KEY (`product_id`,`transaction_id`),
  ADD KEY ` product_transaction_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD CONSTRAINT `product_transaction_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
