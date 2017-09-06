<?php
/*
 *
 *
 *
 */

class Role_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getRoles() {

        $this->db->order_by('nom_role');
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function createRole() {

        $data = array(
            'nom_role' => $this->input->post('nom_role'),
            'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('roles', $data);
    }

    public function getRoleById($role_id) {

        $query = $this->db->get_where('roles', array('role_id' => $role_id));
        return $query->row();
    }

    public function deleteRole($role_id) {

        $this->db->where('role_id', $role_id);
        $this->db->delete('roles');
        return true;
    }
}
