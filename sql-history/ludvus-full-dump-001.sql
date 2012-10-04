-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2012 at 12:21 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ludvus`
--
CREATE DATABASE `ludvus` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ludvus`;

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

CREATE TABLE IF NOT EXISTS `administratori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vards` varchar(128) NOT NULL,
  `uzvards` varchar(128) NOT NULL,
  `epasts` varchar(128) NOT NULL,
  `talrunis` varchar(11) NOT NULL,
  `adrese` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`id`, `vards`, `uzvards`, `epasts`, `talrunis`, `adrese`) VALUES
(1, 'Staņislavs', 'Kuļikovs', 'stasjiks.kulja@to4ka.ru', '21112233', 'Rīga, Raiņa Bulvāris 21');

-- --------------------------------------------------------

--
-- Table structure for table `iemitnieki`
--

CREATE TABLE IF NOT EXISTS `iemitnieki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vards` varchar(128) NOT NULL,
  `uzvards` varchar(128) NOT NULL,
  `epasts` varchar(128) NOT NULL,
  `fakultates_id` int(11) NOT NULL,
  `kurss` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `iemitnieki`
--

INSERT INTO `iemitnieki` (`id`, `vards`, `uzvards`, `epasts`, `fakultates_id`, `kurss`) VALUES
(1, 'Daniels', 'Pitkevičs', 'daniels.pitkevics@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jaunumi`
--

CREATE TABLE IF NOT EXISTS `jaunumi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `virsraksts` varchar(128) NOT NULL,
  `teksts` text NOT NULL,
  `autors` varchar(128) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jaunumi`
--

INSERT INTO `jaunumi` (`id`, `virsraksts`, `teksts`, `autors`, `ts`) VALUES
(1, 'Testa jaunums', 'LUDVUS pirmais testa jaunums. Izstrādes stadija 0.01V.', 'Daniels', '2012-10-03 16:18:34'),
(2, 'Otrais testa jaunums', 'LUDVUS progresē', 'Daniels', '2012-10-03 16:21:32'),
(3, 'Testa jaunums 3', 'Nav teskta', 'Pēteris', '2012-10-04 09:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `komandanti`
--

CREATE TABLE IF NOT EXISTS `komandanti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vards` varchar(128) NOT NULL,
  `uzvards` varchar(128) NOT NULL,
  `epasts` varchar(128) NOT NULL,
  `talrunis` varchar(11) NOT NULL,
  `adrese` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `komandanti`
--

INSERT INTO `komandanti` (`id`, `vards`, `uzvards`, `epasts`, `talrunis`, `adrese`) VALUES
(1, 'Jānis', 'Bērziņš', 'janis.berzins@lu.lv', '27654321', 'Rīga, Raiņa Bulvāris 19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `pass`, `user_id`, `user_type`) VALUES
(1, 'iemitnieks', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1),
(2, 'komandants', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 2),
(3, 'administrators', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
