-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2014 at 09:31 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinician`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors_info`
--

CREATE TABLE IF NOT EXISTS `doctors_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sex` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `specialties` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `presence_time` int(11) NOT NULL,
  `insurance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE IF NOT EXISTS `patient_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `insurance` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `presence_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `presence_time`
--

CREATE TABLE IF NOT EXISTS `presence_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
