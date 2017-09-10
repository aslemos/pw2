<?php

class EVehicule implements IVehicule {

    const ETAT_EN_ATTENTE = -1;
    const ETAT_INACTIF = 0;
    const ETAT_ACTIF = 1;

    private $vehicule_id;     // ID
    private $vehicule_photo;
    private $matricule;
    private $annee;
    private $nb_places;
    private $prix;
    private $etat;
    //
    private $proprietaire = NULL;  // Objet EUser
    private $modele = NULL;        // Objet EModele
    private $type = NULL;          // Objet EType - FK type_vehicule.type_id
    private $transmission = NULL;  // Objet ETransmission
    private $carburant = NULL;     // Objet ECarburant
    private $arrondissement = NULL;// Objet EArrondissement
    //
    private $disponibilites = [];  // Objets EDisponibilite - PK disponibilites.vehicule_id

    public function __construct(array $data = NULL) {
        if ($data) {
            $this->vehicule_id = $data['vehicule_id'] ? $data['vehicule_id'] : 0;
            $this->setAnnee($data['annee']);
            $this->setNbPlaces($data['nbre_places']);
            $this->setMatricule($data['matricule']);
            $this->setPrix($data['prix']);
            $this->setPhoto($data['vehicule_photo']);
            $this->setEtat($data['etat']);
        }
    }

    public function getVehiculeId() {
        return $this->vehicule_id;
    }

    public function getMarque() {
        return $this->modele->getMarque();
    }
    public function setMarque(IMarque $marque) {
        $this->modele->setMarque($marque);
        return $this;
    }

    public function getModele() {
        return $this->modele;
    }
    public function setModele(IModele $modele) {
        $this->modele = $modele;
        return $this;
    }

    public function getType() {
        return $this->type;
    }
    public function setType(ITypeVehicule $type) {
        $this->type = $type;
        return $this;
    }

    public function getCarburant() {
        return $this->carburant;
    }
    public function setCarburant(ICarburant $carburant) {
        $this->carburant = $carburant;
    }

    public function getArrond() {
        return $this->arrondissement;
    }
    public function setArrond(IArrondissement $arrond) {
        $this->arrondissement = $arrond;
    }

    public function getDisponibilite($index = 0) {
        return $this->disponibilites[$index];
    }
    public function getDisponibilites() {
        return $this->disponibilites;
    }
    public function addDisponibilite(EDisponibilite $disp) {
        $this->disponibilites[] = $disp;
        return $this;
    }

    public function getEtat() {
        return $this->etat;
    }
    public function setEtat($etat) {
        $this->etat = $etat;
        return $this;
    }

    public function getTransmission() {
        return $this->transmission;
    }
    public function setTransmission(ITransmission $transmission) {
        $this->transmission = $transmission;
        return $this;
    }

    public function getProprietaire() {
        return $this->proprietaire;
    }
    public function setProprietaire(IUsager $usager) {
        $this->proprietaire = $usager;
        return $this;
    }

    public function getMatricule() {
        return $this->matricule;
    }
    public function setMatricule($matricule) {
        $this->matricule = $matricule;
        return $this;
    }

    public function getAnnee() {
        return $this->annee;
    }
    public function setAnnee($annee) {
        $this->annee = $annee;
        return $this;
    }

    public function getPrix() {
        return $this->prix;
    }
    public function setPrix($prix) {
        $this->prix = $prix;
        return $this;
    }

    public function getPhoto() {
        return $this->vehicule_photo;
    }
    public function setPhoto($vehicule_photo) {
        $this->vehicule_photo = $vehicule_photo;
        return $this;
    }

    public function getNbPlaces() {
        return $this->nb_places;
    }
    public function setNbPlaces($nb_places) {
        $this->nb_places = $nb_places;
        return $this;
    }
}
