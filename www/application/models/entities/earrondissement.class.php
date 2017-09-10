<?php
/*
 * Entité Arrondissement
 * @author : Alessandro Lemos
 */

class EArrondissement implements IArrondissement {

    private $arr_id;
    private $nom_arr;
    private $ville = NULL;

    public function __construct(array $data) {
        $this->arr_id = $data['arr_id'];
        $this->nom_arr = $data['nom_arr'];
    }

    public function getArrondId() {
        return $this->arr_id;
    }

    public function getNomArrond() {
        return $this->nom_arr;
    }
    public function setNomArrond($nom_arr) {
        $this->nom_arr = $nom_arr;
        return $this;
    }

    public function getVille() {
        return $this->ville;
    }
    public function setVille(IVille $ville) {
        $this->ville = $ville;
        return $this;
    }
}
