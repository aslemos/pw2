<?php
/*
 * Transmission du véhicule
 * @author : Alessandro Lemos
 */

class ETransmission implements ITransmission {

    private $transmission_id;
    private $nom_transmission;

    public function __construct(array $data) {
        $this->transmission_id = $data['transmission_id'];
        $this->nom_transmission = $data['nom_transmission'];
    }

    public function getTransmissionId() {
        return $this->transmission_id;
    }

    public function getNomtransmission() {
        return $this->nom_transmission;
    }

    public function setNomTransmission($nom_transmission) {
        $this->nom_transmission = $nom_transmission;
        return $this;
    }
}
