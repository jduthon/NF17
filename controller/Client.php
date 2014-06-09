<?php

namespace controller;

use library;

class Client extends library\Controller
{
	public function liste_conducteurs()
	{
		$conducteurs[] = array('nom' => 'pute', 'prenom' => 'jean', 'numero_permis' => 7658);
		$conducteurs[] = array('nom' => 'biatch', 'prenom' => 'Erwan', 'numero_permis' => 7658);
		$conducteurs[] = array('nom' => 'Salope', 'prenom' => 'Antoine', 'numero_permis' => 7658);
		
		$this->addVars(array('conducteurs' => $conducteurs));
		return 'liste_conducteurs.php';
	}
	
	public function liste_locations()
	{
		$locations[] = array('id_location' => 'pute', 'voiture' => 'tapin', 'date_debut_loc' => 'tapin', 'date_fin_loc' => 'tapin', 'etat' => 'lala');
		$locations[] = array('id_location' => 'pute', 'voiture' => 'tapin', 'date_debut_loc' => 'tapin', 'date_fin_loc' => 'tapin', 'etat' => 'lala');
		$locations[] = array('id_location' => 'pute', 'voiture' => 'tapin', 'date_debut_loc' => 'tapin', 'date_fin_loc' => 'tapin', 'etat' => 'lala');
		
		$this->addVars(array('locations' => $locations));
		return 'liste_locations_particulier.php';
	}
}