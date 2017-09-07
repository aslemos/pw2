<?php
/*
 *
 *
 */

class Usagers extends CI_Controller {

    public function index() {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $data['title'] = 'Liste des usagers';

        $data['usagers'] = $this->usager_model->getUsers();

        $this->load->view('common/header');
        $this->load->view('usagers/index', $data);
        $this->load->view('common/footer');
    }

    public function view($user_id = NULL) {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $data['user'] = $this->usager_model->getUsers($user_id);

        if (empty($data['user'])) {
            show_404();
        }

        $data['prenom'] = $data['user']['prenom'];
        $data['nom'] = $data['user']['nom'];

        $this->load->view('common/header');
        $this->load->view('usagers/usager', $data);
        $this->load->view('common/footer');
    }

    // Enregister un usager
    public function registerUser() {

        $data['title'] = "S'ENREGISTRER";

        $data['roles'] = $this->usager_model->getRoles();

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('permis_conduire', 'Permis de conduire', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('ville', 'Ville', 'required');
        $this->form_validation->set_rules('code_postal', 'Code Postal', 'required');
        $this->form_validation->set_rules('phone', 'Telephone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('common/header');
            $this->load->view('usagers/register', $data);
            $this->load->view('common/footer');
        } else {

            // Ajouter une photo de profile
            $config['upload_path'] = './assets/images/usagers';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $user_photo = 'noimage.png';
            } else {
                $data = array(
                    'upload_data' => $this->upload->data(),
                );
                $user_photo = $_FILES['userfile']['name'];

                // Encrypter le mot de passe
                $enc_password = md5($this->input->post('password'));
            }
            //print_r($_FILES);die();

            $this->usager_model->register($enc_password, $user_photo);

            // Message de confirmation d'enregistrement
            $this->session->set_flashdata('user_registered', 'Enregistrement terminé');

            redirect('usagers');
        }
    }

    // Connexion
    public function login() {

        $data['title'] = 'Se connecter';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            //echo 'Connexion échouée';die();
            $this->load->view('common/header');
            $this->load->view('usagers/login', $data);
            $this->load->view('common/footer');
        } else {

            // Chercher le nom utilisateur
            $username = $this->input->post('username');
            // Chercher et encrypter le mot de passe
            $password = md5($this->input->post('password'));

            // Connecter l'usager
            $user_id = $this->usager_model->login($username, $password);

            if ($user_id) {

                // Créer la session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Message de confirmation de la connexion
                $this->session->set_flashdata('user_loggedin', 'Vous Ête Connecté');

                redirect('home/vehicule');
            } else {

                // Set message
                $this->session->set_flashdata('login_failed', 'Login invalide');

                redirect('usagers/login');
            }
        }
    }

    // Déconnexion
    public function logout() {

        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Vous Ête Déconnecté');

        redirect('usagers/login');
    }

    // verifier si l'usager existe
    public function checkUsernameExists($username) {

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
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $this->usager_model->delete_user($user_id);

        redirect('usagers');
    }

    public function editUser($user_id) {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $data['user'] = $this->usager_model->getUsers($user_id);

        $data['err_message'] = '* Tous Les Champs Sont Requis!';

        $data['roles'] = $this->usager_model->getRoles();

        if (empty($data['user'])) {

            show_404();
        }

        $data['title'] = 'Mise à jour user';

        $this->load->view('common/header');
        $this->load->view('usagers/edit', $data);
        $this->load->view('common/footer');
    }

    public function updateUser() {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $this->usager_model->updateUser();

        redirect('usagers');
    }
}
