<?php
/*
 * Interface de la classe ECarburant
 * @author Alessandro Lemos
 */

interface ICarburant {

    public function getId();

    public function getNom();
    public function setNom($nom_carburant);
}

