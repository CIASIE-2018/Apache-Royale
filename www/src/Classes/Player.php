<?php

namespace apache\Classes;

use apache\Classes\Helicoptere as Helicoptere;

class TooLargeAngleException extends \Exception{}

class InvalidDistanceException extends \Exception{}

class TargetNotInRangeException extends \Exception{}

class Player {

    public $id;
    public $helicopteres;
    public $turnFirstPartIsEnded;
    public $turnSecondPartIsEnded;
    public $turnThirdPartIsEnded;

    function __construct($isPlayer1) {
        $this->turnFirstPartIsEnded=false;
        $this->turnSecondPartIsEnded=false;
        $this->turnThirdPartIsEnded=false;
        if(isset($_COOKIE['PHPSESSID'])){
            $this->id=$_COOKIE['PHPSESSID'];
        }       
        //si joueur 1 helico initialise en bas, sinon en haut du plateau
        if($isPlayer1){
            $this->helicopteres=[new Helicoptere(5,0,0),new Helicoptere(10,0,0),new Helicoptere(15,0,0)];
        }else{
            $this->helicopteres=[new Helicoptere(5,12,180),new Helicoptere(10,12,180),new Helicoptere(15,12,180)];
        }
    }

    function changeDirectionHelicopters($angleH1,$angleH2,$angleH3){
        if($angleH1>90 || $angleH2>90 || $angleH3>90 ||$angleH1<-90 || $angleH2<-90 || $angleH3<-90){
            throw new TooLargeAngleException();
        }
        $this->helicopteres[0]->changeDirection($angleH1);
        $this->helicopteres[1]->changeDirection($angleH2);
        $this->helicopteres[2]->changeDirection($angleH3);
        //fin de la premiere partie du tour
        $this->turnFirstPartIsEnded = true;
    }

    function moveHelicopters($distanceH1,$distanceH2,$distanceH3){
        if($distanceH1>3 || $distanceH2>3 || $distanceH3>3 ||$distanceH1<0 || $distanceH2<0 || $distanceH3<0){
            throw new InvalidDistanceException();
        }
        $this->helicopteres[0]->move($distanceH1);
        $this->helicopteres[1]->move($distanceH2);
        $this->helicopteres[2]->move($distanceH3);
        //fin de la deuxieme partie du tour
        $this->turnSecondPartIsEnded = true;
    }

    function attackTargets($targetH1,$targetH2,$targetH3){
        // $reussites = tableau qui contient si les attaques ont réussies (Game infligera les degats) 
        if($targetH1 != null){
            $reussites[0]=$this->chooseTarget($this->helicopteres[0],$targetH1); 
        }else{
            $reussites[0]='';
        }
        if($targetH2 != null){
            $reussites[1]=$this->chooseTarget($this->helicopteres[1],$targetH2);
        }else{
            $reussites[1]='';
        }
        if($targetH3 != null){
            $reussites[2]=$this->chooseTarget($this->helicopteres[2],$targetH3);
        }else{
            $reussites[2]='';
        }
        //fin de la troisieme partie du tour
        $this->turnThirdPartIsEnded = true;
        //
        return $reussites;
    }

    /** renvoie un tableau decrivant l'attaquant, la cible et si l attaque a touche */
    function chooseTarget($attacker,$target){
        if(!($this->isInRange($attacker,$target))){
            throw new TargetNotInRangeException();
        }
        return array('attacker'=>$attacker,'target'=>$target
        ,'resultat'=>$attacker->attack($target));
    }

    function isInRange($attacker,$target){
        $angle=($attacker->direction % 360);
        switch ($angle) {
            //si tout droit ou vers le bas pareil
            case 0:
            case 180:
                return $this->checkRangeStraight($attacker,$target,'horizontal');
            break;
            //si vers la droite ou vers la geuche pareil
            case 90:
            case 270:
                return $this->checkRangeStraight($attacker,$target,'vertical');
            break;
            //si diagonale haut droite
            case 45:
                return $this->checkRangeDiagonally($attacker->x,$target->x,$attacker->y,$target->y);
            break;
            //si diagonale bas droite
            case 135:
                return $this->checkRangeDiagonally($attacker->x,$target->x,$target->y,$attacker->y);
            break;
            //si diagonale bas gauche
            case 225:
                return $this->checkRangeDiagonally($target->x,$attacker->x,$target->y,$attacker->y);
            break;
            //si diagonale haut gauche
            case 315:
                return $this->checkRangeDiagonally($target->x,$attacker->x,$attacker->y,$target->y);
            break;
            default:
                //
            break;
        }
    }

    /** return true si a portee */
    function checkRangeStraight($attacker,$target,$direction){
        if($direction=='horizontal'){
            return (abs($target->y - $attacker->y)>=abs($target->x - $attacker->x));
        }else{
            return (abs($target->x - $attacker->x)>=abs($target->y - $attacker->y));
        }
    }

    /** return true si a portee
     * les parametres correspondent aux coordonnees a tester, qui dependent de lorientation de l'helico
     */
    function checkRangeDiagonally($x1,$x2,$y1,$y2){
        return( ($x1 >= $x2) && ($y1 >= $y2) );
    }

    function isTurnEnded(){
        return ($this->turnFirstPartIsEnded && $this->turnSecondPartIsEnded && $this->turnThirdPartIsEnded);
    }

    function newTurn() {
        $this->turnFirstPartIsEnded = false;
        $this->turnSecondPartIsEnded = false;
        $this->turnThirdPartIsEnded = false;
    }

}