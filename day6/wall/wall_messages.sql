CREATE DATABASE  IF NOT EXISTS `wall` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wall`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: wall
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `message` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users_idx` (`users_id`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,'This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message! This is a test message!','2016-04-11 11:06:01','2016-04-11 11:06:01'),(2,2,'Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test! Test!','2016-04-11 14:17:32','2016-04-11 14:17:32'),(3,1,'Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine? Is this working fine?','2016-04-11 16:17:39','2016-04-11 16:17:39');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-11 16:30:30
