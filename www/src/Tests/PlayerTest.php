<?php

use apache\Classes\Player as Player;
use apache\Classes\Game as Game;
use apache\Classes\Helicoptere as Helicoptere;

final class PlayerTest extends PHPUnit_Framework_TestCase{

    public function testBasic() {
        $this->assertTrue(true);
    }

    public function testIsInitializedWithTheCorrectParameters() {
        $player = new Player(true);
        //check helicopters positions for player 1
        $this->assertEquals(new Helicoptere(5,0,0),$player->helicopteres[0]);
        $this->assertEquals(new Helicoptere(10,0,0),$player->helicopteres[1]);
        $this->assertEquals(new Helicoptere(15,0,0),$player->helicopteres[2]);
        //check helicopters positions for player 2
        $player2 = new Player(false);
        $this->assertEquals(new Helicoptere(5,12,180),$player2->helicopteres[0]);
        $this->assertEquals(new Helicoptere(10,12,180),$player2->helicopteres[1]);
        $this->assertEquals(new Helicoptere(15,12,180),$player2->helicopteres[2]);
    }

    public function testCanTurnAllHelicoptersAtTheCorrectAngle() {
        $player = new Player(true);
        $player->changeDirectionHelicopters(45,-45,-90);
        $this->assertEquals(45,$player->helicopteres[0]->direction);
        $this->assertEquals(315,$player->helicopteres[1]->direction);
        $this->assertEquals(270,$player->helicopteres[2]->direction);
    }    

    public function testCantTurnHelicoptersMoreThan90Degrees() {
        $this->setExpectedException(apache\Classes\TooLargeAngleException::class);
        $player = new Player(true);
        $player->changeDirectionHelicopters(180,-45,-90);
    }

    public function testCanMoveHelicoptersTheCorrectDistance() {
        $player = new Player(true);
        $player->moveHelicopters(2,3,1);
        $this->assertEquals(2,$player->helicopteres[0]->y);
        $this->assertEquals(3,$player->helicopteres[1]->y);
        $this->assertEquals(1,$player->helicopteres[2]->y);
        $this->assertEquals(5,$player->helicopteres[0]->x);
        $this->assertEquals(10,$player->helicopteres[1]->x);
        $this->assertEquals(15,$player->helicopteres[2]->x);
    }

    public function testCantMoveHelicoptersFurtherThan3Units() {
        $this->setExpectedException(apache\Classes\InvalidDistanceException::class);
        $player = new Player(true);
        $player->moveHelicopters(4,3,-1);
    }

    public function testCanChooseTargets() {
        $attacker = new Player(true);
        $target = new Player(false);
        $res = $attacker->chooseTarget($attacker->helicopteres[0],$target->helicopteres[0]);
        $this->assertEquals($attacker->helicopteres[0],$res['attacker']);
        $this->assertEquals($target->helicopteres[0],$res['target']);
    }

    public function testCanChooseNotToAttack() {
        $attacker = new Player(true);
        $target = new Player(false);
        $res = $attacker->attackTargets(null,$target->helicopteres[0],null);
        $this->assertEquals('',$res[0]);
        $this->assertEquals($attacker->helicopteres[1],$res[1]['attacker']);
        $this->assertEquals('',$res[2]);
    }

    public function testCantAttackHelicoptersNotInRange() {
        $this->setExpectedException(apache\Classes\TargetNotInRangeException::class);
        $attacker = new Player(true);
        $target = new Player(false);
        //on l'oriente de maniere a ce que les helicos adverses ne soient pas a portee
        $attacker->changeDirectionHelicopters(90,-90,0);
        $attacker->attackTargets($target->helicopteres[1],$target->helicopteres[0],$target->helicopteres[2]);
    }

    public function testCanEndHisTurn() {
        $player = new Player(true);
        $this->assertEquals(false,$player->isTurnEnded());
        $player->changeDirectionHelicopters(0,0,0);
        $this->assertEquals(true,$player->turnFirstPartIsEnded);
        $player->moveHelicopters(0,0,0);
        $this->assertEquals(true,$player->turnSecondPartIsEnded);
        $player->attackTargets(null,null,null);
        $this->assertEquals(true,$player->turnThirdPartIsEnded);
        $this->assertEquals(true,$player->isTurnEnded());
    }

    public function testCanStartANewTurn() {
        $player = new Player(true);
        $player->changeDirectionHelicopters(0,0,0);
        $player->moveHelicopters(0,0,0);
        $player->attackTargets(null,null,null);
        $this->assertEquals(true,$player->isTurnEnded());
        $player->newTurn();
        $this->assertEquals(false,$player->isTurnEnded());
    }

    public function testCantDoActionsInTheWrongOrder() {
        $this->assertTrue(false);
    }

}