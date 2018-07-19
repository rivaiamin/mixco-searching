-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2016 at 10:36 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mixco`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(10) UNSIGNED NOT NULL,
  `budget` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `budget`) VALUES
(1, 'Premium/VVIP'),
(2, 'Low Cost'),
(3, 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `code`, `category`) VALUES
(1, 'HM', 'Honeymoon'),
(3, 'VAC', 'Vacation'),
(4, 'VIS', 'Family Gath'),
(5, 'BUS', 'Business Purpose');

-- --------------------------------------------------------

--
-- Table structure for table `food_interest`
--

CREATE TABLE `food_interest` (
  `id` int(10) UNSIGNED NOT NULL,
  `interest` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_interest`
--

INSERT INTO `food_interest` (`id`, `interest`) VALUES
(1, 'Indonesia'),
(2, 'Western'),
(3, 'Japanese'),
(4, 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `nationality` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapping`
--

CREATE TABLE `mapping` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `special_interest_id` int(10) UNSIGNED NOT NULL,
  `seasonality_id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `parties_id` int(10) UNSIGNED NOT NULL,
  `food_interest_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_12_035750_create_table_province', 1),
('2016_03_12_035825_create_table_category', 1),
('2016_03_12_035840_create_table_special_interest', 1),
('2016_03_12_035903_create_table_seasonality', 1),
('2016_03_12_035918_create_table_budget', 1),
('2016_03_12_035932_create_table_parties', 1),
('2016_03_12_035938_create_table_food_interest', 1),
('2016_03_12_035949_create_table_video', 1),
('2016_03_12_040001_create_table_mapping', 1),
('2016_03_12_043245_create_table_guest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `number`) VALUES
(4, 'Couples'),
(5, 'Family'),
(6, 'Single'),
(7, 'More than 20 People');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `code`, `province`) VALUES
(3, 'JKT', 'DKI Jakarta'),
(4, 'JABAR', 'Jawa Barat'),
(5, 'JATENG', 'Jawa Tengah'),
(6, 'DIY', 'DI Yogyakarta'),
(7, 'JATIM', 'Jawa Timur'),
(8, 'NAD', 'Nanggroe Aceh Darussalam'),
(9, 'SUMUT', 'Sumatera Utara'),
(10, 'SUMBAR', 'Sumatera Barat'),
(11, 'RIAU', 'Riau'),
(12, 'JMB', 'Jambi'),
(13, 'SUMSEL', 'Sumatera Selatan'),
(14, 'LMP', 'Lampung'),
(15, 'KALBAR', 'Kalimantan Barat'),
(16, 'KALTENG', 'Kalimanatan Tengah'),
(17, 'KALSEL', 'Kalimantan Selatan'),
(18, 'KALTIM', 'Kalimantan Timur'),
(19, 'SULUT', 'Sulawesi Utara'),
(20, 'SULTENG', 'Sulawesi Tengah'),
(21, 'SULSEL', 'Sulawesi Selatan'),
(22, 'SULRA', 'Sulawesi Tenggara'),
(23, 'MLK', 'Maluku'),
(24, 'BALI', 'Bali'),
(25, 'NTB', 'Nusa Tenggara Barat'),
(26, 'NTT', 'Nusa Tenggara Timur'),
(27, 'PAPUA', 'Papua'),
(28, 'BKL', 'Bengkulu'),
(29, 'MALUT', 'Maluku Utara'),
(30, 'BTN', 'Banten'),
(31, 'BALBEL', 'Kep. Bangka Belitung'),
(32, 'GRT', 'Gorontalo'),
(33, 'KEPRI', 'Kep. Riau'),
(34, 'PABAR', 'Papua Barat '),
(35, 'SULBAR', 'Sulawesi Barat');

-- --------------------------------------------------------

--
-- Table structure for table `seasonality`
--

CREATE TABLE `seasonality` (
  `id` int(10) UNSIGNED NOT NULL,
  `seasonality` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seasonality`
--

INSERT INTO `seasonality` (`id`, `seasonality`) VALUES
(2, 'Low Season'),
(3, 'Peak Season'),
(4, 'Summer'),
(5, 'Spring');

-- --------------------------------------------------------

--
-- Table structure for table `special_interest`
--

CREATE TABLE `special_interest` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interest` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_interest`
--

INSERT INTO `special_interest` (`id`, `code`, `interest`) VALUES
(1, 'BCH', 'Beach'),
(2, 'MNT', 'Mountain'),
(3, 'JGL', 'Jungle'),
(4, 'BUS', 'City Tour');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$DdDqp6hPE6/5FqCFmR5HfOCIJ2sVBVoPPNSifMhEaNPz/MWr0KsX.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_code_unique` (`code`);

--
-- Indexes for table `food_interest`
--
ALTER TABLE `food_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapping`
--
ALTER TABLE `mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapping_province_id_foreign` (`province_id`),
  ADD KEY `mapping_category_id_foreign` (`category_id`),
  ADD KEY `mapping_special_interest_id_foreign` (`special_interest_id`),
  ADD KEY `mapping_seasonality_id_foreign` (`seasonality_id`),
  ADD KEY `mapping_budget_id_foreign` (`budget_id`),
  ADD KEY `mapping_parties_id_foreign` (`parties_id`),
  ADD KEY `mapping_food_interest_id_foreign` (`food_interest_id`),
  ADD KEY `mapping_video_id_foreign` (`video_id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `province_code_unique` (`code`);

--
-- Indexes for table `seasonality`
--
ALTER TABLE `seasonality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_interest`
--
ALTER TABLE `special_interest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `special_interest_code_unique` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `food_interest`
--
ALTER TABLE `food_interest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mapping`
--
ALTER TABLE `mapping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `seasonality`
--
ALTER TABLE `seasonality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `special_interest`
--
ALTER TABLE `special_interest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mapping`
--
ALTER TABLE `mapping`
  ADD CONSTRAINT `mapping_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budget` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapping_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapping_food_interest_id_foreign` FOREIGN KEY (`food_interest_id`) REFERENCES `food_interest` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapping_parties_id_foreign` FOREIGN KEY (`parties_id`) REFERENCES `parties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapping_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapping_seasonality_id_foreign` FOREIGN KEY (`seasonality_id`) REFERENCES `seasonality` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapping_special_interest_id_foreign` FOREIGN KEY (`special_interest_id`) REFERENCES `special_interest` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapping_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
