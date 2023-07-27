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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin@123','admin123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`id`),
  KEY `fk_user_to_cart_idx` (`user_id`),
  KEY `fk_products_to_cart_idx` (`product_id`),
  CONSTRAINT `fk_products_to_cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `fk_user_to_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `date_pay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_pr_to_dp_idx` (`product_id`),
  CONSTRAINT `fk_pr_to_dp` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `proof_image` varchar(245) COLLATE utf8mb4_general_ci NOT NULL,
  `pay_method` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipped` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_order`
--

LOCK TABLES `place_order` WRITE;
/*!40000 ALTER TABLE `place_order` DISABLE KEYS */;
INSERT INTO `place_order` VALUES (64,13,'shark-001',84131108245,1,'xs',121038,'proof_upload/proof-51321002.png','gcash','2023-07-22 17:21:35',1),(65,13,'arai-011',84131108245,2,'xs',121038,'proof_upload/proof-51321002.png','gcash','2023-07-22 17:21:35',1),(66,27,'arai-011',87580110541,3,'xlg',111038,'proof_upload/proof-23906894.png','gcash','2023-07-22 17:48:16',1),(67,27,'shark-008',34952742077,1,'xs',16388,'proof_upload/proof-61199756.png','maya','2023-07-22 18:02:27',0),(68,13,'arai-011',12183091236,1,'xs',37038,'proof_upload/proof-86561685.png','gcash','2023-07-26 11:02:29',0);
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id_UNIQUE` (`product_id`),
  KEY `ix_product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'shark-001','https://i.ibb.co/Zf240Jj/shark-racerpro-gp-martinator.png','shark','Shark RacerPro GP Martinator',47000,11,11,8,12,10),(3,'shark-002','https://i.ibb.co/kc4GMs2/shark-skwal2-iker-lecuona-nero-removebg-preview.png','shark','Shark SKWAL2 Iker Lecuona Nero',12670,3,0,0,1,0),(5,'shark-003','https://i.ibb.co/0JX2w0V/shark-d-skwal-2-shigan-full-face-helmet.png','shark','Shark D SKWAL2 Shigan Full Face Helmet',10000,3,3,0,2,1),(6,'shark-004','https://i.ibb.co/ZTvfv4Y/shark-evo-es-k-rozen-full-face-helmet.png','shark','Shark EVO es k Rozen Full Face Helmet',16850,3,0,11,0,0),(7,'shark-005','https://i.ibb.co/wKkbqxT/shark-spartan-gt-carbon-full-face-helmet.png','shark','Shark Spartan GT Carbon Full Face Helmet',23380,0,0,0,0,0),(8,'shark-006','https://i.ibb.co/TYyBBT5/shark-spartan-gt-pro-ritmo-rosso-removebg-preview.png','shark','Shark Spartan GT Pro Carbon Ritmo Helmet',22390,2,5,4,0,0),(9,'shark-007','https://i.ibb.co/0KccRZY/shark-spartan-gt-carbon-skin-full-face-helmet.png','shark','Shark Spartan GT Carbon Skin Full Face Helmet',10000,7,1,5,0,0),(10,'shark-008','https://i.ibb.co/dG9HdjM/shark-spartan-rs-byhron-full-face-helmet.png','shark','Shark Spartan RS Byhron Full Face Helmet',16350,5,5,0,0,7),(11,'shark-009','https://i.ibb.co/XVMY8qS/shark-spartan-rs-replica-zarco-austin-full-face-helmet.png','shark','Shark Spartan RS Replica Zarco Austin Full Face Helmet',47004,7,3,0,5,0),(12,'shark-010','https://i.ibb.co/wKkbqxT/shark-spartan-gt-carbon-full-face-helmet.png','shark','Shark Spartan GT Carbon Full Face Helmet',23380,5,0,2,0,0),(13,'shark-011','https://i.ibb.co/TYyBBT5/shark-spartan-gt-pro-ritmo-rosso-removebg-preview.png','shark','Shark Spartan GT Pro Carbon Ritmo Helmet',22390,2,1,0,0,0),(14,'shark-012','https://i.ibb.co/0KccRZY/shark-spartan-gt-carbon-skin-full-face-helmet.png','shark','Shark Spartan GT Carbon Skin Full Face Helmet',10000,0,5,0,7,3),(15,'shark-013','https://i.ibb.co/dG9HdjM/shark-spartan-rs-byhron-full-face-helmet.png','shark','Shark Spartan RS Byhron Full Face Helmet',16350,6,4,0,0,3),(16,'shark-014','https://i.ibb.co/XVMY8qS/shark-spartan-rs-replica-zarco-austin-full-face-helmet.png','shark','Shark Spartan RS Replica Zarco Austin Full Face Helmet',47004,7,1,0,0,0),(17,'shoei-001','https://i.ibb.co/SNPJHS8/product1-exzero.png','shoei','SHOEI Ex zero',26741,0,0,0,0,0),(18,'shoei-002','https://i.ibb.co/KbQcdfR/product2-cheeta.png','shoei','SHOEI GLAMSTER CHEETAH',32807,2,0,2,2,9),(19,'shoei-003','https://i.ibb.co/12CPbjG/product3-offwhite.png','shoei','SHOEI GLAMSTER OFFWHITE 1',26741,2,3,8,11,0),(20,'shoei-004','https://i.ibb.co/ZxBzY3c/product4-ressur.png','shoei','SHOEI GLAMSTER RESURRE',23000,2,7,7,4,3),(21,'shoei-005','https://i.ibb.co/xXZwK5v/Glamster-Ressurection-TC.png','shoei','SHOEI Glamster-Ressurection',23000,0,2,3,4,5),(22,'shoei-006','https://i.ibb.co/ZdZYj8w/product6-neotec.png','shoei','SHOEI NEOTEC 2 1',39000,2,2,2,2,2),(23,'shoei-007','https://i.ibb.co/sy7Q1wG/product7-fifteen.png','shoei','SHOEI X FIFTEEN 1',48973,3,3,3,3,3),(24,'shoei-008','https://i.ibb.co/t3cBM64/product8-fourteen.png','shoei','SHOEI X FOURTEEN MM93',47972,4,4,4,4,4),(25,'shoei-009','https://i.ibb.co/6P51mgJ/product9-aerody.png','shoei','SHOEI X-SPIRIT III AER',10000,5,4,3,2,1),(26,'shoei-010','https://i.ibb.co/wwzHc29/product10-Z-8-ACCOLADE-NXR2-ACCOLADE.png','shoei','SHOEI X14 ACCOLADE NXR',10000,1,2,2,4,5),(27,'shoei-011','https://i.ibb.co/0JTByQz/product11-Z-8-ORIGAMI-NXR2-ORIGAMI.png','shoei','SHOEI z8 ORIGAMI NXR2',10000,2,3,4,5,6),(28,'shoei-012','https://i.ibb.co/dcfMmcK/product12-Z-8-FAUST-NXR2-FAUST.png','shoei','SHOEI z8 FAUST NXR2 FA',10000,6,5,4,2,1),(29,'shoei-013','https://i.ibb.co/5Rpsszm/product13-Z-8-MM93-RETRO-NXR2-MM93-RETRO.png','shoei','SHOEI z8 MM93 RETRO NXR2 MM93 RETRO',41500,3,3,2,2,2),(30,'avg-001','https://i.ibb.co/cgzcdXy/AGV-K-1-S-Salom-Helmet-multicolored.png','avg','agv K-1 S Salom Helmet multicolored',12737,0,2,3,4,5),(31,'avg-002','https://i.ibb.co/HzRXy20/agv-pistagprr-helmet-2206-italia.png','avg','agv pistagprr helmet 2206 italia',61418,1,2,3,4,2),(32,'avg-003','https://i.ibb.co/9VQpWTk/agv-compact-st-solid-plk-modular-helmet.png','avg','agv compact st solid plk modular helmet',49000,2,4,1,2,4),(33,'avg-004','https://i.ibb.co/r62Lbr4/agv-k3-sv-top-mplk-full-face-helmet.png','avg','agv k3 sv top mplk full face helmet',16950,0,0,3,4,1),(34,'avg-005','https://i.ibb.co/2tVmF7Z/agv-k5-s-multi-mplk-full-face-helmet.png','avg','agv k5 s multi mplk full face helmet',17911,2,4,0,1,0),(35,'avg-006','https://i.ibb.co/8B8spny/agv-k5-s-multi-mplk-full-face-helmet-1.png','avg','agv k5 s multi mplk full face helmet',17911,0,1,1,1,1),(36,'avg-007','https://i.ibb.co/rfHxD7N/agv-k6-s-e2206-mplk-full-face-helmet.png','avg','agv k6 s e2206 mplk full face helmet',15992,2,3,4,1,1),(37,'avg-008','https://i.ibb.co/jVh2w0k/agv-pista-gp-rr-e2206-dot-mplk-full-face-helmet.png','avg','agv pista gp rr e2206 dot mplk full face helmet',49000,1,1,3,0,0),(38,'avg-009','https://i.ibb.co/cb0Lhb0/agv-tourmodular-solid-mplk-modular-helmet.png','avg','agv tourmodular solid mplk modular helmet',35633,1,2,0,5,2),(39,'arai-001','https://i.ibb.co/YcBrym7/product1-astro.png','arai','ARAI ASTRO GX',36000,0,2,3,4,0),(40,'arai-002','https://i.ibb.co/3cfpzSG/product2-classic.png','arai','ARAI CLASSIC AIR',27000,4,4,5,2,0),(41,'arai-003','https://i.ibb.co/BTwgr47/product3-naps.png','arai','ARAI NAPS',26000,1,2,0,3,0),(42,'arai-004','https://i.ibb.co/3cnvhG2/product4-neo-black.png','arai','ARAI RAPIDE NEO BLACK',23000,0,0,0,0,0),(43,'arai-005','https://i.ibb.co/Dk9C8hv/product5-neo-orange.png','arai','ARAI RAPIDE NEO ORANGE',23000,4,4,3,2,3),(44,'arai-006','https://i.ibb.co/SP1mYkQ/product6-rx7x.png','arai','Arai Helmet Rx-7v Evo',53000,6,6,0,0,0),(45,'arai-007','https://i.ibb.co/7CqhCT5/product7-firm-racing.png','arai','ARAI RX7X FIRM RACING',53000,2,0,7,3,1),(46,'arai-008','https://i.ibb.co/89hWC96/product8-repsol.png','arai','ARAI RX7X REPSOL GRAPHICS',70732,0,0,4,67,5),(47,'arai-009','https://i.ibb.co/HH1MVH8/product9-src.png','arai','ARAI RX7X SRC',5500,32,3,2,21,11),(48,'arai-010','https://i.ibb.co/D7HqM3Z/product10-tatsuki.png','arai','ARAI RX7X TATSUKI SUZUKI',38500,12,4,5,6,56),(49,'arai-011','https://i.ibb.co/k13L355/product11-tour.png','arai','ARAI RX7X TOUR',37000,20,40,12,22,20),(50,'arai-012','https://i.ibb.co/9rKH51r/product12-IOM.png','arai','ARAI RX7X IOM TT 2022',39500,0,0,0,0,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `order_id` varchar(245) DEFAULT NULL,
  `message` varchar(400) DEFAULT NULL,
  `img` varchar(245) DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (9,13,'84131108245','ASDASDASD',' ',4,'2023-07-27 03:37:19'),(10,27,'87580110541','maganda naman kaso mas maganda padin kung mahal ka nya huhu','feedback_upload/feed_back-53045547.png',2,'2023-07-27 05:08:58');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `socials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `social_name` varchar(225) DEFAULT NULL,
  `social_icon` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socials`
--

LOCK TABLES `socials` WRITE;
/*!40000 ALTER TABLE `socials` DISABLE KEYS */;
INSERT INTO `socials` VALUES (1,'facebook','assets/images/socials/facebook.png'),(2,'twitter','assets/images/socials/twitter.png'),(3,'instagram','assets/images/socials/instagram.png'),(4,'telegram','assets/images/socials/telegram.png'),(5,'tiktok','assets/images/socials/tiktok.png'),(6,'snapchat','assets/images/socials/snapchat.png'),(7,'linkedIn ','assets/images/socials/linkedin.png'),(8,'discord','assets/images/socials/discord.png'),(9,'gmail','assets/images/socials/gmail.png'),(10,'viber','assets/images//socials/viber.png');
/*!40000 ALTER TABLE `socials` ENABLE KEYS */;
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
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pin` int NOT NULL,
  `verification` int DEFAULT '0',
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'bentf24@gmail.com','Benedict','Barcebal ','3249839483','3232 Guadalupe Nuevo Makit City','profile_upload/profile-34210868.jpeg','$2y$10$JkiI9YkWLts0gJkhJu69ZuZE80XarrvxMgSPwinJJRv2Q7Kq6F0IW',855027,1,'2023-05-09 03:25:20'),(27,'edisonlawliet@gmail.com','Edison','Lawliets','9324823421','Taga jans','','$2y$10$DPZxPym106dU7LyifaRD0OXPZCSHhBMRZbxQDldeDpvbgMjJJ60BO',895649,1,'2023-06-20 05:17:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_socials`
--

DROP TABLE IF EXISTS `users_socials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_socials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(225) DEFAULT NULL,
  `social_name` varchar(225) DEFAULT NULL,
  `social_link` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_socials`
--

LOCK TABLES `users_socials` WRITE;
/*!40000 ALTER TABLE `users_socials` DISABLE KEYS */;
INSERT INTO `users_socials` VALUES (10,'13','facebook','https://www.facebook.com/HeadTurnerMCgears');
/*!40000 ALTER TABLE `users_socials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-27 13:51:04
