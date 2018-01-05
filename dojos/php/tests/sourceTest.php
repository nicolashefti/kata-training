<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Game
 */
final class GameTest extends TestCase
{
    public function testClassExists()
    {
        $this->assertTrue(class_exists('Game'));
    }
}
