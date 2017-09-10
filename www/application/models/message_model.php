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

    public function getCountNouveauMessages(EUsager $user) {
        $sql = 'SELECT COUNT(message_id) nbMsg FROM messages'
                . ' WHERE destinataire_id = ' . $this->db->escape($user->getUserId())
                . ' AND etat = ' . EMessage::MSG_ETAT_NON_LU;
        $st = $this->db->query($sql);
        return $st->row()->nbMsg;
    }

    public function getMessagesNonLus(EUsager $user) {
        $sql = 'SELECT * FROM messages WHERE destinataire_id = ' . $this->db->escape($user->getUserId())
                . ' AND etat = ' . EMessage::MSG_ETAT_NON_LU;
        $st = $this->db->query($sql);
        return $st->result_object;
    }

    public function getMessages(EUsager $user) {
        $sql = 'SELECT messages.*,'
                . ' emet.prenom as nom_emetteur,'
                . ' dest.prenom as nom_destinataire'
                . ' FROM messages'
                . ' LEFT JOIN usagers emet ON (messages.emetteur_id = emet.user_id)'
                . ' LEFT JOIN usagers dest ON (messages.destinataire_id = dest.user_id)'
                . ' WHERE destinataire_id = ' . $this->db->escape($user->getUserId())
                . ' AND messages.type = ' . EMessage::MSG_TYPE_INTERNE
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    public function getMessagesEnvoyes(EUsager $user) {
        $sql = 'SELECT messages.*,'
                . ' emet.prenom as nom_emetteur,'
                . ' dest.prenom as nom_destinataire'
                . ' FROM messages'
                . ' LEFT JOIN usagers emet ON (messages.emetteur_id = emet.user_id)'
                . ' LEFT JOIN usagers dest ON (messages.destinataire_id = dest.user_id)'
                . ' WHERE emetteur_id = ' . $this->db->escape($user->getUserId())
                . ' AND messages.type = ' . EMessage::MSG_TYPE_INTERNE
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
//var_dump($st->result());
//echo $sql;die();
        return $st->result();
    }

    /**
     * Récupère les réclamations qui correspondent à l'état passé en paramètre
     * @param int $etat l'état des réclamations : lu/non lu
     * @return array
     */
    public function getReclamations($etat = NULL) {
        $sql = 'SELECT messages.*, usagers.prenom as nom_emetteur FROM messages'
                . ' LEFT JOIN usagers ON (messages.emetteur_id = usagers.user_id)'
                . ' WHERE messages.type = ' . EMessage::MSG_TYPE_RECLAMATION;

        if ($etat) {
            $sql.= ' AND messages.etat = ' . $etat;
        }
        $sql.= ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    /**
     * Trouve les réclamations faites par l'usager indiqué en paramètre
     * @param EUsager $user
     * @return array
     */
    public function getReclamationsEnvoyes(EUsager $user) {
        $sql = 'SELECT messages.*, usagers.prenom as nom_emetteur FROM messages'
                . ' LEFT JOIN usagers ON (messages.emetteur_id = usagers.user_id)'
                . ' WHERE emetteur_id = \'' . $this->db->escape($user->getUserId()) . '\''
                . ' AND messages.type = ' . EMessage::MSG_TYPE_RECLAMATION
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    public function getContacts() {
        $sql = 'SELECT messages.*, usagers.prenom as nom_emetteur FROM messages'
                . ' WHERE messages.type = ' . EMessage::MSG_TYPE_CONTACT
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    public function createMessage(EMessage $message) {
        $sql = 'INSERT INTO messages (emetteur_id, destinataire_id, date, sujet, contenu, type, etat)';
        $sql .= ' VALUES (';
        $sql .= $message->getEmetteurId() . ',';
        $sql .= $message->getDestinataireId() . ',';
        $sql .= '\'' . $message->getDate() . '\',';
        $sql .= '\'' . $message->getSujet() . '\',';
        $sql .= '\'' . $message->getContenu() . '\',';
        $sql .= $message->getType() . ',';
        $sql .= EMessage::MSG_ETAT_NON_LU;
        $sql .= ');';

        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
