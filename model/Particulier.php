<?php

namespace model;

use library;

class Particulier extends library\Model
{
	private $id_part;
	private $contrat_en_cours;
	private $nom;
	private $prenom;
	private $adresse;
	private $ville;
	private $date_naissance;
	private $numero_tel;
	private $copie_permis;
	
	static private $foreignKey=null;
	
	public function __construct(){
		$this->contrat_en_cours=false;
	}
	
	public function getid_part(){
		return $this->id_part;
	}
	
	public function setid_part($id_part){
		$this->id_part=$id_part;
	}
	
	public function getcontrat_en_cours(){
		return $this->contrat_en_cours;
	}
	
	public function setcontrat_en_cours($contrat_en_cours){
		$this->contrat_en_cours=$contrat_en_cours;
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
	
	public function getadresse(){
		return $this->adresse;
	}
	
	public function setadresse($adresse){
		$this->adresse=$adresse;
	}
	
	public function getville(){
		return $this->ville;
	}
	
	public function setville($ville){
		$this->ville=$ville;
	}
	
	public function getdate_naissance(){
		return $this->date_naissance;
	}
	
	public function setdate_naissance($date_naissance){
		$this->date_naissance=$date_naissance;
	}
	
	public function getnumero_tel(){
		return $this->numero_tel;
	}
	
	public function setnumero_tel($numero_tel){
		$this->numero_tel=$numero_tel;
	}
	
	public function getcopie_permis(){
		return $this->copie_permis;
	}
	
	public function setcopie_permis($copie_permis){
		$this->copie_permis=$copie_permis;
	}
	
	public function getPrimaryKey(){
		return "id_part";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}