<?php

namespace library;

/**
 * The Router manages the Routes of the Application.
 */
class Router
{
	private $routes;
	
	public function __construct($routes_file)
	{
		$this->configure($routes_file);
	}

	public function configure($routes_file)
	{
		$this->routes = array();
		
		$xml = new \DOMDocument;
		$xml->load($routes_file);
		
		$routes = $xml->getElementsByTagName('route');
		foreach($routes as $route)
		{
			$route_variables = explode(',', $route->getAttribute('variables'));
			$route_object = new Route($route->getAttribute('url'), $route->getAttribute('controller'), $route->getAttribute('action'), $route_variables);
			$this->addRoute($route_object);
		}
	}
	
	public function addRoute(Route $route)
	{
		if (!in_array($route, $this->routes)) {
			$this->routes[] = $route;
		}
	}

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