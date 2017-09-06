-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Septembre 2017 à 18:50
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pw2`
--

-- --------------------------------------------------------

--
-- Structure de la table `accepte_modes_paiements`
--

CREATE TABLE `accepte_modes_paiements` (
  `user_id` int(11) NOT NULL,
  `mode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `arrondissements`
--

CREATE TABLE `arrondissements` (
  `arr_id` int(11) NOT NULL,
  `nom_arr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `arrondissements`
--

INSERT INTO `arrondissements` (`arr_id`, `nom_arr`) VALUES
(1, 'arr01'),
(2, 'arr02'),
(3, 'arr03'),
(4, 'arr04'),
(5, 'arr05'),
(6, 'arr06'),
(7, 'arr07'),
(8, 'arr08'),
(9, 'arr09'),
(10, 'arr10'),
(11, 'arr11'),
(12, 'arr12'),
(13, 'arr13'),
(14, 'arr14'),
(15, 'arr15'),
(16, 'arr16'),
(17, 'arr17'),
(18, 'arr18'),
(19, 'arr19');

-- --------------------------------------------------------

--
-- Structure de la table `carburants`
--

CREATE TABLE `carburants` (
  `carburant_id` int(11) NOT NULL,
  `nom_carburant` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `carburants`
--

INSERT INTO `carburants` (`carburant_id`, `nom_carburant`) VALUES
(1, 'Diesel'),
(2, 'Ordinaire'),
(3, 'Super');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `date_commentaire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `vehicule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE `disponibilites` (
  `dispo_id` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `vehicule_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `envoi_messages`
--

CREATE TABLE `envoi_messages` (
  `Date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre_message` varchar(255) DEFAULT NULL,
  `contenu` text,
  `user_id` int(11) NOT NULL,
  `user_id_usagers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infos_bancaires`
--

CREATE TABLE `infos_bancaires` (
  `ref_id` int(11) NOT NULL,
  `nom_ref` varchar(25) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `paiement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `marque_id` int(11) NOT NULL,
  `nom_marque` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`marque_id`, `nom_marque`) VALUES
(4, 'Chevrolet'),
(2, 'Chrysler'),
(3, 'Dodge'),
(1, 'Honda'),
(6, 'Kia'),
(5, 'Lexus'),
(7, 'Mazda'),
(8, 'Toyota'),
(9, 'Volzwaggen');

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE `modeles` (
  `modele_id` int(11) NOT NULL,
  `nom_modele` varchar(50) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modeles`
--

INSERT INTO `modeles` (`modele_id`, `nom_modele`, `marque_id`) VALUES
(1, 'Civic', 1),
(2, 'Accord', 1),
(3, 'Odyssey', 1),
(4, 'Sebring', 2),
(5, 'CX3', 7),
(6, 'Protege', 7),
(7, 'Corolla', 8),
(8, 'Echo', 8),
(9, 'Yaris', 8),
(10, 'Sienna', 8),
(11, 'Audi', 9),
(12, 'Rondo', 7),
(13, 'Routan', 9);

-- --------------------------------------------------------

--
-- Structure de la table `modes_paiements`
--

CREATE TABLE `modes_paiements` (
  `mode_id` int(11) NOT NULL,
  `nom_mode` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `paiement_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `no_paiement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `nom_role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`role_id`, `nom_role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `transmissions`
--

CREATE TABLE `transmissions` (
  `transmission_id` int(11) NOT NULL,
  `nom_transmission` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `transmissions`
--

INSERT INTO `transmissions` (`transmission_id`, `nom_transmission`) VALUES
(1, 'Automatique'),
(2, 'Manuelle'),
(3, 'Mixte');

-- --------------------------------------------------------

--
-- Structure de la table `type_vehicules`
--

CREATE TABLE `type_vehicules` (
  `type_id` int(11) NOT NULL,
  `nom_type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_vehicules`
--

INSERT INTO `type_vehicules` (`type_id`, `nom_type`) VALUES
(1, 'Recréatif'),
(2, 'sport'),
(3, 'Tourisme');

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

CREATE TABLE `usagers` (
  `user_id` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `permis_conduire` varchar(15) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  `code_postal` varchar(7) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `courriel` varchar(50) DEFAULT NULL,
  `date_adhesion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_photo` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(32) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `usagers`
--

INSERT INTO `usagers` (`user_id`, `prenom`, `nom`, `permis_conduire`, `adresse`, `ville`, `code_postal`, `telephone`, `courriel`, `date_adhesion`, `user_photo`, `motdepasse`, `username`, `role_id`) VALUES
(1, 'Majid', 'Kadi', 'K30011112196501', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'majidkadi@gmail.com', '2017-08-31 16:33:10', 'majidkadi.png', '827ccb0eea8a706c4c34a16891f84e7b', 'majidkadi', 2),
(2, 'Iadhy', 'Kharrat', 'K30011112196502', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'iadhykharrat@hotmail.com', '2017-08-31 16:52:48', 'iadhykarrat.png', '827ccb0eea8a706c4c34a16891f84e7b', 'iadhykharrat', 2),
(3, 'Alessandro', 'Lemos', 'A30011112196503', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'alessandrolemos@hotmail.com', '2017-08-31 16:53:11', 'alemos.png', '827ccb0eea8a706c4c34a16891f84e7b', 'alesslemos', 1),
(4, 'Rafael', 'Oliveira', 'R30011112196504', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'rafeloliveira@hotmail.com', '2017-08-31 16:53:38', 'rafaelmelo.png', '827ccb0eea8a706c4c34a16891f84e7b', 'rafaelmelo', 3),
(5, 'Andriy', 'Malynivskyy', 'K30011112196505', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'andriymalynivskyy@hotmail.com', '2017-08-31 16:53:20', 'andriyma.png', '827ccb0eea8a706c4c34a16891f84e7b', 'andriyma', 3),
(6, 'Yaser', 'Kadi', 'A12341122333309', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5141234567', 'yaserkadi@hotmail.com', '2017-08-31 16:53:27', 'yaserkadi.png', '827ccb0eea8a706c4c34a16891f84e7b', 'yaserkadi', 3);

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
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `vehicule_photo` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `modele_id` int(11) DEFAULT NULL,
  `carburant_id` int(11) DEFAULT NULL,
  `transmission_id` int(11) DEFAULT NULL,
  `arr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`vehicule_id`, `matricule`, `annee`, `nbre_places`, `prix`, `date_debut`, `date_fin`, `vehicule_photo`, `user_id`, `type_id`, `marque_id`, `modele_id`, `carburant_id`, `transmission_id`, `arr_id`) VALUES
(1, '356 PJB', 2012, 5, 100, '2017-08-22', '2017-08-31', 'civic-2012.png', 2, 3, 1, 1, 1, 1, 1),
(2, '123 ABC', 2017, 5, 120, '2017-08-01', '2017-08-31', 'corolla-2017.png', 3, 3, 8, 7, 1, 1, 18),
(3, '567 EFG', 2016, 5, 120, '2017-08-01', '2017-08-31', 'audi-2016.png', 1, 1, 9, 11, 1, 1, 14),
(4, '356-PGB', 2010, 7, 125, '2017-08-15', '2017-09-15', 'vw_Routan_2010.png', 6, 3, 9, 13, 1, 1, 7),
(5, 'MTL 456', 2016, 5, 90, '2017-08-30', '2017-09-30', 'yaris-2017.png', 4, 2, 8, 1, 2, 1, 15),
(6, '286-KLM', 2017, 5, 125, '2017-08-30', '2017-09-30', 'Rondo-2017.png', 5, 2, 6, 12, 2, 1, 9);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accepte_modes_paiements`
--
ALTER TABLE `accepte_modes_paiements`
  ADD PRIMARY KEY (`user_id`,`mode_id`),
  ADD KEY `FK_accepte_modes_paiements_mode_id` (`mode_id`);

--
-- Index pour la table `arrondissements`
--
ALTER TABLE `arrondissements`
  ADD PRIMARY KEY (`arr_id`),
  ADD KEY `nom_arr` (`nom_arr`);

--
-- Index pour la table `carburants`
--
ALTER TABLE `carburants`
  ADD PRIMARY KEY (`carburant_id`),
  ADD KEY `nom_carburant` (`nom_carburant`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`user_id`,`vehicule_id`),
  ADD KEY `FK_commentaires_vehicule_id` (`vehicule_id`);

--
-- Index pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD PRIMARY KEY (`dispo_id`),
  ADD KEY `FK_disponibilites_vehicule_id` (`vehicule_id`);

--
-- Index pour la table `envoi_messages`
--
ALTER TABLE `envoi_messages`
  ADD PRIMARY KEY (`user_id`,`user_id_usagers`),
  ADD KEY `FK_envoi_messages_user_id_usagers` (`user_id_usagers`);

--
-- Index pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  ADD PRIMARY KEY (`ref_id`),
  ADD UNIQUE KEY `nom_ref` (`nom_ref`),
  ADD KEY `FK_infos_bancaires_user_id` (`user_id`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `FK_locations_user_id` (`user_id`),
  ADD KEY `FK_locations_vehicule_id` (`vehicule_id`),
  ADD KEY `FK_locations_paiement_id` (`paiement_id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`marque_id`),
  ADD UNIQUE KEY `nom_marque` (`nom_marque`);

--
-- Index pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`modele_id`),
  ADD UNIQUE KEY `nom_modele` (`nom_modele`),
  ADD KEY `FK_modeles_marque_id` (`marque_id`);

--
-- Index pour la table `modes_paiements`
--
ALTER TABLE `modes_paiements`
  ADD PRIMARY KEY (`mode_id`),
  ADD UNIQUE KEY `nom_mode` (`nom_mode`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`paiement_id`),
  ADD KEY `no_paiement` (`no_paiement`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`transmission_id`),
  ADD KEY `nom_transmission` (`nom_transmission`);

--
-- Index pour la table `type_vehicules`
--
ALTER TABLE `type_vehicules`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `nom_type` (`nom_type`);

--
-- Index pour la table `usagers`
--
ALTER TABLE `usagers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `permis_conduire` (`permis_conduire`,`courriel`),
  ADD KEY `FK_usagers_role_id` (`role_id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`vehicule_id`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `FK_vehicules_user_id` (`user_id`),
  ADD KEY `FK_vehicules_type_id` (`type_id`),
  ADD KEY `FK_vehicules_marque_id` (`marque_id`),
  ADD KEY `FK_vehicules_carburant_id` (`carburant_id`),
  ADD KEY `FK_vehicules_transmission_id` (`transmission_id`),
  ADD KEY `FK_vehicules_arr_id` (`arr_id`),
  ADD KEY `modele_id` (`modele_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `arrondissements`
--
ALTER TABLE `arrondissements`
  MODIFY `arr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `carburants`
--
ALTER TABLE `carburants`
  MODIFY `carburant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `marque_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `modele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `modes_paiements`
--
ALTER TABLE `modes_paiements`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `transmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `type_vehicules`
--
ALTER TABLE `type_vehicules`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `usagers`
--
ALTER TABLE `usagers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `vehicule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accepte_modes_paiements`
--
ALTER TABLE `accepte_modes_paiements`
  ADD CONSTRAINT `FK_accepte_modes_paiements_mode_id` FOREIGN KEY (`mode_id`) REFERENCES `modes_paiements` (`mode_id`),
  ADD CONSTRAINT `FK_accepte_modes_paiements_user_id` FOREIGN KEY (`user_id`) REFERENCES `usagers` (`user_id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_commentaires_user_id` FOREIGN KEY (`user_id`) REFERENCES `usagers` (`user_id`),
  ADD CONSTRAINT `FK_commentaires_vehicule_id` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`vehicule_id`);

--
-- Contraintes pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD CONSTRAINT `FK_disponibilites_vehicule_id` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`vehicule_id`);

--
-- Contraintes pour la table `envoi_messages`
--
ALTER TABLE `envoi_messages`
  ADD CONSTRAINT `FK_envoi_messages_user_id` FOREIGN KEY (`user_id`) REFERENCES `usagers` (`user_id`),
  ADD CONSTRAINT `FK_envoi_messages_user_id_usagers` FOREIGN KEY (`user_id_usagers`) REFERENCES `usagers` (`user_id`);

--
-- Contraintes pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  ADD CONSTRAINT `FK_infos_bancaires_user_id` FOREIGN KEY (`user_id`) REFERENCES `usagers` (`user_id`);

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `FK_locations_paiement_id` FOREIGN KEY (`paiement_id`) REFERENCES `paiements` (`paiement_id`),
  ADD CONSTRAINT `FK_locations_user_id` FOREIGN KEY (`user_id`) REFERENCES `usagers` (`user_id`),
  ADD CONSTRAINT `FK_locations_vehicule_id` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`vehicule_id`);

--
-- Contraintes pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD CONSTRAINT `FK_modeles_marque_id` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`marque_id`);

--
-- Contraintes pour la table `usagers`
--
ALTER TABLE `usagers`
  ADD CONSTRAINT `FK_usagers_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `FK_vehicules_arr_id` FOREIGN KEY (`arr_id`) REFERENCES `arrondissements` (`arr_id`),
  ADD CONSTRAINT `FK_vehicules_carburant_id` FOREIGN KEY (`carburant_id`) REFERENCES `carburants` (`carburant_id`),
  ADD CONSTRAINT `FK_vehicules_marque_id` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`marque_id`),
  ADD CONSTRAINT `FK_vehicules_transmission_id` FOREIGN KEY (`transmission_id`) REFERENCES `transmissions` (`transmission_id`),
  ADD CONSTRAINT `FK_vehicules_type_id` FOREIGN KEY (`type_id`) REFERENCES `type_vehicules` (`type_id`),
  ADD CONSTRAINT `FK_vehicules_user_id` FOREIGN KEY (`user_id`) REFERENCES `usagers` (`user_id`),
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`modele_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
