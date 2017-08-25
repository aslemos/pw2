<?php

class Page extends CI_Controller {

    public function view($page = 'home') {
//        if (file_exists(APPPATH . 'views/statique/' . $page . '.php')) {
            $data['title'] = ucfirst($page);

//            $this->load->view('common/header');

            $this->load->view('statique/' . $page, $data);

//            $this->load->view('common/footer');
//        } else
//            show_404();
    }
}
