<?php

namespace controller;

use library;

class General extends library\Controller
{
	public function accueil()
	{		
		$this->addVars();
		return 'accueil.php';
	}	
	
	public function connexion()
	{		
		$this->addVars();
		return 'connexion.php';
	}
}