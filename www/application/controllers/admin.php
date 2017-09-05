
<?php

class Admin extends CI_Controller {

    private $data = [];
    public function __construct() {
        parent::__construct();
        $this->data['base_url'] = base_url();
    }

    public function listeAdmins() {
        $this->load->view('admin/liste_admins', $this->data);
    }

    public function listeUsagers() {
        $this->load->view('admin/liste_usagers', $this->data);
    }

    public function listeVoitures() {
        $this->load->view('admin/liste_voitures_admin', $this->data);
    }
    


    public function view($page) {
//            $this->load->helper('url');
            $data['title'] = ucfirst($page);

            $data['base_url'] = base_url();

            $this->load->view('admin/' . $page, $data);
    }
}

