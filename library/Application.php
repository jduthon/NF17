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
	private $modelManager;
	private $adminArray;
	
	/**
	 * Constructor. Configure the Application which needs then to be booted.
	 */
	private function __construct($config_file)
	{
		$this->configure($config_file);
	}

	/**
	 * Implemented the Singleton design pattern.
	 */
	public static function getInstance($config_file)
	{
		if(empty(self::$instance)) {
			self::$instance = new self($config_file);
		}
		
		return self::$instance;
	}
	
	/**
	 * Implemented the Singleton design pattern.
	 */
	private function __clone() {}
	
	/**
	 * Load the configuration file and initialize all the class attributes. 
	 */
	public function configure($config_file)
	{
		$config = new \DOMDocument;
		$config->load($config_file);
		
		$this->path['root'] = pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME);	
		$paths = $config->getElementsByTagName('path');
		foreach($paths as $path) {
			$this->path[$path->getAttribute('name')] = $path->getAttribute('value');
		}
		
		$connection = $config->getElementsByTagName('connection')->item(0);
		$this->connection = array('server' => $connection->getAttribute('server'), 'username' => $connection->getAttribute('username'), 'password' => $connection->getAttribute('password'), 'database' => $connection->getAttribute('database'), 'dbms' => $connection->getAttribute('dbms'));
	
		$adminArray = $config->getElementsByTagName('admin')->item(0);
		$this->adminArray = array('adminName' => $adminArray->getAttribute('adminName'), 'password' => $adminArray->getAttribute('password'));
		$this->controller = null;
		$this->router = null;
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
		$_SESSION['type_connexion']="none";
		
		$this->connection = new Connection($this->connection['server'], $this->connection['username'], $this->connection['password'], $this->connection['database'], $this->connection['dbms']);
		$this->router = new Router($this, $this->path('config', 'routes.xml'));
		$this->modelManager=ModelManager::getInstance($this);
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
			//Prepare the couple controller/action
			$route = $this->router->getRoute($_SERVER['REQUEST_URI']);
			$controller_class = 'controller\\'.$route->getController();
			$action = $route->getAction();
			foreach($route->getVariables() as $variable) {
				$arguments[$variable['name']] = $variable['value'];
			}
			
			//Load and execute it
			$this->controller = new $controller_class($this);
			$this->controller->execute($action, $arguments);
		}
		catch (TommeException $e)
		{
			print_r($e);
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
		$_view = $this->path('view', $this->controller->getView());
		$_css = $this->path('css');
		$_images = $this->path('images');
		$_js = $this->path('js');
		
		require $this->path('layout', 'main.php');
	}
	
	public function getModelManager(){
		return $this->modelManager;
	}
	
	public function getSQLDriverType(){
		return $this->connection->getDBMS();
	}
	
	public function checkAdmin($adminName,$password){
		return strcmp($adminName,$this->adminArray['adminName'])==0 && strcmp($password,$this->adminArray['password'])==0;
	}
}
