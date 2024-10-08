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
-- Structure de la table `taille_articles`
--

CREATE TABLE `taille_articles` (
  `id` int(10) NOT NULL,
  `ref_taille_article` varchar(15) NOT NULL,
  `ref_article` varchar(15) NOT NULL,
  `libelle_taille_article` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `taille_articles`
--

INSERT INTO `taille_articles` (`id`, `ref_taille_article`, `ref_article`, `libelle_taille_article`) VALUES
(1, 'TAILART1', 'ART1', 'XL'),
(2, 'TAILART2', 'ART1', 'L'),
(3, 'TAILART3', 'ART2', 'L'),
(4, 'TAILART4', 'ART2', 'XXL'),
(5, 'TAILART5', 'ART3', 'M');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `taille_articles`
--
ALTER TABLE `taille_articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `taille_articles`
--
ALTER TABLE `taille_articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
