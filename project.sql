-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 août 2024 à 15:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `image`, `nom`, `prenoms`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'logo_client.jpg', 'Arnold', 'Aye aurelien', 'ayearnoldaurelienokaingne@gmail.com', 'Prisca@123', '2024-08-10 14:57:00', '2024-08-10 14:57:00');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_article` varchar(255) NOT NULL,
  `Num_article` varchar(255) NOT NULL,
  `detail_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `marque_id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `type_article` varchar(255) NOT NULL,
  `libelle_article` varchar(255) NOT NULL,
  `image_article` varchar(255) NOT NULL DEFAULT 'LOGO.png',
  `image2_article` varchar(255) NOT NULL DEFAULT 'LOGO.png',
  `image3_article` varchar(255) NOT NULL DEFAULT 'LOGO.png',
  `prix` int(11) NOT NULL,
  `prix_2` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `couleur_statut` varchar(255) NOT NULL,
  `disponibilite` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `ref_article`, `Num_article`, `detail_id`, `categorie_id`, `marque_id`, `fournisseur_id`, `client_id`, `type_article`, `libelle_article`, `image_article`, `image2_article`, `image3_article`, `prix`, `prix_2`, `statut`, `couleur_statut`, `disponibilite`, `created_at`, `updated_at`) VALUES
(2, 'ARTICLE1', 'NUM1723308602', 1, 1, 1, 1, 1, 'SOLAIRE', 'ARTICLE 1', 'Red and White Modern Fried Chicken Menu Flyer.png', '81TDFTHPl2L-removebg-preview.png', 'télécharger (8).jpeg', 12000, 10000, 'vente', 'primary', 'stock disponible', '2024-08-10 16:50:02', '2024-08-10 16:50:02'),
(3, 'ARTICLE2', 'NUM1723310861', 1, 2, 1, 2, 1, 'SOLAIRE', 'ARTICLE 2', '1723310861.png', '1723310861.png', '1723310861.png', 12000, 10000, 'vente', 'primary', 'stock disponible', '2024-08-10 17:27:41', '2024-08-10 17:27:41'),
(4, 'ARTICLE3', 'NUM1723311090', 1, 3, 1, 3, 1, 'SOLAIRE', 'ARTICLE 3', '17233110901.jpg', '17233110902.jpg', '17233110903.jpeg', 25000, 10000, 'vente', 'primary', 'stock disponible', '2024-08-10 17:31:30', '2024-08-10 17:31:30');

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

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `ref_categorie`, `libelle_categorie`, `created_at`, `updated_at`) VALUES
(1, 'CART01', 'LONG', NULL, NULL),
(2, 'FOURNI02', 'COURT', NULL, NULL),
(3, 'CATPEPE', 'PETIT', '2024-08-10 15:11:10', '2024-08-10 15:11:10');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_client` varchar(255) NOT NULL,
  `image_client` varchar(255) NOT NULL DEFAULT '01.jpg',
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `ref_client`, `image_client`, `nom`, `prenoms`, `email`, `telephone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'CLIENT01', 'logo_client.jpg', 'OKAINGNE', 'AYE ARNOLD', 'aye@gmail.com', '0747376562', 'Prisca@123', NULL, NULL),
(2, 'CLIENTTO5', '1723375269.jpg', 'TOTY', 'GBEDIEU AURELIEN', 'ayearnoldaurelienokaingne@gmail.com', '0102030405', '$2y$10$ieQDCLcifIUNB2uzcjC27.QbEpiMcSdnn41ew9pC1eA9IHXSjPCEq', '2024-08-10 19:30:56', '2024-08-11 11:22:38');

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

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_commande` varchar(255) NOT NULL,
  `info_adresse_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `mode_livraison` varchar(255) NOT NULL,
  `nombreJour` varchar(255) NOT NULL,
  `reste` varchar(255) NOT NULL,
  `methode_paiement` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'etape1',
  `cart` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `ref_commande`, `info_adresse_id`, `client_id`, `mode_livraison`, `nombreJour`, `reste`, `methode_paiement`, `statut`, `cart`, `created_at`, `updated_at`) VALUES
(1, 'COMDTOTY1723373483', 1, 2, 'domicile', '', '', '1000', 'etape2', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"3\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";i:36000;}', '2024-08-11 10:51:23', '2024-08-11 10:51:23'),
(2, 'COMDTOTY1723451892', 1, 2, 'domicile', '', '', '1000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"4\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:4;s:10:\"totalPrice\";i:48000;}', '2024-08-12 08:38:12', '2024-08-12 08:38:12'),
(3, 'COMDTOTY1723454886', 1, 2, 'magasin', '', '', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"7\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:7;s:10:\"totalPrice\";i:84000;}', '2024-08-12 09:28:06', '2024-08-12 09:28:06'),
(4, 'COMDTOTY1723455889', 1, 2, 'magasin', '21.6', '3000', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"9\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:9;s:10:\"totalPrice\";i:108000;}', '2024-08-12 09:44:50', '2024-08-12 09:44:50'),
(5, 'COMDTOTY1723456442', 1, 2, 'domicile', '30', '0', '2000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"5\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:5;s:10:\"totalPrice\";i:60000;}', '2024-08-12 09:54:02', '2024-08-12 09:54:02'),
(6, 'COMDTOTY1723458414', 1, 2, 'magasin', '26.4', '2000', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:2:\"11\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:11;s:10:\"totalPrice\";i:132000;}', '2024-08-12 10:26:54', '2024-08-12 10:26:54'),
(7, 'COMDTOTY1723458642', 1, 2, 'domicile', '2.4', '2000', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";i:1;s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:12000;}', '2024-08-12 10:30:42', '2024-08-12 10:30:42'),
(8, 'COMDTOTY1723460224', 1, 2, 'magasin', '16.8', '4000', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"7\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:7;s:10:\"totalPrice\";i:84000;}', '2024-08-12 10:57:04', '2024-08-12 10:57:04'),
(9, 'COMDTOTY1723460533', 1, 2, 'domicile', '7.2', '1000', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"3\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";i:36000;}', '2024-08-12 11:02:13', '2024-08-12 11:02:13'),
(10, 'COMDTOTY1723460776', 1, 2, 'magasin', '2', '2000', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";i:1;s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"12000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:12000;}', '2024-08-12 11:06:16', '2024-08-12 11:06:16'),
(11, 'COMDTOTY1723462616', 1, 2, 'magasin', '5', '0', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";i:1;s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:25000;}', '2024-08-12 11:36:56', '2024-08-12 11:36:56'),
(12, 'COMDTOTY1723542904', 1, 2, 'domicile', '25', '0', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"5\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:5;s:10:\"totalPrice\";i:125000;}', '2024-08-13 09:55:04', '2024-08-13 09:55:04'),
(13, 'COMDTOTY1723542937', 1, 2, 'domicile', '25', '0', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"5\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:5;s:10:\"totalPrice\";i:125000;}', '2024-08-13 09:55:37', '2024-08-13 09:55:37'),
(14, 'COMDTOTY1723543849', 1, 2, 'domicile', '225', '0', '1000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"9\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:9;s:10:\"totalPrice\";i:225000;}', '2024-08-13 10:10:49', '2024-08-13 10:10:49'),
(15, 'COMDTOTY1723544301', 1, 2, 'domicile', '225', '0', '1000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"9\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:9;s:10:\"totalPrice\";i:225000;}', '2024-08-13 10:18:21', '2024-08-13 10:18:21'),
(16, 'COMDTOTY1723544546', 1, 2, 'domicile', '225', '0', '1000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"9\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:9;s:10:\"totalPrice\";i:225000;}', '2024-08-13 10:22:26', '2024-08-13 10:22:26'),
(17, 'COMDTOTY1723545069', 1, 2, 'magasin', '62', '1000', '2000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"5\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:5;s:10:\"totalPrice\";i:125000;}', '2024-08-13 10:31:09', '2024-08-13 10:31:09'),
(18, 'COMDTOTY1723545306', 1, 2, 'domicile', '15', '0', '5000', 'etape1', 'O:15:\"App\\Models\\Cart\":3:{s:5:\"items\";a:1:{s:2:\"4M\";a:7:{s:3:\"qty\";s:1:\"3\";s:10:\"product_id\";s:2:\"4M\";s:12:\"product_name\";s:9:\"ARTICLE 3\";s:13:\"product_price\";s:5:\"25000\";s:13:\"product_image\";s:15:\"17233110901.jpg\";s:22:\"product_taille_article\";s:1:\"M\";s:15:\"product_couleur\";N;}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";i:75000;}', '2024-08-13 10:35:06', '2024-08-13 10:35:06');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `ref_commentaire` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `etoile` varchar(255) NOT NULL,
  `commentaire` mediumtext NOT NULL,
  `like_comment` int(11) DEFAULT NULL,
  `dislike_comment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

