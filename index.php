<?php
	
	require_once __DIR__.'/controllers/application.php';
	
	$application = new Application();
	
	$application->load('modele', 'modele_exemple.php');
	
	$album = $application->connection->query("SELECT `id`,`titre`,`date` FROM albums WHERE id < 4");
	echo '<pre>';
	print_r($album);
	echo '</pre>';
	
	/* Définition de la page a charger */
	//if(!isset($page) || !is_file('vues/pages/' . $page . '.php')) //Si pas de page, on veut le blog. Et test si la page existe sinon les articles
	//	$page = 'article';
	
	

	/* On charge la vue */
	//include_once 'vues/vue_principale.php';
	
