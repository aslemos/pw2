<?php

class Usager extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {

        $data['title'] = 'Liste des membres';

        $data['usagers'] = $this->membre_model->get_membres();
//        print_r($data['membres']);
//        $this->load->view('templates/header');
        $this->load->view('user/', $data);
//        $this->load->view('templates/footer');
    }

    public function inscription() {
        $data['meta_keywords'] = "";
        $data['$meta_description'] = "";
        $data['page_title'] = "Devenir Membre";
        $data['body_class'] = "subpages devenir-membre";

//        $this->load->view('client/form_membre.php', $data);
        $this->load->view('client/devenir-membre.php', $data);
    }
}
