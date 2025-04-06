-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2024 at 06:21 AM
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
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(255) NOT NULL,
  `founded_year` int(11) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_phono` int(11) NOT NULL,
  `website` text,
  `lic_no` varchar(255) NOT NULL,
  `lic_doc` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`club_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `founded_year`, `location`, `email`, `owner_name`, `owner_phono`, `website`, `lic_no`, `lic_doc`, `status`) VALUES
(1, 'AGM Club', 2020, 'Kollam', 'agm@gmail.com', 'Rakesh kumar', 2147483647, 'https://en.wikipedia.org/wiki/Virat_Kohli', '777777777777', 'ddocuments/_aadhaar_of_agm@gmail.com.pdf', 'Approved'),
(2, 'Kollam Cricket Club', NULL, '', 'kcc@gmail.com', '', 0, NULL, '', '', 'New'),
(3, 'Kochi Cricket Club', NULL, '', 'kochicc@gmail.com', '', 0, NULL, '', '', 'Rejected'),
(4, 'SNCT Cricket Club', NULL, '', 'snct@gmail.com', '', 0, NULL, '', '', 'Approved'),
(5, 'SNIT Cricket Club', NULL, '', 'snit@gmail.com', '', 0, NULL, '', '', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `clubs_players`
--

CREATE TABLE IF NOT EXISTS `clubs_players` (
  `cp_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`cp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `clubs_players`
--

INSERT INTO `clubs_players` (`cp_id`, `club_id`, `pid`, `role`, `status`) VALUES
(1, 1, 1, 'Batsman', 'New'),
(2, 1, 3, 'Batsman', 'New');

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
('kcc@gmail.com', 'kcc', 'Kollam Cricket Club', 'Club', 'New'),
('kochicc@gmail.com', 'kochi', 'Kochi Cricket Club', 'Club', 'Rejected'),
('montu@gmail.com', 'm', 'Montu Sharma', 'Player', 'New'),
('agm@gmail.com', 'a', 'AGM Club', 'Club', 'Approved'),
('goku@gmail.com', 'Goku@123', 'Gokul Jayakumar', 'Player', 'Acquired'),
('snct@gmail.com', 'snct', 'SNCT Cricket Club', 'Club', 'Approved'),
('snit@gmail.com', 'snit', 'SNIT Cricket Club', 'Club', 'Approved'),
('neraj@gmail.com', 'Neraj@123', 'Neraj Lal', 'Player', 'Approved'),
('dil@gmail.com', 'dil', 'Dilshana', 'Player', 'New'),
('adarsh@gmail.com', 'adarsh', 'Adarsh P Nair', 'Player', 'New'),
('mohit@gmail.com', 'Mohit', 'Mohit', 'Player', 'Rejected'),
('vipin@gmail.com', 'v', 'Vipin V', 'Player', 'New'),
('anandu@gmail.com', 'anandu', 'Anandu Mohan', 'Player', 'New'),
('shibin@gmail.com', 'shibin', 'Shibinsha', 'Player', 'New'),
('anoop@gmail.com', 'anoop', 'Anoop', 'Player', 'New'),
('akshay@gmail.com', 'Akshay', 'Akshay C', 'Player', 'New'),
('rajesh@gmail.com', 'rajesh', 'Rajesh R', 'Player', 'New'),
('rohan@gmail.com', 'Rohan', 'Rohan R', 'Player', 'New'),
('nikhil@gmail.com', 'n', 'Nikhil Anand', 'Player', 'New'),
('nikhila@gmail.com', 'aa', 'Nikhil Achu', 'Player', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `player_career`
--

CREATE TABLE IF NOT EXISTS `player_career` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `match_played` int(11) NOT NULL,
  `run_scored` int(11) NOT NULL,
  `no_of_six` int(11) NOT NULL,
  `no_of_four` int(11) NOT NULL,
  `batting_avg` int(11) NOT NULL,
  `centuries` int(11) NOT NULL,
  `half_centuries` int(11) NOT NULL,
  `top_score` int(11) NOT NULL,
  `no_over_thrown` int(11) NOT NULL,
  `economy` int(11) NOT NULL,
  `wide_balls` int(11) NOT NULL,
  `no_balls` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `catches` int(11) NOT NULL,
  `run_outs` int(11) NOT NULL,
  `stumping` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `player_career`
--

INSERT INTO `player_career` (`id`, `pid`, `match_played`, `run_scored`, `no_of_six`, `no_of_four`, `batting_avg`, `centuries`, `half_centuries`, `top_score`, `no_over_thrown`, `economy`, `wide_balls`, `no_balls`, `wickets`, `catches`, `run_outs`, `stumping`, `grade`, `status`) VALUES
(1, 1, 2, 107, 2, 2, 54, 2, 2, 101, 0, 0, 0, 0, 0, 0, 0, 0, 'B', 'Predicted'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(14, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(3, 3, 1, 122, 1, 1, 122, 1, 1, 122, 0, 0, 0, 0, 0, 0, 2, 0, 'B', 'Predicted'),
(8, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(9, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(12, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(13, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New'),
(16, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `player_matchinfo`
--

CREATE TABLE IF NOT EXISTS `player_matchinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `competition` varchar(255) NOT NULL,
  `match_played` int(11) NOT NULL,
  `run_scored` int(11) NOT NULL,
  `no_six` int(11) NOT NULL,
  `no_four` int(11) NOT NULL,
  `centuries` int(11) NOT NULL,
  `half_centuries` int(11) NOT NULL,
  `overs` int(11) NOT NULL,
  `run_goton_balling` int(11) NOT NULL,
  `wide_ball` int(11) NOT NULL,
  `no_ball` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `catches` int(11) NOT NULL,
  `stumping` int(11) NOT NULL,
  `run_outs` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `club_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `player_matchinfo`
--

INSERT INTO `player_matchinfo` (`id`, `pid`, `competition`, `match_played`, `run_scored`, `no_six`, `no_four`, `centuries`, `half_centuries`, `overs`, `run_goton_balling`, `wide_ball`, `no_ball`, `wickets`, `catches`, `stumping`, `run_outs`, `status`, `club_id`) VALUES
(1, 1, 'ODI', 1, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Approved', 'agm@gmail.com'),
(2, 1, 'TEST', 1, 101, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Approved', 'agm@gmail.com'),
(3, 3, 'T20', 1, 122, 6, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2, 'Approved', 'agm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `player_phy`
--

CREATE TABLE IF NOT EXISTS `player_phy` (
  `pid` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `batting` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `bowling` varchar(255) NOT NULL,
  `preference` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_phy`
--

INSERT INTO `player_phy` (`pid`, `height`, `weight`, `batting`, `role`, `bowling`, `preference`, `status`) VALUES
(1, 168, 68, 'Right', 'Batsman', 'Right-arm pace', 'Middle Order Batsman', 'New'),
(2, 0, 0, '', '', '', '', 'New'),
(3, 168, 70, 'Right', 'Batsman', 'Right-arm pace', 'Opening Batsman', 'New'),
(4, 0, 0, '', '', '', '', 'New'),
(5, 0, 0, '', '', '', '', 'New'),
(6, 0, 0, '', '', '', '', 'New'),
(7, 0, 0, '', '', '', '', 'New'),
(8, 0, 0, '', '', '', '', 'New'),
(9, 0, 0, '', '', '', '', 'New'),
(10, 0, 0, '', '', '', '', 'New'),
(11, 0, 0, '', '', '', '', 'New'),
(12, 0, 0, '', '', '', '', 'New'),
(13, 0, 0, '', '', '', '', 'New'),
(14, 0, 0, '', '', '', '', 'New'),
(15, 0, 0, '', '', '', '', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `player_reg`
--

CREATE TABLE IF NOT EXISTS `player_reg` (
  `pid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `ph_no` varchar(255) NOT NULL,
  `blood_grp` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `photo` text NOT NULL,
  `identification_mark` varchar(255) NOT NULL,
  `aadhaar_no` varchar(11) NOT NULL,
  `aadhaar_doc` text NOT NULL,
  `status` varchar(250) NOT NULL,
  `acquired_status` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `player_reg`
--

INSERT INTO `player_reg` (`pid`, `name`, `gender`, `email`, `dob`, `ph_no`, `blood_grp`, `address`, `photo`, `identification_mark`, `aadhaar_no`, `aadhaar_doc`, `status`, `acquired_status`) VALUES
(1, 'Gokul Jayakumar', 'Male', 'goku@gmail.com', '1999-11-05', '8547349691', '', 'Kollam, Kerala', 'profilepic/Pic_goku@gmail.com.jpg', 'black mole on neck', '44447777888', 'ddocuments/_aadhaar_ofgoku@gmail.com.pdf', 'Approved', 'Acquired'),
(2, 'Montu Sharma', '', 'montu@gmail.com', '', '0', '', '', 'profilepic/default.png', '', '0', '', 'New', ''),
(3, 'Neraj Lal', 'Male', 'neraj@gmail.com', '2006-03-20', '7878784545', '', 'My home address example', 'profilepic/Pic_neraj@gmail.com.jpg', 'black mole', '77778888777', 'ddocuments/_aadhaar_ofneraj@gmail.com.pdf', 'Approved', 'Acquired'),
(4, 'Dilshana', '', 'dil@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(5, 'Adarsh P Nair', '', 'adarsh@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(6, 'Mohit', '', 'mohit@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'Rejected', ''),
(7, 'Vipin V', '', 'vipin@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(8, 'Anandu Mohan', '', 'anandu@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(9, 'Shibinsha', '', 'shibin@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(10, 'Anoop', '', 'anoop@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(11, 'Akshay C', '', 'akshay@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(12, 'Rajesh R', '', 'rajesh@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(13, 'Rohan R', '', 'rohan@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(14, 'Nikhil Anand', '', 'nikhil@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', ''),
(15, 'Nikhil Achu', '', 'nikhila@gmail.com', '', '', '', '', 'profilepic/default.png', '', '', '', 'New', '');

-- --------------------------------------------------------

--
-- Table structure for table `suggested_players`
--

CREATE TABLE IF NOT EXISTS `suggested_players` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `photo` text NOT NULL,
  `pname` varchar(255) NOT NULL,
  `club_id` int(11) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suggested_players`
--

INSERT INTO `suggested_players` (`sid`, `pid`, `photo`, `pname`, `club_id`, `club_name`, `role`, `grade`, `status`) VALUES
(2, 1, 'profilepic/Pic_goku@gmail.com.jpg', 'Gokul Jayakumar', 1, 'AGM Club', 'Batsman', 'B', 'New');
