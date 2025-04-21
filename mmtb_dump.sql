-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: mmtb
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.24.04.1

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
-- Table structure for table `added`
--

DROP TABLE IF EXISTS `added`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `added` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `district_id` bigint unsigned DEFAULT NULL,
  `maktab_raqami` int DEFAULT NULL,
  `mfy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qurilgan_yili` year DEFAULT NULL,
  `songi_tamir_yili` year DEFAULT NULL,
  `yer_maydoni` double DEFAULT NULL,
  `xudud_oralganligi` tinyint(1) DEFAULT NULL,
  `binolar_soni` int DEFAULT NULL,
  `binolar_qavatligi` int DEFAULT NULL,
  `binolar_maydoni` double DEFAULT NULL,
  `istilidigan_maydon` double DEFAULT NULL,
  `quvvati` int DEFAULT NULL,
  `oquvchi_soni` int DEFAULT NULL,
  `koffsiyent` double DEFAULT NULL,
  `oshxona_yoki_bufet_quvvati` int DEFAULT NULL,
  `sport_zal_soni_va_maydoni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faollar_zali_va_quvvati` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xolati` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tom_xolati_yuzda` double DEFAULT NULL,
  `deraza_rom_xolati_yuzda` double DEFAULT NULL,
  `istish_turi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qozonlar_soni` int DEFAULT NULL,
  `qozonlar_xolati_yuzda` double DEFAULT NULL,
  `apoklar_xolati_yuzda` double DEFAULT NULL,
  `gaz_istemoli` double DEFAULT NULL,
  `elektr_istemoli` double DEFAULT NULL,
  `issiqlik_istemoli` double DEFAULT NULL,
  `quyosh_paneli` tinyint(1) DEFAULT NULL,
  `maktab_rasmlari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geokollektor` tinyint(1) DEFAULT NULL,
  `lokatsiya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `added_district_id_index` (`district_id`),
  CONSTRAINT `added_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `added`
--

