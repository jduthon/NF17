<?php

namespace model;

use library;

class Statistiques extends \library\ApplicationComponent
{
	public function __construct(\library\Application $application)
	{
		parent::__construct($application);
	}
	
	
	public function getLocByType(){
		$query="SELECT v.nom_categorie AS categorie, COUNT(*) AS nbLoc FROM location l, vehicule v WHERE v.numero_immatriculation = l.numero_immatriculation GROUP BY v.nom_categorie";
		$result=$this->application->query($query);
		return $result;
	}
	
	public function getFinancial(){
		$query="SELECT SUM(montant) AS ca FROM facture";
		$result=$this->application->query($query);
		$return["ca"]=$result["ca"];
		$query="SELECT SUM(prix) AS prix FROM reparation";
		$result=$this->application->query($query);
		$return["charges"]=$result["prix"];
		$query="SELECT SUM(prix) AS prix FROM entretien";
		$result=$this->application->query($query);
		$return["charges"]+=$result["prix"];
		$return["res"]=$return["ca"]-$return["charges"];
		return $return;
	}
	
	public function getLocTypeByDate(){
		$return=array();
		$condPro="id_client IN (SELECT id_pro FROM professionnel)";
		$condCli="id_client IN (SELECT id_client FROM client)";
		$queryBeg="SELECT COUNT(*) AS nbLoc FROM location l, contrat_de_location cl, facture f WHERE ";
		$queryEnd=" AND l.num_contrat=cl.num_contrat AND cl.id_facture = f.id_facture ";
		$queryCli=$queryBeg.$condCli.$queryEnd;
		$queryPro=$queryBeg.$condPro.$queryEnd;
		$y=getdate()["year"];
		for($i=1;$i<13;++$i){
			$m=$i;
			$m=strlen($i)==1?"0".$m:$m;
			$dateInf=$y . $m . "01";
			$lastMDay = getdate(strtotime((strtotime("$y-$m-01") . " + 1 month - 1 day")))["mday"];
			$dateCaca=new \DateTime(date("Ymd",strtotime("$y-$m-01" . " + 1 month")));
			$dateCaca->sub(new \DateInterval("P1D"));
			$lastMDay=getdate(($dateCaca->getTimestamp()))["mday"];
			$dateSup=$y . $m . $lastMDay;
			$queryDateEnd= "AND f.date_reglement BETWEEN '$dateInf' AND '$dateSup'";
			$query = $queryCli . $queryDateEnd;
			$result=$this->application->query($query);
			if(is_array($result) && !empty($result))
				$return[$i]["locCli"]=$result["nbloc"];
			$query = $queryPro . $queryDateEnd;
			if(is_array($result) && !empty($result))
				$result=$this->application->query($query);
			$return[$i]["locPro"]=$result["nbloc"];
		}
		print_r($return);
		return $return;
	}
}