CREATE TABLE `couleurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `ref_couleur` varchar(255) NOT NULL,
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

--
-- Déchargement des données de la table `detail_articles`
--

INSERT INTO `detail_articles` (`id`, `ref_detail_article`, `libelle1`, `valeur1`, `libelle2`, `valeur2`, `libelle3`, `valeur3`, `libelle4`, `valeur4`, `libelle5`, `valeur5`, `created_at`, `updated_at`) VALUES
(1, 'DETAIL', 'jojjii', 'jjoij', 'iojio', 'ioijoij', 'ojoj', 'ijoo', 'pikp', 'oijio', 'jioioj', 'jioij', '2024-08-10 15:26:50', '2024-08-10 15:26:50');

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
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `favories`
--

INSERT INTO `favories` (`id`, `article_id`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 3, 2, '2024-08-11 17:27:13', '2024-08-11 17:27:13'),
(3, 4, 2, '2024-08-11 17:27:19', '2024-08-11 17:27:19');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_fournisseur` varchar(255) NOT NULL,
  `libelle_fournisseur` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `ref_fournisseur`, `libelle_fournisseur`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 'FOURNI01', 'DARLING', '0747376562', NULL, NULL),
(2, 'FOURNI02', 'DREAM COSMETIQUE', '0747376562', NULL, NULL),
(3, 'FOURNAR', 'ARCHE', '0102030405', '2024-08-10 15:58:33', '2024-08-10 15:58:33');

