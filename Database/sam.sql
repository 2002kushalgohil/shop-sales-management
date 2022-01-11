-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2022 at 01:01 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sam`
--
CREATE DATABASE IF NOT EXISTS `sam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sam`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cname` varchar(20) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  PRIMARY KEY (`cname`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cname`, `mobile`) VALUES
('kushal gohil', 7040099240),
('varun', 9552726547);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iname` varchar(20) NOT NULL,
  `iprice` int(11) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `category` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iname` (`iname`,`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `iname`, `iprice`, `qty`, `category`) VALUES
(3, 'masoor', 110, 10, 'cereals');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sdate` date NOT NULL,
  `stime` time NOT NULL,
  `cname` varchar(30) NOT NULL,
  `iname` varchar(25) NOT NULL,
  `iqty` int(11) NOT NULL,
  `iprice` int(11) NOT NULL,
  `stotal` int(11) NOT NULL,
  `amtpaid` int(11) NOT NULL,
  `amtdue` int(11) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sid`, `sdate`, `stime`, `cname`, `iname`, `iqty`, `iprice`, `stotal`, `amtpaid`, `amtdue`, `estatus`) VALUES
(139, '2011-01-22', '06:21:56', 'kushal gohil', 'laptop', 1, 67000, 67000, 67000, 0, 'Paid'),
(140, '2011-01-22', '06:22:58', 'varun anand', 'headphones', 2, 2400, 4800, 3800, 1000, 'UnPaid'),
(141, '2011-01-22', '06:24:50', 'abhinav bankar', 'pakistan', 1, 2, 2, 2, 0, 'Paid'),
(142, '2011-01-22', '06:30:59', 'deva varma', 'instagram Ltd.', 1, 20000000, 20000000, 15000000, 5000000, 'UnPaid');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
