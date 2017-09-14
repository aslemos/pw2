<?php
/*
 * *** NB: la fonction "search" non encore focntionnelle ***
 *
 * Nom de la classe: Home (Controleur par défaut)
 * Déscription: Permet d'afficher la page d'accueil
 * et les pages contenues dans le dossier 'application/views/home/'.
 * Liste des pages : index.php, vehicule.php, about.php.
 * Liste des fonctions:
 * ** 1. index      => Affiche page d'accueil
 * ** 2. about      => Affiche page À propos
 * ** 3. vehicule   => Affiche liste des vehicules disponibles
 * ** 4. search     => Affiche les véhicules selon le/les critère(s) de recherche
 *
 */

class Home extends CI_Controller {

    public function index() {

        $data['page_title'] = 'Liste des vehicules';
        $data['body_class'] = '';

        $data['vehicules'] = $this->vehicule_model->getVehicules();
        $this->load->view('home/index', $data);
    }

    public function vehicule() {

        $data['title'] = 'Lite des véhicules';

        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $this->load->view('home/vehicule', $data);
    }

    public function vehiculeView() {
        $data['title'] = 'Lite des véhicules';

        $data['vehicules'] = $this->vehicule_model->getVehicules();

        $this->load->view('common/header');
        $this->load->view('home/vehicule', $data);
        $this->load->view('common/footer');
    }
}
