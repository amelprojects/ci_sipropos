# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.31-MariaDB)
# Database: ci_sipropos
# Generation Time: 2018-09-22 05:16:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) DEFAULT NULL,
  `user_pass` text,
  `user_fullname` varchar(200) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `id_role` int(2) DEFAULT '4',
  `is_aktif` int(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`) USING BTREE,
  KEY `id_role` (`id_role`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `user_name`, `user_pass`, `user_fullname`, `user_email`, `instansi`, `id_role`, `is_aktif`, `last_login`, `last_activity`, `ip_address`, `date_created`)
VALUES
	(1,'admin','$P$BOWJihRYE9ajuBwRgho.w5nZbEhcbz0','VERA FIRMANSYAH','verafirmansyah@gmail.com',NULL,-1,1,'2018-09-22 10:01:12','2018-09-22 09:48:26','::1','2016-10-04 19:59:17'),
	(12,'user','$P$BPnUqBnoTPhgYUXdvHRfqCXS/NBwy5.','VF Firmansyah User','verafirmansyah@yahoo.com',NULL,2,1,'2018-09-22 09:48:53','2018-09-17 18:42:29','::1','2017-01-25 08:09:59'),
	(15,'aproval','$P$B1DIN6BZ6MgEXlhvrHr6eUSz40CmJ70','A DAN DC','ad@yahoo.com',NULL,1,1,'2018-09-15 06:16:36','2018-09-15 06:23:56','::1','2017-01-28 06:22:55'),
	(17,'admin2','$P$B0.6p.O9LyTjzxUed.3zcpfTpG54f5/','ADMIN DUA','admin2@admin.com',NULL,-1,1,NULL,NULL,NULL,'2018-09-15 14:08:14'),
	(19,'user2','$P$BaNhOS/GbYp5XZursvWuCh.gXB2tas/','USER DUA','user2@user.com',NULL,2,1,'2018-09-21 19:44:40',NULL,'::1','2018-09-17 16:50:44');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
