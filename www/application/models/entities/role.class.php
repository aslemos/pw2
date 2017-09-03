<?php

class Role {

    const ROLE_CLIENT = 1;
    const ROLE_ADMIN = 2;
    const ROLE_SUPERADMIN = 3;

    private $role_id;  // ID
    private $nom_role;

    public function getRole_id() {
        return $this->role_id;
    }

    public function getNom_role() {
        return $this->nom_role;
    }

    public function setRole_id($role_id) {
        $this->role_id = $role_id;
    }

    public function setNom_role($nom_role) {
        $this->nom_role = $nom_role;
    }
}
