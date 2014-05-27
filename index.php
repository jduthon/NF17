<?php

require_once __DIR__ . '/library/autoload.php';

$application = new library\Application();
$application->boot();
$application2 = new library\Application();
$application2->boot();

