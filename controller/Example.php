<?php

namespace controller;

use library;

class Example extends library\Controller
{
	public function action_example()
	{
		$model = $this->getModel('Album');
		
		$var = 'coucou';
		$album = $model->getAlbum(10);
		
		$this->addVars(array('var' => $var, 'album' => $album));
		return 'view_example.php';
	}
}