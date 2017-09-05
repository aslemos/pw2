<?php

class Louer extends CI_Controller {

    public function louer_car($id) {


        $this->load->model('location');


        $data = array(
            'vehicule_id' => $this->input->post('vehicule_id'),
            'date_debut ' => $this->input->post('date_debut'),
            'date_fin' => $this->input->post('date_fin')
        );

        //Transfering data to Model
        $this->insert_model->form_insert($data);
        $data['message'] = 'Data Inserted Successfully';
//Loading View
        $this->load->view('insert_view', $data);
    }
