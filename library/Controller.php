<?php

namespace library;

abstract class Controller 
{
	protected $app;
	protected $page;
	protected $view;
	protected $vars;
	
	public function __construct(Application $app, $page)
	{
		$this->app = $app;
		$this->page = $page;
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
	
	public function addVars($vars)
	{
		foreach($vars as $var => $value)
		{
			$this->vars[$var] = $value;
		}
	}
	
	public function getVars()
	{
		return $this->vars;
	}
}