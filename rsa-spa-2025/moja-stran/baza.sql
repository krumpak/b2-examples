-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2026 at 06:55 PM
-- Server version: 5.7.19
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udelezenec02`
--

-- --------------------------------------------------------

--
-- Table structure for table `celine`
--

DROP TABLE IF EXISTS `celine`;
CREATE TABLE IF NOT EXISTS `celine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `celine`
--

TRUNCATE TABLE `celine`;
--
-- Dumping data for table `celine`
--

INSERT INTO `celine` (`id`, `ime`) VALUES
(1, 'Evropa'),
(2, 'Azija'),
(3, 'Severna Amerika'),
(4, 'Južna Amerika'),
(5, 'Srednja Amerika'),
(6, 'Avstralija'),
(7, 'Arktika'),
(8, 'Afrika');

-- --------------------------------------------------------

--
-- Table structure for table `clanki`
--

DROP TABLE IF EXISTS `clanki`;
CREATE TABLE IF NOT EXISTS `clanki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` text CHARACTER SET utf8 NOT NULL,
  `datum` date NOT NULL,
  `slika` text CHARACTER SET utf8 NOT NULL,
  `celina_id` int(11) DEFAULT NULL,
  `clanek` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `clanki`
--

TRUNCATE TABLE `clanki`;
--
-- Dumping data for table `clanki`
--

