<?php
/*
 * Classe des carburants des véhicules
 * @author Alessandro Lemos
 */

class ECarburant implements ICarburant {

    private $carburant_id;
    private $nom_carburant;

    public function __construct(array $data) {
        $this->carburant_id = $data['carburant_id'];
        $this->nom_carburant = $data['nom_carburant'];
    }

    public function getCarburantId() {
        return $this->carburant_id;
    }

    public function getNomCarburant() {
        return $this->nom_carburant;
    }
    public function setNomCarburant($nom_carburant) {
        $this->nom_carburant = $nom_carburant;
        return $this;
    }
}
