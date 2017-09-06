<?php

class Voiture extends CI_Controller {

    public function index() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Voitures';
        $data['body_class'] = 'subpages voitures';
        $this->load->view('client/voitures');
    }

    public function get_cars() {

        //$data['title'] = 'Liste des membres';

        $this->load->model('voiture2');
        $data['voitures'] = $this->voiture2->getVoitures();

        $this->load->view('client/liste_voitures', $data);
    }

    public function form_location($id) {

        $this->load->model('usager2');
        $this->load->model('payement2');
        $this->load->model('voiture2');

        $data['users'] = $this->usager2->getUsersInfo();
        $data['payements'] = $this->payement2->get_payements();
        $data['voitures'] = $this->voiture2->getVoituresById($id);


        $this->load->view('client/form_location', $data);
    }

    public function insert_payement() {

        $this->load->model('voiture2');

        $data = array(
            'date_debut' => $this->input->post('date_debut'),
            'date_fin' => $this->input->post('date_fin'),
            'user_id' => $this->input->post('user_id'),
            'vehicule_id' => $this->input->post('vehicule_id'),
            'mode_id' => $this->input->post('mode_id')
        );

//Transfering data to Model
        $this->voiture2->form_insert($data);


//Loading View
        $data['message'] = 'Data Inserted Successfully';
        //$this->load->view('insert_view', $data);
        $this->load->view('client/form_location', $data);
    }

    public function rechercheVoiture() {
        $this->load->model('voiture');

        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Voitures';
        $data['body_class'] = 'subpages voitures';
        $data['resultat'] = $this->model_voiture->getVoitures(Recherche::getRecherche());
        $this->load->view('client/voitures');
    }

}
