<?php

namespace library;

/**
 * The Controller main class which all the controllers must inherit from.
 * It provides methods needed by this controllers.
 */
abstract class Model
{
	abstract public function getPrimaryKey();
	
	abstract public function getForeignKeys();
}