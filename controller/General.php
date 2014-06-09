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
		$conducteurs[] = array('nom' => 'pute', 'prenom' => 'jean','Numéro de permis' => 7658);
		$conducteurs[1] = array('nom' => 'biatch', 'prenom' => 'Erwan','Numéro de permis' => 7658);
		$conducteurs[2] = array('nom' => 'Salope', 'prenom' => 'Antoine','Numéro de permis' => 7658);
		
		
		$this->addVars(array('conducteurs' => $conducteurs));
		return 'liste_conducteurs.php';
	}
	
	public function liste_agents()
	{
		$agents[] = array('identifiant' => 01, 'fonction' => 'tech');
		$agents[1] = array('identifiant' => 02, 'fonction' => 'com');
		$agents[2] = array('identifiant' => 03, 'fonction' => 'com');
		
		
		$this->addVars(array('agents' => $agents));
		return 'liste_agents.php';
	}
	
	public function liste_entreprises()
	{
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[1] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[2] = array('nom' => 'pute', 'fonction' => 'tapin');
		
		
		$this->addVars(array('entreprises' => $entreprises));
		return 'liste_entreprises.php';
	}
	public function liste_location_particulier()
	{
		$locations[] = array('id location' => 'pute', 'voiture' => 'tapin','date debut' => 'tapin' ,'date fin' => 'tapin', 'etat' => 'lala');
		$locations[1] = array('id location' => 'pute', 'voiture' => 'tapin','date debut' => 'tapin' ,'date fin' => 'tapin', 'etat' => 'lala');
		$locations[2] = array('id location' => 'pute', 'voiture' => 'tapin','date debut' => 'tapin' ,'date fin' => 'tapin', 'etat' => 'lala');
		
		
		$this->addVars(array('locations' => $locations));
		return 'liste_location_particulier.php';
	}
	
	
	
	
}