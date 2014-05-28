<?php

namespace library;

/**
 * The Controller main class which all the controllers must inherit from.
 * It provides methods needed by this controllers.
 */
abstract class Model extends ApplicationComponent
{	
	public function __construct(Application $application)
	{
		parent::__construct($application);
	}
	
	/*
	 * {@inheritdoc}
	 */
	public function query($query, $parameters = '')
	{
		return $this->getApplication()->query($query, $parameters);
	}
}