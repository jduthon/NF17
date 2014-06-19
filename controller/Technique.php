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
		$this->addVars(array('vehicule'=>$vehicule,'statut'=>$statut));
		return 'liste_vehicules.php';
	}
	

	
	public function modificationVehicule($numero_immatriculation)
	{
		$modelManager = $this->getApplication()->getModelManager();
		$vehicule = $modelManager->getOneByNumero_immatriculation("Vehicule",$numero_immatriculation);
		$options = array('AC','GPS');
		$typemodif = 'modification';
		
		$this->addVars(array('vehicule' => $vehicule, 'options' => $options, 'typemodif' => $typemodif));
		return 'ajout_modification_vehicule.php';
	}
	
	public function ajoutVehicule()
	{
		$typemodif = 'ajout';
		
		$this->addVars(array('typemodif' => $typemodif));
		return 'ajout_modification_vehicule.php';
	}	
}