LOCK TABLES `added` WRITE;
/*!40000 ALTER TABLE `added` DISABLE KEYS */;
INSERT INTO `added` VALUES (1,1,46,'School #1 - Bektemir',2015,2022,98.96,0,2,1,NULL,NULL,635,702,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,'Bektemir District, Street 1','2025-04-21 16:33:56','2025-04-21 16:37:51'),(2,1,7,'School #2 - Bektemir',1955,2022,141.7,1,2,4,NULL,NULL,563,886,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bektemir District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(3,1,2,'School #3 - Bektemir',1974,2020,139.79,0,2,4,NULL,NULL,1123,799,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bektemir District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(4,1,2,'School #4 - Bektemir',2009,2021,127.03,1,2,1,NULL,NULL,881,461,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bektemir District, Street 4','2025-04-21 16:33:56','2025-04-21 16:33:56'),(5,1,3,'School #5 - Bektemir',2003,2015,127.94,0,5,2,NULL,NULL,909,279,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bektemir District, Street 5','2025-04-21 16:33:56','2025-04-21 16:33:56'),(6,1,1,'School #6 - Bektemir',2006,2015,78.7,0,4,1,NULL,NULL,864,917,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bektemir District, Street 6','2025-04-21 16:33:56','2025-04-21 16:33:56'),(7,1,2,'School #7 - Bektemir',2007,2012,134.74,0,4,4,NULL,NULL,735,279,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bektemir District, Street 7','2025-04-21 16:33:56','2025-04-21 16:33:56'),(8,1,5,'School #8 - Bektemir',1971,2013,64.56,0,3,2,NULL,NULL,537,922,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bektemir District, Street 8','2025-04-21 16:33:56','2025-04-21 16:33:56'),(9,2,4,'School #1 - Chilanzar',1983,2019,75.7,1,3,2,NULL,NULL,446,517,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,'Chilanzar District, Street 1','2025-04-21 16:33:56','2025-04-21 16:37:36'),(10,2,6,'School #2 - Chilanzar',1967,2022,80.9,1,3,3,NULL,NULL,670,946,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Chilanzar District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(11,2,8,'School #3 - Chilanzar',1950,2018,144.07,1,4,2,NULL,NULL,840,321,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Chilanzar District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(12,2,9,'School #4 - Chilanzar',1954,2016,52.02,0,5,2,NULL,NULL,409,270,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Chilanzar District, Street 4','2025-04-21 16:33:56','2025-04-21 16:33:56'),(13,3,45,'School #1 - Mirobod',1955,2010,102.73,1,3,1,NULL,NULL,400,900,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,'Mirobod District, Street 1','2025-04-21 16:33:56','2025-04-21 16:39:20'),(14,3,8,'School #2 - Mirobod',2014,2020,79.37,0,2,2,NULL,NULL,1060,629,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Mirobod District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(15,3,6,'School #3 - Mirobod',1990,2010,94.23,0,4,1,NULL,NULL,681,930,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Mirobod District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(16,4,7,'School #1 - Mirzo Ulug\'bek',2002,2010,132.12,1,1,4,NULL,NULL,950,864,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Mirzo Ulug\'bek District, Street 1','2025-04-21 16:33:56','2025-04-21 16:33:56'),(17,4,7,'School #2 - Mirzo Ulug\'bek',2015,2022,97.12,0,3,3,NULL,NULL,361,441,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Mirzo Ulug\'bek District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(18,4,5,'School #3 - Mirzo Ulug\'bek',2003,2010,132.9,0,2,3,NULL,NULL,1010,937,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Mirzo Ulug\'bek District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(19,4,7,'School #4 - Mirzo Ulug\'bek',1993,2015,53.92,0,2,3,NULL,NULL,304,608,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Mirzo Ulug\'bek District, Street 4','2025-04-21 16:33:56','2025-04-21 16:33:56'),(20,5,4,'School #1 - Olmazor',1968,2013,51.44,1,4,2,NULL,NULL,778,745,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Olmazor District, Street 1','2025-04-21 16:33:56','2025-04-21 16:33:56'),(21,5,3,'School #2 - Olmazor',1975,2011,136.59,0,1,1,NULL,NULL,977,278,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Olmazor District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(22,5,8,'School #3 - Olmazor',2015,2014,54.9,1,3,2,NULL,NULL,430,689,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Olmazor District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(23,5,4,'School #4 - Olmazor',1986,2023,57.44,0,5,4,NULL,NULL,570,917,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Olmazor District, Street 4','2025-04-21 16:33:56','2025-04-21 16:33:56'),(24,5,6,'School #5 - Olmazor',2017,2018,143.35,0,5,1,NULL,NULL,319,255,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Olmazor District, Street 5','2025-04-21 16:33:56','2025-04-21 16:33:56'),(25,6,8,'School #1 - Sergeli',2020,2022,115.14,1,2,1,NULL,NULL,391,986,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Sergeli District, Street 1','2025-04-21 16:33:56','2025-04-21 16:33:56'),(26,6,5,'School #2 - Sergeli',1969,2017,100.86,0,2,3,NULL,NULL,392,250,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Sergeli District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(27,6,2,'School #3 - Sergeli',1972,2021,124.24,1,3,4,NULL,NULL,1075,665,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Sergeli District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(28,6,5,'School #4 - Sergeli',2018,2014,106.57,0,5,1,NULL,NULL,549,903,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Sergeli District, Street 4','2025-04-21 16:33:56','2025-04-21 16:33:56'),(29,7,1,'School #1 - Shayxontohur',1983,2016,103.3,1,2,1,NULL,NULL,307,223,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Shayxontohur District, Street 1','2025-04-21 16:33:56','2025-04-21 16:33:56'),(30,7,9,'School #2 - Shayxontohur',1954,2016,69.83,0,5,2,NULL,NULL,375,811,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Shayxontohur District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(31,7,3,'School #3 - Shayxontohur',2019,2021,143.44,0,4,3,NULL,NULL,600,451,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Shayxontohur District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(32,8,3,'School #1 - Uchtepa',1968,2010,135.39,1,3,4,NULL,NULL,564,626,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Uchtepa District, Street 1','2025-04-21 16:33:56','2025-04-21 16:33:56'),(33,8,6,'School #2 - Uchtepa',2002,2019,123.75,0,5,4,NULL,NULL,562,934,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Uchtepa District, Street 2','2025-04-21 16:33:56','2025-04-21 16:33:56'),(34,8,9,'School #3 - Uchtepa',2020,2023,144.92,0,5,2,NULL,NULL,341,370,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Uchtepa District, Street 3','2025-04-21 16:33:56','2025-04-21 16:33:56'),(35,8,2,'School #4 - Uchtepa',1956,2020,94.77,0,4,1,NULL,NULL,470,675,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Uchtepa District, Street 4','2025-04-21 16:33:56','2025-04-21 16:33:56'),(36,8,3,'School #5 - Uchtepa',1951,2013,55.7,0,2,2,NULL,NULL,1082,827,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Uchtepa District, Street 5','2025-04-21 16:33:56','2025-04-21 16:33:56'),(37,8,4,'School #6 - Uchtepa',2009,2017,102.12,0,3,4,NULL,NULL,531,518,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Uchtepa District, Street 6','2025-04-21 16:33:56','2025-04-21 16:33:56'),(38,8,5,'School #7 - Uchtepa',2020,2025,71.55,1,2,3,NULL,NULL,420,756,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Uchtepa District, Street 7','2025-04-21 16:33:56','2025-04-21 16:33:56'),(39,9,5,'School #1 - Yashnobod',1984,2024,120.03,0,3,2,NULL,NULL,306,564,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yashnobod District, Street 1','2025-04-21 16:33:57','2025-04-21 16:33:57'),(40,9,7,'School #2 - Yashnobod',1985,2019,130.89,1,5,1,NULL,NULL,1190,420,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yashnobod District, Street 2','2025-04-21 16:33:57','2025-04-21 16:33:57'),(41,9,7,'School #3 - Yashnobod',2008,2012,56.41,0,5,1,NULL,NULL,728,565,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yashnobod District, Street 3','2025-04-21 16:33:57','2025-04-21 16:33:57'),(42,9,9,'School #4 - Yashnobod',1987,2013,66.4,1,2,2,NULL,NULL,452,976,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yashnobod District, Street 4','2025-04-21 16:33:57','2025-04-21 16:33:57'),(43,10,9,'School #1 - Yunusobod',1957,2018,52.57,1,2,2,NULL,NULL,810,844,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yunusobod District, Street 1','2025-04-21 16:33:57','2025-04-21 16:33:57'),(44,10,7,'School #2 - Yunusobod',2005,2012,146.87,1,5,3,NULL,NULL,885,282,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yunusobod District, Street 2','2025-04-21 16:33:57','2025-04-21 16:33:57'),(45,10,5,'School #3 - Yunusobod',1968,2015,56.69,0,3,3,NULL,NULL,1159,682,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yunusobod District, Street 3','2025-04-21 16:33:57','2025-04-21 16:33:57'),(46,10,6,'School #4 - Yunusobod',1971,2014,80.83,0,2,3,NULL,NULL,953,326,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yunusobod District, Street 4','2025-04-21 16:33:57','2025-04-21 16:33:57'),(47,10,5,'School #5 - Yunusobod',2018,2025,111.57,0,3,2,NULL,NULL,858,608,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yunusobod District, Street 5','2025-04-21 16:33:57','2025-04-21 16:33:57'),(48,10,1,'School #6 - Yunusobod',1988,2017,127.03,1,5,1,NULL,NULL,1144,738,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yunusobod District, Street 6','2025-04-21 16:33:57','2025-04-21 16:33:57'),(49,10,5,'School #7 - Yunusobod',1982,2016,136.63,0,2,3,NULL,NULL,602,850,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yunusobod District, Street 7','2025-04-21 16:33:57','2025-04-21 16:33:57'),(50,11,1,'School #1 - Yakkasaroy',2010,2023,94.87,0,2,3,NULL,NULL,1149,633,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yakkasaroy District, Street 1','2025-04-21 16:33:57','2025-04-21 16:33:57'),(51,11,3,'School #2 - Yakkasaroy',1964,2012,82.72,0,5,1,NULL,NULL,422,704,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yakkasaroy District, Street 2','2025-04-21 16:33:57','2025-04-21 16:33:57'),(52,11,5,'School #3 - Yakkasaroy',1993,2012,80.58,0,4,2,NULL,NULL,874,703,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yakkasaroy District, Street 3','2025-04-21 16:33:57','2025-04-21 16:33:57'),(53,11,3,'School #4 - Yakkasaroy',1999,2014,89.1,0,1,4,NULL,NULL,401,729,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yakkasaroy District, Street 4','2025-04-21 16:33:57','2025-04-21 16:33:57'),(54,11,5,'School #5 - Yakkasaroy',1979,2018,149.91,1,3,3,NULL,NULL,575,900,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yakkasaroy District, Street 5','2025-04-21 16:33:57','2025-04-21 16:33:57'),(55,11,7,'School #6 - Yakkasaroy',1994,2014,116.96,1,3,4,NULL,NULL,1066,721,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yakkasaroy District, Street 6','2025-04-21 16:33:57','2025-04-21 16:33:57'),(56,11,8,'School #7 - Yakkasaroy',1993,2019,61.39,0,2,1,NULL,NULL,1152,665,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yakkasaroy District, Street 7','2025-04-21 16:33:57','2025-04-21 16:33:57'),(57,12,7,'School #1 - Yangihayot',1990,2023,81.03,1,3,4,NULL,NULL,1154,874,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yangihayot District, Street 1','2025-04-21 16:33:57','2025-04-21 16:33:57'),(58,12,3,'School #2 - Yangihayot',2017,2024,130.84,0,1,3,NULL,NULL,317,835,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yangihayot District, Street 2','2025-04-21 16:33:57','2025-04-21 16:33:57'),(59,12,1,'School #3 - Yangihayot',1979,2023,101.81,0,2,4,NULL,NULL,1067,230,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yangihayot District, Street 3','2025-04-21 16:33:57','2025-04-21 16:33:57'),(60,12,7,'School #4 - Yangihayot',2001,2025,55.91,1,2,2,NULL,NULL,319,762,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yangihayot District, Street 4','2025-04-21 16:33:57','2025-04-21 16:33:57'),(61,12,3,'School #5 - Yangihayot',1968,2011,131.03,0,2,2,NULL,NULL,1056,757,NULL,NULL,NULL,NULL,'inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yangihayot District, Street 5','2025-04-21 16:33:57','2025-04-21 16:33:57'),(62,12,2,'School #6 - Yangihayot',1973,2024,134.54,0,4,4,NULL,NULL,670,767,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yangihayot District, Street 6','2025-04-21 16:33:57','2025-04-21 16:33:57'),(63,3,212,'Littel Loaf',2000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'school_images/Ee97WB7GPWaHlMFOlEUXEC9gKegT9dKIAczPQoAp.jpg',NULL,NULL,'2025-04-21 16:39:58','2025-04-21 16:39:58');
/*!40000 ALTER TABLE `added` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `districts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tashkent',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,'Bektemir','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(2,'Chilanzar','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(3,'Mirobod','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(4,'Mirzo Ulug\'bek','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(5,'Olmazor','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(6,'Sergeli','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(7,'Shayxontohur','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(8,'Uchtepa','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(9,'Yashnobod','Tashkent',1,'2025-04-21 16:33:56','2025-04-21 16:33:56'),(10,'Yunusobod','Tashkent',1,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(11,'Yakkasaroy','Tashkent',1,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(12,'Yangihayot','Tashkent',1,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(13,'Test District (Inactive)','Tashkent',0,'2025-04-21 16:33:57','2025-04-21 16:33:57');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kindergartens`
--

DROP TABLE IF EXISTS `kindergartens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kindergartens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `district_id` bigint unsigned DEFAULT NULL,
  `mfy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qurilgan_yili` int NOT NULL,
  `songi_tamir_yili` int DEFAULT NULL,
  `boqcha_raqami` int DEFAULT NULL,
  `yer_maydoni` decimal(10,2) DEFAULT NULL,
  `xudud_oralganligi` tinyint(1) DEFAULT NULL,
  `binolar_soni` int DEFAULT NULL,
  `binolar_qavatligi` int DEFAULT NULL,
  `binolar_maydoni` decimal(10,2) DEFAULT NULL,
  `istilidigan_maydon` decimal(10,2) DEFAULT NULL,
  `quvvati` int DEFAULT NULL,
  `bolalar_soni` int DEFAULT NULL,
  `koffsiyent` decimal(8,2) DEFAULT NULL,
  `oshxona_yoki_bufet_quvvati` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_zal_soni_va_maydoni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faollar_zali_va_quvvati` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xolati` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tom_xolati_yuzda` decimal(5,2) DEFAULT NULL,
  `deraza_rom_xolati_yuzda` decimal(5,2) DEFAULT NULL,
  `istish_turi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qozonlar_soni` int DEFAULT NULL,
  `qozonlar_xolati_yuzda` decimal(5,2) DEFAULT NULL,
  `apoklar_xolati_yuzda` decimal(5,2) DEFAULT NULL,
  `gaz_istemoli` decimal(10,2) DEFAULT NULL,
  `elektr_istemoli` decimal(10,2) DEFAULT NULL,
  `issiqlik_istemoli` decimal(10,2) DEFAULT NULL,
  `quyosh_paneli` tinyint(1) DEFAULT NULL,
  `geokollektor` tinyint(1) DEFAULT NULL,
  `lokatsiya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boqcha_rasmlari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kindergartens_district_id_foreign` (`district_id`),
  CONSTRAINT `kindergartens_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kindergartens`
--

LOCK TABLES `kindergartens` WRITE;
/*!40000 ALTER TABLE `kindergartens` DISABLE KEYS */;
INSERT INTO `kindergartens` VALUES (1,7,'Cummerata Plaza',1993,1992,2,4472.24,0,5,1,424.02,507.41,195,173,1.26,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',79.00,78.00,'Qozonxona',3,60.00,80.00,608.71,773.69,488.79,0,1,'238 Brown Roads\nLake Doraville, MN 66741-1001',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(2,12,'Schinner Lakes',1970,2008,1,1628.98,1,5,2,2078.97,1307.28,222,283,0.85,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',99.00,66.00,'Elektr',3,82.00,85.00,649.64,963.62,639.96,0,0,'8412 Martine Green Apt. 660\nCorwinport, CA 46042-1440',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(3,8,'Edwardo Route',2014,NULL,4,2541.45,1,4,3,879.64,229.49,92,40,1.86,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Qoniqarli',91.00,69.00,'Elektr',3,99.00,81.00,650.85,723.12,171.43,1,1,'85771 Axel Meadow\nGorczanystad, ND 03099-4400',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(4,3,'Kira Meadows',1977,2005,1,3768.38,1,1,2,2740.71,1051.91,166,298,0.94,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',99.00,61.00,'Qozonxona',3,83.00,66.00,379.39,204.92,753.95,0,0,'33259 Merlin PortsLake Westonland, KS 97984',NULL,'2025-04-21 16:33:57','2025-04-21 16:58:14'),(5,12,'Rohan Extensions',1973,NULL,3,1485.96,0,4,2,1069.21,1955.12,129,107,1.38,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Qoniqarli',76.00,89.00,'Elektr',3,67.00,86.00,508.54,264.61,610.51,0,0,'895 Terry Drive\nLake Wilfredoport, DE 90793-5172',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(6,4,'Therese Islands',1983,2007,3,3787.05,0,3,2,2364.40,921.21,182,141,1.06,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',98.00,54.00,'Elektr',1,91.00,89.00,306.68,716.43,467.03,1,0,'9364 Corwin Loaf\nKeeleyside, SC 06371-0643',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(7,4,'Karine Trail',1997,2019,3,3143.89,0,1,1,1827.42,499.15,257,115,1.41,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',94.00,94.00,'Elektr',3,90.00,94.00,293.75,121.70,492.18,0,1,'76557 Lizzie Throughway Suite 641\nLake Jaredmouth, AK 53431',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(8,4,'Marietta Green',1980,NULL,1,4855.87,1,5,2,823.30,1694.34,125,298,1.49,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Qoniqarli',100.00,65.00,'Markaziy',1,93.00,96.00,504.74,873.81,609.95,1,0,'5130 Swaniawski Coves Suite 561\nNew Zackary, KY 83842-9793',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(9,8,'Hegmann Isle',1999,NULL,1,3200.10,1,1,3,2635.85,1881.99,173,299,1.94,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Yaxshi',61.00,61.00,'Qozonxona',3,76.00,73.00,731.41,142.77,830.06,0,1,'25566 Gottlieb Place\nCasperview, VA 09543',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(10,8,'Florencio Island',2012,2022,4,4012.80,1,5,3,2356.26,1686.98,229,85,0.79,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yaxshi',96.00,50.00,'Qozonxona',3,84.00,66.00,952.19,648.06,377.11,0,0,'4130 Yesenia Light\nDickensview, IL 71300-1418',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(11,11,'Augustine Shore',1971,1986,1,2277.44,0,1,2,2263.32,1006.11,72,37,1.77,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',87.00,83.00,'Qozonxona',3,60.00,79.00,802.03,490.58,850.38,1,1,'3623 Delores Courts Apt. 741\nNorth Geraldbury, MS 03131-2571',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(12,11,'Vallie Fords',1981,2024,3,3817.30,1,2,1,542.33,780.87,214,286,1.72,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Yaxshi',79.00,81.00,'Markaziy',1,60.00,99.00,819.48,342.38,293.02,1,0,'1465 Marvin Camp Suite 987\nNickport, MT 02998-0979',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(13,12,'Tracey Expressway',1989,NULL,3,3718.90,1,2,2,355.18,1389.23,282,23,1.80,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Qoniqarli',52.00,51.00,'Markaziy',2,93.00,72.00,127.38,518.49,129.88,0,0,'36222 April Fork\nLake Jewel, IL 68119',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(14,4,'Phoebe Route',1986,NULL,1,1946.25,0,2,2,1605.63,950.78,68,141,1.70,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',92.00,68.00,'Elektr',1,97.00,63.00,831.58,752.22,228.59,0,1,'37641 Dach Crescent\nPort Virgieville, CT 21384',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(15,1,'Salma Squares',1985,NULL,4,4141.15,0,5,2,1473.30,1466.61,124,176,0.93,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',65.00,69.00,'Qozonxona',1,63.00,99.00,340.41,566.37,371.67,1,0,'996 Selmer RapidWaelchitown, FL 07026','kindergarten_images/K9ogKpQOzya9davZg3rqIaCHWXs2U4M0St25pPuv.jpg','2025-04-21 16:33:57','2025-04-21 16:46:01'),(16,11,'Johnston Route',1981,NULL,3,2880.33,0,5,2,553.18,1166.54,259,158,0.86,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',58.00,50.00,'Elektr',2,75.00,93.00,155.28,925.86,735.96,0,1,'8166 Goyette Shore Suite 118\nWest Citlalli, NJ 16120',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(17,1,'Feest Parkway',1986,1976,3,4353.95,0,5,1,1977.46,1085.16,181,273,1.53,'oshxona','1 ta / 150 m²','1 ta / 100 kishilik','Qoniqarli',70.00,84.00,'Markaziy',2,60.00,74.00,161.27,422.29,166.68,1,1,'100 Jayson Alley Suite 932\nKingtown, TX 01293-6025',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(18,3,'Dino Hills',2024,NULL,4,1466.18,1,4,3,2916.64,970.11,234,236,1.28,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yomon',51.00,75.00,'Elektr',1,89.00,100.00,277.16,291.42,266.85,0,1,'967 Broderick Fort Apt. 963\nLake Claremouth, AK 33641',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(19,9,'Feest Light',1993,2003,4,4857.88,1,2,2,718.43,1479.75,229,273,1.72,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Qoniqarli',75.00,69.00,'Qozonxona',3,78.00,97.00,616.93,822.20,159.52,1,0,'8534 Renner Oval Apt. 593\nEast Johannhaven, MN 33177-2038',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(20,1,'Ledner Viaduct',1981,NULL,4,2161.19,0,5,2,932.56,1842.13,216,100,1.76,'bufet','1 ta / 150 m²','1 ta / 100 kishilik','Yaxshi',90.00,63.00,'Markaziy',1,83.00,66.00,569.92,386.64,586.67,1,1,'3501 Maegan Village Suite 743\nEast Weldonchester, VA 19297',NULL,'2025-04-21 16:33:57','2025-04-21 16:33:57'),(21,2,'Littel Loaf',2000,1800,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,'kindergarten_images/OKf7SnB3gx7907f3rNYaZhOJv4yq8VVH8ds7T5aP.jpg','2025-04-21 16:35:47','2025-04-21 16:44:46'),(22,2,'Littel Loaf',2000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-21 16:36:23','2025-04-21 16:36:23'),(23,2,'School - Chilanzar',2000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-21 16:36:37','2025-04-21 16:36:37'),(24,1,'Littel Loaf',2000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-21 16:45:48','2025-04-21 16:45:48'),(25,1,'Littel Loaf',2000,NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'kindergarten_images/8weBW0RtYScchlMYslNVHKGOmN9VKLnyEdVhOqBj.jpg','2025-04-21 17:29:46','2025-04-21 17:29:46');
/*!40000 ALTER TABLE `kindergartens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_04_15_000001_create_districts_table',1),(5,'2025_04_15_000002_create_added_table',1),(6,'2025_04_15_000003_create_kindergartens_table',1),(7,'2025_04_15_125106_add_district_id_to_added_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('c7c4eqln7yUTQ2ICniWojBKZcqzeWOp2mTD8GzJ5',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS2VKWkJvM3RRTkZSNzM5WnZvc0RCM0h3RWJSaUNxdDlJUXBmbWJ5OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1745274615);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yoqubov_Shehroz','student1002@tuit.uz',NULL,'$2y$12$RZiaIWGcuHxAAYMorDGWaOoWv1HyZVYG02JpYdQPaaHZGn1Y2UvXa',NULL,'2025-04-21 16:35:31','2025-04-21 16:35:31');
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

-- Dump completed on 2025-04-22  3:34:11
