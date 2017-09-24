<?php
/*
 * Interface de la class EDisponibilite
 * @author : Alessandro Lemos
 */

interface IDisponibilite {

    public function getId();

    public function setVehicule(IVehicule $vehicule);
    public function getVehiculeId();
    public function getVehicule();

    public function setDateDebut($date_debut);
    public function getDateDebut();

    public function setDateFin($date_fin);
    public function getDateFin();

    public function toString();
}
