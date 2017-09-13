<?php
/*
 * Interface de modèle de voiture (lié à la marque)
 * @author : Alessandro Lemos
 */

interface IModele {

    public function getId();

    public function setNom($nom_modele);

    public function getNom();

    public function setMarque(IMarque $marque);

    public function getMarque();
}
