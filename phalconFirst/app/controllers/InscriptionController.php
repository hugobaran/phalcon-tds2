<?php

use Phalcon\Mvc\Controller;

class InscriptionController extends Controller
{
    // Méthode obligatoire
    public function indexAction(){

    }

    public function enregistrementAction(){
        $user = new Users();

        //Enregistrement et vérification des erreurs
        $success = $user->save($this->request->getPost(), array('nom', 'email'));

        if ($success) {
            echo "Merci de votre enregistrement !";
        } else {
            echo "Erreurs lors de l'enregistrement : ";
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        $this->view->disable();
    }
}