<?php

class DropDownData extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getArrondissements($ville_id) {
        return $this->execSql('SELECT * FROM arrondissements WHERE ville_id = ' . $ville_id . ' ORDER BY nom_arr ASC;');
    }

    public function getCarburants() {
        return $this->execSql('SELECT * FROM carburants ORDER BY nom_carburant ASC;');
    }

    public function getMarques() {
        return $this->execSql('SELECT * FROM marques ORDER BY nom_marque ASC;');
    }

    public function getModeles($marque_id) {
        return $this->execSql('SELECT * FROM modeles ORDER BY nom_modele');
    }

    public function getModesPaiement() {
        return $this->execSql('SELECT * FROM modes_paiements ORDER BY nom_mode');
    }

    public function getRoles() {
        return $this->execSql('SELECT * FROM roles ORDER BY nom_role');
    }

    public function getTransmissions() {
        return $this->execSql('SELECT * FROM transmissions ORDER BY nom_transmission');
    }

    public function getTypeVehicules() {
        return $this->execSql('SELECT * FROM type_vehicules ORDER BY nom_type');
    }

    private function execSql($sql) {
        $this->db->query($sql);
        return $this->db->rows;
    }
}
