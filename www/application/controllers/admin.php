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

//    public function index() {
//        $this->listeMembres();
//    }


    /**
     * Liste des administrateurs du site
     */
    public function listeAdmins() {
        if (!UserAcces::userIsSuperAdmin()) {
            redirect('noperm');
        }

        $data['title'] = 'Liste des administrateurs';
        $data['body_class'] = '';
        $data['base_url'] = base_url();
        $data['usagers'] = $this->usager_model->getAdmins();

        $this->load->view('admin/liste_admins', $data);
    }

    /**
     * Liste générale des usagers du site
     */
    public function listeMembres() {

        $data['title'] = 'Liste des membres';
        $data['body_class'] = '';
        $data['base_url'] = base_url();

        $data['usagers'] = $this->usager_model->getUsagersByRoleId(ERole::ROLE_CLIENT);

        $this->load->view('admin/liste_usagers', $data);
    }

    /**
     * Liste générale des voitures du site
     */
    public function listeVoitures() {
        $this->data['vehicules'] = $this->vehicule_model->getVehicules();
        $this->load->view('admin/liste_voitures_admin', $this->data);      
    }

    /**
     * Approbation d'une demande d'abonnement au site
     */
    public function approuverMembre() {
        echo 'Aprouver un nouveau abonné du système';
    }

    /**
     * Affichage des réclamations
     */
    public function reclamations() {
       echo 'liste et visualisation des messages de réclamation';
       $this->load->model('message_model');
       $data['reclamation'] = $this->message_model->getReclamations();
       //this-load-view()
       $this->load->view('admin/liste_reclamations', $data); 
       //var_dump($this->data);
       // message_model function  getreclamayion
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

