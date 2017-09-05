<?php
/*
 * Contrôleur des fonctions de messagerie
 * @author : Alessandro Lemos
 */

class Message_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $user = UserAcces::getUser();
        $this->load->model('message_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Messagerie';
        $data['body_class'] = '';
        $data['messages'] = $this->message_model->getMessages($user);

        $this->load->view('messenger/liste_messages', $data);
    }

    public function composer() {

        $this->load->model('user_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Composer message';
        $data['body_class'] = '';
        $data['users'] = $this->user_model->getUsers();

        $this->load->view('messenger/form_message', $data);
    }

    public function enregistrer() {

        // touve le destinataire
        $this->load->model('user_model');
        $dest = new Usager(
                    $this->user_model->getUserById($this->input->post('destinataire_id'))
                );

        // crée le message
        $msg = new Message();
        $msg->setEmetteur(UserAcces::getUser());
        $msg->setDestinataire($dest);
        $msg->setSujet($this->input->post('sujet'));
        $msg->setContenu($this->input->post('message'));

        // enregistre le message
        $this->load->model('message_model');
        $this->message_model->createMessage($msg);

        // appelle la page de résultat
        $data['base_url'] = base_url();
        $data['page_title'] = 'Composer message';
        $data['body_class'] = '';
        $data['destinaraire'] = $dest;
        $this->load->view('messenger/message_enregistre', $data);
    }
}
