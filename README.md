Blackjack Test
==============

Program which accepts two inputs, representing two playing cards out of a standard 52 card deck. Add these two cards together to produce a blackjack score, and print the score on the screen for the output.
Cards will be identified by the input, the first part representing the face value from 2-10, plus A, K, Q, J. The second part represents the suit S, C, D, H.
The blackjack score is the face value of the two cards added together, with cards 2-10 being the numeric face value, and A is worth 11, and K, Q, J are each worth 10.

How to use
----------
```
cd scripts
php cli_test.php 10S QH
```

Examples
--------
```
$ php cli_test.php AS 9H
Blackjack add test
Result score: 20
$ php cli_test.php 2C 10H
Blackjack add test
Result score: 12
$ php cli_test.php 2C QH
Blackjack add test
Result score: 12
$ php cli_test.php AC AH
Blackjack add test
Result score: 12
$ php cli_test.php AC QH
Blackjack add test
Result score: 21
```
