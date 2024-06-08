-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 08 juin 2024 à 17:00
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
  `jardin_adr` varchar(100) NOT NULL,
  `jardin_ville` varchar(50) NOT NULL,
  `jardin_coordLat` varchar(10) NOT NULL,
  `jardin_coordLong` varchar(10) NOT NULL,
  `jardin_photo` varchar(50) NOT NULL,
  `jardin_maps` varchar(100) NOT NULL,
  `jardin_infoTerre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jardins`
--

INSERT INTO `jardins` (`jardin_id`, `jardin_nom`, `jardin_surface`, `jardin_adr`, `jardin_ville`, `jardin_coordLat`, `jardin_coordLong`, `jardin_photo`, `jardin_maps`, `jardin_infoTerre`) VALUES
(15, 'Jardin Massey', 20, 'Rue Massey, 65000 Tarbes', 'Tarbes', '43.2334', '0.0763', 'photo_jardin_massey.jpg', 'https://maps.app.goo.gl/fUGoqjvHPMjLfYRW9', 'Sol limoneux, bien drainé'),
(14, 'Parc de Belleville', 20, '47 Rue des Couronnes, 75020 Paris', 'Paris', '48.8738', '2.3885', 'photo_parc_belleville.jpg', 'https://maps.google.com/14', 'Terre calcaire, pH neutre'),
(13, 'Parc Montsouris', 20, '2 Rue Gazan, 75014 Paris', 'Paris', '48.8223', '2.3387', 'photo_parc_montsouris.jpg', 'https://maps.google.com/13', 'Terre fertile, bien drainée'),
(12, 'Parc André Citroën', 20, '2 Rue Cauchy, 75015 Paris', 'Paris', '48.8447', '2.2771', 'photo_parc_citroen.jpg', 'https://maps.google.com/12', 'Terre sableuse, pH neutre'),
(11, 'Jardin des Serres d\'Auteuil', 20, '3 Avenue de la Porte d\'Auteuil, 75016 Paris', 'Paris', '48.8476', '2.2523', 'photo_serres_auteuil.jpg', 'https://maps.google.com/11', 'Terre argileuse, bien arrosée'),
(10, 'Parc de la Villette', 20, '211 Avenue Jean Jaurès, 75019 Paris', 'Paris', '48.8913', '2.3936', 'photo_parc_villette.jpg', 'https://maps.google.com/10', 'Sol limoneux, nécessite engrais'),
(9, 'Jardin Botanique de Nice', 20, '78 Corniche Fleurie, 06200 Nice', 'Nice', '43.7085', '7.1935', 'photo_jardin_botanique_nice.jpg', 'https://maps.google.com/9', 'Terre calcaire, bien arrosée'),
(8, 'Parc de la Beaujoire', 20, 'Boulevard de la Beaujoire, 44300 Nantes', 'Nantes', '47.2496', '-1.5266', 'photo_parc_beaujoire.jpg', 'https://maps.google.com/8', 'Terre fertile, pH légèrement acide'),
(7, 'Jardin des Plantes de Nantes', 20, 'Rue Stanislas Baudry, 44000 Nantes', 'Nantes', '47.2184', '-1.5423', 'photo_jardin_nantes.jpg', 'https://maps.google.com/7', 'Terre sableuse, bien drainée'),
(6, 'Parc Borély', 20, 'Avenue du Prado, 13008 Marseille', 'Marseille', '43.2643', '5.3744', 'photo_parc_borely.jpg', 'https://maps.google.com/6', 'Terre argileuse, nécessite engrais'),
(5, 'Jardin Public', 20, 'Cours de Verdun, 33000 Bordeaux', 'Bordeaux', '44.8417', '-0.5812', 'photo_jardin_public.jpg', 'https://maps.google.com/5', 'Terre limoneuse, bien arrosée'),
(4, 'Parc Monceau', 20, '35 Boulevard de Courcelles, 75008 Paris', 'Paris', '48.8791', '2.3087', 'photo_parc_monceau.jpg', 'https://maps.google.com/4', 'Terre sableuse, pH neutre'),
(3, 'Parc de la Tête d\'Or', 20, 'Place du Général Leclerc, Lyon', 'Lyon', '45.7791', '4.8554', 'photo_parc_tete_or.jpg', 'https://maps.google.com/3', 'Sol argileux, bien drainé'),
(2, 'Jardin du Luxembourg', 20, '6 Rue de Médicis, 75006 Paris', 'Paris', '48.8462', '2.3371', 'photo_jardin_luxembourg.jpg', 'https://maps.google.com/2', 'Terre calcaire, nécessite engrais'),
(1, 'Jardin des Plantes', 20, '57 Rue Cuvier, 75005 Paris', 'Paris', '48.8443', '2.3570', 'photo_jardin_plantes.jpg', 'https://maps.google.com/1', 'Terre fertile, bien arrosée'),
(16, 'Parc de Procé', 20, 'Rue des Dervallières, 44100 Nantes', 'Nantes', '47.2264', '-1.5875', 'photo_parc_proce.jpg', 'https://maps.google.com/16', 'Terre argileuse, pH légèrement acide'),
(17, 'Jardin des Cinq Sens', 20, 'Rue du Bourg, 74240 Yvoire', 'Yvoire', '46.3704', '6.3263', 'photo_jardin_cinq_sens.jpg', 'https://maps.google.com/17', 'Terre fertile, bien arrosée'),
(18, 'Jardin du Château de Versailles', 20, 'Place d\'Armes, 78000 Versailles', 'Versailles', '48.8049', '2.1204', 'photo_chateau_versailles.jpg', 'https://maps.google.com/18', 'Terre calcaire, nécessite engrais'),
(19, 'Parc de la Pépinière', 20, '34 Cours Léopold, 54000 Nancy', 'Nancy', '48.6937', '6.1844', 'photo_parc_pepiniere.jpg', 'https://maps.google.com/19', 'Terre sableuse, bien drainée'),
(20, 'Parc de Sceaux', 20, '8 Avenue Claude Perrault, 92330 Sceaux', 'Sceaux', '48.7752', '2.2964', 'photo_parc_sceaux.jpg', 'https://maps.google.com/20', 'Terre fertile, pH légèrement acide');

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
  `parcelle_dateDeb` date NOT NULL,
  `parcelle_dateFin` date NOT NULL,
  `parcelle_reservation` int(11) DEFAULT NULL,
  `_jardin_id` int(11) NOT NULL,
  `_user_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcelles`
