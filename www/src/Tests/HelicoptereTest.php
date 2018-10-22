<?php

use apache\Classes\Helicoptere as Helicoptere;

final class HelicoptereTest extends PHPUnit_Framework_TestCase{

    public function testBasic() {
        $this->assertTrue(true);
    }

    public function testCanBeCreatedAtTheCorrectPosition() {
        $helico = new Helicoptere(10,11,0);
        $this->assertEquals(10,$helico->x);
        $this->assertEquals(11,$helico->y);
        $this->assertEquals(3,$helico->z);
        $this->assertEquals(0,$helico->direction);
    }

    //board size : 20x/12y
    public function testCantBePlacedOutsideTheBoard() {
        $this->setExpectedException(apache\Classes\OutsideTheBoardException::class);
        $helico = new Helicoptere(221,2,0);
    }

    public function testCanTakeDamage() {
        $helico = new Helicoptere(1,2,0);
        $helico->takeDamage();
        $this->assertEquals(2,$helico->z);
    }

    public function testCantTakeDamageIfDead() {
        $this->setExpectedException(apache\Classes\AlreadyCrashedException::class);
        $helico = new Helicoptere(1,2,0);
        for($i=0;$i<3;$i++){
            $helico->takeDamage();
        }
        $this->assertEquals(0,$helico->z);
        $helico->takeDamage();
    }

    public function testReturnsTrueIfDeadWrongIfAlive() {
        $helico = new Helicoptere(1,2,0);
        $this->assertEquals(false, $helico->isDead());
        for($i=0;$i<3;$i++){
            $helico->takeDamage();
        }
        $this->assertTrue($helico->isDead());
    }

    public function testAttackingUsesTheRightOdds() {
        $attacker = new Helicoptere(1,1,0);
        $target = new Helicoptere(2,2,0);
        $this->assertEquals(2,$attacker->calculateOdds($target));
        //uses absolutes
        $this->assertEquals(2,$target->calculateOdds($attacker));
        //even with hp difference
        $target->takeDamage();
        $this->assertEquals(3,$attacker->calculateOdds($target));
    }

    public function testChangingTheDirectionOnlyIfRightAngles() {
        $this->setExpectedException(apache\Classes\InvalidAngleException::class);
        $helico = new Helicoptere(1,1,0);
        $helico->changeDirection(90);
        $this->assertEquals(90,$helico->direction);
        $helico->changeDirection(32);
    }

    public function testChangingTheDirectionWorksWithNegatives() {
        $helico = new Helicoptere(1,1,0);
        $helico->changeDirection(-90);
        $this->assertEquals(270,$helico->direction);
    }

    public function testCanMoveStraightAhead() {
        $helico = new Helicoptere(0,0,0);
        //default helicopter direction is 0 so straight ahead (y axis)
        $helico->move(1);
        $this->assertEquals(1,$helico->y);
        $this->assertEquals(0,$helico->x);
    }

    public function testCanMoveToTheRight() {
        //creating helicopter and orienting it to the right
        $helico = new Helicoptere(0,0,0);
        $helico->changeDirection(90);
        //move (right is +1x)
        $helico->move(1);
        $this->assertEquals(0,$helico->y);
        $this->assertEquals(1,$helico->x);
    }

    public function testCanMoveToTheLeft() {
        //creating helicopter and orienting it to the left
        $helico = new Helicoptere(2,2,0);
        $helico->changeDirection(-90);
        //move
        $helico->move(1);
        $this->assertEquals(2,$helico->y);
        $this->assertEquals(1,$helico->x);
    }

    public function testCanMoveBackwards() {
        //creating helicopter and orienting it backwards
        $helico = new Helicoptere(2,2,0);
        $helico->changeDirection(180);
        //move
        $helico->move(1);
        $this->assertEquals(180,$helico->direction);
        $this->assertEquals(1,$helico->y);
        $this->assertEquals(2,$helico->x);
    }

    public function testCantMoveOutsideTheBoard() {
        $this->setExpectedException(apache\Classes\OutsideTheBoardException::class);
        $helico = new Helicoptere(1,12,0);
        //move forward in y
        $helico->move(1);
    }

    public function testMovesTheCorrectDistance() {
        $helico = new Helicoptere(1,1,0);
        $helico->move(1);
        $this->assertEquals(2,$helico->y);
        $helico->move(2);
        $this->assertEquals(4,$helico->y);
        $helico->move(3);
        $this->assertEquals(7,$helico->y);
    }

    public function testCanMoveDiagonallyUpRight() {
        $helico = new Helicoptere(0,0,0);
        //orienting the helicopter to up right diagonal
        $helico->changeDirection(45);
        $helico->move(1);
        $this->assertEquals(1,$helico->x);
        $this->assertEquals(1,$helico->y);
        //check with different distance
        $helico->move(3);
        $this->assertEquals(4,$helico->x);
        $this->assertEquals(4,$helico->y);
    }

    public function testCanMoveDiagonallyDownRight() {
        $helico = new Helicoptere(2,2,0);
        //orienting the helicopter to down right diagonal
        $helico->changeDirection(135);
        $helico->move(1);
        $this->assertEquals(3,$helico->x);
        $this->assertEquals(1,$helico->y);
    }

    public function testCanMoveDiagonallyUpLeft() {
        $helico = new Helicoptere(2,2,0);
        //orienting the helicopter to up left diagonal
        $helico->changeDirection(-45);
        $helico->move(1);
        $this->assertEquals(1,$helico->x);
        $this->assertEquals(3,$helico->y);
    }

    public function testCanMoveDiagonallyDownLeft() {
        $helico = new Helicoptere(2,2,0);
        //orienting the helicopter to down left diagonal
        $helico->changeDirection(-135);
        $helico->move(1);
        $this->assertEquals(1,$helico->x);
        $this->assertEquals(1,$helico->y);
    }

}