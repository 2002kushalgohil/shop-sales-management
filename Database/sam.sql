-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2022 at 09:47 AM
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
('abhinav bankar', 7771552345),
('abcd', 8854316750),
('deva varma', 9158848876),
('krushna bankar ', 9178427563),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `iname`, `iprice`, `qty`, `category`) VALUES
(3, 'masoor', 110, 10, 'cereals'),
(4, 'laptop', 65000, 5, 'gadgets');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sid`, `sdate`, `stime`, `cname`, `iname`, `iqty`, `iprice`, `stotal`, `amtpaid`, `amtdue`, `estatus`) VALUES
(139, '2011-01-22', '06:21:56', 'kushal gohil', 'laptop', 1, 65000, 65000, 60000, 5000, 'UnPaid'),
(144, '2023-02-22', '12:41:56', 'deva varma', 'masoor', 2, 50, 100, 100, 0, 'Paid'),
(145, '2023-02-22', '11:42:55', 'abhinav bankar', 'masoor', 3, 45, 135, 130, 5, 'UnPaid');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
