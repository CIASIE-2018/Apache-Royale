-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le :  mer. 24 oct. 2018 à 09:52
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `apache-royale`
--
CREATE DATABASE IF NOT EXISTS `apache-royale` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `apache-royale`;

-- --------------------------------------------------------

--
-- Structure de la table `Game`
--

DROP TABLE IF EXISTS `Game`;
CREATE TABLE IF NOT EXISTS `Game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p1` varchar(255) DEFAULT NULL,
  `p2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `player1` (`p1`),
  KEY `player2` (`p2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Helico`
--

DROP TABLE IF EXISTS `Helico`;
CREATE TABLE IF NOT EXISTS `Helico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x` int(2) NOT NULL,
  `y` int(2) NOT NULL,
  `z` int(2) NOT NULL,
  `direction` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Player`
--

DROP TABLE IF EXISTS `Player`;
CREATE TABLE IF NOT EXISTS `Player` (
  `id` varchar(255) NOT NULL,
  `H1` int(11) NOT NULL,
  `H2` int(11) NOT NULL,
  `H3` int(11) NOT NULL,
  `stage` int(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Salon`
--

DROP TABLE IF EXISTS `Salon`;
CREATE TABLE IF NOT EXISTS `Salon` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `private` tinyint(1) NOT NULL,
  `game` int(11) NOT NULL,
  `player1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `player2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contrainte1` (`game`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Salon`
--
ALTER TABLE `Salon`
  ADD CONSTRAINT `contrainte1` FOREIGN KEY (`game`) REFERENCES `Game` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
