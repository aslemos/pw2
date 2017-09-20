<?php

class Usager extends CI_Controller {

//    public function index() {
//
//        // Check login
//        if (!UserAcces::userIsLogged()) {
//            redirect('usager/login');
//        }
//        if (!UserAcces::userIsAdmin()) {
//            redirect('noperm'); // TODO: utiliser une page d'erreur personnalisée
//        }
//
//        $data['title'] = 'Liste des usagers';
//        $data['body_class'] = '';
//        $data['base_url'] = base_url();
//
//        $data['usagers'] = $this->usager_model->getUsers();
//
//        $this->load->view('usagers/index', $data);
//
//    }

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
        
//     var_dump(UserAcces::getLoggedUser()->getPrenom());
//       var_dump($_SESSION['user_data']->getPrenom());
//       //var_dump(EUsager::getPrenom());
//       die();
        // Unset user data
        unset($_SESSION['user_data']);

        // Set message
//        $this->session->set_flashdata('user_loggedout', 'Vous Êtes Déconnecté');

        redirect('accueil');
    }

//    public function register() {
//        $data['meta_keywords'] = '';
//        $data['meta_description'] = '';
//        $data['page_title'] = 'Devenir Membre';
//        $data['body_class'] = 'subpages devenir-membre';
//        $data['base_url'] = base_url();
//        $this->load->view('membre/devenir-membre.php', $data);
//    }

    // Enregister un usager
    public function inscription() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Devenir Membre';
        $data['body_class'] = 'subpages devenir-membre';
        $data['base_url'] = base_url();
        $data['scripts'] = [ base_url().'assets/js/devenir_membre_js.js' ];

        $data['roles'] = $this->usager_model->getRoles();
        $data['err_message'] = '* Tous Les Champs Sont Requis!';
//
//        $this->form_validation->set_rules('lastName', 'Prenom', 'required');
//        $this->form_validation->set_rules('firstName', 'Nom', 'required');
//        $this->form_validation->set_rules('gender2', 'Sexe', 'required');
//        $this->form_validation->set_rules('inputConduire', 'Permis de conduire', 'required');
//        $this->form_validation->set_rules('phoneNumber', 'Telephone', 'required');
//        $this->form_validation->set_rules('inputEmail', 'Email', 'required|callback_checkEmailExists');
//        $this->form_validation->set_rules('inputPassword', 'Password', 'required');
//        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'matches[password]');
//        $this->form_validation->set_rules('inputAddress', 'Adresse', 'required');
//        $this->form_validation->set_rules('inputVille', 'Ville', 'required');
//        $this->form_validation->set_rules('CodePostal', 'Code Postal', 'required');
       
        

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('membre/devenir-membre', $data);

        } else {

            // Ajouter une photo de profile
//            $config['upload_path'] = './assets/images/usagers';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = '2048';
//            $config['max_width'] = '2000';
//            $config['max_height'] = '2000';
//
//            $this->load->library('upload', $config);
//
//            if (!$this->upload->do_upload()) {
//                $errors = array('error' => $this->upload->display_errors());
//                $user_photo = 'noimage.png';
//            } else {
//                $data = array(
//                    'upload_data' => $this->upload->data(),
//                );
//                $user_photo = $_FILES['userfile']['name'];
//
//                // Encrypter le mot de passe
//                $enc_password = md5($this->input->post('password'));
//            }

//            $this->usager_model->register($enc_password, $user_photo);

            // Message de confirmation d'enregistrement
            $this->session->set_flashdata('msg_success', 'Enregistrement terminé');

            redirect('<?=$base_url?>usager/login#s');
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

        $this->load->view('usagers/usager', $data);
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
        if (!UserAcces::userIsAdmin() && !UserAcces::getLoggedUser()->getId() == $user_id) {
            redirect('noperm');
        }

        $data['user'] = $this->usager_model->getUsers($user_id);

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $data['roles'] = $this->usager_model->getRoles();

        if (empty($data['user'])) {

            show_404();
        }

        $this->load->model('arrondissement_model');
        $data['page_title'] = 'Mise à jour usager';
        $data['title'] = 'Mise à jour usager';
        $data['body_class'] = 'subpages devenir-membre';
        $data['base_url'] = base_url();
        $data['villes'] = $this->arrondissement_model->getVilles();

        $this->load->view('usagers/edit', $data);
    }

    public function updateUser() {

        // Check permission
        if (!UserAcces::userIsAdmin()) {
            redirect('noperm');
        }

        $data = array(
            'user_id' => $this->input->post('user_id'),
            'prenom' => $this->input->post('prenom'),
            'nom' => $this->input->post('nom'),
            'permis_conduire' => $this->input->post('permis_conduire'),
            'adresse' => $this->input->post('adresse'),
            'ville_id' => $this->input->post('ville_id'),
            'code_postal' => $this->input->post('code_postal'),
            'telephone' => $this->input->post('telephone'),
            'courriel' => $this->input->post('courriel'),
            'motdepasse' => $this->input->post('password')
        );

        // Ne met à jour que si l'usager est superadmin
        if (UserAcces::userIsSuperAdmin() && $this->input->post('role_id')) {
            $data['role_id'] = $this->input->post('role_id');
        }

        $this->usager_model->updateUser($data);

        redirect('usager');
    }
}
