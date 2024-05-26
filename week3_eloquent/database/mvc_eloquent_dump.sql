-- MySQL dump 10.13  Distrib 5.6.51, for Win64 (x86_64)
--
-- Host: localhost    Database: mvc
-- ------------------------------------------------------
-- Server version	5.6.51

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
  `text` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `author_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'первое сообщение','2024-05-14 09:26:04',2,NULL),(2,'еще сообщение','2024-05-14 17:12:47',2,NULL),(3,'Мое сообщение','2024-05-14 18:17:58',4,''),(4,'ку-ку','2024-05-14 18:20:01',4,''),(5,'Кто здесь?','2024-05-14 18:20:21',4,''),(6,'ататата','2024-05-14 18:22:22',4,''),(7,'1\r\n2\r\n3\r\n4','2024-05-14 18:23:29',4,''),(8,'Привет, ','2024-05-14 18:30:09',5,'dfe0e93479c868455253f40c53c47b95f6774c15'),(9,'Я тут','2024-05-14 21:21:37',5,''),(10,'тратата','2024-05-14 21:40:10',5,''),(12,'рварврврврввр909090','2024-05-14 21:41:40',5,''),(13,'аыа22121еррппрпрпрпр','2024-05-14 21:41:50',5,''),(15,'рроод-\\\\вывывывыв','2024-05-14 21:42:08',5,''),(17,'к1 12ама 12112','2024-05-14 21:42:43',5,''),(18,'прпрд и п е н нгнгнгнгнгнг','2024-05-14 21:42:53',5,''),(19,'длл 8989ппп вв в45 7878 5 1 5566','2024-05-14 21:43:06',5,''),(21,'лдлдлдлдлд 111ЁЁЁЁЁЁЁ','2024-05-14 21:43:41',5,''),(23,'прпр 12 7 итититит 22 ё1ё1ё1ё1','2024-05-14 21:44:52',5,''),(24,'hjhj йцйц ццккрпр нгнг qwerty','2024-05-14 21:56:28',5,''),(25,'001001011100101001','2024-05-14 21:56:43',5,''),(26,'бьькпкпкп 5677и ааа аа аа ааааа ааааа!!','2024-05-14 21:56:57',5,''),(27,'12345678900 00 00 00 00 00 0 0000000','2024-05-14 21:57:12',5,''),(28,'67 ит 56 12 прен олол','2024-05-14 21:57:24',5,''),(29,'00900900 ппппппп шшшшшшшшшшш','2024-05-14 21:57:35',5,''),(30,'-=-=-=-=----==-','2024-05-14 21:58:11',5,''),(31,'чик-чирик','2024-05-14 22:00:51',5,'5e8f82b59d3afe6bf1667208e768f397bfe27a54'),(32,'нннннннн ппппп йййййй','2024-05-14 22:01:03',5,''),(33,'Хеллоу','2024-05-14 23:16:26',6,''),(34,'укукукук','2024-05-14 23:26:17',7,''),(36,'qqq message','2024-05-25 22:53:14',1,NULL),(37,'ooo ooo ooo','2024-05-25 22:54:39',1,NULL),(39,'eee','2024-05-26 00:00:32',9,''),(40,'kkk','2024-05-26 00:10:12',1,NULL),(41,'uuu','2024-05-26 00:12:35',1,NULL),(42,'kkk111','2024-05-26 00:14:40',1,NULL),(43,'lll','2024-05-26 00:15:32',1,NULL),(44,'lololo','2024-05-26 00:18:56',2,NULL),(45,'uiuiui','2024-05-26 00:20:36',2,NULL),(46,'ddd','2024-05-26 00:26:12',11,NULL),(47,'lhggg','2024-05-26 00:27:29',12,NULL),(48,'kldddd','2024-05-26 00:27:51',12,NULL),(49,'oppppp','2024-05-26 20:55:44',12,NULL),(50,'nmmmm','2024-05-26 21:06:07',12,NULL),(51,'opoqqqq','2024-05-26 21:33:06',12,NULL),(52,'90jjjjj','2024-05-26 21:35:14',12,NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_pk_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'иван','2024-05-26 20:29:07','iii@mail.ru','7b10806a18b00e6b96ab4597509e1e1d3d66b11f'),(5,'Бикфордов Шнырь','2024-05-14 18:29:20','abc@mail.ru','dd63ad7cde35460d17ee793c9aa25a441c768958'),(7,'Антон','2024-05-14 23:25:50','aac@mail.ru','7b10806a18b00e6b96ab4597509e1e1d3d66b11f'),(11,'eee111','2024-05-26 21:42:10','eee@mail.ru','7b10806a18b00e6b96ab4597509e1e1d3d66b11f'),(12,'rrr','2024-05-26 00:27:20','rrr@mail.ru','7b10806a18b00e6b96ab4597509e1e1d3d66b11f'),(15,'ttt','2024-05-26 20:52:02','ttt@mail.ru','7b10806a18b00e6b96ab4597509e1e1d3d66b11f'),(17,'oio','2024-05-26 21:37:36','oio@mail.ru','7b10806a18b00e6b96ab4597509e1e1d3d66b11f'),(18,'oop','2024-05-26 21:42:35','oop@mail.ru','7b10806a18b00e6b96ab4597509e1e1d3d66b11f');
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

-- Dump completed on 2024-05-26 23:46:42
