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
            redirect('usager/login');
        }

        $this->load->model('arrondissement_model');
        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';
        $data['title'] = 'Ajouter un vehicule';
        $data['body_class'] = 'subpages membre';

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $this->form_validation->set_rules('modele_id', 'Modèle du véhicule', 'required');
        $this->form_validation->set_rules('type_id', 'Type du véhicule', 'required');
        $this->form_validation->set_rules('annee', 'Année', 'required');
        $this->form_validation->set_rules('transmission_id', 'Type de transmission', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('nbre_places', 'Nbre de places', 'required');
        $this->form_validation->set_rules('carburant_id', 'Type de carburant', 'required');
        $this->form_validation->set_rules('prix', 'Prix', 'required');
        $this->form_validation->set_rules('matricule', 'Matricule', 'required');
        $this->form_validation->set_rules('arr_id', 'Arrondissement de placement', 'required');
        $this->form_validation->set_rules('date_debut', 'Date début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date fin', 'required');

        // Données du formulaire
        $form = $this->getFormData();
        $data['types_vehicules'] = $this->vehicule_model->getTypesVehicules();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        //
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModelesByMarqueId($form['marque_id']);
        //
        $data['provinces'] = $this->arrondissement_model->getProvinces();
        $data['villes'] = $this->arrondissement_model->getVillesByProvinceId($form['province_id']);
        $data['arrondissements'] = $this->arrondissement_model->getArrondissementsByVilleId($form['ville_id']);
        //
        $data['form'] = $form;
        $data['action'] = base_url() . 'vehicule/createVehicule#s';
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_modeles_by_marque.js',
            base_url() . 'assets/js/ajax_villes_by_province.js',
            base_url() . 'assets/js/ajax_arrond_by_ville.js',
            base_url() . 'assets/js/calendrier_date_debut_et_fin.js',
        ];

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('membre/form_vehicule', $data);

        } else {

            // Ajouter une photo de profile
            $config['upload_path'] = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, APPPATH . '../assets/images/vehicules');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '8192';
