-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 juin 2024 à 08:57
-- Version du serveur : 10.3.29-MariaDB-0+deb10u1
-- Version de PHP : 8.2.10

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
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `annonce_id` int(3) NOT NULL,
  `annonce_photo` varchar(255) DEFAULT NULL,
  `annonce_nom` char(100) NOT NULL,
  `annonce_type_demande` char(20) NOT NULL,
  `annonce_description` varchar(500) NOT NULL,
  `annonce_likes` int(3) NOT NULL DEFAULT 0,
  `annonce_dislikes` int(3) NOT NULL DEFAULT 0,
  `annonce_date_publi` date NOT NULL,
  `_utilisateur_id` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`annonce_id`, `annonce_photo`, `annonce_nom`, `annonce_type_demande`, `annonce_description`, `annonce_likes`, `annonce_dislikes`, `annonce_date_publi`, `_utilisateur_id`) VALUES
(15, '667124895cfa3.png', 'Légumes du jardin gratuits', 'don', 'Courgettes, tomates, et poivrons bio fraîchement cueillis disponibles gratuitement. À récupérer au 26 Rue Champeaux, 10000 Troyes.', 0, 0, '2024-06-18', 1),
(14, '66712432432b8.png', 'Fruits frais à donner', 'don', 'Abondance de citrons biologiques frais disponibles, récoltés localement. Idéal pour confitures ou jus naturels.  À venir chercher au Jardin Beffroi, 16-42 Bd Carnot, 10000 Troyes.', 0, 0, '2024-06-18', 1),
(16, '667124bc902eb.png', 'Haricots verts à donner', 'don', 'Excès de haricots verts bio à offrir. Récolte abondante et fraîche. Venez avec vos sacs Place du Préau, 10000 Troyes.', 0, 0, '2024-06-18', 1),
(17, '667124dadbe19.png', 'Fraises bio gratuites', 'don', 'Cueillez vos propres fraises sucrées gratuitement dans notre jardin. Ouvert tous les jours de 9h à 17h au Parc des Moulins, Rue des Bas Trevois, 10000 Troyes.', 0, 0, '2024-06-18', 1),
(18, '6671251dcd67f.png', 'Tondeuse à gazon à donner', 'don', 'Tondeuse électrique en bon état à donner. Idéale pour petites pelouses. À récupérer Rue Antoine Augustin Parmentier, 10440 La Rivière-de-Corps.', 0, 0, '2024-06-18', 1),
(19, '66712542171e9.png', 'Outils de jardin gratuits', 'don', 'Pelles, râteaux, sécateurs à donner. Parfait pour les passionnés de jardinage. À venir chercher au Chemin du Marais, 10120 Saint-Germain.', 0, 0, '2024-06-18', 1),
(20, '6671255fa631e.png', 'Don de bêche', 'don', 'Bêche en bon état disponible gratuitement. Idéale pour le jardinage printanier. À récupérer au Chemin des Granges, 10440 La Rivière-de-Corps.', 0, 0, '2024-06-18', 1),
(21, '66712587dd2b4.png', 'Arrosoir à donner', 'don', 'Arrosoir en plastique de qualité à donner. Pratique pour l\'arrosage des plantes. À venir chercher Rue Pasteur, 10410 Saint-Parres-aux-Tertres.', 0, 0, '2024-06-18', 1),
(22, '6671260be9994.png', 'Cherche terrain pour jardin', 'jardin', 'Passionné de jardinage recherche terrain à cultiver près de Troyes. Prêt à participer aux frais.', 0, 0, '2024-06-18', 1),
(23, '6671269ca9a55.png', 'Recherche espace pour compostage', 'jardin', 'À la recherche d\'un endroit pour installer un composteur près de Lavau. Besoin d\'espace extérieur accessible.', 0, 0, '2024-06-18', 1),
(24, '667126c6cd6c8.png', 'Cherche parcelle pour cultiver légumes', 'jardin', ' Familles cherche parcelle de terrain pour cultiver légumes biologiques près de Saint-Julien-les-Villas.', 0, 0, '2024-06-18', 1),
(25, '667126fa47e2d.png', 'Recherche jardin partagé', 'jardin', 'À la recherche d\'un jardin partagé où contribuer à l\'entretien et partager les récoltes avec la communauté sur Sainte-Savine.', 0, 0, '2024-06-18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jardin`
--

CREATE TABLE `jardin` (
  `jardin_id` int(3) NOT NULL,
  `jardin_nom` char(30) NOT NULL,
  `jardin_cp` char(255) NOT NULL,
  `jardin_ville` char(100) NOT NULL,
  `jardin_rue` char(100) NOT NULL,
  `jardin_photo1` char(255) NOT NULL,
  `jardin_photo2` char(255) NOT NULL,
  `jardin_photo3` char(255) NOT NULL,
  `jardin_surface` char(20) NOT NULL,
  `jardin_condition_partage` char(100) NOT NULL,
  `jardin_description` varchar(1000) NOT NULL,
  `jardin_equipements` tinyint(1) NOT NULL,
  `jardin_entretien` tinyint(1) NOT NULL,
  `jardin_date_publication` date NOT NULL,
  `jardin_point_eau` tinyint(1) NOT NULL,
  `jardin_nb_parcelles` int(11) NOT NULL,
  `jardin_dislikes` int(3) DEFAULT 0,
  `jardin_likes` int(3) NOT NULL DEFAULT 0,
  `_utilisateur_id` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jardin`
--

INSERT INTO `jardin` (`jardin_id`, `jardin_nom`, `jardin_cp`, `jardin_ville`, `jardin_rue`, `jardin_photo1`, `jardin_photo2`, `jardin_photo3`, `jardin_surface`, `jardin_condition_partage`, `jardin_description`, `jardin_equipements`, `jardin_entretien`, `jardin_date_publication`, `jardin_point_eau`, `jardin_nb_parcelles`, `jardin_dislikes`, `jardin_likes`, `_utilisateur_id`) VALUES
(25, 'Parc des moulins', '10000', 'Troyes', 'Rue du bas trevois', '667129fcc4c9b.png', '667129fcc632b.png', 'NULL', '10', '0', 'Le Parc des Moulins est un vaste espace vert urbain aménagé sur le site d\'anciens moulins à eau. Ce parc propose des sentiers de promenade, des aires de pique-nique et des espaces de jeux, offrant ainsi un cadre naturel et paisible pour les visiteurs. Il met en valeur la biodiversité locale et permet de se ressourcer au cœur de la ville.\r\n', 0, 0, '2024-06-18', 1, 5, 0, 0, 1),
(27, 'Parc Henri Terré', '10430', 'Rosières', 'Chem. des Baude', '66712aa804d1d.png', 'NULL', 'NULL', '20', '0', 'Le parc Henri Terré est un espace vert situé près de la ville, offrant un cadre paisible pour la détente et les loisirs. Ce parc dispose de vastes pelouses, d\'aires de jeux pour enfants, et de sentiers de promenade. Il est également apprécié pour ses aménagements paysagers et ses espaces de pique-nique, faisant de lui un lieu de convivialité et de détente pour les habitants et les visiteurs.\r\n', 0, 0, '2024-06-18', 1, 10, 0, 0, 1),
(28, 'Parc des deux rives', '10000', 'Troyes', '1 Espl. Lucien Pechart', '66712b043287c.png', '66712b0434724.png', 'NULL', '5', '0', 'Le Parc des Deux Rives est un vaste espace vert situé le long des rives de la Seine. Il offre de nombreux sentiers de promenade, des aires de jeux pour enfants, et des zones de pique-nique. Le parc est apprécié pour sa biodiversité et ses aménagements paysagers, constituant un lieu idéal pour la détente et les activités de plein air en famille ou entre amis.\r\n', 1, 1, '2024-06-18', 1, 10, 0, 0, 1),
(29, 'Parc des Prés de Lyon', '10600', 'Chapelle-Saint-Luc', 'Avenue Neckarbichofsheim', '66712b5c6497f.png', '66712b5c66fc6.png', 'NULL', '6', '0', 'Le Parc des Prés de Lyon est un grand espace vert idéal pour la détente et les activités de plein air. Il propose des sentiers de promenade, des aires de jeux pour enfants, et des zones de pique-nique. Le parc est apprécié pour son cadre naturel, ses vastes pelouses, et ses espaces boisés, offrant un lieu paisible pour les habitants et les visiteurs.', 0, 1, '2024-06-18', 0, 5, 0, 0, 1),
(30, 'Parc de Songis', '10000', 'Troyes', 'Rue Fallot', '66712bb00c7ac.png', 'NULL', 'NULL', '5', '0', 'Le Parc de Songis à Troyes est un espace vert accueillant et bien aménagé, idéal pour la détente et les loisirs en plein air. Il dispose de sentiers de promenade, d\'aires de jeux pour enfants, et de zones de pique-nique. Le parc est apprécié pour son environnement paisible et ses beaux aménagements paysagers, offrant un cadre agréable pour les habitants et les visiteurs.\r\n', 0, 0, '2024-06-18', 1, 10, 0, 0, 1),
(31, 'Jardin de la Vallée Suisse', '10000', 'Troyes', '7 Bis Rue Argence', '66712c1a4e79b.png', '66712c1a50c34.png', 'NULL', '5', '0', 'un espace naturel dédié à la préservation de la biodiversité. Il offre des sentiers de découverte, des zones de pique-nique, et des espaces d\'observation de la faune et de la flore locales. Ce jardin est apprécié pour son atmosphère sauvage et paisible, permettant aux visiteurs de se reconnecter avec la nature et de profiter d\'un cadre verdoyant.\r\n', 0, 0, '2024-06-18', 1, 5, 0, 0, 1),
(32, 'Jardin Juvenal des Ursins', '10000', 'Troyes', '26 Rue Champeaux', '66712d4ba3e80.jpg', '66712d4ba4fc1.jpg', '66712d4ba58d2.jpg', '5', '0', 'un charmant espace vert situé en centre-ville. Ce jardin historique est apprécié pour ses beaux aménagements paysagers, ses parterres de fleurs, et ses bancs ombragés. Il offre un cadre paisible pour la détente et la promenade, permettant aux habitants et aux visiteurs de profiter d\'un havre de tranquillité au cœur de la ville.\r\n', 0, 1, '2024-06-18', 0, 5, 0, 0, 1),
(33, 'Jardin Colette', '10120', 'Saint-André', 'Derrière la bibliothèque, square Lucien Leclaire', '66712db026e7a.jpg', '66712db027ccc.jpg', 'NULL', '3', '0', 'un espace vert tranquille et bien entretenu, idéal pour la détente et la promenade. Ce jardin offre des sentiers bordés de fleurs, des bancs pour se reposer, et des zones ombragées. Il est apprécié pour son atmosphère paisible et ses aménagements soignés, offrant aux visiteurs un lieu agréable pour se ressourcer en plein cœur de la ville.\r\n', 1, 1, '2024-06-18', 1, 10, 0, 0, 1),
(34, 'Jardin du Rocher', '10000', 'Troyes', 'Boulevard Gambetta', '66712e0aa74c5.jpg', 'NULL', 'NULL', '5', '0', 'un espace vert pittoresque, offrant un cadre naturel et apaisant pour les visiteurs. Ce jardin est doté de sentiers de promenade, de formations rocheuses, et de plantations variées. Il est apprécié pour son ambiance tranquille et son paysage unique, constituant un lieu de détente idéal pour les habitants et les touristes.', 0, 1, '2024-06-18', 1, 5, 0, 0, 1),
(35, 'Jardin des Teinturiers', '10000', 'Troyes', '4 rue de Vauluisant Hôtel de Vauluisant', '66712eb318064.jpg', '66712eb3187d2.jpg', 'NULL', '2', '0', 'un espace vert charmant, connu pour son histoire liée aux teinturiers de la ville. Ce jardin offre des sentiers ombragés, des parterres de fleurs colorées, et des bancs pour se reposer. Il est apprécié pour son ambiance calme et son caractère pittoresque, offrant aux visiteurs un lieu agréable pour se promener et découvrir l\'histoire locale au cœur de Troyes.\r\n', 0, 0, '2024-06-18', 0, 6, 0, 0, 1),
(36, 'Jardin des innocents', '10000', 'Troyes', 'Rue de la madeleine', '66712f43d95c5.jpg', '66712f43da799.jpg', '66712f43dadc8.jpg', '5', '0', 'paisible, parfait pour se détendre et se promener. Ce jardin offre des bancs ombragés, des parterres de fleurs soignés, et une atmosphère tranquille. Il est apprécié pour sa simplicité et son charme discret, offrant aux visiteurs un lieu agréable pour une pause au cœur de la ville historique de Troyes.\r\n', 1, 1, '2024-06-18', 0, 3, 0, 0, 1),
(37, 'Square d’Urmitz', '10420', 'Les Noes', 'Rue du 25 Août', '66712fa869387.jpg', '66712fa86a7ea.jpg', 'NULL', '2', '0', 'parc urbain tranquille, offrant des bancs ombragés et des espaces verts bien entretenus. Ce square est apprécié pour sa simplicité et son atmosphère paisible, offrant aux visiteurs un lieu agréable pour se reposer et se détendre en plein cœur de la ville.\r\n', 0, 0, '2024-06-18', 0, 5, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `parcelles`
--

CREATE TABLE `parcelles` (
  `parcelle_id` int(100) NOT NULL,
  `parcelle_etat` tinyint(1) NOT NULL DEFAULT 0,
  `_parcelle_locataire_id` int(100) DEFAULT NULL,
  `_parcelle_proprietaire_id` int(100) NOT NULL,
  `_parcelle_jardin_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parcelles`
--

INSERT INTO `parcelles` (`parcelle_id`, `parcelle_etat`, `_parcelle_locataire_id`, `_parcelle_proprietaire_id`, `_parcelle_jardin_id`) VALUES
(143, 0, NULL, 1, 28),
(144, 0, NULL, 1, 28),
(145, 0, NULL, 1, 28),
(146, 0, NULL, 1, 28),
(147, 0, NULL, 1, 28),
(148, 0, NULL, 1, 28),
(149, 0, NULL, 1, 28),
(150, 0, NULL, 1, 28),
(151, 0, NULL, 1, 28),
(152, 0, NULL, 1, 28),
(153, 0, NULL, 1, 32),
(154, 0, NULL, 1, 28),
(155, 0, NULL, 1, 28),
(156, 0, NULL, 1, 28),
(157, 0, NULL, 1, 28),
(158, 0, NULL, 1, 32),
(159, 0, NULL, 1, 32),
(160, 0, NULL, 1, 32),
(161, 0, NULL, 1, 32),
(162, 0, NULL, 1, 32),
(163, 0, NULL, 1, 35),
(164, 0, NULL, 1, 35),
(165, 0, NULL, 1, 35),
(166, 0, NULL, 1, 35),
(167, 0, NULL, 1, 35),
(168, 0, NULL, 1, 35),
(169, 0, NULL, 1, 35),
(170, 0, NULL, 1, 31),
(171, 0, NULL, 1, 31),
(172, 0, NULL, 1, 31),
(173, 0, NULL, 1, 31),
(174, 0, NULL, 1, 31),
(175, 0, NULL, 1, 29),
(176, 0, NULL, 1, 29),
(177, 0, NULL, 1, 29),
(178, 0, NULL, 1, 29),
(179, 0, NULL, 1, 29),
(180, 0, NULL, 1, 34),
(181, 0, NULL, 1, 34),
(182, 0, NULL, 1, 34),
(183, 0, NULL, 1, 34),
(184, 0, NULL, 1, 34),
(185, 0, NULL, 1, 27),
(186, 0, NULL, 1, 27),
(187, 0, NULL, 1, 27),
(188, 0, NULL, 1, 27),
(189, 0, NULL, 1, 27),
(190, 0, NULL, 1, 27),
(191, 0, NULL, 1, 27),
(192, 0, NULL, 1, 27),
(193, 0, NULL, 1, 27),
(194, 0, NULL, 1, 27),
(195, 0, NULL, 1, 33),
(196, 0, NULL, 1, 33),
(197, 0, NULL, 1, 33),
(198, 0, NULL, 1, 33),
(199, 0, NULL, 1, 33),
(200, 0, NULL, 1, 33),
(201, 0, NULL, 1, 33),
(202, 0, NULL, 1, 33),
(203, 0, NULL, 1, 33),
(204, 0, NULL, 1, 33),
(205, 0, NULL, 1, 36),
(206, 0, NULL, 1, 36),
(207, 0, NULL, 1, 36),
(208, 0, NULL, 1, 37),
(209, 0, NULL, 1, 37),
(210, 0, NULL, 1, 37),
(211, 0, NULL, 1, 37),
(212, 0, NULL, 1, 37),
(213, 0, NULL, 1, 25),
(214, 0, NULL, 1, 25),
(215, 0, NULL, 1, 25),
(216, 0, NULL, 1, 25),
(217, 0, NULL, 1, 25),
(218, 0, NULL, 1, 30),
(219, 0, NULL, 1, 30),
(220, 0, NULL, 1, 30),
(221, 0, NULL, 1, 30),
(222, 0, NULL, 1, 30),
(223, 0, NULL, 1, 30),
(224, 0, NULL, 1, 30),
(225, 0, NULL, 1, 30),
(226, 0, NULL, 1, 30),
(227, 0, NULL, 1, 30);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(3) NOT NULL,
  `utilisateur_pseudo` char(20) NOT NULL,
  `utilisateur_prenom` char(20) NOT NULL,
  `utilisateur_nom` char(20) NOT NULL,
  `utilisateur_mail` char(255) NOT NULL,
  `utilisateur_tel` int(10) NOT NULL,
  `utilisateur_photo` varchar(255) DEFAULT NULL,
  `utilisateur_ville` char(20) NOT NULL,
  `utilisateur_mdp` varchar(255) NOT NULL,
  `utilisateur_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `utilisateur_pseudo`, `utilisateur_prenom`, `utilisateur_nom`, `utilisateur_mail`, `utilisateur_tel`, `utilisateur_photo`, `utilisateur_ville`, `utilisateur_mdp`, `utilisateur_admin`) VALUES
(1, 'gabmlld', 'gabriel', 'maillard', 'g@g.com', 652783073, '666c609a8642e.png', 'Rosières', '123', 1),
(3, 'swann', 'Swann', 'Breheret', 'swann.breheret@etudiant.univ-reims.fr', 600000000, NULL, 'Rosières', '29cqpkF3RyP2', 0),
(0, 'admin', 'admin', 'admin', 'admin@mmi23c12.sae202.ovh', 0, NULL, 'Troyes', 'dnb2hzu1hkz!cgk!CXW', 1),
(2, 'valentine', 'Valentine', 'Lefort', 'valentine.lefort@etudiant.univ-reims.fr', 600000000, NULL, 'Troyes', 'sYefzDsU8Qmw', 0),
(4, 'prof', 'Patrice', 'Gommery', 'prof@mmi-troyes.fr', 600000000, NULL, 'Troyes', 'mmicbien', 1),
(5, 'lo20cus04', 'Loic', 'Lambert', 'loic.lambert@epfedu.fr', 600000000, NULL, 'Rosières', '4vL9Xx3MEwfW', 0),
(6, 'tpaytas', 'Trisha', 'Paytas', 'trishlikefish@gmail.com', 600000000, NULL, 'Los Angeles', 'op8uZQ8enqop', 0),
(7, 'lion', 'Mauvaise', 'Nouvelle', 'mauvaisenouvelle@gmail.com', 600000000, NULL, 'Saint-Parres', 'hWKmgy9UQRK9', 0),
(8, 'ocedaniel', 'Oceane', 'Daniel', 'oceane.daniel@utt.fr', 6000000, NULL, 'Rosières', 'TJm3nMB3t3HL', 0),
(9, 'mbb', 'Millie', 'Bobby Brown', 'ellevanoustuer@gmail.com', 600000000, NULL, 'Saint André', 'millieiscomingforyou', 0),
(10, 'paulo10', 'Paul', 'Rallet', 'paul.rallet@etudiant.univ-reims.fr', 600000000, NULL, 'Troyes', 'carscbien', 0),
(11, 'thomas', 'Thomas', 'Lambert', 'thomas.lambert1@etudiant.univ-reims.fr', 600000000, NULL, 'Rosières', 'ba3mkXYYF3Lj', 0),
(12, 'milo', 'Milo', 'Mahelin', 'milo.mahelin@etudiant.univ-reims.fr', 600000000, NULL, 'Troyes', 'jevaisallerencréa', 0),
(13, 'theomts', 'Theo', 'Methens', 'theo.methens@etudiant.univ-reims.fr', 600000000, NULL, 'Troyes', 'jevaisallerencom', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`annonce_id`),
  ADD KEY `_utilisateur_id` (`_utilisateur_id`);

--
-- Index pour la table `jardin`
--
ALTER TABLE `jardin`
  ADD PRIMARY KEY (`jardin_id`),
  ADD KEY `_uilisateur_id` (`_utilisateur_id`);

--
-- Index pour la table `parcelles`
--
ALTER TABLE `parcelles`
  ADD PRIMARY KEY (`parcelle_id`),
  ADD KEY `_parcelle_proprietaire_id` (`_parcelle_proprietaire_id`) USING BTREE,
  ADD KEY `_parcelle_jardin_id` (`_parcelle_jardin_id`) USING BTREE,
  ADD KEY `_parcelle_locataire_id` (`_parcelle_locataire_id`) USING BTREE;

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `annonce_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `jardin`
--
ALTER TABLE `jardin`
  MODIFY `jardin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `parcelles`
--
ALTER TABLE `parcelles`
  MODIFY `parcelle_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
