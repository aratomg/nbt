-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 22 fév. 2022 à 10:36
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nbt`
--

-- --------------------------------------------------------

--
-- Structure de la table `autre`
--

CREATE TABLE `autre` (
  `id_autre` int(11) NOT NULL,
  `date_autre` date NOT NULL,
  `designation` varchar(255) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `autre`
--

INSERT INTO `autre` (`id_autre`, `date_autre`, `designation`, `montant`) VALUES
(5, '2022-02-21', 'Baguette', 20000);

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `id_avoir` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `id_voyage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_avoir`, `id_facture`, `id_voyage`) VALUES
(28, 16, 8),
(29, 16, 9),
(32, 18, 12),
(33, 18, 13),
(34, 18, 6),
(41, 22, 7),
(42, 22, 11);

-- --------------------------------------------------------

--
-- Structure de la table `camion`
--

CREATE TABLE `camion` (
  `id_camion` int(11) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `camion`
--

INSERT INTO `camion` (`id_camion`, `matricule`, `marque`, `modele`) VALUES
(3, '3472TBG', 'MERC', NULL),
(4, '2870TBH', 'MERC', NULL),
(5, '9426TBF', 'MERC', NULL),
(6, '5287TBK', 'MERC', NULL),
(7, '2243TBJ', 'MERC', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `carte_gasoil`
--

CREATE TABLE `carte_gasoil` (
  `id_carte` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `capacite` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carte_gasoil`
--

