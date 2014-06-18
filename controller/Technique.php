<?php

namespace controller;

use library;

class Technique extends library\Controller
{	

	/*public function __construct($application){
		if(!isset($_SESSION['technique']))
			throw new \library\TommeException("You are not granted the rights to access this page\n");
		parent::__construct($application);
	}
	
	public function liste_agents()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$agents=$modelManager->getAll("Employe");
		if(!is_array($agents))
			$agents=array($agents);
		if(isset($_POST['modifier'])){
			$agentAModif=$modelManager->getOneByid_employe("Employe",$_POST['id_employe']);
			if($agentAModif==null)
				$this->addVars(array('err' => 'Invalid employe id :' . $_POST['id_employe']));
			else{
				$agentTest=$modelManager->getNewModel("Employe",$_POST);
				$modelManager->updateModel($agentTest);
			}
		}
		if(isset($_POST['supprimer'])){
			$agentAModif=$modelManager->getOneByid_employe("Employe",$_POST['id_employe']);
			if($agentAModif==null)
				$this->addVars(array('err' => 'Invalid employe id :' . $_POST['id_employe']));
			else{
				$agentTest=$modelManager->getNewModel("Employe",$_POST);
				$modelManager->deleteModel($agentTest);
			}
		}
		
		$this->addVars(array('agents' => $agents));
		return 'liste_agents.php';
	}*/
	
	public function ajoutModificationVehicule()
	{
		
		return 'ajout_modification_vehicule.php';
	}
	

	
}