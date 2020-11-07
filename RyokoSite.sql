-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2020 at 08:45 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RyokoSite`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
CREATE TABLE IF NOT EXISTS `Admin` (
                                       `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                       `name` varchar(75) COLLATE utf8_persian_ci NOT NULL,
                                       `surname` varchar(75) COLLATE utf8_persian_ci NOT NULL,
                                       `username` varchar(25) COLLATE utf8_persian_ci NOT NULL,
                                       `password` char(64) COLLATE utf8_persian_ci NOT NULL,
                                       `avatar` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
                                       `suspend` tinyint(1) NOT NULL DEFAULT '0',
                                       `access` json NOT NULL,
                                       `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                       `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                       PRIMARY KEY (`id`),
                                       UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `name`, `surname`, `username`, `password`, `avatar`, `suspend`, `access`, `createdAt`, `updatedAt`) VALUES
(1, 'ارسلان', 'احدیان', 'admin', 'd45f072f07bde78166e8f2f96c3dbfe83349b78e37b80293eb4ed99659e0e289', NULL, 0, '[\"0\"]', '2020-10-19 09:05:42', '2020-10-20 11:57:57'),
(12, 'نیما', 'اسعدی', 'n.ima', '206e445cf751eb8590384f98c865347546eb024c0a38b7e7cfe44693d19623f5', NULL, 0, '\"0\"', '2020-10-21 13:24:15', '2020-10-27 11:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

DROP TABLE IF EXISTS `Articles`;
CREATE TABLE IF NOT EXISTS `Articles` (
                                          `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                          `title` tinytext COLLATE utf8_persian_ci NOT NULL,
                                          `link` varchar(255) COLLATE utf8_persian_ci NOT NULL,
                                          `description` text COLLATE utf8_persian_ci NOT NULL,
                                          `demo` tinytext COLLATE utf8_persian_ci NOT NULL,
                                          `keywords` json NOT NULL,
                                          `image` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
                                          `score` float NOT NULL DEFAULT '0',
                                          `sCount` bigint(20) NOT NULL DEFAULT '0',
                                          `view` bigint(20) NOT NULL DEFAULT '0',
                                          `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                          `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                          PRIMARY KEY (`id`),
                                          UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Branches`
--

DROP TABLE IF EXISTS `Branches`;
CREATE TABLE IF NOT EXISTS `Branches` (
                                          `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                          `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
                                          `address` varchar(250) COLLATE utf8_persian_ci NOT NULL,
                                          `description` tinytext COLLATE utf8_persian_ci NOT NULL,
                                          `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                          `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                          PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
CREATE TABLE IF NOT EXISTS `Comments` (
                                          `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                          `name` varchar(75) COLLATE utf8_persian_ci NOT NULL,
                                          `surname` varchar(75) COLLATE utf8_persian_ci NOT NULL,
                                          `phoneNumber` char(11) COLLATE utf8_persian_ci NOT NULL,
                                          `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
                                          `text` tinytext COLLATE utf8_persian_ci NOT NULL,
                                          `articleId` bigint(20) NOT NULL,
                                          `status` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
                                          `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                          `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                          PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ContactUs`
--

DROP TABLE IF EXISTS `ContactUs`;
CREATE TABLE IF NOT EXISTS `ContactUs` (
                                           `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                           `name` varchar(75) COLLATE utf8_persian_ci NOT NULL,
                                           `surname` varchar(75) COLLATE utf8_persian_ci NOT NULL,
                                           `topic` tinytext COLLATE utf8_persian_ci NOT NULL,
                                           `phoneNumber` char(11) COLLATE utf8_persian_ci NOT NULL,
                                           `status` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
                                           `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                           `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                           PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

DROP TABLE IF EXISTS `News`;
CREATE TABLE IF NOT EXISTS `News` (
                                      `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                      `title` tinytext COLLATE utf8_persian_ci NOT NULL,
                                      `link` varchar(255) COLLATE utf8_persian_ci NOT NULL,
                                      `description` text COLLATE utf8_persian_ci NOT NULL,
                                      `demo` tinytext COLLATE utf8_persian_ci NOT NULL,
                                      `keywords` json NOT NULL,
                                      `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
                                      `archiveDate` date NOT NULL,
                                      `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                      `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                      PRIMARY KEY (`id`),
                                      UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE IF NOT EXISTS `Products` (
                                          `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                          `title` tinytext COLLATE utf8_persian_ci NOT NULL,
                                          `description` text COLLATE utf8_persian_ci NOT NULL,
                                          `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
                                          `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                          `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                          PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

DROP TABLE IF EXISTS `Projects`;
CREATE TABLE IF NOT EXISTS `Projects` (
                                          `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                          `title` tinytext COLLATE utf8_persian_ci NOT NULL,
                                          `link` varchar(255) COLLATE utf8_persian_ci NOT NULL,
                                          `description` text COLLATE utf8_persian_ci NOT NULL,
                                          `image` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
                                          `view` int(11) NOT NULL DEFAULT '0',
                                          `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                          `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                          PRIMARY KEY (`id`),
                                          UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Slider`
--

DROP TABLE IF EXISTS `Slider`;
CREATE TABLE IF NOT EXISTS `Slider` (
                                        `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                        `title` varchar(75) COLLATE utf8_persian_ci NOT NULL,
                                        `description` tinytext COLLATE utf8_persian_ci NOT NULL,
                                        `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
                                        `status` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '1',
                                        `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                        `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                        PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
