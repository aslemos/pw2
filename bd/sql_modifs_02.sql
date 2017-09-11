
-- Table messages --
ALTER TABLE messages MODIFY emetteur_id INT(11) NULL,
                     MODIFY destinataire_id INT(11) NULL;
ALTER TABLE `messages` ADD `objet_id` INT NULL AFTER `destinataire_id`;
ALTER TABLE `messages` CHANGE `type` `type` INT(3) NULL DEFAULT NULL;

-- Table locations --
ALTER TABLE locations ADD etat int(3) NOT NULL DEFAULT 0;
ALTER TABLE locations DROP FOREIGN KEY FK_locations_paiement_id;
ALTER TABLE locations DROP paiement_id;

-- Table paiements
ALTER TABLE paiements DROP no_paiement;
ALTER TABLE paiements ADD location_id INT(11);
ALTER TABLE paiements ADD montant DECIMAL(12,2);
ALTER TABLE paiements ADD CONSTRAINT FK_paiements_location_id FOREIGN KEY (location_id) REFERENCES locations(location_id);
