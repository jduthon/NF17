<?php

namespace controller;

use library;
use model;

class Example extends library\Controller
{
	public function action_example()
	{
		$model = $this->getModel('model\Example');
		//$model2 = $this->getModel('model\Voitures');
	
		$var = 'coucou';
		$album = $model->getAlbum(17);
		
		//$liste_voitures = $model2->listeVoitures();
		
		/*foreach($liste_voitures as $voiture)
		{
			$voiture['stat_expamepl'] = 'bla';
		}*/
		
		$this->addVars(array('var' => $var, 'album' => $album));
		return 'view_example.php';
	}
}