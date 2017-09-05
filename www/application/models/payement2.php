<?php

class Payement2 extends CI_Model {


//    function get_payements() {
//       //$this->load->database();
//        $query = $this->db->get('modes_paiements');
//        return $query->result_array();
//    }

    function get_payements() {
        $this->load->database();
       $query = $this->db->query('SELECT * FROM modes_paiements');
        return $query->result();
    }


//    function get_payements(){
//    $this->db->select('*');
//    $this->db->from('modes_paiements');
//    $query=$this->db->get();
//
//    if($query->num_rows() > 0) {
//        foreach ($query->result() as $row) {
//            $data[] = $row;
//        }
//        return $data;
//    }$query->free_result();
//}




}
