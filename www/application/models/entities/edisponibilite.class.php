<?php
/*
 * Class Disponibilité
 * Réprésente une période où un véhicule est disponible
 * @author Alessandro Lemos
 */

class EDisponibilite implements IDisponibilite {

    private $_dispo_id;
    private $_vehicule_id;
    private $_date_debut;
    private $_date_fin;
    private $_vehicule = NULL; // Objet EVehicule

    public function __construct(array $data = NULL) {
        if ($data !== NULL) {
            $this->setDispoId(isset($data['dispo_id']) ? $data['dispo_id'] : 0);
            $this->setVehiculeId(isset($data['vehicule_id']) ? $data['vehicule_id'] : 0);
            $this->setDateDebut($data['date_debut']);
            $this->setDateFin($data['date_fin']);

            if (isset($data['vehicule']) && $data['vehicule'] instanceof EVehicule) {
                $this->_vehicule = $data['vehicule'];
                $this->_vehicule_id = $data['vehicule']->getId();
            }

        }
    }

    public function getId() {
        return $this->_dispo_id;
    }

    public function getVehiculeId() {
        if ($this->_vehicule) {
            return $this->_vehicule->getId();
        }
        return NULL;
    }

    public function getVehicule() {
        return $this->_vehicule;
    }

    public function setVehicule(IVehicule $vehicule) {
        $this->_vehicule = $vehicule;
    }

    public function getDateDebut() {
        return $this->_date_debut;
    }

    public function getDateFin() {
        return $this->_date_fin;
    }

    public function setDispoId($dispo_id) {
        $this->_dispo_id = $dispo_id;
        return $this;
    }

    public function setVehiculeId($vehicule_id) {
        $this->_vehicule_id = $vehicule_id;
        return $this;
    }

    public function setDateDebut($date_debut) {
        $this->_date_debut = $date_debut;
        return $this;
    }

    public function setDateFin($date_fin) {
        $this->_date_fin = $date_fin;
        return $this;
    }

    public function toString() {
        return 'de ' . $this->_date_debut . ' à ' . $this->_date_fin;
    }
}
