<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        Auth::isAuth($this->session->get("user"));
    }
}