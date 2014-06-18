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
	
	public function ajout_agent()
	{
		$modelManager = $this->getApplication()->getModelManager();
		if(isset($_POST['id_employe'])){
			$agentAModif=$modelManager->getOneByid_employe("Employe",$_POST['id_employe']);
			if($agentAModif!=null)
				$this->addVars(array('err' => 'Already exists employe id :' . $_POST['id_employe']));
			else{
				$agentTest=$modelManager->getNewModel("Employe",$_POST);
				$modelManager->addModel($agentTest);
			}
		}
		return 'ajouter_agent.php';
	}
	public function ajout_entreprise()
	{
		$modelManager = $this->getApplication()->getModelManager();
		if(isset($_POST['nom_entreprise'])){
			$entrepriseAModif=$modelManager->getOneBynom_entreprise("Entreprise",$_POST['nom_entreprise']);
			if($entrepriseAModif!=null)
				$this->addVars(array('err' => 'Already exists nom entreprise :' . $_POST['nom_entreprise']));
			else{
				$entrepriseAjout=$modelManager->getNewModel("Entreprise",$_POST);
				$modelManager->addModel($entrepriseAjout);
			}
		}
		return 'ajout_entreprise.php';
	}
	
	public function statistiques(){
		$statMod = new \model\Statistiques($this->getApplication());
		$locByType = $statMod->getLocByType();
		$colors = array("#1BBC9B","#2D3E50","#E64C66","#AEAEAE");
		$i=0;
		foreach($locByType as $key=>$loc){
			$locByType[$key]["color"]=$colors[$i%count($colors)];
			++$i;
		}
		$locTypeByDate=$statMod->getLocTypeByDate();
		$this->addVars(array('locByType' => $locByType));
		return "statistiques.php";
	}
	
}