-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: emensawerbeseite
-- ------------------------------------------------------
-- Server version	10.9.3-MariaDB

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
-- Table structure for table `allergen`
--

DROP TABLE IF EXISTS `allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allergen` (
  `code` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typ` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'allergen',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allergen`
--

LOCK TABLES `allergen` WRITE;
INSERT INTO `allergen` VALUES
('a','Getreideprodukte','Getreide (Gluten)'),
('a1','Weizen','Allergen'),
('a2','Roggen','Allergen'),
('a3','Gerste','Allergen'),
('a4','Dinkel','Allergen'),
('a5','Hafer','Allergen'),
('a6','Kamut','Allergen'),
('b','Fisch','Allergen'),
('c','Krebstiere','Allergen'),
('d','Schwefeldioxid/Sulfit','Allergen'),
('e','Sellerie','Allergen'),
('f','Milch und Laktose','Allergen'),
('f1','Butter','Allergen'),
('f2','Käse','Allergen'),
('f3','Margarine','Allergen'),
('g','Sesam','Allergen'),
('h','Nüsse','Allergen'),
('h1','Mandeln','Allergen'),
('h2','Haselnüsse','Allergen'),
('h3','Walnüsse','Allergen'),
('i','Erdnüsse','Allergen');
UNLOCK TABLES;

--
-- Table structure for table `benutzer`
--

DROP TABLE IF EXISTS `benutzer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `benutzer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwort` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `anzahlfehler` int(11) NOT NULL,
  `anzahlanmeldungen` int(11) NOT NULL,
  `letzteanmeldung` datetime DEFAULT NULL,
  `letzterfehler` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benutzer`
--

LOCK TABLES `benutzer` WRITE;
INSERT INTO `benutzer` VALUES
(1,'admin','admin@emensa.example','9c8c521b0f53104dc2382e3386a73aaaaba1bf95',1,0,9,'2022-12-22 14:22:40','2022-12-15 08:17:55'),
(2,'Jojo','Jojo@emensa.example','476289ea5c262aaa47474d090c7daa22f69ff5e9',0,0,1,'2022-12-22 14:29:26',NULL);
UNLOCK TABLES;

--
-- Table structure for table `besucherzaehler`
--

DROP TABLE IF EXISTS `besucherzaehler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `besucherzaehler` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `access_page` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_counter` bigint(20) DEFAULT NULL,
  `access_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `access_page` (`access_page`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `besucherzaehler`
--

LOCK TABLES `besucherzaehler` WRITE;
INSERT INTO `besucherzaehler` VALUES
(1,'E-Mensa Webseite',88,'2022-11-25 20:08:17');
UNLOCK TABLES;

--
-- Table structure for table `bewertungen`
--

DROP TABLE IF EXISTS `bewertungen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bewertungen` (
  `bewertungs_id` bigint(20) NOT NULL,
  `bemerkung` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bewertungszeitpunkt` datetime DEFAULT NULL,
  `hervorgehoben` tinyint(1) NOT NULL DEFAULT 0,
  `sternebwertung` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gericht_id` bigint(20) NOT NULL,
  UNIQUE KEY `bewertungen_index` (`bewertungs_id`,`gericht_id`),
  KEY `bewgericht_id_ref_gericht_id` (`gericht_id`),
  CONSTRAINT `bewerungen_id_ref_benutzer_id` FOREIGN KEY (`bewertungs_id`) REFERENCES `benutzer` (`id`),
  CONSTRAINT `bewgericht_id_ref_gericht_id` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bewertungen`
--

LOCK TABLES `bewertungen` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `gericht`
--

DROP TABLE IF EXISTS `gericht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht` (
  `id` bigint(20) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschreibung` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL,
  `erfasst_am` date NOT NULL,
  `vegetarisch` tinyint(1) NOT NULL DEFAULT 0,
  `vegan` tinyint(1) NOT NULL DEFAULT 0,
  `preis_intern` double NOT NULL CHECK (`preis_intern` > 0),
  `preis_extern` double NOT NULL CHECK (`preis_intern` <= `preis_extern`),
  `bildname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht`
--

LOCK TABLES `gericht` WRITE;
INSERT INTO `gericht` VALUES
(1,'Bratkartoffeln mit Speck und Zwiebeln','Kartoffeln mit Zwiebeln und gut Speck','2020-08-25',0,0,2.3,4,'01_bratkartoffel.jpg'),
(3,'Bratkartoffeln mit Zwiebeln','Kartoffeln mit Zwiebeln und ohne Speck','2020-08-25',1,1,2.3,4,'03_bratkartoffel.jpg'),
(4,'Grilltofu','Fein gewürzt und mariniert','2020-08-25',1,1,2.5,4.5,'04_tofu.jpg'),
(5,'Lasagne','Klassisch mit Bolognesesoße und Creme Fraiche','2020-08-24',0,0,2.5,4.5,NULL),
(6,'Lasagne vegetarisch','Klassisch mit Sojagranulatsoße und Creme Fraiche','2020-08-24',1,0,2.5,4.5,'06_lasagne.jpg'),
(7,'Hackbraten','Nicht nur für Hacker','2020-08-25',0,0,2.5,4,NULL),
(8,'Gemüsepfanne','Gesundes aus der Region, deftig angebraten','2020-08-25',1,1,2.3,4,NULL),
(9,'Hühnersuppe','Suppenhuhn trifft Petersilie','2020-08-25',0,0,2,3.5,'09_suppe.jpg'),
(10,'Forellenfilet','mit Kartoffeln und Dilldip','2020-08-22',0,0,3.8,5,'10_forelle.jpg'),
(11,'Kartoffel-Lauch-Suppe','der klassische Bauchwärmer mit frischen Kräutern','2020-08-22',1,0,2,3,'11_soup.jpg'),
(12,'Kassler mit Rosmarinkartoffeln','dazu Salat und Senf','2020-08-23',0,0,3.8,5.2,'12_kassler.jpg'),
(13,'Drei Reibekuchen mit Apfelmus','grob geriebene Kartoffeln aus der Region','2020-08-23',1,0,2.5,4.5,'13_reibekuchen.jpg'),
(14,'Pilzpfanne','die legendäre Pfanne aus Pilzen der Saison','2020-08-23',1,0,3,5,NULL),
(15,'Pilzpfanne vegan','die legendäre Pfanne aus Pilzen der Saison ohne Käse','2020-08-24',1,1,3,5,'15_pilze.jpg'),
(16,'Käsebrötchen','schmeckt vor und nach dem Essen','2020-08-24',1,0,1,1.5,NULL),
(17,'Schinkenbrötchen','schmeckt auch ohne Hunger','2020-08-25',0,0,1.25,1.75,'17_broetchen.jpg'),
(18,'Tomatenbrötchen','mit Schnittlauch und Zwiebeln','2020-08-25',1,1,1,1.5,NULL),
(19,'Mousse au Chocolat','sahnige schweizer Schokolade rundet jedes Essen ab','2020-08-26',1,0,1.25,1.75,'19_mousse.jpg'),
(20,'Suppenkreation á la Chef','was verschafft werden muss, gut und günstig','2020-08-26',0,0,0.5,0.9,'20_suppe.jpg'),
(21,'Currywurst mit Pommes','Wie frisch aus Berlin','2022-11-10',0,0,2,2.5,NULL);
UNLOCK TABLES;

--
-- Table structure for table `gericht_hat_allergen`
--

DROP TABLE IF EXISTS `gericht_hat_allergen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht_hat_allergen` (
  `code` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gericht_id` bigint(20) NOT NULL,
  KEY `gha_id_Ref_gericht_id` (`gericht_id`),
  CONSTRAINT `gha_id_Ref_gericht_id` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_allergen`
--

LOCK TABLES `gericht_hat_allergen` WRITE;
INSERT INTO `gericht_hat_allergen` VALUES
('h',1),
('a3',1),
('a4',1),
('f1',3),
('a6',3),
('i',3),
('a3',4),
('f1',4),
('a4',4),
('h3',4),
('d',6),
('h1',7),
('a2',7),
('h3',7),
('c',7),
('a3',8),
('h3',10),
('d',10),
('f',10),
('f2',12),
('h1',12),
('a5',12),
('c',1),
('a2',9),
('i',14),
('f1',1),
('a1',15),
('a4',15),
('i',15),
('f3',15),
('h3',15);
UNLOCK TABLES;

--
-- Table structure for table `gericht_hat_kategorie`
--

DROP TABLE IF EXISTS `gericht_hat_kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gericht_hat_kategorie` (
  `gericht_id` bigint(20) NOT NULL,
  `kategorie_id` bigint(20) NOT NULL,
  PRIMARY KEY (`gericht_id`,`kategorie_id`),
  UNIQUE KEY `UC_gericht_kategorie` (`gericht_id`,`kategorie_id`),
  KEY `gha_id_Ref_kategorie_id` (`kategorie_id`),
  CONSTRAINT `FK_GerichtId` FOREIGN KEY (`gericht_id`) REFERENCES `gericht` (`id`) ON DELETE CASCADE,
  CONSTRAINT `gha_id_Ref_kategorie_id` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gericht_hat_kategorie`
--

LOCK TABLES `gericht_hat_kategorie` WRITE;
INSERT INTO `gericht_hat_kategorie` VALUES
(1,3),
(3,3),
(4,3),
(5,3),
(6,3),
(7,3),
(9,3),
(16,4),
(16,5),
(17,4),
(17,5),
(18,4),
(18,5),
(21,3);
UNLOCK TABLES;

--
-- Table structure for table `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorie` (
  `id` bigint(20) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eltern_id` bigint(20) DEFAULT NULL,
  `bildname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gha_code_Ref_allergen_code` (`eltern_id`),
  CONSTRAINT `gha_code_Ref_allergen_code` FOREIGN KEY (`eltern_id`) REFERENCES `kategorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorie`
--

LOCK TABLES `kategorie` WRITE;
INSERT INTO `kategorie` VALUES
(1,'Aktionen',NULL,'kat_aktionen.png'),
(2,'Menus',NULL,'kat_menu.gif'),
(3,'Hauptspeisen',2,'kat_menu_haupt.bmp'),
(4,'Vorspeisen',2,'kat_menu_vor.svg'),
(5,'Desserts',2,'kat_menu_dessert.pic'),
(6,'Mensastars',1,'kat_stars.tif'),
(7,'Erstiewoche',1,'kat_erties.jpg');
UNLOCK TABLES;

--
-- Temporary table structure for view `view_anmeldungen`
--

DROP TABLE IF EXISTS `view_anmeldungen`;
/*!50001 DROP VIEW IF EXISTS `view_anmeldungen`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_anmeldungen` AS SELECT
 1 AS `anzahlanmeldungen`,
  1 AS `name` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_kategoriegerichte_vegetarisch`
--

DROP TABLE IF EXISTS `view_kategoriegerichte_vegetarisch`;
/*!50001 DROP VIEW IF EXISTS `view_kategoriegerichte_vegetarisch`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_kategoriegerichte_vegetarisch` AS SELECT
 1 AS `Kategorie`,
  1 AS `Vegetarische_Gerichte` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_suppengerichte`
--

DROP TABLE IF EXISTS `view_suppengerichte`;
/*!50001 DROP VIEW IF EXISTS `view_suppengerichte`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_suppengerichte` AS SELECT
 1 AS `id`,
  1 AS `name`,
  1 AS `beschreibung`,
  1 AS `erfasst_am`,
  1 AS `vegetarisch`,
  1 AS `vegan`,
  1 AS `preis_intern`,
  1 AS `preis_extern`,
  1 AS `bildname` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `wunschgericht`
--

DROP TABLE IF EXISTS `wunschgericht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wunschgericht` (
  `nummer` bigint(20) NOT NULL AUTO_INCREMENT,
  `wunschgerichtname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unbenannt',
  `beschreibung` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Angabenlos',
  `erstellungsdatum` timestamp NOT NULL DEFAULT '1999-07-18 09:11:11',
  `erstellername` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anonym',
  `ersteller_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'lokidoki@gmail.com',
  PRIMARY KEY (`nummer`),
  UNIQUE KEY `ersteller_email` (`ersteller_email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wunschgericht`
--

LOCK TABLES `wunschgericht` WRITE;
INSERT INTO `wunschgericht` VALUES
(1,'joö','md öas','2022-11-23 23:00:00','Elisa','lokidoki@gmail.com'),
(4,'Sushi','jb','2022-11-24 07:45:05','fuo','schneiderrebecca20@gmail.com'),
(6,'Germknödel','Mh lecker','2022-11-24 11:59:03','Gundula Gause','Gundi@gmail.com'),
(7,'Kassler','Mit Sauerkraut','2022-11-24 11:59:56','Klaus Kleber','Klausi@gmail.com'),
(8,'Zwetschgen','oder Boskopäpfel','2022-11-24 12:01:18','Smokie Hummelsheim','Smokie@Alice.de'),
(9,'Poutine','Mit Pulled Pork','2022-11-25 19:09:14','Susanne','susanne@t-online.de');
UNLOCK TABLES;

--
-- Final view structure for view `view_anmeldungen`
--

/*!50001 DROP VIEW IF EXISTS `view_anmeldungen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_anmeldungen` AS select `benutzer`.`anzahlanmeldungen` AS `anzahlanmeldungen`,`benutzer`.`name` AS `name` from `benutzer` order by `benutzer`.`anzahlanmeldungen` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_kategoriegerichte_vegetarisch`
--

/*!50001 DROP VIEW IF EXISTS `view_kategoriegerichte_vegetarisch`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_kategoriegerichte_vegetarisch` AS select `kategorie`.`name` AS `Kategorie`,`gericht`.`name` AS `Vegetarische_Gerichte` from ((`kategorie` left join `gericht_hat_kategorie` on(`kategorie`.`id` = `gericht_hat_kategorie`.`kategorie_id`)) left join `gericht` on(`gericht_hat_kategorie`.`gericht_id` = `gericht`.`id`)) where `gericht`.`vegetarisch` = 1 or `gericht_hat_kategorie`.`kategorie_id` is null union select `kategorie`.`name` AS `Kategorie`,`gericht`.`name` AS `Vergetarische_Gerichte` from (`gericht` left join (`kategorie` left join `gericht_hat_kategorie` on(`kategorie`.`id` = `gericht_hat_kategorie`.`kategorie_id`)) on(`gericht_hat_kategorie`.`gericht_id` = `gericht`.`id`)) where `gericht`.`vegetarisch` = 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_suppengerichte`
--

/*!50001 DROP VIEW IF EXISTS `view_suppengerichte`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_suppengerichte` AS select `gericht`.`id` AS `id`,`gericht`.`name` AS `name`,`gericht`.`beschreibung` AS `beschreibung`,`gericht`.`erfasst_am` AS `erfasst_am`,`gericht`.`vegetarisch` AS `vegetarisch`,`gericht`.`vegan` AS `vegan`,`gericht`.`preis_intern` AS `preis_intern`,`gericht`.`preis_extern` AS `preis_extern`,`gericht`.`bildname` AS `bildname` from `gericht` where `gericht`.`name` like '%suppe%' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-22 16:11:35
