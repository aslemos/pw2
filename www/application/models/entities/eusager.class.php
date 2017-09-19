<?php

class EUsager implements IUsager {

    const ETAT_EN_ATTENTE = -1;
    const ETAT_REFUSE = -2;
    const ETAT_INACTIF = 0;
    const ETAT_ACTIF = 1;

    private $_user_id;   // ID
    private $_role_id;   // FK roles
    private $_prenom;
    private $_nom;
    private $_permis_conduire;
    private $_adresse;
    private $_ville_id;
    private $_code_postal;
    private $_telephone;
    private $_courriel;
    private $_date_adhesion;
    private $_user_photo;
    private $_username;
    private $_mdp;
    private $_etat = -99;

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
            $this->setEtat($user['etat_usager']);
        }
    }

    public function getId() {
        return $this->_user_id;
    }

    public function getRoleId() {
        return $this->_role_id;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getPermisConduire() {
        return $this->_permis_conduire;
    }

    public function getAdresse() {
        return $this->_adresse;
    }

    public function getVilleId() {
        return $this->_ville_id;
    }

    public function getCodePostal() {
        return $this->_code_postal;
    }

    public function getTelephone() {
        return $this->_telephone;
    }

    public function getCourriel() {
        return $this->_courriel;
    }

    public function getMdp() {
        return $this->_mdp;
    }

    public function getDateAdhesion() {
        return $this->_date_adhesion;
    }

    public function getUserPhoto() {
        return $this->_user_photo;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function setUserId($membre_id) {
        $this->_user_id = $membre_id;
    }

    public function setRoleId($role_id) {
        $this->_role_id = $role_id;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setPermisConduire($permis_conduire) {
        $this->_permis_conduire = $permis_conduire;
    }

    public function setAdresse($adresse) {
        $this->_adresse = $adresse;
    }

    public function setVilleId($ville_id) {
        $this->_ville_id = $ville_id;
    }

    public function setCodePostal($code_postal) {
        $this->_code_postal = $code_postal;
    }

    public function setTelephone($telephone) {
        $this->_telephone = $telephone;
    }

    public function setCourriel($courriel) {
        $this->_courriel = $courriel;
    }

    public function setMdp($mdp) {
        $this->_mdp = $mdp;
    }

    public function setDateAdhesion($date_adhesion) {
        $this->_date_adhesion = $date_adhesion;
        return $this;
    }

    public function setUserPhoto($user_photo) {
        $this->_user_photo = $user_photo;
        return $this;
    }

    public function setUsername($username) {
        $this->_username = $username;
        return $this;
    }

    public function getEtat() {
        return $this->_etat;
    }
    public function setEtat($etat) {
        $this->_etat = $etat;
    }

    /**
     * Affiche le Prénom et Nom de l'usager
     * @return string
     */
    public function toString() {
        return $this->_prenom . ' ' . $this->_nom;
    }

    public static function getDescriptionEtat($etat_usager) {
        switch ($etat_usager) {
            case self::ETAT_EN_ATTENTE:
                return 'En attente';
            case self::ETAT_REFUSE:
                return 'Refusé';
            case self::ETAT_ACTIF:
                return 'Actif';
            case self::ETAT_INACTIF:
                return 'Inactif';
            default:
                return 'Inconnu';
        }
    }
}
