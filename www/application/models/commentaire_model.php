<?php
/*
 *
 *
 *
 */

class Commentaire_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function createCommentaire($vehicule_id) { //create_commentaire

        $data = array(
            'vehicule_id' => $commentaires_id,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'body' => $this->input->post('body')
        );

        return $this->db->insert('commentaires', $data);
    }

    public function getCommentaires($commentaires_id) { //get_comments

        $query = $this->db->get_where('commentaires', array('commentaires_id' => $commentaires_id));

        return $query->result_array();
    }
}
