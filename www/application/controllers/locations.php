<?php

/*
 * Contrôleur des locations et paiements
 */

class Locations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }
        if (!UserAcces::userIsAdmin() && !UserAcces::userIsActif()) {
            redirect('noperm');
        }
    }

    /**
     * Mise-à-jour d'une réservation
     */
    public function updateLocation() {

        $location = $this->location_model->getLocationById($this->input->post('location_id'));
        $location->setDateDebut($this->input->post('date_debut'));
        $location->setDateFin($this->input->post('date_fin'));

        $locataire = $this->usager_model->getUserById($this->session->userdata('user_id'));
        $location->setLocataire($locataire);

        $vehicule = $this->vehicule_model->getVehiculeById($this->input->post('vehicule_id'));
        $location->setVehicule($vehicule);

        $this->location_model->updateLocation($location);
    }

    /**
     * Les locations prises par un membre (le client)
     */
    public function locationsByUser() {

        $user = UserAcces::getLoggedUser();
        $this->load->model('location_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Historique des locations du membre';
        $data['title'] = 'Historique des locations';
        $data['body_class'] = "subpages membre";
        $data['scripts'] = [base_url() . 'assets/js/calendrier_date_debut_et_fin.js'];
        // données du form de recherche
        $data['date_debut'] = $this->input->post('date_debut');
        $data['date_fin'] = $this->input->post('date_fin');
        $data['vehicule_id'] = $this->input->post('vehicule_id');
        //
        $data['vehicules'] = $this->vehicule_model->getVehicules();
        $data['locations'] = $this->location_model->getLocationsByUser($user, [
            'vehicule_id' => $data['vehicule_id'],
            'date_debut' => $data['date_debut'],
            'date_fin' => $data['date_fin']
        ]);
        //
        $this->load->view('membre/historique_location', $data);
    }

    /**
     * Affiche la liste des clients d'un prestataire
     * C'est la liste de qui a utilisé les véhicules d'un propriétaire
     */
    public function locataires() {

        $user = UserAcces::getLoggedUser();
        $this->load->model('location_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Locataires du membre';
        $data['title'] = 'Historique - Mes locataires';
        $data['body_class'] = "subpages membre";
        $data['action'] = base_url() . 'locations/locataires#s';
        $data['scripts'] = [base_url() . 'assets/js/calendrier_date_debut_et_fin.js'];
        $data['usagers'] = $this->usager_model->getUsers();
        // données du form de recherche
        $data['date_debut'] = $this->input->post('date_debut');
        $data['date_fin'] = $this->input->post('date_fin');
        $data['locataire_id'] = $this->input->post('locataire_id');
        //
        $data['locations'] = $this->location_model->getLocatairesByUser($user, [
            'locataire_id' => $data['locataire_id'],
            'date_debut' => $data['date_debut'],
            'date_fin' => $data['date_fin']
        ]);
        //
        $this->load->view('membre/historique_locataires', $data); // fichier n'existe pas encore
    }

    /**
     * Affiche le formulaire de réservation
     * @param int $vehicule_id L'identifiant du véhicule
     */
    public function form_location($vehicule_id) {

        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Confirmer réservation';
        $data['scripts'] = [base_url() . 'assets/js/calendrier_date_debut_et_fin.js'];

        $this->load->model('vehicule_model');
        $this->load->model('modepaiement_model');



        $this->load->model('location_model');

        $date_debut=$this->input->post('date_debut');
        $date_fin =$this->input->post('date_fin');

        $data['date_debut'] = $this->input->post('date_debut');
        $data['date_fin'] = $this->input->post('date_fin');

        $data['users'] = UserAcces::getLoggedUser();
        $data['voitures'] = $this->vehicule_model->getVehicules($vehicule_id);
        $data['payements'] = $this->modepaiement_model->getModesPaiements();

        $nb_jours = 0;
        $data['prix_total'] = ELocation::calculerPrixTotal($data['voitures']['prix'], $date_debut, $date_fin, $nb_jours);

        $this->load->view('client/form_location', $data);

    }


    /**
     * Insère la réservation dans la BD
     */
    public function insererLocation() {
        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Location reçus';

        $data1['date_debut'] = $this->input->post('date_debut');
        $data1['date_fin'] = $this->input->post('date_fin');
        $data1['locataire_id'] = $this->input->post('user_id');
        $data1['vehicule_id'] = $this->input->post('vehicule_id');

        // enregistre le location
        $this->load->model('location_model');
        $this->location_model->create_location($data1);

        $this->load->view('client/page_succes_location',$data );
        //redirect('accueil');
    }


    /**
     * Affiche le formulaire de paiement de la réservation
     * @param int $location_id
     */
    public function form_payement($location_id) {

        $this->load->model('location_model');
        // vérifie si la location existe. Sinon, on affiche 404
        $location = $this->location_model->getLocationById($location_id);
        if (!$location) {
            show_404();
        }

        $data['location'] = $location;
        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Paiement de réservation : ' . $data['location']->getVehicule()->toString();
        $data['scripts'] = [
            base_url() . 'assets/js/scripts_verifier_payaimant.js'
        ];

        $this->load->model('modepaiement_model');
        $data['payements'] = $this->modepaiement_model->getModesPaiements();

        $this->load->view('client/form_payemant', $data);
    }


    /**
     * Enregistre le paiement dans la BD
     */
    public function insererPayemant() {

        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Confirmation de paiement';

        $user = UserAcces::getLoggedUser();
        $this->load->model('location_model');
        $data['locations'] = $this->location_model->getLocationsByUser($user);
        $data['location_id'] = $this->input->post('location_id');

        $data2['user_id'] = $this->input->post('user_id');
        $data2['location_id'] = $this->input->post('location_id');
        $data2['montant'] = $this->input->post('montant');


         $data['scripts'] = [
            base_url() . 'assets/js/scripts_verifier_payaimant.js',

        ];

        // enregistre le payement
        $this->load->model('location_model');
        $this->location_model->create_payement($data2);

        $this->load->view('client/page_succes_payemant',$data);

    }

}
