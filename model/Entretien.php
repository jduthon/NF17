<?php

namespace model;

use library;

class Entretien extends library\Model
{
	private $id_entretien;
	private $prix;
	private $numero_immatriculation;
	

	
	public function __construct(){
	}
	
	public function getid_entretien(){
		return $this->id_entretien;
	}
	
	public function setid_entretien($id_entretien){
		$this->id_entretien=$id_entretien;
	}
	
	public function getnumero_immatriculation(){
		return $this->numero_immatriculation;
	}
	
	public function setnumero_immatriculation($numero_immatriculation){
		$this->numero_immatriculation=$numero_immatriculation;
	}
	
	public function getnom_entreprise(){
		return $this->nom_entreprise;
	}
	
	public function setnom_entreprise($nom_entreprise){)
			$this->nom_entreprise=$nom_entreprise;
	}
	
	public function getPrimaryKey(){
		return "id_entretien";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}