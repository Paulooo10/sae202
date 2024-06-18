-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sae202
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-0+deb10u2

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
-- Table structure for table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annonce` (
  `annonce_id` int(3) NOT NULL AUTO_INCREMENT,
  `annonce_photo` varchar(255) DEFAULT NULL,
  `annonce_nom` char(100) NOT NULL,
  `annonce_type_demande` char(20) NOT NULL,
  `annonce_description` varchar(500) NOT NULL,
  `annonce_likes` int(3) NOT NULL DEFAULT 0,
  `annonce_dislikes` int(3) NOT NULL DEFAULT 0,
  `annonce_date_publi` date NOT NULL,
  `_utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`annonce_id`),
  KEY `_utilisateur_id` (`_utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonce`
--

LOCK TABLES `annonce` WRITE;
/*!40000 ALTER TABLE `annonce` DISABLE KEYS */;
INSERT INTO `annonce` VALUES (10,'666ac63a75498.jpg','recherche un jardin qui va etre supprime','jardin','je me desintègreuh',0,0,'2024-06-13',0),(9,'666ac63a75498.jpg','recherche un jardin qui va etre supprime','jardin','je me desintègreuh',0,0,'2024-06-13',0),(5,'666aaca4d5705.jpg','don de pelle','don','je donne une pelle enfaitttt',0,0,'2024-06-13',1),(8,'666b757cdbb2f.jpg','recherche un jardin qui va etre supprime','jardin','je me desintègreuhhhh',0,0,'2024-06-13',0);
/*!40000 ALTER TABLE `annonce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jardin`
--

DROP TABLE IF EXISTS `jardin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jardin` (
  `jardin_id` int(3) NOT NULL AUTO_INCREMENT,
  `jardin_nom` char(30) NOT NULL,
  `jardin_cp` char(255) NOT NULL,
  `jardin_ville` char(100) NOT NULL,
  `jardin_rue` char(100) NOT NULL,
  `jardin_photo1` char(255) NOT NULL,
  `jardin_photo2` char(255) NOT NULL,
  `jardin_photo3` char(255) NOT NULL,
  `jardin_surface` char(20) NOT NULL,
  `jardin_condition_partage` char(100) NOT NULL,
  `jardin_description` char(255) NOT NULL,
  `jardin_equipements` tinyint(1) NOT NULL,
  `jardin_entretien` tinyint(1) NOT NULL,
  `jardin_date_publication` date NOT NULL,
  `jardin_point_eau` tinyint(1) NOT NULL,
  `jardin_nb_parcelles` int(11) NOT NULL,
  `jardin_dislikes` int(3) DEFAULT 0,
  `jardin_likes` int(3) NOT NULL DEFAULT 0,
  `_utilisateur_id` int(3) NOT NULL,
  PRIMARY KEY (`jardin_id`),
  KEY `_uilisateur_id` (`_utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jardin`
--

LOCK TABLES `jardin` WRITE;
/*!40000 ALTER TABLE `jardin` DISABLE KEYS */;
INSERT INTO `jardin` VALUES (11,'Jardin de test','coucou','coucou','coucou','666b6c1c469c0.jpg','','','25','0','quoicoubeh',1,0,'2024-06-13',1,16,0,0,1),(12,'jardin de admin','12345','Apagnan','6 rue de quoicoubeh','666ae35a336a4.jpg','666ae35a341a4.png','','25','0','coucou mon jardin est bien',0,1,'2024-06-13',1,11,0,0,0);
/*!40000 ALTER TABLE `jardin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelles`
--

DROP TABLE IF EXISTS `parcelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelles` (
  `parcelle_id` int(100) NOT NULL AUTO_INCREMENT,
  `parcelle_etat` tinyint(1) NOT NULL DEFAULT 0,
  `_parcelle_locataire_id` int(100) DEFAULT NULL,
  `_parcelle_proprietaire_id` int(100) NOT NULL,
  `_parcelle_jardin_id` int(100) NOT NULL,
  PRIMARY KEY (`parcelle_id`),
  UNIQUE KEY `_parcelle_locataire_id` (`_parcelle_locataire_id`),
  KEY `_parcelle_proprietaire_id` (`_parcelle_proprietaire_id`) USING BTREE,
  KEY `_parcelle_jardin_id` (`_parcelle_jardin_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelles`
--

LOCK TABLES `parcelles` WRITE;
/*!40000 ALTER TABLE `parcelles` DISABLE KEYS */;
INSERT INTO `parcelles` VALUES (74,1,1,0,12),(73,0,NULL,0,12),(72,0,NULL,0,12),(71,0,NULL,0,12),(70,0,NULL,1,11),(69,0,NULL,1,11),(68,0,NULL,1,11),(53,0,NULL,1,11),(52,0,NULL,1,11),(51,0,NULL,1,11),(50,0,NULL,1,11),(49,0,NULL,1,11),(48,0,NULL,1,11),(47,0,NULL,1,11),(46,0,NULL,1,11),(45,0,NULL,1,11),(44,0,NULL,1,11),(43,0,NULL,1,11),(42,0,NULL,1,11),(61,0,NULL,0,12),(62,0,NULL,0,12),(63,0,NULL,0,12),(64,0,NULL,0,12),(65,0,NULL,0,12),(66,0,NULL,0,12),(67,0,NULL,0,12),(75,0,NULL,1,11);
/*!40000 ALTER TABLE `parcelles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `utilisateur_id` int(3) NOT NULL AUTO_INCREMENT,
  `utilisateur_pseudo` char(20) NOT NULL,
  `utilisateur_prenom` char(20) NOT NULL,
  `utilisateur_nom` char(20) NOT NULL,
  `utilisateur_mail` char(255) NOT NULL,
  `utilisateur_note` int(1) DEFAULT NULL,
  `utilisateur_photo` varchar(255) DEFAULT NULL,
  `utilisateur_ville` char(20) NOT NULL,
  `utilisateur_mdp` varchar(255) NOT NULL,
  `utilisateur_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'gabmlld','gabrieleuuuh','maillard','g@g.com',4,'6668b4d27b891.jpg','Rosières','123',1),(5,'suppri','coucou','moi','supprimez@moi.fr',NULL,'666b5872e7fb1.png','supprimeville','memoi',0),(0,'admin','admin','admin','admin@mmi23c12.sae202.ovh',5,NULL,'Troyes','dnb2hzu1hkz!cgk!CXW',1);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-13 23:18:04
