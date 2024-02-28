-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 mai 2023 à 04:27
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdmode`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `ref_article` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Num_article` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_detail` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_categorie` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_marque` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_fournisseur` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_article` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle_article` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_article` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2_article` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3_article` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_2` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur_statut` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `disponibilite` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `ref_article`, `Num_article`, `ref_detail`, `ref_categorie`, `ref_marque`, `ref_fournisseur`, `type_article`, `libelle_article`, `image_article`, `image2_article`, `image3_article`, `prix`, `prix_2`, `statut`, `couleur_statut`, `disponibilite`) VALUES
(1, 'ART1', '1325463562', 'DETAIL1', 'VETEMF', 'MARQ1', 'FOURNI001', 'ARTICLE 1', 'ARTICLE 1', '29.jpg', '15.jpg', '16.jpg', '8000', '10000', 'bestsellers', 'primary', 'Stock limite'),
(2, 'ART2', '13254635', 'DETAIL1', 'VETEMF', 'MARQ1', 'FOURNI001', 'SHORT', 'ARTICLE 2', '15.jpg', '', '', '2000', '4000', 'Populaire', 'success', 'Stock limite'),
(3, 'ART2', '', 'DETAIL1', 'VETEMF', 'MARQ1', 'FOURNI001', 'PENTALON', 'ARTICLE 3', '16.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(4, 'ART3', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 4', '20.jpg', '', '', '8000', '', 'vente', 'warning', 'Stock limite'),
(5, 'ART4', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 5', '24.jpg', '', '', '8000', '', 'bestsellers', 'danger', 'Stock limite'),
(6, 'ART5', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 6', '22.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(7, 'ART6', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 7', '26.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(8, 'ART7', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 8', '27.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(9, 'ART8', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 9', '25.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(10, 'ART9', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 10', '10.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(11, 'ART10', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 11', '11.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(12, 'ART11', '', 'DETAIL1', 'VETEMF', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 12', '12.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(13, 'ART12', '', 'DETAIL1', 'VETEMH', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 13', '13.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(14, 'ART13', '', 'DETAIL1', 'VETEMH', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 14', '22.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(15, 'ART14', '', 'DETAIL1', 'VETEMH', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 15', '23.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(16, 'ART1', '', 'DETAIL1', 'VETEMH', '', 'FOURNI001', 'PENT', 'ARTICLE 16', '24.jpg', '', '', '8000', '', 'Vente', 'danger', ''),
(17, 'ART2', '', 'DETAIL1', 'VETEME', '', 'FOURNI001', 'SHORT', 'ARTICLE 17', '25.jpg', '', '', '5000', '', 'Populaire', 'danger', ''),
(18, 'ART2', '', 'DETAIL1', 'CHAUSSH', '', '', 'ROBE SEXIE', 'ARTICLE 18', '18.jpg', '', '', '8000', '', 'new arrivage', 'danger', 'Stock limite'),
(19, 'ART3', '', 'DETAIL1', 'CHAUSSH', '', '', 'ROBE SEXIE', 'ARTICLE 19', '19.jpg', '', '', '8000', '', 'vente', 'danger', 'Stock limite'),
(20, 'ART4', '', 'DETAIL1', 'CHAUSSH', '', '', 'ROBE SEXIE', 'ARTICLE 20', '20.jpg', '', '', '8000', '', 'new arrivage', '', 'Stock limite'),
(21, 'ART5', '', 'DETAIL1', 'ACCESSH', '', '', 'ROBE SEXIE', 'ARTICLE 21', '21.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(22, 'ART6', '', 'DETAIL1', 'ACCESSH', '', '', 'ROBE SEXIE', 'ARTICLE 22', '22.jpg', '', '', '8000', '', 'new arrivage', '', 'Stock limite'),
(23, 'ART7', '', 'DETAIL1', 'ACCESSH', '', '', 'ROBE SEXIE', 'ARTICLE 23', '23.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(24, 'ART8', '', 'DETAIL1', 'ACCESSH', '', '', 'ROBE SEXIE', 'ARTICLE 24', '24.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(25, 'ART25', '', 'DETAIL1', 'VETEME', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 25', '25.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(26, 'ART10', '', 'DETAIL1', 'ACCESS', '', 'FOURNI001', 'ROBE SEXIE', 'ARTICLE 26', '26.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(27, 'ART11', '', 'DETAIL1', 'ACCESS', '', '', 'ROBE SEXIE', 'ARTICLE 27', '27.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(28, 'ART12', '', 'DETAIL1', 'ACCESS', '', '', 'ROBE SEXIE', 'ARTICLE 28', '28.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(29, 'ART13', '', 'DETAIL1', 'ACCESS', '', '', 'ROBE SEXIE', 'ARTICLE 29', '29.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(30, 'ART14', '', 'DETAIL1', 'ACCESS', '', '', 'ROBE SEXIE', 'ARTICLE 30', '30.jpg', '', '', '8000', '', 'vente', '', 'Stock limite'),
(31, 'ART15', '', 'DETAIL1', 'ACCESS', '', '', 'ROBE SEXIE', 'ARTICLE 31', '31.jpg', '', '', '8000', '', 'vente', '', 'Stock limite');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_categorie` varchar(255) NOT NULL,
  `libelle_categorie` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_client` varchar(255) NOT NULL,
  `image_client` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `code_promos`
--

CREATE TABLE `code_promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle_CodePromo` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `code_promos`
--

INSERT INTO `code_promos` (`id`, `libelle_CodePromo`, `valeur`, `created_at`, `updated_at`) VALUES
(1, 'AKRA', '3000', NULL, NULL),
(2, 'BOKA', '3500', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_commande` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` mediumtext NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `mode_livraison` varchar(255) NOT NULL,
  `methode_paiement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_commentaire` varchar(255) NOT NULL,
  `ref_article` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `etoile` varchar(255) NOT NULL,
  `commentaire` mediumtext NOT NULL,
  `date` date NOT NULL,
  `like_comment` int(11) NOT NULL,
  `dislike_comment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_couleur` varchar(255) NOT NULL,
  `ref_article` varchar(255) NOT NULL,
  `libelle_couleur` varchar(255) NOT NULL,
  `lien_couleur` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detail_articles`
