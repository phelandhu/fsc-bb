CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `bankingInformation`
--

DROP TABLE IF EXISTS `bankingInformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bankingInformation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` date NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `personalInformationId` int(11) NOT NULL,
  `accountHolder` varchar(100) NOT NULL,
  `bankName` varchar(50) NOT NULL,
  `bankPhone` varchar(13) NOT NULL,
  `accountType` varchar(11) NOT NULL,
  `routingNumber` varchar(9) NOT NULL,
  `accountNumber` varchar(17) NOT NULL,
  `bankMonths` int(2) NOT NULL,
  `bankYears` int(2) NOT NULL,
  `outstandingAmt` int(11) NOT NULL,
  `activeChecking` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankingInformation`
--

LOCK TABLES `bankingInformation` WRITE;
/*!40000 ALTER TABLE `bankingInformation` DISABLE KEYS */;
/*!40000 ALTER TABLE `bankingInformation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` date NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(64) NOT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `leadProviderId` int(11) NOT NULL,
  `purchasePrice` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `currency` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns`
--

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` VALUES (0,'0000-00-00','0000-00-00 00:00:00','MID-Month',NULL,0,0,18,'2012-06-15','USD'),(23,'0000-00-00','0000-00-00 00:00:00','Start Of Month 3',NULL,1,0,12,'2012-06-15','USD'),(24,'0000-00-00','0000-00-00 00:00:00','Start Of Month',NULL,0,0,12,'2012-06-15','USD'),(25,'0000-00-00','0000-00-00 00:00:00','End of business',NULL,1,0,56,'2012-06-15','USD'),(26,'0000-00-00','0000-00-00 00:00:00','Mike Test',NULL,0,0,5,'2012-07-31','USD');
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
  `dateCreated` date NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leadProvider`
--

LOCK TABLES `leadProvider` WRITE;
/*!40000 ALTER TABLE `leadProvider` DISABLE KEYS */;
INSERT INTO `leadProvider` VALUES (2,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Montgomery','8082840599','Kevin Heart','KHeart@MontgomeryCredit.co','Sara Zimmerman','SZimmerman@MontgomeryCredit.co','2012-06-22','ZHM234ka1005v55cVVWRincx3359VL','JOJJomp78903i892cbg4Oo0mmX789P','MontgomeryCredit.co'),(4,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Digimarc','5033310983','Thuy Nguyen','Nguyen','Tran Nguyen','Johnathan Beck','2012-07-25','jjOku930uroLJKsdur093ioprjekpkfe923i','JJFIOJIEjioej9089I90FKDKKLDSKkldks','Digimarc.com');
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

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` date NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(1024) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `cookie` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `session` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `emailAddress` varchar(64) NOT NULL,
  `cellPhoneNumber` varchar(16) NOT NULL,
  `leadProviderIdDefault` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff','','','','Micheal','Zimmerman','mzim@emzim.co','2147483647',4);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `passFail`
--

DROP TABLE IF EXISTS `passFail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passFail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` date NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `personalInformationId` int(11) NOT NULL,
  `leadProviderId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `resultXml` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passFail`
--

LOCK TABLES `passFail` WRITE;
/*!40000 ALTER TABLE `passFail` DISABLE KEYS */;
/*!40000 ALTER TABLE `passFail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `passGood`
--

DROP TABLE IF EXISTS `passGood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passGood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` date NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `personalInformationId` int(11) NOT NULL,
  `leadProviderId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `resultXml` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passGood`
--

