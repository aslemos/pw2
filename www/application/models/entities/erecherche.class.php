<?php

final class ERecherche {

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

    public function __construct(array $data) {
        $this->setAnnee(isset($data['annee']) ? $data['annee'] : '');
        $this->setCarburant(isset($data['carburant']) ? $data['carburant'] : '');
        $this->setCarrocerie(isset($data['carrocerie']) ? $data['carrocerie'] : '');
        $this->setDateFin(isset($data['dateFin']) ? $data['dateFin'] : '');
        $this->setDateIni(isset($data['dateIni']) ? $data['dateIni'] : '');
        $this->setLieu(isset($data['lieu']) ? $data['lieu'] : '');
        $this->setMarque(isset($data['marque']) ? $data['marque'] : '');
        $this->setModele(isset($data['modele']) ? $data['modele'] : '');
        $this->setPlaces(isset($data['places']) ? $data['places'] : '');
        $this->setPrixMax(isset($data['prixMax']) ? $data['prixMax'] : '');
        $this->setPrixMin(isset($data['prixMin']) ? $data['prixMin'] : '');
        $this->setTransmission(isset($data['transmission']) ? $data['transmission'] : '');
    }

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
}
