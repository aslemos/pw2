<?php
/*
 * Classe statique de contrôle d'accès
 * Elle se charge de récuperer l'usager logué et de tester les permissions
 *   qui lui concernent.
 * @author Alessandro Souza Lemos
 */

class UserAcces {

    /**
     * Retourne l'usager logué (l'objet que le représente
     * @return EUsager
     */
    static function getLoggedUser() {
        if (self::userIsLogged()) {
            return $_SESSION['user_data'];
        }
        return NULL;
    }

    /**
     * Retourne l'identifiant de l'usager logué
     * @return int Le user_id correspondant
     */
    static function getUserId() {
        $user = self::getLoggedUser();
        if ($user instanceof EUsager) {
            return $user->getId();
        }
        return NULL;
    }

    /**
     * Vérifie s'il y a un usager logué
     * @return bool
     */
    static function userIsLogged() {
        return (isset($_SESSION['user_data']));
    }

    /**
     * Vérifie si l'usager est un super-administrateur
     * @return bool
     */
    static function userIsSuperAdmin() {
        return (self::userIsLogged() && $_SESSION['user_data']->getRoleId() == ERole::ROLE_SUPERADMIN);
    }

    /**
     * Vérifie si l'usager est un administrateur.<br>
     * Un super-administrateur est, lui aussi, un administrateur
     * @return bool
     */
    static function userIsAdmin() {
        return (self::userIsLogged() && ($_SESSION['user_data']->getRoleId() == ERole::ROLE_SUPERADMIN || $_SESSION['user_data']->getRoleId() == ERole::ROLE_ADMIN));
    }


    /**
     * Vérifie si l'usager est actif.
     * @return bool
     */
    static function userIsActif() {
        $user = self::getLoggedUser();
        if ($user instanceof EUsager) {
            return $user->getEtat() == EUsager::ETAT_ACTIF;
        }
        return FALSE;
    }
}
