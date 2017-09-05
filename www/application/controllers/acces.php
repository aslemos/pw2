<?php

class Acces extends CI_Controller {

    public function login() {
        if (UserAcces::userIsLogged()) {
            redirect('accueil');
        }

        if ($this->input->post('username') !== NULL) {
            $this->load->model('user_model');

            // vérifier login
            $user = $this->user_model->getUserByLogin(
                        $this->input->post('username'),
                        $this->input->post('motdepasse')
                    );

            if ($user !== NULL) {
                $this->session->user_data = $user;
                redirect('accueil');
            }
        }

        $this->load->view('client/login');
    }

    public function logout() {
        unset($_SESSION['user_data']);
        redirect('accueil');
    }
}
