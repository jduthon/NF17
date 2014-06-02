<?php

namespace model;

use library;

class Album extends library\Model
{
	public function getAlbum($id)
	{
		return $this->query("SELECT `id`,`titre`,`date` FROM albums WHERE id = :id", array(':id' => $id));
	}
	
	public function getAlbums()
	{
		return $this->query("SELECT `id`,`titre`,`date` FROM albums");
	}
}