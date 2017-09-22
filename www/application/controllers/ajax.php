<?php
/*
 * Fonctions appélées par ajax.
 * Les résultats sont en format JSON.
 * @author Alessandro Souza Lemos
 */

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // TODO : vérifier si la requête est venue d'un client logué.
        // Utiliser TOKEN ???
    }

    /**
     * Vérifie si un véhicule est disponible pour location dans une période
     * @param int $vehicule_id
     * @param string $date_debut
     * @param string $date_fin
     * @return json
     * @author Alessandro Souza Lemos
     */
    public function disponibiliteParDate($vehicule_id = 0, $date_debut = NULL, $date_fin = NULL) {
        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        $disp = FALSE;
        $nb_jours = 0;
        $prix_total = 0;
        if ($vehicule) {
            $disp = $this->vehicule_model->disponibiliteParDate($vehicule_id, $date_debut, $date_fin);
            if ($disp) {
                $prix_total = ELocation::calculerPrixTotal($vehicule->getPrix(), $date_debut, $date_fin, $nb_jours);
            }
        }
        echo json_encode([
            'disponible' => $disp,
            'nb_jours' => $nb_jours,
            'prix_total' => $prix_total
            ]);
    }

    /**
     * Trouve les modèles par la marque
     * @param int $marque_id
     * @return json
     * @author Alessandro Souza Lemos
     */
    public function modelesByMarque($marque_id = 0) {
        echo json_encode(
                $this->modele_model->getModelesByMarqueId($marque_id)
                );
    }

    /**
     * Récupère la liste de villes d'une province
     * @param int $province_id
     * @return json
     * @author Alessandro Souza Lemos
     */
    public function villesByProvince($province_id = 0) {
        $this->load->model('arrondissement_model');
        echo json_encode(
                $this->arrondissement_model->getVillesByProvinceId($province_id)
                );
    }

    /**
     * Récupère la liste d'arrondissements par la ville
     * @param int $ville_id
     * @return json
     * @author Alessandro Souza Lemos
     */
    public function arrondByVille($ville_id = 0) {
        $this->load->model('arrondissement_model');
        echo json_encode(
                $this->arrondissement_model->getArrondissementsByVilleId($ville_id)
                );
    }

    /**
     * Approuve une réservation
     * @param int $location_id
     * @return json indique le succès de l'opération
     * @author Alessandro Souza Lemos
     */
    public function approuverReservation($location_id = 0) {
        $this->load->model('location_model');
        echo json_encode([
                'success' => $this->location_model->approuverReservation($location_id)
                ]);
    }

    /**
     * Refuse une réservation
     * @param int $location_id
     * @return json indique le succès de l'opération
     * @author Alessandro Souza Lemos
     */
    public function refuserReservation($location_id = 0) {
        $this->load->model('location_model');
        echo json_encode([
                'success' => $this->location_model->refuserReservation($location_id)
                ]);
    }

    /**
     * Approuve un nouveau membre
     * @param int $user_id
     * @return json indique le succès de l'opération
     * @author Alessandro Souza Lemos
     */
    public function approuverMembre($user_id = 0) {
        echo json_encode([
                'success' => $this->usager_model->approuverMembre($user_id)
                ]);
    }

    /**
     * Refuse un membre
     * @param int $user_id
     * @return json indique le succès de l'opération
     * @author Alessandro Souza Lemos
     */
    public function refuserMembre($user_id = 0) {
        echo json_encode([
                'success' => $this->usager_model->refuserMembre($user_id)
                ]);
    }

    public function approuverVehicule($vehicule_id = 0) {
        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        echo json_encode([
            'success' => $vehicule && $this->vehicule_model->autoriserVehicule($vehicule)
        ]);
    }

    public function refuserVehicule($vehicule_id = 0) {
        $vehicule = $this->vehicule_model->getVehiculeById($vehicule_id);
        echo json_encode([
            'success' => $vehicule && $this->vehicule_model->refuserVehicule($vehicule)
        ]);
    }
}
