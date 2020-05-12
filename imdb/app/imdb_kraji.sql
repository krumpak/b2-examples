-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1:3306
-- Čas nastanka: 12. maj 2020 ob 16.05
-- Različica strežnika: 5.7.19
-- Različica PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `udelezenec02`
--

-- --------------------------------------------------------

--
-- Struktura tabele `imdb_kraji`
--

DROP TABLE IF EXISTS `imdb_kraji`;
CREATE TABLE IF NOT EXISTS `imdb_kraji` (
  `kraj_id` int(11) NOT NULL AUTO_INCREMENT,
  `kraj` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kraj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `imdb_kraji`
--

INSERT INTO `imdb_kraji` (`kraj_id`, `kraj`, `updated_at`, `created_at`) VALUES
(1, 'Los Angeles', '2020-05-12 15:31:11', '2020-05-12 15:31:11'),
(2, 'New York', '2020-05-12 15:31:24', '2020-05-12 15:31:24'),
(3, 'San Francisco', '2020-05-12 15:31:41', '2020-05-12 15:31:41'),
(4, 'Chicago', '2020-05-12 15:54:06', '2020-05-12 15:54:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
