<?php

class Voiture extends CI_Controller {

    public function index() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Voitures';
        $data['body_class'] = 'subpages voitures';
        $this->load->view('client/voitures');
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
