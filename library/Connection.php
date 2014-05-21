<?php

namespace library;

class Connection
{
	private $server;
	private $username;
	private $password;
	private $database;
	private $connection;
	
	public function __construct($server, $username, $password, $database = '', $dbms = 'mysql')
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		
		try
		{
			$dsn = $dbms . ':host=' . $this->server . ';dbname=' . $this->database;
			$this->connection = new \PDO($dsn , $this->username, $this->password);
		}
		catch (PDOException $e) {
			throw new DoteException('unable to connect to the database server : ' . $e->getMessage() . ', code error : ' . $e->getCode()); 
		}
	}
	
	public function prepare($query)
	{
		return $this->connection->prepare($query);
	}
	
	public function execute(\PDOStatement $query, $parameters = array())
	{
		if ($query->execute($parameters)) 
		{
			$answer = $query->fetchAll();
			$query->closeCursor();
			
			if (count($answer) == 1) // In that case, we prefer fetch(PDO::FETCH_ASSOC) instead of fetchAll()
				$answer = $answer[0];
			
			return $answer;
		}
		else {
			throw new DoteException('query failed : ' . mysql_error());
		}
	}
}