--

CREATE TABLE `detail_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_detail_article` varchar(255) NOT NULL,
  `ref_article` varchar(255) NOT NULL,
  `libelle1` varchar(255) NOT NULL,
  `valeur1` varchar(255) NOT NULL,
  `libelle2` varchar(255) NOT NULL,
  `valeur2` varchar(255) NOT NULL,
  `libelle3` varchar(255) NOT NULL,
  `valeur3` varchar(255) NOT NULL,
  `libelle4` varchar(255) NOT NULL,
  `valeur4` varchar(255) NOT NULL,
  `libelle5` varchar(255) NOT NULL,
  `valeur5` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favories`
--

CREATE TABLE `favories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_article` varchar(255) NOT NULL,
  `ref_client` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_fournisseur` varchar(255) NOT NULL,
  `libelle_fournisseur` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `info_adresses`
--

CREATE TABLE `info_adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_info_adresse` varchar(255) NOT NULL,
  `ref_client` varchar(255) NOT NULL,
  `telephone2` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `info_livraions`
--

CREATE TABLE `info_livraions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_info_livraison` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `quartier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_marque` varchar(255) NOT NULL,
  `libelle_marque` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_28_021914_create_articles_table', 2),
(6, '2023_03_29_140859_create_categories_table', 2),
(7, '2023_03_30_083659_create_couleurs_table', 2),
(8, '2023_04_06_151821_create_taille_articles_table', 2),
(9, '2023_04_06_213824_create_detail_articles_table', 2),
(10, '2023_04_10_161118_create_marques_table', 2),
(11, '2023_04_13_160630_create_clients_table', 2),
(12, '2023_04_18_112246_articles', 2),
(13, '2023_04_18_112525_add_updated_at_to_articles_table', 2),
(14, '2023_04_18_114550_create_favories_table', 3),
(15, '2023_04_26_123545_create_commentaires_table', 4),
(16, '2023_04_29_223849_create_info_livraions_table', 4),
(17, '2023_04_30_164947_create_info_adresses_table', 4),
(18, '2023_05_01_161350_create_code_promos_table', 4),
(19, '2023_05_04_012226_create_mode_livraisons_table', 4),
(20, '2023_05_09_101522_create_commandes_table', 5),
(21, '2023_05_15_131711_create_suivie_commandes_table', 6),
(22, '2023_05_16_074149_create_admins_table', 7),
(23, '2023_05_20_095954_create_fournisseurs_table', 7),
(24, '2023_05_26_021618_create_detail_articles_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `mode_livraisons`
--

CREATE TABLE `mode_livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_mode_livraison` varchar(255) NOT NULL,
  `libelle_mode_livraison` varchar(255) NOT NULL,
  `valeur_mode_livraison` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivie_commandes`
--

CREATE TABLE `suivie_commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_suivie_commande` varchar(255) NOT NULL,
  `ref_commande` varchar(255) NOT NULL,
  `methode_livraison` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `taille_articles`
--

CREATE TABLE `taille_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_taille_article` varchar(255) NOT NULL,
  `ref_article` varchar(255) NOT NULL,
  `libelle_taille_article` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Index pour la table `code_promos`
--
ALTER TABLE `code_promos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `couleurs`
--
ALTER TABLE `couleurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail_articles`
--
ALTER TABLE `detail_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `favories`
--
ALTER TABLE `favories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_adresses`
--
ALTER TABLE `info_adresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_livraions`
--
ALTER TABLE `info_livraions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mode_livraisons`
--
ALTER TABLE `mode_livraisons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `suivie_commandes`
--
ALTER TABLE `suivie_commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `taille_articles`
--
ALTER TABLE `taille_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `code_promos`
--
ALTER TABLE `code_promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleurs`
--
ALTER TABLE `couleurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detail_articles`
--
ALTER TABLE `detail_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favories`
--
ALTER TABLE `favories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_adresses`
--
ALTER TABLE `info_adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_livraions`
--
ALTER TABLE `info_livraions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `mode_livraisons`
--
ALTER TABLE `mode_livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suivie_commandes`
--
ALTER TABLE `suivie_commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `taille_articles`
--
ALTER TABLE `taille_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
