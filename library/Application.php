<?php

namespace library;

/*
 * The Application is the heart of the website. It is designed as the Model-View-Controller pattern.
 * It takes charge of load configuration, load the right page according to the URL and send it to user.
 */
class Application
{
	private static $instance = null;
	private $path;
	private $connection;
	private $controller;
	private $default;
	private $booted;
	
	/*
	 * Constructor. Simply configure the Application which needs then to be booted.
	 */
	private function __construct()
	{
		$this->configure();
	}
	
	private function __clone() {}
	
	/*
	 * Implemented the Singleton design pattern.
	 */
	public static function getInstance()
	{
		if(empty(self::$instance)) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	/*
	 * Load the configuration and initialize all the class attributes. 
	 */
	public function configure()
	{
		require_once '/../config/config.php';
		
		if (!empty($path))
		{
			$this->path['root'] = $path['root'];
			foreach($path as $key => $value)
			{
				if (strpos($value, '/') != 0) {
					$this->path[$key] = $value;
				}
				else if($key != 'root') {
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
		
		$this->controller = null;
		$this->booted = false;
	}
	
	/*
	 * Boot the Application.
	 * Initialize the session, make a connection with database, load the page and send it to the user.
	 */
	public function boot()
	{
		if($this->booted == true) {
			throw new DoteException('Application already booted');
		}
		
		session_start();
		
		$this->connection = new Connection($this->connection['server'], $this->connection['username'], $this->connection['password'], $this->connection['database'], $this->connection['dbms']);
		
		$this->loadPage();
		$this->sendPage();
		
		$this->booted = true;
	}
	
	public function path($type, $name = '')
	{
		$res = $this->path[$type];
		if(!empty($name)) {
			$res .= '/'.$name;
		}
		
		return $res;
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
			$this->controller = new $controller_class($this);
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
		$_css_ = $this->path('css', '');
		$_image_ = $this->path('image', '');
		$_javascript_ = $this->path('javascript', '');
		
		require $this->path('layout', 'main.php');
	}
}

