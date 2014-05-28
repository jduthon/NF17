<?php

namespace library;

/**
 * The parent of all the Application components such like Controller or Model that needed the Application methods.
 * Implementation of Adapter design pattern.
 */
abstract class ApplicationComponent
{
	protected $application;
	
	public function __construct(Application $application)
	{
		$this->application = $application;
	}
	
	public function getApplication()
	{
		return $this->application;
	}
}