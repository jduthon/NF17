<?php

namespace model;

use library;

class Client extends library\Model
{
	private $id_client;
	private $date_inscription;
	private $password_gestion_compte;
	private $_particulier;
	private $_isParticulier;
	private $_professionnel;
	
	static private $foreignKey=null;
	
	public function __construct(){
	}
	
	public function getid_client(){
		return $this->id_client;
	}
	
	public function setid_client($id_client){
		$this->id_client=$id_client;
	}
	
	public function getdate_inscription(){
		return $this->date_inscription;
	}
	
	public function setdate_inscription($date_inscription){
		$this->date_inscription=$date_inscription;
	}
	
	public function getpassword_gestion_compte(){
		return $this->password_gestion_compte;
	}
	
	public function setpassword_gestion_compte($password_gestion_compte){
		$this->password_gestion_compte=$password_gestion_compte;
	}
	
	public function isParticulier(){
		$mm=\library\ModelManager::getInstance();
		if($this->_isParticulier==null){
			$this->_particulier=$mm->getOneById_part("Particulier",$this->id_client);
			if($this->_particulier!=null){
				$this->_isParticulier=true;
			} else {
				$this->_professionnel=$mm->getOneById_pro("Professionnel",$this->id_client);
				$this->_isParticulier=false;
			}
		}
		return $this->_isParticulier;
	}
	
	public function isProfessionnel(){
		return !$this->isParticulier();
	}
	
	public function getParticulier(){
		if($this->_isParticulier==null)
			$this->isParticulier();
		if($this->_isParticulier)
			return $this->_particulier;
		else
			return null;
	}
	
	public function getProfessionnel(){
		if($this->_isParticulier==null)
			$this->isParticulier();
		if($this->_isParticulier)
			return null;
		else
			return $this->_professionnel;
	}
	
	public function getPrimaryKey(){
		return "id_client";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey=array();
		}
		return self::$foreignKey;
	}
}