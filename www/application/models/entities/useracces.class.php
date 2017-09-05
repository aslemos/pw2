<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserAcces {

    static function getUser() {
        $user = new Usager();
        $user->setUserId(1);
        return $user;
    }

    static function userIsLogged() {
        return (isset($_SESSION['user_data']));
    }

    static function userIsSuperAdmin() {
        return (self::userIsLogged() && $_SESSION['user_data']->getRoleId() == Role::ROLE_SUPERADMIN);
    }

    static function userIsAdmin() {
        return (self::userIsLogged() && ($_SESSION['user_data']->getRoleId() == Role::ROLE_SUPERADMIN || $_SESSION['user_data']->getRoleId() == Role::ROLE_ADMIN));
    }
}
