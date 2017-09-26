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

        if ($location_id === NULL) {
            $query = $this->db->get('locations');
            return $query->result_array();
        }

        $query = $this->db->get_where('locations', array('locations.location_id' => $location_id));
        return $query->row_array();
    }



    public function create_location($data) {
        $this->db->insert('locations', $data);
    }




    public function delete_location($location_id) {

        $this->db->where('location_id', $location_id);

        return $this->db->delete('locations');
    }

    public function update_location(ILocation $location) {

        $this->db->where('location_id', $location->getId());

        return $this->db->update('locations', [
            'date_debut' => $location->getDateDebut(),
            'date_fin' => $location->getDateFin(),
            'locataire_id' => $location->getLocataire()->getId(),
            'vehicule_id' => $location->getVehicule()->getId(),
            'etat_reservation' => $location->getEtat()
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
            $location = $this->getInstanceLocationByData($data);
            return $location;
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
    private function getInstanceLocationByData($data) {
        $vehicule = new EVehicule($data);
        $vehicule->setModele(new EModele($data));
        $vehicule->setMarque(new EMarque($data));
        //
        $locataire = new EUsager($data);
        //
        $location = new ELocation($data);
        $location->setVehicule($vehicule);
        $location->setLocataire($locataire);

        // trouve les paiements
        $query = $this->db->get_where('paiements', ['location_id' => $location->getId()]);
        $result = $query->result_array();
        foreach ($result as $data) {
            $location->addPaiement(new EPaiement($data));
        }
        return $location;
    }

    /**
     * Récupère les locations effectuées par l'usager passé en paramètre
     * @param EUsager $user
     * @param array $recherche Paramètres à utiliser dans la recherche
     * @return array
     */
    public function getLocationsByUser(IUsager $user, array $recherche = NULL) {

        $this->db->order_by('locations.location_id', 'DESC');
        $this->db->where('locations.locataire_id', $user->getId());
        if (is_array($recherche)) {
            if (isset($recherche['vehicule_id']) && $recherche['vehicule_id'] > 0) {
                $this->db->where('locations.vehicule_id =', $recherche['vehicule_id']);
            }
            if (isset($recherche['date_debut']) && $recherche['date_debut']) {
                $this->db->where('locations.date_debut >=', $recherche['date_debut']);
            }
            if (isset($recherche['date_fin']) && $recherche['date_fin']) {
                $this->db->where('locations.date_debut <=', $recherche['date_fin']);
            }
        }
        $this->db->join('vehicules', 'vehicules.vehicule_id = locations.vehicule_id');
        $this->db->join('modeles', 'modeles.modele_id = vehicules.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('usagers', 'usagers.user_id = vehicules.proprietaire_id');

        $query = $this->db->get('locations');
        $result = $query->result_array();
        foreach($result as $pos => $data) {
            $result[$pos] = $this->getInstanceLocationByData($data);
        }
        return $result;
    }

    /**
     * Récupère les locations des véhicules d'un propriétaire
     * @param EUsager $proprietaire l'usager cherchant l'historique de location de ses véhicules
     * @param array $recherche Paramètres à utiliser dans la recherche
     * @return array
     */
    public function getLocatairesByUser(IUsager $proprietaire, array $recherche = NULL) {

        $this->db->order_by('locations.location_id', 'DESC');
        $this->db->where([
            'vehicules.proprietaire_id' => $proprietaire->getId(),
            'locations.etat_reservation !=' => ELocation::LOCATION_EN_ATTENTE
        ]);
        if (is_array($recherche)) {
            if (isset($recherche['locataire_id']) && $recherche['locataire_id'] > 0) {
                $this->db->where('locations.locataire_id =', $recherche['locataire_id']);
            }
            if (isset($recherche['date_debut']) && $recherche['date_debut']) {
                $this->db->where('locations.date_debut >=', $recherche['date_debut']);
            }
            if (isset($recherche['date_fin']) && $recherche['date_fin']) {
                $this->db->where('locations.date_debut <=', $recherche['date_fin']);
            }
        }
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

    public function get_paiements($user_id) {
        $this->db->order_by('paiement_id', 'DESC');
        $query = $this->db->get_where('paiements', array('paiements.user_id' => $user_id));
        return $query->result_array();
    }


    /**
     * Enregistre un paiement et met à jour l'état de la location
     * @param array $data
     */
    public function create_payement($data) {
        $this->db->set('date_paiement', 'NOW()', FALSE);
        $this->db->insert('paiements', $data);

        // On vérifie si le montant payé atteint le prix de la location.
        // Dans ce cas, on dit qu'elle est payée.
        $location = $this->getLocationById($data['location_id']);
        if ($location->getTotalPaye() >= $location->getPrixTotal()) {
            $location->setEtat(ELocation::LOCATION_PAYE);
            $this->update_location($location);
        }
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
        return $this->db->update('locations', ['etat_reservation' => ELocation::LOCATION_REFUSE]);
    }

}