//            $config['max_width'] = '1024';
//            $config['max_height'] = '800';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
                $vehicule_photo = 'noimage.png';
            } else {
                $vehicule_photo = $this->upload->data('file_name');
            }

            // Instance de véhicule en utilisant les données du POST
            $vehicule = new EVehicule([
                'proprietaire' => UserAcces::getLoggedUser(),
                'type' => $this->vehicule_model->getTypeVehiculeById($this->input->post('type_id')),
                'modele' => $this->modele_model->getModeleById($this->input->post('modele_id')),
                'carburant' => $this->vehicule_model->getCarburantById($this->input->post('carburant_id')),
                'transmission' => $this->vehicule_model->getTransmissionById($this->input->post('transmission_id')),
                'arr' => $this->arrondissement_model->getArrondissementById($this->input->post('arr_id')),
                'description' => $this->input->post('description'),
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
            if ($this->vehicule_model->createVehicule($vehicule)) {
                unset($_POST);
                $data['page_title'] = 'Véhicule enregistré';
                $data['msg_title'] = 'Votre véhicule a bien été enregistré';
                $data['msg_subtitle'] = 'Veuillez attendre l\'autorisation d\'un administrateur avant que vous puissiez le mettre en location';
                $data['msg_button_title'] = 'OK';
                $data['msg_action'] = base_url() . 'membre/vehicules#s';
                $this->load->view('common/page_message', $data);

            } else {
                $this->session->set_flashdata('msg_error', 'Une erreur inconnue s\'est produite lors de l\'enregistrement du véhicule');
                $this->load->view('membre/form_vehicule', $data);
            }
        }
    }

    public function deleteVehicule($vehicule_id) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }

        // vérifie la permission pour supprimer le véhicule
        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        if ($vehicule) {
            if (!UserAcces::userIsAdmin() && !UserAcces::getUserId() == $vehicule->getProprietaireId()) {
                redirect('noperm');
            }
            $this->vehicule_model->deleteVehicule($vehicule);
        }
        redirect('vehicules');
    }

    public function editVehicule($vehicule_id) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }

        // Vérifie le droit d'accès pour modifier le véhicule
        // Il faut que l'usager soit son propriétaire ou un administrateur
        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        if ($vehicule) {
            if (!UserAcces::userIsAdmin() && !UserAcces::getUserId() == $vehicule->getProprietaireId()) {
                redirect('noperm');
            }

        } else {
            show_404();
        }

        $this->load->model('arrondissement_model');

        // Données du formulaire
        $form = $this->getFormData($vehicule);

        $data['types_vehicules'] = $this->vehicule_model->getTypesVehicules();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        //
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModelesByMarqueId($form['marque_id']);
        //
        $data['provinces'] = $this->arrondissement_model->getProvinces();
        $data['villes'] = $this->arrondissement_model->getVillesByProvinceId($form['province_id']);
        $data['arrondissements'] = $this->arrondissement_model->getArrondissementsByVilleId($form['ville_id']);
        //
        $data['form'] = $form;
        $data['action'] = base_url() . 'vehicule/updateVehicule#s';
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_modeles_by_marque.js',
            base_url() . 'assets/js/ajax_villes_by_province.js',
            base_url() . 'assets/js/ajax_arrond_by_ville.js',
            base_url() . 'assets/js/calendrier_date_debut_et_fin.js',
            ];

        $data['title'] = 'Mise à jour vehicule';
        $data['page_title'] = 'Édition';
        $data['body_class'] = 'subpages membre';
        $data['base_url'] = base_url();

        $this->load->view('membre/form_vehicule', $data);
    }

    public function updateVehicule() {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }

        // Vérifie le droit d'accès pour modifier le véhicule
        // Il faut que l'usager soit son propriétaire ou un administrateur
        $vehicule_id = $this->input->post('vehicule_id');
        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        if ($vehicule) {
            if (!UserAcces::userIsAdmin() && !UserAcces::getUserId() == $vehicule->getProprietaireId()) {
                redirect('noperm');
            }

        } else {
            show_404();
        }

        $this->load->model('arrondissement_model');

        // Données du formulaire
        $form = $this->getFormData($vehicule);

        $data['types_vehicules'] = $this->vehicule_model->getTypesVehicules();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        //
        $data['marques'] = $this->marque_model->getMarques();
        $data['modeles'] = $this->modele_model->getModelesByMarqueId($form['marque_id']);
        //
        $data['provinces'] = $this->arrondissement_model->getProvinces();
        $data['villes'] = $this->arrondissement_model->getVillesByProvinceId($form['province_id']);
        $data['arrondissements'] = $this->arrondissement_model->getArrondissementsByVilleId($form['ville_id']);
        //
        $data['form'] = $form;
        $data['action'] = base_url() . 'vehicule/updateVehicule#s';
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_modeles_by_marque.js',
            base_url() . 'assets/js/ajax_villes_by_province.js',
            base_url() . 'assets/js/ajax_arrond_by_ville.js',
            base_url() . 'assets/js/calendrier_date_debut_et_fin.js',
            ];

        $data['title'] = 'Mise à jour vehicule';
        $data['page_title'] = 'Édition';
        $data['body_class'] = 'subpages membre';
        $data['base_url'] = base_url();

        // règles de validation
        $this->form_validation->set_rules('modele_id', 'Modèle du véhicule', 'required');
        $this->form_validation->set_rules('type_id', 'Type du véhicule', 'required');
        $this->form_validation->set_rules('annee', 'Année', 'required');
        $this->form_validation->set_rules('transmission_id', 'Type de transmission', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('nbre_places', 'Nbre de places', 'required');
        $this->form_validation->set_rules('carburant_id', 'Type de carburant', 'required');
        $this->form_validation->set_rules('prix', 'Prix', 'required');
        $this->form_validation->set_rules('matricule', 'Matricule', 'required');
        $this->form_validation->set_rules('arr_id', 'Arrondissement de placement', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('membre/form_vehicule', $data);

        } else {

            // Ajouter une photo de profile
            $config['upload_path'] = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, APPPATH . '../assets/images/vehicules');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '8192';
//            $config['max_width'] = '1024';
//            $config['max_height'] = '800';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('photo')) {
                $vehicule->setPhoto($this->upload->data('file_name'));
            }

