<?php

/* 
 * 
 * 
 * 
 */



    class Marque_model extends CI_Model{
        
        public function __construct(){
            
            $this->load->database();
        }

        public function get_marque($marque_id = Null){
            
            if( $marque_id === Null ) {
                
                $this->db->order_by('nom_marque');
                $query = $this->db->get('marques');
                return $query->result_array(); 
                
            } else {
                
                $query = $this->db->get_where('marques', array('marque_id' => $marque_id));
                return $query->row();
            }           
        }
        
        public function create_marque(){
            
            $data = array(
                
                'nom_marque' => $this->input->post('nom_marque'),
                'user_id' => $this->session->userdata('user_id')
            );

            return $this->db->insert('marques', $data);
        }
     
        public function delete_marque($marque_id){
            
            $this->db->where('marque_id', $marque_id);
            $this->db->delete('marques');
            return true;
        }
    }
