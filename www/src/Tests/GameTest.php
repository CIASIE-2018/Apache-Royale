<?php

use apache\Classes\Player as Player;
use apache\Classes\Game as Game;
use apache\Classes\Helicoptere as Helicoptere;

final class GameTest extends PHPUnit_Framework_TestCase{

    public function testBasic() {
        $this->assertTrue(true);
    }

    public function testCanAddPlayer(){
        $game=new Game();
        $game->addPlayer();
        $this->assertEquals(new Player(true),$game->players[0]);
    }

    public function testCantAddMoreThanTwoPlayers(){
        $this->setExpectedException(apache\Classes\AlreadyTwoPlayersException::class);
        $game=new Game();
        $game->addPlayer();
        $game->addPlayer();
        $game->addPlayer();
    }

    public function testCanRecognizePlayer1(){
        $game=new Game();
        $game->addPlayer();
        $game->addPlayer();
        $this->assertTrue($game->isPlayer1($game->players[0]));
        $this->assertEquals(false,$game->isPlayer1($game->players[1]));
    }

}