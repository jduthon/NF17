<?php

namespace model;

use library;

class Reparation extends library\Model
{
	private $id_reparation;
	private $prix;
	private $nbr_jour_reparation;
	private $numero_immatriculation;
	private $nom_entreprise;
	

	
	public function __construct(){
	}
	
	public function getid_reparation(){
		return $this->id_reparation;
	}
	
	public function setid_reparation($id_reparation){
		$this->id_reparation=$id_reparation;
	}

	public function getprix(){
		return $this->prix;
	}
	
	public function setprix($prix){
		$this->prix=$prix;
	}
	
	public function getnbr_jour_reparation(){
		return $this->nbr_jour_reparation;
	}
	
	public function setnbr_jour_reparation($nbr_jour_reparation){
		$this->nbr_jour_reparation=$nbr_jour_reparation;
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
		return "id_reparation";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}