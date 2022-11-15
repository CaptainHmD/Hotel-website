-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: hotel_management_system
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS hotel_management_system;


--
-- Table structure for table `Apartment`
--

DROP TABLE IF EXISTS `Apartment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Apartment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `length` int NOT NULL,
  `width` int NOT NULL,
  `rooms` int NOT NULL,
  `bathrooms` int NOT NULL,
  `price` int NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Apartment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Apartment`
--

LOCK TABLES `Apartment` WRITE;
/*!40000 ALTER TABLE `Apartment` DISABLE KEYS */;
INSERT INTO `Apartment` VALUES (1,'fwaf','waff','fwafa',10,10,1,0,1,'cIliJeHCqm.png,9HaLVmXJU6.png','fwafawfwaff',2),(2,'fawfawfawf','wafawfaw','fwafwafa',10,10,1,1,1,'IhWlLZu1Jc.png,jQWIPUc6lu.png,Pm6DsTBxla.png,Ay1LUiNu7R.png,iTRWasOMfJ.png','fawfawfawfawf',2),(3,'Saudi Arabia','Jedah','Alsetten, Annuzha, Alqadi',200,150,5,3,1600,'rIaG9zfqeB.jpeg,Q5kMDGR3uq.jpg,pnatP49x5u.jpg,08Kaf3pFzV.jpg,9Fwx2LVQI1.jpg,hpUPt5Y4Hb.jpg,CAIQHyv8b1.jpg,ItsjoaqFfc.jpg,ZC6fjKktXT.jpeg','Altihut is opening a new chapter in development of the adventure tourism in Georgia. It is aimed to make tracking, hiking and mountaineering accessible and attractive in Caucasus Region to bigger audience then it is',2),(4,'fwagawgwag','wadfwad','wdadwafwa',10,10,1,1,1,'NVloDFdbI2.jpeg,2ehY6LvlxQ.jpeg,N1lti6AZcO.jpeg,lvCAsjqXR1.jpg,KEgeFsRqMj.jpg,1oZilFC2NA.jpg,67MYLZahPk.jpg','grgaergaergeargearg',2);
/*!40000 ALTER TABLE `Apartment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Ammar','$2y$09$0hWypeaHxfXSFNfv4m1thOnZEvcBd1MF293CLamtW28gmS3xWBbA2','gbeast123488@gmail.com'),(2,'a','$2y$09$H4mLb.Vyy7QTS5dlHg3Mk.4iZlkxvNRLGnXvyD09R4.R.NyMKyp42','albrns123488@hotmail.com'),(3,'b','$2y$09$DygPZz8q1e6q05cX2BN6xei3DeHuJpb.qtVp.Wvj9tmQbiObJ3UPi','dwadawd@gregregr');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-15 14:25:59
