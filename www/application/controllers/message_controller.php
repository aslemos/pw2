<?php
/*
 * Contrôleur des fonctions de messagerie
 * @author : Alessandro Lemos
 */

class Message_Controller extends CI_Controller {

    public function getMessages() {
        $user = new Usager();
        $user->setMembreId(1);
        $this->load->model('message_model');

        $res = $this->message_model->getMessages($user);
        var_dump($res);
    }
}
