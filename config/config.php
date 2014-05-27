<?php

namespace config;

/* Path definitions */
$path = array('root' => str_replace(array('\config', '/config'), '', __DIR__ ),
			'config' => '/config',
			'controller' => '/controller',
			'model' => '/model',
			'library' => '/library',
			'view' => '/view',
			'layout' => '/view/layout',
			'css' => 'web/css',
			'javascript' => 'web/javascript',
			'image' => 'web/image');
			
			
/* Connection informations */
$connection = array('server' => 'localhost',
					'username' => 'root',
					'password' => '',
					'database' => 'whatsup',
					'dbms' => 'mysql');

					
/* Default values */
$default = array('page' => 'Example',
				'action' => 'action_example');