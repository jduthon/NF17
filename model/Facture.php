<?php

namespace model;

use library;

class Facture extends library\Model
{
	private $id_facture;
	private $date_reglement;
	private $montant;
	private $moyen_de_paiement;
	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getid_facture(){
		return $this->id_facture;
	}
	
	public function setid_facture($id_facture){
		$this->id_facture=$id_facture;
	}
	
	public function getdate_reglement(){
		return $this->date_reglement;
	}
	
	public function setdate_reglement($date_reglement){
		$this->date_reglement=$date_reglement;
	}
	
	public function getmontant(){
		return $this->montant;
	}
	
	public function setmontant($montant){
		$this->montant=$montant;
	}
	
	public function getmoyen_de_paiement(){
		return $this->moyen_de_paiement;
	}
	
	public function setmoyen_de_paiement($moyen_de_paiement){
		$this->moyen_de_paiement=$moyen_de_paiement;
	}
	
	public function getPrimaryKey(){
		return "id_facture";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}