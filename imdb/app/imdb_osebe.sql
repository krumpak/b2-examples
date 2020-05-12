-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1:3306
-- Čas nastanka: 12. maj 2020 ob 16.22
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
-- Struktura tabele `imdb_osebe`
--

DROP TABLE IF EXISTS `imdb_osebe`;
CREATE TABLE IF NOT EXISTS `imdb_osebe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priimek` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kraj_id` int(8) DEFAULT NULL,
  `zanri` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ocena` int(11) NOT NULL DEFAULT '0',
  `filmi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nagrade` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kraj_id` (`kraj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `imdb_osebe`
--

INSERT INTO `imdb_osebe` (`id`, `ime`, `priimek`, `kraj_id`, `zanri`, `ocena`, `filmi`, `nagrade`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Scarlett', 'Johansson', 1, 'Akcija,Sci-Fi,Romantična komedija', 2, 'Sam doma 3,Iron man 2,Stotnik Amerika', 'Zlati globus,BAFTA', 1, '2020-05-12 16:03:44', '2020-04-23 16:06:07', '2020-05-07 18:15:19'),
(4, 'Brad', 'Pitt', 2, 'Akcija, sci-fi, drama', 7, 'Oceanovih 11, Klub golih pesti, Sedem', 'Academy Award, Zlati globus, BAFTA', 1, '2020-05-07 14:59:54', '2020-04-23 18:12:49', '2020-05-12 16:03:22'),
(6, 'Jennifer', 'Aniston', 3, 'Romantična komedija', 5, 'Vsemogočni Bruce, Marley in jaz', 'Emmy, GLAAD Media Awards', 1, '2020-05-07 17:57:00', '2020-04-23 18:16:03', '2020-05-07 18:11:12'),
(9, 'Robert', 'De Niro', 1, 'Kriminalka,drama, komedija', 10, 'Boter, Dobri možje', 'BAFTA,Emmy,Oskar', 1, '2020-05-12 16:02:35', '2020-04-28 08:02:45', '2020-05-07 18:12:53'),
(11, 'Julia', 'Roberts', 5, 'Drama, komedija', 0, 'Jeklene magnolije, Pobegla nevesta', 'Zlati globus, Oscar', 1, '2020-05-12 16:19:01', '2020-05-05 15:33:09', '2020-05-12 16:14:52');

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `imdb_osebe`
--
ALTER TABLE `imdb_osebe`
  ADD CONSTRAINT `imdb_osebe_ibfk_1` FOREIGN KEY (`kraj_id`) REFERENCES `imdb_kraji` (`kraj_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
