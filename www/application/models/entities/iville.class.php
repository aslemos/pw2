<?php
/*
 * Interface de la classe EVille
 * @author Alessandro Lemos
 */

interface IVille {

    public function getVilleId();

    public function getNomVille();
    public function setNomVille($nom_ville);

    public function getProvince();
    public function setProvince($province);
}
