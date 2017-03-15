<?php

class Auth
{
    static function isAuth($session){
        if($session)
            return true;
        else
            return false;
    }

    static function hasRole($session,$role){
        if($session AND $session->idrole == $role)
            return true;
    }
}
