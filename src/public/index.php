<?php

declare(strict_types=1);


require_once __DIR__ . '/../vendor/autoload.php';

use Core\Application;
use Core\Router;
use Core\Request;

$routes = require __DIR__ . '/../routes/web.php';

$router = new Router($routes);

$request = new Request();

$app = new Application($router, $request);

$app->run();