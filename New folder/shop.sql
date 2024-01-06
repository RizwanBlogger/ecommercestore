-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 05:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(29) UNSIGNED NOT NULL,
  `product_qty` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KIDS', '2023-10-26 22:06:57', '2023-10-26 22:14:38'),
(2, 'FASHION', '2023-10-26 22:07:27', '2023-10-26 22:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(100) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(100) DEFAULT NULL,
  `address1` varchar(1000) DEFAULT NULL,
  `address2` varchar(1000) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phonenumber`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 'Rizwan', 'admin12121@gmail.com', '$2y$10$1cwq9b.Y0GjqMbaL2Y9RFusfAHYK3l53wIgAkaLx5d.kh9QRdejqi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-03 21:42:49', '2023-11-03 21:42:49'),
(2, 'BIlal', 'bilal@gmail.com', '$2y$10$77cMu5tdfL4NI6hZ87wx.ume6kGqV9f.WLt4FuL48jAd/shxB/xv.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-03 21:43:43', '2023-11-03 21:43:43'),
(3, 'Ali', 'adminqqq@gmail.com', '$2y$10$v2PWSeR2COARfRIh6./IAuWp012bwLx1KBBVVvRNTDjgVrnN85I/u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-04 21:03:43', '2023-11-04 21:03:43'),
(4, 'Rizwan12', 'adminssss@gmail.com', '$2y$10$N0WbsdYEtsSOUxvOKvzdiufofid5ewBOCJbm0893assKF6wt7Hwnq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-04 21:04:13', '2023-11-04 21:04:13'),
(5, 'Rizwan12', 'adminwwwww@gmail.com', '$2y$10$0CFxgwd4.AyX1o1MWRmk1uq9eY0/kcUOa3po2jDu9Zw50/40ZvCRu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-04 21:05:24', '2023-11-04 21:05:24'),
(6, 'KIDS', 'adminaaaaaaa@gmail.com', '$2y$10$J0m5SCaBuMeRCnpV6tTGW./QFe5umqRN6/QKnwuUxyYfv6LMDHQXy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-04 21:05:56', '2023-11-04 21:05:56'),
(7, 'Bilal', 'admin1122@gmail.com', '$2y$10$QUStyJ5uHS4aLvBcIFzq9OtCTkh3Yr1FxLcgfTsM5914oeQdRNotG', '03036153706', 'church Road', 'Church Road', 'Rahim Yar Khan', 'Punjab', 'Pakistan', '11111111', '2023-11-04 21:27:52', '2023-11-23 06:12:09'),
(8, 'KIDS', 'admin00@gmail.com', '$2y$10$5MnvHhb1vALXoGW4/yk8Juz/iOX.1SjOCW1AncvegZkVd.lowz.3G', '2342342', 'church Road', 'Church Road', 'Rahim Yar Khan', 'Punjab', 'Pakistan', '11111111', '2023-11-29 02:50:38', '2023-11-29 03:03:54'),
(9, 'Rizwan', 'admin1111@gmail.com', '$2y$10$qXz3Uj1gMmWyDnCpLI2fjOEeuXNAHQgaXsVDtCZSXh.a05MzJLwZ6', '03036153706', 'church Road', 'Church Road', 'Rahim Yar Khan', 'Punjab', 'Pakistan', '64200', '2023-11-30 04:17:42', '2023-11-30 04:18:48');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_27_024905_create_categories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '5', '1', '12', '2023-12-01 03:43:15', '2023-12-01 03:43:15'),
(2, '2', '4', '2', '15', '2023-12-01 05:48:13', '2023-12-01 05:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `ordres`
--

CREATE TABLE `ordres` (
  `name` varchar(100) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tracking_no` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT '0',
  `message` varchar(1000) DEFAULT NULL,
  `total_price` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordres`
--

INSERT INTO `ordres` (`name`, `id`, `email`, `user_id`, `tracking_no`, `phonenumber`, `address1`, `address2`, `state`, `country`, `city`, `pincode`, `status`, `message`, `total_price`, `created_at`, `updated_at`) VALUES
('Bilal', 1, 'admin1122@gmail.com', 7, 'PK-DEX415334', '03036153706', 'church Road', 'Church Road', 'Punjab', 'Pakistan', 'Rahim Yar Khan', '11111111', '1', NULL, '12', '2023-12-01 03:43:15', '2023-12-01 03:43:42'),
('Bilal', 2, 'admin1122@gmail.com', 7, 'PK-DEX590778', '03036153706', 'church Road', 'Church Road', 'Punjab', 'Pakistan', 'Rahim Yar Khan', '11111111', '0', NULL, '30', '2023-12-01 05:48:13', '2023-12-01 05:48:13');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `productdesc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `qty`, `productprice`, `status`, `image`, `category_id`, `productdesc`, `created_at`, `updated_at`) VALUES
(3, 'Easy Polo Black Edition', '0', '7', '0', '1698809276.jpg', 1, 'Easy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black Edition', '2023-10-31 22:27:56', '2023-11-19 21:57:14'),
(4, 'Easy Polo Black Edition', '15', '15', '0', '1698809675.jpg', 2, 'Easy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black Edition', '2023-10-31 22:34:35', '2023-10-31 22:34:35'),
(5, 'Easy Polo Black Edition', '23', '12', '0', '1700361678.jpg', 2, 'Easy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black Edition', '2023-11-18 21:41:18', '2023-11-18 21:41:18'),
(6, 'Easy Polo Black Edition', '6', '11', '0', '1700361718.jpg', 2, 'Easy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black Edition', '2023-11-18 21:41:58', '2023-11-18 21:41:58'),
(7, 'Easy Polo Black Edition', '25', '4', '0', '1700361775.png', 1, 'Easy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black Edition', '2023-11-18 21:42:55', '2023-11-18 21:42:55'),
(8, 'Easy Polo Black Edition', '3', '7', '0', '1700361814.png', 1, 'Easy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black EditionEasy Polo Black Edition', '2023-11-18 21:43:34', '2023-11-18 21:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stars_rated` varchar(100) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, 7, 4, '1', '2023-12-01 05:48:22', '2023-12-01 05:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bilal', 'admin@gmail.com', '1', NULL, '$2y$10$1cwq9b.Y0GjqMbaL2Y9RFusfAHYK3l53wIgAkaLx5d.kh9QRdejqi', NULL, '2023-10-21 11:03:02', '2023-10-24 21:08:16'),
(14, 'Rizwan', 'admin2@gmail.com', '1', NULL, '$2y$10$PwFdS4zQoXU7b/vBYGRUHOtDanBR/C2rrOXe3H/KhS1Gge/GoeqNS', NULL, '2023-10-24 21:28:06', '2023-10-24 21:28:06'),
(15, 'Rizwan12', 'admin12@gmail.com', '0', NULL, '$2y$10$GDnpwlsJy8PjS9Fb7UqM0.mUNKCnKZmqsCbq4B.muPkqqalwEkOoa', NULL, '2023-10-24 21:29:33', '2023-10-24 21:29:33'),
(16, 'admin', 'admin11222@gmail.com', '1', NULL, '$2y$10$YRHVzMlYD8xVH9wE0EtKM.oBlSTPNWTRMQ9RyQxQVS8gf.KO5O08u', NULL, '2023-11-17 23:35:04', '2023-11-17 23:35:04'),
(17, 'Qazi', 'abc@gmail.com', '1', NULL, '$2y$10$EQhSeRezHTUoYvg2IXe2oODpqvY2p8qSjpWt.kKsGg9p1Y8/qlHou', NULL, '2023-11-30 05:05:30', '2023-11-30 05:05:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `product` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordres`
--
ALTER TABLE `ordres`
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
  ADD KEY `shop` (`category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordres`
--
ALTER TABLE `ordres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `shop` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
