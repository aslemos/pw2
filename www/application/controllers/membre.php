<?php
/*
 * Class membre pour gérer l'accès des membres
 */
class Membre extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }
    }

    public function index() {
        $this->vehicules();
    }

    /**
     * Affiche la liste des véhicules appartenant à l'usager logué
     */
    public function vehicules() {

        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Mes véhicules';
        $data['title'] = 'Mes véhicules';
        $data['body_class'] = 'subpages membre';
        $data['vehicules'] = $this->vehicule_model->getVehiculesByUser(UserAcces::getLoggedUser());
        $this->load->view('membre/liste_voitures', $data);
    }

    /**
     * Affiche les demandes de réservation à approuver<br>
     *(en attente d'approbation par le propriétaire du véhicule).
     */
    public function demandesReservation() {

        $this->load->model('location_model');
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Demandes de réservation';
        $data['title'] = 'Demandes de réservation';
        $data['body_class'] = 'subpages membre';
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_approbation_location.js'
        ];

        // trouve les réservations en attende d'autorisation
        $data['reservations'] = $this->location_model->getDemandesByUser(
                    UserAcces::getLoggedUser(),
                    ELocation::LOCATION_EN_ATTENTE
                );

        $this->load->view('membre/demandes_reservation', $data);
    }
}
