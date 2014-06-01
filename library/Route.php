<?php

namespace library;

/**
 * A Route represent an URL associated to a controller/action couple
 */
class Route
{
	private $url;
	private $controller;
	private $action;
	private $variables;
	
	public function __construct($url, $controller, $action, array $variables)
	{
		$this->url = $url;
		$this->controller = $controller;
		$this->action = $action;
		
		foreach($variables as $variable) {
			$this->variables[] = array('name' => $variable, 'value' => '');
		}
	}
	
	public function getUrl()
	{
		return $this->url;
	}
	
	public function getController()
	{
		return $this->controller;
	}
	
	public function getAction()
	{
		return $this->action;
	}
	
	public function getVariables()
	{
		return $this->variables;
	}
	
	public function match($url)
	{
		if (preg_match('#^' . $this->url . '$#', $url, $matches)) 
		{
			foreach($matches as $key => $match)
			{
				if($key != 0) {
					$this->variables[$key - 1]['value'] = $match;
				}
			}
			
			return true;
		}
		else {
			return false;
		}
	}
}