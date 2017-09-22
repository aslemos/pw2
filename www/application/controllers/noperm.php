<?php
/*
 * Affiche un message d'accès interdit
 * @author Alessandro Souza Lemos
 */

class Noperm extends CI_Controller {

    public function index() {
        $data['page_title'] = 'Accès non autorisé';
        $data['title'] = 'Accès non autorisé';
        $data['msg_title'] = 'Accès interdit';
        $this->load->view('common/page_message', $data);
    }
}
