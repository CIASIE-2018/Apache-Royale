<?php
namespace apache\Controller;
use apache\Views\SalonView;

class ControllerSalon{
    function creerSalon(){
        $v = new SalonView(0);
        echo $v->render();
    }

    function rejoindreSalon($id){
        $v = new SalonView($id);
        echo $v->render();
    }
}