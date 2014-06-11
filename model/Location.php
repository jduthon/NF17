<?php

namespace model;

use library;

class Location extends library\Model
{
	private $id_location;
	private $id_client;
	private $num_contrat;
	private $numero_immatriculation;
	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getid_location(){
		return $this->id_location;
	}
	
	public function setid_location($id_location){
		$this->id_location=$id_location;
	}
	
	public function getid_client(){
		return $this->id_client;
	}
	
	public function setid_client($id_client){
		$this->id_client=$id_client;
	}
	
	public function getnum_contrat(){
		return $this->num_contrat;
	}
	
	public function setnum_contrat($num_contrat){
		$this->num_contrat=$num_contrat;
	}
	
	public function getnumero_immatriculation(){
		return $this->numero_immatriculation;
	}
	
	public function setnumero_immatriculation($numero_immatriculation){
		$this->numero_immatriculation=$numero_immatriculation;
	}
	
	public function getPrimaryKey(){
		return "id_location";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}