<?php
/*
 * Interface des Véhicules
 * @author : Alessandro Lemos
 */

interface IVehicule {

    public function getId();

    public function getDisponibilites();
    public function getDisponibilite($index = -1);
    public function addDisponibilite(IDisponibilite $disp);

    public function getDescription();
    public function setDescription($description);

    public function getTransmissionId();
    public function getTransmission();
    public function setTransmission(ITransmission $transmission);

    public function getProprietaireId();
    public function getProprietaire();
    public function setProprietaire(IUsager $proprietaire);

    public function getTypeId();
    public function getType();
    public function setType(ITypeVehicule $type);

    public function getMarqueId();
    public function getMarque();
    public function setMarque(IMarque $marque);

    public function getModele();
    public function setModele(IModele $modele);

    public function getCarburantId();
    public function getCarburant();
    public function setCarburant(ICarburant $carburant);

    public function getArrondId();
    public function getArrond();
    public function setArrond(IArrondissement $arrond);

    public function getMatricule();
    public function setMatricule($matricule);

    public function getAnnee();
    public function setAnnee($annee);

    public function getNbPlaces();
    public function setNbPlaces($nb_places);

    public function getNbLocations();

    public function getPrix();
    public function setPrix($prix);

    public function getPhoto();
    public function setPhoto($vehicule_photo);

    public function getEtat();
    public function setEtat($etat);

    public function toString();

    public static function getDescriptionEtat($etat_vehicule);
}
