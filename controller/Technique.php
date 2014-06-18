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
	
	public function gestionVehicule()
	{
		return 'gestion_vehicule.php';
	}
	
	public function ajoutModificationVehicule()
	{
		
		return 'ajout_modification_vehicule.php';
	}
	
}