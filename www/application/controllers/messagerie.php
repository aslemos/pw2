<?php
/*
 * Contrôleur des fonctions de messagerie
 * @author : Alessandro Lemos
 * Modifié par Iadhy: Ajouter la partie contacter nous
 * .[asl] déplacé la fonction 'contacterNous' de Iadhy vers le nouveau controller 'contact' et renommé comme 'index'
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
        $data['body_class'] = 'subpages messagerie';
        $data['messages'] = $this->message_model->getMessages($user);

        $this->load->view('messagerie/liste_messages', $data);
    }

    public function envoyes() {
        $user = UserAcces::getLoggedUser();
        $this->load->model('message_model');

        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages envoyés';
        $data['title'] = 'Messages envoyés';
        $data['list_type'] = 'S'; // sortie
        $data['body_class'] = 'subpages messagerie';
        $data['messages'] = $this->message_model->getMessagesEnvoyes($user);
        $this->load->view('messagerie/liste_messages', $data);
    }

    public function composer() {
        $data['base_url'] = base_url();
        $data['page_title'] = 'Envoyer message à un membre';
        $data['title'] = 'Contacter un membre';
        $data['body_class'] = 'subpages messagerie';
        $data['users'] = $this->usager_model->getUsers();

        $this->load->view('messagerie/form_message', $data);
    }

    public function enregistrer() {

        // trouve le destinataire
        $dest = new EUsager(
                $this->usager_model->getUsers($this->input->post('destinataire_id'))
        );

        // crée le message
        $msg = new EMessage();
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
        $data['body_class'] = 'subpages messagerie';
        $data['destinaraire'] = $dest;
        $this->load->view('messagerie/message_enregistre', $data);
    }

    public function composerAdmin() {
        $data['base_url'] = base_url();
        $data['page_title'] = 'Contacter un administrateur';
        $data['title'] = 'Contacter un administrateur';
        $data['body_class'] = 'subpages messagerie';
        $data['users'] = $this->usager_model->getAdmins();

        $this->load->view('messagerie/form_message_admin', $data);
    }

    public function enregistrerAdmin() {

        $msg = new EMessage();
        $this->message_model->createMessage($msg);

        // crée le message
        $msg = new EMessageAdmin();
        $msg->setEmetteur(UserAcces::getLoggedUser());
        $msg->setSujet($this->input->post('sujet'));
        $msg->setContenu($this->input->post('message'));

        // trouve le destinataire
        $dest = $this->usager_model->getUserById($this->input->post('destinataire_id'));
        if ($dest) {
            $msg->setDestinataire($dest);
        }

        // enregistre le message
        $this->load->model('message_model');
        $this->message_model->createMessage($msg);

        // appelle la page de résultat
        $data['base_url'] = base_url();
        $data['page_title'] = 'Message à l\'administration du site';
        $data['body_class'] = 'subpages messagerie';
        $data['destinaraire'] = $dest;
        $this->load->view('messagerie/message_enregistre', $data);
    }

    public function view_message_interne($message_id) {
        $data['base_url'] = base_url();
        $data['page_title'] = 'Contact de membre';
        $data['title'] = 'Contact de membre';
        $data['body_class'] = 'subpages messagerie';
        $data['message'] = $this->message_model->getMessageById($message_id);
        $this->load->view('messagerie/view_message_inter',$data);
    }

    public function delete_message_interne($message_id) {
        $this->load->model('message_model');
        $this->message_model->deleteMessage($message_id);
        redirect('admin/messages#s');
    }

    public function view_message_recu($message_id) {

        $message = $this->message_model->getMessageById($message_id);
        if (!$message) {
            show_404();
        }

        $data['page_title'] = 'Message reçu';
        $data['title'] = 'Message reçu';
        $data['action'] = base_url() . 'messagerie#s';
        $data['base_url'] = base_url();
        $data['body_class'] = 'subpages messagerie';
        $data['message'] = $message;
        $this->load->view('messagerie/view_envoyes', $data);
    }

    public function view_message_envoye($message_id) {

        $message = $this->message_model->getMessageById($message_id);
        if (!$message) {
            show_404();
        }

        $data['page_title'] = 'Message envoyé';
        $data['title'] = $message->getDescription(); //'Message envoyé';
        $data['action'] = base_url() . 'messagerie/envoyes#s';
        $data['base_url'] = base_url();
        $data['body_class'] = 'subpages messagerie';
        $data['message'] = $message;
        $this->load->view('messagerie/view_envoyes', $data);
    }

    public function delete_message_envoyes($message_id) {
        $this->load->model('message_model');
        $this->message_model->deleteMessage($message_id);
        redirect('messagerie/envoyes#s');
    }

}
