<?php
/*
 * Entité Message
 * @author : Alessandro Lemos
 */

class EMessage {

    const MSG_ETAT_NON_LU = 0;
    const MSG_ETAT_LU = 1;

    const MSG_TYPE_INTERNE = 0;
    const MSG_TYPE_RECLAMATION_PROPRIETAIRE = 10;
    const MSG_TYPE_RECLAMATION_VEHICULE = 11;
    const MSG_TYPE_RECLAMATION_LOCATAIRE = 12;
    const MSG_TYPE_ADMINISTRATIVE = 20;
    const MSG_TYPE_CONTACT = 30;

    private $_message_id = 0;
    private $_emetteur = NULL;
    private $_destinaraire = NULL;
    private $_date = NULL;
    private $_sujet = '';
    private $_contenu = '';
    private $_objet_id = '';
    protected $_type = self::MSG_TYPE_INTERNE;
    private $_etat = self::MSG_ETAT_NON_LU;

    public function __construct(array $data = NULL) {
        if ($data !== NULL) {
            $this->setMessageId($data['message_id']);
            $this->setDate($data['date']);
            $this->setSujet($data['sujet']);
            $this->setContenu($data['contenu']);
            $this->setEtat($data['etat']);
            $this->_type = self::MSG_TYPE_INTERNE;

            $this->_emetteur = new EUsager();
            $this->_emetteur->setUserId($data['emetteur_id']);

            $this->destinataire = new EUsager();
            $this->destinataire->setUserId($data['destinataire_id']);
        }
    }

    /**
     * Retourne la description du type de message
     * @return string
     */
    public function getDescription() {
        return self::getDescriptionType($this->_type);
    }

    /**
     * Retourne la description concernant le type reçu en paramètre
     * @param int $type
     * @return string
     */
    public static function getDescriptionType($type) {
        switch ($type) {
            case self::MSG_TYPE_INTERNE:
                return 'Message interne';
            case self::MSG_TYPE_RECLAMATION_PROPRIETAIRE:
                return 'Réclamation de propriétaire';
            case self::MSG_TYPE_RECLAMATION_VEHICULE:
                return 'Réclamation de véhicule';
            case self::MSG_TYPE_RECLAMATION_LOCATAIRE:
                return 'Réclamation de locataire';
            case self::MSG_TYPE_ADMINISTRATIVE:
                return 'Message administrative';
            case self::MSG_TYPE_CONTACT:
                return 'Contact du site';
            default:
                return 'Inconnu';
        }
    }

    public function getId() {
        return $this->_message_id;
    }

    public function getEmetteur() {
        return $this->_emetteur;
    }

    public function getEmetteurId() {
        return $this->_emetteur
                ? $this->_emetteur->getId()
                : NULL;
    }

    public function getDestinataire() {
        return $this->_destinaraire;
    }

    public function getNomDestinataire() {
        return $this->_destinaraire
                ? $this->_destinaraire->toString()
                : '-- Non spécifié --';
    }

    public function getDestinataireId() {
        return $this->_destinaraire
                ? $this->_destinaraire->getId()
                : NULL;
    }

    public function getDate() {
        if ($this->_date === NULL) {
            $this->_date = Date('Y-m-d H:i:s');
        }
        return $this->_date;
    }

    public function getSujet() {
        return $this->_sujet;
    }

    public function getContenu() {
        return $this->_contenu;
    }

    public function getType() {
        return $this->_type;
    }

    public function getEtat() {
        return $this->_etat;
    }

    public function setMessageId($message_id) {
        $this->_message_id = $message_id;
        return $this;
    }

    public function setEmetteur(EUsager $user) {
        $this->_emetteur = $user;
    }

    public function setDestinataire(EUsager $user) {
        $this->_destinaraire = $user;
    }

    public function setDate($date) {
        $this->_date = $date;
        return $this;
    }

    public function setSujet($sujet) {
        $this->_sujet = $sujet;
        return $this;
    }

    public function setContenu($contenu) {
        $this->_contenu = $contenu;
        return $this;
    }

    public function setEtat($etat) {
        $this->_etat = $etat;
        return $this;
    }
}
