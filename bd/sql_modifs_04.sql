
-- Table locations : renommage du champ user_id vers locataire_id
ALTER TABLE locations DROP FOREIGN KEY FK_locations_user_id;
ALTER TABLE locations CHANGE user_id locataire_id INT(11) NOT NULL;
ALTER TABLE locations ADD CONSTRAINT FK_locations_locataire_id FOREIGN KEY (locataire_id) REFERENCES usagers(user_id);

-- Table locations
ALTER TABLE locations MODIFY etat int(3) NOT NULL DEFAULT -1;
UPDATE locations SET etat = -1 WHERE etat = 0;