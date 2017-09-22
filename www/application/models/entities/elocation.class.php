<?php
/*
 * Classe d'une location/reservation
 * @author Andriy
 * @author Alessandro
 */

class ELocation implements ILocation {

    const LOCATION_EN_ATTENTE = -1;
    const LOCATION_NON_ACCEPTE = 0;
    const LOCATION_ACCEPTE = 1;
    const LOCATION_PAYE = 2;
    const LOCATION_ANNULE = 3;

    private $_location_id = 0;
    private $_vehicule = NULL;
    private $_locataire = NULL;
    private $_date_debut = '';
    private $_date_fin = '';
    private $_etat = 0;
    private $_nb_jours = 0;
    private $_paiements = [];

    public function __construct(array $data) {
        $this->_location_id = $data['location_id'];
        $this->_date_debut = $data['date_debut'];
        $this->_date_fin = $data['date_fin'];
        $this->_etat = $data['etat_reservation'];
        $this->actualiserNbJours();
    }

    private function actualiserNbJours() {
        self::calculerPrixTotal(0, $this->_date_debut, $this->_date_fin, $nb_jours);
        $this->_nb_jours = $nb_jours;
    }

    public function getId() {
        return $this->_location_id;
    }

    public function getVehiculeId() {
        return $this->_vehicule->getId();
    }

    public function getDateDebut() {
        return $this->_date_debut;
    }

    public function getDateFin() {
        return $this->_date_fin;
    }

    public function getLocataireId() {
        return $this->_locataire->getId();
    }
    public function getLocataire() {
        return $this->_locataire;
    }

    public function getVehicule() {
        return $this->_vehicule;
    }

    /**
     * Calcule le montant de la location
     * @return float
     */
    public function getPrixTotal() {
        if ($this->_vehicule) {
            $nb_jours = 0;
            $prix_total = $this->calculerPrixTotal(
                    $this->_vehicule->getPrix(),
                    $this->_date_debut,
                    $this->_date_fin,
                    $nb_jours
                    );

            $this->_nb_jours = $nb_jours; // met à jour le nombre de jours
            return $prix_total;
        }
        return 0;
    }

    public function getNbJours() {
        return $this->_nb_jours;
    }

    public function getEtat() {
        return $this->_etat;
    }
    public function setEtat($etat_location) {
        if (in_array($etat_location, [
            self::LOCATION_EN_ATTENTE,
            self::LOCATION_ACCEPTE,
            self::LOCATION_PAYE,
            self::LOCATION_ANNULE,
            self::LOCATION_NON_ACCEPTE
                ])) {

            $this->_etat = $etat_location;
            return $this;
        }
        throw new Exception('État invalide');
    }

    public function setDateDebut($date_debut) {
        $this->_date_debut = $date_debut;
        $this->actualiserNbJours();
        return $this;
    }

    public function setDateFin($date_fin) {
        $this->_date_fin = $date_fin;
        $this->actualiserNbJours();
        return $this;
    }

    public function setLocataire(IUsager $locataire) {
        $this->_locataire = $locataire;
        return $this;
    }

    public function setVehicule(IVehicule $vehicule) {
        $this->_vehicule = $vehicule;
        return $this;
    }

    public function toString() {
        return $this->_date_debut . ' à ' . $this->_date_fin;
    }

    /**
     * Indique si la réservation a été approuvée
     * @return bool
     */
    public function estApprouvee() {
       return $this->_etat == self::LOCATION_ACCEPTE;
    }

    /**
     * Indique si la location a été payée
     * TODO: vérifier les paiements pour retourner l'information exacte.
     * @return bool
     */
    public function estPayee() {
        return $this->_etat == self::LOCATION_PAYE;
    }


    /**
     * Ajoute un paiement à la location
     * @param IPaiement $paiement
     */
    public function addPaiement(IPaiement $paiement) {
        $existe = FALSE;
        for ($i=0, $nb=count($this->_paiements); $i < $nb && !$existe; $i++) {
            $existe = ($this->_paiements[$i]->getId() == $paiement->getId());
        }
        if (!$existe) {
            $this->_paiements[] = $paiement;
        }
    }

    public function getPaiements($pos = -1) {
        if ($pos < 0) {
            return $this->_paiements;
        }
        return isset($this->_paiements[$pos]);
    }

    public function getTotalPaye() {
        $total = 0;
        foreach($this->_paiements as $paiement) {
            $total += $paiement->getMontant();
        }
        return $total;
    }

    public static function getDescriptionEtat($etat_reservation) {
        switch ($etat_reservation) {
            case self::LOCATION_EN_ATTENTE:
                return 'En attente';
            case self::LOCATION_ACCEPTE:
                return 'Accepé';
            case self::LOCATION_PAYE:
                return 'Payé';
            case self::LOCATION_ANNULE:
                return 'Annulé';
            case self::LOCATION_NON_ACCEPTE:
                return 'Refusé';
            default:
                return 'Inconnu';
        }
    }

    public static function calculerPrixTotal($prix, $date_debut, $date_fin, &$nb_jours) {
        $diff = abs(strtotime($date_fin) - strtotime($date_debut));
        $nb_jours = (int) floor($diff / (60 * 60 * 24)) + 1;
        return floatval($prix * $nb_jours);
    }
}
