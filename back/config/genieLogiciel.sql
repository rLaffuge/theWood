-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 13 Février 2016 à 14:48
-- Version du serveur :  5.5.44-MariaDB
-- Version de PHP :  5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `genieLogiciel`
--
CREATE DATABASE IF NOT EXISTS `genieLogiciel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `genieLogiciel`;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE IF NOT EXISTS `commande_produit` (
  `idProduit` int(11) NOT NULL DEFAULT '0',
  `idCommande` int(11) NOT NULL DEFAULT '0',
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `idDomaine` int(11) NOT NULL,
  `libelleDomaine` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `idDroit` int(11) NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `idImageProduit` int(11) NOT NULL,
  `cheminImage` varchar(25) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `imageproduit`
--

INSERT INTO `imageproduit` (`idImageProduit`, `cheminImage`, `idProduit`) VALUES
(1, './back/images/Desert.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(25) NOT NULL,
  `prixProduit` float NOT NULL,
  `description` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `prixProduit`, `description`, `stock`, `idTheme`) VALUES
(1, 'test', 5.99, 'test de produit', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit_tag`
--

CREATE TABLE IF NOT EXISTS `produit_tag` (
  `idProduit` int(11) NOT NULL DEFAULT '0',
  `idTag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `idTag` int(11) NOT NULL,
  `libelleTag` varchar(25) DEFAULT NULL,
  `idTypeTag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `idTheme` int(11) NOT NULL,
  `libelleTheme` varchar(25) NOT NULL,
  `idDomaine` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
  `idTypeTag` int(11) NOT NULL,
  `libelleTypeTag` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `idTypeUser` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `idDroit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `idUser` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `idTypeUser` int(11) NOT NULL DEFAULT '2',
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `mdp`, `idTypeUser`, `nom`, `prenom`) VALUES
(1, 'rayms', '$2y$10$pySPADvrGAGoq2Pom2h/meZkcCDwQdQSARgMU8etIim9aEr.4jOwy', 1, 'Laffuge', 'Rémy'),
(2, 'admin', '$2y$10$pySPADvrGAGoq2Pom2h/meZkcCDwQdQSARgMU8etIim9aEr.4jOwy', 1, 'admin', 'admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD UNIQUE KEY `commande_idCommande_uindex` (`idCommande`),
  ADD UNIQUE KEY `idUser_UNIQUE` (`idUser`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`idProduit`,`idCommande`),
  ADD KEY `fk_commandeProduit_commande` (`idCommande`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`idDomaine`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`idDroit`);

--
-- Index pour la table `imageproduit`
--
ALTER TABLE `imageproduit`
  ADD PRIMARY KEY (`idImageProduit`),
  ADD KEY `fk_imageProduit_produit` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `fk_produit_theme` (`idTheme`);

--
-- Index pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  ADD PRIMARY KEY (`idProduit`,`idTag`),
  ADD KEY `fk_produitTag_tag` (`idTag`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTag`),
  ADD KEY `fk_tag_typeTag` (`idTypeTag`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`idTheme`),
  ADD KEY `fk_theme_domaine` (`idDomaine`);

--
-- Index pour la table `typetag`
--
ALTER TABLE `typetag`
  ADD PRIMARY KEY (`idTypeTag`);

--
-- Index pour la table `typeuser`
--
ALTER TABLE `typeuser`
  ADD PRIMARY KEY (`idTypeUser`),
  ADD KEY `fk_typeUser_droit` (`idDroit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD KEY `fk_user_typeUser` (`idTypeUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `idDomaine` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `idDroit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `imageproduit`
--
ALTER TABLE `imageproduit`
  MODIFY `idImageProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `idTheme` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `typetag`
--
ALTER TABLE `typetag`
  MODIFY `idTypeTag` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `typeuser`
--
ALTER TABLE `typeuser`
  MODIFY `idTypeUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `fk_produitTag_tag` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produitTag_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

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
