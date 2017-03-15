<?php

use Phalcon\Session\Adapter\Files as Session;

class LoginController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->setVar("index","DQZ");
    }

    public function asAdminAction(){
        $session = new Session();
        $session->start();
        $user = User::findFirst("idrole = 1");
        $this->session->set("user", $user);
    }

    public function asUserAction(){
        $session = new Session();
        $session->start();
        $user = User::findFirst("idrole = 2");
        $this->session->set("user", $user);
    }

    public function authAction(){

    }
}

