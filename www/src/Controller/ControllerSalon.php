<?php
namespace apache\Controller;
use apache\Views\SalonView;

class ControllerSalon{

    private $salon;
    function creerSalon($name,$pass,$private){
        if($private==null){
            $private = false;
        }
     $this->salon=\apache\Model\ModelSalon::CreateRoom($name,$pass,$private);;
     
    }

    function rejoindreSalon($id){
        $this->salon=\apache\Model\ModelSalon::getSalon($i);
    }
}