-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2022 at 12:36 AM
-- Server version: 8.0.24
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo-wamd`
--

-- --------------------------------------------------------

--
-- Table structure for table `autoreplies`
--

CREATE TABLE `autoreplies` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `device` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','image','button','template') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blasts`
--

CREATE TABLE `blasts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `receiver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','button','image','template') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('failed','success') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `body` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `webhook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messages_sent` int NOT NULL DEFAULT '0',
  `status` enum('Connected','Disconnect') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `numbers`
--

INSERT INTO `numbers` (`id`, `user_id`, `body`, `webhook`, `messages_sent`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '111111111111', NULL, 0, 'Disconnect', '2022-06-16 02:22:24', '2022-06-16 02:22:24'),
(3, 2, '1234567890', NULL, 0, 'Disconnect', '2022-06-17 14:52:20', '2022-06-17 14:52:20'),
(4, 7, '0231234567', NULL, 0, 'Disconnect', '2022-06-28 10:48:39', '2022-06-28 10:48:39'),
(5, 8, '4567897655', 'Id autem suscipit ad', 0, 'Disconnect', '2022-06-28 11:22:16', '2022-06-28 11:22:16'),
(6, 25, '2345678956', NULL, 0, 'Disconnect', '2022-06-28 15:32:43', '2022-06-28 15:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Lorem ipsum ', 1, '2022-06-27 11:02:14', '2022-06-27 11:02:14'),
(2, 'User', 'Lorem ipsum ', 1, '2022-06-27 11:02:14', '2022-06-27 11:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numbers` json NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL,
  `is_executed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_date` date DEFAULT NULL,
  `life_time` tinyint(1) NOT NULL DEFAULT '0',
  `device_limit` int DEFAULT NULL,
  `api_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chunk_blast` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `email_verified_at`, `password`, `expired_date`, `life_time`, `device_limit`, `api_key`, `chunk_blast`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 2, 'mzeyn', 'mzeyn28@gmail.com', NULL, '$2y$10$1MipPb2gJrQM1lYEzykcHeRFR.dqKWcSwKKaSpQRBP4Pm1RpG4c0C', NULL, 0, 2, '', 0, NULL, '2022-06-16 02:21:45', '2022-06-28 11:10:46'),
