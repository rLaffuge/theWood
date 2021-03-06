-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Avril 2016 à 15:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `genielogiciel`
--
CREATE DATABASE IF NOT EXISTS `genielogiciel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `genielogiciel`;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `prix` double NOT NULL,
  `dateCommande` date NOT NULL,
  PRIMARY KEY (`idCommande`),
  UNIQUE KEY `commande_idCommande_uindex` (`idCommande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idUser`, `prix`, `dateCommande`) VALUES
(10, 5, 12040, '2016-04-03');

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE IF NOT EXISTS `commande_produit` (
  `idProduit` int(11) NOT NULL DEFAULT '0',
  `idCommande` int(11) NOT NULL DEFAULT '0',
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`,`idCommande`),
  KEY `fk_commandeProduit_commande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_produit`
--

INSERT INTO `commande_produit` (`idProduit`, `idCommande`, `quantite`) VALUES
(3, 10, 1),
(7, 10, 22);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `idDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `libelleDomaine` varchar(25) NOT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`idDomaine`, `libelleDomaine`) VALUES
(1, 'audio'),
(2, 'video'),
(3, 'lecture'),
(4, 'electromenager'),
(5, 'electronique'),
(6, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `idDroit` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`idDroit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`idDroit`, `niveau`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `imageproduit`
--

CREATE TABLE IF NOT EXISTS `imageproduit` (
  `idImageProduit` int(11) NOT NULL AUTO_INCREMENT,
  `cheminImage` varchar(255) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idImageProduit`),
  KEY `fk_imageProduit_produit` (`idProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `imageproduit`
--

INSERT INTO `imageproduit` (`idImageProduit`, `cheminImage`, `idProduit`) VALUES
(1, './back/images/Desert.jpg', 1),
(2, './back/images/Koala.jpg', 1),
(4, './back/images/058313496be40e31b507f602ffdd229d.jpg', 3),
(7, './back/images/0677cc764bc0561826374db2a71ad4ef.jpg', 6),
(8, './back/images/52a798ff5fab64046e5572ce46083344.png', 7);

-- --------------------------------------------------------

--
-- Structure de la table `input_meta`
--

CREATE TABLE IF NOT EXISTS `input_meta` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `input_meta`
--

INSERT INTO `input_meta` (`id_input_meta`, `id`, `name`, `class`, `type`, `required`, `table_meta`, `label`, `page`, `placeholder`, `option_value`, `option_input`) VALUES
(1, 'produit', 'produit', 'form-control', 'select', 'true', 'produit', 'Produit à modifier', 'modif', NULL, 'idProduit', 'nomProduit'),
(2, 'stock', 'stock', 'form-control', 'number', 'true', NULL, 'Stock', 'modif', '', NULL, NULL),
(3, 'prix', 'prix', 'form-control', 'text', 'true', NULL, 'Prix', 'modif', '', NULL, NULL),
(4, 'description', 'description', 'form-control', 'textarea', 'true', NULL, 'Description', 'modif', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(25) NOT NULL,
  `prixProduit` float NOT NULL,
  `description` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `fk_produit_theme` (`idTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `prixProduit`, `description`, `stock`, `idTheme`) VALUES
(1, 'test', 5.99, 'test de produit', 10, 1),
(3, 'Test produit 2', 600, '', 5, 8),
(6, 'Test produit 3', 200, 'test', 0, 7),
(7, 'Chat', 520, 'test', 50, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit_tag`
--

CREATE TABLE IF NOT EXISTS `produit_tag` (
  `idProduit` int(11) NOT NULL DEFAULT '0',
  `idTag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProduit`,`idTag`),
  KEY `fk_produitTag_tag` (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit_tag`
--

INSERT INTO `produit_tag` (`idProduit`, `idTag`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTag` varchar(25) DEFAULT NULL,
  `idTypeTag` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTag`),
  KEY `fk_tag_typeTag` (`idTypeTag`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`idTag`, `libelleTag`, `idTypeTag`) VALUES
(1, 'test_tag', 3);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `idTheme` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTheme` varchar(25) NOT NULL,
  `idDomaine` int(11) NOT NULL,
  PRIMARY KEY (`idTheme`),
  KEY `fk_theme_domaine` (`idDomaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`idTheme`, `libelleTheme`, `idDomaine`) VALUES
(1, 'cd', 1),
(2, 'dvd', 2),
(3, 'blu-ray', 2),
(4, 'roman', 3),
(5, 'e-book', 3),
(6, 'nouvelle', 3),
(7, 'ordinateur', 5),
(8, 'appareil photo', 5),
(9, 'lave linge', 4),
(10, 'aspirateur', 4);

-- --------------------------------------------------------

--
-- Structure de la table `typetag`
--

CREATE TABLE IF NOT EXISTS `typetag` (
  `idTypeTag` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTypeTag` varchar(25) NOT NULL,
  PRIMARY KEY (`idTypeTag`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `typetag`
--

INSERT INTO `typetag` (`idTypeTag`, `libelleTypeTag`) VALUES
(1, 'age'),
(2, 'sexe'),
(3, 'support');

-- --------------------------------------------------------

--
-- Structure de la table `typeuser`
--

CREATE TABLE IF NOT EXISTS `typeuser` (
  `idTypeUser` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  `idDroit` int(11) NOT NULL,
  PRIMARY KEY (`idTypeUser`),
  KEY `fk_typeUser_droit` (`idDroit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typeuser`
--

INSERT INTO `typeuser` (`idTypeUser`, `libelle`, `idDroit`) VALUES
(1, 'admin', 1),
(2, 'user', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `idTypeUser` int(11) NOT NULL DEFAULT '2',
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_user_typeUser` (`idTypeUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `mdp`, `idTypeUser`, `nom`, `prenom`) VALUES
(1, 'rayms', '$2y$10$pySPADvrGAGoq2Pom2h/meZkcCDwQdQSARgMU8etIim9aEr.4jOwy', 1, 'Laffuge', 'Rémy'),
(6, 'Admin', '$2y$10$WRaAR9oDmxNLFYnWGRNNGebX31F8ChYsOdVw9.iDOjYwd1gTza9u2', 1, 'Admin', 'Admin'),
(5, 'Utilisateur', '$2y$10$jpJgGUmBlMfYuIBFAaL4KOvbmDuNBtU7xEKasRYcn/vtGJxQU6P7G', 2, 'User', 'User');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `fk_commandeProduit_commande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commandeProduit_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `imageproduit`
--
ALTER TABLE `imageproduit`
  ADD CONSTRAINT `fk_imageProduit_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_theme` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  ADD CONSTRAINT `fk_produitTag_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produitTag_tag` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `fk_tag_typeTag` FOREIGN KEY (`idTypeTag`) REFERENCES `typetag` (`idTypeTag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `fk_theme_domaine` FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `typeuser`
--
ALTER TABLE `typeuser`
  ADD CONSTRAINT `fk_typeUser_droit` FOREIGN KEY (`idDroit`) REFERENCES `droit` (`idDroit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_typeUser` FOREIGN KEY (`idTypeUser`) REFERENCES `typeuser` (`idTypeUser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
