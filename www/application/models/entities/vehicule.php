<?php

class Vehicule implements IVehicule {

    private $vehicule_id;     // ID
    private $proprieraire_id; // FK membres
    private $type_id;         // FK type_vehicule
    private $marque_id;       // FK marque
    private $carburant_id;    // FK carburant
    private $arrond_id;       // FK arrondissement ?????????????????
    private $matricule;
    private $annee;
    private $nb_places;
    private $prix;
    private $date_debut;
    private $date_fin;

    public function getVehicule_id() {
        return $this->vehicule_id;
    }

    public function getProprieraire_id() {
        return $this->proprieraire_id;
    }

    public function getType_id() {
        return $this->type_id;
    }

    public function getMarque_id() {
        return $this->marque_id;
    }

    public function getCarburant_id() {
        return $this->carburant_id;
    }

    public function getArrond_id() {
        return $this->arrond_id;
    }

    public function getMatricule() {
        return $this->matricule;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getNb_places() {
        return $this->nb_places;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getDate_debut() {
        return $this->date_debut;
    }

    public function getDate_fin() {
        return $this->date_fin;
    }

    public function setVehicule_id($vehicule_id) {
        $this->vehicule_id = $vehicule_id;
    }

    public function setProprieraire_id($proprieraire_id) {
        $this->proprieraire_id = $proprieraire_id;
    }

    public function setType_id($type_id) {
        $this->type_id = $type_id;
    }

    public function setMarque_id($marque_id) {
        $this->marque_id = $marque_id;
    }

    public function setCarburant_id($carburant_id) {
        $this->carburant_id = $carburant_id;
    }

    public function setArrond_id($arrond_id) {
        $this->arrond_id = $arrond_id;
    }

    public function setMatricule($matricule) {
        $this->matricule = $matricule;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function setNb_places($nb_places) {
        $this->nb_places = $nb_places;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setDate_debut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function setDate_fin($date_fin) {
        $this->date_fin = $date_fin;
    }
}
