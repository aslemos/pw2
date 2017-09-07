<?php

    class Commentaires extends CI_Controller{

        public function create($vehicule_id){

            $slug = $this->input->vehicule('vehicule_id');

            $data['vehicule'] = $this->vehicule_model->get_vehicules($id);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');

            $this->form_validation->set_rules('body', 'Body', 'required');


            if($this->form_validation->run() === FALSE){

                $this->load->view('common/header');
                $this->load->view('vehicules/view', $data);
                $this->load->view('common/footer');

            } else {

                $this->commentaire_model->add_comemtaire($vehicule_id);

                redirect('vehicules/'.$id);
            }
        }
    }