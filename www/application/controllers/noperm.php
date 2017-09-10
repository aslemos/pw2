<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Noperm extends CI_Controller {

    public function index() {
        echo '<h1>Accès non autorisé</h1>';
        die();
    }
}
