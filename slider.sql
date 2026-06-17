-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2026 at 10:09 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slider`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `created_at`) VALUES
(1, 'Learning', '1781727693_DL-learning.svg', '2026-06-17 20:21:33'),
(2, 'Technology', '1781727717_DL-technology.svg', '2026-06-17 20:21:57'),
(3, 'Communication', '1781727765_DL-communication.svg', '2026-06-17 20:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `category_id`, `title`, `tag`, `image`, `link`, `sort_order`, `created_at`) VALUES
(1, 1, ' Usability enhancement and Training for Transaction Portal for Customers', 'DIGITAL LEARNING INFRASTRUCTURE', '1781728176_DL-Learning-1.jpg', 'https://www.wpoets.com/', 0, '2026-06-17 20:29:36'),
(2, 1, 'Interactive Learning Experiences', 'LEARNING SOLUTIONS', '1781728220_DL-Learning-1.jpg', 'https://www.wpoets.com/', 0, '2026-06-17 20:30:20'),
(3, 2, 'Cloud Transformation Platform', 'TECHNOLOGY', '1781728272_DL-Technology.jpg', 'https://www.wpoets.com/', 0, '2026-06-17 20:31:12'),
(4, 3, 'Corporate Communication System', 'COMMUNICATION', '1781728303_DL-Communication.jpg', 'https://www.wpoets.com/', 0, '2026-06-17 20:31:43'),
(5, 2, 'Test', 'Test', '1781732142_DL-Technology.jpg', 'https://www.wpoets.com/', 0, '2026-06-17 21:35:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
