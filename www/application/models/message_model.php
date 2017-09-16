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
                . ' WHERE destinataire_id = ' . $this->db->escape($user->getId())
                . ' AND etat = ' . EMessage::MSG_ETAT_NON_LU;
        $st = $this->db->query($sql);
        return $st->row()->nbMsg;
    }

    public function getMessagesNonLus(EUsager $user) {
        $sql = 'SELECT * FROM messages WHERE destinataire_id = ' . $this->db->escape($user->getId())
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
                . ' WHERE destinataire_id = ' . $this->db->escape($user->getId())
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
                . ' WHERE emetteur_id = ' . $this->db->escape($user->getId())
                . ' AND messages.type = ' . EMessage::MSG_TYPE_INTERNE
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result();
    }

    /**
     * Récupère les réclamations qui correspondent à l'état passé en paramètre
     * @param int $etat l'état des réclamations : lu/non lu
     * @return array
     */
    public function getReclamations($type = NULL, $etat = NULL) {
        $sql = 'SELECT messages.*, usagers.prenom as nom_emetteur FROM messages'
                . ' LEFT JOIN usagers ON (messages.emetteur_id = usagers.user_id) WHERE 1=1';

        if ($type !== NULL) {
            $sql.= ' AND messages.type = ' . $type;
        } else {
            $sql.= ' AND messages.type IN ('
                    . EMessage::MSG_TYPE_RECLAMATION_VEHICULE . ','
                    . EMessage::MSG_TYPE_RECLAMATION_PROPRIETAIRE . ','
                    . EMessage::MSG_TYPE_RECLAMATION_LOCATAIRE
                    . ')';
        }

        if ($etat !== NULL) {
            $sql.= ' AND messages.etat = ' . $etat;
        }
        $sql.= ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result_array();
    }

    /**
     * Trouve les réclamations faites par l'usager indiqué en paramètre
     * @param EUsager $user
     * @return array
     */
    public function getReclamationsEnvoyes(EUsager $user) {
        $sql = 'SELECT messages.*, usagers.prenom as nom_emetteur FROM messages'
                . ' LEFT JOIN usagers ON (messages.emetteur_id = usagers.user_id)'
                . ' WHERE emetteur_id = \'' . $this->db->escape($user->getId()) . '\''
                . ' AND messages.type = ' . EMessage::MSG_TYPE_RECLAMATION
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result_array();
    }

    /**
     * Récupère les messages envoyés par un membre à l'administrateur du site
     * @return array
     */
    public function getMessagesAdmin() {
        $sql = 'SELECT messages.* FROM messages'
                . ' WHERE messages.type = ' . EMessage::MSG_TYPE_ADMINISTRATIVE
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result_array();
    }

    /**
     * Récupère les messages envoyés par le formulaire de contact à usagers non-logués
     * @return array
     */
    public function getContacts() {
        $sql = 'SELECT messages.* FROM messages'
                . ' WHERE messages.type = ' . EMessage::MSG_TYPE_CONTACT
                . ' ORDER BY date DESC;';
        $st = $this->db->query($sql);
        return $st->result_array();
    }

    public function createMessage(EMessage $message) {
        $sql = 'INSERT INTO messages (emetteur_id, destinataire_id, objet_id, date, sujet, contenu, type, etat)';
        $sql .= ' VALUES (';
        $sql .= ($message->getEmetteurId() ? $message->getEmetteurId() : 'NULL') . ',';
        $sql .= ($message->getDestinataireId() ? $message->getDestinataireId() : 'NULL') . ',';
        $sql .= ($message->getObjetId() ? $message->getObjetId() : 'NULL') . ',';
        $sql .= $this->db->escape($message->getDate()) . ',';
        $sql .= $this->db->escape($message->getSujet()) . ',';
        $sql .= $this->db->escape($message->getContenu()) . ',';
        $sql .= $message->getType() . ',';
        $sql .= EMessage::MSG_ETAT_NON_LU;
        $sql .= ');';

        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    /**
     * Récupère une message spécifique
     * @param type $message_id
     */
    public function getMessageById($message_id) {
        $sql = 'SELECT messages.*,'
                . ' emet.prenom as nom_emetteur,'
                . ' dest.prenom as nom_destinataire'
                . ' FROM messages'
                . ' LEFT JOIN usagers emet ON (messages.emetteur_id = emet.user_id)'
                . ' LEFT JOIN usagers dest ON (messages.destinataire_id = dest.user_id)'
                . ' WHERE message_id = ' . $this->db->escape($message_id)
                . ';';

        $st = $this->db->query($sql);
        return $st->result();
    }

    /**
     * Supprime un message
     * @param int $message_id L'identifiant du message à supprimer
     * @return bool
     */
    public function deleteMessage($message_id) {
        $this->db->where('message_id', $message_id);
        return $this->db->delete('messages');
    }
}
