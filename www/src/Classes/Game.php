<?php

namespace apache\Classes;

class AlreadyTwoPlayersException extends \Exception {}

class Game {

    public $players;

    function __construct() {
        
    }

    function addPlayer($player) {
        if(sizeof($this->players)>=2){
            throw new AlreadyTwoPlayersException();
        } 
        $this->players[]=$player;
    }

    function isPlayer1($player) {
        return ($player == $this->players[0]);
    }

}