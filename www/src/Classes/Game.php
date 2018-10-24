<?php

namespace apache\Classes;

class AlreadyTwoPlayersException extends \Exception {}

class Game {

    public $players;

    function __construct() {
        
    }

    /** dans constructeur player boolean qui indique au joueur si il sera player1 */
    function addPlayer() {
        if(sizeof($this->players)>=2){
            throw new AlreadyTwoPlayersException();
        } 
        $this->players[]=new Player($this->players->length==0);
    }

    function isPlayer1($player) {
        return ($player == $this->players[0]);
    }

}