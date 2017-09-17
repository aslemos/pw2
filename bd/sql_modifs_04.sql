
-- Table locations : renommage du champ user_id vers locataire_id
ALTER TABLE locations DROP FOREIGN KEY FK_locations_user_id;
ALTER TABLE locations CHANGE user_id locataire_id INT(11) NOT NULL;
ALTER TABLE locations ADD CONSTRAINT FK_locations_locataire_id FOREIGN KEY (locataire_id) REFERENCES usagers(user_id);

-- renommage du champ 'etat' -> 'etat_reservation
ALTER TABLE locations CHANGE IF EXISTS etat etat_reservation INT(3) NOT NULL DEFAULT -1;
ALTER TABLE locations ADD IF NOT EXISTS etat_reservation INT(3) NOT NULL DEFAULT -1;
UPDATE locations SET etat_reservation = -1 WHERE etat_reservation = 0;

-- Table usagers
-- renommage du champ 'etat' -> 'etat_usager'
ALTER TABLE `usagers` CHANGE IF EXISTS `etat` `etat_usager` INT(3) NOT NULL DEFAULT -1;
ALTER TABLE usagers ADD IF NOT EXISTS etat_usager INT(3) NOT NULL DEFAULT -1;

-- Table vehicules
-- renommage du champ 'etat' -> 'etat_vehicule'
ALTER TABLE `vehicules` CHANGE IF EXISTS `etat` `etat_vehicule` INT(3) NOT NULL DEFAULT -1;
ALTER TABLE vehicules ADD IF NOT EXISTS etat_vehicule INT(3) NOT NULL DEFAULT -1;
