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

	public function listeConducteurs()
	{
		$conducteurs[] = array('nom' => 'pute', 'prenom' => 'jean', 'numero_permis' => 7658, 'id_conducteur' => '');
		$conducteurs[] = array('nom' => 'biatch', 'prenom' => 'Erwan', 'numero_permis' => 7658, 'id_conducteur' => '');
		$conducteurs[] = array('nom' => 'Salope', 'prenom' => 'Antoine', 'numero_permis' => 7658, 'id_conducteur' => '');
		
		$this->addVars(array('conducteurs' => $conducteurs));
		return 'liste_conducteurs.php';
	}
	
	public function listeLocations()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$locations=$modelManager->getAllById_client("Location",$_SESSION['user']->getid_client());
		if(!is_array($locations))
			$locations=array($locations);
		//$locations[] = array('num_contrat' => 'c1', 'vehicule' => '206', 'date_debut_loc' => '26/06/2014', 'date_fin_loc' => '27/06/2014', 'montant' => 100, 'moyen_paiement' => 'CB', 'etat' => 'A valider');
		//$locations[] = array('num_contrat' => 'contrat42', 'vehicule' => 'Golf', 'date_debut_loc' => '16/03/2012', 'date_fin_loc' => '16/05/2012', 'montant' => 5099, 'moyen_paiement' => 'espèces', 'etat' => 'Passé');
		//$locations[] = array('num_contrat' => '1234', 'vehicule' => 'Tractoor', 'date_debut_loc' => '25/05/2013', 'date_fin_loc' => '16/06/2015', 'montant' => 340, 'moyen_paiement' => 'chèque', 'etat' => 'Validé');
		
		$this->addVars(array('locations' => $locations));
		return 'liste_locations.php';
	}
	
	public function location($num_contrat)
	{
		$modelManager = $this->getApplication()->getModelManager();
		$location=$modelManager->getOneByNum_contrat("Location",$num_contrat);
		$vehicules=$modelManager->getAll("Vehicule");
		//$vehicules = array('206', 'Golf', 'Tractoor');
		//$moyens_paiements = array('CB', 'Chèque', 'Espèces');
	
		//$location = array('vehicule' => 'tapin', 'date_debut_loc' => '20/05/2014', 'date_fin_loc' => '24/05/2014', 'montant' => 840.13, 'etat' => 'Validé',
		//				'moyen_paiement' => 'CB', 'seuil_km' => 250, 'kilometrage' => 1250.85, 'date_reglement' => '25/05/2014',
		//				'frais_supplementaires' => 670.13, 'depassement_km' => 1000.85, 'reparations' => 1000.50, 'penalites' => 'suce des bites en enfer', 'essence' => 200);
		//$location['num_contrat'] = $num_contrat;
		//if($num_contrat == 'contrat42')
		//	$location['etat'] = 'Passé';
		
		//$location['conducteurs'][] = array('nom' => 'Connard', 'prenom' => 'Odieux', 'copie_permis' => '666');
		//$location['conducteurs'][] = array('nom' => 'Bismuth', 'prenom' => 'Paul', 'copie_permis' => 'cass toi pov\'con');
		
		//$this->addVars(array('location' => $location, 'vehicules' => $vehicules, 'moyens_paiements' => $moyens_paiements, 'professionnel' => true));
		if($location==null){
			//TODO
		}
		$this->addVars(array('location' => $location,'professionnel' => false,'vehicules' => $vehicules,'moyens_paiements' => array("Cheque","Carte bancaire","Especes")));
		return 'location.php';
	}
	
	public function compte()
	{
		$modelManager = $this->getApplication()->getModelManager();
		if(isset($_POST['nom'])){
			foreach($_POST as $key=>$value){
				if(method_exists($_SESSION['user'],"set" . $key))
					call_user_func(array($_SESSION['user'],"set" . $key),$value);
				else if(method_exists($_SESSION['user']->getParticulier(),"set" . $key))
					call_user_func(array($_SESSION['user']->getParticulier(),"set" . $key),$value);
			}
			$modelManager->updateModel($_SESSION['user']);
			$modelManager->updateModel($_SESSION['user']->getParticulier());
		}
		$this->addVars(array('client' => $_SESSION['user']));
		return 'compte_client.php';
	}
}