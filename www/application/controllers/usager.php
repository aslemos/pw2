<?php

class Usager extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {

        $data['title'] = 'Liste des membres';

        $this->load->view('client/devenir-memb', $data);
    }

    public function inscription() {
        $data['meta_keywords'] = "";
        $data['meta_description'] = "";
        $data['page_title'] = "Devenir Membre";
        $data['body_class'] = "subpages devenir-membre";

        $this->load->view('client/devenir-membre.php', $data);
    }

    function getUsersInfo() {

        $this->load->model('usager2');

        $data['users'] = $this->usager2->getUsersInfo();

        $this->load->view('client/form_location_1',  $data);
        print_r($data);
    }
}
