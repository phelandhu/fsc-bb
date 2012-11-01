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
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `ruleDescription` varchar(1024) NOT NULL,
  `phpLocation` varchar(128) NOT NULL DEFAULT '/include/BBCore/cbbxruleset.php',
  `value` varchar(512) NOT NULL,
  `fieldName` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rules`
--

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT INTO `rules` VALUES (1,'0000-00-00 00:00:00','0000-00-00 00:00:00','','Test of the do','Reject loan if email includes .mil ','Reject loan if email includes .mil ','validate_text_contains','.mil','email'),(2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Reject loan if email includes .gov ','Reject loan if email includes .gov ','validate_text_contains','.gov','email'),(3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'ABA is invalid ','ABA is invalid ','validate_numeric_equalEqualTo_CharCount','9','ROUTINGNUMBER'),(4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Customer or spouse is in military ','Customer or spouse is in military ','validate_isTrue','Errors','ISMILITARY'),(5,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Deny if bankruptcy','Deny if bankruptcy','validate_isTrue','Errors','BANKRUPTCY'),(6,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Deny Loan if customer has a \"Hold\" flag','Deny Loan if customer has a \"Hold\" flag','validate_text_contains','Hold','Flag'),(7,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Deny new loan if customer has a \"Deny\" flag','Deny new loan if customer has a \"Deny\" flag ','validate_text_contains','Deny','Flag'),(8,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Employment date must be greater than or equal to 60 days ','Employment date must be greater than or equal to 60 days','validate_date_xdaysGreater','60','EMPMONTHS'),(9,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Payment Type cannot be paper check','Payment Type cannot be paper check','validate_text_contains','P','PAYTYPE'),(10,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Loan due date cannot be on a holiday ','Loan due date cannot be on a holiday ','validate_date_isHoliday','Errors','LOANDUEDATE'),(11,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Loan due date cannot be on a weekend ','Loan due date cannot be on a weekend','validate_date_isWeekEnd','Errors','LOANDUEDATE'),(12,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Minimum monthly Income of $1000','Minimum monthly Income of $1000','validate_numeric_lesser','1000','NETMONTHLY'),(13,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Minimum residence duration of 1 month(s)','Minimum residence duration of 1 month(s)','validate_numeric_greaterThanEqualTo','1','LENGTHATRESIDENCE'),(14,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Valid home phone number','Valid home phone number','validate_numeric_equalEqualTo_CharCount','10','HOMEPHONE'),(15,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Verify that Drivers License number does not exist for another applicant','Verify that Drivers License number does not exist for another applicant','validate_Data_Exist','Errors','driverslicense'),(16,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Checking account must be open for 1 months or greater ','Checking account must be open for 1 months or greater ','validate_numeric_greaterThanEqualTo','1','LENGTHBANKING'),(17,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Payment Type cannot be cash','Payment Type cannot be cash','validate_text_contains','C','PAYTYPE'),(18,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'Account # is invalid ','Account # is invalid ','validate_numeric_equalEqualTo_CharCount','17','ACCOUNTNUMBER'),(20,'2012-10-31 00:00:00','2012-10-31 23:42:23','','','My Test Rule','My Test Rule','myTestRule','mtr','email');
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;
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
