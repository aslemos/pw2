<?php
/*
 * Class Disponibilité
 * Réprésente une période où un véhicule est disponible
 * @author Alessandro Lemos
 */

class EDisponibilite extends IDisponibilite {

    private $dispo_id;
    private $vehicule_id;
    private $date_debut;
    private $date_fin;
    private $vehicule = NULL; // Objet EVehicule

    public function __construct(array $data = NULL) {
        if ($data !== NULL) {
            $this->setDispoId(isset($data['dispo_id']) ? $data['dispo_id'] : 0);
            $this->setVehiculeId(isset($data['vehicule_id']) ? $data['vehicule_id'] : 0);
            $this->setDateDebut($data['date_debut']);
            $this->setDateFin($data['date_fin']);
            
            if (isset($data['vehicule']) && $data['vehicule'] instanceof EVehicule) {
                $this->vehicule = $data['vehicule'];
            }

        }
    }

    public function getDispoId() {
        return $this->dispo_id;
    }

    public function getVehiculeId() {
        return $this->vehicule_id;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function setDispoId($dispo_id) {
        $this->dispo_id = $dispo_id;
        return $this;
    }

    public function setVehiculeId($vehicule_id) {
        $this->vehicule_id = $vehicule_id;
        return $this;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
        return $this;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
        return $this;
    }
}
