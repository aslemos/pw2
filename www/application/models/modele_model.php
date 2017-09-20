<?php
/*
 * classe Modèle de la table 'modeles'
 */

class Modele_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Retourne un objet de modèle par son ID
     * @param int $modele_id
     * @return EModele
     */
    public function getModeleById($modele_id) {
        if (intval($modele_id) > 0) {
            $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
            $query = $this->db->get_where('modeles', ['modele_id' => $modele_id]);
            $data = $query->row_array();
            if (!empty($data)) {
                $modele = new EModele($data);
                $modele->setMarque(new EMarque($data));
                return $modele;
            }
        }
        return NULL;
    }

    public function getModeles() {

        $this->db->order_by('nom_modele');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $query = $this->db->get('modeles');
        return $query->result_array();
    }

    /**
     * Trouve les modèles qui correspondent à la marque passée en paramètre
     * @param int $marque_id L'identifiant de la marque cherchée
     * @return array
     */
    public function getModelesByMarqueId($marque_id) {
        if (intval($marque_id) > 0) {
            $this->db->order_by('nom_modele');
            $query = $this->db->get_where('modeles', 'marque_id = ' . $this->db->escape($marque_id));
//            $query = $this->db->get('modeles');
            return $query->result_array();
        }
        return [];
    }

    public function createModele() {

        $data = array(
            'nom_modele' => $this->input->post('nom_modele'),
            'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('modeles', $data);
    }

//    public function get_modele($modele_id) {
//    public function getModeleById($modele_id) {
//
//        $query = $this->db->get_where('modeles', array('modele_id' => $modele_id));
//        return $query->row();
//    }

    public function deleteModele($modele_id) {

        $this->db->where('modele_id', $modele_id);
        $this->db->delete('modeles');
        return true;
    }
}
