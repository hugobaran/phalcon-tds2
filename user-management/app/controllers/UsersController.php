<?php

class UsersController extends ControllerBase
{
    public $sField;
    public $sens;
    public $filter;
    public $lignesMax = 10;
    public $nbPages = 0;

    public function indexAction($curPage = 1, $sField = "firstname", $sens = "asc", $filter = NULL)
    {
        if (isset($_GET['filtre']))
            header('location: http://localhost/phalcon-tds/user-management/users/index/1/lastname/asc/' . $_GET['filtre']);

        $debut = 10 * $curPage - 9;
        $users = User::find();
        $countRows = count($users);
        $this->nbPages = $countRows / ($this->lignesMax);
        $this->view->setVar("nbPages", ceil($this->nbPages));
        $this->view->setVar("curPage", $curPage);

        if ($filter != null) {
            $users = User::query()
                ->where("firstname like '%$filter%'")
                ->orWhere("lastname like '%$filter%'")
                ->orWhere("email like '%$filter%'")
                ->orWhere("login like '%$filter%'")
                ->orWhere("idrole like '%$filter%'")
                ->orderBy($sField . " " . $sens)
                ->execute();
        } else {
            $users = User::query()
                ->orderBy($sField . " " . $sens)
                ->limit(10, $debut)
                ->execute();
        }
        $this->view->setVar("curTab", $sField);
        $this->view->setVar("curSens", $sens);
        $this->view->setVar("users", $users);

        $this->view->setVar("tabColonnes", ["firstname", "lastname", "login", "email", "roleid"]);
        $this->view->setVar("href", "http://localhost/phalcon-tds/user-management/users/index/1");
    }

    public function formAction()
    {

    }

    public function deleteAction($id)
    {
        $user = User::findFirst($id);
        if ($user->delete() == false) {
            $msg = "Impossible de supprimer l'utilisateur \n";
            foreach ($user->getMessages() as $message) {
                $msg .= $message . "\n";
            }
            $this->view->setVar("contenueMsg", $msg);
        } else {
            $this->view->setVar("contenueMsg", "L'utilisateur a été supprimé");
        }
    }

    public function updateAction($id)
    {
        $user = User::findFirst($id);
        $this->view->setVar("updateUser", $user);

        if(isset($_POST["firstname"], $_POST['lastname'], $_POST['login'], $_POST['email'], $_POST['idrole'])) {
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setLogin($_POST["login"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setIdrole($_POST["idrole"]);
            if ($user->save() == false) {
                $msg = "Problème d'enregistrement \n";
                foreach ($user->getMessages() as $message) {
                    $msg .= $message . "\n";
                }
                $this->view->setVar("contenueMsg", $msg);
            } else {
                $this->view->setVar("contenueMsg", "Utilisateur modifié");
            }
        }
        $this->view->setVar("roles", Role::find());
    }

    public function addAction()
    {
        if(isset($_POST["firstname"], $_POST['lastname'], $_POST['login'], $_POST['email'], $_POST['idrole'])) {
            $user = new User();
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setLogin($_POST["login"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setIdrole($_POST["idrole"]);
            if ($user->save() == false) {
                $msg = "Problème d'enregistrement \n";
                foreach ($user->getMessages() as $message) {
                    $msg .= $message . "\n";
                }
                $this->view->setVar("contenueMsg", $msg);
            } else {
                $this->view->setVar("contenueMsg", "Utilisateur ajouté");
            }
        }
        $this->view->setVar("roles", Role::find());
    }
    public function showAction($id)
    {
        $user = User::findFirst($id);
        $this->view->setVar("showUser", $user);
    }
}

