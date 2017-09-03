<?php

class ModelVoiture extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getVoitures(Recherche $recherche) {
        $sql = 'SELECT * FROM voitures';

        $st = $this->db->query($sql);
        return $st->result();
    }

    public function getVoitureById() {

    }

    public function setVoitureData(IVoiture $voiture) {

    }
}
