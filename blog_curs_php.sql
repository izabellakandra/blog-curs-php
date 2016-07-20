-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2016 at 10:47 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_curs_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `articole`
--

CREATE TABLE IF NOT EXISTS `articole` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(50) NOT NULL,
  `continut` text NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `caleImg` varchar(260) NOT NULL,
  `autID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `autID` (`autID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `articole`
--

INSERT INTO `articole` (`ID`, `titlu`, `continut`, `data`, `caleImg`, `autID`) VALUES
(1, 'Piept de pui cu sos de ciuperci', 'Tipul rețetei: Felul principal\r\nNumarul de porții: 4 porții\r\nTimpul de preparare: 10 minute\r\nTimpul de gătire: 40 minute\r\nGata în: 50 minute\r\nDificultate: Ușor\r\nCalorii: 282 Kcal (1 porție)\r\n\r\nIngrediente:\r\n4 buc de piept de pui,\r\n100 gr ciuperci champignon,\r\n3 linguri unt,\r\n2 linguri faina,\r\n250 ml lapte,\r\n50 gr smantana,\r\nsare,\r\npiper.\r\n\r\nPreparare:\r\nSe preancalzeste grillul.\r\nSe amesteca intr-un vas o lingura de unt topit cu sare si piper si se ung bucatile de piept de pui.\r\nSe dau la cuptor pentru 10 minute, dupa care se intorc si se mai lasa 10 minute.\r\n\r\nIn caz ca nu aveti la indemana un grill, se poate folosi si prajit pieptul de pui.\r\n\r\nSe face sosul. \r\nSe topesc 2 linguri de unt intr-o tigaie, se adauga ciupercile curatate si taiate feliute.\r\nSe calesc pana se inmoaie.\r\nSe presara faina si se toarna laptele si putina apa, amestecand continuu cu un tel, pana se leaga sosul.\r\nSe adauga smantana.\r\nSe potriveste de sare si piper.\r\nSe serveste pieptul de pui cu sosul fierbinte.\r\n\r\nBon Appetit!', '2016-07-20 09:44:49', 'images/piept_de_pui_cu_sos_de_ciuperci.jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE IF NOT EXISTS `autori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(80) NOT NULL,
  `email` varchar(254) NOT NULL,
  `user` varchar(80) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `caleImg` varchar(260) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`,`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`ID`, `nume`, `email`, `user`, `parola`, `caleImg`) VALUES
(26, 'Mitereiter Balazs-Zoltan', 'bm@cylex.ro', 'jojo', '$2y$10$DwcAfcW2LCDEbiBF2jWOS.lPB1P/6/PMm6g06k.uJQMO6OLjNXdAi', 'images/users/1469006923_jojo_bleach-wallpapers-864.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articole`
--
ALTER TABLE `articole`
  ADD CONSTRAINT `aut_art` FOREIGN KEY (`autID`) REFERENCES `autori` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
