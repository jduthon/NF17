<?php

namespace library;

class DoteException extends \Exception 
{
	public function __toString()
	{
		return 'Error : ' . $this->getMessage() . ' (thrown in ' . $this->getFile() . ' on line ' . $this->getLine() . ')';
	}
}