--

INSERT INTO `parcelles` (`parcelle_id`, `parcelle_nom`, `parcelle_content`, `parcelle_etat`, `parcelle_desc`, `parcelle_dateDeb`, `parcelle_dateFin`, `parcelle_reservation`, `_jardin_id`, `_user_id`) VALUES
(12, 'Parterre de Fleurs 2', 'Fleurs', 'LIBRE', 'Floraison de printemps', '2023-04-15', '2023-10-15', NULL, 12, 2),
(11, 'Potager Bio 2', 'Légumes', 'LIBRE', 'Culture de légumes bio', '2024-03-01', '2024-08-01', NULL, 11, 1),
(10, 'Vignoble', 'Vignes', 'LIBRE', 'Culture de vignes', '2023-03-20', '2023-09-20', 7, 10, 10),
(9, 'Champ de Céréales', 'Céréales', 'LIBRE', 'Champs de céréales', '2022-09-15', '2023-03-15', 7, 9, 9),
(8, 'Champignonnière', 'Champignons', 'LIBRE', 'Culture de champignons', '2024-01-01', '2024-06-01', NULL, 8, 8),
(7, 'Jardin Médicinal', 'Plantes médicinales', 'LIBRE', 'Plantes médicinales', '2023-07-01', '2023-12-01', NULL, 7, 7),
(6, 'Arboretum', 'Arbres', 'LIBRE', 'Plantation d\'arbres', '2022-03-01', '2022-09-01', NULL, 6, 6),
(5, 'Potager Mixte', 'Potager', 'LIBRE', 'Potager mixte', '2023-02-10', '2023-08-10', NULL, 5, 5),
(4, 'Herbes Aromatiques', 'Herbes', 'LIBRE', 'Plantation d\'herbes', '2024-06-01', '2024-12-01', NULL, 4, 4),
(3, 'Verger', 'Fruits', 'LIBRE', 'Vergers de fruits', '2023-05-20', '2023-11-20', NULL, 3, 3),
(2, 'Parterre de Fleurs', 'Fleurs', 'LIBRE', 'Floraison de printemps', '2022-04-15', '2022-10-15', NULL, 2, 2),
(1, 'Potager Bio', 'Légumes', 'LIBRE', 'Culture de légumes bio', '2023-03-01', '2023-08-01', 7, 1, 1),
(13, 'Verger 2', 'Fruits', 'LIBRE', 'Vergers de fruits', '2023-05-20', '2023-11-20', NULL, 13, 3),
(14, 'Herbes Aromatiques 2', 'Herbes', 'LIBRE', 'Plantation d\'herbes', '2022-06-01', '2022-12-01', 7, 14, 4),
(15, 'Potager Mixte 2', 'Potager', 'LIBRE', 'Potager mixte', '2023-02-10', '2023-08-10', 7, 15, 5),
(16, 'Arboretum 2', 'Arbres', 'LIBRE', 'Plantation d\'arbres', '2024-03-01', '2024-09-01', 7, 16, 6),
(17, 'Jardin Médicinal 2', 'Plantes médicinales', 'LIBRE', 'Plantes médicinales', '2022-07-01', '2022-12-01', NULL, 17, 7),
(18, 'Champignonnière 2', 'Champignons', 'LIBRE', 'Culture de champignons', '2023-01-01', '2023-06-01', NULL, 18, 8),
(19, 'Champ de Céréales 2', 'Céréales', 'LIBRE', 'Champs de céréales', '2024-09-15', '2025-03-15', NULL, 19, 9),
(20, 'Vignoble 2', 'Vignes', 'LIBRE', 'Culture de vignes', '2023-03-20', '2023-09-20', 7, 20, 10);

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
  `user_photo` varchar(30) NOT NULL DEFAULT 'default_profil.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_nom`, `user_prnm`, `user_login`, `user_pass`, `user_email`, `user_photo`) VALUES