-- --------------------------------------------------------

--
-- Structure de la table `info_adresses`
--

CREATE TABLE `info_adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `ref_info_adresse` varchar(255) NOT NULL,
  `telephone2` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `quartier` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'actuel',
  `info_supplementaire` varchar(255) NOT NULL,
  `sauvegarde` varchar(255) NOT NULL DEFAULT 'non',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `info_adresses`
--

INSERT INTO `info_adresses` (`id`, `client_id`, `ref_info_adresse`, `telephone2`, `adresse`, `ville`, `commune`, `quartier`, `statut`, `info_supplementaire`, `sauvegarde`, `created_at`, `updated_at`) VALUES
(1, 2, 'PLUS3', 585854979, 'le profil de ylan', 'Abidjan', 'Abidjan', 'NKKN', 'actuel', 'LKJL', 'oui', '2024-08-10 20:49:27', '2024-08-10 20:49:27');

-- --------------------------------------------------------

--
-- Structure de la table `info_livraions`
--

CREATE TABLE `info_livraions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_info_livraison` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `quartier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `like_dislikes`
--

CREATE TABLE `like_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_client` varchar(255) NOT NULL,
  `ref_article` varchar(255) NOT NULL,
  `valeur_like` varchar(255) NOT NULL DEFAULT '0',
  `valeur_dislike` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_marque` varchar(255) NOT NULL,
  `libelle_marque` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `ref_marque`, `libelle_marque`, `created_at`, `updated_at`) VALUES
(1, 'MARQFR', 'FRESH', '2024-08-10 15:51:35', '2024-08-10 15:51:35');

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
(7, '2023_04_13_160630_create_clients_table', 1),
(10, '2023_04_29_223849_create_info_livraions_table', 1),
(12, '2023_05_01_161350_create_code_promos_table', 1),
(15, '2023_05_15_131711_create_suivie_commandes_table', 1),
(17, '2023_05_26_042341_create_like_dislikes_table', 1),
(18, '2024_08_09_153829_create_detail_articles_table', 1),
(19, '2024_08_09_154131_create_categories_table', 1),
(20, '2024_08_09_154616_create_marques_table', 1),
(21, '2024_08_09_154757_create_fournisseurs_table', 1),
(22, '2024_08_10_142529_create_articles_table', 1),
(23, '2023_05_16_074149_create_admins_table', 2),
(24, '2024_08_10_153254_create_taille_articles_table', 3),
(25, '2023_03_30_083659_create_couleurs_table', 4),
(26, '2023_04_26_123545_create_commentaires_table', 5),
(28, '2024_08_10_203508_create_info_adresses_table', 6),
(29, '2023_05_04_012226_create_mode_livraisons_table', 7),
(30, '2023_05_09_101522_create_commandes_table', 8),
(31, '2023_04_18_114550_create_favories_table', 9),
(36, '2024_08_13_092220_create_transactions_table', 10);

-- --------------------------------------------------------

--
-- Structure de la table `mode_livraisons`
--

CREATE TABLE `mode_livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_mode_livraison` varchar(255) NOT NULL,
  `libelle_mode_livraison` varchar(255) NOT NULL DEFAULT 'magasin',
  `valeur_mode_livraison` varchar(255) NOT NULL DEFAULT '1500',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mode_livraisons`
