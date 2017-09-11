<?php
/*
 * Fonctions de contact d'usager non logué
 * @author Alessandro Lemos
 */

class Contact extends CI_Controller {

    /**
     *  Fonction appel la formulaire de contacter nous
     *  Si l'usager n'est pas connecté
     */
    public function index() { // [asl] ancien 'messagerie/contacterNous'

        // si l'usager est logué, on le redirectionne vers sa messagerie
        if (UserAcces::userIsLogged()) {
            redirect('messagerie#s');
        }

        $data['base_url'] = base_url();
        $data['page_title'] = 'Contactez-nous';
        $data['title'] = 'Contactez-nous';
        $data['body_class'] = 'subpages contacternous';

        $this->load->view('messagerie/form_contacter_nous', $data);

    }

    /*
     * Sauvegarde le contact
     */
    public function enregistrer() {
        // crée le message
        $msg = new EContact();
        $msg->setSujet($this->input->post('subject') ? $this->input->post('subject') : 'non fourni');

        $message = 'Nom : ' . ($this->input->post('fullname') ? $this->input->post('fullname') : 'non fourni') . '<br>';
        $message.= 'Entreprise : ' . ($this->input->post('company') ? $this->input->post('company') : 'non fourni') . '<br>';
        $message.= 'Phone : ' . ($this->input->post('phone') ? $this->input->post('phone') : 'non fourni') . '<br>';
        $message.= 'Courriel : ' . ($this->input->post('email') ? $this->input->post('email') : 'non fourni') . '<br><br>';
        $message.= $this->input->post('message');
        $msg->setContenu($message);

        // enregistre le message
        $this->load->model('message_model');
        $this->message_model->createMessage($msg);

        // revient à la page de message
        $this->session->set_flashdata('msg_success', 'Message envoyé avec succès');
        redirect('contact');
    }
}
