<?php
/*
 * Interface de l'anrrondissement
 * @author : Alessandro Lemos
 */

interface IArrondissement {

    public function getArrondId();

    public function getNomArrond();
    public function setNomArrond($nom_arr);

    public function getVille();
    public function setVille(IVille $ville);
}
