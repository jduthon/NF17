<?php

namespace model;

use library;

class Vehicule extends library\Model
{
	private $numero_immatriculation;
	private $nom_modele;
	private $nom_categorie;
	private $nom_agence;
	private $marque;
	private $date_mise_en_circulation;
	private $degats_eventuels;
	private $km;
	private $niveau_carb;
	private $couleur;
	private $est_loue;
	private $_modele=null;
	private $_nom_option;
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getnumero_immatriculation(){
		return $this->numero_immatriculation;
	}
	
	public function setnumero_immatriculation($immat){
		$this->numero_immatriculation=$immat;
	}
	
	public function getnom_modele(){
		return $this->nom_modele;
	}
	
	public function setnom_modele($modele){
		$this->nom_modele=$modele;
	}
	
	public function getnom_categorie(){
		return $this->nom_categorie;
	}
	
	public function setnom_categorie($nomcat){
		$this->nom_categorie=$nomcat;
	}
	
	public function getnom_agence(){
		return $this->nom_agence;
	}
	
	public function setnom_agence($nomag){
		$this->nom_agence=$nomag;
	}
	
	public function getmarque(){
		return $this->marque;
	}
	
	public function setmarque($marque){
		$this->marque=$marque;
	}
	
	public function getdate_mise_en_circulation(){
		return $this->date_mise_en_circulation;
	}
	
	public function setdate_mise_en_circulation($datev){
		$this->date_mise_en_circulation=$datev;
	}
	
	public function getdegats_eventuels(){
		return $this->degats_eventuels;
	}
	
	public function setdegats_eventuels($degat){
		$this->degats_eventuels=$degat;
	}
	
	public function getkm(){
		return $this->km;
	}
	
	public function setkm($km){
		$this->km=$km;
	}
	
	public function getniveau_carb(){
		return $this->niveau_carb;
	}
	
	public function setniveau_carb($nivc){
		$this->niveau_carb=$nivc;
	}
	
	public function getcouleur(){
		return $this->couleur;
	}
	
	public function setcouleur($coul){
		$this->couleur=$coul;
	}
	
	public function getest_loue(){
		return $this->est_loue;
	}
	
	public function setest_loue($tloue){
		$this->est_loue=$tloue;
	}
	
	public function getPrimaryKey(){
		return "numero_immatriculation";
	}
	
	public function getModele(){
		$mm=\library\ModelManager::getInstance();
		if($this->_modele==null){
			$this->_modele=$mm->getOneBynom_modele("Modele",$this->nom_modele);
		}
		return $this->_modele;
	}
	
	public function get_nom_option(){
		return $this->_nom_option;
	}
	
	public function set_nom_option($nomopt){
		if(is_array($nomopt)&&!empty($nomopt))
			foreach($nomopt as $opt)
				$this->_nom_option[count($this->_nom_option)]=$opt['nom_option'];
		else
			if(empty($nomopt))
				$this->_nom_option=array();
			else
				$this->_nom_option[0]=$nomopt;
		//print_r($this->_nom_option);
	}
	
	public function getoptions(){
		return $this->_nom_option;
	}
	
	public function getprix(){
		//TODO calculer
		return 200;
	}
	
	public function getseuil_km(){
		//TODO calculer
		return 50;
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
			//self::$foreignKey[0]=new \library\ForeignKey("Agence","nom_agence","nom_agence");
			//self::$foreignKey[1]=new \library\ForeignKey("Categorie","nom_categorie","nom_categorie");
			self::$foreignKey[0]=new \library\ForeignKey("Modele","nom_modele","nom_modele");
			self::$foreignKey[1]=new \library\ForeignKey("Comporter","nom_option","_nom_option","numero_immatriculation");
		}
		return self::$foreignKey;
	}
}