<?php
/*
 *
 *
 */

class Roles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }

        // Usager n'est pas administrateur
        if (!UserAcces::userIsAdmin()) {
            redirect('noperm');
        }
    }

    public function index() {

        $data['title'] = 'Liste Des Roles';

        $data['roles'] = $this->role_model->get_roles();
        //print_r ($data['roles']);die();
        $this->load->view('common/header');
        $this->load->view('roles/index', $data);
        $this->load->view('common/footer');
    }

    public function create() {

        $data['title'] = 'Ajouter un Rôle';

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('common/header');
            $this->load->view('roles/create', $data);
            $this->load->view('common/footer');
        } else {

            $this->marque_model->create_role();

            // Set message
            $this->session->set_flashdata('role_created', 'Le role a été créée avec succès!');

            redirect('roles');
        }
    }

    public function usagers($role_id) {

        $data['title'] = $this->marque_model->get_role($role_id)->name;

        $data['usagers'] = $this->user_model->get_usagers_by_role($role_id);

        $this->load->view('common/header');
        $this->load->view('usagers/index', $data);
        $this->load->view('common/footer');
    }

    public function delete($role_id) {

        $this->marque_model->delete_marque($marque_id);

        // Set message
        $this->session->set_flashdata('role_deleted', 'Le role  a été supprimée avec succès!');

        redirect('roles');
    }
}
