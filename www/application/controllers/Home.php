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
        
        $data['title'] = 'Liste des vehicules';
        
        $data['vehicules'] = $this->vehicule_model->get_vehicules();		
        //print_r($data['vehicules']);

//        $this->load->view('templates/header');
        $this->load->view('home/index', $data);
//        $this->load->view('templates/footer');
    }
	
    public function about() {
        
        $data['title'] = 'À propos de nous';
        
//        $this->load->view('templates/header');
        $this->load->view('home/about', $data);
//        $this->load->view('templates/footer'); 
    }
    
    public function vehicule() {
        
        $data['title'] = 'Lite des véhicules';
        
        $data['vehicules'] = $this->vehicule_model->get_vehicules();
        
//        $this->load->view('templates/header');
        $this->load->view('home/vehicule', $data);
//        $this->load->view('templates/footer'); 
    }
    
    public function search (){

    $data['title'] = 'Formulaire de recherche';

    $data['usagers'] = $this->vehicule_model->get_usagers();
    $data['type_vehicules'] = $this->vehicule_model->get_vehicules();
    $data['marques'] = $this->vehicule_model->get_marques();
    $data['modeles'] = $this->vehicule_model->get_modeles();
    $data['carburants'] = $this->vehicule_model->get_carburants();
    $data['transmissions'] = $this->vehicule_model->get_transmissions();
    $data['arrondissements'] = $this->vehicule_model->get_arrondissements();

    $this->vehicule_model->search_vehicule($search_field);
    redirect('vehicules');
    }
}