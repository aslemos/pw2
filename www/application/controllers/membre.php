<?php
/*
 * Class membre pour gérer la liste des membres
*/
class Membre extends CI_Controller {

    public function view($page) {
        
            $this->load->helper('url');
            
            $data['title'] = ucfirst($page);

            $data['base_url'] = base_url();
            
//            $this->load->view('common/' .header.php);
            $this->load->view('membre/' . $page, $data);


    }
}
