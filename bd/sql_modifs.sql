
#------------------------------------------------------------
# Table: messages
#------------------------------------------------------------

DROP TABLE IF EXISTS envoi_messages;
CREATE TABLE IF NOT EXISTS messages(
        message_id       Int(11) AUTO_INCREMENT,
        emetteur_id      Int(11) NOT NULL,
        destinataire_id  Int(11) NOT NULL,
        date             TimeStamp,
        sujet            Varchar (255),
        contenu          Text,
        type             Varchar(1),
        etat             Varchar(1),
        PRIMARY KEY (message_id),
        FOREIGN KEY (emetteur_id) REFERENCES usagers (user_id),
        FOREIGN KEY (destinataire_id) REFERENCES usagers (user_id)
) ENGINE=InnoDB Default charset=utf8;

#------------------------------------------------------------
# Table: villes
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS villes (
        ville_id  int (11) Auto_increment  NOT NULL,
        province Varchar(2),
        nom_ville Varchar (100),
        PRIMARY KEY (ville_id),
        INDEX (province, nom_ville)
) ENGINE=InnoDB Default charset=utf8;
INSERT INTO `villes` (ville_id, province, nom_ville) VALUES
(1, 'QC', 'Montréal');

#------------------------------------------------------------
# Table: arrondissements
#------------------------------------------------------------
ALTER TABLE arrondissements ADD ville_id INT(11) AFTER arr_id;
UPDATE arrondissements SET ville_id = 1;
ALTER TABLE arrondissements ADD CONSTRAINT FK_arrondissements_ville_id FOREIGN KEY (ville_id) REFERENCES villes (ville_id);

#------------------------------------------------------------
# Table: usagers
#------------------------------------------------------------

ALTER TABLE usagers ADD ville_id INT(11) AFTER ville;
UPDATE usagers SET ville_id = 1;
ALTER TABLE usagers DROP ville;
ALTER TABLE usagers ADD CONSTRAINT FK_usagers_ville_id FOREIGN KEY (ville_id) REFERENCES villes(ville_id);

#------------------------------------------------------------
# Table: vehicules
#------------------------------------------------------------

ALTER TABLE vehicules CHANGE user_id proprietaire_id INT(11);
ALTER TABLE vehicules ADD etat INT(3) NOT NULL DEFAULT -1;
ALTER TABLE vehicules DROP FOREIGN KEY FK_vehicules_marque_id;
ALTER TABLE vehicules DROP marque_id;