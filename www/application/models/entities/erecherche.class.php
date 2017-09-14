<?php

final class ERecherche {

    private $_carburant_id;
    private $_transmission_id;
    private $_arr_id;
    private $_modele_id;
    private $_marque_id;
    private $_type_id;
    private $_date_debut;
    private $_date_fin;
    private $_places;
    private $_annee;
    private $_prixMin;
    private $_prixMax;
    private $_tranche;

    public function __construct(array $data) {
        $this->setCarburantId(isset($data['carburant_id']) ? $data['carburant_id'] : '0');
        $this->setTypeId(isset($data['type_id']) ? $data['type_id'] : '0');
        $this->setTransmissionId(isset($data['transmission_id']) ? $data['transmission_id'] : '0');
        $this->setArrondId(isset($data['arr_id']) ? $data['arr_id'] : '0');
        $this->setMarqueId(isset($data['marque_id']) ? $data['marque_id'] : '0');
        $this->setModeleId(isset($data['modele_id']) ? $data['modele_id'] : '0');
        $this->setAnnee(isset($data['annee']) ? $data['annee'] : '');
        $this->setDateDebut(isset($data['date_debut']) ? $data['date_debut'] : Date('Y-m-d'));
        $this->setDateFin(isset($data['date_fin']) ? $data['date_fin'] : Date('Y-m-d'));
        $this->setNbPlaces(isset($data['nbre_places']) ? $data['nbre_places'] : '');

        $this->setPrixMax(isset($data['prix_max']) ? $data['prix_max'] : '');
        $this->setPrixMin(isset($data['prix_min']) ? $data['prix_min'] : '');
        $this->setTranche(isset($data['tranche']) ? $data['tranche'] : '');
    }

    public function getTranche() {
        return $this->_tranche;
    }
    public function setTranche($tranche) {
        $this->_tranche = $tranche;

        // Extrait la tranche de prix
        $min_max = explode('-', $tranche);
        if (isset($min_max[1])) {
            $this->setPrixMin($min_max[0]);
            $this->setPrixMax($min_max[1]);
        }
        return $this;
    }

    public function getDateDebut() {
        return $this->_date_debut;
    }
    public function setDateDebut($date_debut) {
        $this->_date_debut = $date_debut;
        return $this;
    }

    public function getDateFin() {
        return $this->_date_fin;
    }
    public function setDateFin($date_fin) {
        $this->_date_fin = $date_fin;
        return $this;
    }

    public function getModeleId() {
        return $this->_modele_id;
    }
    public function setModeleId($modele_id) {
        $this->_modele_id = $modele_id;
    }

    public function getMarqueId() {
        return $this->_marque_id;
    }
    public function setMarqueId($marque_id) {
        $this->_marque_id = $marque_id;
    }

    public function getTypeId() {
        return $this->_type_id;
    }
    public function setTypeId($type_id) {
        $this->_type_id = $type_id;
    }

    public function getNbPlaces() {
        return $this->_places;
    }
    public function setNbPlaces($places) {
        $this->_places = $places;
    }

    public function getAnnee() {
        return $this->_annee;
    }
    public function setAnnee($annee) {
        $this->_annee = $annee;
        return $this;
    }

    public function getCarburantId() {
        return $this->_carburant_id;
    }
    public function setCarburantId($carburant_id) {
        $this->_carburant_id = $carburant_id;
        return $this;
    }

    public function getTransmissionId() {
        return $this->_transmission_id;
    }
    public function setTransmissionId($transmission_id) {
        $this->_transmission_id = $transmission_id;
        return $this;
    }

    public function getArrondId() {
        return $this->_arr_id;
    }
    public function setArrondId($arr_id) {
        $this->_arr_id = $arr_id;
        return $this;
    }

    public function getPrixMin() {
        return $this->_prixMin;
    }
    public function setPrixMin($prixMin) {
        $this->_prixMin = $prixMin;
        return $this;
    }

    public function getPrixMax() {
        return $this->_prixMax;
    }
    public function setPrixMax($prixMax) {
        $this->_prixMax = $prixMax;
        return $this;
    }
}
