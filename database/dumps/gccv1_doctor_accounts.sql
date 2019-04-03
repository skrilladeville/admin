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
-- Table structure for table `doctor_accounts`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_accounts` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `license_num` varchar(255) NOT NULL,
  `clinic_name` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street_address2` varchar(255) DEFAULT NULL,
  `city2` varchar(255) DEFAULT NULL,
  `province2` varchar(255) DEFAULT NULL,
  `postal_code2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_id_2` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_accounts`
--

LOCK TABLES `doctor_accounts` WRITE;
/*!40000 ALTER TABLE `doctor_accounts` DISABLE KEYS */;
INSERT INTO `doctor_accounts` VALUES (1,11,'test','test','test','test','test','test','test','test','test','test','test','test','test','test','test','test'),(2,10,'johnny','does','family physician','test123456','test','test','test','test','test111','test','123','pixelsplasher@gmail.com','test','test','test','test22333'),(3,13,'john','doe','family physician','test123457','test','test','test','test','test111','test','123','pixelsplasher@gmail.com','test','test','test','test22333'),(14,12,'johnny','Bond007','doctor','123456','Bahay Cannabis','Ilang-ilang St, Ham Plaza','test','Sugbo','test111','test456','123','pixelsplasher@gmail.com','','','',''),(15,27,'Pixar','Splasher','Cannabist','8448633215','Cebu Doc','Osmena Blvd','Cebu','Sugbo','test','346-99955','129','pixels@gmail.com','','','','');
/*!40000 ALTER TABLE `doctor_accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-30 22:48:56
