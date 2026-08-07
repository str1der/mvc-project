<?php

declare(strict_types=1);

namespace Core;

final class Application
{
    private Router $router;
    private Request $request;

    public function __construct(Router $router, Request $request)
    {
        $this->router = $router;
        $this->request = $request;
    }

    public function run(): void
    {
        $path = $this->request->path();

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