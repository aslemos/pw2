<?php
/*
 * Interface de la classe ELocation
 * @author Alessandro Lemos
 */

interface ILocation {

    public function getId();

    public function getDateDebut();
    public function setDateDebut($date_debut);

    public function getDateFin();
    public function setDateFin($date_fin);

    public function getLocataire();
    public function setLocataire(IUsager $locataire);

    public function getVehicule();
    public function setVehicule(IVehicule $vehicule);

    public function getPrixTotal();

    public function toString();

    public static function getDescriptionEtat($etat_reservation);

    public static function calculerPrixTotal($prix, $date_debut, $date_fin, &$nb_jours);
}
