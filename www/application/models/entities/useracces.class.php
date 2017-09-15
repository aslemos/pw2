<?php
/*
 * Classe statique de contrôle d'accès
 * Elle se charge de récuperer l'usager logué et de tester les permissions
 *   qui lui concernent.
 * @author Alessandro Souza Lemos
 */

class UserAcces {

    static function getLoggedUser() {
        if (self::userIsLogged()) {
            return $_SESSION['user_data'];
        }
        return NULL;
    }

    static function getUserId() {
        $user = self::getLoggedUser();
        if ($user instanceof EUsager) {
            return $user->getId();
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
