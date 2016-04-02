-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: genieLogiciel
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Current Database: `genieLogiciel`
--

/*!40000 DROP DATABASE IF EXISTS `genieLogiciel`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `genieLogiciel` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `genieLogiciel`;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  PRIMARY KEY (`idCommande`),
  UNIQUE KEY `commande_idCommande_uindex` (`idCommande`),
  UNIQUE KEY `idUser_UNIQUE` (`idUser`),
  CONSTRAINT `fk_commande_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande_produit`
--

DROP TABLE IF EXISTS `commande_produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande_produit` (
  `idProduit` int(11) NOT NULL DEFAULT '0',
  `idCommande` int(11) NOT NULL DEFAULT '0',
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idCommande`),
  KEY `fk_commandeProduit_commande` (`idCommande`),
  CONSTRAINT `fk_commandeProduit_commande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_commandeProduit_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande_produit`
--

LOCK TABLES `commande_produit` WRITE;
/*!40000 ALTER TABLE `commande_produit` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande_produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domaine` (
  `idDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `libelleDomaine` varchar(25) NOT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaine`
--

LOCK TABLES `domaine` WRITE;
/*!40000 ALTER TABLE `domaine` DISABLE KEYS */;
INSERT INTO `domaine` VALUES (1,'audio'),(2,'video'),(3,'lecture'),(4,'electromenager'),(5,'electronique'),(6,'autre');
/*!40000 ALTER TABLE `domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `droit`
--

DROP TABLE IF EXISTS `droit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `droit` (
  `idDroit` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`idDroit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `droit`
--

LOCK TABLES `droit` WRITE;
/*!40000 ALTER TABLE `droit` DISABLE KEYS */;
INSERT INTO `droit` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `droit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imageproduit`
--

DROP TABLE IF EXISTS `imageproduit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imageproduit` (
  `idImageProduit` int(11) NOT NULL AUTO_INCREMENT,
  `cheminImage` varchar(255) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idImageProduit`),
  KEY `fk_imageProduit_produit` (`idProduit`),
  CONSTRAINT `fk_imageProduit_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageproduit`
--

LOCK TABLES `imageproduit` WRITE;
/*!40000 ALTER TABLE `imageproduit` DISABLE KEYS */;
INSERT INTO `imageproduit` VALUES (1,'./back/images/Desert.jpg',1),(2,'./back/images/Koala.jpg',1),(4,'./back/images/058313496be40e31b507f602ffdd229d.jpg',3),(7,'./back/images/0677cc764bc0561826374db2a71ad4ef.jpg',6),(8,'./back/images/52a798ff5fab64046e5572ce46083344.png',7);
/*!40000 ALTER TABLE `imageproduit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `input_meta`
--

DROP TABLE IF EXISTS `input_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `input_meta` (
  `id_input_meta` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `required` enum('true','false') DEFAULT 'false',
  `table_meta` varchar(45) DEFAULT NULL,
  `label` varchar(45) DEFAULT NULL,
  `page` varchar(45) DEFAULT NULL,
  `placeholder` varchar(45) DEFAULT NULL,
  `option_value` varchar(45) DEFAULT NULL,
  `option_input` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_input_meta`),
  UNIQUE KEY `id_UNIQUE` (`id_input_meta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `input_meta`
--

LOCK TABLES `input_meta` WRITE;
/*!40000 ALTER TABLE `input_meta` DISABLE KEYS */;
INSERT INTO `input_meta` VALUES (1,'produit','produit','form-control','select','true','produit','Produit à modifier','modif',NULL,'idProduit','nomProduit'),(2,'stock','stock','form-control','number','true',NULL,'Stock','modif','',NULL,NULL),(3,'prix','prix','form-control','text','true',NULL,'Prix','modif','',NULL,NULL),(4,'description','description','form-control','textarea','true',NULL,'Description','modif','',NULL,NULL);
/*!40000 ALTER TABLE `input_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(25) NOT NULL,
  `prixProduit` float NOT NULL,
  `description` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `fk_produit_theme` (`idTheme`),
  CONSTRAINT `fk_produit_theme` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,'test',5.99,'test de produit',5,1),(3,'Test produit 2',600,'',10,8),(6,'Test produit 3',200,'test',0,7),(7,'Chat',520,'test',52,2);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit_tag`
--

DROP TABLE IF EXISTS `produit_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit_tag` (
  `idProduit` int(11) NOT NULL DEFAULT '0',
  `idTag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProduit`,`idTag`),
  KEY `fk_produitTag_tag` (`idTag`),
  CONSTRAINT `fk_produitTag_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_produitTag_tag` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit_tag`
