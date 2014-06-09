<?php

namespace controller;

use library;

class Admin extends library\Controller
{	
	public function liste_agents()
	{
		$agents[] = array('identifiant' => 01, 'fonction' => 'tech');
		$agents[] = array('identifiant' => 02, 'fonction' => 'com');
		$agents[] = array('identifiant' => 03, 'fonction' => 'com');
		
		$this->addVars(array('agents' => $agents));
		return 'liste_agents.php';
	}
	
	public function liste_entreprises()
	{
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');
		
		$this->addVars(array('entreprises' => $entreprises));
		return 'liste_entreprises.php';
	}
}