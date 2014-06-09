<?php

namespace controller;

use library;

class General extends library\Controller
{
	public function accueil()
	{	
		$categories = array('Citadine', 'Berline', '4X4 SUV', 'Break', 'Pickup', 'Utilitaire');
		
		//Ajout des véhicules
		$vehicules['wv'] = array('numero_immatriculation' => 'wv', 'nom_categorie' => 'Utilitaire', 'marque' => 'Volkswagen', 'nom_modele' => 'Golf', 'nb_portes' => 2, 'boite_vitesse' => 'auto', 'puissance_fiscale' => '20ch', 'taille' => '4m', 'options' => array('antigravité'));
		$vehicules['johny'] = array('numero_immatriculation' => 'johny', 'nom_categorie' => 'Citadine', 'marque' => 'Peugeolt', 'nom_modele' => '206', 'nb_portes' => 4, 'boite_vitesse' => 'manuelle', 'puissance_fiscale' => '40ch', 'taille' => '8m', 'options' => array('klaxon allumez le feu', 'flammes sur le côté'));
		$vehicules['tractor'] = array('numero_immatriculation' => 'tractor', 'nom_categorie' => '4X4 SUV', 'marque' => 'Honda', 'nom_modele' => 'Tractooor', 'nb_portes' => 1, 'boite_vitesse' => 'manuelle', 'puissance_fiscale' => '150ch', 'taille' => '40m', 'options' => array('GPS', 'garde-boues'));
		
		foreach($vehicules as &$vehicule) {
			$vehicule['seuil_km'] = 250;
		}
		
		//Calcul des prix
		$vehicules['wv']['prix'] = '150';
		$vehicules['johny']['prix'] = '250';
		$vehicules['tractor']['prix'] = '300';
		
		//Sauvegarde des données du formulaire précédemment entrées
		$post['date_depart'] = !empty($_POST['date_depart']) ? $_POST['date_depart'] : '';
		$post['heure_depart'] = !empty($_POST['heure_depart']) ? $_POST['heure_depart'] : '';
		$post['date_retour'] = !empty($_POST['date_retour']) ? $_POST['date_retour'] : '';
		$post['heure_retour'] = !empty($_POST['heure_retour']) ? $_POST['heure_retour'] : '';
		$post['categorie'] = !empty($_POST['categorie']) ? $_POST['categorie'] : '';
		
		$this->addVars(array_merge($post, array('categories' => $categories, 'vehicules' => $vehicules)));
		return 'accueil.php';
	}
	
	public function recherche() 
	{
		$categories = array('Citadine', 'Berline', '4X4 SUV', 'Break', 'Pickup', 'Utilitaire');
	
		//Sauvegarde des données du formulaire précédemment entrées
		$post['date_depart'] = !empty($_POST['date_depart']) ? $_POST['date_depart'] : '';
		$post['heure_depart'] = !empty($_POST['heure_depart']) ? $_POST['heure_depart'] : '';
		$post['date_retour'] = !empty($_POST['date_retour']) ? $_POST['date_retour'] : '';
		$post['heure_retour'] = !empty($_POST['heure_retour']) ? $_POST['heure_retour'] : '';
		$post['categorie'] = !empty($_POST['categorie']) ? $_POST['categorie'] : '';
		
		//Ajout des véhicules
		if ($post['categorie'] == 'Utilitaire') 
		{
			$vehicules['wv'] = array('numero_immatriculation' => 'wv', 'nom_categorie' => 'Utilitaire', 'marque' => 'Volkswagen', 'nom_modele' => 'Golf', 'nb_portes' => 2, 'boite_vitesse' => 'auto', 'puissance_fiscale' => '20ch', 'taille' => '4m', 'options' => array('antigravité'));
			$vehicules['wv']['prix'] = '150';
		} 
		else if ($post['categorie'] == 'Citadine') 
		{
			$vehicules['johny'] = array('numero_immatriculation' => 'johny', 'nom_categorie' => 'Citadine', 'marque' => 'Peugeolt', 'nom_modele' => '206', 'nb_portes' => 4, 'boite_vitesse' => 'manuelle', 'puissance_fiscale' => '40ch', 'taille' => '8m', 'options' => array('klaxon allumez le feu', 'flammes sur le côté'));
			$vehicules['johny']['prix'] = '250';
		} 
		else if ($post['categorie'] == '4X4 SUV') 
		{
			$vehicules['tractor'] = array('numero_immatriculation' => 'tractor', 'nom_categorie' => '4X4 SUV', 'marque' => 'Honda', 'nom_modele' => 'Tractooor', 'nb_portes' => 1, 'boite_vitesse' => 'manuelle', 'puissance_fiscale' => '150ch', 'taille' => '40m', 'options' => array('GPS', 'garde-boues'));
			$vehicules['tractor']['prix'] = '300';
		} 
		else {
			$vehicules = array();
		}

		foreach($vehicules as &$vehicule) {
			$vehicule['seuil_km'] = 250;
		}
		
		$this->addVars(array_merge($post, array('categories' => $categories, 'vehicules' => $vehicules)));
		return 'recherche.php';
	}
	
	public function connexion()
	{
		$this->addVars(array('connexion_client' => true));
		return 'connexion.php';
	}
	
	public function inscription()
	{
		$this->addVars(array('type_client' => 'particulier'));
		return 'inscription.php';
	}
	
	public function liste_conducteurs()
	{
		$conducteurs[] = array('nom' => 'pute', 'prenom' => 'jean','Numéro de permis' => 7658);
		$conducteurs[1] = array('nom' => 'biatch', 'prenom' => 'Erwan','Numéro de permis' => 7658);
		$conducteurs[2] = array('nom' => 'Salope', 'prenom' => 'Antoine','Numéro de permis' => 7658);
		
		
		$this->addVars(array('conducteurs' => $conducteurs));
		return 'liste_conducteurs.php';
	}
	
	public function liste_agents()
	{
		$agents[] = array('identifiant' => 01, 'fonction' => 'tech');
		$agents[1] = array('identifiant' => 02, 'fonction' => 'com');
		$agents[2] = array('identifiant' => 03, 'fonction' => 'com');
		
		
		$this->addVars(array('agents' => $agents));
		return 'liste_agents.php';
	}
	
	public function liste_entreprises()
	{
		$entreprises[] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[1] = array('nom' => 'pute', 'fonction' => 'tapin');
		$entreprises[2] = array('nom' => 'pute', 'fonction' => 'tapin');
		
		
		$this->addVars(array('entreprises' => $entreprises));
		return 'liste_entreprises.php';
	}
	public function liste_location_particulier()
	{
		$locations[] = array('id location' => 'pute', 'voiture' => 'tapin','date debut' => 'tapin' ,'date fin' => 'tapin', 'etat' => 'lala');
		$locations[1] = array('id location' => 'pute', 'voiture' => 'tapin','date debut' => 'tapin' ,'date fin' => 'tapin', 'etat' => 'lala');
		$locations[2] = array('id location' => 'pute', 'voiture' => 'tapin','date debut' => 'tapin' ,'date fin' => 'tapin', 'etat' => 'lala');
		
		
		$this->addVars(array('locations' => $locations));
		return 'liste_location_particulier.php';
	}
	
	
	
	
}