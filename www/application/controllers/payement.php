<?php


class Payement extends CI_Controller {

    public function get_payements() {


        $this->load->model('payement2');

        $data['payements'] = $this->payement2->get_payements();




        $this->load->view('client/payement', $data);
    }


}
