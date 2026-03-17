-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: vulnsite
-- ------------------------------------------------------
-- Server version	8.0.45-0ubuntu0.24.04.1

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

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `security_level` varchar(50) DEFAULT NULL,
  `threat_score` int DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `labs_assigned` int DEFAULT '0',
  `tasks_completed` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin123','admin@mail.com','9123456780','Advanced',85,NULL,10,8),(2,'raj','raj123','raj@mail.com','9175714691','Advanced',95,NULL,15,12),(3,'user1','pass1','user1@mail.com','9876543210','Beginner',20,NULL,3,1),(4,'user2','pass2','user2@mail.com','9876543211','Beginner',0,NULL,1,0),(5,'user3','pass3','user3@mail.com','9876543212','Intermediate',45,NULL,6,4),(6,'user4','pass4','user4@mail.com','9876543213','Intermediate',40,NULL,6,3),(8,'user6','pass6','user6@mail.com','9876543215','Intermediate',75,NULL,10,6),(9,'user7','pass7','user7@mail.com','9123456780','Advanced',85,NULL,10,8),(10,'user8','pass8','user8@mail.com','9123456780','Advanced',85,NULL,10,8),(12,'user9','pass9','user9@mail.com',NULL,NULL,0,NULL,0,0),(13,'sunny','sunny123','sunny@gmail.com',NULL,NULL,0,NULL,0,0),(14,'sri','sri123','sri@gmail.com','78945612',NULL,0,NULL,0,0),(15,'asd','asd123','asd@mail.com','789456123',NULL,0,NULL,0,0),(16,'ref','ref123','ref@mail.com','1234567890',NULL,0,NULL,0,0),(17,'venkat','venkat','venkat@gmail.com','1234567890',NULL,0,NULL,0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-09 11:58:00
