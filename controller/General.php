<?php

namespace controller;

use library;

class General extends library\Controller
{
	public function accueil()
	{	
		$categories = array('citadine', 'berline', '4X4 SUV', 'break', 'pickup', 'utilitaire');
		
		$this->addVars(array('categories' => $categories));
		return 'accueil.php';
	}	
	
	public function connexion()
	{
		$this->addVars(array('connexion_client' => true));
		return 'connexion.php';
	}
	
	public function inscription()
	{
		$this->addVars(array('type_client' => 'particulier'));
		return 'inscription.php';
	}
	
	public function liste_conducteurs()
	{
		return 'liste_conducteurs.php';
	}
	
	public function liste_agents()
	{
		return 'liste_agents.php';
	}
	
	public function liste_entreprises()
	{
		return 'liste_entreprises.php';
	}
}