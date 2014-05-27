<?php

namespace library;

abstract class Controller 
{
	protected $application;
	protected $view;
	protected $vars;
	
	public function __construct(Application $application)
	{
		$this->application = $application;
		$this->view = null;
		$this->vars = array();
	}
	
	public function execute($action)
	{
		if (is_callable(array($this, $action)))
		{
			$this->view = $this->$action();
		}
		else
			throw new DoteException('404');
	}
	
	public function getView()
	{
		return $this->view;
	}
	
	public function getVars()
	{
		return $this->vars;
	}
	
	public function addVars($vars)
	{
		foreach($vars as $var => $value)
		{
			$this->vars[$var] = $value;
		}
	}
	
	public function getModel($model)
	{
		return new $model($this->application);
	}
}