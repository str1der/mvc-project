<?php

declare(strict_types=1);

require __DIR__ . '/../core/Router.php';
require __DIR__ . '/../app/Controllers/HomeController.php';
require __DIR__ . '/../app/Controllers/ContactController.php';
require __DIR__ . '/../app/Controllers/AboutController.php';


use Core\Router;

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

$path = parse_url($requestUri, PHP_URL_PATH);

$routes = require __DIR__ . '/../routes/web.php';

$route = new Router($routes);

//var_dump($route);

$matchedRoute = $route->match($path);

if ($matchedRoute ===null)
{
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

[$controllerName, $method] = explode('@', $matchedRoute,2);

$controllerClass = 'App\\Controllers\\' . $controllerName;

$controller = new $controllerClass();

$response = $controller->$method();

echo $response;