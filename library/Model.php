<?php

namespace library;

abstract class Model
{
	private $app;
	
	public function __construct(Application $app)
	{
		$this->application = $app;
	}
	
	public function query($query, $parameters = '')
	{
		return $this->application->query($query, $parameters);
	}

}