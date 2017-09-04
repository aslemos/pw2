<?php

class Usager implements IUsager {

    private $user_id;   // ID
    private $role_id;   // FK roles

    private $prenom;
    private $nom;
    private $permis_conduire;
    private $adresse;
    private $ville;
    private $code_postal;
    private $telephone;
    private $courriel;
    private $mdp;

    public function getUserId() {
        return $this->user_id;
    }

    public function getRoleId() {
        return $this->role_id;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPermisConduire() {
        return $this->permis_conduire;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getCodePostal() {
        return $this->code_postal;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getCourriel() {
        return $this->courriel;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setUserId($membre_id) {
        $this->user_id = $membre_id;
    }

    public function setRoleId($role_id) {
        $this->role_id = $role_id;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPermisConduire($permis_conduire) {
        $this->permis_conduire = $permis_conduire;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setCodePostal($code_postal) {
        $this->code_postal = $code_postal;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setCourriel($courriel) {
        $this->courriel = $courriel;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }
}
