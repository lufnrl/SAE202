-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 05 juin 2024 à 17:21
-- Version du serveur : 10.3.39-MariaDB-0+deb10u2
-- Version de PHP : 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202`
--

-- --------------------------------------------------------

--
-- Structure de la table `jardins`
--

CREATE TABLE `jardins` (
  `jardin_id` int(11) NOT NULL,
  `jardin_nom` varchar(30) NOT NULL,
  `jardin_surface` int(11) NOT NULL,
  `jardin_adr` varchar(100) NOT NULL,
  `jardin_ville` varchar(50) NOT NULL,
  `jardin_coordLat` varchar(10) NOT NULL,
  `jardin_coordLong` varchar(10) NOT NULL,
  `jardin_photo` varchar(30) NOT NULL,
  `jardin_maps` varchar(30) NOT NULL,
  `jardin_infoTerre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parcelles`
--

CREATE TABLE `parcelles` (
  `parcelle_id` int(11) NOT NULL,
  `parcelle_content` varchar(50) NOT NULL,
  `parcelle_etat` varchar(10) NOT NULL,
  `parcelle_desc` varchar(150) NOT NULL,
  `parcelle_dateDeb` date NOT NULL,
  `parcelle_dateFin` date NOT NULL,
  `_jardin_id` int(11) NOT NULL,
  `_user_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcelles`
--

INSERT INTO `parcelles` (`parcelle_id`, `parcelle_content`, `parcelle_etat`, `parcelle_desc`, `parcelle_dateDeb`, `parcelle_dateFin`, `_jardin_id`, `_user_id`) VALUES
(4, 'test du contenu', 'Libre', 'desc de la parcelle', '2024-06-04', '2024-06-25', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nom` varchar(50) NOT NULL,
  `user_prnm` varchar(50) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_photo` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_nom`, `user_prnm`, `user_login`, `user_pass`, `user_email`, `user_photo`) VALUES
(4, 'Lataupe', 'René', 'Riri', '123', '', ''),
(3, 'Bob', 'Dylan', 'dydy', '123', '', ''),
(5, 'Ochon', 'Paul', 'popo', '123', '', ''),
(6, 'Suffy', 'Sam', 'sam', '123', '', ''),
(7, 'Point', 'Théo', 'titi', '123', '', ''),
(8, 'Tag', 'Bill', 'bibi', '123', '', ''),
(9, 'Blink', 'Zack', 'zack', '123', '', ''),
(10, 'Bulga', 'Zoe', 'zoe', '123', '', ''),
(11, 'Patos', 'Sandy', 'sandy', '123', '', ''),
(12, 'Dupond', 'Polux', 'polux', '123', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jardins`
--
ALTER TABLE `jardins`
  ADD PRIMARY KEY (`jardin_id`);

--
-- Index pour la table `parcelles`
--
ALTER TABLE `parcelles`
  ADD PRIMARY KEY (`parcelle_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jardins`
--
ALTER TABLE `jardins`
  MODIFY `jardin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parcelles`
--
ALTER TABLE `parcelles`
  MODIFY `parcelle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
