<?php

class Voiture2 extends CI_Model {

    function __construct() {
        //parent::Model();
    }

    function getVoitures() {
        $this->load->database();
        $query = $this->db->query('SELECT transmissions.nom_transmission, carburants.nom_carburant, vehicules.annee, vehicules.nbre_places, vehicules.date_debut, vehicules.date_fin, vehicules.vehicule_id, vehicules.matricule, vehicules.annee, vehicules.prix, marques.nom_marque, type_vehicules.nom_type FROM vehicules INNER JOIN marques ON vehicules.marque_id=marques.marque_id INNER JOIN type_vehicules ON vehicules.type_id=type_vehicules.type_id INNER JOIN carburants ON vehicules.carburant_id=carburants.carburant_id INNER JOIN transmissions ON vehicules.transmission_id=transmissions.transmission_id');
        return $query->result();
    }

    function getVoituresById($id) {
        $this->load->database();
        $query = $this->db->query('SELECT usagers.nom, usagers.prenom, usagers.courriel, usagers.telephone, transmissions.nom_transmission, carburants.nom_carburant, vehicules.annee, vehicules.nbre_places, vehicules.date_debut, vehicules.date_fin, vehicules.vehicule_id, vehicules.matricule, vehicules.annee, vehicules.prix, marques.nom_marque, type_vehicules.nom_type FROM vehicules INNER JOIN marques ON vehicules.marque_id=marques.marque_id INNER JOIN type_vehicules ON vehicules.type_id=type_vehicules.type_id INNER JOIN carburants ON vehicules.carburant_id=carburants.carburant_id INNER JOIN transmissions ON vehicules.transmission_id=transmissions.transmission_id INNER JOIN usagers ON vehicules.user_id=usagers.user_id WHERE vehicules.vehicule_id=' . $id);
        return $query->result()[0];
    }

    function getUsersInfo() {

        $this->load->model('usager2');

        $data['users'] = $this->usager2->getUsersInfo();

        $this->load->view('client/form_location', $data);
        print_r($data);
    }

    function form_insert($data) {
        $this->db->insert('locations', $data);
    }

}
