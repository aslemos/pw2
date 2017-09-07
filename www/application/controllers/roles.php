<?php

/* 
 * 
 * 
 */

    class Roles extends CI_Controller{
        
        public function index(){

            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            
            $data['title'] = 'Liste Des Roles';
                       
            $data['roles'] = $this->role_model->get_roles();
            //print_r ($data['roles']);die();
            $this->load->view('common/header');
            $this->load->view('roles/index', $data);
            $this->load->view('common/footer');
        }

        public function create(){
            
            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            
            // Check login
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }

            $data['title'] = 'Ajouter un Rôle';

            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE){

                    $this->load->view('common/header');
                    $this->load->view('roles/create', $data);
                    $this->load->view('common/footer');
                    
            } else {
                
                $this->marque_model->create_role();

                // Set message
                $this->session->set_flashdata('role_created', 'Le role a été créée avec succès!');

                redirect('roles');
            }
        }

        public function usagers($role_id){
            
            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            
            $data['title'] = $this->marque_model->get_role($role_id)->name;

            $data['usagers'] = $this->user_model->get_usagers_by_role($role_id);

            $this->load->view('common/header');
            $this->load->view('usagers/index', $data);
            $this->load->view('common/footer');
        }

        public function delete($role_id){
            
            // Check login       
            if(!$this->session->userdata('logged_in')){

                redirect('usagers/login');
            }
            
            // Check login
            if(!$this->session->userdata('logged_in')){
                
                redirect('usagers/login');
            }

            $this->marque_model->delete_marque($marque_id);

            // Set message
            $this->session->set_flashdata('role_deleted', 'Le role  a été supprimée avec succès!');

            redirect('roles');
        }
    }