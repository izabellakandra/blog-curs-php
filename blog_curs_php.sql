-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2016 at 03:11 PM
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE IF NOT EXISTS `autori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(80) NOT NULL,
  `email` varchar(254) NOT NULL,
  `user` varchar(80) NOT NULL,
  `parola` varchar(50) NOT NULL,
  `caleImg` varchar(260) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`,`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
