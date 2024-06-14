-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 14 juin 2024 à 08:46
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
  `jardin_nom` varchar(50) NOT NULL,
  `jardin_surface` int(11) NOT NULL,
  `jardin_nbParcelles` int(11) NOT NULL,
  `jardin_adr` varchar(100) NOT NULL,
  `jardin_ville` varchar(50) NOT NULL,
  `jardin_coordLat` varchar(10) NOT NULL,
  `jardin_coordLong` varchar(10) NOT NULL,
  `jardin_photo` varchar(50) NOT NULL DEFAULT 'default_jardins.png',
  `jardin_maps` varchar(100) NOT NULL,
  `jardin_infoTerre` varchar(100) NOT NULL,
  `_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jardins`
--

INSERT INTO `jardins` (`jardin_id`, `jardin_nom`, `jardin_surface`, `jardin_nbParcelles`, `jardin_adr`, `jardin_ville`, `jardin_coordLat`, `jardin_coordLong`, `jardin_photo`, `jardin_maps`, `jardin_infoTerre`, `_user_id`) VALUES
(1, 'Jardin des Roses', 500, 2, '123 Rue des Roses', 'Troyes', '48.297926', '4.078186', 'Image potager 011.jpg', 'map1.png', 'Sol fertile, bien drainé, ensoleillé', 1),
(2, 'Jardin du Lac', 700, 2, '45 Avenue du Lac', 'Troyes', '48.297504', '4.081183', 'default_jardins.png', 'map2.png', 'Terre argileuse, près de l\'eau', 2),
(3, 'Jardin des Tulipes', 400, 2, '12 Rue des Tulipes', 'Troyes', '48.305678', '4.064321', 'default_jardins.png', 'map3.png', 'Sol riche en nutriments, ensoleillé', 3),
(4, 'Jardin du Verger', 600, 2, '78 Rue du Verger', 'Troyes', '48.306789', '4.073456', 'Photo cojardinage 8970.webp', 'map4.png', 'Terre bien drainée, exposition sud', 4),
(5, 'Jardin de la Fontaine', 450, 2, '32 Rue de la Fontaine', 'Troyes', '48.299876', '4.090765', 'default_jardins.png', 'map5.png', 'Sol sablonneux, arrosage régulier', 5),
(6, 'Jardin des Lavandes', 550, 2, '5 Rue des Lavandes', 'Troyes', '48.295678', '4.085432', 'default_jardins.png', 'map6.png', 'Terre légère, bien drainée', 6),
(7, 'Jardin de la Vallée', 800, 2, '10 Rue de la Vallée', 'Saint-André-les-Vergers', '48.299012', '4.080123', 'default_jardins.png', 'map7.png', 'Sol profond, riche en matière organique', 7),
(8, 'Jardin du Soleil', 600, 2, '25 Rue du Soleil', 'La Chapelle-Saint-Luc', '48.302345', '4.082456', 'default_jardins.png', 'map8.png', 'Terre limoneuse, exposition sud', 8),
(9, 'Jardin des Orangers', 700, 2, '15 Rue des Orangers', 'Saint-Julien-les-Villas', '48.303456', '4.070987', 'default_jardins.png', 'map9.png', 'Sol bien drainé, exposition ensoleillée', 9),
(10, 'Jardin des Oliviers', 500, 2, '20 Rue des Oliviers', 'Saint-André-les-Vergers', '48.299876', '4.090765', 'default_jardins.png', 'map10.png', 'Terre sableuse, arrosage régulier', 10),
(25, 'Jardin Botanique', 200, 5, 'je ne connais pas l\'adresse', 'Paris', '123', '123', 'default_jardins.png', 'test', 'test des infos', 4);

-- --------------------------------------------------------

--
-- Structure de la table `parcelles`
--

