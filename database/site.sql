-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 5.61.251.57:3306
-- Generation Time: Jan 22, 2015 at 09:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `s_nieuws`
--

CREATE TABLE IF NOT EXISTS `s_nieuws` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `afbeelding` varchar(255) NOT NULL,
  `volgorde` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'boolean',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `s_nieuws`
--

INSERT INTO `s_nieuws` (`id`, `titel`, `content`, `afbeelding`, `volgorde`, `active`) VALUES
(1, 'Website online', 'Mooi, lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw!', '/site/work/images/nieuws/slider_empty.jpg', 0, 1),
(2, 'Eerste nieuwtje', 'lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw!', '/site/work/images/nieuws/slider_empty.jpg', 0, 1),
(3, 'Campus Winschoten failliet', 'lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw lorem ipsum tekst enzo want ik ken hem niet uit mijn hoofd dus begin ik maar opnieuw ', '/site/work/images/nieuws/slider_empty.jpg', 0, 1),
(4, 'test', 'test', 'test', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `s_pagina`
--

CREATE TABLE IF NOT EXISTS `s_pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(200) NOT NULL,
  `meta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `s_pagina`
--

INSERT INTO `s_pagina` (`id`, `titel`, `meta`) VALUES
(1, 'Home', ''),
(2, 'Over ons', ''),
(3, 'Projecten', ''),
(4, 'Ontwikkelaars', ''),
(5, 'Contact', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_pagina_variabel`
--

CREATE TABLE IF NOT EXISTS `s_pagina_variabel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paginaid` int(100) NOT NULL,
  `variabel_naam` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `s_pagina_variabel`
--

INSERT INTO `s_pagina_variabel` (`id`, `paginaid`, `variabel_naam`, `value`) VALUES
(1, 5, 'image', 'img/contact.jpg'),
(2, 5, 'text', '<strong>Contactgegevens</strong><br />\r\nPC Hooftlaan 1<br />\r\n9673 GS Winschoten<br />\r\nPostadres<br /><br />\r\n\r\nPostbus 327<br />\r\n9670 AH Winschoten<br /><br />\r\n\r\nTelefoon: 0597 - 670970<br />\r\nFax: 0597 - 670979'),
(3, 2, 'image', 'img/over_ons.jpg'),
(4, 2, 'text', 'Bladiebladiebla<br /><br />\r\n<iframe width="420" height="315" src="//www.youtube.com/embed/SpS2D0HhID4" frameborder="0" allowfullscreen autoplay="1"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `s_project`
--

CREATE TABLE IF NOT EXISTS `s_project` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `projectcode` varchar(100) NOT NULL DEFAULT '123',
  `titel` varchar(200) NOT NULL,
  `omschrijving` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `datum_oplevering` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `s_project`
--

INSERT INTO `s_project` (`id`, `projectcode`, `titel`, `omschrijving`, `link`, `datum_oplevering`) VALUES
(1, '123', 'Uren', 'Uren registratie', '', 1),
(2, '123', 'Game', 'Game', 'http://www.funnygames.nl/spel/pacman_1.html', 1),
(3, '123', 'Rooster', 'Rooster app', '', 1),
(4, '123', 'Voortgang', 'Voortgangregistratie', '', 1),
(5, '123', 'Softwarehuis', 'Softwarehuis Website', '', 1),
(8, '123', 'TEST', 'TEST', 'TEST', 0),
(9, '123', 'Fietstastisch', 'Fiets app voor de afstand en verbranding van de afstand van huis > school en school > huis.', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_project_screenshots`
--

CREATE TABLE IF NOT EXISTS `s_project_screenshots` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `projectid` int(100) NOT NULL,
  `afbeelding_url` varchar(200) NOT NULL,
  `volgorde` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `s_project_screenshots`
--

INSERT INTO `s_project_screenshots` (`id`, `projectid`, `afbeelding_url`, `volgorde`) VALUES
(1, 1, 'images/projecten/1.png', 0),
(2, 2, 'images/projecten/2.png', 0),
(3, 3, 'images/projecten/3.png', 0),
(4, 4, 'images/projecten/4.png', 0),
(5, 5, 'images/projecten/5.png', 0),
(6, 6, '', 0),
(7, 7, 'Afbeelding aangepast', 0),
(8, 8, '', 0),
(9, 9, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_project_werknemer`
--

CREATE TABLE IF NOT EXISTS `s_project_werknemer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `werknemerid` int(11) NOT NULL,
  `van` int(11) NOT NULL DEFAULT '0',
  `tot` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `s_project_werknemer`
--

INSERT INTO `s_project_werknemer` (`id`, `projectid`, `werknemerid`, `van`, `tot`) VALUES
(7, 1, 4, 0, 0),
(8, 3, 3, 0, 0),
(9, 3, 5, 0, 0),
(10, 2, 6, 0, 0),
(11, 4, 7, 0, 0),
(12, 4, 8, 0, 0),
(13, 4, 9, 0, 0),
(23, 5, 2, 0, 0),
(25, 1, 12, 0, 0),
(26, 2, 12, 0, 0),
(27, 3, 12, 0, 0),
(28, 4, 12, 0, 0),
(29, 5, 12, 0, 0),
(30, 1, 1, 0, 0),
(31, 3, 1, 0, 0),
(32, 5, 1, 0, 0),
(33, 8, 13, 0, 0),
(36, 9, 5, 0, 0),
(37, 9, 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_werknemer`
--

CREATE TABLE IF NOT EXISTS `s_werknemer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(100) NOT NULL,
  `wachtwoord` varchar(200) NOT NULL DEFAULT '',
  `voornaam` varchar(100) NOT NULL,
  `tussenvoegsel` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `level` int(100) NOT NULL DEFAULT '0',
  `omschrijving` text NOT NULL,
  `afbeelding` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `s_werknemer`
--

INSERT INTO `s_werknemer` (`id`, `gebruikersnaam`, `wachtwoord`, `voornaam`, `tussenvoegsel`, `achternaam`, `level`, `omschrijving`, `afbeelding`) VALUES
(1, 'Jonathan', '', 'Jonathan', '', 'Bisschop', 1, 'Ik houd van vissen!', 'img/vis.jpg'),
(2, 'Jordy', '', 'Jordy', '', 'Kroeze', 1, 'Kroeze! =D', 'img/jordy.jpg'),
(3, 'Levi', '', 'Levi', '', 'Voorintholt', 1, '666', 'img/levi.jpg'),
(4, 'Rutger', '', 'Rutger', '', 'Roffel', 1, 'Rood haar', 'img/rutger.jpg'),
(5, 'Stefan', '', 'Stefan', '', 'Riksten', 1, 'Omschrijving', 'img/geen_foto.png'),
(6, 'Harold', '', 'Harold', '', 'de Vries', 1, 'Motor, Broem Broem!', 'img/harold.jpg'),
(7, 'Michel', '', 'Michel', '', 'Scharpenborg', 1, 'Omschrijving', 'img/geen_foto.png'),
(8, 'Robin', '', 'Robin', '', 'Darwinkel', 1, 'Omschrijving', 'img/geen_foto.png'),
(9, 'Elroy', '', 'Elroy', '', 'Drenth', 1, 'Gewoon Elroy', 'img/geen_foto.png'),
(10, 'Stefandj', '', 'Stefan', 'de', 'Jonge', 1, 'Omschrijving', 'img/geen_foto.png'),
(11, 'Joris', '', 'Joris', '', 'Rietveld', 1, 'Omschrijving', 'img/geen_foto.png'),
(12, 'KD', '', 'K', '', 'Daniels', 0, 'The Boss', ''),
(13, 'TEST', '', 'TEST', 'TEST', 'TEST', 0, 'TEST', 'TEST');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;