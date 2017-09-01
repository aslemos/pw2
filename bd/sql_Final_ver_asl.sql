#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: usagers
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS usagers(
        user_id       int (11) Auto_increment  NOT NULL,
        prenom          Varchar (50),
        nom             Varchar (50),
        permis_conduire Varchar (15),
        adresse         Varchar (100),
        ville           Varchar (25),
        code_postal     Varchar (7),
        telephone       Varchar (15),
        courriel        Varchar (50),
        motdepasse      Varchar (20),
        role_id         Int,
        PRIMARY KEY (user_id),
        UNIQUE (permis_conduire, courriel )
) ENGINE = InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: vehicules
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS vehicules(
        vehicule_id     int (11) Auto_increment  NOT NULL,
        matricule       Varchar (7),
        annee           Int,
        nbre_places     Int,
        prix            Int,
        date_debut      Varchar(25),
        date_fin        Varchar(25),
        user_id       Int,
        type_id         Int,
        marque_id       Int,
        carburant_id    Int,
        transmission_id Int,
        arr_id          Int,
        PRIMARY KEY (vehicule_id),
        INDEX (matricule)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: disponibilites
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS disponibilites(
        dispo_id    int (11) Auto_increment  NOT NULL,
        date_debut  Varchar(25),
        date_fin    Varchar(25),
        vehicule_id Int,
        PRIMARY KEY (dispo_id)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: locations
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS locations(
        location_id int (11) Auto_increment  NOT NULL,
        date_debut  Varchar(25),
        date_fin    Varchar(25),
        user_id   Int,
        vehicule_id Int,
        paiement_id Int,
        PRIMARY KEY (location_id)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: roles
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS roles(
        role_id  int (11) Auto_increment  NOT NULL,
        nom_role Varchar (25),
        PRIMARY KEY (role_id)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: type_vehicules
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS type_vehicules(
        type_id  int (11) Auto_increment  NOT NULL ,
        nom_type Varchar (25),
        PRIMARY KEY (type_id ),
        UNIQUE (nom_type)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: marques
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS marques(
        marque_id  int (11) Auto_increment  NOT NULL,
        nom_marque Varchar (25),
        PRIMARY KEY (marque_id ),
        UNIQUE (nom_marque)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: modes_paiements
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS modes_paiements(
        mode_id  int (11) Auto_increment  NOT NULL,
        nom_mode Varchar (25),
        PRIMARY KEY (mode_id ),
        UNIQUE (nom_mode)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: paiements
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS paiements(
        paiement_id   int (11) Auto_increment  NOT NULL,
        date_paiement Varchar(25),
        no_paiement   Int,
        PRIMARY KEY (paiement_id ),
        INDEX (no_paiement)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: infos_bancaires
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS infos_bancaires(
        ref_id    int (11) Auto_increment  NOT NULL,
        nom_ref   Varchar (25),
        user_id Int,
        PRIMARY KEY (ref_id),
        UNIQUE (nom_ref)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: carburants
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS carburants(
        carburant_id  int (11) Auto_increment  NOT NULL,
        nom_carburant Varchar (25),
        PRIMARY KEY (carburant_id),
        INDEX (nom_carburant)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: transmissions
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS transmissions(
        transmission_id  int (11) Auto_increment  NOT NULL,
        nom_transmission Varchar (100),
        PRIMARY KEY (transmission_id),
        INDEX (nom_transmission)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: arrondissements
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS arrondissements(
        arr_id  int (11) Auto_increment  NOT NULL,
        nom_arr Varchar (100),
        PRIMARY KEY (arr_id ),
        INDEX (nom_arr)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: accepte_modes_paiements
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS accepte_modes_paiements(
        user_id Int NOT NULL,
        mode_id   Int NOT NULL,
        PRIMARY KEY (user_id, mode_id)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: envoi_messages
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS envoi_messages(
        Date_message      TimeStamp,
        titre_message     Varchar (255),
        contenu           Text,
        user_id         Int NOT NULL,
        user_id_usagers Int NOT NULL,
        PRIMARY KEY (user_id, user_id_usagers)
) ENGINE=InnoDB Default charset=utf8;

#------------------------------------------------------------
# Table: notes
#------------------------------------------------------------

CREATE TABLE notes(
        date_evaluation TimeStamp,
        user_id       Int NOT NULL,
        vehicule_id     Int NOT NULL,
        PRIMARY KEY (user_id, vehicule_id)
)ENGINE=InnoDB Default charset=utf8;

ALTER TABLE usagers ADD CONSTRAINT FK_usagers_role_id FOREIGN KEY (role_id) REFERENCES roles(role_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_user_id FOREIGN KEY (user_id) REFERENCES usagers(user_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_type_id FOREIGN KEY (type_id) REFERENCES type_vehicules(type_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_marque_id FOREIGN KEY (marque_id) REFERENCES marques(marque_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_carburant_id FOREIGN KEY (carburant_id) REFERENCES carburants(carburant_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_transmission_id FOREIGN KEY (transmission_id) REFERENCES transmissions(transmission_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_arr_id FOREIGN KEY (arr_id) REFERENCES arrondissements(arr_id);
ALTER TABLE disponibilites ADD CONSTRAINT FK_disponibilites_vehicule_id FOREIGN KEY (vehicule_id) REFERENCES vehicules(vehicule_id);
ALTER TABLE locations ADD CONSTRAINT FK_locations_user_id FOREIGN KEY (user_id) REFERENCES usagers(user_id);
ALTER TABLE locations ADD CONSTRAINT FK_locations_vehicule_id FOREIGN KEY (vehicule_id) REFERENCES vehicules(vehicule_id);
ALTER TABLE locations ADD CONSTRAINT FK_locations_paiement_id FOREIGN KEY (paiement_id) REFERENCES paiements(paiement_id);
ALTER TABLE infos_bancaires ADD CONSTRAINT FK_infos_bancaires_user_id FOREIGN KEY (user_id) REFERENCES usagers(user_id);
ALTER TABLE accepte_modes_paiements ADD CONSTRAINT FK_accepte_mode_paiement_user_id FOREIGN KEY (user_id) REFERENCES usagers(user_id);
ALTER TABLE accepte_modes_paiements ADD CONSTRAINT FK_accepte_mode_paiement_mode_id FOREIGN KEY (mode_id) REFERENCES modes_paiements(mode_id);
ALTER TABLE envoi_messages ADD CONSTRAINT FK_envoi_messages_user_id FOREIGN KEY (user_id) REFERENCES usagers(user_id);
ALTER TABLE envoi_messages ADD CONSTRAINT FK_envoi_messages_user_id_usagers FOREIGN KEY (user_id_usagers) REFERENCES usagers(user_id);
ALTER TABLE notes ADD CONSTRAINT FK_notes_user_id FOREIGN KEY (user_id) REFERENCES usagers(user_id);
ALTER TABLE notes ADD CONSTRAINT FK_notes_vehicule_id FOREIGN KEY (vehicule_id) REFERENCES vehicules(vehicule_id);
