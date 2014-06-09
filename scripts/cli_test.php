<?php

require_once '../lib/init.php';

echo 'Blackjack add test', "\n";

if ($argc < 3) {
    usage();
    exit;
}

$cards = array();
$cards[0] = $argv[1];
$cards[1] = $argv[2];

$player = new Blackjack\Player();

foreach ($cards as $card) {
    if (!$player->addCard($card)) {
        echo 'Card value "', $card, '" is not valid', "\n";
    }
}

echo 'Result score: ', $player->getScore(), "\n";


/**
 *
 * Displays usage message
 */
function usage() {
    echo "\n", 'USAGE: php ', basename(__FILE__), ' <CARD1> <CARD2>', "\n\n";
    echo 'where <CARD1> and <CARD2> is card value. The first part representing the face',
        'value from 2-10, plus A, K, Q, J. The second part represents the suit S, C, D, H.',
        "\n", 'EXAMPLE: php ', basename(__FILE__), ' 10S AH', "\n";
}