//            $vehicule->setProprietaire($this->usager_model->getUsagerById($form['proprietaire_id']));
            $vehicule->setModele($this->modele_model->getModeleById($form['modele_id']));
            $vehicule->setType($this->vehicule_model->getTypeVehiculeById($form['type_id']));
            $vehicule->setAnnee($form['annee']);
            $vehicule->setTransmission($this->vehicule_model->getTransmissionById($form['transmission_id']));
            $vehicule->setDescription($form['description']);
            $vehicule->setNbPlaces($form['nbre_places']);
            $vehicule->setCarburant($this->vehicule_model->getCarburantById($form['carburant_id']));
            $vehicule->setPrix($form['prix']);
            $vehicule->setMatricule($form['matricule']);
            $vehicule->setArrond($this->arrondissement_model->getArrondissementById($form['arr_id']));

            // Update effectué avec succès
            if ($this->vehicule_model->updateVehicule($vehicule)) {
                unset($_POST);
                $data['page_title'] = 'Véhicule enregistré';
                $data['msg_title'] = 'Votre véhicule a bien été enregistré';
                $data['msg_button_title'] = 'OK';
                $data['msg_action'] = base_url() . 'membre/vehicules#s';
                $this->load->view('common/page_message', $data);

            } else {
                $this->session->set_flashdata('msg_error', 'Une erreur inconnue s\'est produite lors de l\'enregistrement du véhicule');
                $this->load->view('membre/for_majouter_voiture', $data);
            }
//            redirect('vehicule/view/' . $vehicule->getId());
        }
    }

    /**
     * Fouille le $_POST et retourne toutes les données nécessaires à l'ajout / édition d'un véhicule<br>
     * C'est un raccourci pour ramasser tous les champs du formulaire
     * @return array
     */
    private function getFormData(IVehicule $vehicule = NULL) {
        return [
            'vehicule_id' => $this->input->post('vehicule_id')
                ? $this->input->post('vehicule_id')
                : ($vehicule ? $vehicule->getId() : '0'),

            'transmission_id' => $this->input->post('transmission_id')
                ? $this->input->post('transmission_id')
                : ($vehicule ? $vehicule->getTransmissionId() : '0'),

            'modele_id' => $this->input->post('modele_id')
                ? $this->input->post('modele_id')
                : ($vehicule ? $vehicule->getModeleId() : '0'),

            'type_id' => $this->input->post('type_id')
                ? $this->input->post('type_id')
                : ($vehicule ? $vehicule->getTypeId() : '0'),

            'annee' => $this->input->post('annee')
                ? $this->input->post('annee')
                : ($vehicule ? $vehicule->getAnnee() : ''),

            'nbre_places' => $this->input->post('nbre_places')
                ? $this->input->post('nbre_places')
                : ($vehicule ? $vehicule->getNbPlaces() : ''),

            'carburant_id' => $this->input->post('carburant_id')
                ? $this->input->post('carburant_id')
                : ($vehicule ? $vehicule->getCarburantId() : '0'),

            'prix' => $this->input->post('prix')
                ? $this->input->post('prix')
                : ($vehicule ? $vehicule->getPrix() : ''),

            'matricule' => $this->input->post('matricule')
                ? $this->input->post('matricule')
                : ($vehicule ? $vehicule->getMatricule() : ''),

            'description' => $this->input->post('description')
                ? $this->input->post('description')
                : ($vehicule ? $vehicule->getDescription() : ''),

            'arr_id' => $this->input->post('arr_id')
                ? $this->input->post('arr_id')
                : ($vehicule ? $vehicule->getArrondId() : ''),

            'date_debut' => $this->input->post('date_debut')
                ? $this->input->post('date_debut')
                : '',

            'date_fin' => $this->input->post('date_fin')
                ? $this->input->post('date_fin')
                : '',

            // champs auxiliaires, juste pour le filtrage d'autres selects
            'marque_id' => $this->input->post('marque_id')
                ? $this->input->post('marque_id')
                : ($vehicule ? $vehicule->getMarqueId() : '0'),

            'province_id' => $this->input->post('province_id')
                ? $this->input->post('province_id')
                : ($vehicule ? $vehicule->getArrond()->getVille()->getProvinceId() : '0'),

            'ville_id' => $this->input->post('ville_id')
                ? $this->input->post('ville_id')
                : ($vehicule ? $vehicule->getArrond()->getVilleId() : '0')
        ];

    }

    public function vehiculeByUser() {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
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
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_modeles_by_marque.js',
            base_url() . 'assets/js/calendrier_date_debut_et_fin.js'
        ];

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
        $this->load->view('vehicules/recherche', $data);
    }

    public function debloquer($vehicule_id) {
         $this->vehicule_model->debloquerVehicule($vehicule_id);
         redirect('admin/listeVehicules');
    }

    public function bloquer($vehicule_id) {
         $this->vehicule_model->bloquerVehicule($vehicule_id);
         redirect('admin/listeVehicules');
    }
}
