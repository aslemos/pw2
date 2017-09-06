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

    public function getCountNouveauMessages(Usager $user) {
        $sql = 'SELECT COUNT(message_id) nbMsg FROM messages'
                . ' WHERE destinataire_id = ' . $user->getUserId();
        $st = $this->db->query($sql);
        return $st->row()->nbMsg;
    }

    public function getMessagesNonLus(Usager $user) {
        $sql = 'SELECT * FROM messages WHERE destinataire_id = \'' . $this->db->escape($user->getUserId()) . '\''
                . ' AND etat = ' . Message::MSG_ETAT_NON_LU;
        $st = $this->db->query($sql);
        return $st->result_object;
    }

    public function getMessages(Usager $user) {
        $sql = 'SELECT messages.*,'
                . ' emet.prenom as nom_emetteur,'
                . ' dest.prenom as nom_destinataire'
                . ' FROM messages'
                . ' LEFT JOIN usagers emet ON (messages.emetteur_id = emet.user_id)'
                . ' LEFT JOIN usagers dest ON (messages.destinataire_id = dest.user_id)'
                . ' WHERE destinataire_id = \'' . $this->db->escape($user->getUserId()) . '\''
                . ' AND messages.type = ' . Message::MSG_TYPE_NORMAL
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    public function getMessagesEnvoyes(Usager $user) {
        $sql = 'SELECT messages.*,'
                . ' emet.prenom as nom_emetteur,'
                . ' dest.prenom as nom_destinataire'
                . ' FROM messages'
                . ' LEFT JOIN usagers emet ON (messages.emetteur_id = emet.user_id)'
                . ' LEFT JOIN usagers dest ON (messages.destinataire_id = dest.user_id)'
                . ' WHERE emetteur_id = \'' . $this->db->escape($user->getUserId()) . '\''
                . ' AND messages.type = ' . Message::MSG_TYPE_NORMAL
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    public function getReclamations() {
        $sql = 'SELECT messages.*, usagers.prenom as nom_emetteur FROM messages'
                . ' LEFT JOIN usagers ON (messages.emetteur_id = usagers.user_id)'
                . ' WHERE messages.type = ' . Message::MSG_TYPE_RECLAMATION
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    public function getReclamationsEnvoyes(Usager $user) {
        $sql = 'SELECT messages.*, usagers.prenom as nom_emetteur FROM messages'
                . ' LEFT JOIN usagers ON (messages.emetteur_id = usagers.user_id)'
                . ' WHERE emetteur_id = \'' . $this->db->escape($user->getUserId()) . '\''
                . ' AND messages.type = ' . Message::MSG_TYPE_RECLAMATION
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    public function createMessage(Message $message) {
        $sql = 'INSERT INTO messages (emetteur_id, destinataire_id, date, sujet, contenu, type, etat)';
        $sql .= ' VALUES (';
        $sql .= $message->getEmetteurId() . ',';
        $sql .= $message->getDestinataireId() . ',';
        $sql .= '\'' . $message->getDate() . '\',';
        $sql .= '\'' . $message->getSujet() . '\',';
        $sql .= '\'' . $message->getContenu() . '\',';
        $sql .= $message->getType() . ',';
        $sql .= Message::MSG_ETAT_NON_LU;
        $sql .= ');';

        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
