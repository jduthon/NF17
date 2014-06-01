<?php

require_once 'library/autoload.php';
$config_file = 'config/config.xml';

$application = library\Application::getInstance($config_file);
$application->boot();
