<?php
class Reclamation extends CI_Controller {

    /*
     * Page de l'historique des locations que j'ai faites
     * (les véhicules que j'ai loués)
     */

    // reclamation/form_vehicule/ID_vehicule
    public function form_vehicule($vehicule_id) {

        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_VEHICULE;
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
        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_PROPRIETAIRE;
        $data['objet_id'] = $proprietaire_id;

        $data['body_class'] = "subpages membre";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Réclamation de proprietaire';

        $this->load->model('usager_model');

        $data['users'] = UserAcces::getLoggedUser();
        $data['voitures'] = $this->usager_model->getUsers($proprietaire_id);

        // ATTENTION ! renommer le fichier de la view
        $this->load->view('client/form_reclamation_proprietaire',  $data);

    }

    /*
     * Page de l'historique des locataires
     * (les personnes qui ont loué mes véhicules)
     */

    // reclamation/form_locataire/ID_locateur
    public function form_locataire($location_id) {
          $this->load->model('location_model');
          $data['locations'] = $this->location_model-> get_locations($location_id);

//          echo "<pre>";
//         var_dump($data);
//          echo "</pre>";

        $data['type_message'] = EMessage::MSG_TYPE_RECLAMATION_LOCATAIRE;
        $data['objet_id'] = $location_id;

        $data['body_class'] = "subpages membre";
        $data['base_url'] = base_url();
        $data['page_title'] = 'Réclamation de locataire';



        $data['users'] = UserAcces::getLoggedUser();

        //$data['locations'] = $this->usager_model->getLocatairesByUser(UserAcces::getLoggedUser());


        //$data['voitures'] = $this->usager_model->getUsers($locataire_id);

        // ATTENTION ! renommer le fichier de la view
        $this->load->view('client/form_reclamation_locataire',  $data);


    }

//
//     public function form_reclamation($id) {
//        $data['body_class'] = "subpages voitures";
//        $data['base_url'] = base_url();
//        $data['page_title'] = 'Messages reçus';
//
//        $this->load->model('vehicule_model');
//        $this->load->model('modepaiement_model');
//
//        $data['users'] = UserAcces::getLoggedUser();
//        $data['voitures'] = $this->vehicule_model->getVehicules($id);
//        $data['payements'] = $this->modepaiement_model->getModesPaiements();
//
//        $this->load->view('client/form_reclamation', $data);
//    }



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

        $msg->setEmetteur(UserAcces::getLoggedUser());
        $msg->setSujet($this->input->post('sujet'));
        $msg->setContenu($this->input->post('contenu'));
        $msg->setObjetId($this->input->post('objet_id'));

        $this->load->model('message_model');
        $this->message_model->createMessage($msg);
   $this->load->view('client/page_succes_reclamation',$data );
//        redirect($url_redirect);
    }
}