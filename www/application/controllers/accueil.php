<?php

/**
 * Contrôleur de la page d'accueil et quelques pages statiques
 */

class Accueil extends CI_Controller {

    /**
     * Affiche la page d'accueil
     */
    public function index() {
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Accueil';
        $data['body_class'] = '';
        $data['base_url'] = base_url();
        $data['vehicules'] = $this->vehicule_model->getVehicules();
        $data['scripts'] =[
                            'http://maps.googleapis.com/maps/api/js?key=AIzaSyCa28kbEpTfpVVk2tjWhsZp3VRQh2Z96xI',
                            base_url().'assets/js/gmap.js',
                            base_url().'assets/js/maps.js'
                        ];

        $this->load->view('accueil', $data);
    }

    /**
     * Affiche la page 'à propos'
     */
    public function apropos() {

        $data['title'] = 'À propos de nous';
        $data['page_title'] = 'A Propos de nous';
        $data['body_class'] = 'subpages apropos';

        $data['base_url'] = base_url();
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';

        $this->load->view('statique/a-propos', $data);

    }
}