# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: vote_for_my_team
# Generation Time: 2013-03-20 15:17:59 -0400
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table championship
# ------------------------------------------------------------

DROP TABLE IF EXISTS `championship`;

CREATE TABLE `championship` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `championship` WRITE;
/*!40000 ALTER TABLE `championship` DISABLE KEYS */;

INSERT INTO `championship` (`bracket_id`, `team_id`)
VALUES
	(1,16),
	(2,15);

/*!40000 ALTER TABLE `championship` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table elite8
# ------------------------------------------------------------

DROP TABLE IF EXISTS `elite8`;

CREATE TABLE `elite8` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `elite8` WRITE;
/*!40000 ALTER TABLE `elite8` DISABLE KEYS */;

INSERT INTO `elite8` (`bracket_id`, `team_id`)
VALUES
	(1,9),
	(2,10),
	(3,14),
	(4,9),
	(5,10),
	(6,3),
	(7,12),
	(8,12);

/*!40000 ALTER TABLE `elite8` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table final4
# ------------------------------------------------------------

DROP TABLE IF EXISTS `final4`;

CREATE TABLE `final4` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `final4` WRITE;
/*!40000 ALTER TABLE `final4` DISABLE KEYS */;

INSERT INTO `final4` (`bracket_id`, `team_id`)
VALUES
	(1,0),
	(2,0),
	(3,0),
	(4,0);

/*!40000 ALTER TABLE `final4` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sweet16
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sweet16`;

CREATE TABLE `sweet16` (
  `bracket_id` int(2) NOT NULL AUTO_INCREMENT,
  `team_id` int(9) NOT NULL,
  PRIMARY KEY (`bracket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `sweet16` WRITE;
/*!40000 ALTER TABLE `sweet16` DISABLE KEYS */;

INSERT INTO `sweet16` (`bracket_id`, `team_id`)
VALUES
	(1,1),
	(2,2),
	(3,3),
	(4,4),
	(5,5),
	(6,6),
	(7,7),
	(8,8),
	(9,9),
	(10,10),
	(11,11),
	(12,12),
	(13,13),
	(14,14),
	(15,15),
	(16,16);

/*!40000 ALTER TABLE `sweet16` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table team_votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_votes`;

CREATE TABLE `team_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(11) unsigned NOT NULL,
  `num_votes` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `team_votes` WRITE;
/*!40000 ALTER TABLE `team_votes` DISABLE KEYS */;

INSERT INTO `team_votes` (`id`, `team_id`, `num_votes`)
VALUES
	(1,0,0),
	(2,1,0),
	(3,2,0),
	(4,3,0),
	(5,4,0),
	(6,5,0),
	(7,6,0),
	(8,7,0),
	(9,8,0),
	(10,9,0),
	(11,10,0),
	(12,11,0),
	(13,12,0),
	(14,13,0),
	(15,14,0),
	(16,15,0),
	(17,16,0),
	(19,1,1),
	(20,2,1),
	(21,8,1),
	(22,10,1),
	(23,14,1);

/*!40000 ALTER TABLE `team_votes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `team_id` int(3) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_img` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`team_id`, `team_name`, `team_img`)
VALUES
	(0,'Undecided','undecided.jpg'),
	(1,'Indiana','indiana.jpg'),
	(2,'Florida','florida.jpg'),
	(3,'Louisville','louisville.jpg'),
	(4,'Duke','duke.jpg'),
	(5,'Kansas','kansas.jpg'),
	(6,'Gonzaga','gonzaga.jpg'),
	(7,'Michigan','michigan.jpg'),
	(8,'Ohio State','ohio_state.jpg'),
	(9,'Pittsburgh','pittsburgh.jpg'),
	(10,'Miami (FL)','miami.jpg'),
	(11,'Michgan State','michigan_state.jpg'),
	(12,'Syracuse','syracuse.jpg'),
	(13,'Wisconsin','wisconsin.jpg'),
	(14,'Georgetown','georgetown.jpg'),
	(15,'Arizona','arizona.jpg'),
	(16,'Marquette','marquette.jpg');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `votes`;

CREATE TABLE `votes` (
  `vote_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `total_votes` int(11) unsigned NOT NULL,
  `vote_choices` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;

INSERT INTO `votes` (`vote_id`, `total_votes`, `vote_choices`, `token`, `amount`, `email`, `first_name`, `last_name`, `time`)
VALUES
	(0,0,'','',0,'','','',''),
	(1,10,'','',0,'','','',''),
	(2,10,'','',0,'','','',''),
	(3,0,'','',0,'','','',''),
	(4,0,'','',0,'','','',''),
	(5,0,'','',0,'','','',''),
	(6,0,'','',0,'','','',''),
	(7,5,'','',0,'','','',''),
	(8,0,'','',0,'','','',''),
	(9,0,'','',0,'','','',''),
	(10,0,'','',0,'','','',''),
	(11,0,'','',0,'','','',''),
	(12,0,'','',0,'','','',''),
	(13,0,'','',0,'','','',''),
	(14,0,'','',0,'','','',''),
	(15,0,'','',0,'','','',''),
	(16,0,'','',0,'','','',''),
	(17,0,'','',0,'','','',''),
	(18,4,'','',0,'','','',''),
	(19,2,'','',0,'','','',''),
	(20,10,'','',0,'','','',''),
	(21,3,'','EC-0D88754157216701Y',3,'','Joe','Jones','2013-03-15T22:50:49Z'),
	(22,1,'','EC-6FN38115E1447634T',1,'','Joe','Jones','2013-03-15T22:52:06Z'),
	(23,2,'','EC-3BG53911EX979490F',2,'joe.jones@test.com','Joe','Jones','2013-03-20T19:12:24Z'),
	(24,3,'{\"team_8\":\"1\",\"team_10\":\"1\",\"team_14\":\"1\"}','EC-4D557062BE769760S',3,'joe.jones@test.com','Joe','Jones','2013-03-20T19:16:40Z');

/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
