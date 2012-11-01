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
-- Table structure for table `leadProvider`
--

DROP TABLE IF EXISTS `leadProvider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leadProvider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `companyName` varchar(64) NOT NULL,
  `primaryPhoneNumber` varchar(16) NOT NULL,
  `technicalPocName` varchar(64) NOT NULL,
  `technicalPocEmailAddress` varchar(256) NOT NULL,
  `salesPocName` varchar(256) NOT NULL,
  `salesPocEmailAddress` varchar(256) NOT NULL,
  `integrationDate` date NOT NULL,
  `apiField1` varchar(256) NOT NULL,
  `apiField2` varchar(256) NOT NULL,
  `sendingUrl` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leadProvider`
--

LOCK TABLES `leadProvider` WRITE;
/*!40000 ALTER TABLE `leadProvider` DISABLE KEYS */;
INSERT INTO `leadProvider` VALUES (2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Montgomery','8082840599','Kevin Heart','KHeart@MontgomeryCredit.co','Sara Zimmerman','SZimmerman@MontgomeryCredit.co','2012-06-22','ZHM234ka1005v55cVVWRincx3359VL','JOJJomp78903i892cbg4Oo0mmX789P','MontgomeryCredit.co'),(4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Digimarc','5033310983','Thuy Nguyen','Nguyen','Tran Nguyen','Johnathan Beck','2012-07-25','jjOku930uroLJKsdur093ioprjekpkfe923i','JJFIOJIEjioej9089I90FKDKKLDSKkldks','Digimarc.com'),(5,'2012-10-31 00:00:00','2012-10-31 17:51:48','','','Test Co.','555-1212','Tech Von Testington','test@test.com','Sales Von Testington','sales@test.com','0000-00-00','59686934asdf','werjwe90342d','www.test.com/send'),(6,'2012-10-31 00:00:00','2012-10-31 17:53:06','','','Test Co.','555-1212','Tech Von Testington','test@test.com','Sales Von Testington','sales@test.com','0000-00-00','59686934asdf','werjwe90342d','www.test.com/send'),(7,'2012-10-31 00:00:00','2012-10-31 17:53:33','','','Test Co.','555-1212','Tech Von Testington','test@test.com','Sales Von Testington','sales@test.com','2012-10-31','now()','59686934asdf','werjwe90342d'),(8,'2012-10-31 00:00:00','2012-10-31 17:54:05','','','Test Co.','555-1212','Tech Von Testington','test@test.com','Sales Von Testington','sales@test.com','2012-10-31','59686934asdf','werjwe90342d','www.test.com/send'),(9,'2012-10-31 00:00:00','2012-10-31 18:09:16','','','Test Co.','555-1212','Tech Von Testington','test@test.com','Sales Von Testington','sales@test.com','2012-10-31','59686934asdf','werjwe90342d','www.test.com/send'),(10,'2012-10-31 00:00:00','2012-10-31 18:31:37','','','Test Co.','555-1212','Tech Von Testington','test@test.com','Sales Von Testington','sales@test.com','2012-10-31','59686934asdf','werjwe90342d','www.test.com/send');
/*!40000 ALTER TABLE `leadProvider` ENABLE KEYS */;
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
