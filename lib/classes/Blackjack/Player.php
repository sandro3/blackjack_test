<?php
/**
 * Class for Player
 *
 */

namespace Blackjack;

use Blackjack\Card;

class Player
{
    private $_cards = array();

    /**
     *
     * Adds the card
     * @param mixed $card
     */
    public function addCard($card) {
        if (!$card instanceof Card) {
            $card = new Card($card);
        }
        if ($card->isValid()) {
            $this->_cards[] = $card;
            return true;
        }
        else {
            return false;
        }
    }

    /**
     *
     * Calculates total score
     * @return int
     */
    public function getScore() {
        $score = 0;
        foreach ($this->_cards as $card) {
            if ($card->isAce() && $score + 11 > 21) {
                $score += 1;
            }
            else {
                $score += $card->getScore();
            }
        }
        return $score;
    }

}
