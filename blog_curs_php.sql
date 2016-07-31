-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2016 at 10:10 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_curs_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `articole`
--

DROP TABLE IF EXISTS `articole`;
CREATE TABLE IF NOT EXISTS `articole` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(200) NOT NULL,
  `continut` text NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `caleImg` varchar(260) NOT NULL,
  `autID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `autID` (`autID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articole`
--

INSERT INTO `articole` (`ID`, `titlu`, `continut`, `data`, `caleImg`, `autID`) VALUES
(1, 'Piept de pui cu sos de ciuperci', 'Tipul rețetei: Felul principal\r\nNumarul de porții: 4 porții\r\nTimpul de preparare: 10 minute\r\nTimpul de gătire: 40 minute\r\nGata în: 50 minute\r\nDificultate: Ușor\r\nCalorii: 282 Kcal (1 porție)\r\n\r\nIngrediente:\r\n4 buc de piept de pui,\r\n100 gr ciuperci champignon,\r\n3 linguri unt,\r\n2 linguri faina,\r\n250 ml lapte,\r\n50 gr smantana,\r\nsare,\r\npiper.\r\n\r\nPreparare:\r\nSe preancalzeste grillul.\r\nSe amesteca intr-un vas o lingura de unt topit cu sare si piper si se ung bucatile de piept de pui.\r\nSe dau la cuptor pentru 10 minute, dupa care se intorc si se mai lasa 10 minute.\r\n\r\nIn caz ca nu aveti la indemana un grill, se poate folosi si prajit pieptul de pui.\r\n\r\nSe face sosul. \r\nSe topesc 2 linguri de unt intr-o tigaie, se adauga ciupercile curatate si taiate feliute.\r\nSe calesc pana se inmoaie.\r\nSe presara faina si se toarna laptele si putina apa, amestecand continuu cu un tel, pana se leaga sosul.\r\nSe adauga smantana.\r\nSe potriveste de sare si piper.\r\nSe serveste pieptul de pui cu sosul fierbinte.\r\n\r\nBon Appetit!', '2016-07-20 09:44:49', 'images/piept_de_pui_cu_sos_de_ciuperci.jpg', 1),
(2, 'TORT DE FRUCTE', ' TIMPI DE PREPARARE\r\n\r\n Timp de preparare: 120 min\r\n Timp de gatire: 50 min\r\n Gata in: 2 ore, 50 min\r\n\r\nINGREDIENTE\r\n\r\n 4 ouă\r\n 140 g zahăr\r\n 120 g făină\r\n 60 g amidon\r\n 1 plic praf de copt\r\n 2 linguri apă\r\n coajă de lămâie\r\n unt şi făină pentru tapetat\r\n 100 g marţipan\r\n 1 lingura zahăr\r\n 2 linguri apă\r\n 20 ml lichior de vişine\r\n 100 g cremă de ciocolată din comerţ\r\n 200 g gem de căpşuni\r\n 80 g migdale\r\n 400 g fructe\r\n 1 pachet gelatină\r\n\r\nPREPARARE\r\n\r\n1. Se bat bine albuşurile cu jumătate din cantitatea de zahăr, iar gălbenuşurile cu cealaltă cantitate de zahăr şi cu apa şi coaja de lămâie.\r\n2. Se amestecă şi făina cu praful de copt şi cu amidonul, după care se adaugă şi compoziţia de gălbenuşuri şi de albuşuri.\r\n3. Se tapetează o tavă cu unt şi făină,  se pune compoziţia şi se dă la cuptor pentru 30 de minute.\r\n4. Se dă marţipanul pe răzătoare, după care se amestecă cu zahăr, cu apă şi cu lichiorul de vişine.\r\n5. Se taie blatul în trei părţi pe orizontală.\r\n6. Se unge prima parte cu crema de ciocolată, după care se pune cea de-a doua parte şi se unge cu compoziţia de marţipan.\r\n7. Se pune şi ultima parte de blat şi se dă la frigider pentru 30 de minute.\r\n8. Se unge tortul cu gemul de căpşuni şi se decorează cu migdale.\r\n9. Deasupra, se pun bucăţi de fructe, peste care se adaugă gelatina preparată conform instrucţiunilor de pe pachet.', '2016-07-31 12:42:34', 'images/1469968954_gordy_tort-de-fructe-main.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

DROP TABLE IF EXISTS `autori`;
CREATE TABLE IF NOT EXISTS `autori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(80) NOT NULL,
  `email` varchar(254) NOT NULL,
  `user` varchar(80) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `caleImg` varchar(260) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`,`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`ID`, `nume`, `email`, `user`, `parola`, `caleImg`) VALUES
(1, 'Mitereiter Balazs-Zoltan', 'bm@cylex.ro', 'jojo', '$2y$10$DwcAfcW2LCDEbiBF2jWOS.lPB1P/6/PMm6g06k.uJQMO6OLjNXdAi', 'images/users/1469006923_jojo_bleach-wallpapers-864.jpg'),
(2, 'Gordon Ramsay', 'gordy@gmail.com', 'gordy', '$2y$10$hRsrvwHMaAEg6Cx2AdXAxOJbSdc9wDczdg.C26O7oh.aAE.IAlkxy', 'images/users/1470002923_gordy_5181242-gordon-01.jpg');

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
