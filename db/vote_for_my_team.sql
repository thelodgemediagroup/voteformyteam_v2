-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2013 at 02:28 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vote_for_my_team`
--

-- --------------------------------------------------------

--
-- Table structure for table `championship`
--

CREATE TABLE `championship` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `championship`
--

INSERT INTO `championship` (`bracket_id`, `team_id`) VALUES
(1, 16),
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `elite8`
--

CREATE TABLE `elite8` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `elite8`
--

INSERT INTO `elite8` (`bracket_id`, `team_id`) VALUES
(1, 9),
(2, 10),
(3, 14),
(4, 9),
(5, 10),
(6, 3),
(7, 12),
(8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `final4`
--

CREATE TABLE `final4` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `final4`
--

INSERT INTO `final4` (`bracket_id`, `team_id`) VALUES
(1, 8),
(2, 10),
(3, 10),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sweet16`
--

CREATE TABLE `sweet16` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sweet16`
--

INSERT INTO `sweet16` (`bracket_id`, `team_id`) VALUES
(1, 8),
(2, 10),
(3, 4),
(4, 7),
(5, 5),
(6, 3),
(7, 14),
(8, 7),
(9, 11),
(10, 16),
(11, 9),
(12, 9),
(13, 11),
(14, 7),
(15, 7),
(16, 15);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(3) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_img` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_img`) VALUES
(0, 'Undecided', ''),
(1, 'Indiana', ''),
(2, 'Florida', ''),
(3, 'Louisville', ''),
(4, 'Duke', ''),
(5, 'Kansas', ''),
(6, 'Gonzaga', ''),
(7, 'Michigan', ''),
(8, 'Ohio State', ''),
(9, 'Pittsburgh', ''),
(10, 'Miami (FL)', ''),
(11, 'Michgan State', ''),
(12, 'Syracuse', ''),
(13, 'Wisconsin', ''),
(14, 'Georgetown', ''),
(15, 'Arizona', ''),
(16, 'Marquette', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `num_votes` int(11) NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
