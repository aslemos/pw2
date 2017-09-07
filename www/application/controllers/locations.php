<?php

/* 
 * 
 * 
 * 
 */

    class Locations extends CI_Controller {

        public function index() {
            
            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            
            $data['title'] = 'Historique des locations';

            $data['vehicules'] = $this->vehicule_model->getVehicules();

            $this->load->view('common/header');
            $this->load->view('locations/index', $data);
            $this->load->view('common/footer');
        }

        public function view($location_id = NULL){
            
            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            
            $data['location'] = $this->location_model->getLocations($location_id);		

            if(empty($data['location'])) {
                    show_404();
            }

            $data['location_id'] = $data['location']['location_id'];

            $this->load->view('common/header');
            $this->load->view('locations/location', $data);
            $this->load->view('common/footer');
        }
	
        public function createLocation (){

            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            $data['title'] = 'Ajouter une location';

            $data['usagers']    = $this->user_model->getUsers();
            $data['vehicules']  = $this->vehicule_model->getVehicules();

            $data['err_message'] = '* Tous Les Champs Sont Requis!';

            $this->form_validation->set_rules('date_debut', 'Date début', 'required');	
            $this->form_validation->set_rules('date_fin', 'Date fin', 'required');

            if($this->form_validation->run() === FALSE ) {

                $this->load->view('common/header');
                $this->load->view('locations/create', $data);
                $this->load->view('common/footer');			
            } else {

                $this->location_model->createLocation();
                redirect('locations');
            }
        }
	
        public function deleteLocation($location_id){

            // Check login       
            if(!$this->session->userdata('logged_in')){
                redirect('usagers/login');
            }
            $this->location_model->deleteLocation($location_id);
            redirect('locations');

        }
        
        public function editLocation(){
            
            // Check login       
            if(!$this->session->userdata('logged_in')){
                redirect('usagers/login');
            }
            
            //$data['location'] = $this->location_model->getLocations($location_id);		

            $data['usagers']    = $this->user_model->getUsers();
            $data['vehicules']  = $this->vehicule_model->getVehicules();

            //if(empty($data['location'])) {
            //        show_404();
            //}

        $data['title'] = 'Approuver une location';

        $this->load->view('common/header');
        $this->load->view('locations/edit', $data);
        $this->load->view('common/footer');
        }

        public function updateLocation(){
            
            // Check login       
            if(!$this->session->userdata('logged_in')){
                redirect('usagers/login');
            }

            $this->location_model->updateLocation();
            
            redirect('locations');
        }
        
        public function locationsByUser(){

            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            
            $user_id = $this->session->userdata('user_id');
            $username = $this->session->userdata('username');

            $data['usagers']    = $this->user_model->getUsers();
            $data['vehicules']  = $this->vehicule_model->getVehicules();
            $data['paiements']  = $this->paiement_model->getPaiements();

            $data['title'] = 'Location par membre ';

            $data['locations'] = $this->location_model->getLocationsByUser($user_id);

            $this->load->view('common/header');
            $this->load->view('locations/user', $data);
            $this->load->view('common/footer');
        }

        public function locationsByVehicule(){

            $user_id = $this->session->userdata('user_id');
            $username = $this->session->userdata('username');

            $data['usagers']    = $this->user_model->get_usagers();
            $data['vehicules']  = $this->vehicule_model->get_vehicules();

            $data['title'] = 'Location par véhicule';

            $data['locations'] = $this->location_model->getLocationsByVehicule($vehicule_id);

            $this->load->view('common/header');
            $this->load->view('locations/vehicule', $data);
            $this->load->view('common/footer');
        }
    }