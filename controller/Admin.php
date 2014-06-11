<?php

namespace controller;

use library;

class Admin extends library\Controller
{	

	public function __construct($application){
		if(!isset($_SESSION['admin']))
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
	}
	
	public function liste_entreprises()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$entreprises=$modelManager->getAll("Entreprise");
		if(!is_array($entreprises))
			$entreprises=array($entreprises);
	
		/*
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');*/
		
		$this->addVars(array('entreprises' => $entreprises));
		return 'liste_entreprises.php';
	}
	
	public function ajouter_agent()
	{
	
		return 'ajouter_agent.php';
	}
	public function ajout_entreprise()
	{
	
		return 'ajout_entreprise.php';
	}
	
	
}