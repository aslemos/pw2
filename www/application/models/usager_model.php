<?php
/*
 *
 *
 *
 */

class usager_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Trouve un usager par son ID et retourne son objet EUsager
     * @param int $user_id L'identifiant de l'usager
     * @return EUsager
     */
    public function getUserById($user_id) {
        $data = $this->getUsers($user_id);
        if (!empty($data)) {
            return new EUsager($data);
        }
        return NULL;
    }

    public function getUsers($user_id = NULL) {

        $this->db->join('roles', 'roles.role_id = usagers.role_id');
        $this->db->join('villes', 'villes.ville_id = usagers.ville_id');

        if ($user_id === NULL) {
            $this->db->order_by('usagers.prenom', 'ASC');

            $query = $this->db->get('usagers');

            return $query->result_array();
        } else {

            $query = $this->db->get_where('usagers', array('user_id' => $user_id));

            return $query->row_array();
        }
    }

    /**
     * Récupère les usagers qui n'ont pas été approuvés ou refusés par l'administrateur<br>
     * (son état est en attente)
     * @return array
     */
    public function getUsagersEnAttente() {
        $this->db->where('etat_usager', EUsager::ETAT_EN_ATTENTE);
        $this->db->join('roles', 'roles.role_id = usagers.role_id');
        $this->db->join('villes', 'villes.ville_id = usagers.ville_id');
        $this->db->order_by('usagers.prenom', 'ASC');

        $query = $this->db->get('usagers');
        return $query->result_array();
    }

    /**
     * Récupère les usagers qui ont été traités par l'administrateur et ne sont plus en attente<br>
     * (son état est différent d'attente)
     * @return array
     */
    public function getMembres() {
        $this->db->where('etat_usager !=', EUsager::ETAT_EN_ATTENTE);
        $this->db->join('roles', 'roles.role_id = usagers.role_id');
        $this->db->join('villes', 'villes.ville_id = usagers.ville_id');
        $this->db->order_by('usagers.prenom', 'ASC');

        $query = $this->db->get('usagers');
        return $query->result_array();
    }

    public function registerUser($enc_password, $user_photo) {

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

    // CONNEXION DE L'USAGER
    public function login($username, $password) {


        // Valider les infos avant connexion
        $this->db->where('username', $username);

        $this->db->where('motdepasse', $password);

        $result = $this->db->get('usagers');

        if ($result->num_rows() == 1) {

            return $result->row(0)->user_id;
        } else {

            return false;
        }
    }

    public function getUserByLogin($username, $password) { //login
        $this->db->where('username', $username);
        $this->db->where('motdepasse', $password);

        $result = $this->db->get('usagers');

        if ($result->num_rows() == 1) {
            return new EUsager($result->row_array(0));
        }
        return NULL;
    }

    // Check username exists
    public function checkUsernameExists($username) {

        $query = $this->db->get_where('usagers', array('username' => $username));

        //if(empty($query->row_array())){
        if ($query->row_array() === NULL) {

            return true;
        } else {

            return false;
        }
    }

    // Check email exists
    public function checkEmailExists($email) {

        $query = $this->db->get_where('usagers', array('courriel' => $email));

        //if(empty($query->row_array())){
        if ($query->row_array() === NULL) {

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

    public function updateUser($data) {

        $this->db->where('user_id', $data['user_id']);
        return $this->db->update('usagers', $data);
    }

    public function getRoles() {

        $this->db->order_by('nom_role');
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function getUsagersByRoleId($role_id) {

        $this->db->order_by('usagers.nom', 'DESC');

        $this->db->join('roles', 'roles.role_id = usagers.role_id');

        $query = $this->db->get_where('usagers', array('roles.role_id' => $role_id));

        return $query->result_array();
    }

    public function getAdmins() {
        $sql = 'SELECT * FROM usagers';
        $sql.= ' INNER JOIN roles ON (roles.role_id = usagers.role_id)';
        $sql.= ' WHERE usagers.role_id IN (' . ERole::ROLE_ADMIN . ',' . ERole::ROLE_SUPERADMIN . ')';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * Approuve une demande d'abonnement
     * @param int $user_id L'identifiant de l'usager
     * @return bool
     * @author Alessandro Souza Lemos
     */
    public function approuverMembre($user_id) {
        $user = $this->getUserById($user_id);
        if ($user && $user->getEtat() == EUsager::ETAT_EN_ATTENTE) {
            $this->db->where('user_id', $user_id);
            return $this->db->update('usagers', ['etat_usager' => EUsager::ETAT_ACTIF]);
        }
        return FALSE;
    }

    /**
     * Refuse une demande d'abonnement
     * @param int $user_id L'identifiant de l'usager
     * @return bool
     * @author Alessandro Souza Lemos
     */
    public function refuserMembre($user_id) {
        $user = $this->getUserById($user_id);
        if ($user && $user->getEtat() == EUsager::ETAT_EN_ATTENTE) {
            $this->db->where('user_id', $user_id);
            return $this->db->update('usagers', ['etat_usager' => EUsager::ETAT_REFUSE]);
        }
        return FALSE;
    }
}
