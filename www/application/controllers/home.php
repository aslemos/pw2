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

    public function about() {

        $data['title'] = 'À propos de nous';

        $this->load->view('home/about', $data);
    }

    public function aboutView() {
        $data['title'] = 'À propos de nous';

        $this->load->view('common/header');
        $this->load->view('home/about', $data);
        $this->load->view('common/footer');
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

    public function search() {

        $data['title'] = 'Formulaire de recherche';

        $data['usagers'] = $this->vehicule_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getVehicules();
        $data['marques'] = $this->vehicule_model->getMarques();
        $data['modeles'] = $this->vehicule_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getCarburants();
        $data['transmissions'] = $this->vehicule_model->getTransmissions();
        $data['arrondissements'] = $this->vehicule_model->getArrondissements();

        $this->vehicule_model->search_vehicule($search_field);
        redirect('vehicules');
    }

    public function searchVehicule() {

        $data['title'] = 'Formulaire de recherche';

        $data['usagers'] = $this->usager_model->getUsers();
        $data['type_vehicules'] = $this->vehicule_model->getVehicules();
        $data['marques'] = $this->vehicule_model->getMarques();
        $data['modeles'] = $this->vehicule_model->getModeles();
        $data['carburants'] = $this->vehicule_model->getMarburants();
        $data['transmissions'] = $this->vehicule_model->getMransmissions();
        $data['arrondissements'] = $this->vehicule_model->getMrrondissements();

        $this->vehicule_model->searchVehicule($search_field);

        redirect('vehicules');
    }

    public function contactForm() {

        $data['title'] = 'Contactez-nous';

        $this->load->view('home/contact', $data);
    }
}
