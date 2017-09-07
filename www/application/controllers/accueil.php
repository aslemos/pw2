<?php

class Accueil extends CI_Controller {

    public function index() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Accueil';
        $data['body_class'] = '';
        $data['base_url'] = base_url();
        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $this->load->view('accueil', $data);
    }
}