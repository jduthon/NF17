<?php

namespace controller;

use library;

class Technique extends library\Controller
{	

	public function __construct($application){
		/*if(!isset($_SESSION['technique']))
			throw new \library\TommeException("You are not granted the rights to access this page\n");*/
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
	
	public function gestionVehicules()
	{
		return 'gestion_vehicules.php';
	}
	
	public function gestionVehicule($numero_imatriculation)
	{
		$modelManager = $this->getApplication()->getModelManager();
		$vehicules = $modelManager->getAll("Vehicule");
		$options = array('AC','GPS');
		$typemodif = 'modification';
		
		$this->addVars(array('vehicule' => $vehicules[0], 'options' => $options, 'typemodif' => $typemodif));
		return 'ajout_modificatio_vehicule.php';
	}
	
	public function ajoutVehicule()
	{
		$typemodif = 'ajout';
		
		$this->addVars(array('typemodif' => $typemodif));
		return 'ajout_modificatio_vehicule.php';
	}	
}