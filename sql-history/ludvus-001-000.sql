-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2012 at 08:37 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

CREATE TABLE IF NOT EXISTS `administratori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vards` varchar(64) NOT NULL,
  `uzvards` varchar(64) NOT NULL,
  `epasts` varchar(128) NOT NULL,
  `talrunis` varchar(32) NOT NULL,
  `adrese` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `iemitnieki`
--

CREATE TABLE IF NOT EXISTS `iemitnieki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vards` varchar(64) NOT NULL,
  `uzvards` varchar(64) NOT NULL,
  `epasts` varchar(128) NOT NULL,
  `fakultates_id` int(11) NOT NULL,
  `kurss` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `komandanti`
--

CREATE TABLE IF NOT EXISTS `komandanti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vards` varchar(64) NOT NULL,
  `uzvards` varchar(64) NOT NULL,
  `epasts` varchar(128) NOT NULL,
  `talrunis` varchar(32) NOT NULL,
  `adrese` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
