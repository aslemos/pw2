<?php

/* 
 * 
 * 
 * 
 */


    class Commentaire_model extends CI_Model{

        public function __construct(){

            $this->load->database();
        }

        public function create_commentaire($vehicule_id){

            $data = array(

                'vehicule_id' => $commentaires_id,
                'name' 	=> $this->input->post('name'),
                'email' => $this->input->post('email'),
                'body' 	=> $this->input->post('body')
            );

            return $this->db->insert('commentaires', $data);
        }

        public function get_comments($commentaires_id){

            $query = $this->db->get_where('commentaires', array('commentaires_id' => $commentaires_id));

            return $query->result_array();
        }
    }