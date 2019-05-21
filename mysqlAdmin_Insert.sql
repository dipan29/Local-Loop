-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2019 at 08:26 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Category Name',
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Category Description',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `local_review`
--

DROP TABLE IF EXISTS `local_review`;
CREATE TABLE IF NOT EXISTS `local_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewer_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint(1) NOT NULL,
  `review_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_full` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upvote_count` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_review`
--

INSERT INTO `local_review` (`review_id`, `product_id`, `product_name`, `reviewer_name`, `rating`, `review_title`, `review_full`, `review_date`, `upvote_count`) VALUES
(1, 1, 'Asus Zenfone Max Pro M1', 'Sayantan Saha', 5, 'Value for money', 'Good Display, Good Camera, Awesome battery backup.', '2019-05-20 18:30:00', 3),
(2, 2, 'BEEEB', 'Karan Singh', 5, 'Very Nice Book', 'I loved the Book. Informative and Descriptive', '2018-08-10 18:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

DROP TABLE IF EXISTS `product_info`;
CREATE TABLE IF NOT EXISTS `product_info` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_id`, `upc`, `category`, `product_name`, `company`, `price`) VALUES
(1, NULL, 'Phones', 'Asus Zenfone Max Pro M1', 'Asus', 12000),
(2, '9789352711697', 'Books', 'Basic Environmental Engineering and Elementary Biology', 'Vikas Publications', 350);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

DROP TABLE IF EXISTS `product_review`;
CREATE TABLE IF NOT EXISTS `product_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `publisher` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewer_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint(1) NOT NULL,
  `review_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_full` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upvote_count` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`review_id`, `product_id`, `publisher`, `product_name`, `reviewer_name`, `rating`, `review_title`, `review_full`, `review_date`, `upvote_count`) VALUES
(1, 2, 'Amazon', 'Basic Environmental Engineering and Elementary Biology', 'Dipan', 4, 'Good Book', 'This book is very good for Environmental Chemistry of Second Year Makaut Students', '2019-05-21 07:12:54', 15),
(2, 2, 'Flipkart', 'Basic Environmental Engineering and Elementary Biology', 'Akash Saha', 3, 'I Give 3 Stars', 'Okay for Engineering Chemistry Second Year. Makaut Specified', '2019-05-21 07:12:54', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apiKey` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `description`, `website`, `api`, `apiKey`) VALUES
(1, 'Amazon', NULL, 'www.amazon.in', NULL, NULL),
(2, 'Flipkart', NULL, 'www.flipkart.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_info`
--

DROP TABLE IF EXISTS `shop_info`;
CREATE TABLE IF NOT EXISTS `shop_info` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`shop_id`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_review`
--

DROP TABLE IF EXISTS `shop_review`;
CREATE TABLE IF NOT EXISTS `shop_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `reviewer_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `review_title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_full` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` date NOT NULL,
  `upvote_count` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
