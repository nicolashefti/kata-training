<?php

class Game
{
    /** @var Integer */
    private $score;

    /** @var  Integer[] */
    private $rolls;

    function __construct()
    {
        $this->rolls = [];
    }

    /**
     * @param Integer $pins
     */
    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $rollIndex = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->rolls[$rollIndex] === 10) { // strike
                $score += 10 + $this->rolls[$rollIndex + 1] + $this->rolls[$rollIndex + 2];
                $rollIndex += 1;
            } else if ($this->isSpare($frame)) {
                $score += 10 + $this->rolls[$rollIndex + 2];
                $rollIndex += 2;
            } else {
                $score += $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
                $rollIndex += 2;
            }
        }

        return $score;
    }

    /**
     * @param $rollIndex
     * @return bool
     */
    private function isSpare($rollIndex)
    {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1] === 10;
    }
}
