<?php

namespace library;

use DirectoryIterator;

class ModelManager {

	private static $instance = null;
	
	private $application;
	
	private $modelsArray;
	
	private $dbms;
	
	/**
	 * Implemented the Singleton design pattern.
	 */
	public static function getInstance($application=null)
	{
		if(self::$instance==null) {
			self::$instance = new self($application);
		}
		
		return self::$instance;
	}
	
	/**
	 * Implemented the Singleton design pattern.
	 */
	private function __clone() {}
	
	private function __construct(Application $application)
	{
		$this->application=$application;
		$path = $this->application->path("model");
		$dirIterator = new DirectoryIterator($path);
		$i=0;
		while($dirIterator->valid()){
			if($dirIterator->isFile()){
				$this->modelsArray[$i]=substr($dirIterator->current()->getBaseName(),0,strpos($dirIterator->current()->getBaseName(),".php"));
				++$i;
			}
			$dirIterator->next();
			
		}
		$this->dbms=$application->getSQLDriverType();
	}
	
	public function getModelVars($modelName){
		if(!in_array($modelName,$this->modelsArray))
			throw new TommeException('Model ' . $modelName . ' does not exist');
		$path = 'model\\' . $modelName;
		$model = new $path($this->application);
		//$model->get_object_vars();
		$modelArray = (array) $model;
		$index=0;
		foreach(array_keys($modelArray) as $var){
			if(preg_match("#model\\\\" . $modelName ."#",$var)==1){
				$var=substr($var,strlen("model\\")+strlen($modelName)+2);
				if($var[0]!='_'){
					$varsArray[$index]=$var;
					++$index;
				}
			}
		}
		return $varsArray;
	}
	
	public function find($modelName,array $condArray=null,array $orderBy = null, $limit = null, $offset = null){
		if(!is_int($limit) && $limit !=null)
			throw new TommeException('Argument limit has to be an int : ' . $limit . " given.");
		if(!is_int($offset) && $offset!=null)
			throw new TommeException('Argument offset has to be an int : ' . $offset . " given.");
		$stringQuery = "SELECT ";
		$parameters=array();
		$varsArray = $this->getModelVars($modelName);
		foreach($varsArray as $key=>$var){
			if($this->dbms=="mysql")
				$stringQuery.= "`" . $var . "`";
			else
				$stringQuery.= $var ;
			if($key!=count($varsArray)-1)
				$stringQuery.=",";
		}
		$stringQuery.=" FROM " . strtolower($modelName);
		if($condArray != null){
			$index=0;
			$stringQuery.=" WHERE ";
			foreach($condArray as $key=>$value){
				$stringQuery.= $key . " = :" . $key;
				$parameters[":".$key]=$value;
				++$index;
				if($index!=count($condArray))
					$stringQuery.=" AND ";
			}
		}
		if($orderBy != null){
			$index=0;
			$stringQuery.= " ORDER BY ";
			foreach($orderBy as $key=>$value){
				if(strcmp($value,"desc") == 0 || strcmp($value,"asc")==0)
					$stringQuery.= $key . ' ' . strtoupper($value);
				else
					throw new TommeException('Invalid request argument, ORDER BY has to be asc or desc, ' . $value . " given.");
				++$index;
				if($index!=count($orderBy))
					$stringQuery.=" , ";
			}
		}

		if($limit != null){
			$stringQuery .= " LIMIT " . $limit;
		}
		if($offset != null){
			$stringQuery .= " OFFSET " . $offset;
		}
		//print($stringQuery);
		//print_r($parameters);
		$result=$this->application->query($stringQuery, $parameters);
		$path = 'model\\' . $modelName;
		$returnArray=null;
		if(is_array($result) && !empty($result)){
			if(is_array($result[0])){
				foreach($result as $key=>$valueArray){
					$returnArray[$key] = $this->getNewModel($modelName,$valueArray);
				}
			} else{
				$returnArray = $this->getNewModel($modelName,$result);
			}
		}
		//print_r($returnArray);
		return $returnArray;
	}
	
	public function __call($method,$args){
		if(preg_match("#get([0-9]+|All|One)((By([[:alpha:]_]+))?)#",$method,$matches)){
			$limit=null;
			if((int)$matches[1] != 0){
				$limit=(int)$matches[1];
			} else if(strcmp($matches[1],"One") == 0){
				$limit=(int)1;
			} else if(strcmp($matches[1],"All") != 0){
				throw new TommeException('Invalid method name, valid methods are get followed by integer, \'All\' or \'One\', you asked for get' . $matches[1] . ".");
			}
			
			if(is_array($args))
				$modelName=$args[0];
			else
				$modelName=$args;
			
			$condArray=array();
			if($matches[2]){
				$constraint = strtolower(substr($matches[2],2));
				if(!in_array($constraint,$this->getModelVars($modelName)))
					throw new TommeException($modelName . ' has no field named ' . $constraint);
				if(!is_array($args) || count($args)<2)
					throw new TommeException('Method get*By needs two arguments, only one provided.');
				$condArray[$constraint]=$args[1];
			}
			if(is_array($args) && count($args)>2){
				if(is_array($args[2])){
					$condArray=array_merge($condArray,$args[2]);
				} else {
					throw new TommeException('Third argument should be an array of conditions like fieldName => fieldValue');
				}
			}
			return $this->find($modelName,$condArray,null,$limit);
		}
	}
	
