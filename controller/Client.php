<?php

namespace controller;

use library;

class Client extends library\Controller
{
	public function __construct($application){
		if(!isset($_SESSION['user']))
			throw new \library\TommeException("You are not granted the rights to access this page\n");
		parent::__construct($application);
	}

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
		$vehicules = array('206', 'Golf', 'Tractoor');
		$moyens_paiements = array('CB', 'Chèque', 'Espèces');
	
		$locations[] = array('num_contrat' => 'c1', 'vehicule' => '206', 'date_debut_loc' => 'tapin', 'date_fin_loc' => 'tapin', 'montant' => 100, 'moyen_paiement' => 'CB', 'etat' => 'Réservé');
		$locations[] = array('num_contrat' => '1234', 'vehicule' => 'Tractoor', 'date_debut_loc' => 'tapin', 'date_fin_loc' => 'tapin', 'montant' => 340, 'moyen_paiement' => 'chèque', 'etat' => 'Validé');
		$locations[] = array('num_contrat' => 'contrat42', 'vehicule' => 'Golf', 'date_debut_loc' => 'tapin', 'date_fin_loc' => 'tapin', 'montant' => 5099, 'moyen_paiement' => 'espèces', 'etat' => 'Passé');
		
		$this->addVars(array('locations' => $locations, 'vehicules' => $vehicules, 'moyens_paiements' => $moyens_paiements));
		return 'liste_locations.php';
	}
	
	public function location($num_contrat)
	{
		$location = array('num_contrat' => '1234', 'vehicule' => 'tapin', 'date_debut_loc' => '20/05/2014', 'date_fin_loc' => '24/05/2014', 'montant' => 840.13, 'etat' => 'Validé',
						'moyen_paiement' => 'CB', 'seuil_km' => 250, 'kilometrage' => 1250.85, 'date_reglement' => '25/05/2014',
						'frais_supplementaires' => 670.13, 'depassement_km' => 1000.85, 'reparations' => 1000.50, 'penalites' => 'suce des bites en enfer', 'essence' => 200);
		$location['num_contrat'] = $num_contrat;
		$location['conducteurs'][] = array('nom' => 'Connard', 'prenom' => 'Odieux', 'copie_permis' => '666');
		$location['conducteurs'][] = array('nom' => 'Bismuth', 'prenom' => 'Paul', 'copie_permis' => 'cass toi pov\'con');
		
		$this->addVars(array('location' => $location, 'professionnel' => true));
		return 'location.php';
	}
}