<?php
/*
 *
 *
 *
 */

class Location_model extends CI_Model {

    public function __construct() {

        $this->load->database();
    }

    public function get_locations($location_id = NULL) {

        if ($location_id == NULL) {

            $this->db->order_by('location_id', 'DESC');

            $this->db->join('usagers', 'locations.user_id = usagers.user_id');
            $this->db->join('vehicules', 'locations.vehicule_id = vehicules.vehicule_id');
            //$this->db->join('paiements', 'locations.paiement_id = paiements.paiement_id');

            $query = $this->db->get('locations');

            return $query->result_array();
        }

        $this->db->join('usagers', 'locations.user_id = usagers.user_id');
        $this->db->join('vehicules', 'locations.vehicule_id = vehicules.vehicule_id');
        //$this->db->join('paiements', 'locations.paiement_id = paiements.paiement_id');

        $query = $this->db->get_where('locations', array('locations.location_id' => $location_id));

        return $query->row_array();
    }



    public function create_location($data) {

//        $data = array(
//            'date_debut' => $this->input->post('date_debut'),
//            'date_fin' => $this->input->post('date_fin'),
//            'user_id' => $this->session->userdata('user_id'),
//            'vehicule_id' => $this->input->post('vehicule_id'),
//            'paiement_id' => $this->input->post('paiement_id')
//        );

        $this->db->insert('locations', $data);

    }




    public function delete_location($location_id) {

        $this->db->where('location_id', $location_id);

        $this->db->delete('locations');

        return true;
    }

    public function update_location() {

        $data = array(
            'date_debut' => $this->input->post('date_debut'),
            'date_fin' => $this->input->post('date_fin'),
            'user_id' => $this->session->userdata('user_id'),
            'vehicule_id' => $this->input->post('vehicule_id'),
            'paiement_id' => $this->input->post('paiement_id')
        );

        $this->db->where('location_id', $this->input->post('location_id'));

        return $this->db->update('locations', $data);
    }

    public function get_locations_by_dates($date_debut, $date_fin) {

        $this->db->order_by('locations.location_id', 'DESC');

        $query = $this->db->get_where('locations', array(
            'locations.date_debut' => $date_debut,
            'locations.date_fin' => $date_fin)
        );

        return $query->result_array();
    }

    public function get_locations_by_vehicule($vehicule_id) {

        $this->db->order_by('locations.location_id', 'DESC');

        $query = $this->db->get_where('locations', array('locations.vehicule_id' => $vehicule_id));

        return $query->result_array();
    }

    public function getLocationsByUser(EUsager $user) {

        $this->db->order_by('locations.location_id', 'DESC');
        $this->db->join('vehicules', 'locations.vehicule_id = vehicules.vehicule_id');
        $this->db->join('modeles', 'modeles.modele_id = vehicules.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('usagers', 'usagers.user_id = vehicules.proprietaire_id');

        $query = $this->db->get_where('locations', array('locations.user_id' => $user->getId()));
        return $query->result_array();
    }

    public function getLocatairesByUser(EUsager $user) {

        $this->db->order_by('locations.location_id', 'DESC');
        $this->db->join('vehicules', 'locations.vehicule_id = vehicules.vehicule_id');
        $this->db->join('modeles', 'modeles.modele_id = vehicules.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('usagers', 'usagers.user_id = locations.user_id');

        $query = $this->db->get_where('locations', array('vehicules.proprietaire_id' => $user->getId()));
        return $query->result_array();
    }

    public function get_paiements() {

        $this->db->order_by('paiement_id', 'DESC');

        $query = $this->db->get_where('paiements', array('paiements.user_id' => $user_id));

        return $query->result_array();
    }

}
