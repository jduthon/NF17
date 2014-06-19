<?php

namespace controller;

use library;

class Technique extends library\Controller
{	

	public function __construct($application){
		if(!isset($_SESSION['agent']))
			throw new \library\TommeException("You are not granted the rights to access this page\n");
		if(!$_SESSION['agent']->isTechnique())
			throw new \library\TommeException("You are not granted the rights to access this page\n");
		parent::__construct($application);
	}
		
	public function controleLocations()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$locations = $modelManager->getAll("Location");
		
		$post['id_location'] = !empty($_POST['id_location']) ? $_POST['niveau_carb'] : '';
		$post['niveau_carb'] = !empty($_POST['niveau_carb']) ? $_POST['niveau_carb'] : '';
		$post['km'] = !empty($_POST['km']) ? $_POST['km'] : '';
		$post['degats_eventuels'] = !empty($_POST['degats_eventuels']) ? $_POST['degats_eventuels'] : '';
		$montant = 0;
		
		$this->addVars(array('locations' => $locations, 'post' => $post, 'montant' => $montant));
		return 'controle_locations.php';
	}
	

	public function listeVehiculesTech()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$vehicule = $modelManager->getAll("Vehicule");
		$statut = 'technique';
		$this->addVars(array('vehicules'=>$vehicule,'statut'=>$statut));
		return 'liste_vehicules.php';
	}
	
	public function ajoutVehicule()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$categories=$modelManager->getAll("Categorie");
		$modeles=$modelManager->getAll("Modele");
		$typemodif = 'ajout';
		print_r($_POST);
		if(isset($_POST["numero_immatriculation"])){
			$modelManager = $this->getApplication()->getModelManager();
			$vehicule=$modelManager->getNewModel("Vehicule",array_merge($_POST,array("nom_agence" => "LoukoumKar")));
			$modelManager->addModel($vehicule);
		}
		$this->addVars(array('typemodif' => $typemodif,"categories" => $categories,"modeles" => $modeles));
		return 'ajout_modification_vehicule.php';
	}	
	
	public function formulaireReparation()
	{
		$immat = $_POST['numero_immatriculation'];
		$modelManager = $this->getApplication()->getModelManager();
		$entreprises = $modelManager->getAllBy("Entreprise",'rep');
		
		$vehicule = $modelManager->getOneByNumero_immatriculation("Vehicule",$immat);
		if(empty($vehicule))
			header("Location: ./");
		
		$this->addVars(array('entreprises'=>$entreprises, 'vehicule'=>$vehicule));
		return 'formulaire_reparation.php';
	}
}