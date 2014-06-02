<?php

namespace library;

/**
 * The Controller main class which all the controllers must inherit from.
 * It provides methods needed by this controllers.
 */
abstract class Controller extends ApplicationComponent
{
	protected $view;
	protected $vars;
	
	/**
	 * Constructor. Initializes attributes.
	 */
	public function __construct(Application $application)
	{
		parent::__construct($application);
		$this->view = null;
		$this->vars = array();
	}
	
	/**
	 * Execute the specified action.
	 *
	 * @param	string	$action		The action name.
	 * @param	array	$arguments	The arguments of the action.
	 */
	public function execute($action, $arguments)
	{
		if (is_callable(array($this, $action)))
		{
			$this->view = call_user_func_array(array($this, $action), $arguments);
		}
		else
			throw new TommeException('404');
	}
	
	/**
	 * Return the path of the charged view.
 	 *
	 * @return	string	The path.	
	 */
	public function getView()
	{
		return $this->view;
	}
	
	/**
	 * Return the variables of the view.
	 *
	 * @return	array	The variables.
	 */
	public function getVars()
	{
		return $this->vars;
	}
	
	/**
	 * Add a variables for the view
	 *
	 * @param	array	$vars	The variables.
	 */
	public function addVars(array $vars)
	{
		foreach($vars as $var => $value)
		{
			$this->vars[$var] = $value;
		}
	}
	
	/**
	 * Return an instance of the specified model
	 *
	 * @param	string	$model	The name of the model.
	 *
	 * @return	$model	The model instance.
	 */
	public function getModel($model)
	{
		$path = 'model\\' . $model;
		return new $path($this->getApplication());
	}
}