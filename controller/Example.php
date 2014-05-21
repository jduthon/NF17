<?php

namespace controller;

use library;

class Example extends library\Controller
{
	public function action_example()
	{
		$var = 'shit';
		return 'view_example.php';
	}
}