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
		if($_SESSION['user']->isParticulier())
			throw new \library\TommeException("You are not granted the rights to access this page\n");
			
		$modelManager = $this->getApplication()->getModelManager();
		
		if(isset($_POST["modifier"]) || isset($_POST["supprimer"])){
			$conducteurAModif=$modelManager->getOneByid_employe("Employe",$_POST['id_employe']);
			if($conducteurAModif==null)
				$this->addVars(array('err' => 'Probléme de conducteur, veuillez recommencer'));
			else{
				if($_POST["modifier"])
					$modelManager->updateModel($conducteurAModif);
				else
					$modelManager->deleteModel($conducteurAModif);
			}
		}
		
		$listeCond = $modelManager->getAllById_pro("Liste_conducteurs",$_SESSION['user']->getid_client());
		if(!is_array($listeCond) && !empty($listeCond)){
			$listeCond=array($listeCond);
			foreach($listeCond as $key=>$value)
				$conducteurs[$key] = $value;
		}
		
		/*
		$conducteurs[] = array('nom' => 'pute', 'prenom' => 'jean', 'numero_permis' => 7658, 'id_conducteur' => '');
		$conducteurs[] = array('nom' => 'biatch', 'prenom' => 'Erwan', 'numero_permis' => 7658, 'id_conducteur' => '');
		$conducteurs[] = array('nom' => 'Salope', 'prenom' => 'Antoine', 'numero_permis' => 7658, 'id_conducteur' => '');*/
		if(isset($conducteurs))
			$this->addVars(array('conducteurs' => $conducteurs));
		return 'liste_conducteurs.php';
	}
	
	public function listeLocations()
	{
		$modelManager = $this->getApplication()->getModelManager();
		
		if(!empty($_POST['valider'])) {
			foreach($_SESSION['locations'] as $i => $location) {
				if($location->getVehicule()->getnumero_immatriculation() == $_POST['numero_immatriculation']){
					$lastId=$modelManager->find("Facture",null,array("id_facture" => "desc"),1);
					$location->getContrat()->getFacture()->setid_facture($lastId->getid_facture()+1);
					$lastId=$modelManager->find("Contrat_de_location",null,array("num_contrat" => "desc"),1);
					$location->getContrat()->setnum_contrat($lastId->getnum_contrat()+1);
					$location->getContrat()->setid_facture($location->getContrat()->getFacture()->getid_facture());
					$lastId=$modelManager->find("Location",null,array("id_location" => "desc"),1);
					$location->setid_location($lastId->getid_location()+1);
					$location->setid_client($_SESSION['user']->getid_client());
					$location->setnum_contrat($location->getContrat()->getnum_contrat());
					$modelManager->addModel($location->getContrat()->getFacture());
					$modelManager->addModel($location->getContrat());
					$modelManager->addModel($location);
					unset($_SESSION['locations'][$i]);
					}
			}
		}
			
		
		
		$locations = $modelManager->getAllById_client("Location",$_SESSION['user']->getid_client());
		if(!is_array($locations))
			$locations = array($locations);
			
		if(!empty($_SESSION['reserver']) && !empty($_SESSION['reserver']['date_debut_loc']) && !empty($_SESSION['reserver']['date_fin_loc']) && !empty($_SESSION['reserver']['numero_immatriculation']))
		{
			$doublon = false;
			if(isset($_SESSION['locations']))
				if(is_array($_SESSION['locations']))
					foreach($_SESSION['locations'] as $location) {
						if($location->getVehicule()->getnumero_immatriculation() == $_SESSION['reserver']['numero_immatriculation'])
							$doublon = true;
					}
			
			if ($doublon == false) {
				$location = $modelManager->getNewModel('Location', $_SESSION['reserver']);
				$contrat = $modelManager->getNewModel('Contrat_de_location', $_SESSION['reserver']);
				$facture = $modelManager->getNewModel('Facture', array());
				$contrat->setFacture($facture);
				$location->setContrat($contrat);
				$location->setConfirmation(false);
				
				$_SESSION['locations'][] = $location;
			}
			unset($_SESSION['reserver']);
		}
		
		if(!empty($_POST['annuler'])) {
			foreach($_SESSION['locations'] as $i => $location) {
				if($location->getVehicule()->getnumero_immatriculation() == $_POST['numero_immatriculation'])
					unset($_SESSION['locations'][$i]);
			}
		}
		
		
		if(!empty($_SESSION['locations']))
			$locations = array_merge($locations,$_SESSION['locations']);
			
		$this->addVars(array('locations' => $locations));
		return 'liste_locations.php';
	}
	
	public function location()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$location = null;
		
		if(!empty($_POST['num_contrat'])) {
			$num_contrat = $_POST['num_contrat'];
			$location = $modelManager->getOneByNum_contrat("Location",$num_contrat);
		} else if (!empty($_POST['numero_immatriculation'])) {
			foreach($_SESSION['locations'] as &$loc) {
				if($loc->getVehicule()->getnumero_immatriculation() == $_POST['numero_immatriculation'])
				{	
					if(!empty($_POST['moyen_paiement'])) {
						$loc->getContrat()->getFacture()->setmoyen_de_paiement($_POST['moyen_paiement']);
					}
					if(!empty($_POST['date_debut_loc'])) {
						$loc->getContrat()->setdate_debut_loc($_POST['date_debut_loc']);
					}					
					if(!empty($_POST['date_fin_loc'])) {
						$loc->getContrat()->setdate_fin_loc($_POST['date_fin_loc']);
					}
					if(!empty($_POST['vehicule'])) {
						$loc->setnumero_immatriculation($_POST['vehicule']);
						$loc->setVehicule($modelManager->getOneByNumero_immatriculation("Vehicule", $_POST['vehicule']));
					}
					
					$location = $loc;					
				}
			}
		}
		
		if($location == null)
			header("Location: ./");
			
		$vehicules = $modelManager->getAll("Vehicule");
		
		if($_SESSION['user']->isProfessionnel())
			$conducteurs = $modelManager->getOneById_proById_location("Liste_conducteurs",array('id_pro' => $_SESSION['user']->getid_client(), 'id_location' => $location->getid_location()));
			
		print_r($conducteurs);
		
		$this->addVars(array('location' => $location, 'professionnel' => $_SESSION['user']->isProfessionnel(), 'vehicules' => $vehicules, 'moyens_paiements' => array("Cheque","Carte bancaire","Especes")));
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
		} else if (isset($_POST['nom_entreprise'])){
			foreach($_POST as $key=>$value){
				if(method_exists($_SESSION['user'],"set" . $key))
					call_user_func(array($_SESSION['user'],"set" . $key),$value);
				else if(method_exists($_SESSION['user']->getProfessionnel(),"set" . $key)){
					call_user_func(array($_SESSION['user']->getProfessionnel(),"set" . $key),$value);
				}
			}
			$modelManager->updateModel($_SESSION['user']);
			$modelManager->updateModel($_SESSION['user']->getProfessionnel());
		}
		
		$this->addVars(array('client' => $_SESSION['user']));
		return 'compte_client.php';
	}
}