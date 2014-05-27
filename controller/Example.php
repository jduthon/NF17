<?php

namespace controller;

use library;
use model;

class Example extends library\Controller
{
	public function action_example()
	{
		$model = $this->getModel('model\Example');
	
		$var = 'coucou';
		$album = $model->getAlbum(17);
		
		$this->addVars(array('var' => $var, 'album' => $album));
		return 'view_example.php';
	}
}