<?php

namespace library;

class Application
{
	private $path;
	private $connection;
	private $controller;
	private $default;
	
	public function __construct()
	{
		$this->configure();
		$this->controller = null;
	}
	
	public function configure()
	{
		require_once '/../config/config.php';
		
		if (!empty($path))
		{
			$this->path['root'] = $path['root'];
			foreach($path as $key => $value)
			{
				if($key != 'root') {
					$this->path[$key] = $this->path['root'].$value;
				}
			}
		} 
		else {
			throw new DoteException('Path definitions not found in /config/config.php');
		}
		
		if (!empty($connection))
		{
			$this->connection = $connection;
		}
		else {
			throw new DoteException('Connection informations not found in ' . $this->path('config', 'config.php'));
		}
		
		if (!empty($default))
		{
			foreach($default as $key => $value)
			{
				$this->default[$key] = $value;
			}
		}
		else {
			throw new DoteException('default informations not found in ' . $this->path('config', 'config.php'));
		}
	}
	
	public function boot()
	{
		// Make a connection, load the controller, the view and send the page
		session_start();
		
		$this->connection = new Connection($this->connection['server'], $this->connection['username'], $this->connection['password'], $this->connection['database'], $this->connection['dbms']);
		
		$this->loadPage();
		$this->sendPage();
	}
	
	public function path($type, $name)
	{
		return $this->path[$type].'/'.$name;
	}
	
	public function query($query, $parameters = array())
	{
		$sth = $this->connection->prepare($query);
		return $this->connection->execute($sth, $parameters);
	}
	
	public function loadPage()
	{
		// Routing
		if(!empty($_GET['page']) AND !empty($_GET['action']))
		{
			$page = $_GET['page'];
			$action = $_GET['action'];
		}
		else
		{
			$page = $this->default['page'];
			$action = $this->default['action'];
		}
		
		// Load controller and execute action
		try
		{
			$controller_class = 'controller\\' . ucfirst($page);
			$this->controller = new $controller_class($this, $page);
			$this->controller->execute($action);
		}
		catch (DoteException $e)
		{
			exit('404 error');
		}
	}
	
	public function sendPage()
	{
		// Load and send page
		extract($this->controller->getVars());
		$_view_ = $this->path('view', $this->controller->getView());
		require $this->path('layout', 'main.php');
	}
}

