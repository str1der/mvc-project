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
            $body = View::render('errors/404');

            $response = new Response($body, 404);
            $response->send();
            
            return;
        }

        [$controllerName, $method] = explode('@', $matchedRoute, 2);

        $controllerClass = 'App\\Controllers\\' . $controllerName;

        $controller = new $controllerClass();

        $body = $controller->$method();

        $response = new Response($body, 200);
        $response->send();
    }
}