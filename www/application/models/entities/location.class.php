<?php


class Location {

    const LOCATION_NON_ACCEPT = 0;
    const LOCATION_ACCEPT = 1;

    private $nom_marque;
    private $vehicule_id;
    private $destinaraire = NULL;
    private $date = NULL;
    private $sujet = '';
    private $contenu = '';
    protected $type = self::MSG_TYPE_INTERNE;
    private $etat = self::MSG_ETAT_NON_LU;


    public function getNomMarque() {
        return $this->nom_marque;
    }

    public function getVehiculeId() {
        return $this->vehicule_id;
    }

    public function getNomType() {
        return $this->nom_type;
    }



    public function setNomMarque($nom_marque) {
        $this->nom_marque = $nom_marque;
        return $this;
    }

    public function setVehiculeId($vehicule_id) {
        $this->vehicule_id = $vehicule_id;
    }

    public function setNomType(User $nom_type) {
        $this->nom_type = $nom_type;
    }

   
}
