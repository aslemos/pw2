<?php

class EVehicule implements IVehicule {

    const ETAT_EN_ATTENTE = -1;
    const ETAT_INACTIF = 0;
    const ETAT_ACTIF = 1;

    private $_vehicule_id;     // ID
    private $_description;
    private $_vehicule_photo;
    private $_matricule;
    private $_annee;
    private $_nb_places;
    private $_prix;
    private $_etat;
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
            $this->_vehicule_id = $data['vehicule_id'] ? $data['vehicule_id'] : 0;
            $this->setDescription($data['description']);
            $this->setAnnee($data['annee']);
            $this->setNbPlaces($data['nbre_places']);
            $this->setMatricule($data['matricule']);
            $this->setPrix($data['prix']);
            $this->setPhoto($data['vehicule_photo']);
            $this->setEtat($data['etat']);
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
        return $this->_modele->getMarque()->getId();
    }
    public function getMarque() {
        return $this->_modele->getMarque();
    }
    public function setMarque(IMarque $marque) {
        $this->_modele->setMarque($marque);
        return $this;
    }

    public function getModeleId() {
        return $this->_modele->getId();
    }
    public function getModele() {
        return $this->_modele;
    }
    public function setModele(IModele $modele) {
        $this->_modele = $modele;
        return $this;
    }

    public function getTypeId() {
        return $this->_type->getId();
    }
    public function getType() {
        return $this->_type;
    }
    public function setType(ITypeVehicule $type) {
        $this->_type = $type;
        return $this;
    }

    public function getCarburantId() {
        return $this->_carburant->getId();
    }
    public function getCarburant() {
        return $this->_carburant;
    }
    public function setCarburant(ICarburant $carburant) {
        $this->_carburant = $carburant;
    }

    public function getArrondId() {
        return $this->_arrondissement->getId();
    }
    public function getArrond() {
        return $this->_arrondissement;
    }
    public function setArrond(IArrondissement $arrond) {
        $this->_arrondissement = $arrond;
    }

    public function getDisponibilite($index = -1) {
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
        $this->_etat = $etat;
        return $this;
    }

    public function getTransmission() {
        return $this->_transmission;
    }
    public function setTransmission(ITransmission $transmission) {
        $this->_transmission = $transmission;
        return $this;
    }

    public function getProprietaireId() {
        return $this->_proprietaire->getId();
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

    public function toString() {
        return $this->getMarque()->getNom() . ' ' . $this->getModele()->getNom() . ' ' . $this->getAnnee();
    }
}
