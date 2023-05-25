CREATE DATABASE  IF NOT EXISTS `wokolndo_headturner_db` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `wokolndo_headturner_db`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: wokolndo_headturner_db
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `in_order` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `done_payment`
--

DROP TABLE IF EXISTS `done_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `done_payment` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_pay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `done_payment`
--

LOCK TABLES `done_payment` WRITE;
/*!40000 ALTER TABLE `done_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `done_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `qnty` int NOT NULL DEFAULT '1',
  `size` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_order`
--

DROP TABLE IF EXISTS `place_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `place_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_id` bigint NOT NULL,
  `qnty` int NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total_bill` int NOT NULL,
  `pay_method` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipped` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_order`
--

LOCK TABLES `place_order` WRITE;
/*!40000 ALTER TABLE `place_order` DISABLE KEYS */;
INSERT INTO `place_order` VALUES (35,13,'shark-001',31068328061,2,'xs',94038,'maya','2023-05-25 15:52:42',0),(36,13,'shark-001',79098081952,3,'md',141038,'maya','2023-05-25 15:53:46',0),(37,13,'shark-001',86780541894,4,'xs',220708,'maya','2023-05-25 15:55:05',0),(38,13,'shark-002',86780541894,1,'xs',220708,'maya','2023-05-25 15:55:05',0),(39,13,'shark-003',86780541894,2,'sm',220708,'maya','2023-05-25 15:55:05',0),(40,13,'shoei-002',20913074861,1,'lg',86327,'maya','2023-05-25 17:15:36',0),(41,13,'shoei-003',20913074861,2,'xlg',86327,'maya','2023-05-25 17:15:36',0),(42,13,'shark-014',10125218076,1,'xlg',70042,'maya','2023-05-25 17:19:31',0),(43,13,'shoei-005',10125218076,1,'xs',70042,'maya','2023-05-25 17:19:31',0);
/*!40000 ALTER TABLE `place_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `xs_avail` int NOT NULL,
  `sm_avail` int NOT NULL,
  `md_avail` int NOT NULL,
  `lg_avail` int NOT NULL,
  `xlg_avail` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'shark-001','https://i.ibb.co/Zf240Jj/shark-racerpro-gp-martinator.png','shark','Shark RacerPro GP Martinator',47000,16,11,10,14,10),(3,'shark-002','https://i.ibb.co/kc4GMs2/shark-skwal2-iker-lecuona-nero-removebg-preview.png','shark','Shark SKWAL2 Iker Lecuona Nero',12670,3,0,0,1,0),(5,'shark-003','https://i.ibb.co/0JX2w0V/shark-d-skwal-2-shigan-full-face-helmet.png','shark','Shark D SKWAL2 Shigan Full Face Helmet',10000,5,3,0,2,1),(6,'shark-004','https://i.ibb.co/ZTvfv4Y/shark-evo-es-k-rozen-full-face-helmet.png','shark','Shark EVO es k Rozen Full Face Helmet',16850,3,0,11,0,0),(7,'shark-005','https://i.ibb.co/wKkbqxT/shark-spartan-gt-carbon-full-face-helmet.png','shark','Shark Spartan GT Carbon Full Face Helmet',23380,0,0,0,0,0),(8,'shark-006','https://i.ibb.co/TYyBBT5/shark-spartan-gt-pro-ritmo-rosso-removebg-preview.png','shark','Shark Spartan GT Pro Carbon Ritmo Helmet',22390,2,5,4,0,0),(9,'shark-007','https://i.ibb.co/0KccRZY/shark-spartan-gt-carbon-skin-full-face-helmet.png','shark','Shark Spartan GT Carbon Skin Full Face Helmet',10000,7,1,5,0,0),(10,'shark-008','https://i.ibb.co/dG9HdjM/shark-spartan-rs-byhron-full-face-helmet.png','shark','Shark Spartan RS Byhron Full Face Helmet',16350,6,5,0,0,7),(11,'shark-009','https://i.ibb.co/XVMY8qS/shark-spartan-rs-replica-zarco-austin-full-face-helmet.png','shark','Shark Spartan RS Replica Zarco Austin Full Face Helmet',47004,7,3,0,5,0),(12,'shark-010','https://i.ibb.co/wKkbqxT/shark-spartan-gt-carbon-full-face-helmet.png','shark','Shark Spartan GT Carbon Full Face Helmet',23380,5,0,2,0,0),(13,'shark-011','https://i.ibb.co/TYyBBT5/shark-spartan-gt-pro-ritmo-rosso-removebg-preview.png','shark','Shark Spartan GT Pro Carbon Ritmo Helmet',22390,2,1,0,0,0),(14,'shark-012','https://i.ibb.co/0KccRZY/shark-spartan-gt-carbon-skin-full-face-helmet.png','shark','Shark Spartan GT Carbon Skin Full Face Helmet',10000,0,5,0,7,3),(15,'shark-013','https://i.ibb.co/dG9HdjM/shark-spartan-rs-byhron-full-face-helmet.png','shark','Shark Spartan RS Byhron Full Face Helmet',16350,6,4,0,0,3),(16,'shark-014','https://i.ibb.co/XVMY8qS/shark-spartan-rs-replica-zarco-austin-full-face-helmet.png','shark','Shark Spartan RS Replica Zarco Austin Full Face Helmet',47004,7,1,0,0,0),(17,'shoei-001','https://i.ibb.co/SNPJHS8/product1-exzero.png','shoei','SHOEI Ex zero',26741,0,0,0,0,0),(18,'shoei-002','https://i.ibb.co/KbQcdfR/product2-cheeta.png','shoei','SHOEI GLAMSTER CHEETAH',32807,2,0,2,2,9),(19,'shoei-003','https://i.ibb.co/12CPbjG/product3-offwhite.png','shoei','SHOEI GLAMSTER OFFWHITE 1',26741,2,3,8,12,0),(20,'shoei-004','https://i.ibb.co/ZxBzY3c/product4-ressur.png','shoei','SHOEI GLAMSTER RESURRE',23000,2,7,7,4,3),(21,'shoei-005','https://i.ibb.co/xXZwK5v/Glamster-Ressurection-TC.png','shoei','SHOEI Glamster-Ressurection',23000,0,2,3,4,5),(22,'shoei-006','https://i.ibb.co/ZdZYj8w/product6-neotec.png','shoei','SHOEI NEOTEC 2 1',39000,2,2,2,2,2),(23,'shoei-007','https://i.ibb.co/sy7Q1wG/product7-fifteen.png','shoei','SHOEI X FIFTEEN 1',48973,3,3,3,3,3),(24,'shoei-008','https://i.ibb.co/t3cBM64/product8-fourteen.png','shoei','SHOEI X FOURTEEN MM93',47972,4,4,4,4,4),(25,'shoei-009','https://i.ibb.co/6P51mgJ/product9-aerody.png','shoei','SHOEI X-SPIRIT III AER',10000,5,4,3,2,1),(26,'shoei-010','https://i.ibb.co/wwzHc29/product10-Z-8-ACCOLADE-NXR2-ACCOLADE.png','shoei','SHOEI X14 ACCOLADE NXR',10000,1,2,3,4,5),(27,'shoei-011','https://i.ibb.co/0JTByQz/product11-Z-8-ORIGAMI-NXR2-ORIGAMI.png','shoei','SHOEI z8 ORIGAMI NXR2',10000,2,3,4,5,6),(28,'shoei-012','https://i.ibb.co/dcfMmcK/product12-Z-8-FAUST-NXR2-FAUST.png','shoei','SHOEI z8 FAUST NXR2 FA',10000,6,5,4,2,1),(29,'shoei-013','https://i.ibb.co/5Rpsszm/product13-Z-8-MM93-RETRO-NXR2-MM93-RETRO.png','shoei','SHOEI z8 MM93 RETRO NXR2 MM93 RETRO',41500,3,3,2,2,2);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pin` int NOT NULL,
  `verification` int NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'bentf24@gmail.com','Benedict ','Barcebal ','9324823424','3232 Guadalupe Nuevo Makit City','profile_upload/profile-34210868.jpeg','$2y$10$7f/UCu6rFuv/toYe.aCGJui8qgHPhEnqiXmNEfTfw2wNmFl7eZCLe',855027,1,'2023-05-09 03:25:20');
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

-- Dump completed on 2023-05-25 17:27:31
