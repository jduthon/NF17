<?php

namespace library;

class Erreur extends Controller
{
	public function __construct($application){
		parent::__construct($application);
	}

	public function erreur404()
	{
		$this->addVars(array('erreur' => ''));
		return 'page_erreur.php';
	}

	public function erreur($e)
	{
		$this->addVars(array('erreur' => $e));
		return 'page_erreur.php';
	}
}