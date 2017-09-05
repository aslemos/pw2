<?php
class Reclamation extends CI_Controller {



     public function form_reclamation($id) {

        $this->load->model('usager2');
        $this->load->model('voiture2');

        $data['users'] = $this->usager2->getUsersInfo();
        $data['voitures'] = $this->voiture2->getVoituresById($id);

        $this->load->view('client/form_reclamation',  $data);
    }


    public function insert_reclamation() {

        $this->load->model('reclamations');
        $data['reclamation'] = $this->voiture2->getVoituresById($id);

        $this->load->view('client/form_location',  $data);
    }
}