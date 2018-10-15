<?php
namespace apache\Controller;
use apache\Views\SalonView;

class ControllerSalon{

    private $salon;
    function creerSalon($name,$pass,$private){
     $this->salon=ModelSalon::CreateRoom($nom,$mdp,$private);;
       
    }

    function rejoindreSalon($id){
        $this->salon=ModelSalon::getSalon($i);
    }
}