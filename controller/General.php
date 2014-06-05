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
	
	public function formulaire_client()
	{
	$this->addVars();
	return 'formulaire_client.php';
	}
	
	public function liste_pro()
	{
	$this->addVars();
	return 'liste_pro.php';
	}
	
	public function liste_agent()
	{
	$this->addVars();
	return 'liste_agent.php';
	}
	
	public function liste_entreprise()
	{
	$this->addVars();
	return 'liste_entreprise.php';
	}
}