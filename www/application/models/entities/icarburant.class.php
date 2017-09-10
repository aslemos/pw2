<?php
/*
 * Interface de la classe ECarburant
 * @author Alessandro Lemos
 */

interface ICarburant {

    public function getCarburantId();

    public function getNomCarburant();
    public function setNomCarburant($nom_carburant);
}

