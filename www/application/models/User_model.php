<?php

/* 
 * 
 * 
 * 
 */

    class User_model extends CI_Model {

        public function __construct() {

            $this->load->database();
        }

        public function get_usagers(){

            $this->db->order_by('usagers.user_id','ASC');
            $this->db->join('roles','roles.role_id = usagers.role_id');
            $query = $this->db->get('usagers');
            return $query->result_array();
        }

        public function get_user($user_id){

            $this->db->join('roles','roles.role_id = usagers.role_id');

            $query = $this->db->get_where('usagers',array('user_id' => $user_id));

            return $query->row_array();
        }

        public function register ($enc_password, $user_photo){

            $role_id = '3';
            $data = array (
                'prenom'         => $this->input->post('prenom'),
                'nom'            => $this->input->post('nom'),
                'permis_conduire'=> $this->input->post('permis_conduire'),			
                'adresse'        => $this->input->post('adresse'),
                'ville'          => $this->input->post('ville'),
                'code_postal'    => $this->input->post('code_postal'),
                'telephone'      => $this->input->post('phone'),
                'courriel'       => $this->input->post('email'),
                'username'       => $this->input->post('username'),
                'motdepasse'     => $enc_password,
                'role_id'        => $role_id,
                'user_photo'     => $user_photo
            );

            return $this->db->insert('usagers', $data);
        }

        // Log user in
        public function login($username, $password){

            //echo $username .' '. $password;die();
            // Validate
            $this->db->where('username', $username);

            $this->db->where('motdepasse', $password);

            $result = $this->db->get('usagers');

            if($result->num_rows() == 1){

                return $result->row(0)->user_id;

            } else {

                return false;
            }
        }

        // Check username exists
            public function check_username_exists($username){

                $query = $this->db->get_where('usagers', array('username' => $username));

                if(empty($query->row_array())){

                    return true;

                } else {

                    return false;
                }
            }

        // Check email exists
        public function check_email_exists($email){

            $query = $this->db->get_where('usagers', array('courriel' => $email));

            if(empty($query->row_array())){

                return true;

            } else {

                return false;
            }
        }

        public function delete_user($user_id){

            $this->db->where('user_id', $user_id);
            $this->db->delete('usagers');	
            return true;
        }

        public function update_user(){

            $data = array (
                'prenom'         => $this->input->post('prenom'),
                'nom'            => $this->input->post('nom'),
                'permis_conduire'=> $this->input->post('permis_conduire'),			
                'adresse'        => $this->input->post('adresse'),
                'ville'          => $this->input->post('ville'),
                'code_postal'    => $this->input->post('code_postal'),
                'telephone'      => $this->input->post('telephone'),
                'courriel'       => $this->input->post('email'),
                'motdepasse'     => $this->input->post('password'),
                'role_id'        => $this->input->post('role_id')
            );

            $this->db->where('user_id', $this->input->post('user_id'));

            return $this->db->update('usagers', $data);
        }

        public function get_roles(){

            $this->db->order_by('nom_role');
            $query = $this->db->get('roles');
            return $query->result_array();
        }

        public function get_usagers_by_role($role_id){

            $this->db->order_by('usagers.user_id', 'DESC');

            $this->db->join('roles', 'roles.role_id = vehicules.role_id');

            $query = $this->db->get_where('usagers', array('roles.role_id' => $role_id));

            return $query->result_array();
        }
    }