-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Loomise aeg: Veebr 07, 2015 kell 12:31 PL
-- Serveri versioon: 5.6.16
-- PHP versioon: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Andmebaas: `mapping`
--
CREATE DATABASE IF NOT EXISTS `mapping` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mapping`;

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `Ci_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `County_CO_ID` int(10) unsigned NOT NULL,
  `City` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Ci_ID`),
  UNIQUE KEY `Ci_ID_UNIQUE` (`Ci_ID`),
  UNIQUE KEY `Citycol_UNIQUE` (`City`),
  KEY `fk_City_County_idx` (`County_CO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=214 ;

--
-- Andmete tõmmistamine tabelile `city`
--

INSERT INTO `city` (`Ci_ID`, `County_CO_ID`, `City`) VALUES
(1, 1, 'Aegviidu vald'),
(2, 1, 'Anija vald'),
(3, 1, 'Harku vald'),
(4, 1, 'Joelahtme vald'),
(5, 1, 'Kehra'),
(6, 1, 'Keila'),
(7, 1, 'Keila vald'),
(8, 1, 'Kernu vald'),
(9, 1, 'Kiili vald'),
(10, 1, 'Kose vald'),
(11, 1, 'Kuusalu vald'),
(12, 1, 'Loksa'),
(13, 1, 'Maardu'),
(14, 1, 'Nissi vald'),
(15, 1, 'Padise vald'),
(16, 1, 'Paldiski'),
(17, 1, 'Raasiku vald'),
(18, 1, 'Rae vald'),
(19, 1, 'Saku vald'),
(20, 1, 'Saue'),
(21, 1, 'Tallinn'),
(22, 1, 'Vasalemma vald'),
(23, 1, 'Viimsi vald'),
(24, 2, 'Emmaste vald'),
(25, 2, 'Hiiu vald'),
(26, 2, 'Käina vald'),
(27, 2, 'Pühalepa vald'),
(28, 3, 'Alajõe vald'),
(29, 3, 'Aseri vald'),
(30, 3, 'Avinurme vald'),
(31, 3, 'Iisaku vald'),
(32, 3, 'Illuka vald'),
(33, 3, 'Jõhvi vald'),
(34, 3, 'Kiviõli'),
(35, 3, 'Kohtla vald'),
(36, 3, 'Kohtla-Järve'),
(37, 3, 'Kohtla-Nõmme vald'),
(38, 3, 'Lohusuu vald'),
(39, 3, 'Lüganuse vald'),
(40, 3, 'Mäetaguse vald'),
(41, 3, 'Narva'),
(42, 3, 'Narva-Jõesuu'),
(43, 3, 'Sillamäe'),
(44, 3, 'Sonda vald'),
(45, 3, 'Toila vald'),
(46, 3, 'Tudulinna vald'),
(47, 3, 'Vaivara vald'),
(48, 4, 'Jõgeva'),
(49, 4, 'Jõgeva vald'),
(50, 4, 'Kasepää vald'),
(51, 4, 'Mustvee'),
(52, 4, 'Pajusi vald'),
(53, 4, 'Pala vald'),
(54, 4, 'Palamuse vald'),
(55, 4, 'Puurmani vald'),
(56, 4, 'Põltsamaa'),
(57, 4, 'Põltsamaa vald'),
(58, 4, 'Saare vald'),
(59, 4, 'Tabivere'),
(60, 4, 'Torma vald'),
(61, 5, 'Albu vald'),
(62, 5, 'Ambla vald'),
(63, 5, 'Imavere vald'),
(64, 5, 'Järva-Jaani vald'),
(65, 5, 'Kareda vald'),
(66, 5, 'Koeru vald'),
(67, 5, 'Koigi vald'),
(68, 5, 'Paide'),
(69, 5, 'Paide vald'),
(70, 5, 'Roosna-Alliku vald'),
(71, 5, 'Türi vald'),
(72, 5, 'Väätsa vald'),
(73, 6, 'Haapsalu'),
(74, 6, 'Hanila vald'),
(75, 6, 'Lihula vald'),
(76, 6, 'Lääne-Nigula vald'),
(77, 6, 'Martna vald'),
(78, 6, 'Noarootsi vald'),
(79, 6, 'Nõva vald'),
(80, 6, 'Ridala'),
(81, 6, 'Vormsi vald'),
(82, 7, 'Haljala vald'),
(83, 7, 'Kadrina vald'),
(84, 7, 'Kunda'),
(85, 7, 'Laekvere vald'),
(86, 7, 'Rakke vald'),
(87, 7, 'Rakvere'),
(88, 7, 'Rakvere vald'),
(89, 7, 'Rägavere vald'),
(90, 7, 'Sõmeru vald'),
(91, 7, 'Tamsalu vald'),
(92, 7, 'Tapa vald'),
(93, 7, 'Vihula'),
(94, 7, 'Vinni vald'),
(95, 7, 'Viru-Nigula vald'),
(96, 7, 'Väike-Maarja vald'),
(97, 8, 'Ahja vald'),
(98, 8, 'Kanepi vald'),
(99, 8, 'Kõlleste vald'),
(100, 8, 'Laheda vald'),
(101, 8, 'Mikitamäe vald'),
(102, 8, 'Mooste vald'),
(103, 8, 'Orava vald'),
(104, 8, 'Põlva vald'),
(105, 8, 'Räpina vald'),
(106, 8, 'Valgjärve vald'),
(107, 8, 'Vastse-Kuuste vald'),
(108, 8, 'Veriola vald'),
(109, 8, 'Värska vald'),
(110, 9, 'Are vald'),
(111, 9, 'Audru vald'),
(112, 9, 'Halinga vald'),
(113, 9, 'Häädemeeste vald'),
(114, 9, 'Kihnu vald'),
(115, 9, 'Koonga vald'),
(116, 9, 'Paikuse vald'),
(117, 9, 'Pärnu'),
(118, 9, 'Saarde vald'),
(119, 9, 'Sauga vald'),
(120, 9, 'Sindi'),
(121, 9, 'Surju vald'),
(122, 9, 'Tahkuranna vald'),
(123, 9, 'Tootsi vald'),
(124, 9, 'Tori vald'),
(125, 9, 'Tõstamaa vald'),
(126, 9, 'Varbla vald'),
(127, 9, 'Vändra alevvald'),
(128, 9, 'Vändra vald'),
(129, 10, 'Juuru vald'),
(130, 10, 'Järvakandi vald'),
(131, 10, 'Kaiu vald'),
(132, 10, 'Kehtna vald'),
(133, 10, 'Kohila vald'),
(134, 10, 'Käru vald'),
(135, 10, 'Märjamaa vald'),
(136, 10, 'Raikküla vald'),
(137, 10, 'Rapla vald'),
(138, 10, 'Vigala vald'),
(139, 11, 'Kuressaare vald'),
(140, 11, 'Lääne-Saare vald'),
(141, 11, 'Kihelkonna vald'),
(142, 11, 'Laimjala vald'),
(143, 11, 'Leisi vald'),
(144, 11, 'Muhu vald'),
(145, 11, 'Mustjala vald'),
(146, 11, 'Orissaare vald'),
(147, 11, 'Pihtla vald'),
(148, 11, 'Pöide vald'),
(149, 11, 'Ruhnu vald'),
(150, 11, 'Salme vald'),
(151, 11, 'Torgu vald'),
(152, 11, 'Valjala vald'),
(153, 12, 'Alatskivi vald'),
(154, 12, 'Elva'),
(155, 12, 'Haaslava vald'),
(156, 12, 'Kallaste vald'),
(157, 12, 'Kambja vald'),
(158, 12, 'Konguta vald'),
(159, 12, 'Laeva vald'),
(160, 12, 'Luunja vald'),
(161, 12, 'Meeksi vald'),
(162, 12, 'Mäksa vald'),
(163, 12, 'Nõo vald'),
(164, 12, 'Peipsiääre vald'),
(165, 12, 'Piirissaare vald'),
(166, 12, 'Puhja vald'),
(167, 12, 'Rannu vald'),
(168, 12, 'Rõngu vald'),
(169, 12, 'Tartu'),
(170, 12, 'Tartu vald'),
(171, 12, 'Tähtvere vald'),
(172, 12, 'Vara vald'),
(173, 12, 'Võnnu vald'),
(174, 12, 'Ülenurme vald'),
(175, 13, 'Helme vald'),
(176, 13, 'Hummuli vald'),
(177, 13, 'Karula vald'),
(178, 13, 'Otepää'),
(179, 13, 'Otepää vald'),
(180, 13, 'Palupera vald'),
(181, 13, 'Puka vald'),
(182, 13, 'Põdrala vald'),
(183, 13, 'Sangaste vald'),
(184, 13, 'Tõlliste vald'),
(185, 13, 'Tõrva'),
(186, 13, 'Tõrva vald'),
(187, 13, 'Valga'),
(188, 13, 'Õru vald'),
(189, 14, 'Abja vald'),
(190, 14, 'Halliste vald'),
(191, 14, 'Karksi vald'),
(192, 14, 'Kolga-Jaani vald'),
(193, 14, 'Kõo vald'),
(194, 14, 'Kõpu vald'),
(195, 14, 'Mõisaküla'),
(196, 14, 'Suure-Jaani vald'),
(197, 14, 'Tarvastu vald'),
(198, 14, 'Viljandi'),
(199, 14, 'Viljandi vald'),
(200, 14, 'Võhma'),
(201, 15, 'Antsla vald'),
(202, 15, 'Haanja vald'),
(203, 15, 'Lasva vald'),
(204, 15, 'Meremäe vald'),
(205, 15, 'Misso vald'),
(206, 15, 'Mõniste vald'),
(207, 15, 'Rõuge vald'),
(208, 15, 'Sõmerpalu vald'),
(209, 15, 'Urvaste vald'),
(210, 15, 'Varstu vald'),
(211, 15, 'Vastseliina vald'),
(212, 15, 'Võru'),
(213, 15, 'Võru vald');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `County`
--

