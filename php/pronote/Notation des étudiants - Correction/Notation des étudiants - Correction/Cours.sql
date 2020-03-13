-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 28 Octobre 2015 à 14:47
-- Version du serveur: 5.5.44-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Cours`
--
CREATE DATABASE IF NOT EXISTS `Cours` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Cours`;

-- --------------------------------------------------------

--
-- Structure de la table `Etudiants`
--

CREATE TABLE IF NOT EXISTS `Etudiants` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Matieres`
--

CREATE TABLE IF NOT EXISTS `Matieres` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `coefficient` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Notes`
--

CREATE TABLE IF NOT EXISTS `Notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `valeur` tinyint(3) unsigned NOT NULL,
  `idEtudiant` tinyint(3) unsigned NOT NULL,
  `idMatiere` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `valeur` (`valeur`),
  KEY `idEtudiant` (`idEtudiant`),
  KEY `idMatiere` (`idMatiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Notes`
--
ALTER TABLE `Notes`
  ADD CONSTRAINT `Notes_ibfk_1` FOREIGN KEY (`idEtudiant`) REFERENCES `Etudiants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Notes_ibfk_2` FOREIGN KEY (`idMatiere`) REFERENCES `Matieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
