-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 fév. 2024 à 11:32
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
-- Base de données : `sae_taxon`
--

-- --------------------------------------------------------

--
-- Structure de la table `taxon_enregistrer`
--

DROP TABLE IF EXISTS `taxon_enregistrer`;
CREATE TABLE IF NOT EXISTS `taxon_enregistrer` (
  `id` int NOT NULL,
  `scientificName` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `frenchVernacularName` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `englishVernacularName` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `authority` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `id_utilisateur` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` blob,
  `kingdomName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_utilisateur`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `taxon_enregistrer`
--

INSERT INTO `taxon_enregistrer` (`id`, `scientificName`, `frenchVernacularName`, `englishVernacularName`, `authority`, `date_ajout`, `id_utilisateur`, `note`, `image`, `kingdomName`) VALUES
(490, 'Piscicola geometra', 'Sangsue géomètre, Sangsue piscicole', 'Fish Leech', '(Linnaeus, 1758)', '2023-12-20', 24, NULL, NULL, NULL),
(4603, 'Loxia curvirostra', 'Bec-croisé des sapins', 'Common Crossbill', 'Linnaeus, 1758', '2024-01-18', 24, NULL, NULL, 'Animalia'),
(4613, 'Pinicola enucleator', 'Durbec des sapins', 'Pine Grosbeak', '(Linnaeus, 1758)', '2024-01-18', 24, NULL, NULL, 'Animalia'),
(41180, 'Typhula abietina', 'Typhule des sapins', '', '(Fuckel) Corner, 1950', '2024-01-18', 24, NULL, NULL, 'Fungi'),
(37590, 'Phellinus hartigii', 'Polypore du sapin, Phellin de Hartig', '', '(Allesch. & Schnabl) Pat., 1903', '2024-01-18', 24, NULL, NULL, 'Fungi'),
(446719, 'Araucaria luxurians', 'Pin colonnaire, Sapin de Noël', 'Coast araucaria', '(Brongn. & Gris) de Laub., 1972', '2024-01-18', 24, NULL, NULL, 'Plantae'),
(673112, 'Callitris sulcata', 'Sapin de Comboui', '', '(Parl.) Schltr.', '2024-01-18', 24, NULL, NULL, 'Plantae'),
(762061, 'Picea mariana', 'Epicéa noir, Epinette noire, Sapinette noire', '', '(Mill.) Britton, Sterns & Poggenb., 1888', '2024-01-18', 24, NULL, NULL, 'Plantae'),
(79349, 'Abies pinsapo', 'Sapin d\'Espagne', 'Spanish Fir', 'Boiss., 1838', '2024-01-18', 24, NULL, NULL, 'Plantae'),
(717024, 'Abies chensiensis', 'Sapin de Shaanxi', '', 'Tiegh., 1892', '2024-01-18', 24, NULL, NULL, 'Plantae'),
(717025, 'Abies cilicica', 'Sapin de Cilicie, Sapin du Taurus', '', '(Antoine & Kotschy) Carrière, 1855', '2024-01-18', 24, NULL, NULL, 'Plantae'),
(670819, 'Agathis ovata', 'Kaori de montagne', '', '(C.Moore ex Vieill.) Warb., 1900', '2024-01-18', 24, NULL, NULL, 'Plantae'),
(1016782, 'Diachea radiata', '', '', 'G.Lister. & Petch, 1916', '2024-01-18', 24, NULL, NULL, 'Protozoa'),
(987518, 'Nicon maculata', '', '', 'Kinberg, 1865', '2024-01-18', 24, NULL, NULL, 'Animalia'),
(886954, 'Omodeoscolex divergens', '', '', '(Cognetti, 1905)', '2024-01-18', 24, NULL, NULL, 'Animalia'),
(674552, 'Nicon moniloceras', '', '', '(Hartman, 1940)', '2024-01-18', 24, 'kjefzù zmv;szcfzù,kq\r\nùzcf,:k^xqxkdf,mpqs\r\n', NULL, 'Animalia'),
(1001025, 'Nicon pettiboneae', '', '', 'Leon-Gonzalez & Salazar-Vallejo, 2003', '2024-01-18', 24, NULL, NULL, 'Animalia'),
(672772, 'Stenoninereis martini', '', '', 'Wesenberg-Lund, 1958', '2024-01-18', 24, NULL, NULL, 'Animalia'),
(42603, 'Gloeophyllum abietinum', 'Lenzite du sapin', '', '(Bull.) P.Karst., 1882', '2024-01-18', 24, NULL, NULL, 'Fungi'),
(968171, 'Butyriboletus subappendiculatus', 'Bolet des sapins', '', '(Dermek, Lazebn. & J.Veselský) D.Arora & J.L.Frank, 2014', '2024-01-18', 24, NULL, NULL, 'Fungi'),
(39341, 'Lactarius intermedius', 'Lactaire des sapins', '', '(Fr. ?) Cooke', '2024-01-18', 24, NULL, NULL, 'Fungi'),
(987518, 'Nicon maculata', '', '', 'Kinberg, 1865', '2024-01-19', 27, NULL, NULL, 'Animalia'),
(464520, 'Melampsorella caryophyllacearum', 'Dorge du sapin, Chaudron', '', '(DC.) J.Schröt., 1874', '2024-01-21', 28, NULL, NULL, 'Fungi'),
(924969, 'Syllis schulzi', '', '', '(Hartmann-Schröder, 1960)', '2024-01-19', 24, 'a', NULL, 'Animalia'),
(187970, 'Nephroselmidaceae', '', '', 'Skuja ex P.C. Silva, 1980', '2024-01-23', 29, NULL, NULL, 'Plantae'),
(987518, 'Nicon maculata', '', '', 'Kinberg, 1865', '2024-01-23', 29, NULL, NULL, 'Animalia'),
(446719, 'Araucaria luxurians', 'Pin colonnaire, Sapin de Noël', 'Coast araucaria', '(Brongn. & Gris) de Laub., 1972', '2024-01-21', 28, NULL, NULL, 'Plantae'),
(4603, 'Loxia curvirostra', 'Bec-croisé des sapins', 'Common Crossbill', 'Linnaeus, 1758', '2024-01-21', 28, 'C\'est un oiseau', NULL, 'Animalia'),
(987518, 'Nicon maculata', '', '', 'Kinberg, 1865', '2024-01-21', 28, NULL, NULL, 'Animalia'),
(371844, 'Micromaldane ornithochaeta', '', '', 'Mesnil, 1897', '2024-01-21', 28, NULL, NULL, 'Animalia'),
(4001, 'Erithacus rubecula', 'Rougegorge familier', 'European Robin', '(Linnaeus, 1758)', '2024-02-01', 24, 'caca\r\n', NULL, 'Animalia'),
(4001, 'Erithacus rubecula', 'Rougegorge familier', 'European Robin', '(Linnaeus, 1758)', '2024-01-23', 29, 'Ceci est un oiseau', NULL, 'Animalia'),
(3153, 'Eudromias morinellus', 'Guignard d\'Eurasie, Pluvier guignard', 'Eurasian Dotterel', '(Linnaeus, 1758)', '2024-01-23', 29, NULL, NULL, 'Animalia'),
(441755, 'Charadrius wilsonia', 'Pluvier de Wilson, Gravelot de Wilson, Collier', 'Wilson\'s Plover', 'Ord, 1814', '2024-01-23', 29, NULL, NULL, 'Animalia'),
(699127, 'Salamandra lanzai', 'Salamandre de Lanza (La)', 'Lanza’s (Alpine) Salamander', '(Nascetti, Andreone, Capula & Bullini, 1988)', '2024-01-23', 29, 'Après une note, ca l\'ajoute', NULL, 'Animalia'),
(233090, 'Eophila bartolii', '', '', 'Bouché, 1970', '2024-02-01', 24, NULL, NULL, 'Animalia'),
(233145, 'Ethnodrilus lydiae', '', '', 'Bouché, 1972', '2024-02-01', 24, NULL, NULL, 'Animalia'),
(233144, 'Ethnodrilus gatesi', '', '', 'Bouché, 1972', '2024-02-01', 24, NULL, NULL, 'Animalia'),
(371844, 'Micromaldane ornithochaeta', '', '', 'Mesnil, 1897', '2024-02-01', 24, NULL, NULL, 'Animalia'),
(386744, 'Nereis lamellosa', '', '', 'Ehlers, 1864', '2024-02-01', 24, NULL, NULL, 'Animalia'),
(446719, 'Araucaria luxurians', 'Pin colonnaire, Sapin de Noël', 'Coast araucaria', '(Brongn. & Gris) de Laub., 1972', '2024-02-01', 30, NULL, NULL, 'Plantae'),
(656299, 'Epiperipatus edwardsii', '', '', '(Blanchard, 1847)', '2024-02-03', 24, 'hubjsdktbgx', NULL, 'Animalia'),
(464520, 'Melampsorella caryophyllacearum', 'Dorge du sapin, Chaudron', '', '(DC.) J.Schröt., 1874', '2024-02-01', 30, NULL, NULL, 'Fungi'),
(458466, 'Zizina antanossa', '', '', '(Mabille, 1877)', '2024-02-03', 24, NULL, NULL, 'Animalia');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mot_de_passe` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `IsAdmin` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_inscription` date DEFAULT NULL,
  `pdp_photo` blob,
  PRIMARY KEY (`id`),
  KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `mail`, `mot_de_passe`, `IsAdmin`, `date_inscription`, `pdp_photo`) VALUES
(30, 'Cacaaaaa', 'asfm@gmail.com', '$2y$10$T0RnY5elknOfqHZo0Isu4uH3emm72LGWUxlrKH/p5mVc2.03/t9qG', '0', '2024-02-01', NULL),
(28, 'Hugo2', 'test@test.com', '$2y$10$kAUyM/EIgHoq2Gg4cIYkZeBcd2t5/quBaJ/ojBMWqtBNPr2r5j9eW', '0', '2024-01-22', NULL),
(29, 'bout', 'a@a.aa', '$2y$10$4jFXwm1OCVn8uvLZffEnZ.T2qu6o4mU0ppbrN5f0EQOQyhQfBOhC2', '0', '2024-01-23', NULL),
(27, 'alfkqs;cf,mksùf;,spdgpfjùq;lgndskmlfdhmqgsjkjdglsr,dfkgqnlfmsgfl', 'hugo.molinier@e.c', '$2y$10$pSVoR3ZpMbUocNOu0/wk8unmDvHt1smeEC8Axa6rINMDCddWB0pbC', '0', '2024-01-19', NULL),
(26, 'Hugo', 'aaaaaaaaaaaaaaaa@dclks.c', '$2y$10$6dczkktpVHRKxd2bGmMvq.lnkYHz3/V6LnTuW61FgtjYuTBOfGIiq', '0', '2024-01-18', NULL),
(25, 'jh,plmjnj;omijlmni,mo,jùmln;klmoiù,klnjùok', 'gogomolinier@gmail.com', '$2y$10$iThSv1P/n4bl/5AMRKGQCerELQlPjQEHiTGp3Fl4tAqP5vQB1dR/i', '0', '2023-12-20', NULL),
(24, 'a', 'a@a.a', '$2y$10$gQS/XZeLkHcN60vKy1tHT.zvhx800iopDxaG8nBxcUJhP48vamU3q', '0', '2023-12-20', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
