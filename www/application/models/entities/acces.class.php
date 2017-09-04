<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Acces {

    static function getUser() {
        $user = new Usager();
        $user->setUserId(1);
        return $user;
    }
}