CREATE TABLE `parcelles` (
  `parcelle_id` int(11) NOT NULL,
  `parcelle_nom` varchar(100) NOT NULL,
  `parcelle_content` varchar(50) NOT NULL,
  `parcelle_etat` varchar(10) NOT NULL,
  `parcelle_desc` varchar(150) NOT NULL,
  `parcelle_reservation` int(11) DEFAULT NULL,
  `_jardin_id` int(11) NOT NULL,
  `_user_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcelles`
--

INSERT INTO `parcelles` (`parcelle_id`, `parcelle_nom`, `parcelle_content`, `parcelle_etat`, `parcelle_desc`, `parcelle_reservation`, `_jardin_id`, `_user_id`) VALUES
(1, 'Parcelle 1', 'Contenu parcelle 1', 'LIBRE', 'Description parcelle 1', NULL, 1, 1),
(2, 'Parcelle 2', 'Contenu parcelle 2', 'LIBRE', 'Description parcelle 2', NULL, 1, 1),
(3, 'Parcelle 3', 'Contenu parcelle 3', 'LIBRE', 'Description parcelle 3', NULL, 2, 2),
(4, 'Parcelle 4', 'Contenu parcelle 4', 'LIBRE', 'Description parcelle 4', NULL, 2, 2),
(5, 'Parcelle 5', 'Contenu parcelle 5', 'LIBRE', 'Description parcelle 5', NULL, 3, 3),
(6, 'Parcelle 6', 'Contenu parcelle 6', 'LIBRE', 'Description parcelle 6', NULL, 3, 3),
(7, 'Parcelle 7', 'Contenu parcelle 7', 'LIBRE', 'Description parcelle 7', NULL, 4, 4),
(8, 'Parcelle 8', 'Contenu parcelle 8', 'LIBRE', 'Description parcelle 8', NULL, 4, 4),
(9, 'Parcelle 9', 'Contenu parcelle 9', 'LIBRE', 'Description parcelle 9', NULL, 5, 5),
(10, 'Parcelle 10', 'Contenu parcelle 10', 'LIBRE', 'Description parcelle 10', NULL, 5, 5),
(11, 'Parcelle 11', 'Contenu parcelle 11', 'LIBRE', 'Description parcelle 11', NULL, 6, 6),
(12, 'Parcelle 12', 'Contenu parcelle 12', 'LIBRE', 'Description parcelle 12', NULL, 6, 6),
(13, 'Parcelle 13', 'Contenu parcelle 13', 'LIBRE', 'Description parcelle 13', NULL, 7, 7),
(14, 'Parcelle 14', 'Contenu parcelle 14', 'LIBRE', 'Description parcelle 14', NULL, 7, 7),
(15, 'Parcelle 15', 'Contenu parcelle 15', 'LIBRE', 'Description parcelle 15', NULL, 8, 8),
(16, 'Parcelle 16', 'Contenu parcelle 16', 'LIBRE', 'Description parcelle 16', NULL, 8, 8),
(17, 'Parcelle 17', 'Contenu parcelle 17', 'LIBRE', 'Description parcelle 17', NULL, 9, 9),
(18, 'Parcelle 18', 'Contenu parcelle 18', 'LIBRE', 'Description parcelle 18', NULL, 9, 9),
(19, 'Parcelle 19', 'Contenu parcelle 19', 'LIBRE', 'Description parcelle 19', NULL, 10, 10),
(20, 'Parcelle 20', 'Contenu parcelle 20', 'LIBRE', 'Description parcelle 20', NULL, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `reservation_dateDeb` date NOT NULL,
  `reservation_dateFin` date NOT NULL,
  `_parcelle_id` int(11) NOT NULL,
  `_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `user_photo` varchar(100) NOT NULL DEFAULT 'logo.webp'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_nom`, `user_prnm`, `user_login`, `user_pass`, `user_email`, `user_photo`) VALUES
(4, 'Suffy', 'Sam', 'sam', '$2y$10$zkWuogZUoZd07cB/XgwpJewSfXVQavFdO6oBaFJ/CAIxIn0JOqMvq', 'test@mail4.com', 'logo.webp'),
(6, 'Tag', 'Bill', 'bill', '$2y$10$Xz9m2Vvo1YUPuIgF6KSioeIui2MTmgQw7887P68LX2m6888VmV8B6', 'test@mail6.com', 'logo.webp'),
(5, 'Point', 'Théo', 'theo', '$2y$10$G53v/iTZQfV9oFnnTTCQguctkdAGN59ObMGPXxS15d5jFaSW5LYCW', 'test@mail5.com', 'logo.webp'),
(1, 'Dylan', 'Bob ', 'bob', '$2y$10$/0Pu6NHFC87I0TMJ9srNEOrcb9qTIv2Qohew6qKk.97V.swXI2a4C', 'test@mail1.com', 'logo.webp'),
(2, 'Lataupe', 'René ', 'rene', '$2y$10$PB7qVXT2kmz4Oo0UwaahxO93HhmnANFE7sSubFH90cte96YXnjdse', 'test@mail2.com', 'logo.webp'),
(3, 'Ochon', 'Paul', 'paul', '$2y$10$slEXINRLnQP4HXM7BS/nDOcD5p3dLXag3wQlfYNycHyFWn65rAxFK', 'test@mail3.com', 'logo.webp'),
(8, 'Bulga', 'Zoe', 'zoe', '$2y$10$VhoZDV7/x0DdgSwkjbaQ3OpBB1.tyZwrcjQmTlsKyrBuSF1V1lh32', 'test@mail8.com', 'logo.webp'),
(9, 'patos', 'Sandy', 'sandy', '$2y$10$8IfuX1Z8UAAzDgJbmN7Mb.4Q2qog6weHd.Y8QtGKBIQVE.X1zRatO', 'test@mail9.com', 'logo.webp'),
(10, 'Dupond', 'Polux', 'polux', '$2y$10$lwGqBjV9GQUJPKtIlqAtO.LZwm1vCOwZKFFGq98tAaiVmCsat9IH2', 'test@mail10.com', 'logo.webp'),
(7, 'Blink', 'Zack', 'zack', '$2y$10$Pa3u0EpLXU7mMMd0HbB8julsYYz8I.MQ3KnkpEM5MSX6GrNAkCdpO', 'zack.email@mail.com', 'logo.webp');

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
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `jardin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `parcelles`
--
ALTER TABLE `parcelles`
  MODIFY `parcelle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
