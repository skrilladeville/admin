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
-- Table structure for table `doctor_diagnosis`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_diagnosis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rx_id` int(8) NOT NULL,
  `medical_diagnosis` text,
  `med_amt` text,
  `med_months` text,
  `fill_qty` int(4) NOT NULL DEFAULT '1',
  `fill_balance` int(4) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_diagnosis`
--

LOCK TABLES `doctor_diagnosis` WRITE;
/*!40000 ALTER TABLE `doctor_diagnosis` DISABLE KEYS */;
INSERT INTO `doctor_diagnosis` VALUES (1,1,'Popeye syndrome.','5','12',1,NULL,'2018-12-16 22:21:06','2018-12-16 22:21:06',0),(20,1,'Spinach cravings','5','12',10,6,'2018-12-17 14:17:06','2018-12-17 14:17:06',1),(2,1,'depression symptoms resulting to chronic fatigue and oversleeping. too much zzzzz. ','30','6',3,1,'2018-11-05 00:00:00','2018-12-14 10:57:37',1),(17,1,'Mental anguish','23','17',1,NULL,'2018-11-05 00:00:00','2018-12-14 10:57:37',0),(15,1,'Hearing voices in head. Some of them projected in front.','5','37',4,2,'2018-11-05 00:00:00','2018-12-14 10:57:37',1),(19,1,'Lost rx_id','45','12',1,NULL,'2018-12-17 13:44:33','2018-12-17 13:44:33',0),(22,1,'Common cold infection','45','12',1,NULL,'2018-12-17 14:15:53','2018-12-17 14:15:53',0),(32,1,'Sore throat from eating Toblerone','45','12',1,NULL,'2018-12-17 14:17:06','2018-12-17 14:17:06',1),(64,52,'Pacific rim vertigo','125','18',1,NULL,'2018-12-19 18:04:07','2018-12-19 18:04:07',1),(66,55,'Oprah has Sore throat','560','1',4,3,'2018-12-31 15:58:20','2018-12-31 15:58:20',1),(71,58,'Breathing difficulty','125','1',1,NULL,'2018-12-20 19:38:49','2018-12-20 19:38:49',1),(72,59,'Raindrops felt falling on head','560','10',5,3,'2018-12-20 19:58:33','2018-12-20 19:58:33',0),(73,59,'Storm brewing in his mind','23','17',1,NULL,'2018-12-20 20:09:53','2018-12-20 20:09:53',1),(74,59,'Sand in left eye','45','12',1,NULL,'2018-12-20 20:09:53','2018-12-20 20:09:53',1),(75,51,'Lily\'s first medical diagnosis','23','23',1,NULL,'2019-01-01 12:12:35','2019-01-01 12:12:35',1),(76,51,'Lily\'s second diagnosis','5','12',1,NULL,'2019-01-01 12:12:35','2019-01-01 12:12:35',1),(77,51,'Lily\'s 3rd diagnosis','5','37',1,NULL,'2019-01-01 12:12:35','2019-01-01 12:12:35',1),(78,60,'Take some of this and that','100','23',1,NULL,'2019-01-09 16:13:34','2019-01-09 16:13:34',1),(79,61,'Thinking of Laura. Laugh, don\'t cry.','100','23',1,NULL,'2019-01-09 16:23:52','2019-01-09 16:23:52',1),(80,62,'Missing Laura','23','45',1,NULL,'2019-01-09 16:30:53','2019-01-09 16:30:53',1),(81,68,'Medical diagnosis for Paula','23','17',1,NULL,'2019-01-11 19:23:57','2019-01-11 19:23:57',1),(82,69,'Medical diagnosis for Paula','23','17',1,NULL,'2019-01-11 19:27:46','2019-01-11 19:27:46',1),(83,70,'Medical diagnosis for Paula','23','17',1,NULL,'2019-01-11 19:31:26','2019-01-11 19:31:26',1),(84,71,'Medical diagnosis for Ronald Kay','15','45',1,NULL,'2019-01-11 19:40:13','2019-01-11 19:40:13',1),(85,72,'Medical diagnosis for Davide Jr','100','18',1,NULL,'2019-01-12 17:05:23','2019-01-12 17:05:23',1),(86,73,'Medical diagnosis of Adam','560','23',1,NULL,'2019-01-11 19:46:50','2019-01-11 19:46:50',1),(87,74,'Medical diagnosis for Marge','23','18',1,NULL,'2019-01-11 20:45:58','2019-01-11 20:45:58',1),(88,74,'Medical diagnosis for Margaret','23','18',1,NULL,'2019-01-11 20:46:34','2019-01-11 20:46:34',1),(89,75,'Medical diagnosis for Brandon','125','10',1,NULL,'2019-01-12 16:19:47','2019-01-12 16:19:47',1),(90,76,'Medical diagnosis for Brandon','125','10',1,NULL,'2019-01-12 16:28:51','2019-01-12 16:28:51',0),(91,76,'Medical diagnosis for Brandon Fraser','125','10',1,NULL,'2019-01-12 16:29:54','2019-01-12 16:29:54',0),(92,76,'Medical diagnosis for Brandon Fraser','125','10',1,NULL,'2019-01-12 16:32:35','2019-01-12 16:32:35',0),(93,76,'Medical diagnosis for Brandon','125','10',1,NULL,'2019-01-12 17:25:46','2019-01-12 17:25:46',1),(94,76,'Mummified','45','37',1,NULL,'2019-01-12 17:25:46','2019-01-12 17:25:46',1),(95,77,'Noisy environment in neighborhood','560','1',1,NULL,'2019-01-12 17:53:19','2019-01-12 17:53:19',1),(96,49,'Murra Mazza diagnosed','23','1',1,NULL,'2019-01-12 17:56:09','2019-01-12 17:56:09',1);
/*!40000 ALTER TABLE `doctor_diagnosis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-30 22:48:54
