<?php

namespace model;

use library;

class Contrat_de_location extends library\Model
{
	private $num_contrat;
	private $date_debut_loc;
	private $date_fin_loc;
	private $degats_eventuels_initiaux;
	private $km_initial;
	private $niveau_carb_initial;
	private $seuil_km;
	private $cb_presentee;
	private $id_employe;
	private $id_facture;
	private $_facture;
	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getnum_contrat(){
		return $this->num_contrat;
	}
	
	public function setnum_contrat($num_contrat){
		$this->num_contrat=$num_contrat;
	}
	
	public function getdate_debut_loc(){
		return $this->date_debut_loc;
	}
	
	public function setdate_debut_loc($date_debut_loc){
		$this->date_debut_loc=$date_debut_loc;
	}
	
	public function getdate_fin_loc(){
		return $this->date_fin_loc;
	}
	
	public function setdate_fin_loc($date_fin_loc){
		$this->date_fin_loc=$date_fin_loc;
	}
	
	public function getdegats_eventuels_initiaux(){
		return $this->degats_eventuels_initiaux;
	}
	
	public function setdegats_eventuels_initiaux($degats_eventuels_initiaux){
		$this->degats_eventuels_initiaux=$degats_eventuels_initiaux;
	}
	
	public function getkm_initial(){
		return $this->km_initial;
	}
	
	public function setkm_initial($km_initial){
		$this->km_initial=$km_initial;
	}
	
	public function getniveau_carb_initial(){
		return $this->niveau_carb_initial;
	}
	
	public function setniveau_carb_initial($niveau_carb_initial){
		$this->niveau_carb_initial=$niveau_carb_initial;
	}
	
	public function getseuil_km(){
		return $this->seuil_km;
	}
	
	public function setseuil_km($seuil_km){
		$this->seuil_km=$seuil_km;
	}
	
	public function getcb_presentee(){
		return $this->cb_presentee;
	}
	
	public function setcb_presentee($cb_presentee){
		$this->cb_presentee=$cb_presentee;
	}
	
	public function getid_employe(){
		return $this->id_employe;
	}
	
	public function setid_employe($id_employe){
		$this->id_employe=$id_employe;
	}
	
	public function getid_facture(){
		return $this->id_facture;
	}
	
	public function setid_facture($id_facture){
		$this->id_facture=$id_facture;
	}
	
	public function getFacture(){
		$mm=\library\ModelManager::getInstance();
		if((!isset($this->id_facture) || $this->id_facture==null) && !isset($this->_facture))
			return;
		if(!isset($this->_facture))
			$this->_facture=$mm->getOneById_facture("Facture",$this->id_facture);
		return $this->_facture;
	}
	
	public function setFacture($facture){
		$this->_facture = $facture;
	}
	
	public function getPrimaryKey(){
		return "num_contrat";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}