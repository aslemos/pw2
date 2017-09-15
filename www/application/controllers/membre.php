<?php
/*
 * Class membre pour gérer la liste des membres
*/
class Membre extends CI_Controller {

//    public function view($page) {
//
//            $this->load->helper('url');
//
//            $data['title'] = ucfirst($page);
//
//            $data['base_url'] = base_url();
//
//            $this->load->view('membre/' . $page, $data);
//
//
//    }

    /**
     * Affiche la liste des véhicules appartenant à l'usager logué
     */
    public function vehicules() {

        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Mes voitures';
        $data['title'] = 'Mes voitures';
        $data['body_class'] = 'subpages membre';
        $data['vehicules'] = $this->vehicule_model->getVehiculesByUser(UserAcces::getLoggedUser());
        $this->load->view('membre/liste_voitures', $data);
    }

    /**
     * Affiche les demandes de réservation<br>
     *(en attente d'approbation par le propriétaire du véhicule).
     */
    public function demandesReservation() {

        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['page_title'] = 'Demandes de réservation';
        $data['title'] = 'Demandes de réservation';
        $data['body_class'] = 'subpages membre';

        $this->load->view('membre/demandes_reservation', $data);
    }


}
