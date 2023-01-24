-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 jan. 2023 à 19:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int NOT NULL AUTO_INCREMENT,
  `id_client` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `num_voie` int NOT NULL,
  `voie` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int NOT NULL,
  `pays` varchar(50) NOT NULL,
  `type_adresse` varchar(50) NOT NULL,
  PRIMARY KEY (`id_adresse`),
  KEY `id_client` (`id_client`)
) ;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `id_client`, `num_voie`, `voie`, `ville`, `code_postal`, `pays`, `type_adresse`) VALUES
(1, '23-CLI-0001', 21, 'Rue Léon Dierx', 'Longjumeau', 91160, 'France', 'Livraison'),
(2, '23-CLI-0001', 92, 'Rue Ernest Renan', 'Chaumont', 52000, 'France', 'Facturation'),
(3, '23-CLI-0002', 27, 'Rue Pascal St Claude', 'Neuilly-Sur-Marne', 93330, 'France', 'Facturation'),
(4, '23-CLI-0003', 38, 'Rue Grande Fusterie', 'Bron', 69500, 'France', 'Facturation'),
(5, '23-CLI-0004', 82, 'Rue Frédéric Chopin', 'Vesoul', 70000, 'France', 'Facturation'),
(6, '23-CLI-0005', 14, 'Rue des Soeurs', 'La Celle-Saint-Cloud', 78170, 'France', 'Livraison'),
(7, '23-CLI-0005', 73, 'Rue des Coudriers', 'Muret', 31600, 'France', 'Livraison');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` varchar(50) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `insta` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `membership` varchar(50) NOT NULL,
  `reduction_client` float DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `fb`, `insta`, `mail`, `membership`, `reduction_client`) VALUES
('23-CLI-0005', 'Tisserand', 'Laurine', '', '', 'LirienneTisserand@dayrep.com', '-', NULL),
('23-CLI-0001', 'Chrétien', 'Carole', 'carole.chretien.243', 'carole.c.123', 'carole.chretien@gmail.com', 'Gold', NULL),
('23-CLI-0002', 'Fugère', 'Sylvain', '', '', 'sylv.fug@hotmail.fr', 'Silver', NULL),
('23-CLI-0004', 'Query', 'Florent', '', 'flo.123', 'queryFlorent@gmail.com', 'Platinum', NULL),
('23-CLI-0003', 'Racicot', 'Christian', '', 'chris.365', 'racicot.c@gmail.com', '-', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` varchar(50) NOT NULL,
  `id_client` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prix_commande` float DEFAULT '0',
  `fdp_commande` float DEFAULT '0',
  `statut_commande` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'À payer',
  `date_commande` date NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `alerte` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `prix_commande`, `fdp_commande`, `statut_commande`, `date_commande`, `note`, `alerte`) VALUES
('23-ODR-0001', '23-CLI-0001', 61.98, 0, 'À payer', '2023-01-03', '', NULL),
('23-ODR-0002', '23-CLI-0002', 21.99, 2, 'Terminé', '2022-12-02', '', NULL),
('23-ODR-0003', '23-CLI-0003', 0, 0, 'À payer', '2022-12-09', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

DROP TABLE IF EXISTS `commande_produit`;
CREATE TABLE IF NOT EXISTS `commande_produit` (
  `id_commande` varchar(50) DEFAULT NULL,
  `id_produit` int DEFAULT NULL,
  `quantite` int NOT NULL,
  `statut_produit` varchar(50) DEFAULT NULL,
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id_commande`, `id_produit`, `quantite`, `statut_produit`) VALUES
('23-ODR-0001', 0, 2, NULL),
('23-ODR-0002', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `depense_points`
--

DROP TABLE IF EXISTS `depense_points`;
CREATE TABLE IF NOT EXISTS `depense_points` (
  `nb_points_depense` int NOT NULL,
  `id_client` varchar(50) DEFAULT NULL,
  `date_utilisation` date NOT NULL,
  `mode_utilisation` int NOT NULL,
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

DROP TABLE IF EXISTS `mode_paiement`;
CREATE TABLE IF NOT EXISTS `mode_paiement` (
  `id_mode_paiement` int NOT NULL AUTO_INCREMENT,
  `nom_mode_paiement` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mode_paiement`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mode_paiement`
--

INSERT INTO `mode_paiement` (`id_mode_paiement`, `nom_mode_paiement`) VALUES
(1, 'Virement bancaire'),
(2, 'Espèces'),
(3, 'Carte bleue');

-- --------------------------------------------------------

--
-- Structure de la table `mode_utilisation`
--

DROP TABLE IF EXISTS `mode_utilisation`;
CREATE TABLE IF NOT EXISTS `mode_utilisation` (
  `id_mode_utilisation` int NOT NULL,
  `nom_mode_utilisation` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mode_utilisation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int NOT NULL AUTO_INCREMENT,
  `id_commande` varchar(50) NOT NULL,
  `montant_paiement` float NOT NULL,
  `date_paiement` date NOT NULL,
  `mode_paiement` int NOT NULL,
  PRIMARY KEY (`id_paiement`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id_paiement`, `id_commande`, `montant_paiement`, `date_paiement`, `mode_paiement`) VALUES
(2, '23-ODR-0001', 10, '2023-01-20', 1),
(4, '23-ODR-0002', 21.99, '2023-01-19', 3);

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id_points` int NOT NULL AUTO_INCREMENT,
  `id_client` varchar(50) DEFAULT NULL,
  `nb_points` int NOT NULL,
  `date_obtention` date NOT NULL,
  `date_expiration` date NOT NULL,
  PRIMARY KEY (`id_points`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `points`
--

INSERT INTO `points` (`id_points`, `id_client`, `nb_points`, `date_obtention`, `date_expiration`) VALUES
(1, '23-CLI-0001', 32, '2022-12-06', '2023-12-06'),
(2, '23-CLI-0001', 26, '2023-01-03', '2023-07-03'),
(3, '23-CLI-0002', 12, '2022-03-21', '2023-03-21');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `prix_produit` float NOT NULL,
  `reduction_produit` float DEFAULT '0',
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `prix_produit`, `reduction_produit`) VALUES
(0, 'Jellycat Storm Poulpe Petite - 23cm', 30.99, 0),
(1, 'Jellycat Vivacious Vegetable Brocoli - 17cm', 21.99, 0),
(2, 'Jellycat Sage Dragon - 12x50cm', 64.99, 0);

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

DROP TABLE IF EXISTS `telephone`;
CREATE TABLE IF NOT EXISTS `telephone` (
  `id_telephone` int NOT NULL AUTO_INCREMENT,
  `id_client` varchar(50) DEFAULT NULL,
  `num_telephone` varchar(50) DEFAULT NULL,
  `code_region` int NOT NULL,
  PRIMARY KEY (`id_telephone`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `telephone`
--

INSERT INTO `telephone` (`id_telephone`, `id_client`, `num_telephone`, `code_region`) VALUES
(1, '23-CLI-0001', '01 33 62 28 96', 33),
(2, '23-CLI-0001', '06 09 39 23 62', 33),
(3, '23-CLI-0002', '06 36 41 52 50', 33),
(16, '23-CLI-0005', '04 22 91 75 66', 33),
(15, '23-CLI-0004', '03 57 18 24 19', 33),
(14, '23-CLI-0003', '06 12 37 53 95', 33),
(13, '23-CLI-0003', '01 12 37 53 95', 33),
(17, '23-CLI-0005', '04 71 58 00 98', 33);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
