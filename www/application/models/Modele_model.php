<?php

/* 
 * 
 * 
 * 
 */


    class Modele_model extends CI_Model{
        
        public function __construct(){
            
            $this->load->database();
        }

        public function get_modeles(){
            
            $this->db->order_by('nom_modele');
            $query = $this->db->get('modeles');
            return $query->result_array();
        }

        public function create_modele(){
            
            $data = array(
                'nom_modele' => $this->input->post('nom_modele'),
                'user_id' => $this->session->userdata('user_id')
            );

            return $this->db->insert('modeles', $data);
        }

        public function get_modele($modele_id){
            
            $query = $this->db->get_where('modeles', array('modele_id' => $modele_id));
            return $query->row();
        }

        public function delete_modele($modele_id){
            
            $this->db->where('modele_id', $modele_id);
            $this->db->delete('modeles');
            return true;
        }
    }
