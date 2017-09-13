<?php
/*
 * Interface de la marque du véhicule
 * @author Alessandro Lemos
 */

interface IMarque {

    public function getId();

    public function setNom($nom_marque);

    public function getNom();
}
