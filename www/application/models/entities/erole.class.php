<?php

class ERole {

    const ROLE_CLIENT = 3;
    const ROLE_ADMIN = 2;
    const ROLE_SUPERADMIN = 1;

    private $_role_id = 0;  // ID
    private $_nom_role;

    public function __construct(array $data = NULL) {
        if ($data !== NULL) {
            $this->setId($data['role_id']);
            $this->setNom($data['nom_role']);
        }
    }

    public function getId() {
        return $this->_role_id;
    }

    public function getNom() {
        return $this->_nom_role;
    }

    public function setId($role_id) {
        $this->_role_id = $role_id;
    }

    public function setNom($nom_role) {
        $this->_nom_role = $nom_role;
    }
}
