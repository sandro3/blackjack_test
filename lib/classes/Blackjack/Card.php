<?php
/**
 * Class for Card
 *
 */

namespace Blackjack;

class Card
{
	private $_initArg;
	private $_faceValue;
	private $_suit;
	private $_valid;

	const INIT_ARG_REGEX = '/^([0-9AKQJ]{1,2})([SCDH])$/i';

	public function __construct($initArg) {
		$this->Init($initArg);
	}

	public function isValid() {
		return $this->_valid;
	}

	public function getScore() {
	    if (preg_match('/^\d+$/', $this->_faceValue)) {
	        return $this->_faceValue;
	    }
	    else if ($this->isAce()) {
	        return 11;
	    }
	    else {
	        return 10;
	    }
	}

	public function isAce() {
	    return ($this->_faceValue == 'A');
	}

	public function Init($arg = null) {
	    if (!is_null($arg)) {
	        $this->_initArg = $arg;
	    }
		$this->_valid = false;
		$m = array();
		if (preg_match(self::INIT_ARG_REGEX, $this->_initArg, $m)) {
		    $this->_valid = true;
		    if (preg_match('/^\d+$/', $m[1]) && ($m[1] < 2 || $m[1] > 11)) {
		        $this->_valid = false;
    		}
		}
		if ($this->_valid) {
    		$this->_faceValue = strtoupper($m[1]);
	        $this->_suit = $m[2];
	        return true;
		}
		else {
	        return false;
		}
	}
}