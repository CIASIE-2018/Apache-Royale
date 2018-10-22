<?php
namespace apache\Controller;
use apache\Views\SalonView;
$app = new \Slim\Slim();

class ControllerSalon{


    private $salon;
    function creerSalon($name,$pass,$private){
        $app = \Slim\Slim::getInstance();
        if($private==null) $private = false;
        else $private = true;
        
     $this->salon=\apache\Model\ModelSalon::CreateRoom($name,$pass,$private);;
     $app->redirect($app->urlFor('salon', array('id'=>$this->salon)));

    }

    function rejoindreSalon($id){
        $app->redirect($app->urlFor('salon', array('id'=>$id)));
        //$this->salon=\apache\Model\ModelSalon::getSalon($id);
    }
}