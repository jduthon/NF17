<?php

namespace library;

class ForeignKey{
	private $refTable;
	private $refId;
	private $fkId;
	private $extId;
	
	public function __construct($refTable,$refId,$fkId,$extId=null){
		$modelMan=ModelManager::getInstance();
		$this->fkId = $fkId;
		if(!$modelMan->existsModel($refTable) && $extId==null)
			throw new TommeException("La table " . $refTable . " n'existe pas.");
		$this->refTable=$refTable;
		$index=0;
		if(!is_array($refId))
			$refId=array($refId);
		foreach($refId as $fieldname){
			if($extId==null)
				if(!$modelMan->existsField($refTable,$fieldname) )
					throw new TommeException("La table " . $refTable . " ne contient pas de champ " . $fieldname . ".");
			$this->refId[$index]=$fieldname;
			++$index;
		}
		$this->extId=$extId;
	}

	
	public function getRefTable(){
		return $this->refTable;
	}
	
	public function getRefId(){
		return $this->refId;
	}
	
	public function getFkId(){
		return $this->fkId;
	}
	
	public function getExtId(){
		return $this->extId;
	}
	
	public function isExternal(){
		return $this->extId!=null;
	}
}

?>