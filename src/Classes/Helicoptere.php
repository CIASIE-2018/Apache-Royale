<?php

class Helicoptere {

    public $x,$y,$z;
    //direction we're facing
    public $direction;

    function __construct($posx,$posy) {
        $this->$x=$posx;
        $this->$y=$posy;
        $this->$direction=0;
    }

    function move($distance) {
        $angle=($direction % 360);
        switch ($angle) {
            //si tout droit avance en y
            case 0:
                $this->moveStraight($y,$distance,12,'up');
            break;
            //si vers la droite avance en x
            case 90:
                $this->moveStraight($x,$distance,20,'up');
            break;
            //si vers le bas recule en y
            case 180:
                $this->moveStraight($y,$distance,0,'down');
            //si versla gauche recule en x
            case 270:
                $this->moveStraight($y,$distance,0,'down');
            break;
            //si diagonale haut droite avance y et x
            case 45:
                //il faut vérifier si on peut avancer àchaque fois
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
                while($distance>0){
                    if(($this->$x>0)&&($this->$y<12)){
                        $this->$x-=1;
                        $this->$y+=1;
                    }
                    $distance-=1;
                }
            break;
            default:
                throw new Exception("L'angle ne correspond pas");
            break;
        }
    }

    function moveStraight($axis,$distance,$limit,$direction){
        if($direction=='up'){
            if(($this->$axis+$distance)>=$limit){
                $this->$axis=$limit;
            }else{
                $this->$axis+=$distance;
            }
        }else{
            if(($this->$axis+$distance)<=$limit){
                $this->$axis=$limit;
            }else{
                $this->$axis-=$distance;
            }
        }
    }

    function changeDirection($angle){
        $this->$direction+=$angle;
    }

    function takeDamage(){
        if($this->$z <= 0) {
            throw new Exception("Hélico déjà crash");
        }
        $this->$z-=1;
    }

    function isDead(){
        return $this->$z == 0 ;
    }

    function attack($target){
        //chance de toucher : différence de niveau + distance
        $proba = ($this->$z - $target->$z) + abs($this->$x - $target->$x) + abs($this->$y - $target->$y); 
        $jet = rand(1,6);
        if($jet > $proba){
            return true;
        }else{
            return false;
        }
    }

}