<?php

namespace model;

use library;

class Employe extends library\Model
{
	private $id_employe;
	private $nom_agence;
	private $password;
	private $function;
	
	static private $foreignKey=null;
	
	public function __construct(){
		$this->nom_agence="LoukoumKar";
	}
	
	public function getid_employe(){
		return $this->id_employe;
	}
	
	public function setid_employe($id_employe){
		$this->id_employe=$id_employe;
	}
	
	public function getnom_agence(){
		return $this->nom_agence;
	}
	
	public function setnom_agence($nom_agence){
		if($nom_agence==null)
			return;
		$this->nom_agence=$nom_agence;
	}
	
	public function getfunction(){
		return $this->function;
	}
	
	public function setfunction($function){
		$this->function=$function;
	}
	
	public function getpassword(){
		return $this->password;
	}
	
	public function setpassword($password){
		$this->password=$password;
	}
	
	public function getPrimaryKey(){
		return "id_employe";
	}
	
	public function isCommercial(){
		return $this->function=="com";
	}
	
	public function isTechnique(){
		return $this->function=="tech";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}