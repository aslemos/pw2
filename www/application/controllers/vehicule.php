<?php
/*
 *
 *
 *
 */

class Vehicule extends CI_Controller {

    /**
     * Affiche la liste complète des véhicules
     */
    public function index() {

        if (!UserAcces::userIsAdmin()) {
           redirect('noperm');
        }

        $data['title'] = 'Liste des vehicules';
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Voitures';
        $data['body_class'] = 'subpages voitures';
        $data['base_url'] = base_url();
        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $this->load->view('vehicules/index', $data);
//        $this->load->view('client/voitures', $data); // majid
    }

    public function view($vehicule_id = NULL) {

        $data['vehicule'] = $this->vehicule_model->getVehiculeById($vehicule_id);
        $data['page_title'] = 'Détails du ' . $data['vehicule']->getMarque()->getNom() . ' ' . $data['vehicule']->getModele()->getNom();
        $data['body_class'] = '';
        $data['base_url'] = base_url();

        $this->load->view('vehicules/view', $data);
    }

    public function createVehicule() {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }

        $this->load->model('arrondissement_model');
        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';

        $data['title'] = 'Ajouter un vehicule';

        $data['usagers'] = $this->usager_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getTypesVehicules();
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->arrondissement_model->getArrondissements();

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $this->form_validation->set_rules('matricule', 'Matricule', 'required');
        $this->form_validation->set_rules('annee', 'Année', 'required');
        $this->form_validation->set_rules('nbre_places', 'Nbre de places', 'required');
        $this->form_validation->set_rules('prix', 'Prix', 'required');
        $this->form_validation->set_rules('date_debut', 'Date début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date fin', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('membre/form_ajouter_voiture', $data);
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

            $data = '';

            // Instance de véhicule en utilisant les données du POST
            $vehicule = new EVehicule([
                'proprietaire' => UserAcces::getLoggedUser(),
                'type' => $this->typesvehicule_model->getTypeVehiculeById($this->input->post('type_id')),
                'marque' => $this->marque_model->getMarqueById($this->input->post('marque_id')),
                'modele' => $this->modele_model->getModeleById($this->input->post('modele_id')),
                'carburant' => $this->carburant_model->getCarburantById($this->input->post('carburant_id')),
                'transmission' => $this->transmission_model->getTransmissionById($this->input->post('transmission_id')),
                'arr' => $this->arrondissement_model->getArrondissementById($this->input->post('arr_id')),

//                'proprietaire_id' => $this->session->userdata('user_id'),
//                'type_id' => $this->input->post('type_id'),
//                'marque_id' => $this->input->post('marque_id'),
//                'modele_id' => $this->input->post('modele_id'),
//                'carburant_id' => $this->input->post('carburant_id'),
//                'transmission_id' => $this->input->post('transmission_id'),
//                'arr_id' => $this->input->post('arr_id'),

                'matricule' => $this->input->post('matricule'),
                'annee' => $this->input->post('annee'),
                'nbre_places' => $this->input->post('nbre_places'),
                'prix' => $this->input->post('prix'),
                'vehicule_photo' => $vehicule_photo
            ]);

            // Ajout d'une instance de disponibilité du véhicule
            //  en utilisant les dates de début/fin du POST
            $vehicule->addDisponibilite(
                    new EDisponibilite([
                        'date_debut' => $this->input->post('date_debut'),
                        'date_fin' => $this->input->post('date_fin'),
                    ])
            );

            // Insertion du véhicule avec sa première date de disponibilisation
            $this->vehicule_model->createVehicule($vehicule);
            redirect('vehicules');
        }
    }

    public function deleteVehicule($vehicule_id) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }
        $this->vehicule_model->deleteVehicule($vehicule_id);
        redirect('vehicules');
    }

    public function editVehicule($vehicule_id) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }
        $this->load->model('arrondissement_model');

        $data['vehicule'] = $this->vehicule_model->getVehicules($vehicule_id);

//        $data['vehicule']['proprietaire_id']

        $data['usagers'] = $this->usager_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getTypesVehicules();
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->arrondissement_model->getArrondissements();

        if (empty($data['vehicule'])) {
            show_404();
        }

        $data['title'] = 'Mise à jour vehicule';
        $data['page_title'] = 'Édition';
        $data['base_url'] = base_url();

        $this->load->view('vehicules/edit', $data);
    }

    public function updateVehicule() {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }

        // Ajouter une photo de profile
        $config['upload_path'] = './assets/images/vehicules';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '8192';
        $config['max_width'] = '1024';
        $config['max_height'] = '800';

        $this->load->library('upload', $config);

        $vehicule = $this->vehicule_model->getVehiculeById($this->input->post('vehicule_id'));
        if (!$this->upload->do_upload()) {
            $errors = array('error' => $this->upload->display_errors());

        } else {
//            $data = array('upload_data' => $this->upload->data());
            $vehicule->setPhoto($_FILES['userfile']['name']);
        }


//        $vehicule->setCarburant($this->vehicule_model->getCarburantById($this->input->post('carburant_id')));
//        $vehicule->setModele($this->modele_model->getCarburantById($this->input->post('model_id')));

        $this->vehicule_model->updateVehicule($vehicule);
        redirect('vehicule/view/'.$vehicule->getId());
    }

    public function vehiculeByUser() {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usagers/login');
        }
        $this->load->model('arrondissement_model');

        $user_id = $this->session->userdata('user_id');
        $username = $this->session->userdata('username');

        $data['usagers'] = $this->usager_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getTypesVehicules();
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->arrondissement_model->getArrondissements();

        $data['title'] = $username . ' :  Ajouter une location';

        $data['vehicules'] = $this->vehicule_model->getVehiculesByUser(UserAcces::getLoggedUser());
//        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $this->load->view('membre/liste_voitures', $data);
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
        $data['scripts'] = [base_url() . 'assets/js/ajax_modeles_by_marque.js'];
        $data['scripts'] = [base_url() . 'assets/js/calendrier_date_debut_et_fin.js'];


        // Récupère les données de recherche de la page et les réinsère dans le formulaire
        //  lors de la prochaine sousmission

        $recherche = new ERecherche($this->input->post());
        $this->load->model('arrondissement_model');

        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModelesByMarqueId($recherche->getMarqueId());
        $data['types'] = $this->vehicule_model->getTypesVehicules();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->arrondissement_model->getArrondissements();
        $data['recherche'] = $recherche;

        // TODO: créer table de tranches de prix et récupérer ce tableau par l'intermède de son modèle
        $data['tranches'] = [
            ['tranche' => '0-50'   , 'nom_tranche' => 'Jusqu\'à 50$'],
            ['tranche' => '50-100' , 'nom_tranche' => 'De 50$ à 100$'],
            ['tranche' => '100-150', 'nom_tranche' => 'De 100$ à 150$'],
            ['tranche' => '150-999', 'nom_tranche' => 'Plus de 150$']
        ];

        $data['resultat'] = $this->vehicule_model->rechercherVehicules($recherche);
        //$data['resultat'] = $this->vehicule_model->getVehicules();
        $this->load->view('vehicules/recherche', $data);
    }

    public function debloquer($vehicule_id) {
         $this->vehicule_model->getVehicules();
    }

    public function bloquer($vehicule_id) {
         $this->vehicule_model->getVehicules();
    }
}
