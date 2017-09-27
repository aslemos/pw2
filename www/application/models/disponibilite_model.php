<?php
/*
 * Modèle de la table Disponibilités.
 * S'il y a un enregistrement dans cette table, c'est-à-dire que le véhicule peut être réservé.
 */

class Disponibilite_model extends CI_Model {

    /**
     * Insère une disponibilité
     * @param IDisponibilite $disponibilite La disponibilité à insérer
     * @return type bool
     * @throws Exception
     */
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
        if (!empty($data)) {
            $disp = new EDisponibilite($data);

            // crée l'objet EVehicule
            $vehicule = $this->vehicule_model->getVehiculeById($data['vehicule_id']);
            $disp->setVehicule($vehicule);
            return $disp;
        }
        return NULL;
    }

    /**
     * Trouve les disponibilités d'un véhicule donné
     * @param int $vehicule_id
     * @return array
     */
    public function get_disponibilites($vehicule_id) {

        $this->db->order_by('disponibilites.date_debut');
        $query = $this->db->get_where('disponibilites', array('vehicule_id' => $vehicule_id));

        return $query->result_array();
    }
}
