<?php

/**
 * Représente un message interne d'un membre à un administrateur
 */
class EMessageAdmin extends EMessage {

    public function __construct(array $data = NULL) {
        parent::__construct($data);
        $this->_type = self::MSG_TYPE_ADMINISTRATIVE;
    }
}
