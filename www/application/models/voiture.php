<?php
class Voiture extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        try {
            $result = $this->db->query('select * from marquex');
            echo "<pre>";
            var_dump($result);
            echo '+' . $result->num_rows . '+';
            echo "</pre>";

        } catch (Exception $e) {
            echo "ici";
            var_dump($e->getMessage());
        }
    }

    public function getVoitures() {
        $this->db->load();
        $this->db->query('select * from ' . $this->db->prefix);
    }

    public function getVoitureById() {

    }

    public function setVoitureData(IVoiture $voiture) {

    }
}