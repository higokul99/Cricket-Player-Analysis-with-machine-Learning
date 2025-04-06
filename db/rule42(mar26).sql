-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2024 at 06:15 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2024_cricketai`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `account_status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `name`, `type`, `account_status`) VALUES
('admin', 'admin', 'Administrator', 'Admin', 'Approved'),
('player', 'player', 'Player Name', 'Player', 'Approved'),
('club', 'club', 'Club Name', 'Club', 'Approved'),
('goku@gmail.com', 'Password@123', 'Gokul Jayakumar', 'Player', 'New'),
('rohit@gmail.com', 'Password@123', 'Rohit Sharma', 'Player', 'New'),
('vivek@gmail.com', 'Password@123', 'Vivek', 'Player', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `player_reg`
--

CREATE TABLE IF NOT EXISTS `player_reg` (
  `mid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `ph_no` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `photo` text NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `player_reg`
--

INSERT INTO `player_reg` (`mid`, `name`, `gender`, `email`, `dob`, `ph_no`, `address`, `photo`, `status`) VALUES
(1, 'Gokul Jayakumar', '', 'goku@gmail.com', '', 0, '', '', 'New'),
(2, 'Rohit Sharma', '', 'rohit@gmail.com', '', 0, '', '', 'New'),
(3, 'Vivek', '', 'vivek@gmail.com', '', 0, '', '', 'New');
