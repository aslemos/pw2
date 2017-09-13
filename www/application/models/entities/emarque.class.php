<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EMarque implements IMarque {

    private $_marque_id;
    private $_nom_marque;

    public function __construct(array $data) {
        $this->_marque_id = $data['marque_id'];
        $this->setNom($data['nom_marque']);
    }

    public function getId() {
        return $this->_marque_id;
    }

    public function setNom($nom_marque) {
        $this->_nom_marque = $nom_marque;
    }

    public function getNom() {
        return $this->_nom_marque;
    }
}
