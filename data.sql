-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le :  mer. 17 oct. 2018 à 11:49
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Salon`
--

INSERT INTO `Salon` (`id`, `name`, `pass`, `private`, `player1`, `player2`) VALUES
(1, 'eze', 'ezez', 0, NULL, NULL),
(2, 'fjghdu', 'ifehyfiu', 0, '06243a13d89bb52a7cc336e8fa63193f', NULL),
(3, 'test', 'test', 0, NULL, NULL),
(4, 'test private', 'fg', 1, '015oqm6cq7n4rgfara5u6s5312', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
