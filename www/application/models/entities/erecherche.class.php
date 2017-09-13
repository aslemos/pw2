<?php

final class ERecherche {

    private $_carburant_id;
    private $_transmission_id;
    private $_arr_id;
    private $_modele_id;
    private $_marque_id;
    private $_type_id;
    private $_dateIni;
    private $_dateFin;
    private $_places;
    private $_annee;
    private $_prixMin;
    private $_prixMax;

    public function __construct(array $data) {
        $this->setAnnee(isset($data['annee']) ? $data['annee'] : '');
        $this->setCarburant(isset($data['carburant_id']) ? $data['carburant_id'] : '');
        $this->setTypeVehicule(isset($data['type_id']) ? $data['type_id'] : '');
        $this->setDateIni(isset($data['date_ini']) ? $data['date_ini'] : '');
        $this->setDateFin(isset($data['date_fin']) ? $data['date_fin'] : '');
        $this->setLieu(isset($data['arr_id']) ? $data['arr_id'] : '');
        $this->setMarque(isset($data['marque_id']) ? $data['marque_id'] : '');
        $this->setModele(isset($data['modele_id']) ? $data['modele_id'] : '');
        $this->setPlaces(isset($data['nbre_places']) ? $data['nbre_places'] : '');
        $this->setPrixMax(isset($data['prix_max']) ? $data['prix_max'] : '');
        $this->setPrixMin(isset($data['prix_min']) ? $data['prix_min'] : '');
        $this->setTransmission(isset($data['transmission_id']) ? $data['transmission_id'] : '');
    }

    public function getDateIni() {
        return $this->_dateIni;
    }

    public function getDateFin() {
        return $this->_dateFin;
    }

    public function getModele() {
        return $this->_modele_id;
    }

    public function getMarque() {
        return $this->_marque_id;
    }

    public function getTypeVehicule() {
        return $this->_type_id;
    }

    public function getPlaces() {
        return $this->_places;
    }

    public function getAnnee() {
        return $this->_annee;
    }

    public function getCarburant() {
        return $this->_carburant_id;
    }

    public function getTransmission() {
        return $this->_transmission_id;
    }

    public function getLieu() {
        return $this->_arr_id;
    }

    public function getPrixMin() {
        return $this->_prixMin;
    }

    public function getPrixMax() {
        return $this->_prixMax;
    }

    public function setDateIni($dateIni) {
        $this->_dateIni = $dateIni;
    }

    public function setDateFin($dateFin) {
        $this->_dateFin = $dateFin;
    }

    public function setModele($modele) {
        $this->_modele_id = $modele;
    }

    public function setMarque($marque) {
        $this->_marque_id = $marque;
    }

    public function setTypeVehicule($carrocerie) {
        $this->_type_id = $carrocerie;
    }

    public function setPlaces($places) {
        $this->_places = $places;
    }

    public function setAnnee($annee) {
        $this->_annee = $annee;
    }

    public function setCarburant($carburant) {
        $this->_carburant_id = $carburant;
    }

    public function setTransmission($transmission) {
        $this->_transmission_id = $transmission;
    }

    public function setLieu($lieu) {
        $this->_arr_id = $lieu;
    }

    public function setPrixMin($prixMin) {
        $this->_prixMin = $prixMin;
    }

    public function setPrixMax($prixMax) {
        $this->_prixMax = $prixMax;
    }
}
