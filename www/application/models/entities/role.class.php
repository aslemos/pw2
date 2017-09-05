<?php

class Role {

    const ROLE_CLIENT = 3;
    const ROLE_ADMIN = 2;
    const ROLE_SUPERADMIN = 1;

    private $role_id = 0;  // ID
    private $nom_role;

    public function __construct(array $data = NULL) {
        if ($data !== NULL) {
            $this->setRoleId($data['role_id']);
            $this->setNomRole($data['nom_role']);
        }
    }

    public function getRoleId() {
        return $this->role_id;
    }

    public function getNomRole() {
        return $this->nom_role;
    }

    public function setRoleId($role_id) {
        $this->role_id = $role_id;
    }

    public function setNomRole($nom_role) {
        $this->nom_role = $nom_role;
    }
}
