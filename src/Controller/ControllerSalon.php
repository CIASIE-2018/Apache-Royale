<?php
namespace apache\Controller;
use apache\Views\SalonView;

class ControllerSalon{
    function creerSalon($name,$pass,$private){
        $v = new SalonView(0,$name,$pass,$private);
        echo $v->render();
    }

    function rejoindreSalon($id){
        $v = new SalonView($id);
        echo $v->render();
    }
}