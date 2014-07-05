-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2014 at 10:57 PM
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
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_persian_ci NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `code` varchar(7) COLLATE utf8_persian_ci NOT NULL,
  `melicode` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `education` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `melicode` (`melicode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `username`, `password`, `specialty_id`, `code`, `melicode`, `gender`, `mobile`, `email`, `education`, `img`, `address`) VALUES
(1, 'محمد علی پور', 'mohammad', '360a55b533a95d7dd5a596472adf07ca', 3, '8563333', '0780331516', 'male', '09159746635', 'md.alipour@yhoo.com', 'لیسانس', 'none.png', 'sabzevar'),
(2, 'سجاد مومنی تبار', 'sajjad', '360a55b533a95d7dd5a596472adf07ca', 1, '1245896', '0780281470', 'male', '09370098186', 'md.alipour@yahoo.com', 'licence', 'none.png', 'sabzvar'),
(3, 'مرتضا فسنقری', 'mori', '360a55b533a95d7dd5a596472adf07ca', 2, '1478556', '0780255556', 'male', '09355555555', 'mori@gmail.com', 'licence', 'none.png', 'sabevar'),
(4, 'ملیحه عباس آبادی', 'malihe', '360a55b533a95d7dd5a596472adf07ca', 2, '5555448', '0780255366', 'male', '09361186021', 'nima@gmail.com', 'licence', 'none.png', 'sabzevar'),
(6, 'ابراهیم حامدی', 'ebi', '360a55b533a95d7dd5a596472adf07ca', 6, '5888888', '5522222222', 'male', '22222222222', 'a@a.com', 'لیسانس', 'none.png', 'gfdgfg');

-- --------------------------------------------------------

--
-- Table structure for table `free_times`
--

CREATE TABLE IF NOT EXISTS `free_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `start_time` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `end_time` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `free_times`
--

INSERT INTO `free_times` (`id`, `doctor_id`, `date`, `start_time`, `end_time`) VALUES
(1, 1, '1393/03/09', '08:00', '12:20'),
(2, 2, '1393/03/09', '8:00', '13:00'),
(3, 1, '1393/04/08', '03:05', '07:05'),
(4, 1, '1393/04/07', '08:00', '21:18'),
(5, 1, '1393/04/06', '03:00', '15:00'),
(6, 3, '1393/04/07', '07:00', '12:00'),
(7, 4, '1393/04/08', '00:00', '03:00'),
(8, 4, '1393/04/07', '10:26', '13:05'),
(9, 4, '1393/04/11', '00:00', '07:00'),
(10, 3, '1393/04/08', '00:13', '02:15'),
(11, 4, '1393/04/13', '07:00', '12:00'),
(12, 4, '1393/04/10', '09:56', '10:06');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `des` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `cname`, `type`, `des`) VALUES
(1, 'تامین اجتماعی', 'دولتی', 'بیمه'),
(2, 'آزاد', 'آزاد', 'بدون بیمه'),
(3, 'کارکنان نیروهای مسلح', 'بیمه', ' کارکنان نیروهای مسلح'),
(4, 'پارسیان', 'غیردولتی', 'بیمه پارسیان'),
(5, 'ایران', 'دولتی', ''),
(6, 'آسیا', 'دولتی', 'بیمه آسیا');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'نیما قربانی', 'nima', '360a55b533a95d7dd5a596472adf07ca', 'md.alipour@yhoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `public` int(1) NOT NULL,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `public`, `title`, `body`, `image`, `date`) VALUES
(1, 0, 'خبر تست', 'sdada sdasd dadasdas sadasda dasdasda fsfasdsada daasfasa dadada dadadad asdasdada adadadad dasdasda', 'none.png', '1393/03/06'),
(4, 0, 'بزار قسمت کنیم', 'بزار قسمت کنیم تنهاییمونو میون سفره شب تو با من', 'none.png', '1393/03/05'),
(5, 1, 'بیسبیسبیس', 'سبسیبسیسبسیبیسب', 'none.png', '1393/04/08'),
(6, 0, 'البابلا', 'لبابلاب', 'none.png', '1393/04/08');

