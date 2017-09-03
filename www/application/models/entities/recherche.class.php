<?php

final class Recherche {

    private $dateIni;
    private $dateFin;
    private $modele;
    private $marque;
    private $carrocerie;
    private $places;
    private $annee;
    private $carburant;
    private $transmission;
    private $lieu;
    private $prixMin;
    private $prixMax;

    public function getDateIni() {
        return $this->dateIni;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getCarrocerie() {
        return $this->carrocerie;
    }

    public function getPlaces() {
        return $this->places;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getCarburant() {
        return $this->carburant;
    }

    public function getTransmission() {
        return $this->transmission;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function getPrixMin() {
        return $this->prixMin;
    }

    public function getPrixMax() {
        return $this->prixMax;
    }

    public function setDateIni($dateIni) {
        $this->dateIni = $dateIni;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setCarrocerie($carrocerie) {
        $this->carrocerie = $carrocerie;
    }

    public function setPlaces($places) {
        $this->places = $places;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function setCarburant($carburant) {
        $this->carburant = $carburant;
    }

    public function setTransmission($transmission) {
        $this->transmission = $transmission;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    public function setPrixMin($prixMin) {
        $this->prixMin = $prixMin;
    }

    public function setPrixMax($prixMax) {
        $this->prixMax = $prixMax;
    }

    static function getRecherche() {
        $recherche = new Recherche();
        $recherche->setAnnee(isset($this->post['annee']) ? $this->post['annee'] : '');
        $recherche->setCarburant(isset($this->post['carburant']) ? $this->post['carburant'] : '');
        $recherche->setCarrocerie(isset($this->post['carrocerie']) ? $this->post['carrocerie'] : '');
        $recherche->setDateFin(isset($this->post['dateFin']) ? $this->post['dateFin'] : '');
        $recherche->setDateIni(isset($this->post['dateIni']) ? $this->post['dateIni'] : '');
        $recherche->setLieu(isset($this->post['lieu']) ? $this->post['lieu'] : '');
        $recherche->setMarque(isset($this->post['marque']) ? $this->post['marque'] : '');
        $recherche->setModele(isset($this->post['modele']) ? $this->post['modele'] : '');
        $recherche->setPlaces(isset($this->post['places']) ? $this->post['places'] : '');
        $recherche->setPrixMax(isset($this->post['prixMax']) ? $this->post['prixMax'] : '');
        $recherche->setPrixMin(isset($this->post['prixMin']) ? $this->post['prixMin'] : '');
        $recherche->setTransmission(isset($this->post['transmission']) ? $this->post['transmission'] : '');
        return $recherche;
    }
}
