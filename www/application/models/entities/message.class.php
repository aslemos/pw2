<?php
/*
 * Entité Message
 * @author : Alessandro Lemos
 */

class Message {

    const MSG_ETAT_NON_LU = 0;
    const MSG_ETAT_LU = 1;

    private $message_id;
    private $emetteur_id;
    private $destinataire_id;
    private $date;
    private $sujet;
    private $contenu;
    private $type;
    private $etat;

    public function getMessageId() {
        return $this->message_id;
    }

    public function getEmetteurId() {
        return $this->emetteur_id;
    }

    public function getDestinataireId() {
        return $this->destinataire_id;
    }

    public function getDate() {
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

    public function setEmetteurId($emetteur_id) {
        $this->emetteur_id = $emetteur_id;
        return $this;
    }

    public function setDestinataireId($destinataire_id) {
        $this->destinataire_id = $destinataire_id;
        return $this;
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

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
        return $this;
    }
}
