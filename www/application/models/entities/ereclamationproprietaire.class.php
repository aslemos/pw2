<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EReclamationProprietaire extends EMessage {

    public function __construct(array $data = NULL) {
        parent::__construct($data);
        $this->_type = self::MSG_TYPE_RECLAMATION_PROPRIETAIRE;
    }
}