LOCK TABLES `passGood` WRITE;
/*!40000 ALTER TABLE `passGood` DISABLE KEYS */;
/*!40000 ALTER TABLE `passGood` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
  `dateCreated` date NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `rulesId` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `memberId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rulesManagementSet`
--

LOCK TABLES `rulesManagementSet` WRITE;
/*!40000 ALTER TABLE `rulesManagementSet` DISABLE KEYS */;
INSERT INTO `rulesManagementSet` VALUES (284,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',1,1,1),(285,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',2,1,1),(286,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',3,1,1),(287,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',4,1,1),(288,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',5,1,1),(291,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',8,1,1),(292,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',9,1,1),(293,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',12,1,1),(295,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',13,1,1),(297,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',14,1,1),(299,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',16,1,1),(300,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',17,1,1),(336,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Sample Rule Set D',13,1,1),(337,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',1,1,0),(338,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',2,1,0),(339,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',3,1,0),(340,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',4,1,0),(341,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',5,1,0),(342,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',6,0,0),(343,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',7,0,0),(344,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',8,1,0),(345,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',9,1,0),(346,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',10,0,0),(347,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',11,0,0),(348,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',12,1,0),(349,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',14,1,0),(350,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',15,1,0),(351,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',16,0,0),(352,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',17,1,0),(353,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',19,1,0),(354,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Testing Default',18,0,0);
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

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
  `dateCreated` date NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `ruleDescription` varchar(1024) NOT NULL,
  `phpLocation` varchar(128) NOT NULL DEFAULT '/include/BBCore/cbbxruleset.php',
  `value` varchar(512) NOT NULL,
  `fieldName` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rules`
--

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT INTO `rules` VALUES (1,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Reject loan if email includes .mil ','Reject loan if email includes .mil ','validate_text_contains','.mil','email'),(2,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Reject loan if email includes .gov ','Reject loan if email includes .gov ','validate_text_contains','.gov','email'),(3,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'ABA is invalid ','ABA is invalid ','validate_numeric_equalEqualTo_CharCount','9','ROUTINGNUMBER'),(4,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Customer or spouse is in military ','Customer or spouse is in military ','validate_isTrue','Errors','ISMILITARY'),(5,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Deny if bankruptcy','Deny if bankruptcy','validate_isTrue','Errors','BANKRUPTCY'),(6,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Deny Loan if customer has a \"Hold\" flag','Deny Loan if customer has a \"Hold\" flag','validate_text_contains','Hold','Flag'),(7,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Deny new loan if customer has a \"Deny\" flag','Deny new loan if customer has a \"Deny\" flag ','validate_text_contains','Deny','Flag'),(8,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Employment date must be greater than or equal to 60 days ','Employment date must be greater than or equal to 60 days','validate_date_xdaysGreater','60','EMPMONTHS'),(9,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Payment Type cannot be paper check','Payment Type cannot be paper check','validate_text_contains','P','PAYTYPE'),(10,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Loan due date cannot be on a holiday ','Loan due date cannot be on a holiday ','validate_date_isHoliday','Errors','LOANDUEDATE'),(11,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Loan due date cannot be on a weekend ','Loan due date cannot be on a weekend','validate_date_isWeekEnd','Errors','LOANDUEDATE'),(12,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Minimum monthly Income of $1000','Minimum monthly Income of $1000','validate_numeric_lesser','1000','NETMONTHLY'),(13,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Minimum residence duration of 1 month(s)','Minimum residence duration of 1 month(s)','validate_numeric_greaterThanEqualTo','1','LENGTHATRESIDENCE'),(14,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Valid home phone number','Valid home phone number','validate_numeric_equalEqualTo_CharCount','10','HOMEPHONE'),(15,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Verify that Drivers License number does not exist for another applicant','Verify that Drivers License number does not exist for another applicant','validate_Data_Exist','Errors','driverslicense'),(16,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Checking account must be open for 1 months or greater ','Checking account must be open for 1 months or greater ','validate_numeric_greaterThanEqualTo','1','LENGTHBANKING'),(17,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Payment Type cannot be cash','Payment Type cannot be cash','validate_text_contains','C','PAYTYPE'),(18,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'Account # is invalid ','Account # is invalid ','validate_numeric_equalEqualTo_CharCount','17','ACCOUNTNUMBER');
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

-- Dump completed on 2012-10-30 15:20:18
CREATE DATABASE  IF NOT EXISTS `BlackBoxDev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `BlackBoxDev`;
-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BlackBoxDev
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
  `dateCreated` date NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactionLeads`
--

LOCK TABLES `transactionLeads` WRITE;
/*!40000 ALTER TABLE `transactionLeads` DISABLE KEYS */;
INSERT INTO `transactionLeads` VALUES (1,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','','<error><code>1</code><msg>OK</msg></error>',1),(2,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','','<error><code>1</code><msg>OK</msg></error>',1),(3,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','','<error><code>1</code><msg>OK</msg></error>',1),(4,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(5,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(6,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(7,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(8,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(9,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(10,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(11,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(12,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(13,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1),(14,'0000-00-00','0000-00-00 00:00:00',NULL,NULL,'test','test','I5uHFVhfKGWpdXOr','http://www.fsc-bb.com','98.160.229.122','I5uHFVhfKGWpdXOr','','',0,'10000','111224444','01-04-1976','','Jonathan','Doever','1343 NE Webster','Portland','OR','5032840599','5032840591','OR','5189376','','11','3','1','1','1','1','Jonathan@ColumbiaOutdoorWear.com','E','D','11','6','ColumbiaOutdoorWear','','','','','','5035551212','','','','','','11-11-2005','F','','','W','2434','3000','07-29-2012','07-13-2012','07-27-2012','','First Iterstate','','C','107003052','092900480',5,23,0,'Y','Jane','Doever','5032840591','S','TREE','<error><code>1</code><msg>OK</msg></error>',1);
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

-- Dump completed on 2012-10-30 15:20:18
