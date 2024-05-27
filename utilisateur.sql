-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 21 avr. 2024 à 03:14
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
(22113364, 'saleh eddine', 'abedkader', 'epXmSqE7gP', 'Elève'),
(22113365, 'Amri', 'Fatma', '8j3uBstk6v', 'Elève'),
(22113366, 'Amri', 'Fatma', '8xN2oVanrG', 'Elève'),
(22113367, 'Amri', 'jawher', 'J4Pk3zEmXO', 'Elève');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
