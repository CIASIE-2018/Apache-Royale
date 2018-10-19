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
        $player=new Player($game,1);
        $game->addPlayer($player);
        $this->assertEquals($player,$game->players[0]);
    }

    public function testCantAddMoreThanTwoPlayers(){
        $this->setExpectedException(apache\Classes\AlreadyTwoPlayersException::class);
        $game=new Game();
        $game->addPlayer(new Player($game,1));
        $game->addPlayer(new Player($game,2));
        $game->addPlayer(new Player($game,3));
    }

    public function testCanRecognizePlayer1(){
        $game=new Game();
        $player1=new Player($game,1);
        $player2=new Player($game,2);
        $this->assertTrue($game->isPlayer1($player1));
        $this->assertEquals(false,$game->isPlayer1($player2));
    }

}