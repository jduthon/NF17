<?php

namespace controller;

use library;
use model;

class Example extends library\Controller
{
	public function action_example()
	{
		$model = new model\Example($this->app);
	
		$var = 'shit';
		$album = $model->getAlbum(17);
		
		$this->addVars(array('var' => $var, 'album' => $album));
		return 'view_example.php';
	}
}