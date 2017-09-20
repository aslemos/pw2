<?php
/*
 * Classe qui répresente une province
 * @author Alessandro Souza Lemos
 */

class EProvince implements IProvince {

    private $_province_id;
    private $_nom;

    public function __construct(array $data) {
        $this->_province_id = $data['province_id'];
        $this->setNom($data['nom_province']);
    }

    public function getId() {
        return $this->_province_id;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function setNom($nom_province) {
        $this->_nom = $nom_province;
        return $this;
    }
}
