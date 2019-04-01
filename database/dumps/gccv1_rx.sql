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
-- Table structure for table `rx`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rx` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `date_birth` varchar(255) DEFAULT NULL,
  `rx_id` mediumint(9) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rx`
--

LOCK TABLES `rx` WRITE;
/*!40000 ALTER TABLE `rx` DISABLE KEYS */;
INSERT INTO `rx` VALUES (1,'Gay','Goodman','Jun 14, 1928',15323,1),(2,'Brian','Patterson','Jun 14, 1929',13348,1),(3,'Garrett','Young','Apr 6, 1929',11384,1),(4,'Lance','Frederick','Aug 14, 1952',14856,1),(5,'Laith','Mercer','May 17, 1993',17552,1),(6,'Imani','Whitehead','Apr 12, 1977',10197,0),(7,'Kelly','Cole','Aug 13, 1995',12196,1),(8,'Neil','Craft','Dec 12, 1979',12861,1),(9,'Delilah','Wilcox','Nov 8, 1941',16476,1),(10,'Remedios','Compton','Nov 17, 1979',13621,0),(11,'Driscoll','Perry','Sep 12, 1956',15133,1),(12,'Walker','Deleon','Apr 2, 1941',10503,1),(13,'Reuben','Bennett','Oct 3, 1986',14181,1),(14,'Darryl','Humphrey','Jan 28, 1922',19033,1),(15,'Jasper','Sheppard','Nov 14, 1999',10702,1),(16,'Macon','Dominguez','Jun 7, 1977',10502,0),(17,'Illiana','Oneal','Sep 29, 1947',13589,1),(18,'Kirestin','Summers','Jan 25, 1983',14068,1),(19,'Jayme','Pollard','Jan 18, 1968',16331,1),(20,'Rafael','Phillips','Aug 25, 1991',10547,1),(21,'Kitra','Gallagher','Oct 29, 1967',16253,1),(22,'Thomas','Marshall','Feb 24, 1938',17768,1),(23,'Mufutau','Hunter','Jan 12, 1942',16328,0),(24,'Julian','Ball','Jul 31, 1922',12475,1),(25,'Denton','Sandoval','Oct 2, 1998',16934,1),(26,'Karen','Mason','Aug 12, 1942',11523,1),(27,'Carissa','Clark','Oct 4, 1992',14623,1),(28,'Suki','Conway','May 16, 1950',12519,1),(29,'Xandra','Ochoa','Nov 4, 1995',16285,1),(30,'Reuben','Eaton','Nov 20, 1935',15107,1),(31,'Venus','Irwin','Mar 12, 1941',11086,1),(32,'Ciaran','Whitney','Mar 15, 1987',16432,1),(33,'Gray','Hickman','Feb 7, 1934',15904,1),(34,'Jonah','Lynn','Jun 7, 1996',17122,1),(35,'Bertha','Lyons','Dec 14, 1942',13828,1),(36,'Lynn','Mcmillan','Apr 14, 1948',19545,1),(37,'Steven','Koch','Apr 14, 1930',19880,1),(38,'Melvin','Rogers','May 4, 2000',11060,1),(39,'Jana','Giles','Jun 19, 1937',11500,1),(40,'Kathleen','Richardson','Apr 6, 1984',18788,1),(41,'Jescie','Cain','Feb 16, 1935',16940,1),(42,'Wyatt','Fox','Oct 12, 1969',17873,1),(43,'Erich','Alexander','Mar 26, 1970',19509,1),(44,'Marshall','Deleon','Oct 31, 1921',11557,1),(45,'Evelyn','Ayala','Jun 14, 1932',13546,0),(46,'Catherine','Rutledge','Sep 2, 1955',14879,1),(47,'Erich','Parker','Apr 10, 1969',15764,1),(48,'Ivan','Richardson','May 22, 1923',14934,1),(49,'Petra','Good','Aug 24, 1950',13918,1),(50,'Madeline','Hurst','Jun 13, 1946',19470,1),(51,'Madeson','Shepard','Dec 6, 1986',17386,1),(52,'Maite','Case','Dec 22, 1980',11915,0),(53,'Henry','Kim','Oct 27, 1990',12353,1),(54,'Hiram','Diaz','Jun 30, 1947',14827,1),(55,'Kalia','Maxwell','Jun 5, 1934',10989,1),(56,'Haviva','Curtis','Mar 20, 1962',16289,1),(57,'Tate','Weber','Dec 1, 1995',18749,1),(58,'Lunea','Travis','Sep 10, 1962',13838,1),(59,'Xandra','Noel','Jul 19, 1974',18901,1),(60,'Reece','Freeman','Jun 21, 1926',15418,1),(61,'Almax','Irwin','Jul 21, 1931',13108,0),(62,'Whoopi','Jones','Sep 25, 1959',14652,1),(63,'Rashad','Mccullough','Nov 24, 1950',18536,1),(64,'Florence','Mayer','Jul 15, 1959',10969,1),(65,'Rhea','May','May 31, 1929',14694,1),(66,'Galena','Pickett','Dec 12, 1964',16839,1),(67,'Hayes','Duran','Feb 21, 1997',12264,1),(68,'Risa','Steele','Jan 28, 1965',16695,1),(69,'Emerald','Rush','Feb 2, 1969',16332,1),(70,'Desirae','Waters','Jan 27, 1990',14915,1),(71,'Zena','Walsh','Aug 2, 1981',16569,1),(72,'Price','Petty','Oct 25, 1977',12670,1),(73,'Daquan','Ewing','Oct 26, 1948',18822,1),(74,'Whitney','Wilkerson','May 13, 1941',16942,1),(75,'Peter','Watts','May 6, 1988',13399,1),(76,'Colby','Sparks','Mar 1, 2000',10133,1),(77,'Chaim','Neal','Aug 16, 1963',12972,1),(78,'Yuri','Stephenson','Nov 28, 1955',10698,1),(79,'Robert','Newman','Jul 21, 1994',10237,1),(80,'Silas','Lambert','Aug 20, 1986',11227,0),(81,'Amaya','Hebert','May 3, 1995',14002,0),(82,'Sopoline','Howell','Nov 16, 1974',11554,1),(83,'Abraham1','Diaz2','Jan 20, 1942',113205,0),(84,'Jolene','Ortega','Dec 18, 1934',10789,1),(85,'Belle','Owens','Jul 29, 1996',17603,0),(86,'Jonah','Schmidt','Nov 14, 1993',17037,1),(87,'Raven','Roberson','Jan 18, 1925',10447,0),(88,'Charity','Matthews','Oct 12, 1971',14505,1),(89,'Eugenia','Hewitt','Jun 6, 1987',18520,1),(90,'Halee','Berg','Dec 26, 1971',13168,1),(91,'Nita','Mcconnell','Aug 16, 1930',11086,1),(92,'Finn','Callahan','Nov 9, 1942',16117,1),(93,'Edward','Conway','Jun 16, 1958',11064,1),(94,'David','Callahan','Jul 30, 1939',18132,1),(95,'Xander','Castillo','Jul 3, 1982',18796,1),(96,'Graiden','Marquez','Oct 9, 1931',16124,1),(97,'Phelan','Bishop','Feb 13, 1974',19459,1),(98,'Melissa','Harmon','Jan 18, 1931',10019,1),(99,'Karyn','Meadows','Jul 28, 1995',14398,1),(100,'Macon','Cobb','Mar 13, 1929',17416,1);
/*!40000 ALTER TABLE `rx` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-30 22:48:46
