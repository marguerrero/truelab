-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2015 at 03:00 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE IF NOT EXISTS `subcat` (
  `sub_test_id` int(6) NOT NULL AUTO_INCREMENT,
  `main_test_id` int(6) NOT NULL,
  `subcateg` varchar(50) NOT NULL,
  `reg_price` int(6) NOT NULL,
  `disc_price` int(6) NOT NULL,
  PRIMARY KEY (`sub_test_id`),
  KEY `main_test_id` (`main_test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`sub_test_id`, `main_test_id`, `subcateg`, `reg_price`, `disc_price`) VALUES
(1, 1, 'CBC WITH PLATELET', 100, 0),
(3, 1, 'HEMOGLOBIN/HEMATOCRIT', 30, 0),
(4, 1, 'BLOOD TYPING', 100, 0),
(5, 1, 'ESR', 120, 0),
(6, 1, 'RETICULOCYTE COUNT', 70, 0),
(7, 1, 'PERIPHERAL SMEAR', 300, 0),
(8, 1, 'APTT', 0, 0),
(9, 1, 'PTPA', 0, 0),
(10, 2, 'PSA', 1300, 1100),
(11, 2, 'CEA', 650, 600),
(12, 2, 'CA125', 1300, 1100),
(13, 2, 'AFP', 650, 600),
(14, 2, 'FT3', 750, 650),
(16, 2, 'FT4', 750, 650),
(17, 2, 'TT3', 750, 650),
(18, 2, 'TT4', 750, 650),
(19, 3, 'URINALYSIS', 50, 40),
(20, 3, 'FECALYSIS', 50, 40),
(21, 3, 'OCCULT BLOOD', 150, 0),
(22, 3, 'PREGNANCY TEST', 130, 100),
(23, 3, 'DRUGTEST', 180, 150),
(24, 4, 'FBS/RBS', 100, 90),
(25, 4, 'HBA1C', 650, 600),
(26, 4, 'CREATININE', 110, 100),
(27, 4, 'BUN', 110, 100),
(28, 4, 'BUA', 120, 110),
(29, 4, 'LIPID PROFILE', 550, 500),
(30, 4, 'TOTAL CHOLESTEROL', 110, 100),
(31, 4, 'TRIGLYCERIDES', 320, 290),
(32, 4, 'HDL', 210, 190),
(33, 4, 'LDL', 485, 435),
(34, 4, 'LIVER PROFILE', 680, 615),
(35, 4, 'SGOT', 165, 150),
(36, 4, 'SGPT', 165, 150),
(37, 4, 'ALK PHOS.', 165, 150),
(38, 4, 'ALBUMIN', 110, 100),
(39, 4, 'TPAG', 320, 300),
(40, 4, 'T BILIRUBIN', 140, 125),
(41, 4, 'D BILIRUBIN', 140, 125),
(42, 5, 'HBSAG', 150, 130),
(43, 5, 'VDRL/SYPHILLIS', 250, 200),
(44, 5, 'HIV SCREENING', 0, 0),
(45, 6, 'WHOLE ABD.', 1000, 0),
(46, 6, 'UPPER ABD.', 800, 0),
(47, 6, 'KUB/P', 600, 0),
(48, 6, 'TVS PREG', 500, 0),
(49, 6, 'TVS GYNE', 750, 0),
(50, 6, 'TAS PREG', 350, 300),
(51, 6, 'TAS BPS', 500, 0),
(52, 6, 'HBT', 600, 0),
(53, 6, 'TRS', 750, 0),
(54, 6, 'THYROID', 400, 0),
(55, 6, 'SINGLE ORGAN', 400, 0),
(56, 7, 'XRAY', 145, 130),
(57, 7, 'GRAM STAIN', 100, 0),
(58, 7, 'AFB', 100, 0),
(59, 7, 'ECG', 200, 150);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcat`
--
ALTER TABLE `subcat`
  ADD CONSTRAINT `main_cons` FOREIGN KEY (`main_test_id`) REFERENCES `categ_main` (`main_test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
