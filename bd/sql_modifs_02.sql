
-- Table messages --
ALTER TABLE messages MODIFY emetteur_id INT(11) NULL,
                     MODIFY destinataire_id INT(11) NULL;

-- Table locations : ajout du champ d'état --
ALTER TABLE locations ADD etat int(3) NOT NULL DEFAULT 0;