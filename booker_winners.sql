# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.33)
# Database: booker_winners
# Generation Time: 2021-03-29 10:00:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table booker_winners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `booker_winners`;

CREATE TABLE `booker_winners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prize_year` int(11) unsigned DEFAULT NULL,
  `author_name` varchar(150) DEFAULT NULL,
  `book_name` varchar(300) DEFAULT NULL,
  `author_nationality` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `booker_winners` WRITE;
/*!40000 ALTER TABLE `booker_winners` DISABLE KEYS */;

INSERT INTO `booker_winners` (`id`, `prize_year`, `author_name`, `book_name`, `author_nationality`)
VALUES
	(1,2020,'Douglas Stuart','Shuggie Bain','Scottish-American'),
	(2,2019,'Margaret Atwood','The Testaments','Canadian'),
	(3,2019,'Bernardine Evaristo','Girl, Woman, Other','British'),
	(4,2018,'Anna Burns','Milkman','Irish'),
	(5,2017,'George Saunders','Lincoln in the Bardo','American'),
	(6,2016,'Paul Beatty','The Sellout','American');

/*!40000 ALTER TABLE `booker_winners` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
