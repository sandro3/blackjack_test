<?php
/**
 * Class for Card
 *
 */

namespace Blackjack;

class Card
{
	protected $initArg;
	protected $faceValue;
	protected $suit;
	protected $valid;

	const INIT_ARG_REGEX = '/^([0-9AKQJ]{1,2})([SCDH])$/i';

    /**
     * @param string $initArg
     */
	public function __construct($initArg) {
		$this->Init($initArg);
	}

    /**
     * @return bool
     */
	public function isValid() {
		return $this->valid;
	}

    /**
     * @return int
     */
	public function getScore() {
	    if (preg_match('/^\d+$/', $this->faceValue)) {
	        return $this->faceValue;
	    }
	    else if ($this->isAce()) {
	        return 11;
	    }
	    else {
	        return 10;
	    }
	}

    /**
     * @return bool
     */
	public function isAce() {
	    return ($this->faceValue == 'A');
	}

    /**
     * @return bool
     */
	public function Init($arg = null) {
	    if (!is_null($arg)) {
	        $this->initArg = $arg;
	    }
		$this->valid = false;
		$m = array();
		if (preg_match(self::INIT_ARG_REGEX, $this->initArg, $m)) {
		    $this->valid = true;
		    if (preg_match('/^\d+$/', $m[1]) && ($m[1] < 2 || $m[1] > 11)) {
		        $this->valid = false;
    		}
		}
		if ($this->valid) {
    		$this->faceValue = strtoupper($m[1]);
	        $this->suit = $m[2];
	        return true;
		}
		else {
	        return false;
		}
	}
}