INSERT INTO `clanki` (`id`, `naslov`, `datum`, `slika`, `celina_id`, `clanek`) VALUES
(1, 'Medvedi', '2025-12-03', 'medved.jpg', 1, 'Medvedi (znanstveno ime Ursidae) so veliki sesalci iz reda zveri. Vsi so krepkega telesa, z veliko lobanjo, močnimi nogami in kratkim repom. Živijo v Evraziji in Severni Ameriki ter v delih Severne Afrike in Južne Amerike. Večinoma so gozdne živali. V nasprotju z večino zveri uživajo veliko rastlinske hrane. Medtem ko je polarni medved večinoma mesojedec, orjaški panda pa se hrani skoraj v celoti z bambusom, je preostalih šest vrst vsejedih z različnim prehranjevanjem. Z izjemo posameznikov, ki se parijo in materami s svojimi mladiči, so medvedi ponavadi samotarske živali. Lahko so dnevne ali nočne živali in imajo odličen voh. Kljub njihovi težki gradnji in nerodni hoji, so medvedi spretni tekači, plezalci in plavalci. Medvedi uporabljajo zatočišča, kot so jame in hlodi, za svoje brloge; večina vrst medvedov je v brlogu v zimskem času za daljše obdobje hibernacije do 100 dni.'),
(2, 'Navadna rjava lisica', '2025-12-14', 'lisica.jpg', 7, 'Navádna rjava lisíca ali rdéča lisíca (znanstveno ime Vulpes vulpes) je zelo prilagodljiv sesalec iz družine psov (Canidae) saj naseljuje različne življenjske prostore. Naseljuje predele Evrope, Severne Amerike, Severne Afrike in večjega dela Azije. Navadna lisica ima okrog 50 podvrst, s številnimi barvnimi različicami kožuha. Ima podolgovato vitko telo, na glavi pa zelo gibljiva šilasta uhlja in ozek koničast smrček z redkimi dolgimi dlakami. Rep je dolg in košat, na koncu bel. Kožuh je rdeče-rjave barve, vrat in trebuh sta bela, spodnji del nog in konca uhljev pa temni. Telo je dolgo od 60 do 90 cm, rep od 35 do 50 cm; odrasli samci tehtajo do 10 kg. Živi v gozdnih predelih, ponekod v gorah. Zelo pogosto se zadržuje v bližini človeških naselij, tudi ob velikih mestih. Je zelo spretna in hitra. Okrog hodi v glavnem ponoči in lovi plen, išče odpadke in mrhovino. Hrani se z vsem, kar lahko ulovi, od majhnih sesalcev, žuželk, plazilcev, ptic, mrhovine, jagod ... Živi posamezno, redkeje v manjši skupini, in sicer v tleh v brlogu, do katerega izkoplje več izhodov. Pari se enkrat do dvakrat letno, navado pozimi. Brejost traja 52 dni, spomladi skoti od 4 do 8 mladičev (največ 12), ki se osamosvojijo po približno štirih mesecih. Ti tehtajo od 60 do 150 g. Lisjak pomaga pri vzreji.'),
(3, 'Ris', '2025-12-25', 'ris.jpg', 3, 'Risi (znanstveno ime Lynx) spadajo v družino mačk. Spada med zveri, tako kot tudi medved in volk. To so kratkorepe mačke na visokih nogah. Na konici uhljev imajo čop dlak, katerega pri drugih mačkah ni. Poznamo več vrst risov, ki poseljujejo Severno Ameriko, Evrazijo in Afriko. Na Slovenskem živi le ena vrsta, to je (navadni) ris. Ris je izjemno redka žival, poseljuje pa precejšne dele našega planeta. Hkrati je izredno plah in le redki ga vidijo v naravi. Lovi pretežno ponoči, podnevi pa počiva.'),
(4, 'Jelka', '2026-01-05', 'jelka.jpg', 1, 'Jélka (znanstveno ime Abies) je rod v družini borovk. Obsega 45-55 vedno zelenih vrst iglastih dreves. Pogosto raste na apnenčasti podlagi, kjer je veliko zračne vlage. Storži so pokončni, iglice rastejo v obe smeri. Vsa odrasla drevesa dosežejo višino 10-80 m in obseg debla 0.5-4 m. Krošnja je pri odrasli jelki ovalna, v starosti pa sploščena. Iglice so dolge 15 - 30 mm, razporejene v dveh vrstah, ploske, zgoraj bleščeče temno zelene, spodaj z dvema belima progama. Storži so pokončni, dolgi 10 - 16 cm in razpadejo na drevesu. Skorja je belo siva, pri mlajših drevesih gladka, s smolnimi grčami, pri starejših primerkih razpokana in hrapava. Les je rdečkasto bele ali skoraj bele barve z modrikastim odtenkom. Branike so izrazite.'),
(5, 'Goba', '2026-01-07', 'gobe.jpg', 4, 'Goba je mesnato, od nekaj milimetrov do več 10 centimetrov veliko plodišče nekaterih vrst gliv (Mycophyta), v katerem nastajajo spore. Z izrazom goba lahko imenujemo tudi celotni organizem s takim plodiščem (Macromycetes). Gobe živijo kot gniloživke (saprofiti), zajedavke (paraziti) ali v sožitju (simbiozi) z drugimi organizmi. Gobe gniloživke si energijo in potrebne organske snovi priskrbijo tako, da razkrajajo odmrle organske ostanke. Gobe, kot skupina organizmov z makroskopskim plodiščem, niso sistematska kategorija, saj si niso vse v ožjem sorodu. Med gobe prištevamo nekatere zaprtotrosnice (Ascomycetes), npr. užitne smrčke in gomoljike, kot tudi nekatere prostotrosnice (Basidiomycetes), npr. jurčke, lisičke in mušnice. Vendar pa med gobe ne uvrščamo tistih zaprtotrosnic, ki ne tvorijo makroskopskih plodišč, kot so npr. pivski kvas (Saccharomyces cerevisiae) in črna krušna plesen (Rhizopus nigricans). Tudi nekatere prostotrosnice ne tvorijo makroskopskih plodišč in jih zato ne uvrščamo med gobe. Taka je npr. žitna rja (Puccinia graminis) in koruzna snet (Ustilago maydis).'),
(17, 'Lesna sova', '2026-02-11', 'lesna-sova.jpg', 2, 'Lesna sova je srednje velika sova, ki zraste od 37–46 cm in ima razpon peruti med 81–105 cm.[4][5] Ima veliko glavo z velikimi, rjavimi očmi, ki so odlično prilagojene gledanju v popolni temi. Ta sova naj bi imela najboljši nočni vid med vsemi pticami, saj je v njeni mrežnici več kot 56.000 receptorjev za svetlobo na kvadratni milimeter.[6] Po celem telesu prevladujejo rjavi odtenki, ki se vzorčasto prelivajo od svetlih do temnih tonov.\r\n\r\nLovi ponoči in se hrani pretežno z mišmi in drugimi majhnimi glodavci, redkeje pa tudi z manjšimi pticami, žabami, deževniki in žuželkami.\r\n\r\nGnezdi v drevesnih duplih od februarja do junija.'),
(22, 'Koala', '2026-02-11', 'Koala.jpg', 6, 'Koala (znanstveno ime Phascolarctos cinereus) je rastlinojedi drevesni vrečar, ki izvira iz Avstralije in je edini danes živeči predstavnik družine Phascolarctidae.\r\n\r\nKoale bivajo v vzhodni in jugovzhodni Avstraliji v evkaliptovih gozdovih. So samotarske živali, ki so pretežno aktivne zvečer in ponoči. V primeru vremenskih skrajnosti se ne zatekajo v skrivališča, pač pa jih pred tem ščiti kožuh z dobrimi izolacijskimi lastnostmi, hladijo se predvsem s počivanjem na deblih, ki so hladnejša od okolice.\r\n\r\nSo specializirane živali, ki se prehranjujejo z evkaliptovimi listi. Ta hrana ima razmeroma malo energijsko bogatih snovi, je težko prebavljiva in vsebuje strupene presnovke, zaradi česar so se pri koalah razvile številne prilagoditve telesa, presnove in prebave ter vedenjskih vzorcev. Telo in okončine so prilagojene življenju na drevju, zaradi varčevanja z energijo večino dneva prespijo ter se izogibajo energijsko potratnemu vedenju; boji med samci so pogostejši le med paritveno sezono.\r\n\r\nSamci se parijo z vsemi godnimi samicami poleti. Samica letno skoti enega mladiča po dobrem mesecu brejosti, ki se razvija v trebušni vreči okoli 5 mesecev, osamosvoji se približno po enem letu starosti, spolno pa dozori ob starosti dveh let.[3]\r\n\r\nKoale je v preteklosti množičen lov zaradi krzna privedel na rob izumrtja, od leta 1927 pa je lov nanje prepovedan. Svetovna zveza za varstvo narave (IUCN) trenutno uvršča koale med ranljive vrste zaradi izgube življenjskega prostora ob nagli urbanizaciji ter razvoju kmetijstva in gozdnih požarih, pomemben delež pogina predstavljajo tudi prometne nesreče in okužbe s klamidijami. Ocene populacij se dokaj razlikujejo med seboj, zadnje poročilo omenja nekaj več kot 300.000 osebkov.[2] Na celini populacija sicer upada, vendar koale povzročajo veliko škode na otokih, kamor so bile vnešene umetno. Tam se zaradi odsotnosti plenilcev hitro razmnožujejo in zaradi prevelike številčnosti ogrožajo lokalno rastlinje. Njihovo število poskušajo oblasti na teh otokih zmanjšati s preseljevanjem in sterilizacijo, a brez večjih uspehov.[4]\r\n\r\nZaradi ljubkega videza, spominjajo namreč na plišastega medvedka, so koale priljubljene med turisti, posredno pa znatno prispevajo k prihodkom od turizma.');

-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

DROP TABLE IF EXISTS `uporabniki`;
CREATE TABLE IF NOT EXISTS `uporabniki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `geslo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ime` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `vloga` varchar(255) NOT NULL DEFAULT 'gost',
  `aktivnost` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `uporabniki`
--

TRUNCATE TABLE `uporabniki`;
--
-- Dumping data for table `uporabniki`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
