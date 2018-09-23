# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.31-MariaDB)
# Database: ci_sipropos
# Generation Time: 2018-09-23 07:30:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `cooperation_area` varchar(255) DEFAULT NULL,
  `relevance` text,
  `ra_name` varchar(255) DEFAULT NULL,
  `ra_title` varchar(255) DEFAULT NULL,
  `ra_address` varchar(255) DEFAULT '',
  `ra_phone` varchar(30) DEFAULT NULL,
  `ra_fax` varchar(30) DEFAULT NULL,
  `ra_email` varchar(255) DEFAULT NULL,
  `cp_name` varchar(255) DEFAULT NULL,
  `cp_title` varchar(255) DEFAULT NULL,
  `cp_address` varchar(255) DEFAULT '',
  `cp_phone` varchar(30) DEFAULT '',
  `cp_fax` varchar(30) DEFAULT NULL,
  `cp_email` varchar(255) DEFAULT NULL,
  `duration` int(1) DEFAULT NULL,
  `overall_objective` text,
  `project_purpose` text,
  `target_group` text,
  `contribution` text,
  `ab_jumlah_training` int(1) DEFAULT NULL,
  `ab_jumlah_workshop` int(1) DEFAULT NULL,
  `ab_jumlah_study_visit` int(1) DEFAULT NULL,
  `ab_jumlah_seminar` int(1) DEFAULT NULL,
  `ab_jumlah_meeting` int(1) DEFAULT NULL,
  `ab_jumlah_media` int(1) DEFAULT NULL,
  `ab_jumlah_other_activities` int(1) DEFAULT NULL,
  `file_tor` varchar(255) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `experience` text,
  `publication` text,
  `other_qualification` text,
  `english_skill` int(11) DEFAULT NULL,
  `summary` text,
  `status` int(2) DEFAULT '0',
  `user_created` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `user_aproval` int(11) DEFAULT NULL,
  `date_aproval` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_user_id` (`user_created`),
  CONSTRAINT `project_user_id` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;

INSERT INTO `project` (`id`, `project_code`, `title`, `type`, `cooperation_area`, `relevance`, `ra_name`, `ra_title`, `ra_address`, `ra_phone`, `ra_fax`, `ra_email`, `cp_name`, `cp_title`, `cp_address`, `cp_phone`, `cp_fax`, `cp_email`, `duration`, `overall_objective`, `project_purpose`, `target_group`, `contribution`, `ab_jumlah_training`, `ab_jumlah_workshop`, `ab_jumlah_study_visit`, `ab_jumlah_seminar`, `ab_jumlah_meeting`, `ab_jumlah_media`, `ab_jumlah_other_activities`, `file_tor`, `education_level`, `major`, `experience`, `publication`, `other_qualification`, `english_skill`, `summary`, `status`, `user_created`, `date_created`, `user_aproval`, `date_aproval`, `date_updated`)
VALUES
	(25,'2018-USER-0025\n','Title User - 1',1,'a','a','aa','aa','aa','aa','aa','aa','bb','bb','bb','bb','bb','bb',4,'a','a','a','a',2,1,2,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asd',100,12,'2018-09-17 16:37:24',NULL,NULL,'2018-09-21 19:58:47'),
	(26,'2018-USER-0026\n','Title User - 2',2,'x','x','x','x','x','062818200839','0','verafirmansyah@gmail.com','x','x','x','62818200839','40614','verafirmansyah@gmail.com',3,'xx','xx','xx','xx',0,0,0,0,0,0,0,'2018-USER-0026__2018_09_20_14_44_04.pdf','ss','ss','ss','ss','ss',2,'aaaaa',100,12,'2018-09-17 16:37:51',NULL,NULL,'2018-09-21 19:58:52'),
	(27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-17 16:46:05',NULL,NULL,NULL),
	(28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,19,'2018-09-17 16:53:38',NULL,NULL,NULL),
	(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 11:21:22',NULL,NULL,NULL),
	(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 11:22:17',NULL,NULL,NULL),
	(31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 11:27:11',NULL,NULL,NULL),
	(32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 11:29:12',NULL,NULL,NULL),
	(33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 11:29:30',NULL,NULL,NULL),
	(34,'2018-USER-0034\n',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 11:30:19',NULL,NULL,'2018-09-20 11:30:19'),
	(35,'2018-USER-0035\n',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 12:55:20',NULL,NULL,'2018-09-20 12:55:21'),
	(36,'2018-USER-0036\n',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-20 13:05:34',NULL,NULL,'2018-09-20 13:05:35'),
	(37,'2018-USER2-0037','Title User2 - 1',1,'aaaaaaaaa','aaaaaaaaa','aaaaaaa','aaaaaaaaa','aaaaaaaaa','+62555','+625000','aaaa@gmail.com','aaaa','aaaa','aaa','+62555','+62555','aaaa@gmail.com',4,'aaa','aaa','aaa','aaa',2,1,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'aaaaa',100,19,'2018-09-21 19:44:48',NULL,NULL,'2018-09-21 19:59:00'),
	(38,'2018-USER2-0038\n','Title User2 - 2',2,'xxx','xxx','aaaaaaa','aaaaaaaaa','aaaaaaaaa','+62555','+625000','aaaa@gmail.com','aaaa','aaaa','aaa','+62555','+62555','aaaa@gmail.com',5,'xx','xx','xx','xx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-USER2-0038__2018_09_21_19_55_37.docx','xx','xx','xx','xxx','xx',3,'xxx',100,19,'2018-09-21 19:54:47',NULL,NULL,'2018-09-21 19:59:07'),
	(39,'2018-USER2-0039\n','Title User - 3',1,'asdasd','asdasd','aaaaaaa','aaaaaaaaa','aaaaaaaaa','+62555','+625000','aaaa@gmail.com','aaaa','aaaa','aaa','+62555','+62555','aaaa@gmail.com',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-21 19:56:50',NULL,NULL,'2018-09-21 19:59:27'),
	(40,'2018-USER2-0040\n','Title User2 - 3',2,'asdasd','asdasd','aaaaaaa','aaaaaaaaa','aaaaaaaaa','+62555','+625000','aaaa@gmail.com','aaaa','aaaa','aaa','+62555','+62555','aaaa@gmail.com',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,19,'2018-09-21 19:57:31',NULL,NULL,'2018-09-21 19:59:34'),
	(42,'2018-USER-0042\n',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,12,'2018-09-22 13:25:39',NULL,NULL,'2018-09-22 13:25:39');

/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
