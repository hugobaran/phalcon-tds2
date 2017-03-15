<?php

use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
        $users = User::find();
        echo 'Il y a ', sizeof($users), " utilisateurs !\n";
    }
}
