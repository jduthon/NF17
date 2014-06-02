<?php

namespace library;

/*
 * The Connection class is an interface in charge of the connection with the database. It execute the query and return their results.
 */
class Connection
{
	private $server;
	private $username;
	private $password;
	private $database;
	private $connection;
	
	/**
	 * Constructor. Establish the connection to database by creating a PDO instance.
	 * 
	 * @param	string	$server		The server name.
	 * @param	string	$username	The user name.
	 * @param	string	$password	The password name.
	 * @param	string	$database	The database name.
	 * @param	string	$dbms	The driver name.
	 *
	 */
	public function __construct($server, $username, $password, $database = '', $dbms = 'mysql')
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		
		try
		{
			$dsn = $dbms . ':host=' . $this->server . ';charset=UTF8;dbname=' . $this->database;
			$this->connection = new \PDO($dsn , $this->username, $this->password);
		}
		catch (PDOException $e) {
			throw new TommeException('unable to connect to the database server : ' . $e->getMessage() . ', code error : ' . $e->getCode()); 
		}
	}
	
	/**
	 * Prepare the query.
	 * Make a call to the PDO prepare method.
	 *
	 * @param	string			$query		The query.
	 *
	 * @return	PDOStatement	The statement returned by the PDO prepare method.
	 */
	public function prepare($query)
	{
		return $this->connection->prepare($query);
	}
	
	/**
	 * Execute the statement and return query results.
	 * Make calls to the PDO execute and fetchAll methods.
	 *
	 * @param	PDOStatement	$parameters		List of bound parameters of the query.
	 * @param	array			$parameters		List of bound parameters of the query.
	 *
	 * @return 	array			The results.
	 */
	public function execute(\PDOStatement $query, array $parameters = array())
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
			throw new TommeException('query failed : ' . mysql_error());
		}
	}
}
