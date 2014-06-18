<?php

namespace model;

use library;

class Location extends library\Model
{
	private $id_location;
	private $id_client;
	private $num_contrat;
	private $numero_immatriculation;
	private $_vehicule;
	private $_contratLoc;
	private $_montantPrevi;
	
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
	
	public function getVehicule(){
		$mm=\library\ModelManager::getInstance();
		if(!isset($this->_vehicule))
			$this->_vehicule=$mm->getOneByNumero_immatriculation($this->numero_immatriculation);
		return $this->_vehicule;
	}
	
	public function getContrat(){
		$mm=\library\ModelManager::getInstance();
		if(!isset($this->_contratLoc))
			$this->_contratLoc=$mm->getOneByNum_contrat($this->num_contrat);
		return $this->_contratLoc;
	}
	
	public function getMontantPrevi(){
		//TODO CALCULER UN FUCKING MONTANT EN FONCTION DE NBJOURS ET DE VEHICULE
		//Multiplier la somme pourrie par le nb de jours
		return 50;
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