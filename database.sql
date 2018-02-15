-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: binaryoptions
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.17.10.1

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
-- Table structure for table `archivedBets`
--

DROP TABLE IF EXISTS `archivedBets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivedBets` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `amount` decimal(12,8) NOT NULL,
  `profit` decimal(12,8) NOT NULL,
  `pair` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `marketid` int(255) NOT NULL,
  `direction` int(255) NOT NULL,
  `date` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `archivedDemoBets`
--

DROP TABLE IF EXISTS `archivedDemoBets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivedDemoBets` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `amount` decimal(12,8) NOT NULL,
  `profit` decimal(12,8) NOT NULL,
  `startrate` decimal(12,8) NOT NULL,
  `closerate` decimal(12,8) NOT NULL,
  `pair` varchar (255) NOT NULL,
  `userid` int(255) NOT NULL,
  `marketid` int(255) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `startingdate` int(255) NOT NULL,
  `finishtime` int(255) NOT NULL,
  `betstatus` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `archivedMarkets`
--

DROP TABLE IF EXISTS `archivedMarkets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivedMarkets` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pair` varchar(255) NOT NULL,
  `starttime` int(255) NOT NULL,
  `startprice` decimal(12,8) NOT NULL,
  `finishprice` decimal(12,8) NOT NULL,
  `duration` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bets`
--

DROP TABLE IF EXISTS `bets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `amount` decimal(12,8) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `date` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `demoBets`
--

DROP TABLE IF EXISTS `demoBets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demoBets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `amount` decimal(12,8) NOT NULL,
  `startingrate` decimal(12, 8) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `date` int(255) NOT NULL,
  `expiry` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `markets`
--

DROP TABLE IF EXISTS `markets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pair` varchar(255) NOT NULL,
  `starttime` int(255) NOT NULL,
  `startprice` decimal(12,8) NOT NULL,
  `duration` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bitcoinBalance` decimal(12,8) NOT NULL,
  `ethereumBalance` decimal(12,8) NOT NULL,
  `demoBalance` decimal(12,8) NOT NULL,
  `depositAddress` varchar(255) NOT NULL,
  `2fasecret` varchar(255) NOT NULL,
  `2faactivated` int(255) DEFAULT NULL,
  `referrer` int(255) NOT NULL,
  `signupdate` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdrawals` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userid` int(255) NOT NULL,
  `amount` decimal(12,8) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `time` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-04 19:11:05
