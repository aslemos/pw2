<?php
/*
 *
 *
 *
 */

class Marque_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Retourne une objet de marque par son ID
     * @param int $marque_id
     * @return EMarque
     * @author Alessandro Souza Lemos
     */
    public function getMarqueById($marque_id) {
        if (intval($marque_id) > 0) {
            $query = $this->db->get_where('marques', ['marque_id' => $marque_id]);
            $data = $query->result_array();
            if (count($data) > 0) {
                return new EMarque($data[0]);
            }
        }
        return NULL;
    }


    public function getMarques($marque_id = Null) {

        if ($marque_id === Null) {

            $this->db->order_by('nom_marque');
            $query = $this->db->get('marques');
            return $query->result_array();
        } else {

            $query = $this->db->get_where('marques', array('marque_id' => $marque_id));
            return $query->row();
        }
    }

    public function createMarque() {

        $data = array(
            'nom_marque' => $this->input->post('nom_marque'),
            'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('marques', $data);
    }

    public function deleteMarque($marque_id) {

        $this->db->where('marque_id', $marque_id);
        $this->db->delete('marques');
        return true;
    }
}