(4, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$C2hXgSbc9HmUtGMEZblI1OgLE.etrzqUjMTSab8A15dLJgWC1rNXa', NULL, 0, NULL, '7P8nJDS6MLHgZIDzIdt7T8sakj4q6Y', 0, NULL, '2022-06-17 21:50:52', '2022-06-22 02:11:08'),
(7, 2, 'test', NULL, NULL, '$2y$10$XomTxgqkjpfrEroK..flVukyBQcr3YUOsi/rTW5cdxrH5kEjOp0Ea', '2022-06-28', 0, 1, 'LacIwvMjV1Ye9GZzpHgR8qTtDICqDt', NULL, NULL, '2022-06-28 10:45:41', '2022-06-28 10:55:29'),
(8, 2, 'lumoqonyg', NULL, NULL, '$2y$10$57G3zVWjnEu5ChGGi25Jx.4DlfpQkVS.R1T3tzfEkWSznJrB7LQrS', '2022-07-07', 0, 2, NULL, NULL, NULL, '2022-06-28 11:21:41', '2022-06-28 11:21:41'),
(13, 2, 'Abcde', NULL, NULL, '$2y$10$MZ8otZiwqhI49xfwK5w6leNScwYJ3gy4MfHVY8RTervZ.Zu5cJhVi', '2022-07-08', 0, 2, NULL, NULL, NULL, '2022-06-28 15:03:24', '2022-06-28 15:03:35'),
(14, 2, 'xyzed', NULL, NULL, '$2y$10$NCwLvnDgMujSHe.tGTgg7egzBGn9r6NBVzkI7FBQHe/Xt/tMYwXMu', NULL, 1, 3, NULL, NULL, NULL, '2022-06-28 15:07:53', '2022-06-28 15:08:14'),
(15, 2, 'menujyd', NULL, NULL, '$2y$10$PbdxLLw2Q9tQd.vpSLYojeR0Z.LpYYHpliQ.LtNyDn7MRSzVnl9RS', '2017-01-08', 0, 57, NULL, NULL, NULL, '2022-06-28 15:10:52', '2022-06-28 15:10:52'),
(16, 2, 'tisyxicob', NULL, NULL, '$2y$10$nH9icONykhD8RNjrNlEsQOPSLGuTQgP84eBqOTdFKzRRzBhc9LGKi', '2009-12-24', 0, 53, NULL, NULL, NULL, '2022-06-28 15:11:12', '2022-06-28 15:11:12'),
(17, 2, 'nuculo', NULL, NULL, '$2y$10$weuu4.Hwu58TQIPpgC8ygeDl5H52SPv6YwJWvz6x5lalSYfGIlFyu', '1978-12-11', 0, 30, NULL, NULL, NULL, '2022-06-28 15:11:41', '2022-06-28 15:11:41'),
(18, 2, 'nicut', NULL, NULL, '$2y$10$iAU54a3mwmBqI5q4DtqPYexd0Af95Q4LnTJUBIUtxDfMBo.qPzw7.', '2017-08-29', 0, 94, NULL, NULL, NULL, '2022-06-28 15:13:27', '2022-06-28 15:13:27'),
(19, 2, 'ghhh', NULL, NULL, '$2y$10$Qws4TWYZnbN1FGlA3jah1ew7fiRnno0NmwBsI8VH9IYdsD37YVsjC', NULL, 0, 3, NULL, NULL, NULL, '2022-06-28 15:14:11', '2022-06-28 15:14:11'),
(20, 2, 'fujalyvyl', NULL, NULL, '$2y$10$gasEh3Wor6zlZ3SC.mChoO.r.3tle/hj1oiZ05Nlr1RAHae9kvSp2', NULL, 0, 100, NULL, NULL, NULL, '2022-06-28 15:15:09', '2022-06-28 15:15:09'),
(21, 2, 'jonupone', NULL, NULL, '$2y$10$gLjm/3USXgvPnKKz1x..KuWRwjSHp9vw/Ob2W18soD/LT2uzTQ5wq', NULL, 0, 65, NULL, NULL, NULL, '2022-06-28 15:20:01', '2022-06-28 15:20:01'),
(22, 2, 'nolikaceb', NULL, NULL, '$2y$10$46bVDsHN7zZmFcJRMF19cebP2HKzjrsjbDUCsYYTLlFqgf7c290/C', NULL, 0, 52, NULL, NULL, NULL, '2022-06-28 15:22:22', '2022-06-28 15:22:22'),
(23, 2, 'sugizyx', NULL, NULL, '$2y$10$FLuLqNWRfRx/WmPBXR5/OOHOF.eF0AIKGmtEF0xNzvNoOr7kqPK8m', NULL, 1, 7, NULL, NULL, NULL, '2022-06-28 15:24:32', '2022-06-28 15:24:32'),
(25, 2, 'fcpeded', NULL, NULL, '$2y$10$2gO7noBUxhco9S0DUXekDuqP2R8g.X6qxQikurVhTZc9OL0OaIrVq', '2022-07-06', 0, 3, NULL, NULL, NULL, '2022-06-28 15:30:32', '2022-06-28 15:33:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoreplies`
--
ALTER TABLE `autoreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blasts`
--
ALTER TABLE `blasts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blasts_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbers`
--
ALTER TABLE `numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `autoreplies`
--
ALTER TABLE `autoreplies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blasts`
--
ALTER TABLE `blasts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `numbers`
--
ALTER TABLE `numbers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blasts`
--
ALTER TABLE `blasts`
  ADD CONSTRAINT `blasts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
