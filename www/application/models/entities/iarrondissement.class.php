<?php
/*
 * Interface de l'anrrondissement
 * @author : Alessandro Lemos
 */

interface IArrondissement {

    public function getId();

    public function getNom();
    public function setNom($nom_arr);

    public function getVille();
    public function setVille(IVille $ville);
}
