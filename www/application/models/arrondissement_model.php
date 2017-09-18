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
        $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');
        $query = $this->db->get('arrondissements');

        return $query->result_array();
    }

    public function getArrondissementsByVilleId($ville_id) {

        $this->db->order_by('nom_arr');
        $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');
        $query = $this->db->get_where('arrondissements', ['arrondissements.ville_id' => $ville_id]);

        return $query->result_array();
    }

    public function getArrondissementById($arr_id) {

        // Trouve les données de l'arrondissement et la ville
        $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');
        $query = $this->db->get_where('arrondissements', ['arr_id' => $arr_id]);
        $res_arrond = $query->result_array();
        $arrond = new EArrondissement($res_arrond);

        // Instantie la Ville
        $arrond->setVille(new EVille($res_arrond));
        return $arrond;
    }

    public function getVilles() {
        $this->db->order_by('nom_ville');
        $query = $this->db->get('villes');
        return $query->result_array();
    }

    public function getVilleById($ville_id) {
        $query = $this->db->get_where('villes', ['ville_id' => $ville_id]);
        return new EVille($query->result_array());
    }
}