--

INSERT INTO `mode_livraisons` (`id`, `ref_mode_livraison`, `libelle_mode_livraison`, `valeur_mode_livraison`, `created_at`, `updated_at`) VALUES
(1, 'LIVRAIS01', 'magasin', '0', '2024-08-10 21:03:03', '2024-08-10 21:03:03'),
(2, 'LIVRAIS02', 'domicile', '1500', '2024-08-10 21:03:03', '2024-08-10 21:03:03');

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
  `statut` varchar(255) NOT NULL,
  `date_livraison` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suivie_commandes`
--

INSERT INTO `suivie_commandes` (`id`, `ref_suivie_commande`, `ref_commande`, `methode_livraison`, `statut`, `date_livraison`, `created_at`, `updated_at`) VALUES
(1, 'SUCOMDTO1723373483', 'COMDTOTY1723373483', 'domicile', 'etape2', '', '2024-08-11 10:51:23', '2024-08-11 10:51:23'),
(2, 'SUCOMDTO1723451892', 'COMDTOTY1723451892', 'domicile', 'etape1', '', '2024-08-12 08:38:12', '2024-08-12 08:38:12'),
(3, 'SUCOMDTO1723454886', 'COMDTOTY1723454886', 'magasin', 'etape1', '', '2024-08-12 09:28:06', '2024-08-12 09:28:06'),
(4, 'SUCOMDTO1723455890', 'COMDTOTY1723455890', 'magasin', 'etape1', '', '2024-08-12 09:44:50', '2024-08-12 09:44:50'),
(5, 'SUCOMDTO1723456442', 'COMDTOTY1723456442', 'domicile', 'etape1', '', '2024-08-12 09:54:02', '2024-08-12 09:54:02'),
(6, 'SUCOMDTO1723458414', 'COMDTOTY1723458414', 'magasin', 'etape1', '2024-09-07 10:26:54', '2024-08-12 10:26:54', '2024-08-12 10:26:54'),
(7, 'SUCOMDTO1723458642', 'COMDTOTY1723458642', 'domicile', 'etape1', '2024-08-15 10:30:42', '2024-08-12 10:30:42', '2024-08-12 10:30:42'),
(8, 'SUCOMDTO1723460224', 'COMDTOTY1723460224', 'magasin', 'etape1', '2024-08-29 10:57:04', '2024-08-12 10:57:04', '2024-08-12 10:57:04'),
(9, 'SUCOMDTO1723460533', 'COMDTOTY1723460533', 'domicile', 'etape1', '2024-08-20 11:02:13', '2024-08-12 11:02:13', '2024-08-12 11:02:13'),
(10, 'SUCOMDTO1723460776', 'COMDTOTY1723460776', 'magasin', 'etape1', '2024-08-15 11:06:16', '2024-08-12 11:06:16', '2024-08-12 11:06:16'),
(11, 'SUCOMDTO1723462616', 'COMDTOTY1723462616', 'magasin', 'etape1', '2024-08-18 11:36:56', '2024-08-12 11:36:56', '2024-08-12 11:36:56'),
(12, 'SUCOMDTO1723542937', 'COMDTOTY1723542937', 'domicile', 'etape1', '2025-07-05 09:55:37', '2024-08-13 09:55:37', '2024-08-13 09:55:37'),
(13, 'SUCOMDTO1723544547', 'COMDTOTY1723544547', 'domicile', 'etape1', '2094-11-05 10:22:26', '2024-08-13 10:22:27', '2024-08-13 10:22:27'),
(14, 'SUCOMDTO1723545069', 'COMDTOTY1723545069', 'magasin', 'etape1', '2024-10-15 10:31:09', '2024-08-13 10:31:09', '2024-08-13 10:31:09'),
(15, 'SUCOMDTO1723545306', 'COMDTOTY1723545306', 'domicile', 'etape1', '2024-08-29 10:35:06', '2024-08-13 10:35:06', '2024-08-13 10:35:06');

-- --------------------------------------------------------

--
-- Structure de la table `taille_articles`
--

CREATE TABLE `taille_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_taille_article` varchar(255) NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `libelle_taille_article` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `taille_articles`
--

INSERT INTO `taille_articles` (`id`, `ref_taille_article`, `article_id`, `libelle_taille_article`, `created_at`, `updated_at`) VALUES
(1, 'TAILL01', 4, 'M', '2024-08-10 18:05:07', '2024-08-10 18:05:07');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `ref_transaction` varchar(255) NOT NULL,
  `contenue` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `commande_id`, `ref_transaction`, `contenue`, `created_at`, `updated_at`) VALUES
(1, 16, 'TR-TOTY-226', '[{\"id\":1,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":2,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":3,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":4,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":5,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":6,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":7,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":8,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":9,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":10,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":11,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":12,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":13,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":14,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":15,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":16,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":17,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":18,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":19,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":20,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":21,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":22,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":23,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":24,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":25,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":26,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":27,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":28,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":29,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":30,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":31,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":32,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":33,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":34,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":35,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":36,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":37,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":38,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":39,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":40,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":41,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":42,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":43,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":44,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":45,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":46,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":47,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":48,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":49,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":50,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":51,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":52,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":53,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":54,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":55,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":56,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":57,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":58,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":59,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":60,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":61,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":62,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":63,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":64,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":65,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":66,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":67,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":68,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":69,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":70,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":71,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":72,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":73,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":74,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":75,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":76,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":77,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":78,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":79,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":80,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":81,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":82,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":83,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":84,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":85,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":86,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":87,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":88,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":89,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":90,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":91,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":92,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":93,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":94,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":95,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":96,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":97,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":98,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":99,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":100,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":101,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":102,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":103,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":104,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":105,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":106,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":107,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":108,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":109,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":110,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":111,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":112,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":113,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":114,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":115,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":116,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":117,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":118,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":119,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":120,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":121,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":122,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":123,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":124,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":125,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":126,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":127,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":128,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":129,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":130,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":131,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":132,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":133,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":134,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":135,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":136,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":137,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":138,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":139,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":140,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":141,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":142,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":143,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":144,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":145,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":146,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":147,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":148,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":149,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":150,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":151,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":152,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":153,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":154,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":155,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":156,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":157,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":158,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":159,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":160,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":161,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":162,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":163,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":164,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":165,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":166,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":167,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":168,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":169,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":170,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":171,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":172,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":173,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":174,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":175,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":176,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":177,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":178,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":179,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":180,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":181,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":182,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":183,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":184,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":185,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":186,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":187,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":188,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":189,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":190,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":191,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":192,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":193,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":194,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":195,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":196,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":197,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":198,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":199,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":200,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":201,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":202,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":203,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":204,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":205,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":206,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":207,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":208,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":209,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":210,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":211,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":212,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":213,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":214,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":215,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":216,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":217,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":218,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":219,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":220,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":221,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":222,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":223,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":224,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0},{\"id\":225,\"montant_a_paye\":\"1000\",\"date\":\"2094-11-05T10:22:26.885559Z\",\"statut\":0}]', '2024-08-13 10:22:26', '2024-08-13 10:22:26'),
(2, 17, 'TR-TOTY-63', '[{\"id\":1,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-16T10:31:09.319719Z\",\"statut\":0},{\"id\":2,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-17T10:31:09.319719Z\",\"statut\":0},{\"id\":3,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-18T10:31:09.319719Z\",\"statut\":0},{\"id\":4,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-19T10:31:09.319719Z\",\"statut\":0},{\"id\":5,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-20T10:31:09.319719Z\",\"statut\":0},{\"id\":6,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-21T10:31:09.319719Z\",\"statut\":0},{\"id\":7,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-22T10:31:09.319719Z\",\"statut\":0},{\"id\":8,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-23T10:31:09.319719Z\",\"statut\":0},{\"id\":9,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-24T10:31:09.319719Z\",\"statut\":0},{\"id\":10,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-25T10:31:09.319719Z\",\"statut\":0},{\"id\":11,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-26T10:31:09.319719Z\",\"statut\":0},{\"id\":12,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-27T10:31:09.319719Z\",\"statut\":0},{\"id\":13,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-28T10:31:09.319719Z\",\"statut\":0},{\"id\":14,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-29T10:31:09.319719Z\",\"statut\":0},{\"id\":15,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-30T10:31:09.319719Z\",\"statut\":0},{\"id\":16,\"montant_a_paye\":\"2000\",\"date\":\"2024-10-31T10:31:09.319719Z\",\"statut\":0},{\"id\":17,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-01T10:31:09.319719Z\",\"statut\":0},{\"id\":18,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-02T10:31:09.319719Z\",\"statut\":0},{\"id\":19,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-03T10:31:09.319719Z\",\"statut\":0},{\"id\":20,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-04T10:31:09.319719Z\",\"statut\":0},{\"id\":21,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-05T10:31:09.319719Z\",\"statut\":0},{\"id\":22,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-06T10:31:09.319719Z\",\"statut\":0},{\"id\":23,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-07T10:31:09.319719Z\",\"statut\":0},{\"id\":24,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-08T10:31:09.319719Z\",\"statut\":0},{\"id\":25,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-09T10:31:09.319719Z\",\"statut\":0},{\"id\":26,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-10T10:31:09.319719Z\",\"statut\":0},{\"id\":27,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-11T10:31:09.319719Z\",\"statut\":0},{\"id\":28,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-12T10:31:09.319719Z\",\"statut\":0},{\"id\":29,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-13T10:31:09.319719Z\",\"statut\":0},{\"id\":30,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-14T10:31:09.319719Z\",\"statut\":0},{\"id\":31,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-15T10:31:09.319719Z\",\"statut\":0},{\"id\":32,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-16T10:31:09.319719Z\",\"statut\":0},{\"id\":33,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-17T10:31:09.319719Z\",\"statut\":0},{\"id\":34,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-18T10:31:09.319719Z\",\"statut\":0},{\"id\":35,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-19T10:31:09.319719Z\",\"statut\":0},{\"id\":36,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-20T10:31:09.319719Z\",\"statut\":0},{\"id\":37,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-21T10:31:09.319719Z\",\"statut\":0},{\"id\":38,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-22T10:31:09.319719Z\",\"statut\":0},{\"id\":39,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-23T10:31:09.319719Z\",\"statut\":0},{\"id\":40,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-24T10:31:09.319719Z\",\"statut\":0},{\"id\":41,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-25T10:31:09.319719Z\",\"statut\":0},{\"id\":42,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-26T10:31:09.319719Z\",\"statut\":0},{\"id\":43,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-27T10:31:09.319719Z\",\"statut\":0},{\"id\":44,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-28T10:31:09.319719Z\",\"statut\":0},{\"id\":45,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-29T10:31:09.319719Z\",\"statut\":0},{\"id\":46,\"montant_a_paye\":\"2000\",\"date\":\"2024-11-30T10:31:09.319719Z\",\"statut\":0},{\"id\":47,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-01T10:31:09.319719Z\",\"statut\":0},{\"id\":48,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-02T10:31:09.319719Z\",\"statut\":0},{\"id\":49,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-03T10:31:09.319719Z\",\"statut\":0},{\"id\":50,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-04T10:31:09.319719Z\",\"statut\":0},{\"id\":51,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-05T10:31:09.319719Z\",\"statut\":0},{\"id\":52,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-06T10:31:09.319719Z\",\"statut\":0},{\"id\":53,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-07T10:31:09.319719Z\",\"statut\":0},{\"id\":54,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-08T10:31:09.319719Z\",\"statut\":0},{\"id\":55,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-09T10:31:09.319719Z\",\"statut\":0},{\"id\":56,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-10T10:31:09.319719Z\",\"statut\":0},{\"id\":57,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-11T10:31:09.319719Z\",\"statut\":0},{\"id\":58,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-12T10:31:09.319719Z\",\"statut\":0},{\"id\":59,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-13T10:31:09.319719Z\",\"statut\":0},{\"id\":60,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-14T10:31:09.319719Z\",\"statut\":0},{\"id\":61,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-15T10:31:09.319719Z\",\"statut\":0},{\"id\":62,\"montant_a_paye\":\"2000\",\"date\":\"2024-12-16T10:31:09.319719Z\",\"statut\":0}]', '2024-08-13 10:31:09', '2024-08-13 10:31:09'),
(3, 18, 'TR-TOTY-16', '[{\"id\":1,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-14T10:35:06.720985Z\",\"statut\":0},{\"id\":2,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-15T10:35:06.721043Z\",\"statut\":0},{\"id\":3,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-16T10:35:06.721071Z\",\"statut\":0},{\"id\":4,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-17T10:35:06.721094Z\",\"statut\":0},{\"id\":5,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-18T10:35:06.721116Z\",\"statut\":0},{\"id\":6,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-19T10:35:06.721136Z\",\"statut\":0},{\"id\":7,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-20T10:35:06.721155Z\",\"statut\":0},{\"id\":8,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-21T10:35:06.721174Z\",\"statut\":0},{\"id\":9,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-22T10:35:06.721192Z\",\"statut\":0},{\"id\":10,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-23T10:35:06.721211Z\",\"statut\":0},{\"id\":11,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-24T10:35:06.721229Z\",\"statut\":0},{\"id\":12,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-25T10:35:06.721248Z\",\"statut\":0},{\"id\":13,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-26T10:35:06.721267Z\",\"statut\":0},{\"id\":14,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-27T10:35:06.721285Z\",\"statut\":0},{\"id\":15,\"montant_a_paye\":\"5000\",\"date\":\"2024-08-28T10:35:06.721303Z\",\"statut\":0}]', '2024-08-13 10:35:06', '2024-08-13 10:35:06');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_detail_id_foreign` (`detail_id`),
  ADD KEY `articles_categorie_id_foreign` (`categorie_id`),
  ADD KEY `articles_marque_id_foreign` (`marque_id`),
  ADD KEY `articles_fournisseur_id_foreign` (`fournisseur_id`),
  ADD KEY `articles_client_id_foreign` (`client_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_info_adresse_id_foreign` (`info_adresse_id`),
  ADD KEY `commandes_client_id_foreign` (`client_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_article_id_foreign` (`article_id`);

--
-- Index pour la table `couleurs`
--
ALTER TABLE `couleurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `couleurs_article_id_foreign` (`article_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `favories_article_id_foreign` (`article_id`),
  ADD KEY `favories_client_id_foreign` (`client_id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_adresses`
--
ALTER TABLE `info_adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_adresses_client_id_foreign` (`client_id`);

--
-- Index pour la table `info_livraions`
--
ALTER TABLE `info_livraions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `like_dislikes`
--
ALTER TABLE `like_dislikes`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `taille_articles_article_id_foreign` (`article_id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_commande_id_foreign` (`commande_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `code_promos`
--
ALTER TABLE `code_promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favories`
--
ALTER TABLE `favories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `info_adresses`
--
ALTER TABLE `info_adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `info_livraions`
--
ALTER TABLE `info_livraions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `mode_livraisons`
--
ALTER TABLE `mode_livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suivie_commandes`
--
ALTER TABLE `suivie_commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `taille_articles`
--
ALTER TABLE `taille_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `articles_detail_id_foreign` FOREIGN KEY (`detail_id`) REFERENCES `detail_articles` (`id`),
  ADD CONSTRAINT `articles_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `articles_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `commandes_info_adresse_id_foreign` FOREIGN KEY (`info_adresse_id`) REFERENCES `info_adresses` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `couleurs`
--
ALTER TABLE `couleurs`
  ADD CONSTRAINT `couleurs_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `favories`
--
ALTER TABLE `favories`
  ADD CONSTRAINT `favories_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `favories_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `info_adresses`
--
ALTER TABLE `info_adresses`
  ADD CONSTRAINT `info_adresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `taille_articles`
--
ALTER TABLE `taille_articles`
  ADD CONSTRAINT `taille_articles_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
