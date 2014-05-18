<?php

class DoteException extends Exception 
{
	public function what()
	{
		return 'Error : ' . $this->getMessage() . ' (thrown in ' . $this->getFile() . ' on line ' . $this->getLine() . ')';
	}
}

class Application
{
	private $path;
	public $connection;
	
	
	public function __construct($path_root, $path_config)
	{
		try
		{
			session_start();
			
			/* Configure the application */
			$this->path['root'] = $path_root;
			$this->path['config'] = $this->path['root'].$path_config;
			$this->configure();
			
			
			/* Establish a connection with the database */
			$this->load('library', 'connection.php');
			$this->connection = new Connection($this->connection['server'], $this->connection['username'], $this->connection['password'], $this->connection['database']);
		}
		catch (DoteException $e)
		{
			exit($e->what());
		}
	}
	
	public function path($type, $name)
	{
		return $this->path[$type].'/'.$name;
	}
	
	public function load($type, $name)
	{
		require_once $this->path($type, $name);
	}
	
	public function configure()
	{
		require $this->path('config', 'config.php'); // Better if this can be included out of this function
	
		if (!empty($path))
		{
			foreach($path as $key => $value)
			{
				$this->path[$key] = $this->path['root'].$value;
			}
		} 
		else
			throw new DoteException('path definitions not found in ' . $this->path('config', 'config.php'));
		
		
		if (!empty($connection))
		{
			$this->connection = $connection;
		}
		else
			throw new DoteException('connection informations not found in ' . $this->path('config', 'config.php'));
	}
}

