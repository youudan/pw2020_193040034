# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: pw1_193040034
# Generation Time: 2020-04-27 08:52:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table alat_musik
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alat_musik`;

CREATE TABLE `alat_musik` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(140) DEFAULT NULL,
  `slug` varchar(140) DEFAULT NULL,
  `merk` varchar(140) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `jenis` varchar(140) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

LOCK TABLES `alat_musik` WRITE;
/*!40000 ALTER TABLE `alat_musik` DISABLE KEYS */;

INSERT INTO `alat_musik` (`id`, `nama`, `slug`, `merk`, `gambar`, `deskripsi`, `jenis`, `created_at`, `updated_at`)
VALUES
	(18,'Deluxe Electric Guitar','deluxe-electric-guitar','Radix','radix-deluxe-sb-150x150.jpg','Deluxe is the first guitar we designed. Countless prototypes, hundreds ideas from almost everyone, finally delivered Deluxe Series with the details I always dreamed of…a beautiful guitar with modern and aggressive look.','Electric','2020-04-27 13:42:05',NULL),
	(19,'OSiris Classic Black Electric Guitar','osiiris-classic-black-electric-guitar','Radix','Radix-Osiris-Tobacco-150x150.jpg','Double humbuckers give you the meaty chunky tone, Stop tail bar with tune O matic bridge keep the Osiris as simple as a single cut should be!!','Electric',NULL,NULL),
	(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `alat_musik` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`)
VALUES
	(2,'niki','$2y$10$VGGV6AMg7C0E0Q9GSIX3EOte9oMqgkpWvAmleLjCBQLnkhywronLO');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
