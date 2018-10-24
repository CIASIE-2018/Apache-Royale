<?php

namespace apache\Model;

class OutsideTheBoardException extends \Exception{}

    class AlreadyCrashedException extends \Exception{}
    
    class InvalidAngleException extends \Exception{}

class ModelHelicoptere extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Helico';
    protected $primaryKey = 'id';
    public $timestamps =false;

    function __construct($posx,$posy,$direction){
        $this->x=$posx; 
        $this->y=$posy;
        $this->z=3;
        $this->direction = $direction;
        $this->save();
        return $this->id;
    }

    function move($distance) {
        $angle=($this->direction % 360);
        switch ($angle) {
            //si tout droit avance en y
            case 0:
                $this->moveStraight('y',$distance,12,'up');
            break;
            //si vers la droite avance en x
            case 90:
                $this->moveStraight('x',$distance,20,'up');
            break;
            //si vers le bas recule en y
            case 180:
                $this->moveStraight('y',$distance,0,'down');
            break;
            //si versla gauche recule en x
            case 270:
                $this->moveStraight('x',$distance,0,'down');
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
        for($i = 0;$i<$distance;$i++){
            if( $this->canMove($direction,$axis,$limit) ) {
                $this->moveOnce($direction,$axis,$limit);
            }
        }
    }

    function moveDiagonally($distance,$limitX,$limitY,$directionX,$directionY){   
        for($i = 0;$i<$distance;$i++){
            if( ($this->canMove($directionX,'x',$limitX)) && ($this->canMove($directionY,'y',$limitY)) ) {
                $this->moveOnce($directionX,'x',$limitX);
                $this->moveOnce($directionY,'y',$limitY);
            }
        }
    }

    function moveOnce($direction,$axis){
        if($direction=='up'){
            $this->$axis+=1;
        }else{
            $this->$axis-=1;
        }
        $this->save();
    }

    function canMove($direction,$axis,$limit){
        if($direction=='up'){
            if($this->$axis >= $limit){
                throw new OutsideTheBoardException();
            }else{
                return true;
            }
        }else{
            if($this->$axis <= $limit){
                throw new OutsideTheBoardException();
            }else{
                return true;
            }
        }
    }
    

    function changeDirection($angle){
        if($angle % 45 != 0){
            throw new InvalidAngleException();
        }
        $this->direction+=$angle;
        //positives for the switch
        if($this->direction <0){
            $this->direction+=360;
        }
        $this->save();
    }

    function takeDamage(){
        if($this->z <= 0) {
            throw new AlreadyCrashedException();
        }
        $this->z-=1;
        $this->save();
    }

    function isDead(){
        return $this->z == 0 ;
    }

    function attack($target){
        $jet = rand(1,6);
        return ($jet > $this->calculateOdds($target));
    }

    function calculateOdds($target){
        //chance de toucher : différence de niveau + distance
        return (($this->z - $target->z) + abs($this->x - $target->x) + abs($this->y - $target->y)); 
    }

    static function getHelicoptere($id){
        $helico=ModelHelicoptere::get();
        foreach($helico as $heli){
            if($heli->id == $id)
                $arr = $heli;
        }
        return $arr;
    }
}