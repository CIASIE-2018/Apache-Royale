<?php

namespace apache\Classes;

use apache\Classes\Helicoptere as Helicoptere;

class TooLargeAngleException extends \Exception{}

class InvalidDistanceException extends \Exception{}

class Player {

    public $id;
    public $game;
    public $helicopteres;

    function __construct($game,$id) {
        $this->game=$game;
        $this->id=$id;
        $this->game->addPlayer($this);
        //si joueur 1 helico initialise en bas, sinon en haut du plateau
        if($this->game->isPlayer1($this)){
            $this->helicopteres=[new Helicoptere(5,0),new Helicoptere(10,0),new Helicoptere(15,0)];
        }else{
            $this->helicopteres=[new Helicoptere(5,12),new Helicoptere(10,12),new Helicoptere(15,12)];
        }
    }

    function changeDirectionHelicopters($angleH1,$angleH2,$angleH3){
        if($angleH1>90 || $angleH2>90 || $angleH3>90 ||$angleH1<-90 || $angleH2<-90 || $angleH3<-90){
            throw new TooLargeAngleException();
        }
        $this->helicopteres[0]->changeDirection($angleH1);
        $this->helicopteres[1]->changeDirection($angleH2);
        $this->helicopteres[2]->changeDirection($angleH3);
    }

    function moveHelicopters($distanceH1,$distanceH2,$distanceH3){
        if($distanceH1>3 || $distanceH2>3 || $distanceH3>3 ||$distanceH1<0 || $distanceH2<0 || $distanceH3<0){
            throw new InvalidDistanceException();
        }
        $this->helicopteres[0]->move($distanceH1);
        $this->helicopteres[1]->move($distanceH2);
        $this->helicopteres[2]->move($distanceH3);
    }

}