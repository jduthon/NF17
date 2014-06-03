<?php

namespace library;

/**
 * The Router manages the Routes of the Application.
 */
class Router extends ApplicationComponent
{
	private $routes;
	
	/**
	 * Constructor. Configure the Router.
	 */
	public function __construct(Application $application, $routes_file)
	{
		parent::__construct($application);
		$this->configure($routes_file);
	}
	
	/**
	 * Load the configuration file and initialize all the Route objects.
	 */
	public function configure($routes_file)
	{
		$this->routes = array();
		
		$xml = new \DOMDocument;
		$xml->load($routes_file);
		
		$routes = $xml->getElementsByTagName('route');
		foreach($routes as $route)
		{
			$route_variables = explode(',', $route->getAttribute('variables'));
			$route_object = new Route($this->getApplication()->path('root') . $route->getAttribute('url'), $route->getAttribute('controller'), $route->getAttribute('action'), $route_variables);
			$this->addRoute($route_object);
		}
	}
	
	/**
	 * Add a Route to the Router.
	 *
	 * @param	Route	$route	The added Route.
	 */
	public function addRoute(Route $route)
	{
		if (!in_array($route, $this->routes)) {
			$this->routes[] = $route;
		}
	}
	
	/**
	 * Return the asked route.
	 * Try to match each Route URL with the URL passed in argument. If failed, raise an Exception.
	 *
	 * @param	string	$url	The tested URL.
	 * 
	 * @return	Route	The first matched Route.
	 */
	public function getRoute($url)
	{
		foreach($this->routes as $route)
		{
			if ($route->match($url)) {
				return $route;
			}
		}
		
		throw new TommeException('No route matching the URL.');
	}
	
	
}