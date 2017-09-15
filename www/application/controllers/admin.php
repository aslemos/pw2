
<?php

class Admin extends CI_Controller {

    private $data = [];
    public function __construct() {
        parent::__construct();
        $this->data['base_url'] = base_url();

        // Test de permission
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login#s');

        } else if (!UserAcces::userIsAdmin()) {
            redirect('noperm#s');
        }
    }

    public function index() {
        $this->listeUsagers();
    }


    /**
     * Liste des administrateurs du site
     */
    public function listeAdmins() {
        if (!UserAcces::userIsSuperAdmin()) {
            redirect('noperm');
        }
        $this->load->view('admin/liste_admins', $this->data);
    }

    /**
     * Liste générale des usagers du site
     */
    public function listeUsagers() {
        $this->load->view('admin/liste_usagers', $this->data);
    }

    /**
     * Liste générale des voitures du site
     */
    public function listeVoitures() {
        $this->load->view('admin/liste_voitures_admin', $this->data);
    }

    /**
     * Affichage des réclamations
     */
    public function reclamations() {
        echo 'liste et visualisation des messages de réclamation';
    }

    /**
     * Les messages internes envoyés par les usagers du site<br>
     * par intermède de la fonction 'Contacter admin'
     */
    public function messages() {
        echo 'liste et visualisation des messages internes';
    }

    /**
     * Affichage des messages du 'contactez-nous'<br>
     * Ce sont les messages laissés par les visiteurs du site.
     */
    public function contacts() {
        echo 'liste et visualisation des messages de contact';
    }
}

