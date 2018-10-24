-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le :  mer. 24 oct. 2018 à 07:10
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
  `p1` int(255) NOT NULL,
  `p2` int(255) NOT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `H1` int(11) NOT NULL,
  `H2` int(11) NOT NULL,
  `H3` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `heli1` (`H1`),
  KEY `heli2` (`H2`),
  KEY `heli3` (`H3`)
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
  `player1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `player2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Game`
--
ALTER TABLE `Game`
  ADD CONSTRAINT `player1` FOREIGN KEY (`p1`) REFERENCES `Player` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `player2` FOREIGN KEY (`p2`) REFERENCES `Player` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Player`
--
ALTER TABLE `Player`
  ADD CONSTRAINT `heli1` FOREIGN KEY (`H1`) REFERENCES `Helico` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `heli2` FOREIGN KEY (`H2`) REFERENCES `Helico` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `heli3` FOREIGN KEY (`H3`) REFERENCES `Helico` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
