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

    public function rechercherVehicules(ERecherche $recherche) {


        return $this->getVehicules();
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
        $query = $this->db->get_where('disponibilites', 'vehicule_id = ' . $vehicule->getVehiculeId());
        foreach ($query->result() as $arr_disp) {
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

        $this->db->where('vehicule_id', $vehicule->getVehiculeId());
        return $this->db->update('vehicules', [
            'proprietaire_id' => $vehicule->getProprietaire()->getProprieraireId(),
            'modele_id' => $vehicule->getModele()->getModeleId(),
            'carburant_id' => $vehicule->getCarburant()->getCarburantId(),
            'transmission_id' => $vehicule->getTransmission()->getTransmissionId(),
            'type_id' => $vehicule->getType()->getTypeId(),
            'arr_id' => $vehicule->getArrond()->getArrondId(),
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

        $query = $this->db->get_where('vehicules', array('usagers.user_id' => $user->getUserId()));

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

    public function getCarburants() {

        $this->db->order_by('nom_carburant');

        $query = $this->db->get('carburants');

        return $query->result_array();
    }

    public function getTransmissions() {

        $this->db->order_by('nom_transmission');

        $query = $this->db->get('transmissions');

        return $query->result_array();
    }
}
