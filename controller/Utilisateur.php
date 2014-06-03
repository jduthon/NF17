<?php

namespace controller;

use library;

class Utilisateur extends library\Controller
{
	public function connexion()
	{		
		$this->addVars(array());
		return 'connexion.php';
	}	
}