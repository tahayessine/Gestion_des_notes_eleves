-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 21 avr. 2024 à 10:51
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `school`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdministrateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdministrateur`, `nom`, `prenom`, `motDePasse`) VALUES
(444243, 'Taher', 'Hakim', '0000'),
(444244, 'mahdhbi', 'olfa', 'olfa123'),
(11178760, 'benamor', 'yessine', 'yessine123');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(50) NOT NULL,
  `niveau` enum('1','2','3','4','5','6') NOT NULL,
  `idEcole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `niveau`, `idEcole`) VALUES
(12, 'B', '6', 123),
(13, 'A', '1', 123),
(14, 'A', '2', 123),
(15, 'A', '3', 123),
(16, 'B', '4', 123),
(17, 'B', '5', 123),
(18, 'A', '6', 123),
(19, 'B', '1', 123),
(20, 'B', '2', 123);

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `idDirecteur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `idEcole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`idDirecteur`, `nom`, `prenom`, `email`, `motDePasse`, `idEcole`) VALUES
(313236, 'Yamen', 'Fourati', 'yamenfouarti@gmail.com', '0000', 123);

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `idEcole` int(11) NOT NULL,
  `nomEcole` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `codePostal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`idEcole`, `nomEcole`, `adresse`, `ville`, `codePostal`) VALUES
(123, 'Ecole primaire Hajeb', 'rue Matar km 8', 'Sfax', '3078'),
(124, 'Ecole Premier Taher Haded', 'Djerba Zarzis ', 'Medinine ', '5000'),
(125, 'Taher Sfar', 'Mahdia', 'Eljam', '4015'),
(126, 'Ecole Primaire city Ennour', 'Tunis', 'Rades', '3000'),
(127, 'Ecole Primaire city Ennour', 'SFAX', 'thyna', '3078');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `idEleve` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` enum('Masculin','Féminin') NOT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `idParent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `nom`, `prenom`, `dateNaissance`, `sexe`, `id_classe`, `idParent`) VALUES
(22113345, 'Ben Amor', 'Walid', '2007-06-22', 'Masculin', 12, 11121315),
(22113346, 'Ben Slimane', 'Amina', '2006-09-18', 'Féminin', 12, 11121316),
(22113347, 'Ben Salah', 'Mehdi', '2009-02-05', 'Masculin', 12, 11121317),
(22113348, 'Ben Amor', 'Yasmin', '2008-11-30', 'Féminin', 12, 11121318),
(22113349, 'Ben Farhat', 'Khaled', '2007-04-12', 'Masculin', 12, 11121319),
(22113350, 'Ben Mahmoud', 'Rania', '2006-07-28', 'Féminin', 12, 11121320),
(22113351, 'Ben Mabrouk', 'Anis', '2009-01-03', 'Masculin', 12, 11121321),
(22113352, 'Ben Saad', 'Sara', '2008-10-19', 'Féminin', 12, 11121322),
(22113353, 'Ben Gara', 'Mohamed', '2007-05-24', 'Masculin', 12, 11121323),
(22113354, 'Ben Mbarek', 'Salma', '2006-08-11', 'Féminin', 12, 11121324),
(22113355, 'Ben Said', 'Hichem', '2009-03-28', 'Masculin', 12, 11121325),
(22113356, 'Ben Ameur', 'Sabrine', '2008-12-15', 'Féminin', 12, 11121326),
(22113357, 'Ben Nasri', 'Mouna', '2007-03-20', 'Féminin', 12, 11121327),
(22113358, 'Ben Hassine', 'Wael', '2006-06-07', 'Masculin', 12, 11121328),
(22113359, 'Ben Othman', 'Marwa', '2009-01-23', 'Féminin', 12, 11121329),
(22113360, 'Ben Hmida', 'Wassim', '2008-10-10', 'Masculin', 12, 11121330),
(22113361, 'Ben Youssef', 'Rania', '2007-07-17', 'Féminin', 12, 11121314),
(22113362, 'Ben Hassen', 'Samir', '2006-04-25', 'Masculin', 12, 11121315),
(22113363, 'Ben Ouerghi', 'Lina', '2009-02-01', 'Féminin', 12, 11121316),
(22113364, 'saleh eddine', 'abedkader', '2024-01-10', 'Masculin', 12, 11121326),
(22113367, 'Amri', 'jawher', '2016-11-10', 'Féminin', 12, 11121328),
(22113368, 'Amri', 'mohsen', '2015-07-21', 'Féminin', 20, 12345610);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`) VALUES
(1, 'Mathématiques'),
(2, 'Français'),
(3, 'Histoire'),
(4, 'Sciences'),
(5, 'Géographie');

