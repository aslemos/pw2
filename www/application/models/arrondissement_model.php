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
        if (intval($ville_id) > 0) {
            $this->db->order_by('nom_arr');
            $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');
            $query = $this->db->get_where('arrondissements', ['arrondissements.ville_id' => $ville_id]);
            return $query->result_array();
        }
        return [];
    }

    /**
     * Retourne la liste de villes d'une province donnée
     * @param int $province_id
     * @return array
     * @author Alessandro Souza Lemos
     */
    public function getVillesByProvinceId($province_id) {
        if (strlen($province_id) == 2) {
            $this->db->order_by('nom_ville');
            $query = $this->db->get_where('villes', ['province' => $province_id]);
            return $query->result_array();
        }
        return [];
    }

    /**
     * Récupère un arrondissement spécifique par son ID
     * @param int $arr_id
     * @return EArrondissement
     * @author Alessandro Souza Lemos
     */
    public function getArrondissementById($arr_id) {

        // Trouve les données de l'arrondissement et la ville
        $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');
        $query = $this->db->get_where('arrondissements', ['arr_id' => $arr_id]);
        $data = $query->row_array();
        if (!empty($data)) {
            $arrond = new EArrondissement($data);

            // Instantie la Ville
            $arrond->setVille(new EVille($data));
            return $arrond;
        }
        return NULL;
    }

    /**
     * Retourne la liste complète de villes
     * @return array
     * @author Alessandro Souza Lemos
     */
    public function getVilles() {
        $this->db->order_by('nom_ville');
        $query = $this->db->get('villes');
        return $query->result_array();
    }

    /**
     * Retourne une ville spécifique par son ID
     * @param int $ville_id
     * @return EVille
     */
    public function getVilleById($ville_id) {
        $query = $this->db->get_where('villes', ['ville_id' => $ville_id]);
        return new EVille($query->result_array());
    }

    /**
     * Trouve toutes les provinces
     * @return array
     */
    public function getProvinces() {
        $this->db->distinct();
        $this->db->order_by('province');
        $this->db->select('province AS province_id, province');
        $query = $this->db->get('villes');
        return $query->result_array();
    }
}
