-- --------------------------------------------------------
--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`role_id`, `nom_role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Membre');

-- --------------------------------------------------------

--
-- Contenu de la table `transmissions`
--

INSERT INTO `transmissions` (`transmission_id`, `nom_transmission`) VALUES
(1, 'Manuelle'),
(2, 'Automatique'),
(3, 'Mixte');

-- --------------------------------------------------------

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`marque_id`, `nom_marque`) VALUES
(1, 'volzwaggen'),
(2, 'Toyota'),
(3, 'Honda');

-- --------------------------------------------------------

--
-- Contenu de la table `type_vehicules`
--

INSERT INTO `type_vehicules` (`type_id`, `nom_type`) VALUES
(1, 'Recréatif'),
(2, 'Tourisme'),
(3, 'sport');

-- --------------------------------------------------------

--
-- Contenu de la table `carburants`
--

INSERT INTO `carburants` (`carburant_id`, `nom_carburant`) VALUES
(1, 'Ordinaire'),
(2, 'Super'),
(3, 'Diesel');

-- --------------------------------------------------------

--
-- Contenu de la table `ville`
--

INSERT INTO `villes` (ville_id, province, nom_ville) VALUES
(1, 'QC', 'Montréal');

-- --------------------------------------------------------

--
-- Contenu de la table `arrondissements`
--

INSERT INTO `arrondissements` (arr_id, ville_id, nom_arr) VALUES
(1, 1, 'arr1'),
(2, 1, 'arr2'),
(3, 1, 'arr3');

-- --------------------------------------------------------

--
-- Contenu de la table `usagers`
--

INSERT INTO `usagers` (`user_id`, `prenom`, `nom`, `permis_conduire`, `adresse`, `ville`, `code_postal`, `telephone`, `courriel`, `motdepasse`, `role_id`) VALUES
(1, 'Majid', 'Kadi', 'K30011112196501', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'majidkadi@hotmail.com', '12345', 3),
(2, 'Iadhy', 'Kharrat', 'K30011112196502', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'iadhykharrat@hotmail.com', '12345', 2),
(3, 'Alessandro', 'Lemos', 'A30011112196503', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'alessandrolemos@hotmail.com', '12345', 1),
(4, 'Rafael', 'Oliveira', 'R30011112196504', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'rafeloliveira@hotmail.com', '12345', 3),
(5, 'Andriy', 'Malynivskyy', 'K30011112196505', '10701, Grande-Allée', 'Montréal', 'H3L 2M8', '5149093991', 'andriymalynivskyy@hotmail.com', '12345', 3);



-- --------------------------------------------------------

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`vehicule_id`, `matricule`, `annee`, `nbre_places`, `prix`, `date_debut`, `date_fin`, `user_id`, `type_id`, `marque_id`, `carburant_id`, `transmission_id`, `arr_id`) VALUES
(1, '356 PJB', 2010, 5, 100, '2017-08-22', '2017-08-31', 1, 1, 1, 1, 1, 1),
(2, '123 ABC', 2007, 7, 120, '2017-08-01', '2017-08-31', 5, 1, 1, 1, 1, 1),
(3, '567 EFG', 2007, 5, 120, '2017-08-01', '2017-08-31', 4, 1, 1, 1, 1, 1);