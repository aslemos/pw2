<?php
/*
 * Contrôleur des fonctions de messagerie
 * @author : Alessandro Lemos
 */

class Messagerie extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!UserAcces::userIsLogged()) {
            redirect('accueil');
        }
    }

    public function index() {
        $user = UserAcces::getLoggedUser();
        $this->load->model('message_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';
        $data['title'] = 'Messages reçus';
        $data['list_type'] = 'E'; // entrée
        $data['body_class'] = '';
        $data['messages'] = $this->message_model->getMessages($user);

        $this->load->view('messenger/liste_messages', $data);
    }

    public function envoyes() {
        $user = UserAcces::getLoggedUser();
        $this->load->model('message_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages envoyés';
        $data['title'] = 'Messages envoyés';
        $data['list_type'] = 'S'; // sortie
        $data['body_class'] = '';
        $data['messages'] = $this->message_model->getMessagesEnvoyes($user);
        $this->load->view('messenger/liste_messages', $data);
    }

    public function composer() {

//        $this->load->model('user_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Composer message';
        $data['title'] = 'Nouveau message';
        $data['body_class'] = '';
        $data['users'] = $this->usager_model->getUsers();

        $this->load->view('messenger/form_message', $data);
    }

    public function enregistrer() {

        // touve le destinataire
        $this->load->model('usager_model');
        $dest = new User(
                $this->usager_model->getUsers($this->input->post('destinataire_id'))
        );

        // crée le message
        $msg = new Message();
        $msg->setEmetteur(UserAcces::getLoggedUser());
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
