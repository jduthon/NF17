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
		$success='';
		$modelManager = $this->getApplication()->getModelManager();
		
		if(isset($_POST['modifier'])){
			$agentAModif=$modelManager->getOneByid_employe("Employe",$_POST['id_employe']);
			if($agentAModif==null)
				$this->addVars(array('err' => 'Invalid employe id :' . $_POST['id_employe']));
			else{
				$agent=$modelManager->getNewModel("Employe",$_POST);
				$modelManager->updateModel($agent);
				$success='Agent modifié';
			}
		}
		
		if(isset($_POST['supprimer'])){
			$agentAModif=$modelManager->getOneByid_employe("Employe",$_POST['id_employe']);
			if($agentAModif==null)
				$this->addVars(array('err' => 'Invalid employe id :' . $_POST['id_employe']));
			else{
				$agent=$modelManager->getNewModel("Employe",$_POST);
				$modelManager->deleteModel($agent);
				$success = 'Agent supprimé';
			}
		}
		
		$agents = $modelManager->getAll("Employe");
		if(!is_array($agents))
			$agents=array($agents);
		
		
		$this->addVars(array('agents' => $agents,'success' => $success));
		return 'liste_agents.php';
	}
	
	public function liste_entreprises()
	{
		$modelManager = $this->getApplication()->getModelManager();
		
		if(isset($_POST['modifier'])){
			$entrepriseAModif=$modelManager->getOneByNom_entreprise("Entreprise",$_POST['nom_entreprise']);
			if($entrepriseAModif==null)
				$this->addVars(array('err' => 'Invalid entreprise name :' . $_POST['nom_entreprise']));
			else{
				$entreprise=$modelManager->getNewModel("Entreprise",$_POST);
				$modelManager->updateModel($entreprise);
				$success="Modifications effectuées";
				}
		}
		
		if(isset($_POST['supprimer'])){
			$entrepriseAModif=$modelManager->getOneByNom_entreprise("Entreprise",$_POST['nom_entreprise']);
			if($entrepriseAModif==null)
				$this->addVars(array('err' => 'Invalid entreprise name :' . $_POST['nom_entreprise']));
			else{
				$entreprise=$modelManager->getNewModel("Entreprise",$_POST);
				$modelManager->deleteModel($entreprise);
				$success="Entreprise supprimée";
			}
		}
		
		$entreprises=$modelManager->getAll("Entreprise");
		$success="";
		if(!is_array($entreprises))
			$entreprises=array($entreprises);
			
		
		
		$this->addVars(array('entreprises' => $entreprises,'success' => $success));
		return 'liste_entreprises.php';
	}
	
	public function ajout_agent()
	{
		$success='';
		$modelManager = $this->getApplication()->getModelManager();
		if(isset($_POST['id_employe'])){
			$agentAModif=$modelManager->getOneByid_employe("Employe",$_POST['id_employe']);
			if($agentAModif!=null)
				$this->addVars(array('err' => 'Already exists employe id :' . $_POST['id_employe']));
			else{
				$agent=$modelManager->getNewModel("Employe",$_POST);
				$modelManager->addModel($agent);
				$success = 'Agent ajouté';
			}
		}
		$this->addVars(array('success' => $success));
		return 'ajout_agent.php';
	}
	public function ajout_entreprise()
	{
		$success="";
		$modelManager = $this->getApplication()->getModelManager();
		if(isset($_POST['nom_entreprise'])){
			$entrepriseAModif=$modelManager->getOneBynom_entreprise("Entreprise",$_POST['nom_entreprise']);
			if($entrepriseAModif!=null)
				$this->addVars(array('err' => 'Already exists nom entreprise :' . $_POST['nom_entreprise']));
			else{
				$entrepriseAjout=$modelManager->getNewModel("Entreprise",$_POST);
				$modelManager->addModel($entrepriseAjout);
				$success="Entreprise ajoutée";
			}
		}
		$this->addVars(array('success' => $success));
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