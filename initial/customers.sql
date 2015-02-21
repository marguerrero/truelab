-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2015 at 02:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_list`
--

CREATE TABLE IF NOT EXISTS `cust_list` (
  `service_id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cust_list`
--

INSERT INTO `cust_list` (`service_id`, `firstname`, `lastname`, `age`, `sex`, `bday`) VALUES
(1, 'jeffrey', 'bancoro', 31, 'M', '1983-05-08'),
(2, 'lhea', 'bancoro', 30, 'F', '1984-11-04'),
(3, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(4, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(5, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(6, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(7, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(8, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(9, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(10, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(11, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(12, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(13, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(14, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(15, 'hazel', 'bustillo', 20, 'F', '1994-02-20'),
(16, '', '', 0, '', '0000-00-00'),
(17, '', '', 0, '', '0000-00-00'),
(18, '', '', 0, '', '0000-00-00'),
(19, '', '', 0, '', '0000-00-00'),
(20, '', '', 0, '', '0000-00-00'),
(21, '', '', 0, '', '0000-00-00'),
(22, '', '', 0, '', '0000-00-00'),
(23, '', '', 0, '', '0000-00-00'),
(24, 'iya', 'bancoro', 30, 'F', '1984-02-02'),
(25, '', '', 0, '', '0000-00-00'),
(26, 'tessie', 'bancoro', 65, '1', '1944-06-21'),
(27, 'kad', 'asdasd', 31, '1', '1983-12-12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
