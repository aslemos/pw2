<?php
class Reclamation extends CI_Controller {

    /*
     * Page de l'historique des locations que j'ai faites
     * (les véhicules que j'ai loués)
     */

    // reclamation/form_vehicule/ID_vehicule
    public function form_vehicule($vehicule_id) {

        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_LOCATAIRE;
        $data['objet_id'] = $vehicule_id;

        $data['body_class'] = "subpages membre";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Réclamation de véhicule';

        $this->load->model('vehicule_model');

        $data['users'] = UserAcces::getLoggedUser();
        $data['voitures'] = $this->vehicule_model->getVehicules($vehicule_id);

        // ATTENTION ! renommer le fichier de la view
        $this->load->view('client/form_reclamation_vehicule',  $data);
    }

    // reclamation/form_proprietaire/ID_proprietaire
    public function form_proprietaire($proprietaire_id) {
        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_LOCATAIRE;
        $data['objet_id'] = $proprietaire_id;

    }

    /*
     * Page de l'historique des locataires
     * (les personnes qui ont loué mes véhicules)
     */

    // reclamation/form_locataire/ID_locateur
    public function form_locataire($locataire_id) {
        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_LOCATAIRE;
        $data['objet_id'] = $locataire_id;
    }


     public function form_reclamation($id) {
        $data['body_class'] = "subpages voitures";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Messages reçus';

        $this->load->model('vehicule_model');
        $this->load->model('modepaiement_model');

        $data['users'] = UserAcces::getLoggedUser();
        $data['voitures'] = $this->vehicule_model->getVehicules($id);
        $data['payements'] = $this->modepaiement_model->getModesPaiements();

        $this->load->view('client/form_reclamation', $data);
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

        $msg->setEmetteur(UserAcces::getLoggedUser());
        $msg->setSujet($this->input->post('sujet'));
        $msg->setContenu($this->input->post('contenu'));
        $msg->setObjetId($this->input->post('objet_id'));

        $this->load->model('message_model');
        $this->message_model->createMessage($msg);

        redirect($url_redirect);
    }
}