-- --------------------------------------------------------

--
-- Table structure for table `pateint`
--

CREATE TABLE IF NOT EXISTS `pateint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_persian_ci NOT NULL,
  `insurance_id` int(3) NOT NULL,
  `melicode` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `age` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `pic` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pateint`
--

INSERT INTO `pateint` (`id`, `name`, `username`, `password`, `insurance_id`, `melicode`, `gender`, `age`, `pic`, `email`, `mobile`, `address`) VALUES
(1, 'محمد علی پور', 'mdsoft', '360a55b533a95d7dd5a596472adf07ca', 1, '0780331516', 'male', '23', 'none.png', 'md.alipour91@gmail.cm', '09159746635', 'سبزوار-24متری انقلاب2222'),
(2, 'رضا نوروزی', 'reza', '360a55b533a95d7dd5a596472adf07ca', 1, '1234566666', 'male', '25', '34911.jpg', '', '09159746635', ''),
(3, 'سجاد مومنی', 'sajjad', '360a55b533a95d7dd5a596472adf07ca', 1, '1234566666', 'male', '23', 'none.png', 'momenitabar@gmail.com', '09370098186', 'سبزوار-میدانآل احمد'),
(4, 'احمد', 'siba', 'a6d5863e1380c8e575e5e6507c672ff7', 1, '0780305213', 'male', '23', 'none.png', 'ahmareza@yahoo.com', '09151704535', '');

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `periood_time` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`id`, `title`, `periood_time`) VALUES
(1, 'قلب و عروق', '20'),
(2, 'زنان  و زایمان', '10'),
(3, 'عمومی', '10'),
(4, 'دندانپزشکی', '20'),
(5, 'کودکان', '15'),
(6, 'ارتوپتی', '15'),
(7, 'ارولوژی', '20');

-- --------------------------------------------------------

--
-- Table structure for table `spec_ins`
--

CREATE TABLE IF NOT EXISTS `spec_ins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insurance_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `fee` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `spec_ins`
--

INSERT INTO `spec_ins` (`id`, `insurance_id`, `specialty_id`, `fee`) VALUES
(1, 1, 1, '16000'),
(2, 1, 2, '16000'),
(3, 2, 1, '20000'),
(4, 2, 2, '20000'),
(5, 1, 3, '7000'),
(6, 2, 3, '10000'),
(7, 3, 3, '3500'),
(8, 3, 4, '8000'),
(9, 4, 3, '8000');

-- --------------------------------------------------------

--
-- Table structure for table `visit_time`
--

CREATE TABLE IF NOT EXISTS `visit_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `pateint_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `code` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `visit_time`
--

INSERT INTO `visit_time` (`id`, `specialty_id`, `doctor_id`, `pateint_id`, `insurance_id`, `date`, `time`, `code`) VALUES
(1, 3, 1, 1, 1, '1393/02/31', '08:10', 0),
(2, 3, 1, 1, 1, '1393/02/31', '08:00', 0),
(5, 3, 1, 1, 2, '1393/03/08', '09:30', 0),
(6, 3, 1, 1, 2, '1393/03/07', '08:40', 0),
(14, 1, 2, 1, 1, '1393/02/31', '10:00', 1186822191),
(15, 1, 2, 1, 1, '1393/03/07', '08:20', 1210640853),
(16, 3, 1, 3, 1, '1393/03/08', '10:10', 1068061034),
(17, 3, 1, 2, 1, '1393/03/08', '09:00', 1035620993),
(18, 3, 1, 1, 1, '1393/03/09', '08:20', 1024965542),
(19, 1, 2, 1, 2, '1393/03/09', '08:00', 1294138134),
(20, 3, 1, 1, 1, '1393/04/07', '08:00', 1251924934),
(21, 2, 3, 1, 1, '1393/04/07', '07:00', 1019773977),
(22, 2, 4, 1, 1, '1393/04/11', '00:00', 1303059438),
(23, 2, 4, 1, 1, '1393/04/13', '11:30', 1079216714),
(24, 2, 4, 1, 1, '1393/04/10', '09:56', 1215268066);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
