<?php
/*
 *
 *
 *
 */

class Vehicule_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Cherche les véhicules ACTIFS disponibles dans la période demandé par la recherche
     * @param ERecherche $recherche
     * @return array<EVehicule>
     */
    public function rechercherVehicules(ERecherche $recherche) {

        /*
         * Crée la sub-requête utilisée dans le NOT IN()
         *  qui trouve les locations existantes dans la période de location demandé
         */
        $this->db->select('locations.vehicule_id');
        $this->db->from('locations');

        // Trouve la date de DÉBUT dans une réservation existante
        $this->db->where('locations.vehicule_id = disponibilites.vehicule_id');
        $this->db->where('locations.date_debut <=', $recherche->getDateDebut());
        $this->db->where('locations.date_fin >=', $recherche->getDateDebut());

        // Trouve la date de FIN dans une réservation existante
        $this->db->or_where('locations.vehicule_id = disponibilites.vehicule_id');
        $this->db->where('locations.date_debut <=', $recherche->getDateFin());
        $this->db->where('locations.date_fin >=', $recherche->getDateFin());

        // Trouve une réservation entre une date de DÉBUT et FIN
        $this->db->or_where('locations.vehicule_id = disponibilites.vehicule_id');
        $this->db->where('locations.date_debut >=', $recherche->getDateDebut());
        $this->db->where('locations.date_fin <=', $recherche->getDateFin());
        $query_reservations_existantes = $this->db->get_compiled_select();

        /*
         * Jointure
         */
        $this->db->from('disponibilites');
        $this->db->join('vehicules', 'vehicules.vehicule_id = disponibilites.vehicule_id');
        $this->db->join('usagers', 'usagers.user_id = vehicules.proprietaire_id');
        $this->db->join('type_vehicules', 'vehicules.type_id = type_vehicules.type_id');
        $this->db->join('modeles', 'vehicules.modele_id = modeles.modele_id');
        $this->db->join('marques', 'modeles.marque_id = marques.marque_id');
        $this->db->join('carburants', 'vehicules.carburant_id = carburants.carburant_id');
        $this->db->join('transmissions', 'vehicules.transmission_id = transmissions.transmission_id');
        $this->db->join('arrondissements', 'vehicules.arr_id = arrondissements.arr_id');
        $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');

        /*
         * Règles de la location :
         */

        // - on ne considère que les véhicules actifs
        $this->db->where('vehicules.etat', EVehicule::ETAT_ACTIF);

        // - la demande doit être dans une période disponibilisé par le proprietaire
        $this->db->where('disponibilites.date_debut <=', $recherche->getDateDebut());
        $this->db->where('disponibilites.date_fin >=', $recherche->getDateFin());

        // - on ne doit pas avoir de collisions de réservation
        $this->db->where_not_in('disponibilites.vehicule_id ', $query_reservations_existantes, FALSE);

        /*
         * Caractéristiques des véhicules cherchés, optionneles
         */

        if ($recherche->getAnnee()) {
            $this->db->where('vehicules.annee', $recherche->getAnnee());
        }

        if ($recherche->getCarburantId()) {
            $this->db->where('vehicules.carburant_id', $recherche->getCarburantId());
        }

        if ($recherche->getTypeId()) {
            $this->db->where('vehicules.type_id', $recherche->getTypeId());
        }

        if ($recherche->getArrondId()) {
            $this->db->where('vehicules.arr_id', $recherche->getArrondId());
        }

        if ($recherche->getModeleId()) {
            $this->db->where('vehicules.modele_id', $recherche->getModeleId());

        } else if ($recherche->getMarqueId()) {
            $this->db->where('modeles.marque_id', $recherche->getMarqueId());
        }

        if ($recherche->getNbPlaces()) {
            $this->db->where('vehicules.nbre_places', $recherche->getNbPlaces());
        }

        if ($recherche->getPrixMin()) {
            $this->db->where('vehicules.prix >=', $recherche->getPrixMin());
        }

        if ($recherche->getPrixMax()) {
            $this->db->where('vehicules.prix <=', $recherche->getPrixMax());
        }

        if ($recherche->getTransmissionId()) {
            $this->db->where('vehicules.transmission_id', $recherche->getTransmissionId());
        }

        // Instantiation des objets EVehicule dans le résultat
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $pos => $arr_vehicule) {
            $result[$pos] = $this->getVehiculeByArray($arr_vehicule);
        }
        return $result;
    }

    /**
     * Trouve un véhicule, y compris ses disponibilités
     * @param int $vehicule_id L'identifiant du véhicule
     * @return EVehicule
     * @author Alessandro Lemos
     */
    public function getVehiculeById($vehicule_id) {

        // Véhicule
        $arr_vehicule = $this->getVehicules($vehicule_id);
        return $this->getVehiculeByArray($arr_vehicule);
    }

    public function getVehiculeByArray($arr_vehicule) {

        $vehicule = new EVehicule($arr_vehicule);

        // Proprietaire
        $vehicule->setProprietaire(new EUsager($arr_vehicule));

        // Modèle
        $vehicule->setModele(new EModele($arr_vehicule));

        // Marque
        $vehicule->getModele()->setMarque(new EMarque($arr_vehicule));

        // Type
        $vehicule->setType(new ETypeVehicule($arr_vehicule));

        // Arrondissement
        $vehicule->setArrond(new EArrondissement($arr_vehicule));

        // Ville
        $vehicule->getArrond()->setVille(new EVille($arr_vehicule));

        // Transmission
        $vehicule->setTransmission(new ETransmission($arr_vehicule));

        // Carburant
        $vehicule->setCarburant(new ECarburant($arr_vehicule));

        // Trouve les disponibilités du véchicule
        $this->db->order_by('dispo_id');
        $query = $this->db->get_where('disponibilites', 'vehicule_id = ' . $vehicule->getId());
        foreach ($query->result_array() as $arr_disp) {
            $vehicule->addDisponibilite(new EDisponibilite($arr_disp));
        }

        return $vehicule;
    }

    public function getVehicules($vehicule_id = NULL) {

        $this->db->order_by('vehicule_id', 'DESC');

        $this->db->join('usagers', 'vehicules.proprietaire_id = usagers.user_id');
        $this->db->join('type_vehicules', 'vehicules.type_id = type_vehicules.type_id');
        $this->db->join('modeles', 'vehicules.modele_id = modeles.modele_id');
        $this->db->join('marques', 'modeles.marque_id = marques.marque_id');
        $this->db->join('carburants', 'vehicules.carburant_id = carburants.carburant_id');
        $this->db->join('transmissions', 'vehicules.transmission_id = transmissions.transmission_id');
        $this->db->join('arrondissements', 'vehicules.arr_id = arrondissements.arr_id');
        $this->db->join('villes', 'villes.ville_id = arrondissements.ville_id');

        if ($vehicule_id == NULL) {
            $query = $this->db->get('vehicules');
            return $query->result_array();
        }

        $query = $this->db->get_where('vehicules', array('vehicule_id' => $vehicule_id));
        return $query->row_array();
    }

    /**
     * Insère une voiture et la la période de sa première disponibilité
     * @param EVehicule $vehicule Le véhicule à insérer
     * @return int L'identifiant de la voiture insérée
     */
    public function createVehicule(EVehicule $vehicule) { // addVehicule
        // insère le véhicule en récuperant les données de l'objet
        $this->db->insert('vehicules', [
            'proprietaire_id' => $vehicule->getProprieraireId(),
            'matricule' => $vehicule->getMatricule(),
            'annee' => $vehicule->getAnnee(),
            'nbre_places' => $vehicule->getNbPlaces(),
            'prix' => $vehicule->getPrix(),
            'vehicule_photo' => $vehicule->getPhoto(),
            'type_id' => $vehicule->getTypeId(),
            'marque_id' => $vehicule->getMarqueId(),
            'modele_id' => $vehicule->getModeleId(),
            'carburant_id' => $vehicule->getCarburantId(),
            'transmission_id' => $vehicule->getTransmissionId(),
            'arr_id' => $vehicule->getArrondId()
        ]);

        // si la voiture a bien été insérée, on procède à l'insertion de sa disponibilité
        $vehicule_id = $this->db->insert_id();
        if ($vehicule_id) {
            foreach ($vehicule->getDisponibilites() as $disponibilite) {
                $this->db->insert('disponibilites', [
                    'vehicule_id' => $vehicule_id,
                    'date_debut' => $disponibilite->getDateDebut(),
                    'date_fin' => $disponibilite->getDateFin()
                ]);
            }
        }
        return $vehicule_id;
    }

    public function deleteVehicule($vehicule_id) {

        $this->db->where('vehicule_id', $vehicule_id);

        $this->db->delete('vehicules');

        return true;
    }

    public function updateVehicule(EVehicule $vehicule) {

        $this->db->where('vehicule_id', $vehicule->getId());
        return $this->db->update('vehicules', [
            'proprietaire_id' => $vehicule->getProprietaire()->getId(),
            'modele_id' => $vehicule->getModele()->getId(),
            'carburant_id' => $vehicule->getCarburant()->getId(),
            'transmission_id' => $vehicule->getTransmission()->getId(),
            'type_id' => $vehicule->getType()->getId(),
            'arr_id' => $vehicule->getArrond()->getId(),
            'matricule' => $vehicule->getMatricule(),
            'annee' => $vehicule->getAnnee(),
            'nbre_places' => $vehicule->getNbPlaces(),
            'prix' => $vehicule->getPrix(),
            'vehicule_photo' => $vehicule->getPhoto()
        ]);
    }

    public function getVehiculesByMarqueId($marque_id) { //getVehiculesByMrque

        $this->db->order_by('vehicules.vehicule_id', 'DESC');

        $this->db->join('modeles', 'vehicules.modele_id = modeles.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');

        $query = $this->db->get_where('vehicules', array('modeles.marque_id' => $marque_id));

        return $query->result_array();
    }

    public function getVehiculesByTypeId($type_id) { //getVehiculesByType

        $this->db->order_by('vehicules.vehicule_id', 'DESC');

        $this->db->join('type_vehicules', 'vehicules.type_id = type_vehicules.type_id');

        $query = $this->db->get_where('vehicules', array('type_vehicules.type_id' => $type_id));

        return $query->result_array();
    }

    public function getVehiculesByArrId($arr_id) { //getVehiculesByArr

        $this->db->order_by('vehicules.vehicule_id', 'DESC');

        $this->db->join('arrondissements', 'vehicules.arr_id = arrondissements.arr_id');

        $query = $this->db->get_where('vehicules', array('arrondissements.arr_id' => $arr_id));

        return $query->result_array();
    }

    /**
     * Trouve les voitures qui appartiennent à un usager donné
     * @param EUsager $user
     * @return type
     */
    public function getVehiculesByUser(IUsager $user) {

        $this->db->order_by('vehicules.vehicule_id', 'DESC');

        $this->db->join('usagers', 'usagers.user_id = vehicules.proprietaire_id');
        $this->db->join('modeles', 'vehicules.modele_id = modeles.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('type_vehicules', 'vehicules.type_id = type_vehicules.type_id');
        $this->db->join('arrondissements', 'vehicules.arr_id = arrondissements.arr_id');

        $query = $this->db->get_where('vehicules', array('usagers.user_id' => $user->getId()));

        return $query->result_array();
    }

    /**
     * Trouve les véhicules qui sont en attente d'une autorisation
     */
    public function getVehiculesEnAttente() {
        $this->db->order_by('vehicules.vehicule_id', 'DESC');

        $this->db->join('usagers', 'usagers.user_id = vehicules.proprietaire_id');
        $this->db->join('modeles', 'vehicules.modele_id = modeles.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('type_vehicules', 'vehicules.type_id = type_vehicules.type_id');
        $this->db->join('arrondissements', 'vehicules.arr_id = arrondissements.arr_id');

        $query = $this->db->get_where('vehicules', array('vehicules.etat' => EVehicule::ETAT_EN_ATTENTE));

        return $query->result_array();
    }

    public function getHistoriqueByVehicule($vehicule_id) {

        $this->db->order_by('vehicules.vehicule_id', 'DESC');

        $this->db->join('usagers', 'usagers.user_id = vehicules.proprietaire_id');
        $this->db->join('modeles', 'vehicules.modele_id = modeles.modele_id');
        $this->db->join('marques', 'marques.marque_id = modeles.marque_id');
        $this->db->join('type_vehicules', 'vehicules.type_id = type_vehicules.type_id');
        $this->db->join('arrondissements', 'vehicules.arr_id = arrondissements.arr_id');
        $this->db->join('carburants', 'vehicules.carburant_id = carburants.carburant_id');
        $this->db->join('transmissions', 'vehicules.transmission_id = transmissions.transmission_id');

        $query = $this->db->get_where('vehicules', array('vehicule.vehicule_id' => $vehicule_id));

        return $query->result_array();
    }

    public function getTypesVehicules() {

        $this->db->order_by('nom_type');

        $query = $this->db->get('type_vehicules');

        return $query->result_array();
    }

    public function getCarburantById($carburant_id) {
        $data = $this->getCarburants($carburant_id);
        if (!empty($data)) {
            return new ECarburant($data);
        }
        return NULL;
    }

    public function getCarburants($carburant_id = NULL) {

        $this->db->order_by('nom_carburant');
        if ($carburant_id === NULL) {
            $query = $this->db->get('carburants');
        } else {
            $query = $this->db->get_where('carburants', ['carburant_id' => $carburant_id]);
        }

        return $query->result_array();
    }

    public function getTransmissions($transmission_id = NULL) {

        $this->db->order_by('nom_transmission');
        if ($transmission_id === NULL) {
            $query = $this->db->get('transmissions');
        } else {
            $query = $this->db->get_where('transmissions', ['transmission_id' => $transmission_id]);
        }

        return $query->result_array();
    }

    /**
     * Débloque/autorise un véhicule à être utilisé dans le système
     * @param int $vehicule_id
     */
    public function debloquerVehicule($vehicule_id) {
        $this->db->where('vehicule_id', $vehicule_id);
        return $this->db->update('vehicules', [
                    'etat' => EVehicule::ETAT_ACTIF
        ]);
    }

    /**
     * Bloque un véhicule dans le système
     * @param int $vehicule_id
     */
    public function bloquerVehicule($vehicule_id) {
         $this->db->where('vehicule_id', $vehicule_id);
          return $this->db->update('vehicules', [
                    'etat' => EVehicule::ETAT_INACTIF
        ]);

    }
}
