<?php

namespace apache\Classes;

use apache\Classes\Helicoptere as Helicoptere;
use apache\Classes\Game as Game;

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

}