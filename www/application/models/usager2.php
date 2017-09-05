<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * [asl]
 * Model de l'usager
 */
class Usager2 extends CI_Model {

     function getUsersInfo() {

        $this->load->database();

        $query = $this->db->query('SELECT * FROM usagers INNER JOIN roles ON usagers.role_id=roles.role_id ');

        return $query->result()[1];
    }


}