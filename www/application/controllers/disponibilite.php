<?php
/*
 * Contrôleur d'accès aux disponibilités du véhicule
 */

class Disponibilite extends CI_Controller {

    /**
     * Ajout d'une disponibilité d'un véhicule
     * @param int $vehicule_id Le véhicule auquel on ajoute la disponibilité
     */
    public function create($vehicule_id = NULL) {

        // Check login
        if (!UserAcces::userIsLogged()) {
            redirect('usager/login');
        }
        if (!UserAcces::userIsActif()) {
            redirect('noperm');
        }

        // Vérifie l'existence du véhicule
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

            // Seulement le propriétaire du véhicule ou l'administrateur
            //  peut ajouter une disponibilité
            if (!UserAcces::userIsAdmin() && !UserAcces::getUserId() == $vehicule->getProprietaireId()) {
                redirect('noperm');
            }

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
            $this->session->set_flashdata('msg_error', 'Un erreur s\'est produite. La disponibilité n\'a pas été ajouté');
        }

        $this->load->view('vehicules/disponibilite', $data);
    }

    /**
     * Supprime une disponibilité
     * @param int $dispo_id L'identifiant de la disponibilité à supprimer
     */
    public function delete($dispo_id) {
        $this->load->model('disponibilite_model');

        // Vérifie si la disponibilité existe
        //  et si le véhicule associé existe aussi
        $dispo = $this->disponibilite_model->getDisponibiliteById($dispo_id);
        if (!$dispo || !$dispo->getVehicule()) {
            show_404();
        }

        // Seulement le propriétaire du véhicule ou l'administrateur
        //  peut supprimer une disponibilité
        $vehicule = $dispo->getVehicule();
        if (!UserAcces::userIsAdmin() && !UserAcces::getUserId() == $vehicule->getProprietaireId()) {
            redirect('noperm');
        }

//        $vehicule_id = $dispo->getVehiculeId();
        if ($this->disponibilite_model->deleteDisponibilite($dispo)) {
            $this->session->set_flashdata('msg_success', 'La disponibilité a été supprimée');
        } else {
            $this->session->set_flashdata('msg_error', 'Un erreur s\'est produite. La disponibilité n\'a pas été supprimée');
        }
        redirect('disponibilite/create/' . $vehicule->getId() . '#s');
    }
}
