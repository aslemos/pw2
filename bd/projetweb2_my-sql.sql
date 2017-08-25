-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Août 2017 à 18:49
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetweb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `accepte_mode_paiement`
--

CREATE TABLE `accepte_mode_paiement` (
  `membre_id` int(11) NOT NULL,
  `mode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

CREATE TABLE `arrondissement` (
  `arr_id` int(11) NOT NULL,
  `nom_arr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `carburant`
--

CREATE TABLE `carburant` (
  `carburant_id` int(11) NOT NULL,
  `nom_carburant` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE `disponibilites` (
  `dispo_id` int(11) NOT NULL,
  `date_debut` varchar(25) DEFAULT NULL,
  `date_fin` varchar(25) DEFAULT NULL,
  `vehicule_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `envoi_message`
--

CREATE TABLE `envoi_message` (
  `Date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre_message` varchar(255) DEFAULT NULL,
  `contenu` text,
  `membre_id` int(11) NOT NULL,
  `membre_id_membres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infos_bancaires`
--

CREATE TABLE `infos_bancaires` (
  `ref_id` int(11) NOT NULL,
  `nom_ref` varchar(25) DEFAULT NULL,
  `membre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `date_debut` varchar(25) DEFAULT NULL,
  `date_fin` varchar(25) DEFAULT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `paiement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `marque_id` int(11) NOT NULL,
  `nom_marque` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`marque_id`, `nom_marque`) VALUES
(1, 'volzwaggen');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `membre_id` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `permis_conduire` varchar(15) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  `code_postal` varchar(7) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `courriel` varchar(50) DEFAULT NULL,
  `motdepasse` varchar(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `slug` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`membre_id`, `prenom`, `nom`, `permis_conduire`, `adresse`, `ville`, `code_postal`, `telephone`, `courriel`, `motdepasse`, `role_id`, `slug`) VALUES
(1, 'Majid', 'Kadi', 'K30011112196503', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'majidkadi@hotmail.com', '12345', 1, 'Membre un');

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

CREATE TABLE `mode_paiement` (
  `mode_id` int(11) NOT NULL,
  `nom_mode` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `paiement_id` int(11) NOT NULL,
  `date_paiement` varchar(25) DEFAULT NULL,
  `no_paiement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `nom_role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`role_id`, `nom_role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `transmission`
--

CREATE TABLE `transmission` (
  `transmission_id` int(11) NOT NULL,
  `nom_transmission` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_vehicule`
--

CREATE TABLE `type_vehicule` (
  `type_id` int(11) NOT NULL,
  `nom_type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_vehicule`
--

INSERT INTO `type_vehicule` (`type_id`, `nom_type`) VALUES
(1, 'Recréatif');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `vehicule_id` int(11) NOT NULL,
  `matricule` varchar(7) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `nbre_places` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `date_debut` varchar(25) DEFAULT NULL,
  `date_fin` varchar(25) DEFAULT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `carburant_id` int(11) DEFAULT NULL,
  `transmission_id` int(11) DEFAULT NULL,
  `arr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`vehicule_id`, `matricule`, `annee`, `nbre_places`, `prix`, `date_debut`, `date_fin`, `membre_id`, `type_id`, `marque_id`, `carburant_id`, `transmission_id`, `arr_id`) VALUES
(1, '356 PJB', 2010, 5, 100, '2017-08-22', '2017-08-31', 1, 1, 1, 1, 1, 1),
(2, '123 ABC', 2007, 7, 120, '2017-08-01', '2017-08-31', 1, 1, 1, 1, 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accepte_mode_paiement`
--
ALTER TABLE `accepte_mode_paiement`
  ADD PRIMARY KEY (`membre_id`,`mode_id`),
  ADD KEY `FK_accepte_mode_paiement_mode_id` (`mode_id`);

--
-- Index pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD PRIMARY KEY (`arr_id`),
  ADD KEY `nom_arr` (`nom_arr`);

--
-- Index pour la table `carburant`
--
ALTER TABLE `carburant`
  ADD PRIMARY KEY (`carburant_id`),
  ADD KEY `nom_carburant` (`nom_carburant`);

--
-- Index pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD PRIMARY KEY (`dispo_id`),
  ADD KEY `FK_disponibilites_vehicule_id` (`vehicule_id`);

--
-- Index pour la table `envoi_message`
--
ALTER TABLE `envoi_message`
  ADD PRIMARY KEY (`membre_id`,`membre_id_membres`),
  ADD KEY `FK_envoi_message_membre_id_membres` (`membre_id_membres`);

--
-- Index pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  ADD PRIMARY KEY (`ref_id`),
  ADD UNIQUE KEY `nom_ref` (`nom_ref`),
  ADD KEY `FK_infos_bancaires_membre_id` (`membre_id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `FK_location_membre_id` (`membre_id`),
  ADD KEY `FK_location_vehicule_id` (`vehicule_id`),
  ADD KEY `FK_location_paiement_id` (`paiement_id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`marque_id`),
  ADD UNIQUE KEY `nom_marque` (`nom_marque`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`membre_id`),
  ADD UNIQUE KEY `permis_conduire` (`permis_conduire`,`courriel`),
  ADD KEY `FK_membres_role_id` (`role_id`);

--
-- Index pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  ADD PRIMARY KEY (`mode_id`),
  ADD UNIQUE KEY `nom_mode` (`nom_mode`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`paiement_id`),
  ADD KEY `no_paiement` (`no_paiement`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `transmission`
--
ALTER TABLE `transmission`
  ADD PRIMARY KEY (`transmission_id`),
  ADD KEY `nom_transmission` (`nom_transmission`);

--
-- Index pour la table `type_vehicule`
--
ALTER TABLE `type_vehicule`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `nom_type` (`nom_type`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`vehicule_id`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `FK_vehicules_membre_id` (`membre_id`),
  ADD KEY `FK_vehicules_type_id` (`type_id`),
  ADD KEY `FK_vehicules_marque_id` (`marque_id`),
  ADD KEY `FK_vehicules_carburant_id` (`carburant_id`),
  ADD KEY `FK_vehicules_transmission_id` (`transmission_id`),
  ADD KEY `FK_vehicules_arr_id` (`arr_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  MODIFY `arr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `carburant`
--
ALTER TABLE `carburant`
  MODIFY `carburant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  MODIFY `dispo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `marque_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `transmission`
--
ALTER TABLE `transmission`
  MODIFY `transmission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_vehicule`
--
ALTER TABLE `type_vehicule`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `vehicule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accepte_mode_paiement`
--
ALTER TABLE `accepte_mode_paiement`
  ADD CONSTRAINT `FK_accepte_mode_paiement_membre_id` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`membre_id`),
  ADD CONSTRAINT `FK_accepte_mode_paiement_mode_id` FOREIGN KEY (`mode_id`) REFERENCES `mode_paiement` (`mode_id`);

--
-- Contraintes pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD CONSTRAINT `FK_disponibilites_vehicule_id` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`vehicule_id`);

--
-- Contraintes pour la table `envoi_message`
--
ALTER TABLE `envoi_message`
  ADD CONSTRAINT `FK_envoi_message_membre_id` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`membre_id`),
  ADD CONSTRAINT `FK_envoi_message_membre_id_membres` FOREIGN KEY (`membre_id_membres`) REFERENCES `membres` (`membre_id`);

--
-- Contraintes pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  ADD CONSTRAINT `FK_infos_bancaires_membre_id` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`membre_id`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK_location_membre_id` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`membre_id`),
  ADD CONSTRAINT `FK_location_paiement_id` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`paiement_id`),
  ADD CONSTRAINT `FK_location_vehicule_id` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`vehicule_id`);

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `FK_membres_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `FK_vehicules_arr_id` FOREIGN KEY (`arr_id`) REFERENCES `arrondissement` (`arr_id`),
  ADD CONSTRAINT `FK_vehicules_carburant_id` FOREIGN KEY (`carburant_id`) REFERENCES `carburant` (`carburant_id`),
  ADD CONSTRAINT `FK_vehicules_marque_id` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`marque_id`),
  ADD CONSTRAINT `FK_vehicules_membre_id` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`membre_id`),
  ADD CONSTRAINT `FK_vehicules_transmission_id` FOREIGN KEY (`transmission_id`) REFERENCES `transmission` (`transmission_id`),
  ADD CONSTRAINT `FK_vehicules_type_id` FOREIGN KEY (`type_id`) REFERENCES `type_vehicule` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
