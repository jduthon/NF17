<?php

namespace library;

/**
 * The parent of all the Application components such like Controller or Model that needs the Application methods.
 * Implementation of Adapter design pattern.
 */
abstract class ApplicationComponent
{
	protected $application;
	
	/**
	 * Constructor. Initializes attribute.
	 */
	public function __construct(Application $application)
	{
		$this->application = $application;
	}
	
	/**
	 *	Return the Application.
	 *
	 *	@return	Application	The Application.
	 */
	public function getApplication()
	{
		return $this->application;
	}
}