-- --------------------------------------------------------

--
-- Structure de la table `moyenne`
--

CREATE TABLE `moyenne` (
  `idMoyenne` int(11) NOT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL,
  `moyenne` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idNote` int(11) NOT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idNote`, `idEleve`, `id_matiere`, `note`) VALUES
(15435, 22113361, 1, 7),
(15436, 22113345, 1, 18),
(15437, 22113362, 1, 4),
(15438, 22113346, 1, 9),
(15439, 22113363, 1, 11),
(15440, 22113347, 1, 9),
(15441, 22113348, 1, 10),
(15442, 22113349, 1, 6),
(15443, 22113350, 1, 19),
(15444, 22113351, 1, 17),
(15445, 22113352, 1, 6),
(15446, 22113353, 1, 20),
(15447, 22113354, 1, 0),
(15448, 22113355, 1, 4),
(15449, 22113356, 1, 1),
(15450, 22113364, 1, 12),
(15451, 22113357, 1, 16),
(15452, 22113358, 1, 2),
(15453, 22113367, 1, 6),
(15454, 22113359, 1, 2),
(15455, 22113360, 1, 15),
(15466, 22113361, 2, 4),
(15467, 22113345, 2, 18),
(15468, 22113362, 2, 16),
(15469, 22113346, 2, 3),
(15470, 22113363, 2, 10),
(15471, 22113347, 2, 1),
(15472, 22113348, 2, 15),
(15473, 22113349, 2, 10),
(15474, 22113350, 2, 5),
(15475, 22113351, 2, 17),
(15476, 22113352, 2, 7),
(15477, 22113353, 2, 8),
(15478, 22113354, 2, 17),
(15479, 22113355, 2, 1),
(15480, 22113356, 2, 16),
(15481, 22113364, 2, 14),
(15482, 22113357, 2, 1),
(15483, 22113358, 2, 8),
(15484, 22113367, 2, 15),
(15485, 22113359, 2, 9),
(15486, 22113360, 2, 1),
(15497, 22113361, 3, 4),
(15498, 22113345, 3, 15),
(15499, 22113362, 3, 19),
(15500, 22113346, 3, 9),
(15501, 22113363, 3, 11),
(15502, 22113347, 3, 8),
(15503, 22113348, 3, 7),
(15504, 22113349, 3, 11),
(15505, 22113350, 3, 16),
(15506, 22113351, 3, 2),
(15507, 22113352, 3, 7),
(15508, 22113353, 3, 6),
(15509, 22113354, 3, 9),
(15510, 22113355, 3, 6),
(15511, 22113356, 3, 4),
(15512, 22113364, 3, 1),
(15513, 22113357, 3, 16),
(15514, 22113358, 3, 16),
(15515, 22113367, 3, 11),
(15516, 22113359, 3, 5),
(15517, 22113360, 3, 16),
(15528, 22113361, 4, 1),
(15529, 22113345, 4, 6),
(15530, 22113362, 4, 8),
(15531, 22113346, 4, 20),
(15532, 22113363, 4, 13),
(15533, 22113347, 4, 6),
(15534, 22113348, 4, 13),
(15535, 22113349, 4, 3),
(15536, 22113350, 4, 0),
(15537, 22113351, 4, 13),
(15538, 22113352, 4, 0),
(15539, 22113353, 4, 5),
(15540, 22113354, 4, 3),
(15541, 22113355, 4, 0),
(15542, 22113356, 4, 15),
(15543, 22113364, 4, 11),
(15544, 22113357, 4, 12),
(15545, 22113358, 4, 8),
(15546, 22113367, 4, 1),
(15547, 22113359, 4, 6),
(15548, 22113360, 4, 5),
(15559, 22113361, 5, 2),
(15560, 22113345, 5, 4),
(15561, 22113362, 5, 15),
(15562, 22113346, 5, 2),
(15563, 22113363, 5, 8),
(15564, 22113347, 5, 13),
(15565, 22113348, 5, 1),
(15566, 22113349, 5, 6),
(15567, 22113350, 5, 7),
(15568, 22113351, 5, 16),
(15569, 22113352, 5, 19),
(15570, 22113353, 5, 6),
(15571, 22113354, 5, 15),
(15572, 22113355, 5, 15),
(15573, 22113356, 5, 12),
(15574, 22113364, 5, 13),
(15575, 22113357, 5, 9),
(15576, 22113358, 5, 7),
(15577, 22113367, 5, 7),
(15578, 22113359, 5, 16),
(15579, 22113360, 5, 16),
(18000, 22113368, 1, 17),
(18001, 22113368, 2, 9),
(18002, 22113368, 3, 16.95),
(18003, 22113368, 1, 18.25),
(18004, 22113368, 4, 18.25),
(18005, 22113368, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE `parents` (
  `idParent` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parents`
--

INSERT INTO `parents` (`idParent`, `nom`, `prenom`, `email`, `motDePasse`) VALUES
(11121314, 'Ben Ahmed', 'Ahmed', 'ahmed.benahmed@exemple.com', '0000'),
(11121315, 'Ben Mohamed', 'Mohamed', 'mohamed.benmohamed@exemple.com', '0000'),
(11121316, 'Ben Ali', 'Ali', 'ali.benali@exemple.com', '0000'),
(11121317, 'Ben Fatima', 'Fatima', 'fatima.benfatima@exemple.com', '0000'),
(11121318, 'Ben Hédi', 'Hédi', 'hedi.benhedi@exemple.com', '0000'),
(11121319, 'Ben Sami', 'Sami', 'sami.bensami@exemple.com', '0000'),
(11121320, 'Ben Nadia', 'Nadia', 'nadia.bennadia@exemple.com', '0000'),
(11121321, 'Ben Youssef', 'Youssef', 'youssef.benyoussef@exemple.com', '0000'),
(11121322, 'Ben Amina', 'Amina', 'amina.benamina@exemple.com', '0000'),
(11121323, 'Ben Hassen', 'Hassen', 'hassen.benhassen@exemple.com', '0000'),
(11121324, 'Ben Ahmed', 'Mohamed', 'mohamed.benahmed@exemple.com', '0000'),
(11121325, 'Ben Mohamed', 'Ali', 'ali.benmohamed@exemple.com', '0000'),
(11121326, 'Ben Ali', 'Fatima', 'fatima.benali@exemple.com', '0000'),
(11121327, 'Ben Fatima', 'Hédi', 'hedi.benfatima@exemple.com', '0000'),
(11121328, 'Ben Hédi', 'Sami', 'sami.benhedi@exemple.com', '0000'),
(11121329, 'Ben Sami', 'Nadia', 'nadia.bensami@exemple.com', '0000'),
(11121330, 'Ben Nadia', 'Youssef', 'youssef.bennadia@exemple.com', '0000'),
(11121331, 'Ben Youssef', 'Amina', 'amina.benyoussef@exemple.com', '0000'),
(11121332, 'Ben Amina', 'Hassen', 'hassen.benamina@exemple.com', '0000'),
(11121333, 'Ben Hassen', 'Ahmed', 'ahmed.benhassen@exemple.com', '0000'),
(12345610, 'Amri', 'Med', 'tijijem736@mcenb.com', '4xa2P8oX)o');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `idPresence` int(11) NOT NULL,
  `idEleve` int(11) DEFAULT NULL,
  `datePresence` date NOT NULL,
  `etat` enum('A','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`idPresence`, `idEleve`, `datePresence`, `etat`) VALUES
(1, 22113357, '2024-04-11', 'A'),
(2, 22113367, '2024-04-11', 'A'),
(3, 22113356, '2024-04-02', 'A'),
(4, 22113345, '2024-04-20', 'P'),
(5, 22113346, '2024-04-20', 'P'),
(6, 22113347, '2024-04-20', 'P'),
(7, 22113348, '2024-04-20', 'P'),
(8, 22113349, '2024-04-20', 'P'),
(9, 22113350, '2024-04-20', 'P'),
(10, 22113351, '2024-04-20', 'P'),
(11, 22113352, '2024-04-20', 'P'),
(12, 22113353, '2024-04-20', 'P'),
(13, 22113354, '2024-04-20', 'P'),
(14, 22113355, '2024-04-20', 'P'),
(15, 22113356, '2024-04-20', 'P'),
(16, 22113357, '2024-04-20', 'P'),
(17, 22113358, '2024-04-20', 'P'),
(18, 22113359, '2024-04-20', 'P'),
(19, 22113360, '2024-04-20', 'P'),
(20, 22113361, '2024-04-20', 'P'),
(21, 22113362, '2024-04-20', 'P'),
(22, 22113363, '2024-04-20', 'P'),
(23, 22113364, '2024-04-20', 'P'),
(24, 22113367, '2024-04-20', 'P'),
(25, 22113345, '2024-04-20', 'P'),
(26, 22113346, '2024-04-20', 'P'),
(27, 22113347, '2024-04-20', 'P'),
(28, 22113348, '2024-04-20', 'P'),
(29, 22113349, '2024-04-20', 'P'),
(30, 22113350, '2024-04-20', 'P'),
(31, 22113351, '2024-04-20', 'P'),
(32, 22113352, '2024-04-20', 'P'),
(33, 22113353, '2024-04-20', 'P'),
(34, 22113354, '2024-04-20', 'P'),
(35, 22113355, '2024-04-20', 'P'),
(36, 22113356, '2024-04-20', 'P'),
(37, 22113357, '2024-04-20', 'P'),
(38, 22113358, '2024-04-20', 'P'),
(39, 22113359, '2024-04-20', 'P'),
(40, 22113360, '2024-04-20', 'P'),
(41, 22113361, '2024-04-20', 'P'),
(42, 22113362, '2024-04-20', 'P'),
(43, 22113363, '2024-04-20', 'P'),
(44, 22113364, '2024-04-20', 'P'),
(45, 22113367, '2024-04-20', 'P'),
(46, 22113345, '2024-04-20', 'P'),
(47, 22113346, '2024-04-20', 'P'),
(48, 22113347, '2024-04-20', 'P'),
(49, 22113348, '2024-04-20', 'P'),
(50, 22113349, '2024-04-20', 'P'),
(51, 22113350, '2024-04-20', 'P'),
(52, 22113351, '2024-04-20', 'P'),
(53, 22113352, '2024-04-20', 'P'),
(54, 22113353, '2024-04-20', 'P'),
(55, 22113354, '2024-04-20', 'P'),
(56, 22113355, '2024-04-20', 'P'),
(57, 22113356, '2024-04-20', 'P'),
(58, 22113357, '2024-04-20', 'P'),
(59, 22113358, '2024-04-20', 'P'),
(60, 22113359, '2024-04-20', 'P'),
(61, 22113360, '2024-04-20', 'P'),
(62, 22113361, '2024-04-20', 'P'),
(63, 22113362, '2024-04-20', 'P'),
(64, 22113363, '2024-04-20', 'P'),
(65, 22113364, '2024-04-20', 'P'),
(66, 22113367, '2024-04-20', 'P'),
(67, 22113345, '2024-04-20', 'P'),
(68, 22113346, '2024-04-20', 'P'),
(69, 22113347, '2024-04-20', 'P'),
(70, 22113348, '2024-04-20', 'P'),
(71, 22113349, '2024-04-20', 'P'),
(72, 22113350, '2024-04-20', 'P'),
(73, 22113351, '2024-04-20', 'P'),
(74, 22113352, '2024-04-20', 'P'),
(75, 22113353, '2024-04-20', 'P'),
(76, 22113354, '2024-04-20', 'P'),
(77, 22113355, '2024-04-20', 'P'),
(78, 22113356, '2024-04-20', 'P'),
(79, 22113357, '2024-04-20', 'P'),
(80, 22113358, '2024-04-20', 'P'),
(81, 22113359, '2024-04-20', 'P'),
(82, 22113360, '2024-04-20', 'P'),
(83, 22113361, '2024-04-20', 'P'),
(84, 22113362, '2024-04-20', 'P'),
(85, 22113363, '2024-04-20', 'P'),
(86, 22113364, '2024-04-20', 'P'),
(87, 22113367, '2024-04-20', 'P'),
(88, 22113345, '2024-04-20', 'P'),
(89, 22113346, '2024-04-20', 'P'),
(90, 22113347, '2024-04-20', 'P'),
(91, 22113348, '2024-04-20', 'P'),
(92, 22113349, '2024-04-20', 'P'),
(93, 22113350, '2024-04-20', 'P'),
(94, 22113351, '2024-04-20', 'P'),
(95, 22113352, '2024-04-20', 'P'),
(96, 22113353, '2024-04-20', 'P'),
(97, 22113354, '2024-04-20', 'P'),
(98, 22113355, '2024-04-20', 'P'),
(99, 22113356, '2024-04-20', 'P'),
(100, 22113357, '2024-04-20', 'P'),
(101, 22113358, '2024-04-20', 'P'),
(102, 22113359, '2024-04-20', 'P'),
(103, 22113360, '2024-04-20', 'P'),
(104, 22113361, '2024-04-20', 'P'),
(105, 22113362, '2024-04-20', 'P'),
(106, 22113363, '2024-04-20', 'P'),
(107, 22113364, '2024-04-20', 'P'),
(108, 22113367, '2024-04-20', 'P');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `typ` enum('Admin','Directeur','Parent','Elève') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `motDePasse`, `typ`) VALUES
(0, 'ali', 'saleh', '2zDQXcdL', 'Directeur'),
(3, 'mhedhbi', 'olfa', 'olfa123', 'Admin'),
(4, 'dua', 'wassim', 'wassim', 'Elève'),
(5, 'benali', 'saif', 'saif', 'Parent'),
(6, 'abidi', 'ahmed', 'ahmed', 'Directeur'),
(7, 'amin', 'med', 'user', 'Admin'),
(313236, 'Yamen', 'Fourati', '0000', 'Directeur'),
(11121314, 'Ben Ahmed', 'Ahmed', '0000', 'Parent'),
(11121315, 'Ben Mohamed', 'Mohamed', '0000', 'Parent'),
(11121316, 'Ben Ali', 'Ali', '0000', 'Parent'),
(11121317, 'Ben Fatima', 'Fatima', '0000', 'Parent'),
(11121318, 'Ben Hédi', 'Hédi', '0000', 'Parent'),
(11121319, 'Ben Sami', 'Sami', '0000', 'Parent'),
(11121320, 'Ben Nadia', 'Nadia', '0000', 'Parent'),
(11121321, 'Ben Youssef', 'Youssef', '0000', 'Parent'),
(11121322, 'Ben Amina', 'Amina', '0000', 'Parent'),
(11121323, 'Ben Hassen', 'Hassen', '0000', 'Parent'),
(11121324, 'Ben Ahmed', 'Mohamed', '0000', 'Parent'),
(11121325, 'Ben Mohamed', 'Ali', '0000', 'Parent'),
(11121326, 'Ben Ali', 'Fatima', '0000', 'Parent'),
(11121327, 'Ben Fatima', 'Hédi', '0000', 'Parent'),
(11121328, 'Ben Hédi', 'Sami', '0000', 'Parent'),
(11121329, 'Ben Sami', 'Nadia', '0000', 'Parent'),
(11121330, 'Ben Nadia', 'Youssef', '0000', 'Parent'),
(11121331, 'Ben Youssef', 'Amina', '0000', 'Parent'),
(11121332, 'Ben Amina', 'Hassen', '0000', 'Parent'),
(11121333, 'Ben Hassen', 'Ahmed', '0000', 'Parent'),
(11135019, 'bensaleh', 'saleh', 'saleh', 'Admin'),
(11178760, 'benamor', 'yessine', 'yessine', 'Admin'),
(12345610, 'Amri', 'Med', '4xa2P8oX)o', 'Parent'),
(22113364, 'saleh eddine', 'abedkader', '1111', 'Elève'),
(22113365, 'Amri', 'Fatma', '0000', 'Elève'),
(22113366, 'Amri', 'Fatma', '8xN2oVanrG', 'Elève'),
(22113367, 'Amri', 'jawher', 'J4Pk3zEmXO', 'Elève'),
(22113368, 'Amri', 'mohsen', 'SmHqMdWAqd', 'Elève');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdministrateur`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `idEcole` (`idEcole`);

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`idDirecteur`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idEcole` (`idEcole`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`idEcole`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`idEleve`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `idParent` (`idParent`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`);

--
-- Index pour la table `moyenne`
--
ALTER TABLE `moyenne`
  ADD PRIMARY KEY (`idMoyenne`),
  ADD KEY `idEleve` (`idEleve`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idNote`),
  ADD KEY `idEleve` (`idEleve`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Index pour la table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`idParent`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`idPresence`),
  ADD KEY `idEleve` (`idEleve`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11178761;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `directeur`
--
ALTER TABLE `directeur`
  MODIFY `idDirecteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313237;

--
-- AUTO_INCREMENT pour la table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `idEcole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22113369;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `moyenne`
--
ALTER TABLE `moyenne`
  MODIFY `idMoyenne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18006;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `idPresence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`idEcole`) REFERENCES `ecole` (`idEcole`);

--
-- Contraintes pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD CONSTRAINT `directeur_ibfk_1` FOREIGN KEY (`idEcole`) REFERENCES `ecole` (`idEcole`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `eleve_ibfk_2` FOREIGN KEY (`idParent`) REFERENCES `parents` (`idParent`);

--
-- Contraintes pour la table `moyenne`
--
ALTER TABLE `moyenne`
  ADD CONSTRAINT `moyenne_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `moyenne_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `presence_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
