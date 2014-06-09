<?php
/**
 * Class for Player
 *
 */

namespace Blackjack;

use Blackjack\Card;

class Player
{
    private $cards = array();

    /**
     *
     * Adds the card
     * @param mixed $card
     * @return bool
     */
    public function addCard($card) {
        if (!$card instanceof Card) {
            $card = new Card($card);
        }
        if ($card->isValid()) {
            $this->cards[] = $card;
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
        foreach ($this->cards as $card) {
            if ($card->isAce() && $score + 11 > 21) {
                $score += 1;
            }
            else {
                $score += $card->getScore();
            }
        }
        return $score;
    }

    /**
     *
     * Resets player cards
     */
    public function reset() {
        unset ($this->cards);
        $this->cards = array();
    }

}