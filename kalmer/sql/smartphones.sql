-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Loomise aeg: Jaan 31, 2015 kell 02:01 PM
-- Serveri versioon: 5.5.40-0ubuntu0.14.04.1
-- PHP versioon: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Andmebaas: `databases`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `smartphones`
--

CREATE TABLE IF NOT EXISTS `smartphones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `weight_grams` int(10) unsigned NOT NULL,
  `has_double_sim` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Andmete tõmmistamine tabelile `smartphones`
--

INSERT INTO `smartphones` (`id`, `model`, `weight_grams`, `has_double_sim`) VALUES
(1, 'Defy+', 118, 0),
(2, '8890 SENSE', 91, 1),
(3, 'E66', 121, 0),
(4, 'ericsson', 121, 1),
(5, 'iphone', 121, 1);

--
-- Raskeim nutiseade selle kaupa, kas toetab korraga kaht SIM-kaarti või mitte
--

select id, smartphones.has_double_sim from smartphones join (select max(weight_grams) as max_weight, has_double_sim from smartphones group by has_double_sim) as max_weight on smartphones.weight_grams=max_weight.max_weight and smartphones.has_double_sim=max_weight.has_double_sim;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
