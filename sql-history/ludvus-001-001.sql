-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2012 at 08:50 PM
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

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`id`, `vards`, `uzvards`, `epasts`, `talrunis`, `adrese`) VALUES
(1, 'Ivars', 'Avotiņš', 'i.a@ia.lv', '21234567', 'Ivara Avotiņa iela 20, Jūrmala');

--
-- Dumping data for table `iemitnieki`
--

INSERT INTO `iemitnieki` (`id`, `vards`, `uzvards`, `epasts`, `fakultates_id`, `kurss`) VALUES
(1, 'Andris', 'Bērziņš', 'a.b@ab.lv', 1, 2);

--
-- Dumping data for table `komandanti`
--

INSERT INTO `komandanti` (`id`, `vards`, `uzvards`, `epasts`, `talrunis`, `adrese`) VALUES
(1, 'Juris', 'Pļaviņš', 'j.p@jp.lv', '26543210', 'Jura Pļaviņa iela 10, Rīga');

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
