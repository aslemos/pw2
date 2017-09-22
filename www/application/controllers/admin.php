<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Test de permission
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login#s');

        } else if (!UserAcces::userIsAdmin()) {
            redirect('noperm#s');
        }
    }


    /**
     * Liste des administrateurs du site
     */
    public function listeAdmins() {
        if (!UserAcces::userIsSuperAdmin()) {
            redirect('noperm');
        }

        $data['page_title'] = 'Liste des administrateurs du site';
        $data['title'] = 'Administrateurs du site';
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
        $data['page_title'] = 'Liste des membres';
        $data['body_class'] = 'subpages listeAdmin';
        $data['base_url'] = base_url();

        $data['usagers'] = $this->usager_model->getMembres();
        $this->load->view('admin/liste_usagers', $data);
    }

    /**
     * Liste générale des voitures du site, visible pour l'administrateur
     */
    public function listeVehicules() {
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
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_approbation_vehicule.js'
        ];
        $this->load->view('admin/liste_voitures_approuver', $data);
    }

    /**
     * Approbation d'une demande d'abonnement au système
     */
    public function approuverMembre() {
        $data['page_title'] = 'Approbation de membre';
        $data['title'] = 'Membres en attente d\'approbation';
        $data['body_class'] = 'subpages listeAdmin';
        $data['usagers'] = $this->usager_model->getUsagersEnAttente();
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_approbation_membre.js'
        ];
        $this->load->view('admin/liste_usagers_approuver', $data);
    }

    /**
     * Affichage des réclamations
     */
    public function reclamations() {
        $data['page_title'] = 'Réclamations des membres';
        $data['title'] = 'Réclamations des membres';
        $data['body_class'] = 'subpages listeAdmin';
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
        $data['page_title'] = 'Messages des membres';
        $data['title'] = 'Messages des membres';
        $data['body_class'] = 'subpages listeAdmin';
        $data['messages'] =  $this->message_model->getMessagesAdmin();
        $this->load->view('admin/liste_message_interne', $data);
    }

    /**
     * Affichage des messages du 'contactez-nous'<br>
     * Ce sont les messages laissés par les visiteurs du site.
     */
    public function contacts() {
        $data['page_title'] = 'Contacts des visiteurs du site';
        $data['title'] = 'Contacts des visiteurs du site';
        $data['body_class'] = 'subpages listeAdmin';
        $data['contacts'] = $this->message_model->getContacts();
        $this->load->view('admin/liste_contacts', $data);
    }
}

