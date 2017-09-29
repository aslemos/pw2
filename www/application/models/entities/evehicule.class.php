<?php

class EVehicule extends stdClass implements IVehicule {

    const ETAT_EN_ATTENTE = -1;
    const ETAT_REFUSE = -2;
    const ETAT_INACTIF = 0;
    const ETAT_ACTIF = 1;

    private $_vehicule_id;     // ID
    private $_description;
    private $_vehicule_photo;
    private $_matricule;
    private $_annee;
    private $_nb_places;
    private $_prix;
    private $_etat = self::ETAT_EN_ATTENTE;
    private $_disponibilite_id = -1;
    private $_nb_locations = 0;
    //
    private $_proprietaire = NULL;  // Objet EUser
    private $_modele = NULL;        // Objet EModele
    private $_type = NULL;          // Objet EType - FK type_vehicule.type_id
    private $_transmission = NULL;  // Objet ETransmission
    private $_carburant = NULL;     // Objet ECarburant
    private $_arrondissement = NULL;// Objet EArrondissement
    //
    private $_disponibilites = [];  // Objets EDisponibilite - PK disponibilites.vehicule_id

    public function __construct(array $data = NULL) {
        if ($data) {
            $this->_vehicule_id = isset($data['vehicule_id']) ? $data['vehicule_id'] : 0;
            $this->_nb_locations = isset($data['nb_locations']) ? $data['nb_locations'] : -1;
//            $this->_nb_locations = $data['nb_locations'];

            $this->setDescription($data['description']);
            $this->setAnnee($data['annee']);
            $this->setNbPlaces($data['nbre_places']);
            $this->setMatricule($data['matricule']);
            $this->setPrix($data['prix']);
            $this->setPhoto($data['vehicule_photo']);
            if (isset($data['etat_vehicule'])) {
                $this->setEtat($data['etat_vehicule']);
            }
            if (isset($data['dispo_id'])) {
                $this->_disponibilite_id = $data['dispo_id'];
            }
            if (isset($data['proprietaire']) && $data['proprietaire'] instanceof EUsager) {
                $this->setProprietaire($data['proprietaire']);
            }
            if (isset($data['type']) && $data['type'] instanceof ETypeVehicule) {
                $this->setType($data['type']);
            }
            if (isset($data['modele']) && $data['modele'] instanceof EModele) {
                $this->setModele($data['modele']);
            }
            if (isset($data['carburant']) && $data['carburant'] instanceof ECarburant) {
                $this->setCarburant($data['carburant']);
            }
            if (isset($data['transmission']) && $data['transmission'] instanceof ETransmission) {
                $this->setTransmission($data['transmission']);
            }
            if (isset($data['arr']) && $data['arr'] instanceof EArrondissement) {
                $this->setArrond($data['arr']);
            }
        }
    }

    public function getId() {
        return $this->_vehicule_id;
    }

    public function getDescription() {
        return $this->_description;
    }
    public function setDescription($description) {
        $this->_description = $description;
    }

    public function getMarqueId() {
        if ($this->getMarque()) {
            return $this->getMarque()->getId();
        }
        return NULL;
    }
    public function getMarque() {
        if ($this->_modele) {
            return $this->_modele->getMarque();
        }
        return NULL;
    }
    public function setMarque(IMarque $marque) {
        $this->_modele->setMarque($marque);
        return $this;
    }

    public function getModeleId() {
        if ($this->_modele) {
            return $this->_modele->getId();
        }
        return NULL;
    }
    public function getModele() {
        return $this->_modele;
    }
    public function setModele(IModele $modele) {
        $this->_modele = $modele;
        return $this;
    }

    public function getTypeId() {
        if ($this->_type) {
            return $this->_type->getId();
        }
        return NULL;
    }
    public function getType() {
        return $this->_type;
    }
    public function setType(ITypeVehicule $type) {
        $this->_type = $type;
        return $this;
    }

    public function getCarburantId() {
        if ($this->_carburant) {
            return $this->_carburant->getId();
        }
        return NULL;
    }
    public function getCarburant() {
        return $this->_carburant;
    }
    public function setCarburant(ICarburant $carburant) {
        $this->_carburant = $carburant;
    }

    public function getArrondId() {
        if ($this->_arrondissement) {
            return $this->_arrondissement->getId();
        }
        return NULL;
    }
    public function getArrond() {
        return $this->_arrondissement;
    }
    public function setArrond(IArrondissement $arrond) {
        $this->_arrondissement = $arrond;
    }

    public function getDisponibilite($index = -1) {
        foreach($this->_disponibilites as $pos => $disponibilite) {
            if ($disponibilite->getId() == $this->_disponibilite_id) {
                $index = $pos;
                break;
            }
        }
        if ($index < 0) {
            $index = count($this->_disponibilites) - 1;
        }
        return isset($this->_disponibilites[$index])
            ? $this->_disponibilites[$index]
            : NULL;
    }
    public function getDisponibilites() {
        return $this->_disponibilites;
    }
    public function addDisponibilite(IDisponibilite $disp) {
        $this->_disponibilites[] = $disp;
        return $this;
    }

    public function getEtat() {
        return $this->_etat;
    }
    public function setEtat($etat) {

        // valide l'état avant de l'accepter
        if (in_array($etat, [
            self::ETAT_ACTIF,
            self::ETAT_INACTIF,
            self::ETAT_EN_ATTENTE,
            self::ETAT_REFUSE
            ])) {

            $this->_etat = $etat;
            return $this;
        }
        throw new Exception('État invalide');
    }

    public function getTransmissionId() {
        if ($this->_transmission) {
            return $this->_transmission->getId();
        }
        return NULL;
    }
    public function getTransmission() {
        return $this->_transmission;
    }
    public function setTransmission(ITransmission $transmission) {
        $this->_transmission = $transmission;
        return $this;
    }

    public function getProprietaireId() {
        if ($this->_proprietaire) {
            return $this->_proprietaire->getId();
        }
        return NULL;
    }
    public function getProprietaire() {
        return $this->_proprietaire;
    }
    public function setProprietaire(IUsager $usager) {
        $this->_proprietaire = $usager;
        return $this;
    }

    public function getMatricule() {
        return $this->_matricule;
    }
    public function setMatricule($matricule) {
        $this->_matricule = $matricule;
        return $this;
    }

    public function getAnnee() {
        return $this->_annee;
    }
    public function setAnnee($annee) {
        $this->_annee = $annee;
        return $this;
    }

    public function getPrix() {
        return $this->_prix;
    }
    public function setPrix($prix) {
        $this->_prix = $prix;
        return $this;
    }

    public function getPhoto() {
        return $this->_vehicule_photo;
    }
    public function setPhoto($vehicule_photo) {
        $this->_vehicule_photo = $vehicule_photo;
        return $this;
    }

    public function getNbPlaces() {
        return $this->_nb_places;
    }
    public function setNbPlaces($nb_places) {
        $this->_nb_places = $nb_places;
        return $this;
    }

    public function getNbLocations() {
        return $this->_nb_locations;
    }

    public function toString() {
        return $this->getMarque()->getNom() . ' ' . $this->getModele()->getNom() . ' ' . $this->getAnnee();
    }

    public static function getDescriptionEtat($etat_vehicule) {
        switch ($etat_vehicule) {
            case self::ETAT_EN_ATTENTE:
                return 'En attente';
            case self::ETAT_REFUSE:
                return 'Refusé';
            case self::ETAT_ACTIF:
                return 'Actif';
            case self::ETAT_INACTIF:
                return 'Inactif';
            default:
                return 'Inconnu';
        }
    }
}
