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
    public function disponibiliteParDate($vehicule_id, $date_debut, $date_fin) {
        $disp = $this->vehicule_model->disponibiliteParDate($vehicule_id, $date_debut, $date_fin);
        echo json_encode(['disponible' => $disp]);
    }

    /**
     * Trouve les modèles par la marque
     * @param int $marque_id
     * @return json
     * @author Alessandro Souza Lemos
     */
    public function modelesByMarque($marque_id) {
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
    public function villesByProvince($province_id) {
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
    public function arrondByVille($ville_id) {
        $this->load->model('arrondissement_model');
        echo json_encode(
                $this->arrondissement_model->getArrondissementsByVilleId($ville_id)
                );
    }
}
