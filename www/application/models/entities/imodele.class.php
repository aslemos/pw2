<?php
/*
 * Interface de modèle de voiture (lié à la marque)
 * @author : Alessandro Lemos
 */

interface IModele {

    public function setNomModele($nom_modele);

    public function getNomModele();

    public function setMarque(IMarque $marque);

    public function getMarque();
}
