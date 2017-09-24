-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 24 Septembre 2017 à 05:46
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetweb2`
--
CREATE DATABASE IF NOT EXISTS `projetweb2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetweb2`;

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
  `ville_id` int(11) DEFAULT NULL,
  `nom_arr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `arrondissements`
--

INSERT INTO `arrondissements` (`arr_id`, `ville_id`, `nom_arr`) VALUES
(1, 1, 'arr01'),
(2, 1, 'arr02'),
(3, 1, 'arr03'),
(4, 1, 'arr04'),
(5, 1, 'arr05'),
(6, 1, 'arr06'),
(7, 1, 'arr07'),
(8, 1, 'arr08'),
(9, 1, 'arr09'),
(10, 1, 'arr10'),
(11, 1, 'arr11'),
(12, 1, 'arr12'),
(13, 1, 'arr13'),
(14, 1, 'arr14'),
(15, 1, 'arr15'),
(16, 1, 'arr16'),
(17, 2, 'arr17'),
(18, 1, 'arr18'),
(19, 1, 'arr19');

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

--
-- Contenu de la table `disponibilites`
--

INSERT INTO `disponibilites` (`dispo_id`, `date_debut`, `date_fin`, `vehicule_id`) VALUES
(3, '2017-09-01', '2017-10-31', 1),
(7, '2017-09-22', '2017-09-30', NULL),
(8, '2017-09-22', '2017-09-30', NULL),
(19, '2017-09-02', '2017-09-30', 7),
(22, '2017-09-23', '2017-09-30', 10);

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
  `locataire_id` int(11) NOT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `etat_reservation` int(3) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `locations`
--

