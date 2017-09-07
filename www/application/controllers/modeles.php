<?php
/*
 *
 *
 */

class Modeles extends CI_Controller {

    public function index() {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $data['title'] = 'Liste Des Modeles';

        $data['modeles'] = $this->modele_model->getModeles();

        $this->load->view('common/header');
        $this->load->view('modeles/index', $data);
        $this->load->view('common/footer');
    }

    public function createModele() {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $data['title'] = 'Ajouter un modele';

        $this->form_validation->set_rules('nom_modele', 'Nom modele', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('common/header');
            $this->load->view('modeles/create', $data);
            $this->load->view('common/footer');
        } else {

            $this->modele_model->createModele();

            // Set message
            $this->session->set_flashdata('modele_created', 'Le modele a été créer avec succès!');

            redirect('modeles');
        }
    }

    public function vehiculesByModele($modele_id) {

        $data['title'] = $this->modele_model->getModele($modele_id)->nom_modele;

        $data['vehicules'] = $this->vehicule_model->getVehiculesByModele($modele_id);

        $this->load->view('common/header');
        $this->load->view('vehicules/index', $data);
        $this->load->view('common/footer');
    }

    public function deleteModele($modele_id) {

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        // Check login
        if (!$this->session->userdata('logged_in')) {

            redirect('usagers/login');
        }

        $this->modele_model->deleteModele($modele_id);

        // Set message
        $this->session->set_flashdata('modele_deleted', 'Le modele a été supprimer avec succès!');

        redirect('modeles');
    }
}
