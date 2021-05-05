-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: proyecto_produccion
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abous_us`
--

DROP TABLE IF EXISTS `abous_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abous_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modul_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abous_us_modul_id_foreign` (`modul_id`),
  CONSTRAINT `abous_us_modul_id_foreign` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abous_us`
--

LOCK TABLES `abous_us` WRITE;
/*!40000 ALTER TABLE `abous_us` DISABLE KEYS */;
INSERT INTO `abous_us` VALUES (1,'Julio César','Sánchez Díaz','Secretario de Turismo, Cultura, Recreación y Deportes de la Alcaldía de Tocaima.','310 2263914','secretariaturismo@tocaima-cundinamarca.gov.co','personal_alcaldia/TWjlRi6qsNDnfE24jj36VCRMCjPg3pNQCmiQvxOr.jpg',2,'2021-04-23 13:34:06','2021-04-23 13:34:06');
/*!40000 ALTER TABLE `abous_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_alls`
--

DROP TABLE IF EXISTS `articles_alls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_alls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_publication_id` bigint(20) unsigned NOT NULL,
  `modul_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_alls_name_unique` (`name`),
  KEY `articles_alls_state_publication_id_foreign` (`state_publication_id`),
  KEY `articles_alls_modul_id_foreign` (`modul_id`),
  CONSTRAINT `articles_alls_modul_id_foreign` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `articles_alls_state_publication_id_foreign` FOREIGN KEY (`state_publication_id`) REFERENCES `state_publications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_alls`
--

LOCK TABLES `articles_alls` WRITE;
/*!40000 ALTER TABLE `articles_alls` DISABLE KEYS */;
INSERT INTO `articles_alls` VALUES (1,'Historicos','El objeto Promise devuelto desde fetch() no será rechazado con un estado de error HTTP incluso si la respuesta es un error HTTP 404 o 500. En cambio, este se resolverá normalmente (con un estado ok configurado a false), y  este solo sera rechazado ante un fallo de red o si algo impidió completar la solicitud','Historicos','articles/0I1CEtDuOtCTXWP2zxwPsBr3T5bbuYXkFOu7tAE2.jpg',1,1,'2021-04-23 09:17:31','2021-04-23 09:20:18'),(2,'Naturales','El objeto Promise devuelto desde fetch() no será rechazado con un estado de error HTTP incluso si la respuesta es un error HTTP 404 o 500. En cambio, este se resolverá normalmente (con un estado ok configurado a false), y  este solo sera rechazado ante un fallo de red o si algo impidió completar la solicitud','Naturales','articles/UTlW8XfVFySg2WlKZ5EbuVZonz9TpTivjIVEDgPb.jpg',1,1,'2021-04-23 09:18:05','2021-04-23 09:19:56'),(3,'Culturales','Se designa centro cultural o establecimiento de cultura, y en ocasiones centro cultural para ancianos comunitarios, al lugar en una comunidad destinado a mantener actividades que promueven la cultura entre sus habitantes.','Culturales','contenido/ekvzT4AGoivlNLx5z8Hz5r1H8tpvewHtfK7OTGvV.png',1,1,'2021-04-26 05:44:01','2021-04-26 05:44:01');
/*!40000 ALTER TABLE `articles_alls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditorias`
--

DROP TABLE IF EXISTS `auditorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditorias`
--

LOCK TABLES `auditorias` WRITE;
/*!40000 ALTER TABLE `auditorias` DISABLE KEYS */;
INSERT INTO `auditorias` VALUES (1,'Creación de sitio  Sitio prueba','Juan Gutierrez |Administrador','2021-04-23 02:33:29',NULL),(2,'Se agrego nueva imagen en sitio:  Sitio prueba','Juan Gutierrez |Administrador','2021-04-23 02:33:53',NULL),(3,'Se agrego nueva imagen en sitio:  Sitio prueba','Juan Gutierrez |Administrador','2021-04-23 02:33:55',NULL),(4,'Se agrego nueva imagen en sitio:  Sitio prueba','Juan Gutierrez |Administrador','2021-04-23 02:33:56',NULL),(5,'Se agrego nueva imagen en sitio:  Sitio prueba','Juan Gutierrez |Administrador','2021-04-23 02:33:57',NULL),(6,'Creacion de evento Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:35:40',NULL),(7,'Creacion de evento Evento 2','Juan Gutierrez |Administrador','2021-04-23 02:37:11',NULL),(8,'Actualizacion de evento Ruta a parisA Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:42:52',NULL),(9,'Actualizacion de evento Ruta a parisA Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:45:39',NULL),(10,'Actualizacion de evento Ruta a parisA Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:47:45',NULL),(11,'Actualizacion de evento Ruta a parisA Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:49:41',NULL),(12,'Actualizacion de evento Ruta a parisA Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:53:28',NULL),(13,'Actualizacion de evento Ruta a parisA Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:55:20',NULL),(14,'Actualizacion de evento Ruta a parisA Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 02:58:23',NULL),(15,'Creacion de la ruta   Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 03:01:43',NULL),(16,'Se agrego nueva imagen en la ruta:  Ruta a paris','Juan Gutierrez |Administrador','2021-04-23 03:05:05',NULL),(17,'Creación de sitio  Hotel Tocarema','Juan Gutierrez |Administrador','2021-04-23 08:12:04',NULL),(18,'Creacion de contenido Historicos','Juan Gutierrez |Administrador','2021-04-23 09:17:31',NULL),(19,'Creacion de contenido Naturales','Juan Gutierrez |Administrador','2021-04-23 09:18:05',NULL),(20,'Actualizacion de contenido de Naturales','Juan Gutierrez |Administrador','2021-04-23 09:19:56',NULL),(21,'Actualizacion de contenido de Historicos','Juan Gutierrez |Administrador','2021-04-23 09:20:18',NULL),(22,'Creación del Personal Julio César Sánchez Díaz','Juan Gutierrez |Administrador','2021-04-23 13:34:06',NULL),(23,'Creación de sitio  Sitio turístico N1','Juan Gutierrez |Administrador','2021-04-23 13:48:05',NULL),(24,'Se agrego nueva imagen en sitio:  Sitio turístico N1','Juan Gutierrez |Administrador','2021-04-23 13:53:24',NULL),(25,'Se agrego nueva imagen en sitio:  Sitio turístico N1','Juan Gutierrez |Administrador','2021-04-23 13:53:27',NULL),(26,'Se agrego nueva imagen en sitio:  Sitio turístico N1','Juan Gutierrez |Administrador','2021-04-23 13:53:28',NULL),(27,'Creación de sitio  Sitio de las rosas','Juan Gutierrez |Administrador','2021-04-23 13:57:57',NULL),(28,'Creación de sitio  Sitio de las rositas','Juan Gutierrez |Administrador','2021-04-23 14:13:21',NULL),(29,'Creacion de la ruta   Ruta de tocaima','Juan Gutierrez |Administrador','2021-04-23 15:45:21',NULL),(30,'Se agrego nueva imagen en la ruta:  Ruta de tocaima','Juan Gutierrez |Administrador','2021-04-23 15:45:41',NULL),(31,'Se agrego nueva imagen en la ruta:  Ruta de tocaima','Juan Gutierrez |Administrador','2021-04-23 15:45:42',NULL),(32,'Creacion de la ruta   Ruta a paris editada','Juan Gutierrez |Administrador','2021-04-24 08:31:03',NULL),(33,'Se edito la ruta turistica  Ruta a paris Ruta a paris en tocaima','Juan Gutierrez |Administrador','2021-04-24 08:34:17',NULL),(34,'Creacion de contenido Culturales','Juan Gutierrez |Administrador','2021-04-26 05:44:01',NULL),(35,'Creación de sitio  Hotel las diurnas','Juan Gutierrez |Administrador','2021-04-26 05:48:18',NULL),(36,'Se agrego nueva imagen en sitio:  Hotel las diurnas','Juan Gutierrez |Administrador','2021-04-26 05:48:44',NULL),(37,'Se agrego nueva imagen en sitio:  Hotel las diurnas','Juan Gutierrez |Administrador','2021-04-26 05:48:46',NULL),(38,'Se agrego nueva imagen en sitio:  Hotel las diurnas','Juan Gutierrez |Administrador','2021-04-26 05:48:46',NULL),(39,'Creacion de la ruta   Ruta numero 4 sitios x','Juan Gutierrez |Administrador','2021-04-26 05:50:06',NULL);
/*!40000 ALTER TABLE `auditorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Culturales','Culturales','2021-04-23 02:25:46','2021-04-23 02:25:46'),(2,'Naturales','Naturales','2021-04-23 02:25:46','2021-04-23 02:25:46'),(3,'Gubernamentales','Gubernamentales','2021-04-23 02:25:46','2021-04-23 02:25:46'),(4,'Historicos','Historicos','2021-04-23 02:25:46','2021-04-23 02:25:46'),(5,'Hoteles','Hoteles','2021-04-23 02:25:46','2021-04-23 02:25:46'),(6,'Paseos Naturales','Paseos Naturales','2021-04-23 02:25:46','2021-04-23 02:25:46');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_places`
--

DROP TABLE IF EXISTS `comments_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `place_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_places_place_id_foreign` (`place_id`),
  KEY `comments_places_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_places_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_places_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_places`
--

LOCK TABLES `comments_places` WRITE;
/*!40000 ALTER TABLE `comments_places` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments_places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments_routes`
--

DROP TABLE IF EXISTS `comments_routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments_routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tuorist_route_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_routes_tuorist_route_id_foreign` (`tuorist_route_id`),
  KEY `comments_routes_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_routes_tuorist_route_id_foreign` FOREIGN KEY (`tuorist_route_id`) REFERENCES `tuorist_routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_routes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments_routes`
--

LOCK TABLES `comments_routes` WRITE;
/*!40000 ALTER TABLE `comments_routes` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments_routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_places`
--

DROP TABLE IF EXISTS `event_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `place_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_places_place_id_foreign` (`place_id`),
  CONSTRAINT `event_places_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_places`
--

LOCK TABLES `event_places` WRITE;
/*!40000 ALTER TABLE `event_places` DISABLE KEYS */;
INSERT INTO `event_places` VALUES (1,'Ruta a paris','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido.','#ff0000','eventos/OBjMhpSTf9pyDParKxpD8alFq8OhWaVKlashquWk.jpg','2021-04-22 04:40:00','2021-04-23 16:40:00',1,'2021-04-23 02:35:40','2021-04-23 02:58:23'),(2,'Evento 2','También es una composición de caracteres imprimibles generados por un algoritmo de cifrado que, aunque no tienen sentido para cualquier persona, sí puede ser descifrado por su destinatario','#ff0000','eventos/c3D6rAp7aJUD1Y04WJZ9N31DHv4txbVioHquAnEr.jpg','2021-04-09 04:40:00','2021-04-25 00:00:42',1,'2021-04-25 02:37:11','2021-04-23 02:37:11');
/*!40000 ALTER TABLE `event_places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
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
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_establecimiento` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'establecimientos/FLGJwQeLrQywXD7cLIbGdrVSiu2VIRDoLT19EPTq.png','abee6343-ae4c-40e0-8871-a4c561a609fc','2021-04-23 02:33:53','2021-04-23 02:33:53'),(2,'establecimientos/cFJQidEDT1MbwrW7ik1yLLbungAlv500DBVKNkkb.png','abee6343-ae4c-40e0-8871-a4c561a609fc','2021-04-23 02:33:55','2021-04-23 02:33:55'),(3,'establecimientos/qLHSydV6REtkyMzu0GaGFN8Gv6KFcmDGK6vn7L9a.png','abee6343-ae4c-40e0-8871-a4c561a609fc','2021-04-23 02:33:56','2021-04-23 02:33:56'),(4,'establecimientos/DHywmCZ2MTPDBZa3RwcY3HpoqMN8Oje3ym928CnL.png','abee6343-ae4c-40e0-8871-a4c561a609fc','2021-04-23 02:33:57','2021-04-23 02:33:57'),(5,'establecimientos/B7rwBITB9HFnS5H2iucaIffRwxvwkD9FF9AInCuM.jpg','13ef2e95-4f74-45d2-b6d7-155ba3afb36b','2021-04-23 13:53:24','2021-04-23 13:53:24'),(6,'establecimientos/IEXpaFzTEcNVAAstoz4EMIVkkZFiUyAdtltwErKM.png','13ef2e95-4f74-45d2-b6d7-155ba3afb36b','2021-04-23 13:53:27','2021-04-23 13:53:27'),(7,'establecimientos/Tkx4nH0YQXgpY8bSW4RD4V8fBpWlFsJS0po6jdUW.jpg','13ef2e95-4f74-45d2-b6d7-155ba3afb36b','2021-04-23 13:53:28','2021-04-23 13:53:28'),(8,'establecimientos/s7sh1Mt8dcXdQs95I7zDe4dMitGS0fJJMi2hqJvi.jpg','4a62461f-8a7d-4799-bef6-4298eab1bc7c','2021-04-26 05:48:44','2021-04-26 05:48:44'),(9,'establecimientos/01Y32YKfKEPL8Wy0N0fbO62cxXzdK1uOhwjd1RR0.png','4a62461f-8a7d-4799-bef6-4298eab1bc7c','2021-04-26 05:48:45','2021-04-26 05:48:45'),(10,'establecimientos/WCfmMX8gsXuxJTOftsHqgC6EB4rfHPzrDGvSTqzN.jpg','4a62461f-8a7d-4799-bef6-4298eab1bc7c','2021-04-26 05:48:46','2021-04-26 05:48:46');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images_routes`
--

DROP TABLE IF EXISTS `images_routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_route` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_routes`
--

LOCK TABLES `images_routes` WRITE;
/*!40000 ALTER TABLE `images_routes` DISABLE KEYS */;
INSERT INTO `images_routes` VALUES (1,'rutas_turisticas/ljrCMoeTZXwv35tSZ41KJwDE3TT1byYLakirwl0g.jpg','de01279e-672b-4358-8792-724db5389ec1','2021-04-23 03:01:59','2021-04-23 03:01:59'),(3,'rutas_turisticas/h7tdIOqL67NLDhxszgWGaCiE4O9h5rbziOnSL7pe.jpg','de01279e-672b-4358-8792-724db5389ec1','2021-04-23 03:02:05','2021-04-23 03:02:05'),(4,'rutas_turisticas/ItZSdDLoabn5F1ksZ0cIsWrNwTynf9lK0cZpfQwZ.jpg','de01279e-672b-4358-8792-724db5389ec1','2021-04-23 03:02:46','2021-04-23 03:02:46'),(5,'rutas_turisticas/vjyYAQIlzp4ELKA5LagrouxMAGLDAEqjFOwFH1Md.jpg','de01279e-672b-4358-8792-724db5389ec1','2021-04-23 03:02:49','2021-04-23 03:02:49'),(6,'rutas_turisticas/dDqiNnkfSxhqbcV4tqOtY3wRfXiHaS1Dtd3ERqAJ.jpg','de01279e-672b-4358-8792-724db5389ec1','2021-04-23 03:04:24','2021-04-23 03:04:24'),(7,'rutas_turisticas/VvjmlT5o2JPzowhYNV92eK3zKKk2PWtJe8uLPcvz.jpg','de01279e-672b-4358-8792-724db5389ec1','2021-04-23 03:05:05','2021-04-23 03:05:05'),(8,'rutas_turisticas/tWxvnAbV74FNLEwNhqh57Cc6hZwXQfL9mppZolq6.png','1d62ef51-555f-4777-bb1a-fa36da14c6ab','2021-04-23 15:45:41','2021-04-23 15:45:41'),(9,'rutas_turisticas/hCIzTSXb7pjaMlGIh5DxIQOjUqDLeV9jIfBUFVCD.jpg','1d62ef51-555f-4777-bb1a-fa36da14c6ab','2021-04-23 15:45:42','2021-04-23 15:45:42');
/*!40000 ALTER TABLE `images_routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_09_09_035307_create_categories_table',1),(5,'2020_10_09_055640_create_state_publications_table',1),(6,'2020_10_09_055643_create_modulos_table',1),(7,'2020_10_09_055810_create_images_table',1),(8,'2020_10_09_060022 _create_places_table',1),(9,'2020_10_09_060042_create_tuorist_route_table',1),(10,'2020_10_09_060529_create_comments_routes_table',1),(11,'2020_10_09_060620_create_comments_places_table',1),(12,'2020_10_09_061046_create_roles_table',1),(13,'2020_10_09_062015_create_placeson_routes_table',1),(14,'2020_10_09_066640_create_roles_users_table',1),(15,'2021_01_08_210555_create_permissions_table',1),(16,'2021_01_08_210744_create_permisson_role_table',1),(17,'2021_03_17_043823_create_images_routes_table',1),(18,'2021_03_29_193423_create_event_places_table',1),(19,'2021_03_29_203433_create_articles_alls_table',1),(20,'2021_03_29_234625_create_abous_us_table',1),(21,'2021_04_17_220919_create_auditoria',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moduls`
--

DROP TABLE IF EXISTS `moduls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moduls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_publication_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `moduls_state_publication_id_foreign` (`state_publication_id`),
  CONSTRAINT `moduls_state_publication_id_foreign` FOREIGN KEY (`state_publication_id`) REFERENCES `state_publications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moduls`
--

LOCK TABLES `moduls` WRITE;
/*!40000 ALTER TABLE `moduls` DISABLE KEYS */;
INSERT INTO `moduls` VALUES (1,'Sitios Turisticos','Sitios',' ',1,'2021-04-23 02:25:46','2021-04-23 02:25:46'),(2,'Personal','Personal',' ',1,'2021-04-23 02:25:46','2021-04-23 02:25:46'),(3,'Rutas','Rutas',' ',1,'2021-04-23 02:25:46','2021-04-23 02:25:46');
/*!40000 ALTER TABLE `moduls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(4,1,4,NULL,NULL),(5,1,5,NULL,NULL),(6,1,6,NULL,NULL),(7,1,7,NULL,NULL),(8,1,8,NULL,NULL),(9,1,9,NULL,NULL),(10,1,10,NULL,NULL),(11,1,11,NULL,NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Listar roles','role.index','El Administrador puede listar los roles','2021-04-23 02:25:46','2021-04-23 02:25:46'),(2,'Ver role','role.show','El usuario puede ver el rol','2021-04-23 02:25:46','2021-04-23 02:25:46'),(3,'Crear rol role','role.create','El usuario puede crear un rol','2021-04-23 02:25:46','2021-04-23 02:25:46'),(4,'Editar role','role.edit','El usuario puede editar un rol','2021-04-23 02:25:46','2021-04-23 02:25:46'),(5,'Eliminar role','role.destroy','El usuario puede eliminar un rol','2021-04-23 02:25:46','2021-04-23 02:25:46'),(6,'Listar usuarios','user.index','Puede listar los usuarios registrados','2021-04-23 02:25:46','2021-04-23 02:25:46'),(7,'Ver usuario','user.show','Puede ver información de los usuarios registrados','2021-04-23 02:25:46','2021-04-23 02:25:46'),(8,'Editar usuario','user.edit','Puede editar los usuarios registrados','2021-04-23 02:25:46','2021-04-23 02:25:46'),(9,'Eliminar usuario','user.destroy','Puede eliminar los usuarios registrados','2021-04-23 02:25:46','2021-04-23 02:25:46'),(10,'Ver mi usuario','userown.show','El usuario vera solamente su información','2021-04-23 02:25:46','2021-04-23 02:25:46'),(11,'Editar mi usuario','editown.show','El usuario solamente podra editar su información','2021-04-23 02:25:46','2021-04-23 02:25:46');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_tuorist_route`
--

DROP TABLE IF EXISTS `place_tuorist_route`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place_tuorist_route` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `place_id` bigint(20) unsigned NOT NULL,
  `tuorist_route_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `place_tuorist_route_place_id_foreign` (`place_id`),
  KEY `place_tuorist_route_tuorist_route_id_foreign` (`tuorist_route_id`),
  CONSTRAINT `place_tuorist_route_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `place_tuorist_route_tuorist_route_id_foreign` FOREIGN KEY (`tuorist_route_id`) REFERENCES `tuorist_routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_tuorist_route`
--

LOCK TABLES `place_tuorist_route` WRITE;
/*!40000 ALTER TABLE `place_tuorist_route` DISABLE KEYS */;
INSERT INTO `place_tuorist_route` VALUES (1,1,1,NULL,NULL),(4,2,1,NULL,NULL),(5,3,1,NULL,NULL),(6,5,2,NULL,NULL),(7,1,2,NULL,NULL),(8,2,2,NULL,NULL),(9,3,2,NULL,NULL),(10,4,2,NULL,NULL),(11,6,2,NULL,NULL),(12,5,3,NULL,NULL),(13,1,3,NULL,NULL),(14,2,3,NULL,NULL),(15,3,3,NULL,NULL),(16,5,1,NULL,NULL),(17,5,4,NULL,NULL),(18,6,4,NULL,NULL),(19,7,4,NULL,NULL);
/*!40000 ALTER TABLE `place_tuorist_route` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_principal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apertura` time NOT NULL,
  `cierre` time NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lat` (`lat`,`lng`),
  KEY `places_category_id_foreign` (`category_id`),
  CONSTRAINT `places_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,'Sitio prueba',2,'Calle de la Purísima 3173 editado','4.455546485198972','-74.63302009318785','3227861207','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido. También es una composición de caracteres imprimibles generados por un algoritmo de cifrado que, aunque no tienen sentido para cualquier persona, sí puede ser descifrado por su destinatario','principal_establecimientos/kvQ6TaJY2uZRrBgjJRfgGVMIzMVi8Cq1w4JJzS4D.jpg','06:40:00','14:40:00','abee6343-ae4c-40e0-8871-a4c561a609fc','2021-04-23 02:33:29','2021-04-23 02:33:29'),(2,'Sitio prueba2',2,'Calle de la Purísima 3173 editado','4.459753728537276','-74.62620865265386','3227861207','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido. También es una composición de caracteres imprimibles generados por un algoritmo de cifrado que, aunque no tienen sentido para cualquier persona, sí puede ser descifrado por su destinatario','principal_establecimientos/kvQ6TaJY2uZRrBgjJRfgGVMIzMVi8Cq1w4JJzS4D.jpg','06:40:00','14:40:00','abee6343-ae4c-40e0-8871-a4c561a609fc','2021-04-23 02:33:29','2021-04-23 02:33:29'),(3,'Hotel Tocarema',2,'District of Canoas de Punta Sal, Province of Contralmirante Villar, Tumbes, NO EXISTE, Peru','4.452670333679982','-74.63497700626384','3227861207','push es genérico intencionadamente. Este método puede ser call() o apply() a objetos que representen arrays. El método push depende de la propiedad length para decidir donde empezar a insertar los valores dados. Si el valor de la propiedad length no puede ser convertido en numérico, el índice 0 es usado. Esto permite la posibilidad de que la propiedad length sea inexistente, y en este caso length será creado.','principal_establecimientos/xef9M6MCob0pOnd9reHET2COh4zh9pHhrWQq9c3z.jpg','03:10:00','16:11:00','7edc57d3-c67c-46dd-a7ae-19cd86ad429b','2021-04-23 08:12:04','2021-04-23 08:12:04'),(4,'Sitio turístico N1',2,'Calle de la Purísima 3173 32 a','4.454571922398565','-74.62801928364426','3227861207','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido. También es una composición de caracteres imprimibles generados por un algoritmo de cifrado que, aunque no tienen sentido para cualquier persona, sí puede ser descifrado por su destinatario original.','principal_establecimientos/Lxz8tZqpVhSUTZImTTC6RHfwlPO050lATY0MGGJA.jpg','08:50:00','21:50:00','13ef2e95-4f74-45d2-b6d7-155ba3afb36b','2021-04-23 13:48:05','2021-04-23 13:48:05'),(5,'Sitio de las rosas',1,'Steet wolf siempre viva','4.456031388681564','-74.63021966233336','3227861207','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido.','principal_establecimientos/rL263WHmAIhe1Kfx7ZzWaexqcUzfQ2fin02JKARG.jpg','08:50:00','21:50:00','0e8e66f3-3ea0-41d8-a1d3-64da650129e9','2021-04-23 13:57:57','2021-04-23 13:57:57'),(6,'Sitio de las rositas',2,'Calle 32 a Numero 5-67','4.452908032028568','-74.63712483826423','3227894231','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido.','principal_establecimientos/T6m9gCNJukJ4eJc7TtNCPLb0JxKCi2wQiph0V7dQ.jpg','09:20:00','10:13:00','49f7fd3f-24ad-4eb1-9d38-22f736dfd7eb','2021-04-23 14:13:21','2021-04-23 14:13:21'),(7,'Hotel las diurnas',3,'Avenida siempre viva Tocaima','4.452123625489411','-74.64290931619708','34231231','Describir es explicar, de manera detallada y ordenada, cómo son las personas, animales, lugares, objetos, etc. La descripción sirve sobre todo para ambientar la acción y crear una que haga más creíbles los hechos que se narran.','principal_establecimientos/OGYP8QT4MkM4fQtInHauLHkSkUVODjBVzEMIsmQM.jpg','00:50:00','13:50:00','4a62461f-8a7d-4799-bef6-4298eab1bc7c','2021-04-26 05:48:18','2021-04-26 05:48:18');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rolname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full-accesses` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_rolname_unique` (`rolname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador','/admin','El Administrador es el encargado de manejar y controlar la información dentro del sistema.','yes','2021-04-23 02:25:46','2021-04-23 02:25:46'),(2,'Turista','/turista','Usuario registrado','no','2021-04-23 02:25:46','2021-04-23 02:25:46');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state_publications`
--

DROP TABLE IF EXISTS `state_publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state_publications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('PUBLICADO','NO PUBLICADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state_publications`
--

LOCK TABLES `state_publications` WRITE;
/*!40000 ALTER TABLE `state_publications` DISABLE KEYS */;
INSERT INTO `state_publications` VALUES (1,'PUBLICADO','2021-04-23 02:25:46','2021-04-23 02:25:46'),(2,'NO PUBLICADO','2021-04-23 02:25:46','2021-04-23 02:25:46');
/*!40000 ALTER TABLE `state_publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tuorist_routes`
--

DROP TABLE IF EXISTS `tuorist_routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tuorist_routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_travel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_principal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modul_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tuorist_routes_name_unique` (`name`),
  KEY `tuorist_routes_modul_id_foreign` (`modul_id`),
  CONSTRAINT `tuorist_routes_modul_id_foreign` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tuorist_routes`
--

LOCK TABLES `tuorist_routes` WRITE;
/*!40000 ALTER TABLE `tuorist_routes` DISABLE KEYS */;
INSERT INTO `tuorist_routes` VALUES (1,'Ruta a paris en tocaima','20 horas','rutas_turisticas/fQyw9ZRBaCgDwrAc8DkjVVDIrp4XXw1bT2jFnyVe.jpg','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido. También es una composición de caracteres imprimibles generados por un editado','49f7fd3f-24ad-4eb1-9d38-22f736dfd7eb',3,'2021-04-23 03:01:43','2021-04-24 08:34:17'),(2,'Ruta de tocaima','15 horas','rutas_turisticas/xVeNKx2pzCKsPAGQ25ftxw6JSCVEXgnnfoG8Yl1t.jpg','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido.','1d62ef51-555f-4777-bb1a-fa36da14c6ab',3,'2021-04-23 15:45:21','2021-04-23 15:45:21'),(3,'Ruta a paris editada','14 horas','rutas_turisticas/OaZOcc4dKpPpxaqpoJ66bKKqpo8uu8qZ1kLHcDv3.jpg','Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido. También es una composición de caracteres imprimibles generados por un','49f7fd3f-24ad-4eb1-9d38-22f736dfd7eb',3,'2021-04-24 08:31:02','2021-04-24 08:31:02'),(4,'Ruta numero 4 sitios x','15 horas','rutas_turisticas/H9NMiK9rDU8O59QAbZpgm5QUIgKf1WNHpB8UrvRK.jpg','y en ocasiones centro cultural para ancianos comunitarios, al lugar en una comunidad destinado a mantener actividades que promueven la cultura entre sus habitantes.','2f4372e4-7995-4806-beac-f510c2faf67d',3,'2021-04-26 05:50:06','2021-04-26 05:50:06');
/*!40000 ALTER TABLE `tuorist_routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Juan Gutierrez','$2y$10$QOtUAKWlKd7LnJwJ.uHi4eIGnxCrpw6Jh7CrarRRKxenYutB/nOAy','administrador@gmail.com','ACTIVO','2021-04-23 02:25:46',NULL,'2021-04-23 02:25:46','2021-04-23 02:25:46'),(2,'Sebastian Piñeros','$2y$10$.cmBqnoZ4GIXgkRiB3jVA.ODENqip/Wp4Uvpm5xnqA2Ym8.ufARpC','sebastianpiñeros@gmail.com','ACTIVO','2021-04-23 02:25:46',NULL,'2021-04-23 02:25:46','2021-04-23 02:25:46');
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

-- Dump completed on 2021-04-26 19:42:12
