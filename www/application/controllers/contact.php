<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contacter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('message_model');
    }

    public function index() {
        $data['page_title'] = 'Contactez-nous';
        $data['body_class'] = '';

        if ($this->input->post('contenu')) {

            $contact = new Contact();
            $contact->setContenu($this->input->post('contenu'));
            $contact->setSujet($this->input->post('contenu'));

            $this->message_model->createMessage($contact);

            $this->load->view('messenger/msg_enregistre');

        } else {
            $this->load->view('messenger/form_contact');
        }
    }

}
