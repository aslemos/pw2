#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: membres
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS membres(
        membre_id       int (11) Auto_increment  NOT NULL,
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
        PRIMARY KEY (membre_id),
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
        membre_id       Int,
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
# Table: location
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS location(
        location_id int (11) Auto_increment  NOT NULL,
        date_debut  Varchar(25),
        date_fin    Varchar(25),
        membre_id   Int,
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
# Table: type_vehicule
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS type_vehicule(
        type_id  int (11) Auto_increment  NOT NULL ,
        nom_type Varchar (25),
        PRIMARY KEY (type_id ),
        UNIQUE (nom_type)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: marque
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS marque(
        marque_id  int (11) Auto_increment  NOT NULL,
        nom_marque Varchar (25),
        PRIMARY KEY (marque_id ),
        UNIQUE (nom_marque)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: mode_paiement
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS mode_paiement(
        mode_id  int (11) Auto_increment  NOT NULL,
        nom_mode Varchar (25),
        PRIMARY KEY (mode_id ),
        UNIQUE (nom_mode)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: paiement
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS paiement(
        paiement_id   int (11) Auto_increment  NOT NULL,
        date_paiement Varchar(25),
        no_paiement   Int,
        PRIMARY KEY (paiement_id ),
        INDEX (no_paiement)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: infos bancaires
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS infos_bancaires(
        ref_id    int (11) Auto_increment  NOT NULL,
        nom_ref   Varchar (25),
        membre_id Int,
        PRIMARY KEY (ref_id),
        UNIQUE (nom_ref)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: carburant
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS carburant(
        carburant_id  int (11) Auto_increment  NOT NULL,
        nom_carburant Varchar (25),
        PRIMARY KEY (carburant_id),
        INDEX (nom_carburant)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: transmission
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS transmission(
        transmission_id  int (11) Auto_increment  NOT NULL,
        nom_transmission Varchar (100),
        PRIMARY KEY (transmission_id),
        INDEX (nom_transmission)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: arrondissement
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS arrondissement(
        arr_id  int (11) Auto_increment  NOT NULL,
        nom_arr Varchar (100),
        PRIMARY KEY (arr_id ),
        INDEX (nom_arr)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: accepte mode paiement
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS accepte_mode_paiement(
        membre_id Int NOT NULL,
        mode_id   Int NOT NULL,
        PRIMARY KEY (membre_id, mode_id)
) ENGINE=InnoDB Default charset=utf8;


#------------------------------------------------------------
# Table: envoi_message
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS envoi_message(
        Date_message      TimeStamp,
        titre_message     Varchar (255),
        contenu           Text,
        membre_id         Int NOT NULL,
        membre_id_membres Int NOT NULL,
        PRIMARY KEY (membre_id, membre_id_membres)
) ENGINE=InnoDB Default charset=utf8;

ALTER TABLE membres ADD CONSTRAINT FK_membres_role_id FOREIGN KEY (role_id) REFERENCES roles(role_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_type_id FOREIGN KEY (type_id) REFERENCES type_vehicule(type_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_marque_id FOREIGN KEY (marque_id) REFERENCES marque(marque_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_carburant_id FOREIGN KEY (carburant_id) REFERENCES carburant(carburant_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_transmission_id FOREIGN KEY (transmission_id) REFERENCES transmission(transmission_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_arr_id FOREIGN KEY (arr_id) REFERENCES arrondissement(arr_id);
ALTER TABLE disponibilites ADD CONSTRAINT FK_disponibilites_vehicule_id FOREIGN KEY (vehicule_id) REFERENCES vehicules(vehicule_id);
ALTER TABLE location ADD CONSTRAINT FK_location_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE location ADD CONSTRAINT FK_location_vehicule_id FOREIGN KEY (vehicule_id) REFERENCES vehicules(vehicule_id);
ALTER TABLE location ADD CONSTRAINT FK_location_paiement_id FOREIGN KEY (paiement_id) REFERENCES paiement(paiement_id);
ALTER TABLE infos_bancaires ADD CONSTRAINT FK_infos_bancaires_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE accepte_mode_paiement ADD CONSTRAINT FK_accepte_mode_paiement_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE accepte_mode_paiement ADD CONSTRAINT FK_accepte_mode_paiement_mode_id FOREIGN KEY (mode_id) REFERENCES mode_paiement(mode_id);
ALTER TABLE envoi_message ADD CONSTRAINT FK_envoi_message_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE envoi_message ADD CONSTRAINT FK_envoi_message_membre_id_membres FOREIGN KEY (membre_id_membres) REFERENCES membres(membre_id);
