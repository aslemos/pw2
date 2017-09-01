<?php

class Admin extends CI_Controller {

    public function view($page) {
            $this->load->helper('url');
            $data['title'] = ucfirst($page);

            $data['base_url'] = base_url();
            
            $this->load->view('admin/' . $page, $data);


    }
}
