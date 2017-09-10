<?php
/*
 *
 *
 *
 */

class Vehicule extends CI_Controller {

    public function index() {

        $data['title'] = 'Liste des vehicules';
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Voitures';
        $data['body_class'] = 'subpages voitures';
        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $this->load->view('vehicules/index', $data);
        $this->load->view('client/voitures', $data); // majid
    }


    public function view($vehicule_id = NULL) {

        $data['page_title'] = $data['vehicule']['nom_marque'] . ' ' . $data['vehicule']['nom_modele'];
        $data['body_class'] = '';
        $data['vehicule'] = $this->vehicule_model->getVehicules($vehicule_id);

        if (empty($data['vehicule'])) {
            show_404();
        }

//        $data['vehicule_id'] = $data['vehicule']['vehicule_id'];

        $this->load->view('common/header', $data);
        $this->load->view('vehicules/vehicule', $data);
        $this->load->view('common/footer');
    }

    public function createVehicule() {

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usagers/login');
        }

        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';

        $data['title'] = 'Ajouter un vehicule';

        $data['usagers'] = $this->usager_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getTypeVehicules();
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->vehicule_model->getArrondissements();

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $this->form_validation->set_rules('matricule', 'Matricule', 'required');
        $this->form_validation->set_rules('annee', 'Année', 'required');
        $this->form_validation->set_rules('nbre_places', 'Nbre de places', 'required');
        $this->form_validation->set_rules('prix', 'Prix', 'required');
        $this->form_validation->set_rules('date_debut', 'Date début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date fin', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('common/header');
            $this->load->view('vehicules/create', $data);
            $this->load->view('common/footer');
        } else {
            // Ajouter une photo de profile
            $config['upload_path'] = './assets/images/vehicules';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $vehicule_photo = 'noimage.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $vehicule_photo = $_FILES['userfile']['name'];
            }

            $this->vehicule_model->createVehicule($vehicule_photo);

            redirect('membre/view/liste_voitures');
        }
    }

    public function deleteVehicule($vehicule_id) {

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usagers/login');
        }
        $this->vehicule_model->deleteVehicule($vehicule_id);
        redirect('vehicules');
    }

    public function editVehicule($vehicule_id) {

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usagers/login');
        }
        $data['vehicule'] = $this->vehicule_model->getVehicules($vehicule_id);

        $data['usagers'] = $this->usager_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getTypeVehicules();
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->vehicule_model->getArrondissements();

        if (empty($data['vehicule'])) {
            show_404();
        }

        $data['title'] = 'Mise à jour vehicule';

        $this->load->view('common/header');
        $this->load->view('vehicules/edit', $data);
        $this->load->view('common/footer');
    }

    public function updateVehicule() {

        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usagers/login');
        }

        // Ajouter une photo de profile
        $config['upload_path'] = './assets/images/vehicules';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '8192';
        $config['max_width'] = '1024';
        $config['max_height'] = '800';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $errors = array('error' => $this->upload->display_errors());
            $vehicule_photo = 'noimage.png';
        } else {
            $data = array('upload_data' => $this->upload->data());
            $vehicule_photo = $_FILES['userfile']['name'];
        }

        $this->vehicule_model->updateVehicule($vehicule_photo);
        redirect('vehicules');
    }

    public function vehiculeByUser() {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $user_id = $this->session->userdata('user_id');
        $username = $this->session->userdata('username');

        $data['usagers'] = $this->usager_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getTypeVehicules();
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->vehicule_model->getArrondissements();

        $data['title'] = $username . ' :  Ajouter une location';

        $data['vehicules'] = $this->vehicule_model->getVehiculesByUser($user_id);
        //$data['vehicules'] = $this->vehicule_model->get_vehicules();

        $this->load->view('common/header');
        $this->load->view('vehicules/user', $data);
        //$this->load->view('vehicules/index', $data);
        $this->load->view('common/footer');
    }


    public function get_cars() {

        //$data['title'] = 'Liste des membres';

        $this->load->model('voiture2');
        $data['voitures'] = $this->voiture2->getVoitures();

        $this->load->view('client/liste_voitures', $data);
    }

    public function insert_payement() {

        $this->load->model('voiture2');

        $data = array(
            'date_debut' => $this->input->post('date_debut'),
            'date_fin' => $this->input->post('date_fin'),
            'user_id' => $this->input->post('user_id'),
            'vehicule_id' => $this->input->post('vehicule_id'),
            'mode_id' => $this->input->post('mode_id')
        );

//Transfering data to Model
        $this->voiture2->form_insert($data);


//Loading View
        $data['message'] = 'Data Inserted Successfully';
        //$this->load->view('insert_view', $data);
        $this->load->view('client/form_location', $data);
    }

    public function recherche() {

        $data['page_title'] = 'Voitures';
        $data['body_class'] = 'subpages voitures';
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['base_url'] = base_url();

//        $this->load->model('vehicule_model');
//        $data['resultat'] = $this->vehicule_model->getVehicules(Recherche::getRecherche());
        $this->load->view('vehicules/vehicule', $data);
    }


}
