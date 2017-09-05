<?php
/*
 *
 *
 *
 */

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getUsers() {

        $this->db->order_by('usagers.prenom', 'ASC');
        $this->db->join('roles', 'roles.role_id = usagers.role_id');
        $query = $this->db->get('usagers');
        return $query->result();
    }

    public function getUserById($user_id) {

        $this->db->join('roles', 'roles.role_id = usagers.role_id');

        $query = $this->db->get_where('usagers', array('user_id' => $user_id));

        return $query->row_array();
    }

    public function createUser($enc_password, $user_photo) {

        $role_id = '3';
        $data = array(
            'prenom' => $this->input->post('prenom'),
            'nom' => $this->input->post('nom'),
            'permis_conduire' => $this->input->post('permis_conduire'),
            'adresse' => $this->input->post('adresse'),
            'ville' => $this->input->post('ville'),
            'code_postal' => $this->input->post('code_postal'),
            'telephone' => $this->input->post('phone'),
            'courriel' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'motdepasse' => $enc_password,
            'role_id' => $role_id,
            'user_photo' => $user_photo
        );

        return $this->db->insert('usagers', $data);
    }

    // Log user in
    public function getUserByLogin($username, $password) {

        //echo $username .' '. $password;die();
        // Validate
        $this->db->where('username', $username);

        $this->db->where('motdepasse', $password);

        $result = $this->db->get('usagers');

        if ($result->num_rows() == 1) {
            return new Usager($result->row(0));
        }
        return NULL;
    }

    // Check username exists
    public function checkUsernameExists($username) {

        $query = $this->db->get_where('usagers', array('username' => $username));

        if (empty($query->row_array())) {

            return true;
        } else {

            return false;
        }
    }

    // Check email exists
    public function checkEmailExists($email) {

        $query = $this->db->get_where('usagers', array('courriel' => $email));

        if (empty($query->row_array())) {

            return true;
        } else {

            return false;
        }
    }

    public function deleteUser($user_id) {

        $this->db->where('user_id', $user_id);
        $this->db->delete('usagers');
        return true;
    }

    public function updateUser(Usager $user) {

        $data = array(
            'prenom' => $this->input->post('prenom'),
            'nom' => $this->input->post('nom'),
            'permis_conduire' => $this->input->post('permis_conduire'),
            'adresse' => $this->input->post('adresse'),
            'ville' => $this->input->post('ville'),
            'code_postal' => $this->input->post('code_postal'),
            'telephone' => $this->input->post('telephone'),
            'courriel' => $this->input->post('email'),
            'motdepasse' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id')
        );

        $this->db->where('user_id', $this->input->post('user_id'));

        return $this->db->update('usagers', $data);
    }

    public function getRoles() {

        $this->db->order_by('nom_role');
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function getUsersByRoleId($role_id) {

        $this->db->order_by('usagers.user_id', 'DESC');

        $this->db->join('roles', 'roles.role_id = vehicules.role_id');

        $query = $this->db->get_where('usagers', array('roles.role_id' => $role_id));

        return $query->result_array();
    }
}
