<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Disponibilite_model extends CI_Model {

    public function add_disponibilite(IDisponibilite $disponibilite) {
        if ($disponibilite->getVehiculeId() === NULL) {
            throw new Exception('vehicule_id invalide');
        }
        return $this->db->insert('disponibilites', [
            'vehicule_id' => $disponibilite->getVehiculeId(),
            'date_debut' => $disponibilite->getDateDebut(),
            'date_fin' => $disponibilite->getDateFin()
        ]);
    }

    /**
     * Supprime une disponibilité
     * @param IDisponibilite $dispo
     */
    public function deleteDisponibilite(IDisponibilite $dispo) {
        $this->db->where('dispo_id', $dispo->getId());
        return $this->db->delete('disponibilites');
    }

    /**
     * Récupère une disponibilité d'un véhicule
     * @param int $dispo_id L'identifiant de la disponibilité
     * @return EDisponibilite
     */
    public function getDisponibiliteById($dispo_id) {
        $query = $this->db->get_where('disponibilites', ['dispo_id' => $dispo_id]);
        $data = $query->row_array();
        if (!empty($data) > 0) {
            $disp = new EDisponibilite($data);

            // crée l'objet EVehicule
            $data_vehicule = $this->getVehicules($data['vehicule_id']);
            $disp->setVehicule(
                    new EVehicule($data_vehicule)
                    );

            return $disp;
        }
        return NULL;
    }

    public function get_disponibilites($vehicule_id) {

        $query = $this->db->get_where('disponibilites', array('vehicule_id' => $vehicule_id));

        return $query->result_array();
    }

    private function getVehicules($vehicule_id = NULL) {

        $this->db->order_by('vehicule_id', 'DESC');

        $this->db->join('usagers', 'vehicules.proprietaire_id = usagers.user_id');
        $this->db->join('type_vehicules', 'vehicules.type_id = type_vehicules.type_id');
        $this->db->join('modeles', 'vehicules.modele_id = modeles.modele_id');
        $this->db->join('marques', 'modeles.marque_id = marques.marque_id');
        $this->db->join('carburants', 'vehicules.carburant_id = carburants.carburant_id');
        $this->db->join('transmissions', 'vehicules.transmission_id = transmissions.transmission_id');
        $this->db->join('arrondissements', 'vehicules.arr_id = arrondissements.arr_id');
        $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');

        if ($vehicule_id === NULL) {
            $query = $this->db->get('vehicules');
            return $query->result_array();
        }

        $query = $this->db->get_where('vehicules', array('vehicule_id' => $vehicule_id));
        return $query->row_array();
    }

}
