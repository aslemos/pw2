<?php
/*
 * Classe du type de véchicule
 * @author : Alessandro Lemos
 */

class ETypeVehicule implements ITypeVehicule {

    private $_type_id;
    private $_nom_type;

    public function __construct(array $data) {
        $this->_type_id = $data['type_id'];
        $this->_nom_type = $data['nom_type'];
    }

    public function getId() {
        return $this->_type_id;
    }

    public function getNom() {
        return $this->_nom_type;
    }

    public function setNom($nom_type) {
        $this->_nom_type = $nom_type;
        return $this;
    }
}
