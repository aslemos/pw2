<?php

/*
 * 
 * 
 * 
 */

    class Vehicule_model extends CI_Model {
	
	public function __construct() {
		
            $this->load->database();
	}
	
	public function get_vehicules($vehicule_id = NULL){
		
            if($vehicule_id == NULL){
			
                $this->db->order_by('vehicule_id', 'DESC');

                $this->db->join('usagers','vehicules.user_id = usagers.user_id');
                $this->db->join('type_vehicules','vehicules.type_id = type_vehicules.type_id');
                $this->db->join('marques','vehicules.marque_id = marques.marque_id');
                $this->db->join('modeles','vehicules.modele_id = modeles.modele_id');
                $this->db->join('carburants','vehicules.carburant_id = carburants.carburant_id');
                $this->db->join('transmissions','vehicules.transmission_id = transmissions.transmission_id');
                $this->db->join('arrondissements','vehicules.arr_id = arrondissements.arr_id');
			
                $query = $this->db->get('vehicules');

                return $query->result_array();
            }
		
            $this->db->join('usagers','vehicules.user_id = usagers.user_id');
            $this->db->join('type_vehicules','vehicules.type_id = type_vehicules.type_id');
            $this->db->join('marques','vehicules.marque_id = marques.marque_id');
            $this->db->join('modeles','vehicules.modele_id = modeles.modele_id');
            $this->db->join('carburants','vehicules.carburant_id = carburants.carburant_id');
            $this->db->join('transmissions','vehicules.transmission_id = transmissions.transmission_id');
            $this->db->join('arrondissements','vehicules.arr_id = arrondissements.arr_id');

            $query = $this->db->get_where('vehicules',array('vehicule_id' => $vehicule_id));

            return $query->row_array();
	}
              
	public function create_vehicule($vehicule_photo){
		
            $data = array (
                'user_id'         => $this->session->userdata('user_id'),
                'matricule'       => $this->input->post('matricule'),
                'annee'           => $this->input->post('annee'),
                'nbre_places'     => $this->input->post('nbre_places'),			
                'prix'            => $this->input->post('prix'),
                'date_debut'      => $this->input->post('date_debut'),
                'date_fin'        => $this->input->post('date_fin'),
                'user_id'         => $this->input->post('user_id'),
                'type_id'         => $this->input->post('type_id'),
                'marque_id'       => $this->input->post('marque_id'),
                'modele_id'       => $this->input->post('modele_id'),
                'carburant_id'    => $this->input->post('carburant_id'),
                'transmission_id' => $this->input->post('transmission_id'),
                'arr_id'          => $this->input->post('arr_id'),
                'vehicule_photo'  => $vehicule_photo
            );
		
            return $this->db->insert('vehicules', $data);
	}
	
	public function delete_vehicule($vehicule_id){
		
            $this->db->where('vehicule_id', $vehicule_id);

            $this->db->delete('vehicules');	

            return true;
	}
	
	public function update_vehicule(){
		
            $data = array (
                'matricule'       => $this->input->post('matricule'),
                'annee'           => $this->input->post('annee'),
                'nbre_places'	  => $this->input->post('nbre_places'),			
                'prix'        	  => $this->input->post('prix'),
                'date_debut'      => $this->input->post('date_debut'),
                'date_fin'    	  => $this->input->post('date_fin'),
                'user_id'         => $this->input->post('user_id'),
                'type_id'         => $this->input->post('type_id'),
                'marque_id'       => $this->input->post('marque_id'),
                'modele_id'       => $this->input->post('modele_id'),
                'carburant_id'    => $this->input->post('carburant_id'),
                'transmission_id' => $this->input->post('transmission_id'),
                'arr_id'          => $this->input->post('arr_id'),
                'vehicule_photo'  => $vehicule_photo
            );
		
            $this->db->where('vehicule_id', $this->input->post('vehicule_id'));

            return $this->db->update('vehicules', $data);
	}
        
	public function get_vehicules_by_marque($marque_id){
			
            $this->db->order_by('vehicules.vehicule_id', 'DESC');

            $this->db->join('marques', 'marques.marque_id = vehicules.marque_id');

            $query = $this->db->get_where('vehicules', array('marques.marque_id' => $marque_id));

            return $query->result_array();
        }
        
        public function get_vehicules_by_type($type_id){
			
            $this->db->order_by('vehicules.vehicule_id', 'DESC');

            $this->db->join('type_vehicules','vehicules.type_id = type_vehicules.type_id');

            $query = $this->db->get_where('vehicules', array('type_vehicules.type_id' => $type_id));

            return $query->result_array();
        }   
        
        public function get_vehicules_by_arr($arr_id){
			
            $this->db->order_by('vehicules.vehicule_id', 'DESC');

            $this->db->join('arrondissements','vehicules.arr_id = arrondissements.arr_id');

            $query = $this->db->get_where('vehicules', array('arrondissements.arr_id' => $arr_id));

            return $query->result_array();
        }     
        
        public function get_vehicules_by_user($user_id){
			
            $this->db->order_by('vehicules.vehicule_id', 'DESC');

            $this->db->join('usagers', 'usagers.user_id = vehicules.user_id');
            $this->db->join('marques', 'marques.marque_id = vehicules.marque_id');
            $this->db->join('modeles','vehicules.modele_id = modeles.modele_id');
            $this->db->join('type_vehicules','vehicules.type_id = type_vehicules.type_id');
            $this->db->join('arrondissements','vehicules.arr_id = arrondissements.arr_id');

            $query = $this->db->get_where('vehicules', array('usagers.user_id' => $user_id));

            return $query->result_array();
        } 
        
	public function get_usagers(){
        
            $this->db->order_by('nom');

            $query = $this->db->get('usagers');

            return $query->result_array();
        }
	
	public function get_type_vehicules(){
        
            $this->db->order_by('nom_type');

            $query = $this->db->get('type_vehicules');

            return $query->result_array();
        }
	
        public function get_marques(){

            $this->db->order_by('nom_marque');

            $query = $this->db->get('marques');

            return $query->result_array();
        }
        
	public function get_modeles(){

            $this->db->order_by('nom_modele');

            $query = $this->db->get('modeles');

            return $query->result_array();
        }
        
	public function get_carburants(){

            $this->db->order_by('nom_carburant');

            $query = $this->db->get('carburants');

            return $query->result_array();
        }
	
	public function get_transmissions(){
        
            $this->db->order_by('nom_transmission');

            $query = $this->db->get('transmissions');

            return $query->result_array();
        }
	
	public function get_arrondissements(){
        
            $this->db->order_by('nom_arr');

            $query = $this->db->get('arrondissements');

            return $query->result_array();
        }
    }
