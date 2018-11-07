-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2014 at 12:57 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lijekarne`
--
CREATE DATABASE IF NOT EXISTS `lijekarne` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lijekarne`;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `text`) VALUES
(1, 'Example email sent when objects are processed! Thank you!!!');

-- --------------------------------------------------------

--
-- Table structure for table `lijekarne`
--

CREATE TABLE IF NOT EXISTS `lijekarne` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(200) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `drzava` varchar(50) NOT NULL,
  `zupanija` varchar(50) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `timestamp` datetime NOT NULL,
  `user` int(50) NOT NULL,
  `contacted` varchar(255) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lijekarne`
--

INSERT INTO `lijekarne` (`id`, `naziv`, `grad`, `adresa`, `drzava`, `zupanija`, `telefon`, `email`, `timestamp`, `user`, `contacted`, `checked`) VALUES
(1, 'naziv', 'city', 'adres', 'state', 'zupa', 'phone', 'email', '2014-08-13 00:00:00', 2, 'contacted', 1),
(2, 'ljekarnaaa', 'osijek', 'adresa', 'drzava', 'zupanija', 'yes', 'email', '0000-00-00 00:00:00', 0, '', 0),
(3, 'ljekarna 45', 'osijek', 'jj stross 34', 'hrvatska', 'osjecko-baranjska', '9485323', 'ivucice@gmali.lm', '0000-00-00 00:00:00', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `contact`, `password`, `usertype`) VALUES
(1, 'admin', 'admin', 'admin@admin.net', 'admin', 'admin', '1'),
(2, 'user1', 'user2', 'user@user.net', 'user', 'user', '2'),
(3, 'Ivan', 'Vucicevic', 'iv@gm.com', '', 'paww', '2'),
(4, 'asd', 'asd', 'asd', '34455', 'asdad', '2'),
(5, 'Ivanr', 'Vucicevicr', 'iv@g3m.com', '7893293', 'pawwr', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
