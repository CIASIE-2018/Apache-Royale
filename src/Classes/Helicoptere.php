<?php

class Helicoptere {

    //coordonnees en x y z
    public $x,$y,$z;
    //direction vers laquelle est tournee l'helico
    public $direction;

    function __construct($posx,$posy) {
        $this->$x=$posx;
        $this->$y=$posy;
        $this->$direction=0;
    }

    function seDeplacer($distance) {
        $angle=($direction % 360);
        switch ($angle) {
            //si tout droit avance en y
            case 0:
                if(($this->$y+$distance)>=12){
                    $this->$y=12;
                }else{
                    $this->$y+=$distance;
                }
            break;
            //si vers la droite avance en x
            case 90:
                if(($this->$x+$distance)>=20){
                    $this->$x=20;
                }else{
                    $this->$x+=$distance;
                }
            break;
            //si vers le bas recule en y
            case 180:
                if(($this->$y-$distance)<=0){
                    $this->$y=0;
                }else{
                    $this->$y-=$distance;
                }
            break;
            //si versla gauche recule en x
            case 270:
                if(($this->$x-$distance)<=0){
                    $this->$x=0;
                }else{
                    $this->$x-=$distance;
                }
            break;
            //si diagonale haut droite avance y et x
            case 45:
                //il faut vérifier si on peut avancer àchaque fois
                $resDistance=$distance;
                while($distance>0){
                    if(($this->$x<20)&&($this->$y<12)){
                        $this->$x+=1;
                        $this->$y+=1;
                    }
                    $distance-=1;
                }
            break;
            //si diagonale bas droite recule y et avance x
            case 135:
                //il faut vérifier si on peut avancer àchaque fois
                $resDistance=$distance;
                while($distance>0){
                    if(($this->$x<20)&&($this->$y>0)){
                        $this->$x+=1;
                        $this->$y-=1;
                    }
                    $distance-=1;
                }
            break;
            //si diagonale bas gauche recule y et x
            case 225:
                //il faut vérifier si on peut avancer àchaque fois
                $resDistance=$distance;
                while($distance>0){
                    if(($this->$x>0)&&($this->$y>0)){
                        $this->$x-=1;
                        $this->$y-=1;
                    }
                    $distance-=1;
                }
            break;
            //si diagonale haut gauche avance y et recule x
            case 315:
                //il faut vérifier si on peut avancer àchaque fois
                $resDistance=$distance;
                while($distance>0){
                    if(($this->$x>0)&&($this->$y<12)){
                        $this->$x-=1;
                        $this->$y+=1;
                    }
                    $distance-=1;
                }
            break;
            default:
            //tant pis
            printf("Erreur, angle non valable (très content)");
            break;
        }
    }

    function seReorienter($angle){
        $this->$direction+=$angle;
    }

    function prendreDegats(){
        if($this->$z > 0) {
            $this->$z-=1;
        }
    }

    function estMort(){
        if($this->$z == 0) {
            return true;
        }else{
            return false;
        }
    }

    function attaquer($cible){
        //chance de toucher : différence de niveau + distance
        $proba = ($this->$z - $cible->$z) + abs($this->$x - $cible->$x) + abs($this->$y - $cible->$y); 
        $jet = rand(1,6);
        if($jet > $proba){
            return true;
        }else{
            return false;
        }
    }

}