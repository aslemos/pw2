<?php

class Reclamation extends CI_Model {

    function __construct() {
        //parent::Model();
    }

    function getReclamation() {

        $this->load->database();

        $query = $this->db->query('');

        return $query->result();
    }

    function insertReclamation() {

        $this->load->database();

        $query = $this->db->query('');

        return $query->result()[0];
    }



}
