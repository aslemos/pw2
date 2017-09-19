<?php

class Admin extends CI_Controller {

    private $func = [];
    public function __construct() {
        parent::__construct();

        // Test de permission
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login#s');

        } else if (!UserAcces::userIsAdmin()) {
            redirect('noperm#s');
        }
    }

    public function index() {
        $this->listeMembres();
    }


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
        $data['page_title'] = 'Liste des membres';
        $data['title'] = 'Liste des membres';
        $data['body_class'] = 'subpages listeAdmin';
        $data['base_url'] = base_url();

        $data['usagers'] = $this->usager_model->getMembres();

        $this->load->view('admin/liste_usagers', $data);
    }

    /**
     * Liste générale des voitures du site, visible pour l'administrateur
     */
    public function listeVehicules() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Liste des véhicules';
        $data['title'] = 'Les véhicules';
        $data['body_class'] = 'subpages listeAdmin';

        $data['vehicules'] = $this->vehicule_model->getVehicules();
        $this->load->view('admin/liste_voitures_admin', $data);
    }

    /**
     * Affiche les véhicules en attente d'approbation
     */
    public function approuverVehicule() {
        $data['page_title'] = 'Approuver véhicule';
        $data['title'] = 'Véhicules en attente d\'approbation';
        $data['body_class'] = 'subpages listeAdmin';
        $data['vehicules'] = $this->vehicule_model->getVehiculesEnAttente();
        $this->load->view('admin/liste_voitures_admin', $data);
    }

    /**
     * Approbation d'une demande d'abonnement au système
     */
    public function approuverMembre() {
        $data['page_title'] = 'Approbation de membre';
        $data['title'] = 'Approbation de membre';
        $data['usagers'] = $this->usager_model->getUsagersEnAttente();
        $this->load->view('admin/liste_usagers_approuver', $data);
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
        echo 'liste et visualisation des messages internes à l\'administrateur';
        $messages = $this->message_model->getMessagesAdmin();
        echo '<pre>';
        var_dump($messages);
        echo '</pre>';
    }

    /**
     * Affichage des messages du 'contactez-nous'<br>
     * Ce sont les messages laissés par les visiteurs du site.
     */
    public function contacts() {
        echo 'liste et visualisation des messages de contact des visiteurs du site';
        $contacts = $this->message_model->getContacts();
        echo '<pre>';
        var_dump($contacts);
        echo '</pre>';
    }
}

