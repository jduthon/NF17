<?php

namespace model;

use library;

class Professionnel extends library\Model
{
	private $id_pro;
	private $nom_entreprise;
	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getid_pro(){
		return $this->id_pro;
	}
	
	public function setid_pro($id_pro){
		$this->id_pro=$id_pro;
	}
	
	public function getnom_entreprise(){
		return $this->nom_entreprise;
	}
	
	public function setnom_entreprise($nom_entreprise){
		$this->nom_entreprise=$nom_entreprise;
	}
	
	public function getPrimaryKey(){
		return "id_pro";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}