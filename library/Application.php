<?php

namespace library;

/**
 * The Application is the heart of the website. It is designed as the Model-View-Controller pattern.
 * It takes charge of load configuration, load the right page according to the URL and send it to user.
 */
class Application
{
	private static $instance = null;
	private $path;
	private $connection;
	private $router;
	private $controller;
	private $booted;
	
	/**
	 * Constructor, configure the Application which needs then to be booted.
	 */
	private function __construct()
	{
		$this->configure();
	}
	
	private function __clone() {}
	
	/**
	 * Implemented the Singleton design pattern.
	 */
	public static function getInstance()
	{
		if(empty(self::$instance)) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	/**
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
		
		$this->booted = false;
	}
	
	/**
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
		$this->router = new Router($this->path('config', 'routes.xml'));
		
		$this->loadPage();
		$this->sendPage();
		
		$this->booted = true;
	}
	
	/**
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
	
	/**
	 * Prepare and execute a SQL query and return the results.
	 *
	 * @param	string	$query		The query.
	 * @param	array	$parameters	List of bound parameters of the query.
	 *
	 * @return array	The results.
	 */
	public function query($query, array $parameters = array())
	{
		$sth = $this->connection->prepare($query);
		return $this->connection->execute($sth, $parameters);
	}
	
	/**
	 * Load the page requested by the user via the URL.
	 * Find the right couple controller/action, then execute the action. If it has failed, execute a 404 error.
	 */
	public function loadPage()
	{	
		try
		{
			$route = $this->router->getRoute($_SERVER['REQUEST_URI']);
			$controller_class = 'controller\\'.$route->getController();
			$action = $route->getAction();
			foreach($route->getVariables() as $variable) {
				$arguments[$variable['name']] = $variable['value'];
			}
			
			$this->controller = new $controller_class($this);
			$this->controller->execute($action, $arguments);
		}
		catch (TommeException $e)
		{
			exit('404 error');
		}
	}
	
	/**
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

