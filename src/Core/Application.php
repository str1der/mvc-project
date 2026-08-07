<?php

declare(strict_types=1);

namespace Core;

final class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run(): void
    {
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($requestUri, PHP_URL_PATH);

        $matchedRoute = $this->router->match($path);

        if ($matchedRoute === null) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        [$controllerName, $method] = explode('@', $matchedRoute, 2);

        $controllerClass = 'App\\Controllers\\' . $controllerName;

        $controller = new $controllerClass();

        $response = $controller->$method();

        echo $response;
    }
}