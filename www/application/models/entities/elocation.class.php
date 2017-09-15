<?php
/*
 * Classe d'une location/reservation
 * @author Andriy
 * @author Alessandro
 */

class ELocation implements ILocation {

    const LOCATION_EN_ATTENTE = -1;
    const LOCATION_NON_ACCEPTE = 0;
    const LOCATION_ACCEPTE = 1;

    private $_location_id = 0;
    private $_vehicule = NULL;
    private $_locataire = NULL;
    private $_date_debut = '';
    private $_date_fin = '';
    private $_etat = 0;

    public function __construct(array $data) {
        $this->_location_id = $data['location_id'];
        $this->_date_debut = $data['date_debut'];
        $this->_date_fin = $data['date_fin'];
        $this->_etat = $data['etat'];
    }

    public function getId() {
        return $this->_location_id;
    }

    public function getVehiculeId() {
        return $this->_vehicule->getId();
    }

    public function getDateDebut() {
        return $this->_date_debut;
    }

    public function getDateFin() {
        return $this->_date_fin;
    }

    public function getLocataire() {
        return $this->_locataire;
    }

    public function getVehicule() {
        return $this->_vehicule;
    }

    public function setDateDebut($date_debut) {
        $this->_date_debut = $date_debut;
        return $this;
    }

    public function setDateFin($date_fin) {
        $this->_date_fin = $date_fin;
        return $this;
    }

    public function setLocataire(IUsager $locataire) {
        $this->_locataire = $locataire;
        return $this;
    }

    public function setVehicule(IVehicule $vehicule) {
        $this->_vehicule = $vehicule;
        return $this;
    }

    public function toString() {
        return $this->_date_debut . ' à ' . $this->_date_fin;
    }
}
