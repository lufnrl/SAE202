-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 juin 2024 à 06:58
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
  `jardin_desc` varchar(1000) NOT NULL,
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

INSERT INTO `jardins` (`jardin_id`, `jardin_nom`, `jardin_desc`, `jardin_surface`, `jardin_nbParcelles`, `jardin_adr`, `jardin_ville`, `jardin_coordLat`, `jardin_coordLong`, `jardin_photo`, `jardin_maps`, `jardin_infoTerre`, `_user_id`) VALUES
(1, 'Jardin des Roses', 'Bonjour ! Je propose une parcelle de 600m² au Jardin des Roses. Le sol est fertile, bien drainé et ensoleillé, parfait pour cultiver des légumes, des herbes aromatiques ou des fleurs. Accès facile à l\'eau et outils de jardinage disponibles sur place.', 500, 2, '123 Rue des Roses', 'Troyes', '48.297926', '4.078186', 'jardin1.webp', 'sv2nmQwUgsbTEdVV8', 'Sol fertile, bien drainé, ensoleillé', 1),
(2, 'Jardin du Lac', 'Salut les jardiniers ! J\'offre une parcelle de 700m² au Jardin du Lac. Le sol argileux et la proximité de l\'eau créent des conditions idéales pour vos cultures. L\'eau est accessible et des outils sont à votre disposition. Rejoignez-nous pour cultiver vos plantes préférées et partager des moments conviviaux au bord de l\'eau !', 700, 2, '45 Avenue du Lac', 'Troyes', '48.297504', '4.081183', 'jardin2.jpg', 'cxvPsVmHA2MZvmys5', 'Terre argileuse, près de l\'eau', 2),
(3, 'Jardin des Tulipes', 'Je mets à disposition une vaste parcelle de 400m² au Jardin des Tulipes. Le sol est exceptionnellement riche en nutriments et bénéficie d\'un ensoleillement optimal. Idéal pour toutes vos cultures, des légumes aux plantes ornementales', 400, 2, '12 Rue des Tulipes', 'Troyes', '48.305678', '4.064321', 'jardin3.jpg', 'enmiFPCJMe8X9MB6A', 'Sol riche en nutriments, ensoleillé', 3),
(4, 'Jardin du Verger', 'Salut tout le monde ! J\'offre une parcelle de 600m² au Jardin du Verger. Le sol est bien drainé et reçoit beaucoup de soleil grâce à son exposition plein sud, parfait pour un jardinage prolifique.', 600, 2, '78 Rue du Verger', 'Troyes', '48.306789', '4.073456', 'jardin4.jpg', 'RvzoZapb2HHwFSi2A', 'Terre bien drainée, exposition sud', 4),
(5, 'Jardin de la Fontaine', 'Salut ! Je mets à disposition ma parcelle de 450m² au Jardin de la Fontaine. Le sol est sablonneux et demande un arrosage régulier, idéal pour des cultures spécifiques. Eau accessible à proximité et outils fournis.', 450, 2, '32 Rue de la Fontaine', 'Troyes', '48.299876', '4.090765', 'jardin5.jpg', 'B7jBjgK43Rx4kY449', 'Sol sablonneux, arrosage régulier', 5),
(6, 'Jardin des Lavandes', 'Bonjour à tous ! Je propose une parcelle de 550m² au Jardin des Lavandes. Le sol est léger et bien drainé, idéal pour une variété de cultures, des légumes aux fleurs. Accès facile à l\'eau et outils de jardinage disponibles. Venez profiter de cet espace magnifique pour cultiver et partager de bons moments en communauté !', 550, 2, '5 Rue des Lavandes', 'Troyes', '48.295678', '4.085432', 'jardin6.jpg', '1eqjapXgb1JcaSQk8', 'Terre légère, bien drainée', 6),
(7, 'Jardin de la Vallée', 'Salut à tous ! J\'ai une grande parcelle de 800m² disponible au Jardin de la Vallée. Le sol profond et riche en matière organique est parfait pour tous vos projets de jardinage. Eau accessible à proximité et outils fournis. Rejoignez-nous pour cultiver vos plantes préférées et créer des liens dans une ambiance conviviale !', 800, 2, '10 Rue de la Vallée', 'Saint-André-les-Vergers', '48.299012', '4.080123', 'jardin7.jpg', '311sPFBTX6upnCXB7', 'Sol profond, riche en matière organique', 7),
(8, 'Jardin du Soleil', 'Bonjour à tous ! Je propose une parcelle de 600m² au Jardin du Soleil. Le sol limoneux et l\'exposition sud offrent des conditions idéales pour une variété de cultures prospères. Vous pouvez y planter des légumes tels que tomates, poivrons, courgettes, aubergines, concombres, et des herbes aromatiques comme le basilic, le thym, le romarin, la menthe.', 600, 2, '25 Rue du Soleil', 'La Chapelle-Saint-Luc', '48.302345', '4.082456', 'jardin8.jpg', 'cTHTw4MiNWyTYDhr5', 'Terre limoneuse, exposition sud', 8),
(9, 'Jardin des Orangers', 'Bonjour à tous ! Une parcelle ensoleillée de 700m² est disponible au Jardin des Orangers. Avec un sol bien drainé et une exposition idéale, cet espace est parfait pour cultiver des agrumes comme des citronniers et des orangers, qui bénéficieront pleinement du climat ensoleillé. Vous pourrez également profiter de ce cadre pour cultiver des plantes aromatiques telles que le romarin et la lavande, ajoutant une touche de parfum à votre jardin.', 700, 2, '15 Rue des Orangers', 'Saint-Julien-les-Villas', '48.303456', '4.070987', 'jardin9.jpg', 'wXWg91NBwXRUPZUA8', 'Sol bien drainé, exposition ensoleillée', 9),
(10, 'Jardin des Oliviers', 'Bienvenue au Jardin des Oliviers ! Nous proposons une parcelle ensoleillée de 500m² avec un sol sableux nécessitant un arrosage régulier. Cet environnement est idéal pour cultiver une variété de plantes adaptées à ces conditions spécifiques. Vous pouvez envisager de planter des espèces qui prospèrent dans un sol sableux, comme les plantes méditerranéennes, les cactées et les plantes succulentes.', 500, 2, '20 Rue des Oliviers', 'Saint-André-les-Vergers', '48.299876', '4.090765', 'jardin10.jpg', '1Ws1nsLZDj8kZ35FA', 'Terre sableuse, arrosage régulier', 10);

