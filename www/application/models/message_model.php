<?php
/*
 * Modèle du système de messagerie
 * @author : Alessandro Lemos
 */

class Message_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getMessagesNonLus(Usager $user) {
        $sql = 'SELECT * FROM messages WHERE destinataire_id = \'' . $this->db->escape($user->getMembreId()). '\'';
        $sql.= ' AND etat = ' . Message::MSG_ETAT_NON_LU;
        $st = $this->db->query($sql);
        return $st->result_object;
    }

    public function getMessages(Usager $user) {
        $sql = 'SELECT * FROM messages WHERE destinataire_id = \'' . $this->db->escape($user->getMembreId()). '\'';
        $st = $this->db->query($sql);
        return $st->result_object;
    }

    public function enregistrerMessage(Message $message) {
        $sql = 'INSERT INTO messages (emetteur_id, destinataire_id, date, sujet, contenu, type, etat)';
        $sql.= ' VALUES (';
        $sql.= $message->getEmetteurId() . ',';
        $sql.= $message->getDestinataireId() . ',';
        $sql.= $message->getDate() . ',';
        $sql.= $message->getSujet() . ',';
        $sql.= $message->getContenu() . ',';
        $sql.= $message->getType() . ',';
        $sql.= Message::MSG_ETAT_NON_LU;
        $sql.= ' );';

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

}
