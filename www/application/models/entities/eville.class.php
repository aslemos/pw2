<?php
/*
 * Classe des villes
 * @author Alessandro Lemos
 */

class EVille implements IVille {

    private $ville_id = 0;
    private $nom_ville = '';
    private $province = '';

    public function __construct(array $data) {
        $this->ville_id = $data['ville_id'];
        $this->nom_ville = $data['nom_ville'];
        $this->province = $data['province'];
    }

    public function getVilleId() {
        return $this->ville_id;
    }

    public function getNomVille() {
        return $this->nom_ville;
    }
    public function setNomVille($nom_ville) {
        $this->nom_ville = $nom_ville;
        return $this;
    }

    public function getProvince() {
        return $this->province;
    }
    public function setProvince($province) {
        $this->province = $province;
        return $this;
    }
}
