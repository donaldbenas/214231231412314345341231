-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2013 at 09:46 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pacific`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appid` int(11) NOT NULL,
  `course` text NOT NULL,
  `school` text NOT NULL,
  `startDate` varchar(30) NOT NULL,
  `endDate` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `appid`, `course`, `school`, `startDate`, `endDate`) VALUES
(58, 1, 'SDASD', 'ASDASDA', '00-00', '00-00'),
(59, 1, 'ASD', 'SDASDA', '08-00', '08-00'),
(60, 1, 'ASDASD', 'ASDA', '05-00', '05-00'),
(64, 2626, 'ASDAS', '', '00-00', '00-00'),
(65, 2626, 'DASDA', '', '00-00', '00-00'),
(66, 2626, 'SDA', '', '00-00', '00-00'),
(83, 2279, 'ASDASDASDA', '', '00-00', '00-00'),
(84, 2627, 'ASDA', 'SDASDASDA', '02-2010', '02-2012');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
