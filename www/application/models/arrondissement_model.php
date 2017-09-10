<?php
/*
 * Modèle de la table 'arrondissements'
 * @author Alessandro Lemos
 */

class Arrondissement_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getArrondissements() {

        $this->db->order_by('nom_arr');

        $query = $this->db->get('arrondissements');

        return $query->result_array();
    }
}
