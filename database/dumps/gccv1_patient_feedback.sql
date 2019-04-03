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
-- Table structure for table `patient_feedback`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnosis_id` int(11) NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `feedback` mediumtext,
  `refill_qty` int(4) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_feedback`
--

LOCK TABLES `patient_feedback` WRITE;
/*!40000 ALTER TABLE `patient_feedback` DISABLE KEYS */;
INSERT INTO `patient_feedback` VALUES (1,1,1,'Sample only.',1,'2018-12-16 22:21:06','2018-12-16 22:21:06'),(2,2,27,'having palpitations after sleeping early',2,'2019-01-20 22:06:12','2019-01-20 22:06:12'),(4,15,27,'I need a new Sony noise-cancelling headphones to sleep well and drown out the voices. I can hear dead people whisper close to me. One is asking me to find her lost diary. She had forgotten',2,'2019-01-24 18:45:28','2019-01-24 18:45:28'),(13,32,27,'It\'s ok. No worries. I now eat M & M ',NULL,'2019-01-21 11:26:02','2019-01-21 11:26:02'),(14,64,27,'Save me',NULL,'2019-01-20 22:07:57','2019-01-20 22:07:57'),(15,73,27,'Storm still in my mind. Need to calm down.',NULL,'2019-01-20 22:13:06','2019-01-20 22:13:06'),(17,20,27,NULL,4,'2019-01-21 14:21:05','2019-01-21 14:21:05'),(18,71,27,'Need oxygen tank',NULL,'2019-01-21 13:58:43','2019-01-21 13:58:43'),(21,74,27,'The sandman appeared after I took the Rx',NULL,'2019-01-24 19:16:38','2019-01-24 19:16:38'),(22,66,27,'Ginger works for a while',1,'2019-01-24 21:49:59','2019-01-24 21:49:59'),(30,75,27,'My FEEDBACK is this',NULL,'2019-01-24 22:27:39','2019-01-24 22:27:39'),(31,75,12,'well',NULL,'2019-01-24 22:42:34','2019-01-24 22:42:34'),(32,2,27,'having palpitations after sleeping early morn',2,'2019-02-18 15:15:13','2019-02-18 15:15:13');
/*!40000 ALTER TABLE `patient_feedback` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-30 22:48:49
