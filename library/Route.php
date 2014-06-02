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
	
	/**
	 * Constructor. Initialize parameters
	 *
	 * @param	string	$url		The URL.
	 * @param	string	$controller	The associated controller.
	 * @param	string	$action		The associated action.
	 * @param	array	$action		The arguments of the action.
	 */
	public function __construct($url, $controller, $action, array $variables)
	{
		$this->url = $url;
		$this->controller = $controller;
		$this->action = $action;
		
		foreach($variables as $variable) {
			$this->variables[] = array('name' => $variable, 'value' => '');
		}
	}
	
	/**
	 * Return the URL.
	 *
	 * @return	string	The URL.
	 */
	public function getUrl()
	{
		return $this->url;
	}
	
	/**
	 * Return the controller.
	 *
	 * @return	string	The controller.
	 */
	public function getController()
	{
		return $this->controller;
	}
	
	/**
	 * Return the action.
	 *
	 * @return	string	The action.
	 */
	public function getAction()
	{
		return $this->action;
	}
	
	/**
	 * Return the variables of the action.
	 *
	 * @return	array	The variables.
	 */
	public function getVariables()
	{
		return $this->variables;
	}
	
	/**
	 * Try to match the URL passed in argument with the URL of the Route. If so, fill the variables with values of the URL passed in argument.
	 *
	 * @param	string	$url	The tested URL.
	 *
	 * @return	bool	If the URLs match.
	 */
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