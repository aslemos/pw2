<?php
/*
 * Fonctions appélées par ajax.
 * @author Alessandro Souza Lemos
 */

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // TODO : vérifier si la requête est venue d'un client logué. Utiliser TOKEN ???
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
     * @param type $marque_id
     * @return json
     * @author Alessandro Souza Lemos
     */
    public function modelesByMarque($marque_id) {
        echo json_encode(
                $this->modele_model->getModelesByMarqueId($marque_id)
                );
    }
}
