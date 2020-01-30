-- --------------------------------------------------------
-- Host:                         fresh-dev.academy
-- Server version:               10.1.40-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ivar_wouter
CREATE DATABASE IF NOT EXISTS `ivar_wouter` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ivar_wouter`;

-- Dumping structure for table ivar_wouter.active
CREATE TABLE IF NOT EXISTS `active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table ivar_wouter.filiaal
CREATE TABLE IF NOT EXISTS `filiaal` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table ivar_wouter.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` smallint(99) NOT NULL,
  `image_naam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table ivar_wouter.log
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `failed_login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=592 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table ivar_wouter.mail
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` text NOT NULL,
  `achternaam` text NOT NULL,
  `mail` text NOT NULL,
  `body` mediumtext NOT NULL,
  `gereageerd` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table ivar_wouter.merken
CREATE TABLE IF NOT EXISTS `merken` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` text NOT NULL,
  `class` text NOT NULL,
  `naam` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
