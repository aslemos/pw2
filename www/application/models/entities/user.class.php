<?php

class User implements IUsager {

    private $user_id;   // ID
    private $role_id;   // FK roles
    private $prenom;
    private $nom;
    private $permis_conduire;
    private $adresse;
    private $ville_id;
    private $code_postal;
    private $telephone;
    private $courriel;
    private $date_adhesion;
    private $user_photo;
    private $username;
    private $mdp;

    public function __construct(array $user = NULL) {
        if ($user !== NULL) {
            $this->setUserId($user['user_id']);
            $this->setUsername($user['username']);
            $this->setMdp($user['motdepasse']);
            $this->setPrenom($user['prenom']);
            $this->setNom($user['nom']);
            $this->setPermisConduire($user['permis_conduire']);
            $this->setAdresse($user['adresse']);
            $this->setVilleId($user['ville_id']);
            $this->setCodePostal($user['code_postal']);
            $this->setTelephone($user['telephone']);
            $this->setCourriel($user['courriel']);
            $this->setDateAdhesion($user['date_adhesion']);
            $this->setUserPhoto($user['user_photo']);
            $this->setRoleId($user['role_id']);
        }
    }

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

    public function getVilleId() {
        return $this->ville_id;
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

    public function getDateAdhesion() {
        return $this->date_adhesion;
    }

    public function getUserPhoto() {
        return $this->user_photo;
    }

    public function getUsername() {
        return $this->username;
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

    public function setVilleId($ville_id) {
        $this->ville_id = $ville_id;
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

    public function setDateAdhesion($date_adhesion) {
        $this->date_adhesion = $date_adhesion;
        return $this;
    }

    public function setUserPhoto($user_photo) {
        $this->user_photo = $user_photo;
        return $this;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }
}