(4, 'Suffy', 'Sam', 'sam', '$2y$10$c/k2Mrj.16kJq83fTDNy5O0Di3N51wwJudCOt/Fi2jS8AUbxe92gm', 'test@mail4.com', 'photo.png'),
(7, 'Blink', 'Zack', 'zack', '$2y$10$cbVJxY/SUwvSuyxEHeOmbeM66wNCPd15Rrj8EPP1oxi9nMvNJh9Bi', 'test@mail7.com', ''),
(6, 'Tag', 'Bill', 'bill', '$2y$10$Xz9m2Vvo1YUPuIgF6KSioeIui2MTmgQw7887P68LX2m6888VmV8B6', 'test@mail6.com', 'photo.png'),
(5, 'Point', 'Théo', 'theo', '$2y$10$G53v/iTZQfV9oFnnTTCQguctkdAGN59ObMGPXxS15d5jFaSW5LYCW', 'test@mail5.com', 'photo.png'),
(1, 'Dylan', 'Bob ', 'bob', '$2y$10$/0Pu6NHFC87I0TMJ9srNEOrcb9qTIv2Qohew6qKk.97V.swXI2a4C', 'test@mail1.com', 'photo.png'),
(2, 'Lataupe', 'René ', 'rene', '$2y$10$PB7qVXT2kmz4Oo0UwaahxO93HhmnANFE7sSubFH90cte96YXnjdse', 'test@mail2.com', 'profile.webp'),
(3, 'Ochon', 'Paul', 'paul', '$2y$10$slEXINRLnQP4HXM7BS/nDOcD5p3dLXag3wQlfYNycHyFWn65rAxFK', 'test@mail3.com', 'photo.png'),
(8, 'Bulga', 'Zoe', 'zoe', '$2y$10$VhoZDV7/x0DdgSwkjbaQ3OpBB1.tyZwrcjQmTlsKyrBuSF1V1lh32', 'test@mail8.com', 'photo.png'),
(9, 'patos', 'Sandy', 'sandy', '$2y$10$8IfuX1Z8UAAzDgJbmN7Mb.4Q2qog6weHd.Y8QtGKBIQVE.X1zRatO', 'test@mail9.com', 'photo.png'),
(10, 'Dupond', 'Polux', 'polux', '$2y$10$lwGqBjV9GQUJPKtIlqAtO.LZwm1vCOwZKFFGq98tAaiVmCsat9IH2', 'test@mail10.com', 'photo.png');

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
  MODIFY `jardin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `parcelles`
--
ALTER TABLE `parcelles`
  MODIFY `parcelle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
