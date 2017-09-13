<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EModele implements IModele {

    private $_modele_id;
    private $_nom_modele;
    private $_marque = NULL; // Objet EMarque

    public function __construct(array $data) {
        $this->_modele_id = $data['modele_id'];
        $this->_nom_modele = $data['nom_modele'];
    }

    public function getId() {
        return $this->_modele_id;
    }

    public function setMarque(IMarque $marque) {
        $this->_marque = $marque;
    }

    public function getMarque() {
        return $this->_marque;
    }

    public function setNom($nom_modele) {
        $this->_nom_modele = $nom_modele;
    }

    public function getNom() {
        return $this->_nom_modele;
    }
}
