<?php
/*
 * Entité Message
 * @author : Alessandro Lemos
 */

class Message {

    const MSG_ETAT_NON_LU = 0;
    const MSG_ETAT_LU = 1;

    const MSG_TYPE_INTERNE = 0;
    const MSG_TYPE_RECLAMATION = 1;
    const MSG_TYPE_CONTACT = 2;

    private $message_id = 0;
    private $emetteur = NULL;
    private $destinaraire = NULL;
    private $date = NULL;
    private $sujet = '';
    private $contenu = '';
    protected $type = self::MSG_TYPE_INTERNE;
    private $etat = self::MSG_ETAT_NON_LU;

    public function __construct(array $data = NULL) {
        if ($data !== NULL) {
            $this->setMessageId($data['message_id']);
            $this->setDate($data['date']);
            $this->setSujet($data['sujet']);
            $this->setContenu($data['contenu']);
            $this->setEtat($data['etat']);
            $this->type = self::MSG_TYPE_INTERNE;

            $this->emetteur = new Usager();
            $this->emetteur->setUserId($data['emetteur_id']);

            $this->destinataire = new Usager();
            $this->destinataire->setUserId($data['destinataire_id']);
        }
    }

    public function getMessageId() {
        return $this->message_id;
    }

    public function getEmetteur() {
        return $this->emetteur;
    }

    public function getEmetteurId() {
        return $this->emetteur->getUserId();
    }

    public function getDestinataire() {
        return $this->destinaraire;
    }

    public function getDestinataireId() {
        return $this->destinaraire->getUserId();
    }

    public function getDate() {
        if ($this->date === NULL) {
            $this->date = Date('Y-m-d H:i:s');
        }
        return $this->date;
    }

    public function getSujet() {
        return $this->sujet;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getType() {
        return $this->type;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setMessageId($message_id) {
        $this->message_id = $message_id;
        return $this;
    }

    public function setEmetteur(Usager $user) {
        $this->emetteur = $user;
    }

    public function setDestinataire(Usager $user) {
        $this->destinaraire = $user;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setSujet($sujet) {
        $this->sujet = $sujet;
        return $this;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
        return $this;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
        return $this;
    }
}
