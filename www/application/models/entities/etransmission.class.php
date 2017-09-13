<?php
/*
 * Transmission du véhicule
 * @author : Alessandro Lemos
 */

class ETransmission implements ITransmission {

    private $_transmission_id;
    private $_nom_transmission;

    public function __construct(array $data) {
        $this->_transmission_id = $data['transmission_id'];
        $this->_nom_transmission = $data['nom_transmission'];
    }

    public function getId() {
        return $this->_transmission_id;
    }

    public function getNom() {
        return $this->_nom_transmission;
    }

    public function setNom($nom_transmission) {
        $this->_nom_transmission = $nom_transmission;
        return $this;
    }
}
