<?php

class BowlingGameTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Game */
    private $game;

    public function setup()
    {
        parent::setup();

        $this->game = new Game();
    }

    public function testGutterGame()
    {
        $this->rollMany(20, 0);

        $this->assertEquals($this->game->score(), 0);
    }

    public function testAllOne()
    {
        $this->rollMany(20, 2);

        $this->assertEquals($this->game->score(), 40);
    }

    public function testOneSpare()
    {
        $this->rollSpare();
        $this->game->roll(2);
        $this->rollMany(17, 0);

        $this->assertEquals($this->game->score(), 14);
    }

    public function testOneStrike(){
        $this->game->roll(10);
        $this->game->roll(3);
        $this->game->roll(4);
        $this->rollMany(16, 0);

        $this->assertEquals($this->game->score(), 24);
    }

    public function testPerfectGame(){
        $this->rollMany(12, 10);

        $this->assertEquals($this->game->score(), 300);
    }


    private function rollMany($rollNumber, $score)
    {
        for ($round = 0; $round < $rollNumber; $round++) {
            $this->game->roll($score);
        }
    }

    private function rollSpare()
    {
        $this->game->roll(5);
        $this->game->roll(5);
    }
}
