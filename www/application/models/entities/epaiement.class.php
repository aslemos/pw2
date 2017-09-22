<?php
/*
 * Classe EPaiement qui répresente un paiement d'une location
 * @author Alessandro Souza Lemos
 */

class EPaiement implements IPaiement {

    private $_paiement_id;
    private $_user_id;
    private $_date_paiement;
    private $_location_id;
    private $_montant;

    public function __construct(array $data) {
        $this->setId($data['paiement_id']);
        $this->setDatePaiement($data['date_paiement']);
        $this->setLocationId($data['location_id']);
        $this->setMontant($data['montant']);
    }

    public function getId() {
        return $this->_paiement_id;
    }
    public function setId($paiement_id) {
        $this->_paiement_id = $paiement_id;
        return $this;
    }

    public function getDatePaiement() {
        return $this->_date_paiement;
    }
    public function setDatePaiement($date_paiement) {
        $this->_date_paiement = $date_paiement;
        return $this;
    }

    public function getLocationId() {
        return $this->_location_id;
    }
    public function setLocationId($location_id) {
        $this->_location_id = $location_id;
        return $this;
    }

    public function getMontant() {
        return $this->_montant;
    }
    public function setMontant($montant) {
        $this->_montant = $montant;
        return $this;
    }
}
