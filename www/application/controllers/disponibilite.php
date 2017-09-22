<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Disponibilite extends CI_Controller {

    public function create($vehicule_id) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }
        if (!UserAcces::userIsActif()) {
            redirect('noperm');
        }

        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        if (!$vehicule) {
            show_404();
        }

        $data['vehicule'] = $vehicule;
        $data['disponibilites'] = $vehicule->getDisponibilites();

        $this->form_validation->set_rules('date_debut', 'Date début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date fin', 'required');

        $data['page_title'] = 'Disponibilité du véhicule';
        $data['title'] = 'Disponibilité du véhicule';
        /*
        <?=$base_url?>disponibilite/delete/<?=$disponibilite->getId()?>
         * 
         */
        $data['scripts'] = [
            base_url() . 'assets/js/calendrier_date_debut_et_fin.js'
        ];

        if ($this->form_validation->run()) {
            $this->load->model('disponibilite_model');
            $disponibilite = new EDisponibilite([
                'vehicule' => $vehicule,
                'date_debut' => $this->input->post('date_debut'),
                'date_fin' => $this->input->post('date_fin')
            ]);
            if ($this->disponibilite_model->add_disponibilite($disponibilite)) {
                $this->session->set_flashdata('msg_success', 'La disponibilité a bien été ajoutée');
                redirect('disponibilite/create/' . $vehicule_id . '#s');
            }
        }

        $this->load->view('vehicules/disponibilite', $data);
    }

    public function delete($dispo_id) {
        $this->load->model('disponibilite_model');
        $dispo = $this->disponibilite_model->getDisponibiliteById($dispo_id);

        if (!$dispo) {
            show_404();
        }

        $vehicule_id = $dispo->getVehiculeId();
        if ($this->disponibilite_model->deleteDisponibilite($dispo)) {
            $this->session->set_flashdata('msg_success', 'La disponibilité a été supprimée');
        } else {
            $this->session->set_flashdata('msg_error', 'Un erreur s\'est produite. La disponibilité n\'a pas été supprimée');
        }
        redirect('disponibilite/create/' . $vehicule_id . '#s');
    }
}
