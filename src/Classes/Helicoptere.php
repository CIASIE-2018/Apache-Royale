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
                $this->moveStraight($x,$distance,0,'down');
            break;
            //si diagonale haut droite avance y et x
            case 45:
                $this->moveDiagonally($distance,20,12,'up','up');
            break;
            //si diagonale bas droite recule y et avance x
            case 135:
                $this->moveDiagonally($distance,20,0,'up','down');
            break;
            //si diagonale bas gauche recule y et x
            case 225:
                $this->moveDiagonally($distance,0,0,'down','down');
            break;
            //si diagonale haut gauche avance y et recule x
            case 315:
                $this->moveDiagonally($distance,0,12,'down','up');
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

    function moveDiagonally($distance,$limitX,$limitY,$directionX,$directionY){
        
        for($i = 0;$i<$distance;$i++){
            if($directionX=='up' && $directionY=='up'){
                if(($this->$x<$limitX)&&($this->$y<$limitY)){
                    $this->$x+=1;
                    $this->$y+=1;
                }
            }
            if($directionX=='up' && $directionY=='down'){
                if(($this->$x<$limitX)&&($this->$y>$limitY)){
                    $this->$x+=1;
                    $this->$y-=1;
                }
            }
            if($directionX=='down' && $directionY=='up'){
                    if(($this->$x>$limitX)&&($this->$y<$limitY)){
                        $this->$x-=1;
                        $this->$y+=1;
                    }
                }
            }
            if($directionX=='down' && $directionY=='down'){
                if(($this->$x>$limitX)&&($this->$y>$limitY)){
                    $this->$x-=1;
                    $this->$y-=1;
                }
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
        return ($jet > $proba);
    }

}