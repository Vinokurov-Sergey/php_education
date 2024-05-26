<?php

use Base\Route;

require 'vendor/autoload.php';
require 'base/config.php';
require 'base/eloquent.php';

ini_set('display_errors', 'on');
ini_set('error_reporting', E_ALL | E_NOTICE);

$route = new Route();
$route->addRoute('/', \App\Controller\Login::class);

$app = new \Base\Application($route);
$app->run();