-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le :  mer. 24 oct. 2018 à 09:47
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

-- --------------------------------------------------------

--
-- Structure de la table `Game`
--

CREATE TABLE `Game` (
  `id` int(11) NOT NULL,
  `p1` varchar(255) DEFAULT NULL,
  `p2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Helico`
--

CREATE TABLE `Helico` (
  `id` int(11) NOT NULL,
  `x` int(2) NOT NULL,
  `y` int(2) NOT NULL,
  `z` int(2) NOT NULL,
  `direction` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Player`
--

CREATE TABLE `Player` (
  `id` varchar(255) NOT NULL,
  `H1` int(11) NOT NULL,
  `H2` int(11) NOT NULL,
  `H3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Salon`
--

CREATE TABLE `Salon` (
  `id` int(50) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `private` tinyint(1) NOT NULL,
  `game` int(11) NOT NULL,
  `player1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `player2` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player1` (`p1`),
  ADD KEY `player2` (`p2`);

--
-- Index pour la table `Helico`
--
ALTER TABLE `Helico`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Salon`
--
ALTER TABLE `Salon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrainte1` (`game`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Game`
--
ALTER TABLE `Game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Helico`
--
ALTER TABLE `Helico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `Salon`
--
ALTER TABLE `Salon`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
