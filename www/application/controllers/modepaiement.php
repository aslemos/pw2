<?php

class ModePaiement extends CI_Controller {

    public function getModesPaiements() {

        $this->load->model('modepaiement_model');

        $data['payements'] = $this->modepaiement_model->getModesPaiements();
        $this->load->view('client/payement', $data);
    }


}
