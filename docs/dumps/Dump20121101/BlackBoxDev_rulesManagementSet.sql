CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1-log

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
-- Table structure for table `rulesManagementSet`
--

DROP TABLE IF EXISTS `rulesManagementSet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rulesManagementSet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `rulesId` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `memberId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rulesManagementSet`
--

LOCK TABLES `rulesManagementSet` WRITE;
/*!40000 ALTER TABLE `rulesManagementSet` DISABLE KEYS */;
INSERT INTO `rulesManagementSet` VALUES (284,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',1,1,1),(285,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',2,1,1),(286,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',3,1,1),(287,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',4,1,1),(288,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',5,1,1),(291,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',8,1,1),(292,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',9,1,1),(293,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',12,1,1),(295,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',13,1,1),(297,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',14,1,1),(299,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',16,1,1),(300,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',17,1,1),(336,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',13,1,1),(337,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',1,1,0),(338,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',2,1,0),(339,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',3,1,0),(340,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',4,1,0),(341,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',5,1,0),(342,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',6,0,0),(343,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',7,0,0),(344,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',8,1,0),(345,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',9,1,0),(346,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',10,0,0),(347,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',11,0,0),(348,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',12,1,0),(349,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',14,1,0),(350,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',15,1,0),(351,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',16,0,0),(352,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',17,1,0),(353,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',19,1,0),(354,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',18,0,0),(355,'2012-11-01 00:00:00','2012-11-01 18:38:37','','','Test group five',0,1,1),(356,'2012-11-01 00:00:00','2012-11-01 18:38:44','','','Test group five',0,1,1);
/*!40000 ALTER TABLE `rulesManagementSet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-01 16:49:19
