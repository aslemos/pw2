<?php

class ModePaiement_Model extends CI_Model {

    function getModesPaiements() {
        $this->load->database();
       $query = $this->db->query('SELECT * FROM modes_paiements');
       return $query->result();
    }

}
