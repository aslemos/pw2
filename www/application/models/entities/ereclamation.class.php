<?php
/*
 * Classe mère des réclamations
 */

class EReclamation extends EMessage {

    protected $_objet = NULL;

    public function __construct(array $data = NULL) {
        parent::__construct($data);

        $this->setObjetId($data['objet_id']);
    }

    /**
     * Retourne la description de l'objet de la réclamation (Locataire, propriétaire ou véhicule)
     * @return string
     */
    public function getDescriptionObjet() {

        if (!$this->_objet) {
            return '';
        }

        switch ($this->_type) {
            case self::MSG_TYPE_RECLAMATION_LOCATAIRE:
                return 'Locataire ' . $this->_objet->toString() . ' (' . $this->_objet->getUsername() . ')';

            case self::MSG_TYPE_RECLAMATION_PROPRIETAIRE:
                return 'Propriétaire ' . $this->_objet->toString() . ' (' . $this->_objet->getUsername() . ')';

            case self::MSG_TYPE_RECLAMATION_VEHICULE:
                return 'Véhicule ' . $this->_objet->toString() . '. Matricule ' . $this->_objet->getMatricule();

            default:
                return 'Inconnu';
        }
    }

    public function getObjetId() {
        return $this->_objet_id;
    }

    public function setObjetId($objet_id) {
        $this->_objet_id = $objet_id;
    }

    public function setObjet(stdClass $objet = NULL) {
        if (!$objet === NULL && !$objet instanceof EVehicule && !$objet instanceof EUsager) {
            throw new Exception('Type d\'objet invalide');
        }
        $this->_objet = $objet;
    }
}