<?php
/*
 * Classe qui réprésente une réclamation de locataire
 */

class EReclamationLocataire extends EReclamation {

    public function __construct(array $data = NULL) {
        parent::__construct($data);
        $this->_type = self::MSG_TYPE_RECLAMATION_LOCATAIRE;
    }
}
