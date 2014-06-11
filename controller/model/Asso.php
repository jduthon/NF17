<?php

namespace model;

use library;

class Asso extends library\Model
{
	private $id;
	private $name;
	private $login;
	private $pole_id;
	static private $foreignKey=null;
	
	private $_notDBLinked;
	
	public function __construct(){
	}
	
	public function setid($id){
		$this->id=$id;
	}
	
	public function setname($name){
		$this->name=$name;
	}
	
	public function setlogin($login){
		$this->login=$login;
	}
	
	public function setpole_id($pole_id){
		$this->pole_id=$pole_id;
	}
	
	public function getPrimaryKey(){
		return "id";
	}
	
	public function getForeignKeys(){
		if(self::$foreignKey==null){
			self::$foreignKey[0]=new \library\ForeignKey("Asso","id","pole_id");
			self::$foreignKey[1]=new \library\ForeignKey("faketable","cacaid","_notDBLinked","assoid");
		}
		return self::$foreignKey;
	}
	
	public function getid(){
		return $this->id;
	}
	
	public function getpole(){
		return $pole_id;
	}
}