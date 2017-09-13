<?php
/*
 * Entité Arrondissement
 * @author : Alessandro Lemos
 */

class EArrondissement implements IArrondissement {

    private $_arr_id;
    private $_nom_arr;
    private $_ville = NULL;

    public function __construct(array $data) {
        $this->_arr_id = $data['arr_id'];
        $this->_nom_arr = $data['nom_arr'];
    }

    public function getId() {
        return $this->_arr_id;
    }

    public function getNom() {
        return $this->_nom_arr;
    }
    public function setNom($nom_arr) {
        $this->_nom_arr = $nom_arr;
        return $this;
    }

    public function getVille() {
        return $this->_ville;
    }
    public function setVille(IVille $ville) {
        $this->_ville = $ville;
        return $this;
    }
}
