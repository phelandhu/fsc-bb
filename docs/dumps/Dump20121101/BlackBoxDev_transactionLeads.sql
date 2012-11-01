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
-- Table structure for table `transactionLeads`
--

DROP TABLE IF EXISTS `transactionLeads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactionLeads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `apiUserName` varchar(100) NOT NULL,
  `apiPassWord` varchar(100) NOT NULL,
  `storeKey` varchar(100) NOT NULL,
  `refUrl` varchar(256) NOT NULL,
  `ipAddress` varchar(21) NOT NULL,
  `tierKey` varchar(100) NOT NULL,
  `affId` varchar(100) NOT NULL,
  `subId` varchar(100) NOT NULL,
  `test` int(1) NOT NULL,
  `requestedAmount` varchar(6) NOT NULL,
  `ssn` varchar(16) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `homePhone` varchar(13) NOT NULL,
  `otherPhone` varchar(13) NOT NULL,
  `dlState` varchar(2) NOT NULL,
  `dlNumber` varchar(32) NOT NULL,
  `contactTime` varchar(1) NOT NULL,
  `addressMonths` varchar(2) NOT NULL,
  `addressYears` varchar(2) NOT NULL,
  `rentOrOwn` varchar(1) NOT NULL,
  `isMilitary` varchar(1) NOT NULL,
  `isCitizen` varchar(1) NOT NULL,
  `otherOffers` varchar(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `incomeType` varchar(1) NOT NULL,
  `payType` varchar(1) NOT NULL,
  `empMonths` varchar(2) NOT NULL,
  `empYears` varchar(2) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empAddress2` varchar(100) NOT NULL,
  `empCity` varchar(100) NOT NULL,
  `empState` varchar(2) NOT NULL,
  `empZip` varchar(11) NOT NULL,
  `empPhone` varchar(13) NOT NULL,
  `empPhoneExt` varchar(6) NOT NULL,
  `empFax` varchar(13) NOT NULL,
  `supervisorName` varchar(100) NOT NULL,
  `supervisorPhone` varchar(13) NOT NULL,
  `supervisorPhoneExt` varchar(6) NOT NULL,
  `hireDate` varchar(11) NOT NULL,
  `empType` varchar(1) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `workShift` varchar(1) NOT NULL,
  `payFrequency` varchar(11) NOT NULL,
  `netMonthly` varchar(6) NOT NULL,
  `grossMonthly` varchar(6) NOT NULL,
  `lastPayDate` varchar(11) NOT NULL,
  `nextPayDate` varchar(11) NOT NULL,
  `secondPayDate` varchar(11) NOT NULL,
  `accountHolder` varchar(100) NOT NULL,
  `bankName` varchar(100) NOT NULL,
  `bankPhone` varchar(13) NOT NULL,
  `accountType` varchar(1) NOT NULL,
  `routingNumber` varchar(9) NOT NULL,
  `accountNumber` varchar(17) NOT NULL,
  `bankMonths` int(2) NOT NULL,
  `bankYears` int(2) NOT NULL,
  `outStandingAmt` int(6) NOT NULL,
  `activeChecking` varchar(1) NOT NULL,
  `refFirstName` varchar(100) NOT NULL,
  `refLastName` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `relationship` varchar(1) NOT NULL,
  `flag` varchar(32) NOT NULL,
  `results` varchar(2048) NOT NULL,
  `code` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactionLeads`
--

LOCK TABLES `transactionLeads` WRITE;
/*!40000 ALTER TABLE `transactionLeads` DISABLE KEYS */;
INSERT INTO `transactionLeads` VALUES (1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','','<error><code>1</code><msg>OK</msg></error>',1),(2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','','<error><code>1</code><msg>OK</msg></error>',1),(3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','','<error><code>1</code><msg>OK</msg></error>',1),(4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(5,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(6,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(7,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(8,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(9,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(10,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(11,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(12,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(13,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(14,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(15,'2012-11-01 00:00:00','2012-11-01 21:50:41','','','TestunAPI','TestpwAPI','sd56f4','www.example.com/ref.php','127.0.0.1','897asdf','1','34',1,'2000','555-26-7485','06-14-1980','M','Test','Testinghouse','1234 Tester street','Lehigh Acres','FL','329-555-1212','329-555-8457','FL','B98684','','4','2','0','0','1','','test@test.com','','p','11','6','Tester Paint','123459 Streat St','','LH','FL','33915','329-555-6958','','','Bob Tester','','','12-01-2005','F','Paint Tester','S','B','2250','3333','10-31-2012','11-15-2012','11-30-2012','Test Testinghouse','Wells Fargo','714-555-1212','C','366548645','981238967',4,1,123654,'','Exam','Testinghouse','2125551212','F','','',123456),(16,'2012-11-01 14:59:43','2012-11-01 21:59:43','','','TestunAPI','TestpwAPI','sd56f4','www.example.com/ref.php','127.0.0.1','897asdf','1','34',1,'2000','555-26-7485','06-14-1980','M','Test','Testinghouse','1234 Tester street','Lehigh Acres','FL','329-555-1212','329-555-8457','FL','B98684','','4','2','0','0','1','','test@test.com','','p','11','6','Tester Paint','123459 Streat St','','LH','FL','33915','329-555-6958','','','Bob Tester','','','12-01-2005','F','Paint Tester','S','B','2250','3333','10-31-2012','11-15-2012','11-30-2012','Test Testinghouse','Wells Fargo','714-555-1212','C','366548645','981238967',4,1,123654,'','Exam','Testinghouse','2125551212','F','','',123456);
/*!40000 ALTER TABLE `transactionLeads` ENABLE KEYS */;
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
