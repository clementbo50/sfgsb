-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 02 avr. 2022 à 13:41
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsbsf3`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`) VALUES
(1, 'categorie'),
(2, 'Visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_domaine`
--

DROP TABLE IF EXISTS `categorie_domaine`;
CREATE TABLE IF NOT EXISTS `categorie_domaine` (
  `categorie_id` int NOT NULL,
  `domaine_id` int NOT NULL,
  PRIMARY KEY (`categorie_id`,`domaine_id`),
  KEY `IDX_272CA46EBCF5E72D` (`categorie_id`),
  KEY `IDX_272CA46E4272FC9F` (`domaine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie_domaine`
--

INSERT INTO `categorie_domaine` (`categorie_id`, `domaine_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_domaine` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id`, `nom_domaine`) VALUES
(1, 'nomDomaine'),
(2, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `libelle` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('CL', 'Sasie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('RB', 'Remboursée'),
('VA', 'Validée et mise en paiement');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

DROP TABLE IF EXISTS `fichefrais`;
CREATE TABLE IF NOT EXISTS `fichefrais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idUtilisateur` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mois` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nbJustificatifs` int DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unefiche` (`idUtilisateur`,`mois`) USING BTREE,
  KEY `idEtat` (`idEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`id`, `idUtilisateur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
(1, 'ME', '202203', 4, '3542.15', '2022-03-11', 'VA'),
(2, 'ME', '202201', 3, '2000.00', '2022-02-01', 'RB'),
(3, 'ME', 'mars', 2, '1345.00', '2022-04-06', 'RB');

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

DROP TABLE IF EXISTS `fraisforfait`;
CREATE TABLE IF NOT EXISTS `fraisforfait` (
  `id` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `libelle` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fraisforfait`
--

INSERT INTO `fraisforfait` (`id`, `libelle`, `montant`) VALUES
('1', 'forfait', '123.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

DROP TABLE IF EXISTS `lignefraisforfait`;
CREATE TABLE IF NOT EXISTS `lignefraisforfait` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idFiche` int DEFAULT NULL,
  `idFraisForfait` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idFraisForfait` (`idFraisForfait`),
  KEY `idFiche` (`idFiche`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`id`, `idFiche`, `idFraisForfait`, `quantite`) VALUES
(1, 1, '1', 12);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

DROP TABLE IF EXISTS `lignefraishorsforfait`;
CREATE TABLE IF NOT EXISTS `lignefraishorsforfait` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idFiche` int DEFAULT NULL,
  `libelle` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idFiche` (`idFiche`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignefraishorsforfait`
--

INSERT INTO `lignefraishorsforfait` (`id`, `idFiche`, `libelle`, `date`, `montant`) VALUES
(1, 2, 'qiihfduozid', '2022-04-06', '124.00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cp` char(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ville` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `id_categorie_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1D1C63B39F34925F` (`id_categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `dateEmbauche`, `id_categorie_id`) VALUES
('CB', 'Bollengier', 'Clément', '13 rue du quai', '45678', 'Maille', '2022-04-12', 2),
('MD', 'Dupire', 'Mathéo', '56 rue les tempetes', '62451', 'Cahors', '2022-03-11', 1),
('ME', 'Evraere', 'Maxime', '347 route de l\'abricot', '59667', 'Béthune', '2022-03-11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_secondaire`
--

DROP TABLE IF EXISTS `utilisateur_secondaire`;
CREATE TABLE IF NOT EXISTS `utilisateur_secondaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user_id` char(4) COLLATE utf8mb4_general_ci NOT NULL,
  `id_fiche_frais_id` int NOT NULL,
  `niveaux` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43239A8979F37AE5` (`id_user_id`),
  KEY `IDX_43239A89E429EA53` (`id_fiche_frais_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur_secondaire`
--

INSERT INTO `utilisateur_secondaire` (`id`, `id_user_id`, `id_fiche_frais_id`, `niveaux`) VALUES
(1, 'MD', 1, 1),
(2, 'CB', 3, 5),
(3, 'MD', 3, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie_domaine`
--
ALTER TABLE `categorie_domaine`
  ADD CONSTRAINT `FK_272CA46E4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_272CA46EBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `fraisforfait` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lignefraisforfait_ibfk_3` FOREIGN KEY (`idFiche`) REFERENCES `fichefrais` (`id`);

--
-- Contraintes pour la table `lignefraishorsforfait`
--
ALTER TABLE `lignefraishorsforfait`
  ADD CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idFiche`) REFERENCES `fichefrais` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B39F34925F` FOREIGN KEY (`id_categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `utilisateur_secondaire`
--
ALTER TABLE `utilisateur_secondaire`
  ADD CONSTRAINT `FK_43239A8979F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_43239A89E429EA53` FOREIGN KEY (`id_fiche_frais_id`) REFERENCES `fichefrais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
