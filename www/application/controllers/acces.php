<?php

class Acces extends CI_Controller {

    public function login() {
        $this->load->view('client/login');
    }

    public function logout() {
        unset($this->session['user_data']);
        $this->request->redirect('accueil'); // pseudo code.
    }
}
