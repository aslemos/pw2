<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EReclamationProprietaire extends EMessage {

    protected $type = self::MSG_TYPE_RECLAMATION_PROPRIETAIRE;

    public function __construct(array $data = NULL) {
        parent::__construct($data);
        if ($data !== NULL) {
            $this->type = self::MSG_TYPE_RECLAMATION_PROPRIETAIRE;
        }
    }
}