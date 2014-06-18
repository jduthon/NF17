<?php

namespace model;

use library;

class Conducteur extends library\Model
{
	private $id_conducteur;
	private $nom;
	private $prenom;
	private $copie_permis;

	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getid_conducteur(){
		return $this->id_conducteur;
	}
	
	public function setid_conducteur($id_conducteur){
		$this->id_conducteur=$id_conducteur;
	}
	
	public function getnom(){
		return $this->nom;
	}
	
	public function setnom($nom){
		$this->nom=$nom;
	}
	
	public function getprenom(){
		return $this->prenom;
	}
	
	public function setprenom($prenom){
		$this->prenom=$prenom;
	}
	
	public function getcopie_permis(){
		return $this->copie_permis;
	}
	
	public function setcopie_permis($copie_permis){
		$this->copie_permis=$copie_permis;
	}
	

	
	public function getPrimaryKey(){
		return "id_conducteur";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}