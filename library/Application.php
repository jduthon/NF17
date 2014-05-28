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
	 * Constructor, configure the Application which needs then to be booted.
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
			throw new TommeException('path definitions not found in /config/config.php');
		}
		
		if (!empty($connection))
		{
			$this->connection = $connection;
		}
		else {
			throw new TommeException('connection informations not found in ' . $this->path('config', 'config.php'));
		}
		
		if (!empty($default))
		{
			foreach($default as $key => $value)
			{
				$this->default[$key] = $value;
			}
		}
		else {
			throw new TommeException('default informations not found in ' . $this->path('config', 'config.php'));
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
			throw new TommeException('application already booted');
		}
		
		session_start();
		
		$this->connection = new Connection($this->connection['server'], $this->connection['username'], $this->connection['password'], $this->connection['database'], $this->connection['dbms']);
		
		$this->loadPage();
		$this->sendPage();
		
		$this->booted = true;
	}
	
	/*
	 * Return the absolute path of the document (file or folder) requested.
	 * 
	 * @param	string	$type	The type of the document. List of types are defined in $this->path.
	 * @param	string	$name	The name of the file, if it's a file requested. If it's let blank, a folder is requested.
	 *
	 * @return	string	The absolute path.
	 */
	public function path($type, $name = '')
	{
		$res = $this->path[$type];
		if(!empty($name)) {
			$res .= '/'.$name;
		}
		
		return $res;
	}
	
	/*
	 * Prepare and execute a SQL query and return the results.
	 *
	 * @param	string	$query		The query.
	 * @param	array	$parameters	List of bound parameters of the query.
	 *
	 * @return array	The results.
	 */
	public function query($query, $parameters = array())
	{
		$sth = $this->connection->prepare($query);
		return $this->connection->execute($sth, $parameters);
	}
	
	/*
	 * Load the page requested by the user via the URL.
	 * Find the right couple controller/action, then execute the action. If it has failed, execute a 404 error.
	 */
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
		
		try
		{
			$controller_class = 'controller\\' . ucfirst($page);
			$this->controller = new $controller_class($this);
			$this->controller->execute($action);
		}
		catch (TommeException $e)
		{
			exit('404 error');
		}
	}
	
	/*
	 * Prepare the page and send it to the user.
	 * Prepare all the variables needed by the view, then included it in the layout to make the page.
	 */
	public function sendPage()
	{
		extract($this->controller->getVars());
		$_view_ = $this->path('view', $this->controller->getView());
		$_css_ = $this->path('css', '');
		$_image_ = $this->path('image', '');
		$_javascript_ = $this->path('javascript', '');
		
		require $this->path('layout', 'main.php');
	}
}