INSERT INTO `locations` (`location_id`, `date_debut`, `date_fin`, `locataire_id`, `vehicule_id`, `etat_reservation`) VALUES
(6, '2017-09-28', '2017-09-28', 1, 1, -1),
(15, '2017-09-21', '2017-09-21', 3, 7, 2),
(16, '2017-09-23', '2017-09-23', 3, 7, -1),
(17, '2017-09-24', '2017-09-24', 3, 7, 2);

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
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `emetteur_id` int(11) DEFAULT NULL,
  `destinataire_id` int(11) DEFAULT NULL,
  `objet_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sujet` varchar(255) DEFAULT NULL,
  `contenu` text,
  `type` int(3) DEFAULT NULL,
  `etat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`message_id`, `emetteur_id`, `destinataire_id`, `objet_id`, `date`, `sujet`, `contenu`, `type`, `etat`) VALUES
(1, 2, 1, NULL, '2017-09-05 14:04:22', 'test', 'message test', 0, '0'),
(2, 2, 1, NULL, '2017-09-05 14:06:36', 'asdf', 'test', 0, '0'),
(3, 5, 1, NULL, '2017-09-05 14:04:40', 'asdf', 'test', 0, '0'),
(4, 1, 1, NULL, '2017-09-05 14:41:27', 'asdf', 'test', 0, '0'),
(5, 3, 1, NULL, '2017-09-05 14:04:52', 'aaaa', 'fdgfgfgf', 0, '0'),
(6, 4, 1, NULL, '2017-09-05 14:04:59', 'bbbb', 'messagewwww', 0, '0'),
(7, 3, 2, NULL, '2017-09-08 14:22:24', 'Test de message', 'Je suis en train de tester le messagerie', 0, '0'),
(8, 3, 5, NULL, '2017-09-08 14:22:28', 'Test de message', 'Message envoyé à Andriy', 0, '0'),
(9, 3, 4, NULL, '2017-09-08 20:23:13', 'Message à Rafael', 'Test de message à Rafael', 0, '0'),
(10, 3, 3, NULL, '2017-09-08 20:24:54', 'message a moi-meme', 'jfkdfjglkfdj', 0, '0'),
(11, 3, 2, NULL, '2017-09-09 02:48:42', 'test', 'hgfkjghfdkj', 0, '0'),
(13, NULL, NULL, NULL, '2017-09-11 06:45:03', 'Informations', 'Nom : fjkdjfld<br>Entreprise : gjkfjgkld<br>Phone : 1234<br>Courriel : email@address<br><br>message de contact', 3, '0'),
(14, NULL, NULL, NULL, '2017-09-11 06:57:26', 'Informations', 'Nom : alessandro<br>Entreprise : autonome<br>Phone : 12345<br>Courriel : courriel@provider.com<br><br>je souhaite plus d''informations sur le site', 3, '0'),
(15, NULL, NULL, NULL, '2017-09-11 07:01:51', 'Informations', 'Nom : alessandro<br>Entreprise : autonome<br>Phone : 12345<br>Courriel : courriel@provider.com<br><br>je souhaite plus d''informations sur le site', 3, '0'),
(16, NULL, NULL, NULL, '2017-09-11 07:02:43', 'Informations', 'Nom : alessandro<br>Entreprise : autonome<br>Phone : 12345<br>Courriel : courriel@provider.com<br><br>je souhaite plus d''informations sur le site', 3, '0'),
(17, NULL, NULL, NULL, '2017-09-11 07:12:39', 'Comptabilite', 'Nom : jgfkjgkfdlk<br>Entreprise : lgkdjlfkgfkj<br>Phone : 12345<br>Courriel : email@address<br><br>message de test', 3, '0'),
(18, 3, 1, NULL, '2017-09-11 19:52:25', 'test de message', 'c''est un test de message interne à un autre usager', 0, '0'),
(20, 3, NULL, NULL, '2017-09-11 18:21:36', 'RECLAMATION DE TESDT', 'CONTENU', 11, '0'),
(21, 3, NULL, NULL, '2017-09-11 18:25:59', 'TEST DE INSERTION DE RECLAMATION DE VEHICULE', 'CONTENU', 10, '0'),
(22, 3, NULL, 2, '2017-09-12 00:01:17', 'TEST DE INSERTION DE RECLAMATION DE VEHICULE', 'CONTENU', 10, '0'),
(23, 3, NULL, 2, '2017-09-11 18:22:32', 'TEST DE INSERTION DE RECLAMATION DE VEHICULE', 'CONTENU', 12, '1'),
(24, 3, 5, NULL, '2017-09-12 00:35:34', 'test de message apres modification de la classe', 'test de message apres modification de la classe\r\nblablabla', 0, '0'),
(25, 3, 5, NULL, '2017-09-13 13:25:24', 'test', 'jfkds', 0, '0'),
(26, 3, 2, NULL, '2017-09-13 13:25:46', 'gfd', 'gfgdf', 0, '0'),
(28, NULL, NULL, NULL, '2017-09-13 13:52:47', 'Soumission', 'Nom : Alessandro Lemos<br>Entreprise : Autonome<br>Phone : 1234<br>Courriel : email@domain<br><br>soumission d''une demande', 30, '0'),
(29, NULL, NULL, NULL, '2017-09-13 14:19:44', 'Informations', 'Nom : contact<br>Entreprise : autonom<br>Phone : 12345<br>Courriel : email@domain<br><br>message', 30, '0'),
(30, 3, 3, NULL, '2017-09-13 14:21:06', '', '', 0, '0'),
(32, 3, NULL, 1, '2017-09-16 07:05:49', 'Partnership', 'La voiture présente un bruit dans le coffre du moteur', 11, '0'),
(34, 3, 2, NULL, '2017-09-17 21:05:36', 'test', 'bla bla bla', 0, '0'),
(36, 3, NULL, NULL, '2017-09-22 00:47:37', 'test de message à l''admin', 'voici un test', 20, '0'),
(37, NULL, NULL, NULL, '2017-09-22 01:04:25', '', '', 0, '0'),
(38, 3, 2, NULL, '2017-09-22 01:04:25', 'test à admin iadhy', 'bla bla bla', 20, '0'),
(39, NULL, NULL, NULL, '2017-09-22 01:12:18', '', '', 0, '0'),
(40, 3, NULL, NULL, '2017-09-22 01:12:18', 'gfdgfd', 'ghghd', 20, '0'),
(41, NULL, NULL, NULL, '2017-09-22 01:12:31', '', '', 0, '0'),
(42, 3, 3, NULL, '2017-09-22 01:12:32', 'gfgd', 'hhgfhgf', 20, '0'),
(43, NULL, NULL, NULL, '2017-09-22 01:23:39', '', '', 0, '0'),
(47, 3, NULL, 13, '2017-09-22 05:53:31', 'Partnership', 'kjdlfd', 12, '0'),
(48, 3, NULL, 13, '2017-09-22 05:58:10', 'Advertise', 'hggfhfg', 12, '0'),
(49, 3, NULL, 3, '2017-09-22 06:11:59', 'Partnership', 'hhhh', 10, '0'),
(50, 3, NULL, 13, '2017-09-22 06:38:12', 'General Question', 'dddd', 12, '0'),
(51, 3, NULL, 13, '2017-09-22 06:39:32', 'General Question', 'dddd', 12, '0'),
(52, 3, NULL, 15, '2017-09-24 00:38:01', 'Partnership', 'fdgfgfd', 12, '0'),
(53, 3, NULL, 15, '2017-09-24 00:39:28', 'Advertise', 'hghghgjh', 12, '0'),
(54, 3, NULL, 15, '2017-09-24 00:40:07', 'Advertise', 'jjhjh', 12, '0'),
(55, 3, NULL, 15, '2017-09-24 00:43:43', 'Advertise', 'kkkkk', 12, '0'),
(56, 3, NULL, 3, '2017-09-24 00:46:45', 'Partnership', 'jhjh', 10, '0'),
(57, 3, NULL, 7, '2017-09-24 00:47:47', 'Partnership', 'hghgjhjh', 11, '0');

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

--
-- Contenu de la table `modes_paiements`
--

INSERT INTO `modes_paiements` (`mode_id`, `nom_mode`) VALUES
(3, 'Mastercard'),
(2, 'PayPal'),
(1, 'Visa');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `paiement_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `montant` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `paiements`
--

