<?php

namespace library;

/*
 * Implements the Exception class.
 */

class TommeException extends \Exception 
{
	public function __toString()
	{
		return 'Error : ' . $this->getMessage() . ' (thrown in ' . $this->getFile() . ' on line ' . $this->getLine() . ')';
	}
}