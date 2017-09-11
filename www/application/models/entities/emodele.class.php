<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EModele implements IModele {

    private $modele_id;
    private $nom_modele;
    private $marque = NULL; // Objet EMarque

    public function __construct(array $data) {
        $this->modele_id = $data['modele_id'];
        $this->nom_modele = $data['nom_modele'];
    }

    public function setMarque(IMarque $marque) {
        $this->marque = $marque;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function setNomModele($nom_modele) {
        $this->nom_modele = $nom_modele;
    }

    public function getNomModele() {
        return $this->nom_modele;
    }
}
