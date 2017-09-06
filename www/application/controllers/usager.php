<?php

class Usager extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['title'] = 'Liste des membres';

        $data['usagers'] = $this->membre_model->get_membres();
        $data['base_url'] = base_url();
        $this->load->view('user/', $data);
    }

    public function inscription() {
        $data['meta_keywords'] = "";
        $data['meta_description'] = "";
        $data['page_title'] = "Devenir Membre";
        $data['body_class'] = "subpages devenir-membre";
        $data['base_url'] = base_url();

        $this->load->view('client/devenir-membre.php', $data);
    }

    public function listeVoitures() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'membre';
        $data['body_class'] = 'subpages membre';
        $data['base_url'] = base_url();
        $this->load->view('client/liste-voitures', $data);
    }

    public function listeLocations() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Liste des voitures';
        $data['body_class'] = 'subpages listeVoiture';
        $data['base_url'] = base_url();
        $this->load->view('client/historique-location', $data);
    }

    function getUsersInfo() {

        $this->load->model('usager2');

        $data['users'] = $this->usager2->getUsersInfo();

        $this->load->view('client/form_location_1',  $data);
        print_r($data);
    }
    
}