INSERT INTO `paiements` (`paiement_id`, `user_id`, `date_paiement`, `location_id`, `montant`) VALUES
(15, 3, '2017-09-23', 15, '80.00'),
(16, 3, '2017-09-23', 17, '80.00');

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
  `DateNaissance` date NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `permis_conduire` varchar(15) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `adresse2` varchar(255) NOT NULL,
  `arr_id` int(11) NOT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `code_postal` varchar(7) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `courriel` varchar(50) DEFAULT NULL,
  `date_adhesion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_photo` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(32) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `etat_usager` int(3) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `usagers`
--

INSERT INTO `usagers` (`user_id`, `prenom`, `nom`, `DateNaissance`, `sexe`, `permis_conduire`, `adresse`, `adresse2`, `arr_id`, `ville_id`, `code_postal`, `telephone`, `courriel`, `date_adhesion`, `user_photo`, `motdepasse`, `username`, `role_id`, `etat_usager`) VALUES
(1, 'Majid', 'Kadi', '1962-09-22', 'M', 'K30011112196501', '10701, Grande-Allée', '', 5, 1, 'H3L 2M8', '5149093991', 'majidkadi@gmail.com', '2017-09-24 03:03:12', 'majidkadi.png', '827ccb0eea8a706c4c34a16891f84e7b', 'majid', 2, 1),
(2, 'Iadhy', 'Kharrat', '1982-03-04', 'M', 'K30011112196502', '10701, Grande-Allée', '', 6, 1, 'H3L 2M8', '5149093991', 'iadhykharrat@hotmail.com', '2017-09-24 03:03:12', 'iadhykarrat.png', '827ccb0eea8a706c4c34a16891f84e7b', 'iadhykharrat', 2, 1),
(3, 'Alessandro', 'Lemos', '1974-07-21', 'H', 'A9999-000000-12', '10701, Grande-Allée', '406', 13, 1, 'H3L 2M8', '5146602148', 'alessandrolemos@hotmail.com', '2017-09-24 03:41:29', 'alemos1.png', '827ccb0eea8a706c4c34a16891f84e7b', 'aslemos', 1, 1),
(4, 'Rafael', 'Oliveira', '1982-10-15', 'M', 'R30011112196504', '10701, Grande-Allée', '', 2, 1, 'H3L 2M8', '5149093991', 'rafeloliveira@hotmail.com', '2017-09-24 03:03:12', 'rafaelmelo.png', '827ccb0eea8a706c4c34a16891f84e7b', 'rafaelmelo', 3, 1),
(5, 'Andriy', 'Malynivskyy', '1992-02-01', 'M', 'K30011112196505', '10701, Grande-Allée', '', 3, 1, 'H3L 2M8', '5149093991', 'andriymalynivskyy@hotmail.com', '2017-09-24 03:03:12', 'andriyma.png', '827ccb0eea8a706c4c34a16891f84e7b', 'andriyma', 3, 1),
(6, 'Yaser', 'Kadi', '2000-06-05', 'M', 'A12341122333309', '10701, Grande-Allée', '', 4, 1, 'H3L 2M8', '5141234567', 'yaserkadi@hotmail.com', '2017-09-24 03:03:12', 'yaserkadi.png', '827ccb0eea8a706c4c34a16891f84e7b', 'yaserkadi', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `vehicule_id` int(11) NOT NULL,
  `matricule` varchar(7) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `nbre_places` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `vehicule_photo` varchar(255) DEFAULT NULL,
  `proprietaire_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `modele_id` int(11) DEFAULT NULL,
  `carburant_id` int(11) DEFAULT NULL,
  `transmission_id` int(11) DEFAULT NULL,
  `arr_id` int(11) DEFAULT NULL,
  `etat_vehicule` int(3) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`vehicule_id`, `matricule`, `annee`, `nbre_places`, `description`, `prix`, `vehicule_photo`, `proprietaire_id`, `type_id`, `modele_id`, `carburant_id`, `transmission_id`, `arr_id`, `etat_vehicule`) VALUES
(1, '356 PJB', 2012, 5, '<p>Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>', 100, 'civic-2012.png', 2, 3, 1, 1, 1, 1, 1),
(3, '567 EFG', 2016, 5, '<p>Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>\r\n                            <p>Pellentesque rhoncus fringilla libero, a blandit mauris rhoncus non. Pellentesque arcu dolor, rutrum sit amet nunc a, rutrum aliquet nulla. Ut pharetra dui ipsum, non dapibus velit sagittis nec. Mauris mollis posuere sapien, eu accumsan urna rhoncus vel. Vestibulum at suscipit libero. In efficitur risus nec nisi dignissim, nec feugiat massa dignissim. Integer nec urna id est varius eleifend ac et augue. Curabitur efficitur purus nec luctus posuere. Morbi ultricies tellus quis dolor pulvinar pharetra. Cras ultricies leo lectus, eget faucibus lectus vehicula maximus. Maecenas porta leo sem, quis facilisis lectus varius ac.</p>\r\n                            <p>Aliquam mollis sit amet velit eleifend cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque maximus sem ut ipsum placerat, a elementum tortor iaculis. Etiam pretium sodales libero eget varius. Nulla ut lorem metus. Sed sodales ullamcorper egestas. Ut euismod fermentum aliquam. Donec volutpat pharetra vehicula. Mauris dignissim, ex a accumsan euismod, nisl quam placerat diam, eget luctus leo nisl eget orci. Maecenas et vulputate ex, egestas lacinia nisl. Suspendisse potenti. Donec risus turpis, tincidunt sit amet fringilla in, sollicitudin id enim.</p>', 120, 'audi-2016.png', 1, 1, 11, 1, 1, 14, 1),
(4, '356-PGB', 2010, 7, '', 125, 'vw_Routan_2010.png', 6, 3, 13, 1, 1, 7, 1),
(5, 'MTL 456', 2016, 5, '<p>Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>\r\n                            <p>Pellentesque rhoncus fringilla libero, a blandit mauris rhoncus non. Pellentesque arcu dolor, rutrum sit amet nunc a, rutrum aliquet nulla. Ut pharetra dui ipsum, non dapibus velit sagittis nec. Mauris mollis posuere sapien, eu accumsan urna rhoncus vel. Vestibulum at suscipit libero. In efficitur risus nec nisi dignissim, nec feugiat massa dignissim. Integer nec urna id est varius eleifend ac et augue. Curabitur efficitur purus nec luctus posuere. Morbi ultricies tellus quis dolor pulvinar pharetra. Cras ultricies leo lectus, eget faucibus lectus vehicula maximus. Maecenas porta leo sem, quis facilisis lectus varius ac.</p>\r\n                            <p>Aliquam mollis sit amet velit eleifend cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque maximus sem ut ipsum placerat, a elementum tortor iaculis. Etiam pretium sodales libero eget varius. Nulla ut lorem metus. Sed sodales ullamcorper egestas. Ut euismod fermentum aliquam. Donec volutpat pharetra vehicula. Mauris dignissim, ex a accumsan euismod, nisl quam placerat diam, eget luctus leo nisl eget orci. Maecenas et vulputate ex, egestas lacinia nisl. Suspendisse potenti. Donec risus turpis, tincidunt sit amet fringilla in, sollicitudin id enim.</p>', 90, 'yaris-2017.png', 4, 2, 1, 2, 1, 15, 0),
(6, '286-KLM', 2017, 5, '<p>Mauris pellentesque vestibulum suscipit. Suspendisse potenti. Nunc eget maximus ipsum. Quisque sed sagittis nisi. Donec rutrum commodo tortor, sit amet condimentum quam rutrum quis. Proin et posuere enim. Nullam sodales diam at tincidunt placerat. Phasellus ornare velit nunc, non tristique magna auctor sit amet. Duis ut justo eget eros hendrerit semper. Nunc fringilla nunc eget est interdum, non tempus massa sodales. Suspendisse eget libero leo. Vivamus nec pretium nibh, ac facilisis metus. Aliquam dui metus, vehicula id malesuada non, sollicitudin sit amet orci. Vestibulum efficitur ullamcorper pulvinar.</p>\r\n                            <p>Pellentesque rhoncus fringilla libero, a blandit mauris rhoncus non. Pellentesque arcu dolor, rutrum sit amet nunc a, rutrum aliquet nulla. Ut pharetra dui ipsum, non dapibus velit sagittis nec. Mauris mollis posuere sapien, eu accumsan urna rhoncus vel. Vestibulum at suscipit libero. In efficitur risus nec nisi dignissim, nec feugiat massa dignissim. Integer nec urna id est varius eleifend ac et augue. Curabitur efficitur purus nec luctus posuere. Morbi ultricies tellus quis dolor pulvinar pharetra. Cras ultricies leo lectus, eget faucibus lectus vehicula maximus. Maecenas porta leo sem, quis facilisis lectus varius ac.</p>\r\n                            <p>Aliquam mollis sit amet velit eleifend cursus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque maximus sem ut ipsum placerat, a elementum tortor iaculis. Etiam pretium sodales libero eget varius. Nulla ut lorem metus. Sed sodales ullamcorper egestas. Ut euismod fermentum aliquam. Donec volutpat pharetra vehicula. Mauris dignissim, ex a accumsan euismod, nisl quam placerat diam, eget luctus leo nisl eget orci. Maecenas et vulputate ex, egestas lacinia nisl. Suspendisse potenti. Donec risus turpis, tincidunt sit amet fringilla in, sollicitudin id enim.</p>', 125, 'Rondo-2017.png', 5, 2, 12, 2, 1, 9, 1),
(7, '123445', 2011, 2, 'Nouvelle voiture de test', 80, 'noimage.png', 3, 2, 8, 2, 1, 15, 1),
(10, '12345', 2001, 5, 'fdfdsfds', 10, 'Scan_aquerelle.jpg', 3, 1, 11, 2, 2, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `ville_id` int(11) NOT NULL,
  `province` varchar(2) DEFAULT NULL,
  `nom_ville` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `villes`
--

INSERT INTO `villes` (`ville_id`, `province`, `nom_ville`) VALUES
(2, 'BC', 'Vancouver'),
(1, 'QC', 'Montréal');

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
  ADD KEY `nom_arr` (`nom_arr`),
  ADD KEY `FK_arrondissements_ville_id` (`ville_id`);

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
  ADD KEY `FK_locations_user_id` (`locataire_id`),
  ADD KEY `FK_locations_vehicule_id` (`vehicule_id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`marque_id`),
  ADD UNIQUE KEY `nom_marque` (`nom_marque`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `emetteur_id` (`emetteur_id`),
  ADD KEY `destinataire_id` (`destinataire_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `FK_paiements_location_id` (`location_id`);

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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `permis_conduire` (`permis_conduire`,`courriel`),
  ADD KEY `FK_usagers_role_id` (`role_id`),
  ADD KEY `FK_usagers_ville_id` (`ville_id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`vehicule_id`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `FK_vehicules_user_id` (`proprietaire_id`),
  ADD KEY `FK_vehicules_type_id` (`type_id`),
  ADD KEY `FK_vehicules_carburant_id` (`carburant_id`),
  ADD KEY `FK_vehicules_transmission_id` (`transmission_id`),
  ADD KEY `FK_vehicules_arr_id` (`arr_id`),
  ADD KEY `modele_id` (`modele_id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`ville_id`),
  ADD KEY `province` (`province`,`nom_ville`);

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
  MODIFY `dispo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `marque_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `modele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `modes_paiements`
--
ALTER TABLE `modes_paiements`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `vehicule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `ville_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Contraintes pour la table `arrondissements`
--
ALTER TABLE `arrondissements`
  ADD CONSTRAINT `FK_arrondissements_ville_id` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`ville_id`);

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
-- Contraintes pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  ADD CONSTRAINT `FK_infos_bancaires_user_id` FOREIGN KEY (`user_id`) REFERENCES `usagers` (`user_id`);

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `FK_locations_locataire_id` FOREIGN KEY (`locataire_id`) REFERENCES `usagers` (`user_id`),
  ADD CONSTRAINT `FK_locations_vehicule_id` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`vehicule_id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`emetteur_id`) REFERENCES `usagers` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `usagers` (`user_id`);

--
-- Contraintes pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD CONSTRAINT `FK_modeles_marque_id` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`marque_id`);

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `FK_paiements_location_id` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`);

--
-- Contraintes pour la table `usagers`
--
ALTER TABLE `usagers`
  ADD CONSTRAINT `FK_usagers_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `FK_usagers_ville_id` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`ville_id`);

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `FK_vehicules_arr_id` FOREIGN KEY (`arr_id`) REFERENCES `arrondissements` (`arr_id`),
  ADD CONSTRAINT `FK_vehicules_carburant_id` FOREIGN KEY (`carburant_id`) REFERENCES `carburants` (`carburant_id`),
  ADD CONSTRAINT `FK_vehicules_transmission_id` FOREIGN KEY (`transmission_id`) REFERENCES `transmissions` (`transmission_id`),
  ADD CONSTRAINT `FK_vehicules_type_id` FOREIGN KEY (`type_id`) REFERENCES `type_vehicules` (`type_id`),
  ADD CONSTRAINT `FK_vehicules_user_id` FOREIGN KEY (`proprietaire_id`) REFERENCES `usagers` (`user_id`),
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`modele_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
