<?php
/*
 * Classe d'une location/reservation
 * @author Andriy
 * @author Alessandro
 */

class ELocation implements ILocation {

    const LOCATION_NON_ACCEPT = 0;
    const LOCATION_ACCEPT = 1;

    private $nom_marque;
    private $vehicule_id;
    private $destinaraire = NULL;
    private $date_tran = NULL;

    public function getNomMarque() {
        return $this->nom_marque;
    }

    public function getVehiculeId() {
        return $this->vehicule_id;
    }

    public function getNomType() {
        return $this->nom_type;
    }



    public function setNomMarque($nom_marque) {
        $this->nom_marque = $nom_marque;
        return $this;
    }

    public function setVehiculeId($vehicule_id) {
        $this->vehicule_id = $vehicule_id;
    }

    public function setNomType(User $nom_type) {
        $this->nom_type = $nom_type;
    }

    // TODO: implémenter les méthodes ci-dessous

    public function getDateDebut() {
    }

    public function getDateFin() {
    }

    public function getLocataire() {
    }

    public function getLocationId() {
    }

    public function getVehicule() {
    }

    public function setDateDebut($date_debut) {
    }

    public function setDateFin($date_fin) {
    }

    public function setLocataire(IUsager $locataire) {
    }

    public function setVehicule(IVehicule $vehicule) {
    }
}
