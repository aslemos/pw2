<?php

class Usager extends CI_Controller {

    public function index() {

        $data['title'] = 'Liste des membres';

        $data['usagers'] = $this->membre_model->get_membres();
//        print_r($data['membres']);

//        $this->load->view('templates/header');
        $this->load->view('user/', $data);
//        $this->load->view('templates/footer');
    }
}
