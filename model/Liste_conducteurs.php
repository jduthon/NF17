<?php

namespace model;

use library;

class Liste_conducteurs extends library\Model
{
	private $id_liste;
	private $id_pro;
	private $id_location;
	private $_id_conducteur;

	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getid_liste(){
		return $this->id_liste;
	}
	
	public function setid_liste($id_liste){
		$this->id_liste=$id_liste;
	}
	
	public function getid_pro(){
		return $this->id_pro;
	}
	
	public function setid_pro($id_pro){
		$this->id_pro=$id_pro;
	}
	
	public function getid_location(){
		return $this->id_location;
	}
	
	public function setid_location($id_location){
		$this->id_location=$id_location;
	}

	
	public function getPrimaryKey(){
		return "id_liste";
	}
	
	public function set_id_conducteur($id_conducteur){
		$this->_id_conducteur=$id_conducteur;
	}
	
	public function getConducteurs(){
		if(empty($this->id_conducteur))
			return $this->id_conducteur;
		if(!is_array($this->id_conducteur))
			$this->id_conducteur=array($this->id_conducteur);
		$conducteurs=array();
		foreach($this->id_conducteur as $key=>$value)
			$conducteurs[$key]=$this->getApplication()->getModelManager()->getOneById_conducteur("Conducteur",$value);
		return $conducteurs;
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey[0]=new \library\ForeignKey("Apparaitre","id_conducteur","_id_conducteur","id_liste");
		}
		return self::$foreignKey;
	}
}