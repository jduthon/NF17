<?php

class DoteException extends Exception 
{
	public function __toString()
	{
		return 'Error : ' . $this->getMessage() . ' (thrown in ' . $this->getFile() . ' on line ' . $this->getLine() . ')';
	}
}

class Application
{
	private $path;
	private $connection;
	private $page;
	private $action;
	private $default;
	
	public function __construct($path_root, $path_config = '/config', $file_config = 'config.php')
	{
		try
		{
			session_start();
			
			// Configure the application 
			$this->path['root'] = $path_root;
			$this->path['config'] = $this->path['root'].$path_config;
			$this->configure($file_config);
			
			// Establish a connection with the database
			$this->load('library', 'connection.php');
			$this->connection = new Connection($this->connection['server'], $this->connection['username'], $this->connection['password'], $this->connection['database']);
			
			// Load the controller
			$this->loadController();
		}
		catch (DoteException $e)
		{
			exit($e);
		}
	}
	
	public function path($type, $name)
	{
		return $this->path[$type].'/'.$name;
	}
	
	public function load($type, $name)
	{
		$path = $this->path($type, $name);
	
		if (file_exists($path))
			require_once $path;
		
		else
			throw new DoteException('failed opening ' . $path);
	}
	
	public function configure($file_config)
	{
		require $this->path('config', $file_config);
	
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
		
		
		if (!empty($default))
		{
			foreach($default as $key => $value)
			{
				$this->default[$key] = $value;
			}
		}
		else
			throw new DoteException('default informations not found in ' . $this->path('config', 'config.php'));
	}
	
	public function query($query, $parameters = '')
	{
		try
		{
			$sth = $this->connection->prepare($query);
			return $this->connection->execute($sth, $parameters);
		}
		catch (DoteException $e)
		{
			exit($e);
		}
	}
	
	public function loadController()
	{
		if(!empty($_GET['page']) AND !empty($_GET['action']))
		{
			$this->page = $_GET['page'];
			$this->action = $_GET['action'];
			
		}
		else
		{
			$this->page = $this->default['page'];
			$this->action = $this->default['action'];
		}	
		
		try
		{
			$this->load('controller', $this->page . '.php');
		}
		catch (DoteException $e)
		{
			exit('404 error');
		}
		
		$controller_class = ucfirst($this->page);
		$controller_action = $this->action;
		$controller = new $controller_class;
		$controller->$controller_action();
	}
}

