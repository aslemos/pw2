<?php
/*
 *
 *
 *
 */

class Location_model extends CI_Model {

    public function __construct() {

        $this->load->database();
    }

    public function get_locations($location_id = NULL) {

        $this->db->order_by('location_id', 'DESC');
        $this->db->join('usagers', 'locations.locataire_id = usagers.user_id');
        $this->db->join('vehicules', 'locations.vehicule_id = vehicules.vehicule_id');
        $this->db->join('modeles', 'modeles.modele_id = vehicules.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');

        if ($location_id == NULL) {
            $query = $this->db->get('locations');
            return $query->result_array();
        }

        $query = $this->db->get_where('locations', array('locations.location_id' => $location_id));
        return $query->row_array();
    }



    public function create_location($data) {
//        $data = array(
//            'date_debut' => $this->input->post('date_debut'),
//            'date_fin' => $this->input->post('date_fin'),
//            'user_id' => $this->session->userdata('user_id'),
//            'vehicule_id' => $this->input->post('vehicule_id'),
//            'paiement_id' => $this->input->post('paiement_id')
//        );
        $this->db->insert('locations', $data);
    }




    public function delete_location($location_id) {

        $this->db->where('location_id', $location_id);

        $this->db->delete('locations');

        return true;
    }

    public function update_location(ILocation $location) {

        $this->db->where('location_id', $location->getId());

        return $this->db->update('locations', [
            'date_debut' => $location->getDateDebut(),
            'date_fin' => $location->getDateFin(),
            'locataire_id' => $location->getLocataire()->getId(),
            'vehicule_id' => $location->getVehicule()->getId()
        ]);
    }

    public function get_locations_by_dates($date_debut, $date_fin) {

        $this->db->order_by('locations.location_id', 'DESC');

        $query = $this->db->get_where('locations', array(
            'locations.date_debut' => $date_debut,
            'locations.date_fin' => $date_fin)
        );

        return $query->result_array();
    }

    public function get_locations_by_vehicule($vehicule_id) {

        $this->db->order_by('locations.location_id', 'DESC');

        $query = $this->db->get_where('locations', array('locations.vehicule_id' => $vehicule_id));

        return $query->result_array();
    }

    /**
     * Retourne un objet de location par son ID
     * @param int $location_id
     * @return ELocation
     */
    public function getLocationById($location_id) {
        $data = $this->get_locations($location_id);
        if (count($data) > 0) {
            return $this->getInstanceLocationByData($data);
        }
        return NULL;
    }

    /**
     * Récupère les demandes de réservation adressées à l'usager<br>
     * passé en paramètre
     * @param IUsager $user
     */
    public function getDemandesByUser(IUsager $user, $etat = NULL) {

        $this->db->where('vehicules.proprietaire_id', $user->getId());
        if ($etat) {
            $this->db->where('locations.etat_reservation', $etat);
        }
        $this->db->order_by('locations.location_id', 'DESC');
        $this->db->join('vehicules', 'vehicules.vehicule_id = locations.vehicule_id');
        $this->db->join('modeles', 'modeles.modele_id = vehicules.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('usagers', 'usagers.user_id = locations.locataire_id');

        $query = $this->db->get('locations');
        $result = $query->result_array();
        foreach($result as $pos => $data) {
            $result[$pos] = $this->getInstanceLocationByData($data);
        }
        return $result;
    }

    /**
     * Retourne une instance de ELocation en utilisant les données d'une requête
     * @param array $data
     * @return ELocation
     */
    public static function getInstanceLocationByData($data) {
        $vehicule = new EVehicule($data);
        $vehicule->setModele(new EModele($data));
        $vehicule->setMarque(new EMarque($data));
        //
        $locataire = new EUsager($data);
        //
        $location = new ELocation($data);
        $location->setVehicule($vehicule);
        $location->setLocataire($locataire);
        return $location;
    }

    /**
     * Récupère les locations effectuées par l'usager passé en paramètre
     * @param EUsager $user
     * @return array
     */
    public function getLocationsByUser(IUsager $user) {

        $this->db->order_by('locations.location_id', 'DESC');
        $this->db->join('vehicules', 'vehicules.vehicule_id = locations.vehicule_id');
        $this->db->join('modeles', 'modeles.modele_id = vehicules.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('usagers', 'usagers.user_id = vehicules.proprietaire_id');

        $query = $this->db->get_where('locations', ['locations.locataire_id' => $user->getId()]);
        $result = $query->result_array();
        foreach($result as $pos => $data) {
            $result[$pos] = $this->getInstanceLocationByData($data);
        }
        return $result;
    }

    /**
     * Récupère les locations des véhicules d'un propriétaire
     * @param EUsager $proprietaire l'usager cherchant l'historique de location de ses véhicules
     * @return array
     */
    public function getLocatairesByUser(IUsager $proprietaire) {

        $this->db->order_by('locations.location_id', 'DESC');
        $this->db->where([
            'vehicules.proprietaire_id' => $proprietaire->getId(),
            'locations.etat_reservation !=' => ELocation::LOCATION_EN_ATTENTE
        ]);
        $this->db->join('vehicules', 'locations.vehicule_id = vehicules.vehicule_id');
        $this->db->join('modeles', 'modeles.modele_id = vehicules.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('usagers', 'usagers.user_id = locations.locataire_id');

        $query = $this->db->get('locations');
        $result = $query->result_array();
        foreach($result as $pos => $data) {
            $result[$pos] = $this->getInstanceLocationByData($data);
        }
        return $result;
    }

    public function get_paiements() {
        $this->db->order_by('paiement_id', 'DESC');
        $query = $this->db->get_where('paiements', array('paiements.user_id' => $user_id));
        return $query->result_array();
    }

    public function create_payement($data2) {
        $this->db->set('date_paiement', 'NOW()', FALSE);
        $this->db->insert('paiements', $data2);
    }





    /**
     * Approuve une demande de réservation
     * @param int $reservation_id L'identifiant de la réservation
     * @return bool
     */
    public function approuverReservation($reservation_id) {
        $this->db->where('location_id', $reservation_id);
        $this->db->where('etat_reservation', ELocation::LOCATION_EN_ATTENTE);
        return $this->db->update('locations', ['etat_reservation' => ELocation::LOCATION_ACCEPTE]);
    }

    /**
     * Refuse une demande de réservation
     * @param int $reservation_id L'identifiant de la réservation
     * @return bool
     */
    public function refuserReservation($reservation_id) {
        $this->db->where('location_id', $reservation_id);
        $this->db->where('etat_reservation', ELocation::LOCATION_EN_ATTENTE);
        return $this->db->update('locations', ['etat_reservation' => ELocation::LOCATION_NON_ACCEPTE]);
    }

}
