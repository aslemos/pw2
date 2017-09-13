<?php
/*
 * Classe des carburants des véhicules
 * @author Alessandro Lemos
 */

class ECarburant implements ICarburant {

    private $_carburant_id;
    private $_nom_carburant;

    public function __construct(array $data) {
        $this->_carburant_id = $data['carburant_id'];
        $this->_nom_carburant = $data['nom_carburant'];
    }

    public function getId() {
        return $this->_carburant_id;
    }

    public function getNom() {
        return $this->_nom_carburant;
    }
    public function setNom($nom_carburant) {
        $this->_nom_carburant = $nom_carburant;
        return $this;
    }
}