INSERT INTO `carte_gasoil` (`id_carte`, `libelle`, `capacite`) VALUES
(2, 'CARTE TOTAL 59888', 3426),
(3, 'CARTE TOTAL 59890', NULL),
(4, 'CARTE TOTAL 59884', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id_chauffeur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `cin` text NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chauffeur`
--

INSERT INTO `chauffeur` (`id_chauffeur`, `nom`, `prenom`, `cin`, `adresse`, `tel`) VALUES
(4, 'LITA', NULL, '00000000', '0210 viirfi', NULL),
(5, 'RODDY', NULL, '00000000', '0210 viirfi', NULL),
(6, 'OLIN', NULL, '00000000', NULL, '0000000');

-- --------------------------------------------------------

--
-- Structure de la table `chek`
--

CREATE TABLE `chek` (
  `id_chek` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `date_chek` date NOT NULL,
  `montant_chek` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chek`
--

INSERT INTO `chek` (`id_chek`, `numero`, `date_chek`, `montant_chek`, `id_facture`) VALUES
(2, '1', '2022-02-24', 10843, 22),
(3, '23', '2022-02-17', 1152000, 16);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE `depense` (
  `id_depense` int(11) NOT NULL,
  `id_voyage` int(11) NOT NULL,
  `montant_gasoil` int(11) NOT NULL,
  `gasoil_litre` int(11) NOT NULL,
  `piece` int(11) DEFAULT NULL,
  `pneu` int(11) DEFAULT NULL,
  `vatsy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id_depense`, `id_voyage`, `montant_gasoil`, `gasoil_litre`, `piece`, `pneu`, `vatsy`) VALUES
(5, 6, 23, 232, 20000, 2000, 455),
(6, 7, 23, 232, 20000, 2000, 455),
(7, 8, 23, 232, 20000, 2000, 455),
(8, 9, 6, 232, 200001, 2000, 455),
(9, 10, 6, 232, 20000, 2000, 455),
(10, 11, 6, 232, 20000, 2000, 455),
(11, 12, 200000, 232, NULL, NULL, 45000),
(12, 13, 20000, 232, NULL, NULL, 450000);

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_voyage` int(11) NOT NULL,
  `tonnage_aller` int(2) NOT NULL,
  `retour` varchar(100) DEFAULT NULL,
  `tonnage_retour` int(11) DEFAULT NULL,
  `nombre` int(4) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `norme` int(11) DEFAULT NULL,
  `ref_marc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_voyage`, `tonnage_aller`, `retour`, `tonnage_retour`, `nombre`, `prix_unitaire`, `norme`, `ref_marc`) VALUES
(2, 6, 2, 'antsirabe', 2, 1, 222, 234, 'TCO1'),
(3, 7, 3, 'NEWDAN', 11, 3, 12, 243, 'TYS'),
(4, 8, 2, NULL, NULL, 2, 30000, 20, 'HHH'),
(5, 9, 1, 'az', 22, 3, 300000, 23, 'sd'),
(6, 11, 1, 'fd', 1, 3, 3000, 267, 'df'),
(7, 12, 3, NULL, NULL, 2, 300000, 250, 'TC exemple'),
(8, 13, 2, NULL, NULL, 1, 300000, 250, 'TC exemple');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `num_fac` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `client` varchar(100) NOT NULL,
  `nif` varchar(100) NOT NULL,
  `stat` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `total_final` int(11) NOT NULL,
  `date_fact` date NOT NULL,
  `date_echeance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id_facture`, `num_fac`, `type`, `client`, `nif`, `stat`, `total`, `tva`, `total_final`, `date_fact`, `date_echeance`) VALUES
(16, '1', 'import', 'AAAE', '1', '1', 960000, 192000, 1152000, '2022-01-23', '2022-01-21'),
(18, '1TNT', 'import', 'ABM', '0000000', '0000000', 900222, 180044, 1080266, '2022-01-22', '2022-02-25'),
(22, '1TNT', 'export', 'AAAsd', '0000000', '0000000', 9036, 1807, 10843, '2022-02-17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_01_23_060237_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('922b0ec7-19d2-4dc6-ae80-a7495eca4b76', 'App\\Notifications\\Historique', 'App\\Models\\Camion', 9, '[]', NULL, '2022-01-23 03:51:17', '2022-01-23 03:51:17');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recouvrement`
--

CREATE TABLE `recouvrement` (
  `id_recouvrement` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `date_payement` date NOT NULL,
  `montant_payement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recouvrement`
--

INSERT INTO `recouvrement` (`id_recouvrement`, `id_facture`, `date_payement`, `montant_payement`) VALUES
(4, 18, '2022-01-29', 1080266),
(9, 22, '2022-02-19', 10843),
(10, 16, '2022-02-20', 1152000);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `identifiant`, `password`, `type`) VALUES
(1, 'arinomenjanaharyjudickael@gmail.com', '$2y$10$bmRfOGl9k1OnAg5MXFYG2Oupkg0NPMkHmGWlQFHgCdu29v4KImWhm', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `id_voyage` int(11) NOT NULL,
  `date_voyage` date NOT NULL,
  `transit` varchar(100) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `id_camion` int(11) NOT NULL,
  `id_chauffeur` int(11) NOT NULL,
  `com` int(11) DEFAULT NULL,
  `montant` int(11) NOT NULL,
  `id_carte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `date_voyage`, `transit`, `client`, `id_camion`, `id_chauffeur`, `com`, `montant`, `id_carte`) VALUES
(6, '2013-02-19', 'BB', 'AAA', 4, 5, 200, 222, 3),
(7, '2022-02-18', 'BB', 'AAAsd', 4, 5, 20000, 36, 4),
(8, '2022-01-19', 'BB', 'AAA', 3, 5, 200, 60000, 2),
(9, '2022-01-19', 'BB', 'AAAsd', 3, 5, 200, 900000, 2),
(10, '2022-01-21', 'BB', 'AAA', 4, 6, 200, 3000, 3),
(11, '2022-01-21', 'BB', 'AAA', 4, 6, 200, 9000, 3),
(12, '2022-01-22', 'ABM', NULL, 4, 4, 20000, 600000, 3),
(13, '2022-01-22', 'ABM', NULL, 4, 5, 20000, 300000, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `autre`
--
ALTER TABLE `autre`
  ADD PRIMARY KEY (`id_autre`);

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`id_avoir`);

--
-- Index pour la table `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`id_camion`);

--
-- Index pour la table `carte_gasoil`
--
ALTER TABLE `carte_gasoil`
  ADD PRIMARY KEY (`id_carte`);

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`id_chauffeur`);

--
-- Index pour la table `chek`
--
ALTER TABLE `chek`
  ADD PRIMARY KEY (`id_chek`);

--
-- Index pour la table `depense`
--
ALTER TABLE `depense`
  ADD PRIMARY KEY (`id_depense`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `recouvrement`
--
ALTER TABLE `recouvrement`
  ADD PRIMARY KEY (`id_recouvrement`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id_voyage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `autre`
--
ALTER TABLE `autre`
  MODIFY `id_autre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `avoir`
--
ALTER TABLE `avoir`
  MODIFY `id_avoir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `camion`
--
ALTER TABLE `camion`
  MODIFY `id_camion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `carte_gasoil`
--
ALTER TABLE `carte_gasoil`
  MODIFY `id_carte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `chek`
--
ALTER TABLE `chek`
  MODIFY `id_chek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id_depense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recouvrement`
--
ALTER TABLE `recouvrement`
  MODIFY `id_recouvrement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id_voyage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
