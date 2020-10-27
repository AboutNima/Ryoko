-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2020 at 08:30 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`id`, `title`, `link`, `description`, `demo`, `keywords`, `image`, `score`, `sCount`, `view`, `createdAt`, `updatedAt`) VALUES
(2, 'این یک مقاله برای تست نظرات است', 'این-یک-مقاله-برای-تست-نظرات-است', '<p>این یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات است</p>\r\n', 'این یک مقاله برای تست نظرات استاین یک مقاله برای تست نظرات است', '[\"مقاله\", \"تست\", \"نظرات\", \"جدید\"]', 'public/home/media/articles/38d2b7319e693ec3e131dd22e55398c44ab4f116.jpg', 0, 0, 0, '2020-10-22 23:11:37', '2020-10-22 23:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `Branches`
--

DROP TABLE IF EXISTS `Branches`;
CREATE TABLE IF NOT EXISTS `Branches` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_persian_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`id`, `name`, `surname`, `phoneNumber`, `email`, `text`, `articleId`, `status`, `createdAt`, `updatedAt`) VALUES
(2, 'ارسلان', 'احدیان', '09152368096', NULL, 'این نظر برای تست است و دوست دارد که تست بشود', 2, '0', '2020-10-27 11:24:50', '2020-10-27 11:58:02');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`id`, `title`, `link`, `description`, `demo`, `keywords`, `image`, `archiveDate`, `createdAt`, `updatedAt`) VALUES
(1, 'تست', 'تست', '<p>تست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی استتست برای خبر تست خیلی تست خوبی است شاید باورت نشود که خبر تست خیلی خبر خوبی است</p>\r\n', 'این خبر صرفا برای تست می باشد', '[\"تست\", \"خبر\", \"جدید\"]', 'public/home/media/news/5355325b3102176fd697e0a238d03edf5bbfffe5.png', '2020-10-20', '2020-10-19 15:27:40', '2020-10-20 11:52:51');

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
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`id`, `title`, `link`, `description`, `image`, `createdAt`, `updatedAt`) VALUES
(1, 'این پروژه صرفا برای تست است', 'این-پروژه-صرفا-برای-تست-است', '<p>این پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست استاین پروژه صرفا برای تست است</p>\r\n', 'public/home/media/projects/73f10ce67c63783a63328e46c7e873eeae99087f.jpg', '2020-10-26 12:36:17', '2020-10-26 12:36:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
