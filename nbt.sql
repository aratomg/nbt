-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 05 mai 2022 à 14:58
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
-- Structure de la table `assigner`
--

CREATE TABLE `assigner` (
  `id_as` int(11) NOT NULL,
  `id_camion` int(11) NOT NULL,
  `id_pneu` int(11) NOT NULL,
  `etat_pneu` varchar(10) NOT NULL,
  `date_d` date NOT NULL,
  `kilo_d` int(11) NOT NULL,
  `date_fin` date NOT NULL,
  `kilo_fin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Structure de la table `autre_conso`
--

CREATE TABLE `autre_conso` (
  `id_conso` int(11) NOT NULL,
  `date_conso` date NOT NULL,
  `designation` varchar(200) NOT NULL,
  `prix_gasoil` int(11) NOT NULL,
  `gasoil_litre` int(11) NOT NULL,
  `id_carte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `autre_conso`
--

INSERT INTO `autre_conso` (`id_conso`, `date_conso`, `designation`, `prix_gasoil`, `gasoil_litre`, `id_carte`) VALUES
(1, '2022-04-30', 'test', 4000, 232, 6);

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
(43, 23, 14),
(44, 24, 16),
(45, 24, 15);

-- --------------------------------------------------------

--
-- Structure de la table `camion`
--

CREATE TABLE `camion` (
  `id_camion` int(11) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `modele` varchar(13) DEFAULT NULL,
  `norme` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `camion`
--

INSERT INTO `camion` (`id_camion`, `matricule`, `marque`, `genre`, `modele`, `norme`, `type`) VALUES
(10, '3472 TBG', 'RENAULT', 'Prenium', '250', 54, 'Plateau');

-- --------------------------------------------------------

--
-- Structure de la table `carte_gasoil`
--

CREATE TABLE `carte_gasoil` (
  `id_carte` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `plafond` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carte_gasoil`
--

INSERT INTO `carte_gasoil` (`id_carte`, `libelle`, `plafond`) VALUES
(2, 'CARTE TOTAL 59888', 3430),
(3, 'CARTE TOTAL 59890', NULL),
(4, 'CARTE TOTAL 59889', NULL),
(5, 'CARTE TOTAL 59891', NULL),
(6, 'CARTE TOTAL 59887', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id_chauffeur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `permis` text NOT NULL,
  `date_permis` date DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chauffeur`
--

INSERT INTO `chauffeur` (`id_chauffeur`, `nom`, `prenom`, `permis`, `date_permis`, `tel`) VALUES
(7, 'NDRIANALINIRINA', 'Donné', '528363T', '2022-04-21', '0349752848');

-- --------------------------------------------------------

--
-- Structure de la table `chek`
--

CREATE TABLE `chek` (
  `id_chek` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `date_chek` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `montant_chek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chek`
--

INSERT INTO `chek` (`id_chek`, `numero`, `date_chek`, `designation`, `montant_chek`) VALUES
(4, '1', '2022-04-09', '', 0),
(5, '1', '2022-04-09', '', 2000),
(6, '1', '2022-04-16', 'test', 2000),
(7, '1212', '2022-05-05', '', 20000),
(8, '1212', '2022-05-05', '', 20000),
(9, '1212', '2022-05-05', '', 20000);

-- --------------------------------------------------------

--
-- Structure de la table `cheque`
--

CREATE TABLE `cheque` (
  `id_cheque` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `date_cheque` date NOT NULL,
  `numero` int(11) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cheque`
--

INSERT INTO `cheque` (`id_cheque`, `id_facture`, `date_cheque`, `numero`, `montant`) VALUES
(1, 0, '0000-00-00', 1212, 0),
(2, 0, '0000-00-00', 1212, 0),
(3, 0, '0000-00-00', 1212, 0),
(4, 0, '0000-00-00', 1212, 0),
(5, 0, '0000-00-00', 1212, 0);

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
(12, 13, 20000, 232, NULL, NULL, 450000),
(13, 14, 23, 232, 20000, 2000, 500),
(14, 15, 6, 40, NULL, 2, 455),
(15, 16, 6, 40, NULL, 4, 455);

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
(8, 13, 2, NULL, NULL, 1, 300000, 250, 'TC exemple'),
(9, 14, 4, 'test1', 10, 4, 2800, 256, 'TEST'),
(10, 15, 9, 'az', 1, 0, 0, NULL, NULL),
(11, 16, 7, 'sss', 9, 0, 0, NULL, NULL);

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
(23, '1', 'export', 'AAA', '0000000', '0000000', 11200, 2240, 13440, '2022-04-29', '2022-04-21'),
(24, '1TNT', 'import', 'AAAE', '0000000', '0000000', 12, 4, 16, '2022-05-05', NULL);

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
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `date_piece` date NOT NULL,
  `designation` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `date_piece`, `designation`, `prix`) VALUES
(1, '2022-04-09', 'test', 100),
(2, '2022-05-03', 'test1', 100);

-- --------------------------------------------------------

--
-- Structure de la table `pneu`
--

CREATE TABLE `pneu` (
  `id_pneu` int(11) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `marque` varchar(40) NOT NULL,
  `prix_pneu` int(11) NOT NULL,
  `date_pneu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pneu`
--

INSERT INTO `pneu` (`id_pneu`, `numero`, `reference`, `marque`, `prix_pneu`, `date_pneu`) VALUES
(2, '1', '200/LL/22,5', 'miclin', 20000, '0000-00-00'),
(4, '1212', '200/LL/22,5', 'MERCede', 100, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `recouvrement`
--

CREATE TABLE `recouvrement` (
  `id_recouvrement` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `date_payement` date DEFAULT NULL,
  `montant_payement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recouvrement`
--

INSERT INTO `recouvrement` (`id_recouvrement`, `id_facture`, `date_payement`, `montant_payement`) VALUES
(2, 23, '2022-05-05', 20000);

-- --------------------------------------------------------

--
-- Structure de la table `transit`
--

CREATE TABLE `transit` (
  `id_transit` int(11) NOT NULL,
  `transit` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `nif` int(11) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `transit`
--

INSERT INTO `transit` (`id_transit`, `transit`, `client`, `nif`, `stat`) VALUES
(2, 'ARIVA', 'NEWDAN', 1, 12);

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
  `id_camion` int(11) NOT NULL,
  `id_chauffeur` int(11) NOT NULL,
  `com` int(11) DEFAULT NULL,
  `montant` int(11) NOT NULL,
  `id_carte` int(11) NOT NULL,
  `bl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `date_voyage`, `transit`, `id_camion`, `id_chauffeur`, `com`, `montant`, `id_carte`, `bl`) VALUES
(6, '2013-02-19', 'BB', 4, 5, 200, 222, 3, 0),
(7, '2022-02-18', 'BB', 4, 5, 20000, 36, 4, 0),
(8, '2022-01-19', 'BB', 3, 5, 200, 60000, 2, 0),
(9, '2022-01-19', 'BB', 3, 5, 200, 900000, 2, 0),
(10, '2022-01-21', 'BB', 4, 6, 200, 3000, 3, 0),
(11, '2022-01-21', 'BB', 4, 6, 200, 9000, 3, 0),
(12, '2022-01-22', 'ABM', 4, 4, 20000, 600000, 3, 0),
(13, '2022-01-22', 'ABM', 4, 5, 20000, 300000, 2, 0),
(14, '2022-04-09', 'test', 10, 7, 20000, 11200, 4, 0),
(15, '2022-05-13', 'ARIVA', 10, 7, 200, 20000, 3, 1333),
(16, '2022-05-25', 'ARIVA', 10, 7, 20000, 20000, 2, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assigner`
--
ALTER TABLE `assigner`
  ADD PRIMARY KEY (`id_as`);

--
-- Index pour la table `autre`
--
ALTER TABLE `autre`
  ADD PRIMARY KEY (`id_autre`);

--
-- Index pour la table `autre_conso`
--
ALTER TABLE `autre_conso`
  ADD PRIMARY KEY (`id_conso`);

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
-- Index pour la table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id_cheque`);

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
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`);

--
-- Index pour la table `pneu`
--
ALTER TABLE `pneu`
  ADD PRIMARY KEY (`id_pneu`);

--
-- Index pour la table `recouvrement`
--
ALTER TABLE `recouvrement`
  ADD PRIMARY KEY (`id_recouvrement`);

--
-- Index pour la table `transit`
--
ALTER TABLE `transit`
  ADD PRIMARY KEY (`id_transit`);

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
-- AUTO_INCREMENT pour la table `assigner`
--
ALTER TABLE `assigner`
  MODIFY `id_as` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `autre`
--
ALTER TABLE `autre`
  MODIFY `id_autre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `autre_conso`
--
ALTER TABLE `autre_conso`
  MODIFY `id_conso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avoir`
--
ALTER TABLE `avoir`
  MODIFY `id_avoir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `camion`
--
ALTER TABLE `camion`
  MODIFY `id_camion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `carte_gasoil`
--
ALTER TABLE `carte_gasoil`
  MODIFY `id_carte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `chek`
--
ALTER TABLE `chek`
  MODIFY `id_chek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id_cheque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id_depense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pneu`
--
ALTER TABLE `pneu`
  MODIFY `id_pneu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `recouvrement`
--
ALTER TABLE `recouvrement`
  MODIFY `id_recouvrement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transit`
--
ALTER TABLE `transit`
  MODIFY `id_transit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id_voyage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
