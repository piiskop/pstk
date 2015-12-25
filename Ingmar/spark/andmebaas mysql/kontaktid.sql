-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 11:07 EL
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spark`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontaktid`
--

CREATE TABLE IF NOT EXISTS `kontaktid` (
`kontaktID` int(10) unsigned NOT NULL,
  `eesnimi` varchar(71) NOT NULL,
  `perenimi` varchar(92) NOT NULL,
  `aadress` varchar(255) DEFAULT NULL,
  `isikukood` bigint(11) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontaktid`
--

INSERT INTO `kontaktid` (`kontaktID`, `eesnimi`, `perenimi`, `aadress`, `isikukood`, `telefon`) VALUES
(20, 'Karu', 'Rebane', 'PÃµld 10', 30505059874, '65418523'),
(22, 'Karu', 'Nahk', 'Mets 13', 39901011234, '5000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontaktid`
--
ALTER TABLE `kontaktid`
 ADD PRIMARY KEY (`kontaktID`), ADD UNIQUE KEY `isikukood` (`isikukood`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontaktid`
--
ALTER TABLE `kontaktid`
MODIFY `kontaktID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
