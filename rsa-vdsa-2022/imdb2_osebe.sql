-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1:3306
-- Čas nastanka: 29. mar 2022 ob 15.47
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
-- Struktura tabele `imdb2_osebe`
--

DROP TABLE IF EXISTS `imdb2_osebe`;
CREATE TABLE IF NOT EXISTS `imdb2_osebe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `priimek` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `imdb2_osebe`
--

INSERT INTO `imdb2_osebe` (`id`, `ime`, `priimek`, `status`, `updated_at`) VALUES
(1, 'Sebastian', 'Cavazza', 1, '2022-03-29 15:44:21'),
(2, 'Iva', 'Krajnc Bagola', 1, '2022-03-22 16:48:37'),
(3, 'Tanja', 'Ribič Đurić', 1, '2022-03-22 17:04:18'),
(4, 'Branko', 'Đurić – Đuro', 1, '2022-03-22 17:04:36'),
(5, 'Janez', 'Škof', 1, '2022-03-29 15:23:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
