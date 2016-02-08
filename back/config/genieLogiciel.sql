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
  `idCommande` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `dateCommande` date DEFAULT NULL,
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
  `quantite` int(11) DEFAULT NULL,
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
  `idDomaine` int(11) NOT NULL,
  `libelleDomaine` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domaine`
--

LOCK TABLES `domaine` WRITE;
/*!40000 ALTER TABLE `domaine` DISABLE KEYS */;
INSERT INTO `domaine` VALUES (0,'autre'),(1,'audio'),(2,'video'),(3,'lecture'),(4,'electromenager'),(5,'electronique');
/*!40000 ALTER TABLE `domaine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `droit`
--

DROP TABLE IF EXISTS `droit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `droit` (
  `idDroit` int(11) NOT NULL,
  `niveau` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDroit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
-- Table structure for table `fiche`
--

DROP TABLE IF EXISTS `fiche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fiche` (
  `idFiche` int(11) NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFiche`),
  KEY `fk_fiche_produit` (`idProduit`),
  CONSTRAINT `fk_fiche_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fiche`
--

LOCK TABLES `fiche` WRITE;
/*!40000 ALTER TABLE `fiche` DISABLE KEYS */;
/*!40000 ALTER TABLE `fiche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imageproduit`
--

DROP TABLE IF EXISTS `imageproduit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imageproduit` (
  `idImageProduit` int(11) NOT NULL,
  `cheminImage` varchar(25) DEFAULT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `idFiche` int(11) DEFAULT NULL,
  PRIMARY KEY (`idImageProduit`),
  KEY `fk_imageProduit_produit` (`idProduit`),
  KEY `fk_imageProduit_fiche` (`idFiche`),
  CONSTRAINT `fk_imageProduit_fiche` FOREIGN KEY (`idFiche`) REFERENCES `fiche` (`idFiche`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_imageProduit_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageproduit`
--

LOCK TABLES `imageproduit` WRITE;
/*!40000 ALTER TABLE `imageproduit` DISABLE KEYS */;
/*!40000 ALTER TABLE `imageproduit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(25) DEFAULT NULL,
  `prixProduit` float DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `idTheme` int(11) DEFAULT NULL,
  `idFiche` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `fk_produit_theme` (`idTheme`),
  KEY `fk_produit_Fiche` (`idFiche`),
  CONSTRAINT `fk_produit_Fiche` FOREIGN KEY (`idFiche`) REFERENCES `fiche` (`idFiche`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_produit_theme` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
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
  CONSTRAINT `fk_produitTag_tag` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_produitTag_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit_tag`
--

LOCK TABLES `produit_tag` WRITE;
/*!40000 ALTER TABLE `produit_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `produit_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `libelleTag` varchar(25) DEFAULT NULL,
  `idTypeTag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTag`),
  KEY `fk_tag_typeTag` (`idTypeTag`),
  CONSTRAINT `fk_tag_typeTag` FOREIGN KEY (`idTypeTag`) REFERENCES `typetag` (`idTypeTag`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme` (
  `idTheme` int(11) NOT NULL,
  `libelleTheme` varchar(25) DEFAULT NULL,
  `idDomaine` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTheme`),
  KEY `fk_theme_domaine` (`idDomaine`),
  CONSTRAINT `fk_theme_domaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `idTypeTag` int(11) NOT NULL,
  `libelleTypeTag` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idTypeTag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `idTypeUser` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `idDroit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTypeUser`),
  KEY `fk_typeUser_droit` (`idDroit`),
  CONSTRAINT `fk_typeUser_droit` FOREIGN KEY (`idDroit`) REFERENCES `droit` (`idDroit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `mdp` varchar(1000) DEFAULT NULL,
  `idTypeUser` int(11) DEFAULT '2',
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idUser_UNIQUE` (`idUser`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_user_typeUser` (`idTypeUser`),
  CONSTRAINT `fk_user_typeUser` FOREIGN KEY (`idTypeUser`) REFERENCES `typeuser` (`idTypeUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'rayms','$2y$10$pySPADvrGAGoq2Pom2h/meZkcCDwQdQSARgMU8etIim9aEr.4jOwy',1,'Laffuge','Rémy'),(2,'admin','$2y$10$pySPADvrGAGoq2Pom2h/meZkcCDwQdQSARgMU8etIim9aEr.4jOwy',1,'admin','admin');
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

-- Dump completed on 2016-02-08 17:24:29
