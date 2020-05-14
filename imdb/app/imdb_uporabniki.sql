-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1:3306
-- Čas nastanka: 14. maj 2020 ob 16.43
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
-- Struktura tabele `imdb_uporabniki`
--

DROP TABLE IF EXISTS `imdb_uporabniki`;
CREATE TABLE IF NOT EXISTS `imdb_uporabniki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uporabnik` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geslo` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vloga` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `imdb_uporabniki`
--

INSERT INTO `imdb_uporabniki` (`id`, `uporabnik`, `email`, `geslo`, `vloga`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Avtor', 'avtor@email.si', '3d9190983ed8eaa44ae2ac13d3702aabe1d042af', NULL, 1, '2020-05-14 16:30:00', '2020-05-14 16:30:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
