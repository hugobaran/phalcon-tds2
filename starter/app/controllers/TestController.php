<?php

class TestController extends ControllerBase
{
    /**
     * @var Ajax\Semantic
     **/
    protected $semantic;

    public function initialize(){
        $this->semantic = $this->jquery->semantic();
    }

    /**
     * Default action
     */

    public function indexAction(){

    }

    public function hideShowAction(){
        $ckShowHide = $this->semantic->htmlCheckbox("ckShowHide","Masquer/afficher");
        $message = $this->semantic->htmlMessage("zone");
        $ckShowHide->on("change",$message->jsToggle("$(this).prop('checked')"));

        $this->jquery->compile($this->view);
    }

    public function changeCssAction(){
        $b1 = $this->semantic->htmlButton("bt1","Page 1");
        $b1->setProperty('data-description','Description B1');
        $b2 = $this->semantic->htmlButton("bt2","Page 2");
        $b2->setProperty('data-description','Description B2');

        $b1->getOn("mouseover","test/page1","#pageContent");
        $b2->getOn("mouseover","test/page2","#pageContent");
        $b1->on("mouseover",$this->jquery->html("#pageDesc",$b1->getProperty('data-description')));
        $b2->on("mouseover",$this->jquery->html("#pageDesc",$b2->getProperty('data-description')));

        $b1->on("mouseout",$this->jquery->html("#pageContent",""));
        $b1->on("mouseout",$this->jquery->html("#pageDesc",""));
        $b2->on("mouseout",$this->jquery->html("#pageContent",""));
        $b2->on("mouseout",$this->jquery->html("#pageDesc",""));

        $b1->getOnClick("test/page1","#pageContent");
        $b2->getOnClick("test/page2","#pageContent");

        $this->semantic->htmlMessage("pageContent");
        $this->jquery->compile($this->view);
    }

    public function getCascadeAction(){
        $bt = $this->semantic->htmlButton("btLoad","Chargement");
        $bt->getOnClick("test/page1","#page1");

        $this->jquery->compile($this->view);
    }

    public function page1Action(){
        $this->view->disable();
        echo "Page 1";
        echo "<div id='page2' style='border-style: solid; border-color:green'></div>";
        $this->jquery->get("test/page2","#page2");
        echo $this->jquery->compile();
    }

    public function page2Action(){
        $this->view->disable();
        echo "Page 2";
    }

    public function postFormAction(){
        $form=$this->semantic->htmlForm("formUser");
        $form->addInput("nom","Nom");
        $form->addInput("email","Email");
        $form->addSubmit("btValider","Valider");
        $form->setProperty("style","float:left; width:49%");
        $form->submitOnClick("btValider","test/postReponse","#postReponse");

        $mess=$this->semantic->htmlMessage("postReponse","vide");
        $mess->setVariation("compact");
        $mess->setProperty("style","float:right; width:49%");

        $form->getOnClick("test/page2","#pageContent");

        $this->jquery->compile($this->view);
    }

    public function postReponseAction(){
        $this->view->disable();
        echo $_POST['nom']." z ".$_POST['email'];
    }
}