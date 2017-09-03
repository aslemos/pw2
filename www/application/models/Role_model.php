<?php

/* 
 *
 * 
 * 
 */


    class Role_model extends CI_Model{
        
        public function __construct(){
            
            $this->load->database();
        }

        public function get_roles(){
            
            $this->db->order_by('nom_role');
            $query = $this->db->get('roles');
            return $query->result_array();
        }

        public function create_role(){
            
            $data = array(
                'nom_role' => $this->input->post('nom_role'),
                'user_id' => $this->session->userdata('user_id')
            );

            return $this->db->insert('roles', $data);
        }

        public function get_role($role_id){
            
            $query = $this->db->get_where('roles', array('role_id' => $role_id));
            return $query->row();
        }

        public function delete_role($role_id){
            
            $this->db->where('role_id', $role_id);
            $this->db->delete('roles');
            return true;
        }
    }