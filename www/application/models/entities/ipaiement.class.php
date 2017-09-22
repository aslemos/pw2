<?php
/*
 * Interface de la classe EPaiement
 * @author Alessandro Souza Lemos
 */

interface IPaiement {

    public function getId();
    public function setId($paiement_id);

    public function getLocationId();
    public function setLocationId($location_id);

    public function getDatePaiement();
    public function setDatePaiement($date_paiement);

    public function getMontant();
    public function setMontant($montant);
}
