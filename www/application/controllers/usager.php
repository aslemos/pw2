<?php

class Usager extends CI_Controller {

    // Connexion
    public function login() {
        $data['page_title'] = 'Se connecter';
        $data['title'] = 'Se connecter';
        $data['body_class'] = 'subpages login';

        $data['base_url'] = base_url();
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            //echo 'Connexion échouée';die();
            $this->load->view('usagers/login', $data);

        } else {

            // Chercher le nom utilisateur
            $username = $this->input->post('username');
            // Chercher et encrypter le mot de passe
            $password = md5($this->input->post('password'));

            // Connecter l'usager
            $user = $this->usager_model->getUserByLogin($username, $password);

            if ($user) {

                // Stocker l'usager dans la session
                $this->session->set_userdata(['user_data' => $user]);

                // Message de confirmation de la connexion
                $this->session->set_flashdata('msg_success', $user->toString() .'  est Connecté');

                redirect('accueil');

            } else {

                // Set message
                $this->session->set_flashdata('msg_error', 'Login ou mot de passe invalide');

                redirect('usager/login');
            }
        }
    }

    // Déconnexion
    public function logout() {
     // Unset user data
        unset($_SESSION['user_data']);
        redirect('accueil');
    }



    // Enregister un usager
    public function inscription() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Devenir Membre';
        $data['body_class'] = 'subpages devenir-membre';
        $data['base_url'] = base_url();
        // Action
        $data['action'] = base_url() . 'usager/inscription#s';
         // Charger les Provinces et les arrondissements
        $data['provinces'] = $this->arrondissement_model->getProvinces();
        $data['villes'] = $this->arrondissement_model->getVillesByProvinceId($this->input->post('province_id'));
        $data['arrondissements'] = $this->arrondissement_model->getArrondissementsByVilleId($this->input->post('ville_id'));
        // Call Script
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_villes_by_province.js',
            base_url() . 'assets/js/ajax_arrond_by_ville.js',
            base_url() . 'assets/js/devenir_membre_js.js'
        ];

        $data['roles'] = $this->usager_model->getRoles();
        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        // Validation Formulaire coté back end
        $this->form_validation->set_rules('lastName', 'Prenom', 'required');
        $this->form_validation->set_rules('firstName', 'Nom', 'required');
        $this->form_validation->set_rules('gender2', 'Sexe', 'required');
        $this->form_validation->set_rules('inputConduire', 'Permis de conduire', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Telephone', 'required');
        $this->form_validation->set_rules('inputEmail', 'Email', 'required|callback_checkEmailExists');
        $this->form_validation->set_rules('username', 'Username','required|trim|is_unique[usagers.username]');

        $this->form_validation->set_rules('inputPassword', 'Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'matches[inputPassword]');
        $this->form_validation->set_rules('inputAddress', 'Adresse', 'required');
        //$this->form_validation->set_rules('inputVille', 'Ville', 'required');
        $this->form_validation->set_rules('codePostal', 'Code Postal', 'required');



        if ($this->form_validation->run() === FALSE) {
            $this->load->view('membre/devenir-membre', $data);

        } else {

             //Ajouter une photo de profile
            $config['upload_path'] = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, APPPATH . '../assets/images/usagers');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $user_photo = 'noimage.png';
            } else {
                $user_photo = $this->upload->data('file_name');
            }
            // Encrypter le mot de passe
            $enc_password = md5($this->input->post('inputPassword'));

            // Sauvegarder à la base de donnée
            $this->usager_model->registerUser($enc_password, $user_photo);

            // Message de confirmation d'enregistrement
            $this->session->set_flashdata('msg_success', 'Enregistrement terminé');

            redirect('usager/login#s');
        }
    }

    public function view($user_id = NULL) {

        // Check login
        if (!UserAcces::userIsAdmin()) {
            redirect('noperm');
        }

        $data['user'] = $this->usager_model->getUsers($user_id);

        if (empty($data['user'])) {
            show_404();
        }

        $data['page_title'] = 'Détails de lusager ' . $data['user']['prenom'] . ' ' . $data['user']['nom'];
        $data['base_url'] = base_url();
        $data['prenom'] = $data['user']['prenom'];
        $data['nom'] = $data['user']['nom'];

        $this->load->view('usagers/view', $data);
    }

    // verifier si l'usager existe
    private function checkUsernameExists($username) {

        $this->form_validation->set_message('check_username_exists', 'Ce nom utilisateur existe!<br />Choisir un autre ou connectez-vous');

        if ($this->usager_model->checkUsernameExists($username)) {

            return true;
        } else {

            return false;
        }
    }

    // Check if email exists
    public function checkEmailExists($email) {

        $this->form_validation->set_message('check_email_exists', 'Ce courriel exist déjà!<br />Choisir un autre ou connectez-vous');

        if ($this->usager_model->checkEmailExists($email)) {

            return true;
        } else {

            return false;
        }
    }

    // Supprimer un usager
    public function deleteUser($user_id) {

        // Check login
        if (!UserAcces::userIsAdmin()) {
            redirect('noperm');
        }

        $this->usager_model->delete_user($user_id);

        redirect('usagers');
    }

    public function editUser($user_id) {

        // Check login
        if (!UserAcces::userIsAdmin() && !UserAcces::getUserId() == $user_id) {
            redirect('noperm');
        }

        // Charger les données de cette personne
        $user = $this->usager_model->getUsers($user_id);
        if (empty($user)) {
            show_404();
        }

        // Trouver l'ID de la province
        $arrond = $this->arrondissement_model->getArrondissementById($user['arr_id']);
        $user['province_id'] = $arrond->getVille()->getProvinceId();


        $data['user'] = $user;

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $data['roles'] = $this->usager_model->getRoles();

        $this->load->model('arrondissement_model');
        $data['page_title'] = 'Mise à jour usager';
        $data['title'] = 'Mise à jour usager';
        $data['body_class'] = 'subpages devenir-membre';
        $data['base_url'] = base_url();
        // Action
        $data['action'] = base_url() . 'usager/updateUser/'. UserAcces::getLoggedUser()->getId().'#s';
         // Charger les Provinces et les arrondissements
        $data['provinces'] = $this->arrondissement_model->getProvinces();
        $data['villes'] = $this->arrondissement_model->getVillesByProvinceId($user['province_id']);
        $data['arrondissements'] = $this->arrondissement_model->getArrondissementsByVilleId($user['ville_id']);
        // Call Script
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_villes_by_province.js',
            base_url() . 'assets/js/ajax_arrond_by_ville.js',
        ];


        $this->load->view('usagers/edit', $data);
    }

    public function updateUser($user_id) {

        // Check permission
        if (!UserAcces::userIsAdmin() && !UserAcces::getUserId() == $this->input->post('user_id')) {
            redirect('noperm');
        }


        // Ne met à jour que si l'usager est superadmin
        if (UserAcces::userIsSuperAdmin() && $this->input->post('role_id')) {
            $data['role_id'] = $this->input->post('role_id');
        }

        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Mise à jour usager';
        $data['body_class'] = 'subpages devenir-membre';
        $data['base_url'] = base_url();
        // Action
        $data['action'] = base_url() . 'usager/updateUser/'. UserAcces::getLoggedUser()->getId().'#s';
         // Charger les Provinces et les arrondissements
        $data['provinces'] = $this->arrondissement_model->getProvinces();
        $data['villes'] = $this->arrondissement_model->getVillesByProvinceId($this->input->post('province_id'));
        $data['arrondissements'] = $this->arrondissement_model->getArrondissementsByVilleId($this->input->post('ville_id'));
        // Call Script
        $data['scripts'] = [
            base_url() . 'assets/js/ajax_villes_by_province.js',
            base_url() . 'assets/js/ajax_arrond_by_ville.js'
        ];

        $data['roles'] = $this->usager_model->getRoles();

        //$data['user'] = $this->usager_model->getUsers($user_id);
        $data['user'] = array(
                'prenom' => $this->input->post('firstName'),
                'nom' => $this->input->post('lastName'),
                'DateNaissance' => $this->input->post('dateNaissance'),
                'sexe' => $this->input->post('gender2'),
                'permis_conduire' => $this->input->post('inputConduire'),
                'telephone' => $this->input->post('phoneNumber'),
                'courriel' => $this->input->post('inputEmail'),
                'username' => $this->input->post('username'),
                'adresse' => $this->input->post('inputAddress'),
                'adresse2' => $this->input->post('inputAddress2'),
                'province_id' => $this->input->post('province_id'),
                'ville_id' => $this->input->post('ville_id'),
                'arr_id' => $this->input->post('arr_id'),
                'code_postal' => $this->input->post('codePostal'),
                'user_id' => $this->input->post('user_id')
            );

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        // Validation Formulaire coté back end
        $this->form_validation->set_rules('lastName', 'Prenom', 'required');
        $this->form_validation->set_rules('firstName', 'Nom', 'required');
        $this->form_validation->set_rules('gender2', 'Sexe', 'required');
        $this->form_validation->set_rules('inputConduire', 'Permis de conduire', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Telephone', 'required');
//        $this->form_validation->set_rules('inputEmail', 'Email', 'required|callback_checkEmailExists');
//        $this->form_validation->set_rules('username', 'Username','required|trim|is_unique[usagers.username]');

//        $this->form_validation->set_rules('inputPassword', 'Password', 'required');
        if ($this->input->post('inputPassword')) {
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'matches[inputPassword]');
        }
        $this->form_validation->set_rules('inputAddress', 'Adresse', 'required');
        //$this->form_validation->set_rules('inputVille', 'Ville', 'required');
        $this->form_validation->set_rules('codePostal', 'Code Postal', 'required');



        if ($this->form_validation->run() === FALSE) {
            $this->load->view('usagers/edit', $data);

        } else {

             //Ajouter une photo de profile
            $config['upload_path'] = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, APPPATH . '../assets/images/usagers');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';

            $data = array(
                'prenom' => $this->input->post('firstName'),
                'nom' => $this->input->post('lastName'),
                'dateNaissance' => $this->input->post('dateNaissance'),
                'sexe' => $this->input->post('gender2'),
                'permis_conduire' => $this->input->post('inputConduire'),
                'telephone' => $this->input->post('phoneNumber'),
                'courriel' => $this->input->post('inputEmail'),
                'username' => $this->input->post('username'),
                'adresse' => $this->input->post('inputAddress'),
                'adresse2' => $this->input->post('inputAddress2'),
                'ville_id' => $this->input->post('ville_id'),
                'arr_id' => $this->input->post('arr_id'),
                'code_postal' => $this->input->post('codePostal'),
                'user_id' => $this->input->post('user_id')
            );

            // Trouve la photo téléversée, le cas échéant
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('photo')) {
                $data['user_photo'] = $this->upload->data('file_name');
            }

            // Encrypter le mot de passe
            if ($this->input->post('inputPassword')) {
                $data['motdepasse'] = md5($this->input->post('inputPassword'));
            }

            // Sauvegarder à la base de donnée
           // $this->usager_model->registerUser($enc_password, $user_photo);
            if ($this->usager_model->updateUserMod($data)) {

                // Message de confirmation d'enregistrement
                $this->session->set_flashdata('msg_success', 'Enregistrement des modifications est terminé');

            } else {
                // Une erreur d'est produite
                $this->session->set_flashdata('msg_error', 'Problème dans l\'enregistrement de l\'usager');

            }

            //redirect('usager/login#s');
            redirect('membre/vehicules#s');
        }



    }
}