CREATE TABLE IF NOT EXISTS `County` (
  `CO_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `County` varchar(45) NOT NULL,
  PRIMARY KEY (`CO_ID`),
  UNIQUE KEY `CO_ID_UNIQUE` (`CO_ID`),
  UNIQUE KEY `Countycol_UNIQUE` (`County`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Andmete tõmmistamine tabelile `County`
--

INSERT INTO `County` (`CO_ID`, `County`) VALUES
(1, 'Harju maakond'),
(2, 'Hiiu maakond'),
(3, 'Ida-Viru maakond'),
(5, 'Jarva maakond'),
(4, 'Jogeva maakond'),
(6, 'Laane maakond'),
(7, 'Laane-Viru maakond'),
(9, 'Parnu maakond'),
(8, 'Polva maakond'),
(10, 'Rapla maakond'),
(11, 'Saare maakond'),
(12, 'Tartu maakond'),
(13, 'Valga maakond'),
(14, 'Viljandi maakond'),
(15, 'Voru maakond');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `People`
--

CREATE TABLE IF NOT EXISTS `People` (
  `P_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `Phone` bigint(8) NOT NULL,
  `Mail` varchar(45) NOT NULL,
  `City_Ci_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`P_ID`),
  UNIQUE KEY `idPeople_UNIQUE` (`P_ID`),
  UNIQUE KEY `Mail_UNIQUE` (`Mail`),
  KEY `fk_People_City1_idx` (`City_Ci_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Andmete tõmmistamine tabelile `People`
--

INSERT INTO `People` (`P_ID`, `Firstname`, `Lastname`, `Phone`, `Mail`, `City_Ci_ID`) VALUES
(48, 'Tarmo', 'Dulinets', 44, '', 4),
(50, 'Tarmo', 'Dulinets', 444, 'tarms94@gmail.com', 4);

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_City_County` FOREIGN KEY (`County_CO_ID`) REFERENCES `County` (`CO_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Piirangud tabelile `People`
--
ALTER TABLE `People`
  ADD CONSTRAINT `fk_People_City1` FOREIGN KEY (`City_Ci_ID`) REFERENCES `City` (`Ci_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
