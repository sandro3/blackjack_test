<?php

use Blackjack\Card;

class CardTest extends PHPUnit_Framework_TestCase
{
    public function testCardValid()
    {
        $card = new Card('1S');
        $this->assertFalse($card->isValid());

        $card->Init('2S');
        $this->assertTrue($card->isValid());

        $card->Init('99H');
        $this->assertFalse($card->isValid());

        $card->Init('9R');
        $this->assertFalse($card->isValid());

        $card->Init('XC');
        $this->assertFalse($card->isValid());

        $card->Init('QH');
        $this->assertTrue($card->isValid());

        $card->Init('AS');
        $this->assertTrue($card->isValid());
    }

    public function testCardScore()
    {
        $card = new Card('8S');
        $this->assertEquals(8, $card->getScore());

        $card->Init('AS');
        $this->assertEquals(11, $card->getScore());

        $card->Init('QC');
        $this->assertEquals(10, $card->getScore());

        $card->Init('KD');
        $this->assertEquals(10, $card->getScore());
    }
}