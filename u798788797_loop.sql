-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 06:46 AM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u798788797_loop`
--
CREATE DATABASE IF NOT EXISTS `u798788797_loop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u798788797_loop`;

-- --------------------------------------------------------

--
-- Table structure for table `local_review`
--

DROP TABLE IF EXISTS `local_review`;
CREATE TABLE `local_review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewer_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint(1) NOT NULL,
  `review_title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_full` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` date NOT NULL,
  `upvote_count` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_review`
--

INSERT INTO `local_review` (`review_id`, `product_id`, `product_name`, `reviewer_name`, `rating`, `review_title`, `review_full`, `review_date`, `upvote_count`) VALUES
(1, 1, 'Asus Zenfone Max Pro M1', 'Sayantan Saha', 5, 'Value for money', 'Good Display, Good Camera, Awesome battery backup.', '2019-05-21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

DROP TABLE IF EXISTS `product_info`;
CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_id`, `product_name`, `price`) VALUES
(1, 'Asus Zenfone Max Pro M1', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `shop_info`
--

DROP TABLE IF EXISTS `shop_info`;
CREATE TABLE `shop_info` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_review`
--

DROP TABLE IF EXISTS `shop_review`;
CREATE TABLE `shop_review` (
  `review_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `reviewer_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `review_title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_full` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` date NOT NULL,
  `upvote_count` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `local_review`
--
ALTER TABLE `local_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shop_info`
--
ALTER TABLE `shop_info`
  ADD PRIMARY KEY (`shop_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `shop_review`
--
ALTER TABLE `shop_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `local_review`
--
ALTER TABLE `local_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_info`
--
ALTER TABLE `shop_info`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_review`
--
ALTER TABLE `shop_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