	public function getNewModel($modelName,$valueArray){
		$path = 'model\\' . $modelName;
		$newModel = new $path($this->application);
		$fkArray=$newModel->getForeignKeys();
		if(!is_array($fkArray))
			$fkArray=array($fkArray);
		$varsArray= $this->getModelVars($modelName);
		foreach($varsArray as $var){
			if(isset($valueArray[$var]))
				call_user_func(array($newModel,"set" . $var),$valueArray[$var]);
			else
				call_user_func(array($newModel,"set" . $var),null);
		}
		foreach($fkArray as $fk){
			if($fk->isExternal()){
				$refIdString="";
				foreach($fk->getRefId() as $refId)
					$refIdString .= $refId . " , ";
				$refIdString = substr($refIdString,0,strlen($refIdString)-3);
				$stringQuery = "SELECT " . $refIdString . " FROM " . $fk->getRefTable() . " WHERE " . $fk->getExtId() . " = '" . call_user_func(array($newModel,"get".$newModel->getPrimaryKey())) . "'";
				//print("<br/> $stringQuery <br/>");
				$result=$this->application->query($stringQuery);
				$fkValue=null;
				//print_r($result);
				if(is_array($result) && !empty($result)){
					if(is_array($result[0])){
						foreach($result as $index=>$tmpRes)
							foreach($tmpRes as $key=>$value){
								if(!is_integer($key))
									$fkValue[$index][$key] = $value;
							}
					} else{
						$fkValue = $result[0];
					}
				}
				//print("<br/>");
				//print_r($fkValue);
				call_user_func(array($newModel,"set" . $fk->getFkId()),$fkValue);
			}
		}
		return $newModel;
	}
	
	public function existsModel($modelName){
		return in_array($modelName,$this->modelsArray);
	}
	
	public function existsField($modelName,$fieldName){
		if(!$this->existsModel($modelName))
			throw new TommeException("Model " . $modelName . " does not exist.");
		return in_array($fieldName,$this->getModelVars($modelName));
	}
	
	
	public function addModel($model){
		$id=$model->getPrimaryKey();
		$modelName=substr(get_class($model),strlen("model\\"));
		$varsArray=$this->getModelVars($modelName);
		$stringQuery="INSERT INTO ". $modelName . " (";
		foreach($varsArray as $key=>$var){
			$stringQuery.=" $var ";
			if($key!=count($varsArray)-1)
				$stringQuery.=",";
		}
		$stringQuery.=") VALUES (";
		foreach($varsArray as $key=>$var){
			$stringQuery.=" :$var ";
			$parameters[$var]=call_user_func(array($model,"get" . $var));
			if($key!=count($varsArray)-1)
				$stringQuery.=",";
		}
		$stringQuery.=")";
		//print($stringQuery);
		//print_r($parameters);
		$this->application->query($stringQuery, $parameters);
	}
	
	public function updateModel($model){
		$id=$model->getPrimaryKey();
		$modelName=substr(get_class($model),strlen("model\\"));
		$varsArray=$this->getModelVars($modelName);
		$stringQuery="UPDATE ". $modelName;
		$stringQuery.=" SET ";
		foreach($varsArray as $key=>$var){
			if(strcmp($id,$var)!=0){
				$stringQuery.=" $var = :$var ";
				if($key!=count($varsArray)-1)
					$stringQuery.=",";
			}
			$parameters[$var]=call_user_func(array($model,"get" . $var));
		}
		$stringQuery.=" WHERE $id = :$id";
		//print($stringQuery);
		//print_r($parameters);
		$this->application->query($stringQuery, $parameters);
	}
	
	public function deleteModel($model){
		$id=$model->getPrimaryKey();
		$modelName=substr(get_class($model),strlen("model\\"));
		$varsArray=$this->getModelVars($modelName);
		$stringQuery="DELETE FROM ". $modelName;
		$parameters[$id]=call_user_func(array($model,"get" . $id));
		$stringQuery.=" WHERE $id = :$id";
		//print($stringQuery);
		//print_r($parameters);
		$this->application->query($stringQuery, $parameters);
	}
	
		public function getLocationsNonValidees(){
		$return=array();
		$query="SELECT * FROM location l WHERE l.id_location NOT IN(SELECT g2.id_location FROM gerer g2)";
		$result=$this->application->query($query);
		if(!is_array($result))
			$result=array($result);
		foreach($result as $key=>$locBDD){
			$return[$key]=$this->getNewModel("Location",$locBDD);
		}
		print_r($return);
	}
}

?>