<?php

namespace controller;

use library;

class General extends library\Controller
{
	public function accueil()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$vehicules = $modelManager->getAll("Vehicule");
		$categories = $modelManager->getAll("Categorie");
		
		//Sauvegarde des données du formulaire précédemment entrées
		$post['date_debut_loc'] = !empty($_POST['date_debut_loc']) ? $_POST['date_debut_loc'] : '';
		$post['date_fin_loc'] = !empty($_POST['date_fin_loc']) ? $_POST['date_fin_loc'] : '';
		$post['categorie'] = !empty($_POST['categorie']) ? $_POST['categorie'] : '';
		
		$this->addVars(array('post' => $post, 'categories' => $categories, 'vehicules' => $vehicules));
		return 'accueil.php';
	}
		
	public function connexion()
	{
		if(isset($_SESSION['user']))
			header("Location: ./");
	
		if(isset($_POST['identifiant']) && isset($_POST['password'])){
			$modelManager = $this->getApplication()->getModelManager();
			$client=$modelManager->getOneById_client("Client",$_POST['identifiant'],array("password_gestion_compte" => $_POST['password']));

			if($client!=null)
				$_SESSION['user']=$client;
			else
				$errs="Ces identifiants de connexion sont invalides";
			//$_SESSION['user']=$model;

			$_SESSION['type_connexion']="client";
		}
		
		$this->addVars(array('connexion_client' => true));

		if(isset($_SESSION['user'])){
			if(isset($_SESSION['fromReserver'])){
				unset($_SESSION['fromReserver']);
				header("Location: ./locations");
			} else
				header("Location: ./");
		}
		if(isset($errs))
			$this->addVars(array("errs" => $errs));

		return "connexion.php";
	}
	
	public function deconnexion()
	{
		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
			session_destroy();
			session_regenerate_id();
		}
		
		header("Location: ./");
	}
	
	public function connexionAgent()
	{
		if(isset($_POST['id_employe']) && isset($_POST['password'])){
			$modelManager = $this->getApplication()->getModelManager();
			$agent=$modelManager->getOneById_employe("Employe",$_POST['id_employe'],array("password" => $_POST['password']));
			if($agent!=null)
				$_SESSION['agent']=$agent;
			else
				$errs="Identifiants fournis invalides";
		}
		
		if(isset($_SESSION['agent']))
			if($_SESSION['agent']->isCommercial())
				header("Location: ./locations-commercial");
			else
				header("Location: ./controle-locations");
				//header("Location: ./");
		if(isset($errs))
			$this->addVars(array("errs" => $errs));
		return "connexion_agent.php";
	}
	
	public function deconnexionAgent()
	{
		if(isset($_SESSION['agent'])){
			unset($_SESSION['agent']);
			session_destroy();
			session_regenerate_id();
		}
		
		header("Location: ./");
	}
	
	public function connexionAdmin()
	{
		if(isset($_POST['adminName']) && isset($_POST['password'])){
			if($this->getApplication()->checkAdmin($_POST['adminName'],$_POST['password'])){
				$_SESSION['admin']=true;
			}
		}
		if(isset($_SESSION['admin']))
			header("Location: ./agents");
		return "connexionAdmin.php";
	}
	
	public function deconnexionAdmin()
	{
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
			session_destroy();
			session_regenerate_id();
		}
	
		header("Location: ./");
	}
	
	public function inscription($type_client)
	{
		$success="";
		$type_client = ($type_client == 'Pro') ? 'professionnel' : 'particulier';
	
		$post['prenom'] = !empty($_POST['prenom']) ? $_POST['prenom'] : '';
		$post['nom'] = !empty($_POST['nom']) ? $_POST['nom'] : '';
		$post['adresse'] = !empty($_POST['adresse']) ? $_POST['adresse'] : '';
		$post['ville'] = !empty($_POST['ville']) ? $_POST['ville'] : '';
		$post['jour_naissance'] = !empty($_POST['jour_naissance']) ? $_POST['jour_naissance'] : '';
		$post['mois_naissance'] = !empty($_POST['mois_naissance']) ? $_POST['mois_naissance'] : '';
		$post['annee_naissance'] = !empty($_POST['annee_naissance']) ? $_POST['annee_naissance'] : '';
		$post['telephone'] = !empty($_POST['telephone']) ? $_POST['telephone'] : '';
		$post['permis'] = !empty($_POST['permis']) ? $_POST['permis'] : '';
		$post['nom_entreprise'] = !empty($_POST['nom_entreprise']) ? $_POST['nom_entreprise'] : '';
		
		$modelManager=$this->getApplication()->getModelManager();
		$errs="";
		if(isset($_POST["id_client"])){
			$clientTest=$modelManager->getOneById_client("Client",$_POST["id_client"]);
			if($clientTest!=null)
				$errs="Cet identifiant existe déjà, merci d'en saisir un autre";
			else {
				$newClient=$modelManager->getNewModel("Client",$_POST);
				$newClient->setdate_inscription(date("Ymd"));
				$modelManager->addModel($newClient);
				try{
					if($type_client != "professionnel"){
						$m=strlen($_POST["mois_naissance"])==1?"0".$_POST["mois_naissance"]:$_POST["mois_naissance"];
						$j=strlen($_POST["jour_naissance"])==1?"0".$_POST["jour_naissance"]:$_POST["jour_naissance"];
						$dateNaiss=$_POST["annee_naissance"].$m.$j;
						$dateNaissTime = new \DateTime($dateNaiss);
						$dateNow = new \DateTime();
						$dateInterval = $dateNow->diff($dateNaissTime);
						$age=$dateInterval->y;
						if($age<21){
							$errs="Vous n'avez pas l'âge pour vous inscrire (21 ans)";
							$modelManager->deleteModel($newClient);
						}
						else{
							$newParticulier=$modelManager->getNewModel("Particulier",array_merge($_POST,array("id_part" => $_POST["id_client"],"date_naissance" => $dateNaiss)));
							$modelManager->addModel($newParticulier);
							$success="Vous êtes maintenant inscrit";
						}
					}
					else{
						$newProfessionnel=$modelManager->getNewModel("Professionnel",array_merge($_POST,array("id_pro" => $_POST["id_client"])));
						$modelManager->addModel($newProfessionnel);
						$success="Vous êtes maintenant inscrit";
					}
				} catch(\library\TommeException $e){
						$modelManager->deleteModel($newClient);
						throw $e;
				}
			}
		}
		$this->addVars(array('post' => $post, 'type_client' => $type_client, 'inscription' => true,'errs' => $errs,'success' => $success));
		return 'inscription.php';
	}
	
	public function reserver()
	{
		$modelManager = $this->application->getModelManager();
		if(empty($_POST['reserver']))
			header("Location: ./");
			
		$vehicule = $modelManager->getOneByNumero_immatriculation("Vehicule", $_POST['numero_immatriculation']);
		if(empty($vehicule))
			header("Location: ./");
		
		//Sauvegarde des données du formulaire précédemment entrées
		$post['date_debut_loc'] = !empty($_SESSION['post']['date_debut_loc']) ? $_SESSION['post']['date_debut_loc'] : '';
		$post['date_fin_loc'] = !empty($_SESSION['post']['date_fin_loc']) ? $_SESSION['post']['date_fin_loc'] : '';
		//$post['categorie'] = !empty($_POST['categorie']) ? $_POST['categorie'] : 
		
		$_SESSION['reserver']['date_debut_loc'] = $post['date_debut_loc'] ;
		$_SESSION['reserver']['date_fin_loc'] = $post['date_fin_loc'];
		$_SESSION['reserver']['numero_immatriculation'] = $vehicule->getnumero_immatriculation();
		
		if(!empty($post['date_debut_loc']) && !empty($post['date_fin_loc'])) {
			if(!isset($_SESSION['user'])){
				$_SESSION["fromReserver"]=true;
				header("Location: ./connexion");
			}
			else
				header("Location: ./locations");
		}
		
		$this->addVars(array('post' => $post, "vehicule" => $vehicule));
		return 'reservation.php';
	}
	
	public function recherche() 
	{
		$modelManager = $this->getApplication()->getModelManager();
		$categories = $modelManager->getAll("Categorie");
	
		//Sauvegarde des données du formulaire précédemment entrées
		$post['date_debut_loc'] = !empty($_POST['date_debut_loc']) ? $_POST['date_debut_loc'] : '';
		$post['date_fin_loc'] = !empty($_POST['date_fin_loc']) ? $_POST['date_fin_loc'] : '';
		$post['categorie'] = !empty($_POST['categorie']) ? $_POST['categorie'] : '';
		
		$_SESSION['post']['date_debut_loc'] = !empty($_POST['date_debut_loc']) ? $_POST['date_debut_loc'] : '';
		$_SESSION['post']['date_fin_loc'] = !empty($_POST['date_fin_loc']) ? $_POST['date_fin_loc'] : '';
		
		//Ajout des véhicules
		$vehicules = $modelManager->getAllBynom_categorie("Vehicule",$post['categorie']);
		if(!is_array($vehicules)) {
			if($vehicules!=null)
				$vehicules=array($vehicules);
		}
				
		$this->addVars(array('post' => $post, 'categories' => $categories, 'vehicules' => $vehicules));
		return 'recherche.php';
	}

	public function erreur()
	{
		return 'error.php';
	
	}
}