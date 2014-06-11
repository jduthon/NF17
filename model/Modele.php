<?php

namespace model;

use library;

class Modele extends library\Model
{
	private $nom_modele;
	private $nom_categorie;
	private $nb_portes;
	private $boite_vitesse;
	private $puissance_fiscale;
	private $carburant;
	private $taille;
	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getnom_modele(){
		return $this->nom_modele;
	}
	
	public function setnom_modele($nom_modele){
		$this->nom_modele=$nom_modele;
	}
	
	public function getnom_categorie(){
		return $this->nom_categorie;
	}
	
	public function setnom_categorie($nomcat){
		$this->nom_categorie=$nomcat;
	}
	
	public function getnb_portes(){
		return $this->nb_portes;
	}
	
	public function setnb_portes($nbp){
		$this->nb_portes=$nbp;
	}
	
	public function getboite_vitesse(){
		return $this->boite_vitesse;
	}
	
	public function setboite_vitesse($boite_vitesse){
		$this->boite_vitesse=$boite_vitesse;
	}
	
	public function getpuissance_fiscale(){
		return $this->puissance_fiscale;
	}
	
	public function setpuissance_fiscale($puissance_fiscale){
		$this->puissance_fiscale=$puissance_fiscale;
	}
	
	public function getcarburant(){
		return $this->carburant;
	}
	
	public function setcarburant($carburant){
		$this->carburant=$carburant;
	}
	
	public function gettaille(){
		return $this->taille;
	}
	
	public function settaille($taille){
		$this->taille=$taille;
	}
	
	public function getPrimaryKey(){
		return "nom_modele";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
			//self::$foreignKey[0]=new \library\ForeignKey("Agence","nom_agence","nom_agence");
			//self::$foreignKey[1]=new \library\ForeignKey("Categorie","nom_categorie","nom_categorie");
			//self::$foreignKey[2]=new \library\ForeignKey("Modele","nom_modele","nom_modele");
		}
		return self::$foreignKey;
	}
}