-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: gcis
-- ------------------------------------------------------
-- Server version	5.5.55

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctor_rx`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_rx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `patient_id` int(8) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `physician_directions` text,
  `doctor_initial` varchar(255) DEFAULT NULL,
  `doctor_signature` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `receiver` int(8) DEFAULT '0',
  `verifier` int(8) DEFAULT '0',
  `fill_qty` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_rx`
--

LOCK TABLES `doctor_rx` WRITE;
/*!40000 ALTER TABLE `doctor_rx` DISABLE KEYS */;
INSERT INTO `doctor_rx` VALUES (1,27,NULL,1,'Be a hero.','PXS','iou','2018-11-05 00:00:00','2018-12-14 10:57:25',1,1,1),(6,12,NULL,1,NULL,NULL,NULL,'2018-12-14 21:06:46','2018-12-14 21:06:46',0,0,1),(47,27,NULL,0,NULL,NULL,NULL,'2018-12-19 17:46:14','2018-12-19 17:46:14',0,0,1),(49,27,NULL,1,NULL,NULL,NULL,'2018-12-19 17:52:37','2018-12-19 17:52:37',0,0,1),(50,27,NULL,1,NULL,NULL,NULL,'2018-12-19 17:58:13','2018-12-19 17:58:13',0,0,1),(51,27,NULL,0,NULL,NULL,NULL,'2019-01-01 12:12:35','2019-01-01 12:12:35',0,0,4),(52,27,40,0,NULL,NULL,NULL,'2018-12-19 18:04:07','2018-12-19 18:04:07',0,0,1),(53,27,NULL,1,NULL,NULL,NULL,'2018-12-20 18:36:08','2018-12-20 18:36:08',0,0,1),(58,27,1,1,NULL,NULL,NULL,'2018-12-20 19:38:49','2018-12-20 19:38:49',0,0,1),(55,27,NULL,1,NULL,NULL,NULL,'2018-12-31 15:58:20','2018-12-31 15:58:20',0,0,1),(59,27,40,1,'Various storm-related ailments',NULL,NULL,'2018-12-20 20:09:53','2018-12-20 20:09:53',0,0,1),(60,27,40,1,'Take some of this and that','PXS',NULL,'2019-01-09 16:13:34','2019-01-09 16:13:34',0,0,1),(61,27,41,1,'Take some of this and that','PXS',NULL,'2019-01-09 16:23:52','2019-01-09 16:23:52',0,0,1),(62,27,40,1,'Think of Laura but laugh, don\'t cry.',NULL,NULL,'2019-01-09 16:30:53','2019-01-09 16:30:53',0,0,1),(63,27,69,1,'Travel the world!',NULL,NULL,'2019-01-10 23:33:12','2019-01-10 23:33:12',0,0,1),(64,27,69,1,'Travel the world!',NULL,NULL,'2019-01-10 23:34:04','2019-01-10 23:34:04',0,0,1),(65,27,69,1,'Travel the world!',NULL,NULL,'2019-01-10 23:36:23','2019-01-10 23:36:23',0,0,1),(66,27,69,1,'Travel the world!',NULL,NULL,'2019-01-11 16:42:57','2019-01-11 16:42:57',0,0,1),(67,27,35,1,'Paula Mem\'s directions',NULL,NULL,'2019-01-11 18:09:39','2019-01-11 18:09:39',0,0,1),(68,27,35,1,'Physician directions for Paula',NULL,NULL,'2019-01-11 19:23:57','2019-01-11 19:23:57',0,0,1),(69,27,35,1,'Physician directions for Paula',NULL,NULL,'2019-01-11 19:27:46','2019-01-11 19:27:46',0,0,1),(70,27,35,1,'Physician directions for Paula. Patient may access cannabis oil only',NULL,NULL,'2019-01-11 19:33:58','2019-01-11 19:33:58',0,0,1),(71,27,74,1,'Physician directions for Ronald',NULL,NULL,'2019-01-11 19:40:13','2019-01-11 19:40:13',0,0,1),(72,27,38,1,'Physician directions for David',NULL,NULL,'2019-01-12 17:05:23','2019-01-12 17:05:23',0,0,1),(73,27,47,1,'Physician directions for Adam',NULL,NULL,'2019-01-11 19:54:21','2019-01-11 19:54:21',0,0,1),(74,27,39,1,'Physician directions for Marge',NULL,NULL,'2019-01-11 20:46:34','2019-01-11 20:46:34',0,0,1),(75,27,50,1,'Physician directions for Dean',NULL,NULL,'2019-01-12 16:19:47','2019-01-12 16:19:47',0,0,1),(76,27,50,1,'Physician directions for Dean',NULL,NULL,'2019-01-12 17:25:46','2019-01-12 17:25:46',0,0,1),(77,27,61,1,'Quiet down',NULL,NULL,'2019-01-12 17:53:19','2019-01-12 17:53:19',0,0,1);
/*!40000 ALTER TABLE `doctor_rx` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-30 22:48:53
