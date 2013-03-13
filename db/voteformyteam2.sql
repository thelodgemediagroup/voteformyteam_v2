-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2013 at 06:21 PM
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
(1, 0),
(2, 0),
(3, 0),
(4, 0);

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
(1, 1),
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
(0, 'Undecided', 'undecided.jpg'),
(1, 'Indiana', 'indiana.jpg'),
(2, 'Florida', 'florida.jpg'),
(3, 'Louisville', 'louisville.jpg'),
(4, 'Duke', 'duke.jpg'),
(5, 'Kansas', 'kansas.jpg'),
(6, 'Gonzaga', 'gonzaga.jpg'),
(7, 'Michigan', 'michigan.jpg'),
(8, 'Ohio State', 'ohio_state.jpg'),
(9, 'Pittsburgh', 'pittsburgh.jpg'),
(10, 'Miami (FL)', 'miami.jpg'),
(11, 'Michgan State', 'michigan_state.jpg'),
(12, 'Syracuse', 'syracuse.jpg'),
(13, 'Wisconsin', 'wisconsin.jpg'),
(14, 'Georgetown', 'georgetown.jpg'),
(15, 'Arizona', 'arizona.jpg'),
(16, 'Marquette', 'marquette.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `num_votes` int(11) NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `team_id`, `num_votes`) VALUES
(0, 0, 0),
(1, 1, 10),
(2, 2, 10),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 5),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0),
(11, 10, 0),
(12, 11, 0),
(13, 12, 0),
(14, 13, 0),
(15, 14, 0),
(16, 15, 0),
(17, 16, 0),
(18, 5, 4),
(19, 10, 2),
(20, 4, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
