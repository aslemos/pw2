<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserAcces {

//    static function setUserTest($role_id = Role::ROLE_CLIENT) {
//        $user = new User();
//        $user->setUserId(1);
//        $user->setRoleId($role_id);
//        $_SESSION['user_data'] = $user;
//    }

    static function getLoggedUser() {
        if (self::userIsLogged()) {
            return $_SESSION['user_data'];
        }
        return NULL;
    }

    static function userIsLogged() {
        return (isset($_SESSION['user_data']));
    }

    static function userIsSuperAdmin() {
        return (self::userIsLogged() && $_SESSION['user_data']->getRoleId() == ERole::ROLE_SUPERADMIN);
    }

    static function userIsAdmin() {
        return (self::userIsLogged() && ($_SESSION['user_data']->getRoleId() == ERole::ROLE_SUPERADMIN || $_SESSION['user_data']->getRoleId() == ERole::ROLE_ADMIN));
    }
}
