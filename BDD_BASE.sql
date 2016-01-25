-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 25 Janvier 2016 à 18:26
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetentreprise`
--

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `code_domaine` tinyint(4) NOT NULL AUTO_INCREMENT,
  `intitule_domaine` varchar(200) NOT NULL,
  PRIMARY KEY (`code_domaine`),
  UNIQUE KEY `intitule_domaine` (`intitule_domaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`code_domaine`, `intitule_domaine`) VALUES
(2, 'Bureautique'),
(3, 'Dépannage'),
(4, 'Sécurité'),
(1, 'SSII');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` tinyint(4) NOT NULL AUTO_INCREMENT,
  `raison_sociale` varchar(150) NOT NULL,
  `siege_social` varchar(150) NOT NULL,
  PRIMARY KEY (`id_entreprise`),
  UNIQUE KEY `raison_sociale` (`raison_sociale`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `raison_sociale`, `siege_social`) VALUES
(1, 'Les Fans de Poulets', 'Oxford'),
(2, 'Le gras c''est la vie', 'Kaamelott');

-- --------------------------------------------------------

--
-- Structure de la table `presenterdomaine`
--

CREATE TABLE IF NOT EXISTS `presenterdomaine` (
  `code_entreprise` tinyint(4) NOT NULL,
  `code_domaine` tinyint(4) NOT NULL,
  PRIMARY KEY (`code_entreprise`,`code_domaine`),
  KEY `domaine_EXIST` (`code_domaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `presenterdomaine`
--

INSERT INTO `presenterdomaine` (`code_entreprise`, `code_domaine`) VALUES
(1, 2),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `code_produit` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`code_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`code_produit`, `libelle`, `prix`) VALUES
(1, 'Choucrôute', 4.5),
(2, 'Salami', 3.2);

-- --------------------------------------------------------

--
-- Structure de la table `proposerproduit`
--

CREATE TABLE IF NOT EXISTS `proposerproduit` (
  `code_entreprise` tinyint(4) NOT NULL,
  `code_produit` int(11) NOT NULL,
  PRIMARY KEY (`code_entreprise`,`code_produit`),
  KEY `produit_EXIST` (`code_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proposerproduit`
--

INSERT INTO `proposerproduit` (`code_entreprise`, `code_produit`) VALUES
(2, 1),
(2, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `presenterdomaine`
--
ALTER TABLE `presenterdomaine`
  ADD CONSTRAINT `domaine_EXIST` FOREIGN KEY (`code_domaine`) REFERENCES `domaine` (`code_domaine`),
  ADD CONSTRAINT `entreprise_EXIST` FOREIGN KEY (`code_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `proposerproduit`
--
ALTER TABLE `proposerproduit`
  ADD CONSTRAINT `produit_EXIST` FOREIGN KEY (`code_produit`) REFERENCES `produit` (`code_produit`),
  ADD CONSTRAINT `entreprise_EXISTEUH` FOREIGN KEY (`code_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
