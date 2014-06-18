<?php

namespace model;

use library;

class Entreprise extends library\Model
{
	private $nom_entreprise;
	private $type;
	private $nom_agence;
	
	static private $foreignKey=null;
	
	public function __construct(){
		$this->nom_agence="LoukoumKar";
	}
	
	public function getnom_entreprise(){
		return $this->nom_entreprise;
	}
	
	public function setnom_entreprise($nom_entreprise){
		$this->nom_entreprise=$nom_entreprise;
	}
	
	public function gettype(){
		return $this->type;
	}
	
	public function settype($type){
		$this->type=$type;
	}
	
	public function getnom_agence(){
		return $this->nom_agence;
	}
	
	public function setnom_agence($nom_agence){
		if($nom_agence!=null)
			$this->nom_agence=$nom_agence;
	}
	
	public function getPrimaryKey(){
		return "nom_entreprise";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}