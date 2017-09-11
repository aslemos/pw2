<?php
/*
 * Classe du type de véchicule
 * @author : Alessandro Lemos
 */

class ETypeVehicule implements ITypeVehicule {

    private $type_id;
    private $nom_type;

    public function __construct(array $data) {
        $this->type_id = $data['type_id'];
        $this->nom_type = $data['nom_type'];
    }

    public function getTypeId() {
        return $this->type_id;
    }

    public function getNomType() {
        return $this->nom_type;
    }

    public function setNomType($nom_type) {
        $this->nom_type = $nom_type;
        return $this;
    }
}
