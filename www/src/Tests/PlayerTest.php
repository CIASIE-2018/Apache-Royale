<?php

use apache\Classes\Player as Player;
use apache\Classes\Game as Game;
use apache\Classes\Helicoptere as Helicoptere;

final class PlayerTest extends PHPUnit_Framework_TestCase{

    public function testBasic() {
        $this->assertTrue(true);
    }

    public function testIsInitializedWithTheCorrectParameters() {
        $game = new Game();
        $player = new Player($game,1);
        $this->assertEquals(1,$player->id);
        $this->assertEquals($game,$player->game);
        //check helicopters positions for player 1
        $this->assertEquals(new Helicoptere(5,0),$player->helicopteres[0]);
        $this->assertEquals(new Helicoptere(10,0),$player->helicopteres[1]);
        $this->assertEquals(new Helicoptere(15,0),$player->helicopteres[2]);
        //check helicopters positions for player 2
        $player2 = new Player($game,2);
        $this->assertEquals(new Helicoptere(5,12),$player2->helicopteres[0]);
        $this->assertEquals(new Helicoptere(10,12),$player2->helicopteres[1]);
        $this->assertEquals(new Helicoptere(15,12),$player2->helicopteres[2]);
    }
}/*
    public function testCanTurnAsManyHelicoptersAsWanted() {
        $this->assertTrue(false);
    }    

    public function testCantTurnHelicoptersMoreThan90Degrees() {
        $this->assertTrue(false);
    }

    public function testCanMoveHelicoptersTheCorrectDistance() {
        $this->assertTrue(false);
    }

    public function testCantAttackHelicoptersNotInFront() {
        $this->assertTrue(false);
    }

    public function testCanEndHisTurn() {
        $this->assertTrue(false);
    }

    public function testCantDoActionsInTheWrongOrder() {
        $this->assertTrue(false);
    }

}*/