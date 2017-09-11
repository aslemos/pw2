<?php

class Page extends CI_Controller {

    public function view($page) {
        $data['title'] = ucfirst($page);
        $data['base_url'] = base_url();
        $this->load->view('statique/' . $page, $data);
    }
}
