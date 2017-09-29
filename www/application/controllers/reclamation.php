<?php
/*
 * Contrôleur des réclamations
 */

class Reclamation extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }
    }

    /*
     * Page de l'historique des locations que j'ai faites
     * (les véhicules que j'ai loués)
     */

    // reclamation/form_vehicule/ID_vehicule
    public function form_vehicule($vehicule_id) {

        // vérifie si le véhicule existe
        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        if (!$vehicule) {
            show_404();
        }

        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_VEHICULE;
        $data['objet_id'] = $vehicule_id;

        $data['body_class'] = "subpages membre";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Réclamation de véhicule';
        $data['title'] = 'Réclamation de véhicule';
        $data['action'] = base_url() . 'reclamation/insert_reclamation#s';

        $this->load->model('vehicule_model');

        $data['locataire'] = UserAcces::getLoggedUser();
        $data['vehicule'] = $vehicule;

        $this->load->view('client/form_reclamation_vehicule',  $data);
    }

    // reclamation/form_proprietaire/ID_proprietaire
    public function form_proprietaire($proprietaire_id) {

        // vérifie si le propriétaire existe
        $proprietaire = $this->usager_model->getUserById($proprietaire_id);
        if (!$proprietaire) {
            show_404();
        }

        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_PROPRIETAIRE;
        $data['objet_id'] = $proprietaire_id;

        $data['body_class'] = "subpages membre";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Réclamation de proprietaire';
        $data['title'] = 'Réclamation de propriétaire';
        $data['action'] = base_url() . 'reclamation/insert_reclamation#s';

        $data['locataire'] = UserAcces::getLoggedUser();
        $data['proprietaire'] = $proprietaire;

        $this->load->view('client/form_reclamation_proprietaire',  $data);
    }

    /*
     * Page de l'historique des locataires
     * (les personnes qui ont loué mes véhicules)
     */

    // reclamation/form_locataire/ID_location
    public function form_locataire($location_id) {
        $this->load->model('location_model');

        // vérifie si la location existe
        $location = $this->location_model->getLocationById($location_id);
        if (!$location) {
            show_404();
        }

        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_LOCATAIRE;
        $data['objet_id'] = $location->getLocataireId();

        $data['body_class'] = "subpages membre";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Réclamation de locataire';
        $data['title'] = 'Réclamation de locataire';
        $data['action'] = base_url() . 'reclamation/insert_reclamation#s';

        $data['locataire'] = $location->getLocataire();
        $data['proprietaire'] = UserAcces::getLoggedUser();

        $this->load->view('client/form_reclamation_locataire',  $data);
    }

    public function insert_reclamation() {

        $url_redirect = base_url() . 'locations/locationsByUser';
        switch ($this->input->post('type_message')) {
            case EMessage::MSG_TYPE_RECLAMATION_VEHICULE:
                $msg = new EReclamationVehicule();
                break;

            case EMessage::MSG_TYPE_RECLAMATION_PROPRIETAIRE:
                $msg = new EReclamationProprietaire();
                break;

            case EMessage::MSG_TYPE_RECLAMATION_LOCATAIRE:
                $msg = new EReclamationLocataire();
                $url_redirect = base_url() . 'locations/locataires';
                break;

            default:
                redirect('accueil');
                break;
        }

        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Location reçus';
        $data['action'] = $url_redirect;

        $msg->setEmetteur(UserAcces::getLoggedUser());
        $msg->setSujet($this->input->post('sujet'));
        $msg->setContenu($this->input->post('contenu'));
        $msg->setObjetId($this->input->post('objet_id'));

        $this->load->model('message_model');
        $this->message_model->createMessage($msg);
        $this->load->view('client/page_succes_reclamation', $data);
    }

     public function view($message_id) {

         // vérifie si la réclamation existe
         $message = $this->message_model->getMessageById($message_id);
         if (!$message) {
             show_404();
         }

        $data['base_url'] = base_url();
        $data['message'] = $message;
        $data['page_title'] = $data['message']->getDescription();
        $data['title'] = $data['message']->getDescription();
//        $data['title'] = 'Réclamation récue';
        $this->load->view('messagerie/view_reclamation',$data);
     }


     public function delete($message_id) {

         // vérifie si la réclamation existe
         $message = $this->message_model->getMessageById($message_id);
         if (!$message) {
             show_404();
         }

        $this->load->model('message_model');
        $this->message_model->deleteMessage($message_id);
        redirect('admin/reclamations#s');
    }
}
