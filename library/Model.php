<?php

namespace library;

abstract class Model 
{
	private $application;
	
	public function __construct(Application $application)
	{
		$this->application = $application;
	}
	
	public function query($query, $parameters = '')
	{
		return $this->application->query($query, $parameters);
	}

}