--

LOCK TABLES `produit_tag` WRITE;
/*!40000 ALTER TABLE `produit_tag` DISABLE KEYS */;
INSERT INTO `produit_tag` VALUES (1,1);
/*!40000 ALTER TABLE `produit_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTag` varchar(25) DEFAULT NULL,
  `idTypeTag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTag`),
  KEY `fk_tag_typeTag` (`idTypeTag`),
  CONSTRAINT `fk_tag_typeTag` FOREIGN KEY (`idTypeTag`) REFERENCES `typetag` (`idTypeTag`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'test_tag',3);
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme` (
  `idTheme` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTheme` varchar(25) NOT NULL,
  `idDomaine` int(11) NOT NULL,
  PRIMARY KEY (`idTheme`),
  KEY `fk_theme_domaine` (`idDomaine`),
  CONSTRAINT `fk_theme_domaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme`
--

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` VALUES (1,'cd',1),(2,'dvd',2),(3,'blu-ray',2),(4,'roman',3),(5,'e-book',3),(6,'nouvelle',3),(7,'ordinateur',5),(8,'appareil photo',5),(9,'lave linge',4),(10,'aspirateur',4);
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typetag`
--

DROP TABLE IF EXISTS `typetag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typetag` (
  `idTypeTag` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTypeTag` varchar(25) NOT NULL,
  PRIMARY KEY (`idTypeTag`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typetag`
--

LOCK TABLES `typetag` WRITE;
/*!40000 ALTER TABLE `typetag` DISABLE KEYS */;
INSERT INTO `typetag` VALUES (1,'age'),(2,'sexe'),(3,'support');
/*!40000 ALTER TABLE `typetag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeuser`
--

DROP TABLE IF EXISTS `typeuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeuser` (
  `idTypeUser` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  `idDroit` int(11) NOT NULL,
  PRIMARY KEY (`idTypeUser`),
  KEY `fk_typeUser_droit` (`idDroit`),
  CONSTRAINT `fk_typeUser_droit` FOREIGN KEY (`idDroit`) REFERENCES `droit` (`idDroit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeuser`
--

LOCK TABLES `typeuser` WRITE;
/*!40000 ALTER TABLE `typeuser` DISABLE KEYS */;
INSERT INTO `typeuser` VALUES (1,'admin',1),(2,'user',2);
/*!40000 ALTER TABLE `typeuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `idTypeUser` int(11) NOT NULL DEFAULT '2',
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_user_typeUser` (`idTypeUser`),
  CONSTRAINT `fk_user_typeUser` FOREIGN KEY (`idTypeUser`) REFERENCES `typeuser` (`idTypeUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'rayms','$2y$10$pySPADvrGAGoq2Pom2h/meZkcCDwQdQSARgMU8etIim9aEr.4jOwy',1,'Laffuge','Rémy'),(2,'admin','$2y$10$pySPADvrGAGoq2Pom2h/meZkcCDwQdQSARgMU8etIim9aEr.4jOwy',1,'admin','admin'),(3,'abon','$2y$10$qpaNvKclSzdgYoEnURG3cu51.AJ9Xi3gfbO9stUxKPxldSeXHf9KK',1,'Bon','Adrien'),(4,'Boby','$2y$10$8i8FoQIFuqgIjT6oWFP76e6emzEQVZOv7flT/Wcp/.onRIV6T5al6',2,'Boby','Lenon');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-02 15:16:01
