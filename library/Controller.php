<?php

namespace library;

abstract class Controller 
{
	protected $app;
	protected $page;
	protected $view;
	
	public function __construct(Application $app, $page)
	{
		$this->page = $page;
		$this->view = null;
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
}