<?php

namespace model;

use library;

class Categorie extends library\Model
{
	private $nom_categorie;
	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getnom_categorie(){
		return $this->nom_categorie;
	}
	
	public function setnom_categorie($nom_categorie){
		$this->nom_categorie=$nom_categorie;
	}
	
	public function getPrimaryKey(){
		return "nom_categorie";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}