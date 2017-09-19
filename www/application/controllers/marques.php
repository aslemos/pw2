<?php
/*
 *
 *
 */

class Marques extends CI_Controller {

    public function index() {

        // Check login
        if (!UserAcces::userIsLogged()) {

            redirect('usager/login');
        }

        $data['title'] = 'Liste Des Marques';

        $data['marques'] = $this->marque_model->getMarque();

        $this->load->view('common/header');
        $this->load->view('marques/index', $data);
        $this->load->view('common/footer');
    }

    public function createMarque() {

        // Check login
        if (!UserAcces::userIsLogged()) {

            redirect('usager/login');
        }

        // Check login
        if (!UserAcces::userIsLogged()) {

            redirect('usager/login');
        }

        $data['title'] = 'Ajouter une Marque';

        $this->form_validation->set_rules('nom_marque', 'Nom marque', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('common/header');
            $this->load->view('marques/create', $data);
            $this->load->view('common/footer');
        } else {

            $this->marque_model->createMarque();

            // Set message
            $this->session->set_flashdata('marque_created', 'La marque a été créée avec succès!');

            redirect('marques');
        }
    }

    public function vehiculesByMarque($marque_id) {


        $data['title'] = $this->marque_model->getMarque($marque_id)->nom_marque;

        $data['vehicules'] = $this->vehicule_model->getVehiculesByMarque($marque_id);

        $this->load->view('common/header');
        $this->load->view('vehicules/index', $data);
        $this->load->view('common/footer');
    }

    public function deleteMarque($marque_id) {

        // Check login
        if (!UserAcces::userIsLogged()) {

            redirect('usager/login');
        }

        // Check login
        if (!UserAcces::userIsLogged()) {

            redirect('usager/login');
        }

        $this->marque_model->deleteMarque($marque_id);

        // Set message
        $this->session->set_flashdata('marque_deleted', 'La marque  a été supprimée avec succès!');

        redirect('marques');
    }
}
