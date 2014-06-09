<?php

use Blackjack\Player;

class CardTest extends PHPUnit_Framework_TestCase
{
    public function testCardValid()
    {
        $player = new Player();
        $player->addCard('AC');
        $player->addCard('9D');
        $this->assertEquals(20, $player->getScore());

        $player->reset();
        $player->addCard('AC');
        $player->addCard('AH');
        $this->assertEquals(12, $player->getScore());

        $player->reset();
        $player->addCard('9C');
        $player->addCard('2D');
        $this->assertEquals(11, $player->getScore());
    }
}