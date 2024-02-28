-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 avr. 2023 à 18:44
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

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
-- Structure de la table `detail_articles`
--

CREATE TABLE `detail_articles` (
  `id` int(10) NOT NULL,
  `ref_detail_article` varchar(15) NOT NULL,
  `ref_article` varchar(15) NOT NULL,
  `libelle1` varchar(25) NOT NULL,
  `valeur1` varchar(50) NOT NULL,
  `libelle2` varchar(25) NOT NULL,
  `valeur2` varchar(50) NOT NULL,
  `libelle3` varchar(25) NOT NULL,
  `valeur3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `detail_articles`
--

INSERT INTO `detail_articles` (`id`, `ref_detail_article`, `ref_article`, `libelle1`, `valeur1`, `libelle2`, `valeur2`, `libelle3`, `valeur3`) VALUES
(1, 'DETART1', 'ART1', 'Elastic rib', 'Cotton 95%, Elastane 5%', 'Lining', 'Cotton 100%', '', 'Cotton 80%, Polyester 20%'),
(2, 'DETART2', 'ART2', 'HGHGF', 'HFHGTFH', 'HFHFVH', 'HGFTH', 'HVHG', 'HGCGCF');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `detail_articles`
--
ALTER TABLE `detail_articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `detail_article`
--
ALTER TABLE `detail_articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
