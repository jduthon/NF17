<?php

class Connection
{
	private $server;
	private $username;
	private $password;
	private $database;
	private $connection;
	
	public function __construct($server, $username, $password, $database = '')
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		
		$this->connection = @mysql_connect($this->server, $this->username, $this->password);
		
		if (!$this->connection)
			throw new DoteException('unable to connect to the database server : ' . mysql_error());

		if (!empty($database))
			$this->select_database($database);

		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	}
	
	private function select_database($database)
	{
		$this->database = $database;
	
		$select_db = mysql_select_db($this->database, $this->connection);
			
		if (!$select_db)
			throw new DoteException('unable to connect to the database : ' . mysql_error());
	}
	
	public function query($query)
	{
		$answer = mysql_query($query);
		
		if (!$answer)
			throw new DoteException('query failed : ' . mysql_error());
	
		while($ligne = mysql_fetch_assoc($answer))
			$result[] = $ligne;
		
		if (count($result) == 1)
			return $result[0];
		else
			return $result;
	}
}
