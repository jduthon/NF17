<?php

namespace controller;

use library;

class General extends library\Controller
{
	public function accueil()
	{
		$modelManager = $this->getApplication()->getModelManager();
		$vehicules=$modelManager->getAll("Vehicule");
		$categories=$modelManager->getAll("Categorie");
		
		/*
		//Ajout des véhicules
		$vehicules['wv'] = array('numero_immatriculation' => 'wv', 'nom_categorie' => 'Utilitaire', 'marque' => 'Volkswagen', 'nom_modele' => 'Golf', 'nb_portes' => 2, 'boite_vitesse' => 'auto', 'puissance_fiscale' => '20ch', 'taille' => '4m', 'options' => array('antigravité'));
		$vehicules['johny'] = array('numero_immatriculation' => 'johny', 'nom_categorie' => 'Citadine', 'marque' => 'Peugeolt', 'nom_modele' => '206', 'nb_portes' => 4, 'boite_vitesse' => 'manuelle', 'puissance_fiscale' => '40ch', 'taille' => '8m', 'options' => array('klaxon allumez le feu', 'flammes sur le côté'));
		$vehicules['tractor'] = array('numero_immatriculation' => 'tractor', 'nom_categorie' => '4X4 SUV', 'marque' => 'Honda', 'nom_modele' => 'Tractooor', 'nb_portes' => 1, 'boite_vitesse' => 'manuelle', 'puissance_fiscale' => '150ch', 'taille' => '40m', 'options' => array('GPS', 'garde-boues'));
		
		foreach($vehicules as &$vehicule) {
			$vehicule['seuil_km'] = 250;
		}*/
		
		/*
		//Calcul des prix
		$vehicules['wv']['prix'] = '150';
		$vehicules['johny']['prix'] = '250';
		$vehicules['tractor']['prix'] = '300';*/
		
		//Sauvegarde des données du formulaire précédemment entrées
		$post['date_depart'] = !empty($_POST['date_depart']) ? $_POST['date_depart'] : '';
		$post['heure_depart'] = !empty($_POST['heure_depart']) ? $_POST['heure_depart'] : '';
		$post['date_retour'] = !empty($_POST['date_retour']) ? $_POST['date_retour'] : '';
		$post['heure_retour'] = !empty($_POST['heure_retour']) ? $_POST['heure_retour'] : '';
		$post['categorie'] = !empty($_POST['categorie']) ? $_POST['categorie'] : '';
		
		$this->addVars(array_merge($post, array('categories' => $categories, 'vehicules' => $vehicules)));
		return 'accueil.php';
	}
		
	public function connexion()
	{
		if(isset($_POST['identifiant']) && isset($_POST['password'])){
			//test dans BDD si existe
			$modelManager = $this->getApplication()->getModelManager();
			$client=$modelManager->getOneById_client("Client",$_POST['identifiant'],array("password_gestion_compte" => $_POST['password']));
			if($client!=null)
				if($client->isParticulier()){
					$_SESSION['user']=$client;
				}
			//$_SESSION['user']=$model;
			$_SESSION['type_connexion']="client";
		}
		
		$this->addVars(array('connexion_client' => true));
		if(isset($_SESSION['user']))
			header("Location: ./");
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
			print($_POST['id_employe']);
			$agent=$modelManager->getOneById_employe("Employe",$_POST['id_employe'],array("password" => $_POST['password']));
			if($agent!=null)
				$_SESSION['agent']=$agent;
		}
		
		if(isset($_SESSION['agent']))
			header("Location: ./");
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
			header("Location: ./");
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
	
		$this->addVars(array('post' => $post, 'type_client' => $type_client, 'inscription' => true));
		return 'inscription.php';
	}
	
}