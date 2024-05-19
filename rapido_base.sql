-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 19 mai 2024 à 20:23
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rapido_base`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenoms` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `nom`, `prenoms`, `email`, `telephone`, `sexe`, `mot_de_passe`, `createdAt`, `updatedAt`) VALUES
(1, 'Aitondji', 'Tolome Didier', 'didiertose@gmail.com', '63116556', 'M', 'd1e8872b507223f3afb35422f7859616', '2024-05-18 20:53:45', '2024-05-18 20:53:45');

-- --------------------------------------------------------

--
-- Structure de la table `chauffeurs`
--

DROP TABLE IF EXISTS `chauffeurs`;
CREATE TABLE IF NOT EXISTS `chauffeurs` (
  `chauffeur_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenoms` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `disponible` int NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `retirer` int DEFAULT '0',
  `admin_created_id` int DEFAULT NULL,
  `admin_updated_id` int DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chauffeur_id`),
  KEY `admin_created_id` (`admin_created_id`),
  KEY `admin_updated_id` (`admin_updated_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chauffeurs`
--

INSERT INTO `chauffeurs` (`chauffeur_id`, `nom`, `prenoms`, `telephone`, `sexe`, `disponible`, `mot_de_passe`, `email`, `retirer`, `admin_created_id`, `admin_updated_id`, `createdAt`, `updatedAt`) VALUES
(1, 'DANNON', 'Claude', '61421676', 'M', 1, '4f3e22a3a3684263cb39d5390bf516ac', 'dannonclaude@gmail.com', 0, 1, NULL, '2024-05-18 21:17:52', '2024-05-19 15:09:38'),
(2, 'GODOVO ', 'Sessi Dalmeda', '40942258', 'M', 0, 'e61ca95c99736a9e02ff186acd82c287', '', 0, 1, NULL, '2024-05-18 21:20:19', '2024-05-19 15:10:03'),
(3, 'BOTON', 'Barnabé Dékidja', '69832647', 'M', 0, '1e1e189464d6dad6d17550046e11bbce', '', 0, 1, NULL, '2024-05-18 21:21:42', '2024-05-19 09:54:46'),
(4, 'MINA', 'Kavo Doré', '40942259', 'F', 1, 'be6737e8b6e9dc89206a16208e9c004d', '', 0, 1, NULL, '2024-05-18 21:22:28', '2024-05-19 13:17:06'),
(5, 'MOULéro', 'Davi Eude', '41229450', 'M', 0, '9ea1619981a96b2dc3250d14e578d873', '', 1, 1, NULL, '2024-05-18 21:23:56', '2024-05-19 09:46:11');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `point_depart` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `point_arrivee` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_heure` datetime NOT NULL,
  `chauffeur_id` int DEFAULT NULL,
  `operateur_id` int DEFAULT NULL,
  `admin_created_id` int DEFAULT NULL,
  `admin_updated_id` int DEFAULT NULL,
  `statut` int NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`),
  KEY `chauffeur_id` (`chauffeur_id`),
  KEY `operateur_id` (`operateur_id`),
  KEY `admin_created_id` (`admin_created_id`),
  KEY `admin_updated_id` (`admin_updated_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`course_id`, `point_depart`, `point_arrivee`, `date_heure`, `chauffeur_id`, `operateur_id`, `admin_created_id`, `admin_updated_id`, `statut`, `createdAt`, `updatedAt`) VALUES
(1, 'Dangbo', 'Cotonou', '2024-05-31 08:00:00', 3, NULL, 1, NULL, 2, '2024-05-18 21:15:20', '2024-05-18 22:11:42'),
(2, 'Dangbo', 'Covè', '2024-05-20 10:00:00', 1, NULL, 1, NULL, 2, '2024-05-18 23:17:29', '2024-05-19 03:39:16'),
(3, 'Dangbo', 'Akassato', '2024-05-24 18:00:00', 4, NULL, 1, NULL, 2, '2024-05-19 03:38:37', '2024-05-19 03:41:30'),
(4, 'Dangbo', 'Covè', '2024-05-24 08:00:00', 1, 2, NULL, NULL, 2, '2024-05-19 03:43:14', '2024-05-19 09:50:01'),
(5, 'Dangbo', 'Calavi', '2024-05-19 15:00:00', 3, NULL, 1, NULL, 2, '2024-05-19 09:53:22', '2024-05-19 09:54:46'),
(6, 'Dangbo', 'Cotonou', '2024-05-17 15:02:00', 4, NULL, 1, NULL, 2, '2024-05-19 11:02:35', '2024-05-19 13:20:24'),
(7, 'Djèvali', 'Cotonou', '2024-05-24 08:00:00', 4, NULL, 1, NULL, 1, '2024-05-19 11:02:53', '2024-05-19 13:17:06'),
(8, 'Dangbo', 'Cotonou', '2024-05-24 08:00:00', NULL, 3, NULL, NULL, 0, '2024-05-19 15:07:09', '2024-05-19 15:07:09'),
(9, 'Dangbo', 'Akassato', '2024-05-16 14:00:00', NULL, 3, NULL, NULL, 0, '2024-05-19 15:07:31', '2024-05-19 15:07:31'),
(10, 'Djèvali', 'Akassato', '2024-05-24 15:00:00', NULL, 3, NULL, NULL, 0, '2024-05-19 15:07:54', '2024-05-19 15:07:54'),
(11, 'Dangbo', 'Covè', '2024-05-23 15:00:00', 2, 3, NULL, NULL, 2, '2024-05-19 15:08:15', '2024-05-19 15:10:03'),
(12, 'Dangbo', 'Cotonou', '2024-05-22 09:00:00', 1, 3, NULL, NULL, 1, '2024-05-19 15:08:34', '2024-05-19 15:09:38');

-- --------------------------------------------------------

--
-- Structure de la table `operateurs`
--

DROP TABLE IF EXISTS `operateurs`;
CREATE TABLE IF NOT EXISTS `operateurs` (
  `operateur_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenoms` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `retirer` int DEFAULT '0',
  `creator_id` int DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`operateur_id`),
  KEY `creator_id` (`creator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `operateurs`
--

INSERT INTO `operateurs` (`operateur_id`, `nom`, `prenoms`, `telephone`, `sexe`, `mot_de_passe`, `email`, `retirer`, `creator_id`, `createdAt`, `updatedAt`) VALUES
(1, 'ABIBOU', 'Moufid Dobé', '45255898', 'F', '12e497590622c75de3124f089ed19971', 'dobemoufid@gmail.com', 0, 1, '2024-05-18 21:25:12', '2024-05-19 03:26:50'),
(2, 'Amandji', 'Vidégnon Yves', '91245878', 'M', '8effc3f97bf94044e151dc8b0e7b7dd4', 'yves@gmail.com', 0, 1, '2024-05-18 21:26:59', '2024-05-19 03:26:54'),
(3, 'VONGNON', 'Désiré Danvi', '56254568', 'M', '96702d9e503349fd97bc91125313eb25', 'danvvon@gmail.com', 0, 1, '2024-05-18 21:29:45', '2024-05-19 15:04:11'),
(4, 'Yonlonfi', 'Azé Tchègoun', '95412452', 'M', '9ccaa5052b87c0ed64048da7aa2c8288', 'aze@gmail.com', 0, 1, '2024-05-18 21:31:20', '2024-05-18 21:31:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
