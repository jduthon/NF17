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
		$locations = $modelManager->getAllById_client("Location",$_SESSION['user']->getid_client());
		if(!is_array($locations))
			$locations = array($locations);
			
		if(!empty($_SESSION['locations']))
			$locations = array_merge($locations,$_SESSION['locations']);
		
		echo '<pre>';
		print_r($locations);
		echo '</pre>';
		
		$this->addVars(array('locations' => $locations));
		return 'liste_locations.php';
	}
	
	public function location($num_contrat)
	{
		$modelManager = $this->getApplication()->getModelManager();
		$location=$modelManager->getOneByNum_contrat("Location",$num_contrat);
		$vehicules=$modelManager->getAll("Vehicule");
		
		if($location==null){
			//TODO
		}
		
		$this->addVars(array('location' => $location,'professionnel' => false,'vehicules' => $vehicules,'moyens_paiements' => array("Cheque","Carte bancaire","Especes")));
		return 'location.php';
	}
	
	public function ajoutLocation()
	{
		echo '<pre>';
		if(empty($_SESSION['reserver']) || empty($_SESSION['reserver']['date_debut_loc']) || empty($_SESSION['reserver']['date_fin_loc']) || empty($_SESSION['reserver']['numero_immatriculation']))
			header("Location: ./");
		
		$modelManager = $this->getApplication()->getModelManager();
		
		$location = $modelManager->getNewModel('Location', $_SESSION['reserver']);
		// $contrat = $modelManager->getNewModel('Contrat_de_location', $_SESSION['reserver']);
		// $location->setContrat($contrat);
		// $location->setConfirmation(false);
		
		//$_SESSION['locations'][] = $location;
		//unset($_SESSION['reserver']);
		
		echo '<pre>';
		print_r($_SESSION);
		echo '</pre>';
		
		//header("Location: ./locations");
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