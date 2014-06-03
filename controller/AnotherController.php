<?php

namespace controller;

use library;

class Anothercontroller extends library\Controller
{
	public function albums()
	{
		$model = $this->getModel('Album');
	
		$albums = $model->getAlbums();
		
		$this->addVars(array('ma_variable' => 'coucou', 'liste_albums' => $albums));
		return 'liste_albums.php';
	}	
	
	public function album($id)
	{
		$model = $this->getModel('Album');
	
		$album = $model->getAlbum($id);
		
		$this->addVars(array('ma_variable' => 'coucou', 'album' => $album));
		return 'album.php';
	}
}