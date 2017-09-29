<?php
/*
 * Classe représentative d'une réclamation de véhicule
 */

class EReclamationVehicule extends EReclamation {

    public function __construct(array $data = NULL) {
        parent::__construct($data);
        $this->_type = self::MSG_TYPE_RECLAMATION_VEHICULE;
    }
}
