#------------------------------------------------------------
#        Script MySQL pour la BD projetweb2.
#------------------------------------------------------------


#------------------------------------------------------------
# 1. Table: membres
#------------------------------------------------------------

CREATE TABLE membres(
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
        UNIQUE (permis_conduire, courriel)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 2. Table: vehicules
#------------------------------------------------------------

CREATE TABLE vehicules(
        vehicule_id int (11) Auto_increment  NOT NULL,
        matricule   Varchar (7),
        annee       Int,
        date_debut  Date,
        date_fin    Date,
        membre_id   Int,
        type_id     Int,
        marque_id   Int,
        PRIMARY KEY (vehicule_id ),
        INDEX (matricule )
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 3. Table: disponibilites
#------------------------------------------------------------

CREATE TABLE disponibilites(
        dispo_id    int (11) Auto_increment  NOT NULL,
        vehicule_id Int,
        date_debut  Date,
        date_fin    Date,
        PRIMARY KEY (dispo_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 4. Table: location
#------------------------------------------------------------

CREATE TABLE location(
        location_id int (11) Auto_increment  NOT NULL,
        vehicule_id Int,
        membre_id   Int,
        paiement_id Int,
        date_debut  Date,
        date_fin    Date,
        PRIMARY KEY (location_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 5. Table: roles
#------------------------------------------------------------

CREATE TABLE roles(
        role_id  int (11) Auto_increment  NOT NULL,
        nom_role Varchar (25),
        PRIMARY KEY (role_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 6. Table: type_vehicule
#------------------------------------------------------------

CREATE TABLE type_vehicule(
        type_id  int (11) Auto_increment  NOT NULL,
        nom_type Varchar (25),
        PRIMARY KEY (type_id),
        UNIQUE (nom_type)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 7. Table: marque
#------------------------------------------------------------

CREATE TABLE marque(
        marque_id  int (11) Auto_increment  NOT NULL,
        nom_marque Varchar (25),
        PRIMARY KEY (marque_id),
        UNIQUE (nom_marque)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 8. Table: mode_paiement
#------------------------------------------------------------

CREATE TABLE mode_paiement(
        mode_id  int (11) Auto_increment  NOT NULL,
        nom_mode Varchar (25),
        PRIMARY KEY (mode_id),
        UNIQUE (nom_mode)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 9. Table: paiement
#------------------------------------------------------------

CREATE TABLE paiement(
        paiement_id   int (11) Auto_increment  NOT NULL,
        date_paiement Date,
        no_paiement   Int,
        PRIMARY KEY (paiement_id),
        INDEX (no_paiement)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 10. Table: infos bancaires
#------------------------------------------------------------

CREATE TABLE infos_bancaires(
        type_id       int (11) Auto_increment  NOT NULL,
        mode_paiement Varchar (25),
        membre_id     Int,
        PRIMARY KEY (type_id ),
        UNIQUE (mode_paiement)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;


#------------------------------------------------------------
# 11. Table: accepte_mode_paiement
#------------------------------------------------------------

CREATE TABLE accepte_mode_paiement(
        membre_id Int NOT NULL,
        mode_id   Int NOT NULL,
        PRIMARY KEY (membre_id, mode_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

ALTER TABLE membres ADD CONSTRAINT FK_membres_role_id FOREIGN KEY (role_id) REFERENCES roles(role_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_type_id FOREIGN KEY (type_id) REFERENCES type_vehicule(type_id);
ALTER TABLE vehicules ADD CONSTRAINT FK_vehicules_marque_id FOREIGN KEY (marque_id) REFERENCES marque(marque_id);
ALTER TABLE disponibilites ADD CONSTRAINT FK_disponibilites_vehicule_id FOREIGN KEY (vehicule_id) REFERENCES vehicules(vehicule_id);
ALTER TABLE location ADD CONSTRAINT FK_location_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE location ADD CONSTRAINT FK_location_vehicule_id FOREIGN KEY (vehicule_id) REFERENCES vehicules(vehicule_id);
ALTER TABLE location ADD CONSTRAINT FK_location_paiement_id FOREIGN KEY (paiement_id) REFERENCES paiement(paiement_id);
ALTER TABLE infos_bancaires ADD CONSTRAINT FK_infos_bancaires_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE accepte_mode_paiement ADD CONSTRAINT FK_accepte_mode_paiement_membre_id FOREIGN KEY (membre_id) REFERENCES membres(membre_id);
ALTER TABLE accepte_mode_paiement ADD CONSTRAINT FK_accepte_mode_paiement_mode_id FOREIGN KEY (mode_id) REFERENCES mode_paiement(mode_id);
