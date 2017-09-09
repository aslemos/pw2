<?php
class Reclamation extends CI_Controller {



     public function form_reclamation($id) {

        $data['body_class'] = "subpages membre";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';

        $this->load->model('vehicule_model');

        $data['users'] = UserAcces::getLoggedUser();
        $data['voitures'] = $this->vehicule_model->getVehicules($id);

        $this->load->view('client/form_reclamation',  $data);
    }


    public function insert_reclamation() {

        $this->load->model('reclamations');
        $data['reclamation'] = $this->voiture2->getVoituresById($id);

        $this->load->view('client/form_location',  $data);
    }
}