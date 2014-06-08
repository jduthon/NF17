<?php

namespace controller;

use library;

class General extends library\Controller
{
	public function accueil()
	{		
		return 'accueil.php';
	}	
	
	public function connexion()
	{
		$this->addVars(array('connexion_client' => true));
		return 'connexion.php';
	}
	
	public function inscription()
	{
		$this->addVars(array('type_client' => 'professionnel'));
		return 'inscription.php';
	}
	
	public function liste_pros()
	{
		return 'liste_pro.php';
	}
	
	public function liste_agents()
	{
		return 'liste_agent.php';
	}
	
	public function liste_entreprises()
	{
		return 'liste_entreprise.php';
	}
}