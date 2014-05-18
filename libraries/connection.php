<?php

class Connection
{
	private $server;
	private $username;
	private $password;
	private $database;
	private $connection;
	
	public function __construct($server, $username, $password, $database = '', $techno = 'mysql')
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		
		try
		{
			$dsn = $techno . ':host=' . $this->server . ';dbname=' . $this->database;
			$this->connection = new PDO($dsn , $this->username, $this->password);
		}
		catch (PDOException $e)
		{
			throw new DoteException('unable to connect to the database server : ' . $e->getMessage() . ', code error : ' . $e->getCode()); 
		}
	}
	
	public function prepare($query)
	{
		return $this->connection->prepare($query);
	}
	
	public function execute($query, $parameters = '')
	{
		if ($query->execute()) {
			$answer = $query->fetchAll();
			$query->closeCursor();
			return $answer;
		}
		else
			throw new DoteException('query failed : ' . mysql_error());
	}
	
	public function query($query, $parameters = '')
	{
		$sth = $this->connection->prepare($query);
		
		return $this->execute($sth, $parameters);
	}
}
