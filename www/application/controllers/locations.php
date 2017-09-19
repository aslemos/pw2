<?php

/*
 *
 *
 *
 */

class Locations extends CI_Controller {

    public function index() {

        // Check login
        if (!UserAcces::userIsLogged()) {

            redirect('usagers/login');
        }

        $data['title'] = 'Historique des locations';

        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $this->load->view('common/header');
        $this->load->view('locations/index', $data);
        $this->load->view('common/footer');
    }

    public function view($location_id = NULL) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }

        $data['location'] = $this->location_model->getLocations($location_id);

        if (empty($data['location'])) {
            show_404();
        }

        $data['location_id'] = $data['location']['location_id'];

        $this->load->view('common/header');
        $this->load->view('locations/location', $data);
        $this->load->view('common/footer');
    }

    public function louer_car($id) { // à vérifier


        $this->load->model('location');


        $data = array(
            'vehicule_id' => $this->input->post('vehicule_id'),
            'date_debut ' => $this->input->post('date_debut'),
            'date_fin' => $this->input->post('date_fin')
        );

        //Transfering data to Model
        $this->insert_model->form_insert($data);
        $data['message'] = 'Data Inserted Successfully';
        //Loading View
        $this->load->view('insert_view', $data);
    }

    public function createLocation() {

        // Check login
        if (!UserAcces::userIsLogged()) {

            redirect('usagers/login');
        }
        $data['title'] = 'Ajouter une location';

        $data['usagers'] = $this->user_model->getUsers();
        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $this->form_validation->set_rules('date_debut', 'Date début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date fin', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('common/header');
            $this->load->view('locations/create', $data);
            $this->load->view('common/footer');
        } else {

            $this->location_model->createLocation();
            redirect('locations');
        }
    }

    public function deleteLocation($location_id) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }
        $this->location_model->deleteLocation($location_id);
        redirect('locations');
    }

    public function editLocation() {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }

        //$data['location'] = $this->location_model->getLocations($location_id);

        $data['usagers'] = $this->user_model->getUsers();
        $data['vehicules'] = $this->vehicule_model->getVehicules();

        //if(empty($data['location'])) {
        //        show_404();
        //}

        $data['title'] = 'Approuver une location';

        $this->load->view('common/header');
        $this->load->view('locations/edit', $data);
        $this->load->view('common/footer');
    }

    public function updateLocation() {

        // Check privilèges
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }
        if (!UserAcces::userIsAdmin()) {
            redirect('noperm');
        }

        $location = $this->location_model->getLocationById($this->input->post('location_id'));
        $location->setDateDebut($this->input->post('date_debut'));
        $location->setDateFin($this->input->post('date_fin'));

        $locataire = $this->usager_model->getUserById($this->session->userdata('user_id'));
        $location->setLocataire($locataire);

        $vehicule = $this->vehicule_model->getVehiculeById($this->input->post('vehicule_id'));
        $location->setVehicule($vehicule);

        $this->location_model->updateLocation($location);
    }

    public function locationsByUser() {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }

        $user = UserAcces::getLoggedUser();
        $this->load->model('location_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Historique des locations du membre';
        $data['title'] = 'Historique des locations';
        $data['scripts'] = [base_url() . 'assets/js/calendrier_date_debut_et_fin.js'];
        $data['vehicules'] = $this->vehicule_model->getVehicules();
        $data['locations'] = $this->location_model->getLocationsByUser($user);
        $data['date_debut'] = $this->input->post('date_debut');
        $data['date_fin'] = $this->input->post('date_fin');
        $data['vehicule_id'] = $this->input->post('vehicule_id');

        $this->load->view('membre/historique_location', $data);
    }

    public function locataires() {
        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }

        $user = UserAcces::getLoggedUser();
        $this->load->model('location_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Locataires du membre';
        $data['title'] = 'Locataires du membre';
        $data['scripts'] = [base_url() . 'assets/js/calendrier_date_debut_et_fin.js'];
        $data['usagers'] = $this->usager_model->getUsers();
        $data['locations'] = $this->location_model->getLocatairesByUser($user);
        $data['date_debut'] = $this->input->post('date_debut');
        $data['date_fin'] = $this->input->post('date_fin');
        $data['locataire_id'] = $this->input->post('locataire_id');
        $this->load->view('membre/historique_locataires', $data); // fichier n'existe pas encore
    }

    public function locationsByVehicule() {

        $user_id = $this->session->userdata('user_id');
        $username = $this->session->userdata('username');

        $data['usagers'] = $this->user_model->get_usagers();
        $data['vehicules'] = $this->vehicule_model->get_vehicules();

        $data['title'] = 'Location par véhicule';

        $data['locations'] = $this->location_model->getLocationsByVehicule($vehicule_id);

        $this->load->view('common/header');
        $this->load->view('locations/vehicule', $data);
        $this->load->view('common/footer');
    }


    /* afficher formulaire de reservation */
    public function form_location($id) {
        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';
        $data['scripts'] = [base_url() . 'assets/js/calendrier_date_debut_et_fin.js'];

        $this->load->model('vehicule_model');
        $this->load->model('modepaiement_model');

        $data['date_debut'] = $this->input->post('date_debut');
        $data['date_fin'] = $this->input->post('date_fin');

        $data['users'] = UserAcces::getLoggedUser();
        $data['voitures'] = $this->vehicule_model->getVehicules($id);
        $data['payements'] = $this->modepaiement_model->getModesPaiements();

        $this->load->view('client/form_location', $data);
//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
    }


    /* inserer Resarvation */
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




    /* afficher formulaire de payement */
    public function form_payement($id) {

        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';

        $this->load->model('vehicule_model');
        $this->load->model('modepaiement_model');

        $data['users'] = UserAcces::getLoggedUser();
        $data['payements'] = $this->modepaiement_model->getModesPaiements();
        //$data['voitures'] = $this->vehicule_model->getVehicules($id);


        $this->load->view('client/form_payemant', $data);
    }


     /* inserer Payemant */
    public function insererPayemant() {
        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Location reçus';

        $data2['user_id'] = $this->input->post('user_id');
        //$data2['location_id'] = $this->input->post('location_id');



        // enregistre le payement
        $this->load->model('location_model');
        $this->location_model->create_payement($data2);

        $this->load->view('client/page_succes_payemant',$data );

    }

}
