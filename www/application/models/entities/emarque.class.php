<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EMarque implements IMarque {

    private $marque_id;
    private $nom_marque;

    public function __construct(array $data) {
        $this->marque_id = $data['marque_id'];
        $this->setNomMarque($data['nom_marque']);
    }

    public function setNomMarque($nom_marque) {
        $this->nom_marque = $nom_marque;
    }

    public function getNomMarque() {
        return $this->nom_marque;
    }
}