-- --------------------------------------------------------

--
-- Structure de la table `parcelles`
--

CREATE TABLE `parcelles` (
  `parcelle_id` int(11) NOT NULL,
  `parcelle_nom` varchar(100) NOT NULL,
  `parcelle_content` varchar(50) NOT NULL,
  `parcelle_etat` varchar(10) NOT NULL,
  `parcelle_reservation` int(11) DEFAULT NULL,
  `_jardin_id` int(11) NOT NULL,
  `_user_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcelles`
--

INSERT INTO `parcelles` (`parcelle_id`, `parcelle_nom`, `parcelle_content`, `parcelle_etat`, `parcelle_reservation`, `_jardin_id`, `_user_id`) VALUES
(1, 'Parcelle A1', 'Géraniums, campanules, delphiniums', 'LIBRE', NULL, 1, 1),
(2, 'Parcelle A2', 'Géraniums, campanules, delphiniums', 'LIBRE', NULL, 1, 1),
(3, 'Parcelle B1', 'Lavande, soucis, sauge', 'LIBRE', NULL, 2, 2),
(4, 'Parcelle B2', 'Lavande, soucis, sauge', 'LIBRE', NULL, 2, 2),
(5, 'Parcelle C1', 'Jacinthes, jonquilles, crocus', 'LIBRE', NULL, 3, 3),
(6, 'Parcelle C2', 'Jacinthes, jonquilles, crocus', 'LIBRE', NULL, 3, 3),
(7, 'Parcelle D1', 'Basilic, thym, romarin', 'LIBRE', NULL, 4, 4),
(8, 'Parcelle D2', 'Basilic, thym, romarin', 'LIBRE', NULL, 4, 4),
(9, 'Parcelle E1', 'Citronniers, orangers, mandariniers', 'LIBRE', NULL, 5, 5),
(10, 'Parcelle E2', 'Citronniers, orangers, mandariniers', 'LIBRE', NULL, 5, 5),
(11, 'Parcelle F1', 'Oliviers, lavande, romarin', 'LIBRE', NULL, 6, 6),
(12, 'Parcelle F2', 'Oliviers, lavande, romarin', 'LIBRE', NULL, 6, 6),
(13, 'Parcelle G1', 'Carottes, pommes de terre, choux', 'LIBRE', NULL, 7, 7),
(14, 'Parcelle G2', 'Carottes, pommes de terre, choux', 'LIBRE', NULL, 7, 7),
(15, 'Parcelle H1', 'Roses, hortensias, dahlias', 'LIBRE', NULL, 8, 8),
(16, 'Parcelle H2', 'Roses, hortensias, dahlias', 'LIBRE', NULL, 8, 8),
(17, 'Parcelle I1', 'Fraisiers, framboisiers, groseilliers', 'LIBRE', NULL, 9, 9),
(18, 'Parcelle I2', 'Fraisiers, framboisiers, groseilliers', 'LIBRE', NULL, 9, 9),
(19, 'Parcelle J1', 'Pommiers, poiriers, cerisiers', 'LIBRE', NULL, 10, 10),
(20, 'Parcelle J2', 'Pommiers, poiriers, cerisiers', 'LIBRE', NULL, 10, 10);

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
  `user_photo` varchar(100) NOT NULL DEFAULT 'default_user.webp'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_nom`, `user_prnm`, `user_login`, `user_pass`, `user_email`, `user_photo`) VALUES
(24, 'prof', 'prof', 'prof', '$2y$10$bUl4.YQEF86ZcIVfnXRog.bR5eV5.NPBEWc3X2fW1DGJftc83VbUS', 'prof.mail@mail.com', 'default_user.webp'),
(6, 'Tag', 'Bill', 'bill', '$2y$10$Xz9m2Vvo1YUPuIgF6KSioeIui2MTmgQw7887P68LX2m6888VmV8B6', 'test@mail6.com', 'default_user.webp'),
(1, 'Dylan', 'Bob ', 'bob', '$2y$10$/0Pu6NHFC87I0TMJ9srNEOrcb9qTIv2Qohew6qKk.97V.swXI2a4C', 'test@mail1.com', 'default_user.webp'),
(2, 'Lataupe', 'René ', 'rene', '$2y$10$PB7qVXT2kmz4Oo0UwaahxO93HhmnANFE7sSubFH90cte96YXnjdse', 'test@mail2.com', 'default_user.webp'),
(3, 'Ochon', 'Paul', 'paul', '$2y$10$slEXINRLnQP4HXM7BS/nDOcD5p3dLXag3wQlfYNycHyFWn65rAxFK', 'test@mail3.com', 'default_user.webp'),
(8, 'Bulga', 'Zoe', 'zoe', '$2y$10$VhoZDV7/x0DdgSwkjbaQ3OpBB1.tyZwrcjQmTlsKyrBuSF1V1lh32', 'test@mail8.com', 'default_user.webp'),
(9, 'patos', 'Sandy', 'sandy', '$2y$10$8IfuX1Z8UAAzDgJbmN7Mb.4Q2qog6weHd.Y8QtGKBIQVE.X1zRatO', 'test@mail9.com', 'default_user.webp'),
(10, 'Dupond', 'Polux', 'polux', '$2y$10$lwGqBjV9GQUJPKtIlqAtO.LZwm1vCOwZKFFGq98tAaiVmCsat9IH2', 'test@mail10.com', 'default_user.webp'),
(7, 'Blink', 'Zack', 'zack', '$2y$10$Pa3u0EpLXU7mMMd0HbB8julsYYz8I.MQ3KnkpEM5MSX6GrNAkCdpO', 'zack.email@mail.com', 'default_user.webp'),
(25, 'Bruzek', 'Elouan', 'elouan', '$2y$10$poNDH8zY8pjMkBuKoWZiseI3UXZZWu5r7tJLWseFB/izARTCxZJae', 'testemail@mail.com', 'default_user.webp'),
(26, 'test', 'test', 'test', '$2y$10$uyE4fSAxbqlgP9H0feBtJ.EGA4/6jYauJNeyGHTfQXzYn5mGSThz2', 'test@mail.com', 'default_user.webp');

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
  MODIFY `jardin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `parcelles`
--
ALTER TABLE `parcelles`
  MODIFY `parcelle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
