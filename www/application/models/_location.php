<?php

class Location extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function form_insert($data) {
// Inserting in Table(students) of Database(college)
        $this->db->insert('locations', $data);
    }

    function getVoitures() {

        $this->load->database();

        $query = $this->db->query('SELECT vehicules.date_debut, vehicules.date_fin, vehicules.vehicule_id, vehicules.matricule, vehicules.annee, vehicules.prix, marques.nom_marque, type_vehicules.nom_type FROM vehicules INNER JOIN marques ON vehicules.marque_id=marques.marque_id INNER JOIN type_vehicules ON vehicules.type_id=type_vehicules.type_id');

        //$query = $this->db->get('marques');
        return $query->result();
    }
}
