<?php

namespace library;

class Router
{
	private $routes;
	
	public function __construct($routes_xml)
	{
		$this->routes = array();
		
		$xml = new \DOMDocument;
		$xml->load($routes_xml);
		
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
		if (!in_array($route, $this->routes))
		{
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
		exit;
		throw new TommeException('No route matching the URL.');
	}
	
	
}