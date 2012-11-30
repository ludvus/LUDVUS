-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2012 at 04:42 PM
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

DROP TABLE IF EXISTS `administratori`;
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
-- Table structure for table `arhivs_pieteikumi`
--

DROP TABLE IF EXISTS `arhivs_pieteikumi`;
CREATE TABLE IF NOT EXISTS `arhivs_pieteikumi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fakultate` varchar(255) NOT NULL,
  `limenis` varchar(255) NOT NULL,
  `kurss` int(11) NOT NULL,
  `teksts` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fakultates`
--

DROP TABLE IF EXISTS `fakultates`;
CREATE TABLE IF NOT EXISTS `fakultates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosaukums` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `fakultates`
--

INSERT INTO `fakultates` (`id`, `nosaukums`) VALUES
(1, 'Bioloģijas fakultāte'),
(2, 'Datorikas fakultāte'),
(3, 'Ekonomikas un vadības fakultāte'),
(4, 'Fizikas un matemātikas fakultāte'),
(5, 'Ģeogrāfijas un Zemes zinātņu fakultāte'),
(6, 'Humanitāro zinātņu fakultāte'),
(7, 'Juridiskā fakultāte'),
(8, 'Ķīmijas fakultāte'),
(9, 'Medicīnas fakultāte'),
(10, 'Pedagoģijas, psiholoģijas un mākslas fakultāte'),
(11, 'Sociālo zinātņu fakultāte'),
(12, 'Teoloģijas fakultāte'),
(13, 'Vēstures un filozofijas fakultāte');

-- --------------------------------------------------------

--
-- Table structure for table `iemitnieki`
--

DROP TABLE IF EXISTS `iemitnieki`;
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
(1, 'Daniels', 'Pitkevičs', 'daniels.pitkevics@gmail.com', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jaunumi`
--

DROP TABLE IF EXISTS `jaunumi`;
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
(3, 'Testa jaunums 3', 'Teksts parādījās', 'Staņislavs', '2012-10-05 08:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `komandanti`
--

DROP TABLE IF EXISTS `komandanti`;
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
-- Table structure for table `limenis`
--

DROP TABLE IF EXISTS `limenis`;
CREATE TABLE IF NOT EXISTS `limenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosaukums` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `limenis`
--

INSERT INTO `limenis` (`id`, `nosaukums`) VALUES
(1, 'Pamatstudiju programmas'),
(2, 'Augstākā līmeņa studiju programmas'),
(3, 'Doktora studiju programmas');

-- --------------------------------------------------------

--
-- Table structure for table `pieteikumi`
--

DROP TABLE IF EXISTS `pieteikumi`;
CREATE TABLE IF NOT EXISTS `pieteikumi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fakultate` varchar(255) NOT NULL,
  `limenis` varchar(255) NOT NULL,
  `kurss` int(11) NOT NULL,
  `teksts` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pieteikumi`
--

INSERT INTO `pieteikumi` (`id`, `username`, `fakultate`, `limenis`, `kurss`, `teksts`, `name`, `surname`) VALUES
(2, 'qwerty', '2', '2', 2, '', 'asdfg', 'zxcvb'),
(3, 'qaz', '2', '2', 2, '', 'wsxd', 'erfv'),
(4, 'dfghj', '5', '2', 3, '', 'dfghj', 'sdhj'),
(5, 'qwe', '7', '2', 3, '', 'qwer', 'qwerty'),
(6, 'qwe', '4', '1', 1, '', 'qwer', 'qwerty'),
(7, 'qwe', '1', '1', 1, '123456', 'qwer', 'qwerty'),
(8, 'qwe', '1', '1', 1, 'abcdefgh', 'qwer', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
