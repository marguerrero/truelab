-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2015 at 06:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_main_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categ_main`
--

CREATE TABLE IF NOT EXISTS `categ_main` (
  `main_test_id` int(2) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`main_test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='main category database' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categ_main`
--

INSERT INTO `categ_main` (`main_test_id`, `category`) VALUES
(1, 'HEMATOLOGY'),
(2, 'TUMOR MARKERS'),
(3, 'CLINICAL MICROSCOPY'),
(4, 'CLINICAL CHEMISTRY'),
(5, 'IMMUNO/SERO'),
(6, 'ULTRASOUND'),
(7, 'OTHERS');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
