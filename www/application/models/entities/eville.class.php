<?php
/*
 * Classe des villes
 * @author Alessandro Lemos
 */

class EVille implements IVille {

    private $_ville_id = 0;
    private $_nom_ville = '';
    private $_province = '';

    public function __construct(array $data) {
        $this->_ville_id = $data['ville_id'];
        $this->_nom_ville = $data['nom_ville'];
        $this->_province = $data['province'];
    }

    public function getId() {
        return $this->_ville_id;
    }

    public function getNom() {
        return $this->_nom_ville;
    }
    public function setNom($nom_ville) {
        $this->_nom_ville = $nom_ville;
        return $this;
    }

    public function getProvinceId() {
        if ($this->_province) {
            return $this->_province->getId();
        }
        return NULL;
    }

    public function getProvince() {
        return $this->_province;
    }
    public function setProvince(IProvince $province) {
        $this->_province = $province;
        return $this;
    }
}
